<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apanel/Model_users');
        $this->load->model('User_model');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        // $this->load->model('Search_model');
        $this->load->model('Shop_model');
         $this->load->model('Adsview_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        // if($this->session->userdata('log_check')!=1)
        //     {
        //         redirect('register/login', 'refresh');
        //     }
        // error_reporting(0);
        if(($this->session->userdata('log_check')+$this->session->userdata('check_guest'))=='')
            {
                redirect('/register/login', 'refresh');
            }
    }

    public function index()
    {

        $this->result();
    }

    public function result($offset = 0)
    {
         $user_ip =$_SERVER['REMOTE_ADDR']; 
   $result_ip = json_decode(file_get_contents('http://ip-api.io/json/' . $user_ip));
    	  if($this->session->userdata('front_sess')['userid']){
  $ref_user=$this->session->userdata('front_sess')['refferral_id'];
  }else{
    $ref_user=$this->session->userdata('logged_in_stf')['refferral_id'];
  }
 $data['refferral_id']=$ref_user;
   

        //print_r($this->session->userdata('lat_long'));
        
         $user_id=$this->session->userdata('front_sess')['userid'];

        $loc_allow = '';
        $user_ip   = $_SERVER['REMOTE_ADDR'];
        $geo       = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip));
        //print_r($geo);

        //print_r($this->session->userdata('lat_long'));

        $seller = $this->input->get('seller_id', true);

       
		$data['product'] = $this->Shop_model->product_data_list('1000', $offset, '', '', '');
        if($data['product']){
             $data['agent_list'] = $this->Shop_model->agent_list();
         }else{
             $data['agent_list'] =array();
         }
       
        // $total_rows = $this->Shop_model->countall_product_data($grouping, $search, $search_category);
		$data['address_list']=$this->Shop_model->get_address();
       

        $data['title'] = "Search result";

        $this->load->view('header', $data);
        $this->load->view('result');
        $this->load->view('footer');

    }
    public function user_details()
    {   
       
        $id=base64_decode($this->input->get('user_details', true));
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        if($data['user_info'][0]->user_type!='agent'){
            redirect('/'); 
        }
        $data['title']='Agent || Details';
        $this->load->view('header');
        $this->load->view('agent_details',$data);
        $this->load->view('footer');
    }
    public function main_search2()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
        	$this->session->set_userdata('property_type', base64_decode($this->input->post('property_type')));
            $this->session->set_userdata('property_category', base64_decode($this->input->post('property_category')));
            $this->session->set_userdata('property_for', base64_decode($this->input->post('property_for')));
        }
        redirect('search/result'); 
    }
    public function result_view()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->session->set_userdata('result_view', $this->input->post('result_view'));
           
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function main_search()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $this->session->set_userdata('property_type', base64_decode($this->input->post('property_type')));
            $this->session->set_userdata('property_category', base64_decode($this->input->post('property_category')));
            $this->session->set_userdata('property_for', base64_decode($this->input->post('property_for')));
            $this->session->set_userdata('agentId', $this->input->post('agentId'));
             // $this->session->set_userdata('posted_by', $this->input->post('posted_by'));
            $this->session->set_userdata('location_type', $this->input->post('location_type'));

            $this->session->set_userdata('address_list', $this->input->post('address_list'));
            $this->session->set_userdata('latitude', $this->input->post('latitude'));
            $this->session->set_userdata('longitude', $this->input->post('longitude'));
            $this->session->set_userdata('pincode', $this->input->post('pincode'));
            if($this->input->post('pincode')){
            	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($this->input->post('pincode'))."&sensor=false&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4";
    $result_string = file_get_contents($url);
    $result = json_decode($result_string, true);
    $country='';
    $pin='';
    $pt_country_shortname='';
    if(!empty($result['results'])){
         $zipLat = $result['results'][0]['geometry']['location']['lat'];
         $ziplng = $result['results'][0]['geometry']['location']['lng'];
       
   
    foreach ($result['results'][0]['address_components'] as $key) {
 //print_r($key);
 //echo $key['types'][0];
  if($key['types'][0] == 'country')
  {
    $country = $key['long_name'];
    $pt_country_shortname=$key['short_name'];
  }
  if($key['types'][0] == 'postal_code')
  {
    $pin = $key['long_name'];
  }
}
$row = $this->db->get_where('pincode_table', array('pt_pin' => $this->input->post('pincode')))->row();
if($row->pt_pin==$this->input->post('pincode')){
$this->session->set_userdata('pinlatitude',$row->pt_lat);
 $this->session->set_userdata('pinlongitude',$row->pt_long);
}else{
$data = array( 
		'pt_pin'  =>$pin, 
        'pt_country'  =>  $country, 
        'pt_country_shortname'=> $pt_country_shortname, 
        'pt_address'   =>   $result['results'][0]['formatted_address'],
        'created_at'   =>  date('Y-m-d'),
        'pt_lat'   =>  $zipLat,
        'pt_long'=>$ziplng
    );
$this->session->set_userdata('pinlatitude',$zipLat);
 $this->session->set_userdata('pinlongitude',$ziplng);
	$this->db->insert('pincode_table', $data);
}



}

//echo $result['results'][0]['formatted_address'];
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
     public function refineby_search()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post('distance')){
            	if($this->input->post('distance')!='clear'){
            		$this->session->set_userdata('distance', $this->input->post('distance'));
            	}else{
            		$this->session->set_userdata('distance', '');
            	}
          	 
          }
           
            if($this->input->post('gated')){
            	if($this->input->post('gated')!='clear'){
            		$this->session->set_userdata('gated', $this->input->post('gated'));
            	}else{
            		$this->session->set_userdata('gated', '');
            	}
          	 
          }
           
            if($this->input->post('corner')){
            	if($this->input->post('corner')!='clear'){
            		 $this->session->set_userdata('corner', $this->input->post('corner'));
            	}else{
            		 $this->session->set_userdata('corner', '');
            	}
          	
          }
           
            if($this->input->post('agent_assistent')){
            	if($this->input->post('agent_assistent')!='clear'){
            		$this->session->set_userdata('agent_assistent', $this->input->post('agent_assistent'));
            	}else{
            		$this->session->set_userdata('agent_assistent', '');
            	}
          	
          }
            
            if($this->input->post('bedroom')){
            	if($this->input->post('bedroom')!='clear'){
            		$this->session->set_userdata('bedroom', $this->input->post('bedroom'));
            	}else{
            	$this->session->set_userdata('bedroom', '');	
            	}
          	
          }
            
            if($this->input->post('price_range')){
            	if($this->input->post('price_range')!='clear'){
            		$this->session->set_userdata('price_range', $this->input->post('price_range'));
            	}else{
            		$this->session->set_userdata('price_range', '');
            	}
          	
          }
            
            if($this->input->post('posted_by')){
            	if($this->input->post('posted_by')!='clear'){
            		 $this->session->set_userdata('posted_by', $this->input->post('posted_by'));
            	}else{
            		 $this->session->set_userdata('posted_by', '');
            	}

          	
          }
         
           if($this->input->post('facing')){
            	if($this->input->post('facing')!='clear'){
            		$facing=$this->input->post('facing');
            	}else{
            		 $this->session->set_userdata('facing', '');
            	}

          	 
          }
           
           
             if ($facing) {
             	 //flag
             	
    	$is_empty = false;
    
foreach ($facing as $key => $value) {
	if ($value == 'clear')
        $is_empty = true;
}

            if ($is_empty) {
                $this->session->set_userdata('facing', '');
                // exit();
            } else {
                $this->session->set_userdata('facing', $facing);
                
            }
        }
            
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
 public function sortby_search()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

          
            $this->session->set_userdata('sort_by_session', $this->input->post('sort_by'));
            
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function add_variable()
    {
        $this->load->library("cart");
        $data = array(
            "id"    => $_POST["product_id"],
            "name"  => $_POST["product_name"],
            "price" => $_POST["product_price"],
            "image" => $_POST["product_img"],
            'qty'   => $_POST["quantity"],
        );
        $this->cart->insert($data); //return rowid


        $product_id = $this->input->post('product_id');
            $user_id    = $this->session->userdata('front_sess')['userid'];
 

        $count = $this->db->query("SELECT * FROM user_views WHERE product_id='$product_id' AND user_id='$user_id' AND cart_flag='0' ");
         $vdata = $count->result();

         $uv_autoid = $vdata[0]->uv_autoid;

if($count->num_rows()==0){

$datalist = array(

            'product_id' => $this->input->post('product_id'),
            'user_id'    => $this->session->userdata('front_sess')['userid'],
            'entry_date' => date('Y-m-d'),
            'ip_address' => $this->input->ip_address(),
            'last_viewed_date' => '',
            'cart_flag' => 1,
            'latlong_id' => ''

        );

    

            


        if ($this->session->userdata('front_sess')['userid'] != '') {
             $check = $this->Shop_model->wish_data_add('user_views', '', '', 'insert', $datalist);
            echo $check;
        } else {
            //echo 3;
        }
    }else{
        $this->db->query("UPDATE user_views SET cart_flag='1' WHERE uv_autoid='$uv_autoid'");
    }

redirect($_SERVER['HTTP_REFERER']);



//  echo  $_POST["product_id"];
        // //  $this->cart->insert($data);
        // $cart = $this->cart->contents();
        // if(!empty($cart)){
        // echo print_r($cart);
        // }else{
        //     echo "lol";
        // }
        //$rows = count($this->cart->contents());
        //print_r($this->cart->contents()); //exit();
        //echo $rows;
        //echo $this->cart->total();
    }

    public function remove()
    {
        //$this->load->library("cart");
        $user_id=$this->session->userdata('front_sess')['userid'];
        $row_id = $_POST["row_id"];
        $data   = array(
            'rowid' => $row_id,
            'qty'   => 0,
        );
        //var_dump($data);
        $chk = $this->cart->update($data);
        //echo $this->view();
        if ($chk) {


$this->Shop_model->remove_product_cart($row_id,$user_id);



            $this->session->set_flashdata('cart_msg', 'Product removed successfully');
        } else {
            $this->session->set_flashdata('cart_msg_error', 'Sorry try again');
        }

    }
    public function update()
    {
        //$this->load->library("cart");
        $row_id = $_POST["row_id"];
        $data   = array(
            'rowid' => $row_id,
            'qty'   => $_POST["quantity"],
        );
        //var_dump($data);
        $chk = $this->cart->update($data);
        //echo $this->view();
        if ($chk) {
            $this->session->set_flashdata('cart_msg', 'Cart updated successfully');
        } else {
            $this->session->set_flashdata('cart_msg_error', 'Sorry try again');
        }

    }

    public function clear()
    {
        // $this->load->library("cart");
        $this->cart->destroy();
        // echo $this->view();
    }

    // public function wish_add()
    // {

    //     $datalist = array(

    //         'product_id' => $this->input->post('product_id'),
    //         'user_id'    => $this->session->userdata('front_sess')['userid'],
    //         'entry_date' => date('Y-m-d'),

    //     );

    //     if ($this->session->userdata('front_sess')['userid'] != '') {
    //         $check = $this->Shop_model->wish_data_add('wishlist', '', '', 'insert', $datalist);
    //         echo $check;
    //     } else {
    //         //echo 3;
    //     }

    // }

public function post_favourite(){
         $id=$this->input->post('fv_adsid');
     $user_id=$this->session->userdata('front_sess')['userid'];
    
          $today = date("Y-m-d H:i:s");
      $this->form_validation->set_rules('fv_adsid', 'Name', 'required');
        
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            $where="ppt_isDelete=0 and ppt_id='".$id."'";
            $where_fv=" fv_adsid='".$id."' and fv_userid='".$user_id."'";
            $check_userpost=$this->Adsview_model->RowCount('propertypost_table',$where);
           if($check_userpost>0){
     $check_by=$this->Adsview_model->RowCount('favourite_master',$where_fv);
        if($check_by<1){
            $_POST['fv_userid']=$user_id;
             $_POST['fv_adsid']=$id;
              $_POST['fv_entry_date']=$today;
               
            $query=$this->General_model->show_data_id('favourite_master','','','insert',$this->input->post());
            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
        }else{
            $where=" fv_adsid='".$id."' and fv_userid='".$user_id."'";
            $query=$this->Adsview_model->Favourite_delete('favourite_master',$where);
            if($query){
                echo"del";
            }else{
              echo"not";  
            }
          
        }
        }else{
          echo"not";   
        }
}
        
 }
    public function wish_add()
    { 

        $product_id = $this->input->post('product_id');
            $user_id    = $this->session->userdata('front_sess')['userid'];
 

        $count = $this->db->query("SELECT * FROM user_views WHERE product_id='$product_id' AND user_id='$user_id' AND favourite_flag='0' ");
         $vdata = $count->result();

         $uv_autoid = $vdata[0]->uv_autoid;

if($count->num_rows()==0){

        $datalist = array(

            'product_id' => $this->input->post('product_id'),
            'user_id'    => $this->session->userdata('front_sess')['userid'],
            'entry_date' => date('Y-m-d'),
            'ip_address' => $this->input->ip_address(),
            'last_viewed_date' => '',
            'favourite_flag' => 1,
            'latlong_id' => ''

        );

        if ($this->session->userdata('front_sess')['userid'] != '') {
            $check = $this->Shop_model->wish_data_add('user_views', '', '', 'insert', $datalist);
            echo $check;
        } else {
            //echo 3;
        }
    }else{
        $this->db->query("UPDATE user_views SET favourite_flag='1' WHERE uv_autoid='$uv_autoid'");
    }

redirect($_SERVER['HTTP_REFERER']);
    }

    public function error_comment_add()
    {

        $product_id = $this->input->post('product_id');

        $datalist = array(

            'error_flag'    => 1,

            'error_comment' => $this->input->post('comment'),

        );

        if ($this->session->userdata('front_sess')['userid'] != '') {

            $this->General_model->show_data_id('product', $product_id, 'p_id', 'update', $datalist);
            $this->session->set_flashdata('message', 'error reporting successful.');
            redirect('search');
        } else {
            $this->session->set_flashdata('error', 'You have to login.');
            redirect('login');
        }

    }

    public function recomended()
    {

        $datalist = array(

            'product_id'     => $this->input->post('product_id'),
            'user_id'        => $this->session->userdata('front_sess')['userid'],
            'entry_date'     => date('Y-m-d'),

            'recomended_url' => $this->input->post('comment'),

        );

        if ($this->session->userdata('front_sess')['userid'] != '') {

            $this->General_model->show_data_id('recomended', '', '', 'insert', $datalist);
            $this->session->set_flashdata('message', 'Url Submited successful.');
            redirect('search');
        } else {
            $this->session->set_flashdata('error', 'You have to login.');
            redirect('login');
        }

    }

    public function refine_by()
    {

        $seller_id = $this->input->get('seller_id');

        $refine_data = array(
            'seller_id' => $seller_id,
        );

        $this->session->set_userdata($refine_data);

//$this->session->userdata('username');

    }



    public function single_product()
    {

        $data['title'] = "product";

        $query= $this->General_model->show_data_id('view_product','','','get','');
        $this->load->view('header', $data);
        $this->load->view('single_product');
        $this->load->view('footer');
    }
public function get_latlong()

  {

      if($this->session->userdata('lat_long_chk')!=1){

          if($this->session->userdata('lat_long')['lat']!=$this->input->post('lat') && $this->session->userdata('lat_long')['long']!=$this->input->post('long')){

           $prepAddr1 = $this->input->post('lat').','.$this->input->post('long');

          $geocode111=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$this->input->post('lat').','.$this->input->post('long').'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');

          $output111= json_decode($geocode111);

          $data22 = $output111;

$add_array  = $data22->results;

$add_array = $add_array[0];

$add_array = $add_array->address_components;

$country = "";

$state = ""; 

$city = "";

foreach ($add_array as $key) {

  if($key->types[0] == 'administrative_area_level_2')

  {

    $city = $key->long_name;

  }

  if($key->types[0] == 'administrative_area_level_1')

  {

    $state = $key->long_name;

  }

  if($key->types[0] == 'country')

  {

    $country = $key->long_name;

  }

}

if($country){

    $this->session->set_userdata('country',$country);

}

if($state){

    $this->session->set_userdata('state',$state);

}

if($city){

    $this->session->set_userdata('city',$city);

}

          }

           

           

    $this->session->set_userdata('lat_long',$this->input->post());

      }

  }
  public function get_current_loc()

  {

    //$gg=https://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452&key=YOUR_API_KEY;

    $prepAddr1 = $this->input->post('lat').','.$this->input->post('long');

          //$geocode1=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$prepAddr1.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');

         // $output1= json_decode($geocode1);

          //echo"<pre>";

          //print_r($output1);

         // echo $output1->results[0]->formatted_address;
    if($this->input->post('location_type')=='current'){
    	$this->session->set_userdata('curlat_long',$this->input->post());
    }else{
    $this->session->set_userdata('curlat_long','');	
    }
    
          

  }
}

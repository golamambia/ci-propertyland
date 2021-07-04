<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Adslist extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apanel/Model_users');
        $this->load->model('User_model');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->model('Adslist_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        //$this->load->helper('url');
        $this->load->helper(array('form','url'));
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }
	
	public function index()
	{
		//$user_id=$this->session->userdata('front_sess')['userid'];
		//$where="is_delete=0 and user_id='".$user_id."'";


		//$data['ads_list']=$this->Adslist_model->show_data_id('module_lbcontacts',$where);


		//$data['title']='Location';
		//$this->load->view('header');
		//$this->load->view('user_ads_list',$data);
		//$this->load->view('footer');

    $this->ad_list();
	}


//-------------------- ad pagination ---------------//

function ad_list($offset=0){

      $limit=50000;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $ads_list=$this->Adslist_model->ad_data_list($limit,$offset,$user_id);

      $total_rows=$this->Adslist_model->countall_ad_data($user_id);

      //echo $total_rows;

      $config["total_rows"]=$total_rows;
      $config["per_page"]=$limit;
      $config["uri_segment"]=3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');


      if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
      //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

      if(count($_GET) > 0){
        $config['first_url'] = site_url("adslist/ad_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("adslist/ad_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();


        $title="Location";

        $this->load->view('header',compact('ads_list','page_link','title'));

        $this->load->view('user_ads_list');

        $this->load->view('footer');

      //$this->load->view("admin/enquiry_list",compact('enquiry_list','page_link','profile','logo'));
    }

//-------------------- ad pagination ---------------//



	public function ads_del($id){
$user_id=$this->session->userdata('front_sess')['userid'];
		$where="ppt_id='".$id."' and ppt_createdBy='".$user_id."'";
		$query=$this->Adslist_model->ads_del('propertypost_table',$where,$id);

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('Adslist');
	}



        



    public function edit_ad()

    {
      $userid=$this->session->userdata('front_sess')['userid'];

        $id = base64_decode($this->input->get('id'));
        $where=array(
          'ppt_isDelete'=>0,
          'ppt_createdBy'=>$userid
        );
         
        $data['single_info']=$this->General_model->show_data_id('propertypost_table',$id,'ppt_id','get','',$where);
        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');
        if($data['single_info'][0]->ppt_createdBy!=$userid){
          redirect('/'); 
        }
       
        $data['title']="Post update view";

        //echo "<pre>"; print_r($data); exit();

        $this->load->view('header',$data);

        $this->load->view('edit_lbc_add');

        $this->load->view('footer');

    }

        public function single_add()

    {

       
//------------------..----------------//        

        $id = base64_decode($this->input->get('id'));

        $query=$this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactid','get','');

        $data['result']=$query;
    
            
    $g_catid=$data['result'][0]->cat_name;
         $sub_catid=$data['result'][0]->sub_cat;
       $data['catlist']=$this->General_model->show_data_id('category',$g_catid,'id','get','');
       $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       $data['countrylist']=$this->General_model->show_data_id('country','','','get','');
       $data['category_title']=$data['catlist'][0]->name;
        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

        $c_id=$data['result'][0]->country;

        //$data['add_country']=$this->General_model->show_data_id('country',$c_id,'id','get','');

        $data['statelist']=$this->General_model->show_data_id('state',$c_id,'countryid','get','');

        $s_id=$data['result'][0]->state;

        $data['citylist']=$this->General_model->show_data_id('cities',$s_id,'state_id','get','');

        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

        $c_id=$data['result'][0]->country;

        $data['add_country']=$this->General_model->show_data_id('country',$c_id,'id','get','');

        $state_id=$data['result'][0]->state;

        $data['add_state']=$this->General_model->show_data_id('state',$state_id,'sid','get','');

        $s_id=$data['add_state'][0]->sid;

        $city_id=$data['result'][0]->city;

        $data['add_city']=$this->General_model->show_data_id('cities',$city_id,'cid','get','');

        $cat_id=$data['result'][0]->cat_name;
        $sub_cat_id=$data['result'][0]->sub_cat;

        $data['category']=$this->General_model->show_data_id('category',$cat_id,'id','get','');

        $data['sub_category']=$this->General_model->show_data_id('subcategory',$sub_cat_id,'sid','get','');

    $data['cover_area']=$this->General_model->show_data_id('covering_area',$data['result'][0]->cover_area,'cov_id','get','');
        //$data['category']=$this->General_model->show_data_id('event_category','','','get','');
       //print_r($query);

    $data['val']=$this->General_model->show_data_id('delivery_location',$id,'post_id','get','');

    $arri_country=$data['result'][0]->depairport_country;

    $dep_coun=$data['result'][0]->arrival_country;

    $data['arrival_country']=$this->General_model->show_data_id('country',$arri_country,'countrycode','get','');

    $data['dep_country']=$this->General_model->show_data_id('country',$dep_coun,'countrycode','get','');

    

        $data['title']="lbc || single ad";

        //echo "<pre>"; print_r($data); exit();

        $this->load->view('header',$data);

        $this->load->view('lbc_single_add');

        $this->load->view('footer');

    }

  function remove_location(){
 
      $id = $this->input->post('id');


      $query= $this->General_model->show_data_id('delivery_location',$id,'dl_id','delete','');

      if($query){

        
        $this->session->set_flashdata('message', 'Delivery Location successfully Deleted');
      }


 }

    public function get_multiimage()

    {

         $event_id=$_POST['val2'];

         $id=$_POST['val'];

         $img=$this->General_model->show_data_id('module_lbcontacts_part',$id,'id','get','');  

        $path=base_url()."uploads/module_file/".$img[0]->multi_image;

        $query=$this->General_model->show_data_id('module_lbcontacts_part',$id,'id','delete','');

       

    if ($query){ 

            if (file_exists($path)){

            unlink("uploads/module_file/".$img[0]->multi_image);

     }

        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$event_id,'lbcontact_id','get','');  

        echo $tt= $this->load->view('get_multiimage',$data,true);

    }



  }



      public function edit_post($id)

    {     

     

     
         
    $user_id=$this->session->userdata('front_sess')['userid'];
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
      //print_r($this->input->post());
      //exit();
    $this->form_validation->set_rules('ppt_property_for','Property for','required');
    $this->form_validation->set_rules('ppt_property_type','Property type','required');
    $this->form_validation->set_rules('ppt_property_category','Property category','required');
    $this->form_validation->set_rules('ppt_title','Title','required');
    $this->form_validation->set_rules('ppt_available_from','Available from','required');
    $this->form_validation->set_rules('ppt_details','Property Details','required');
    $this->form_validation->set_rules('ppt_total_price','Total price','required');
    $this->form_validation->set_rules('ppt_property_status','Property Status','required');
    $this->form_validation->set_rules('address','Property Address','required');
    $this->form_validation->set_rules('landmark','Landmark','required');
//     if (empty($_FILES['image1']['name']))
// {
//     $this->form_validation->set_rules('image1', 'Main Photo', 'required');
// }
   if ($this->input->post('ppt_property_category')=='individual')
{
    $this->form_validation->set_rules('ppt_land_area','Property Address','required');
    $this->form_validation->set_rules('ppt_land_unit','Landmark','required');
    $this->form_validation->set_rules('ppt_facing', 'Main Photo', 'required');
}
     if ($this->input->post('ppt_property_category')=='individual' && $this->input->post('ppt_property_type')=='apartment_flat')
{
    $this->form_validation->set_rules('ppt_builtup_area','ppt_builtup_area','required');
    $this->form_validation->set_rules('ppt_builtup_unit','ppt_builtup_unit','required');
    $this->form_validation->set_rules('ppt_carpet_area', 'ppt_carpet_area', 'required');
    $this->form_validation->set_rules('ppt_carpet_unit','ppt_carpet_unit','required');
    $this->form_validation->set_rules('ppt_bedroom_count','bedRooms','required');
    $this->form_validation->set_rules('ppt_bathroom_count', 'ppt_bathroom_count', 'required');
    $this->form_validation->set_rules('ppt_floor_number','ppt_floor_number','required');
    $this->form_validation->set_rules('ppt_furnishing','ppt_furnishing','required');
    $this->form_validation->set_rules('ppt_4wheeler_count', 'ppt_4wheeler_count', 'required');
    $this->form_validation->set_rules('ppt_2wheeler_count', 'ppt_2wheeler_count', 'required');
     //$this->form_validation->set_rules('ppt_gated', 'ppt_gated', 'required');
}else if ($this->input->post('ppt_property_category')=='individual' && $this->input->post('ppt_property_type')=='farm_agriculture')
{
   $this->form_validation->set_rules('ppt_builtup_area','ppt_builtup_area','required');
    $this->form_validation->set_rules('ppt_builtup_unit','ppt_builtup_unit','required');
    $this->form_validation->set_rules('ppt_carpet_area', 'ppt_carpet_area', 'required');
    $this->form_validation->set_rules('ppt_carpet_unit','ppt_carpet_unit','required');
    $this->form_validation->set_rules('ppt_land_l','ppt_land_l','required');
    $this->form_validation->set_rules('ppt_land_b','ppt_land_b','required');
    
}else if($this->input->post('ppt_property_category')=='individual' && $this->input->post('ppt_property_type')=='plot'){
$this->form_validation->set_rules('ppt_builtup_area','ppt_builtup_area','required');
    $this->form_validation->set_rules('ppt_builtup_unit','ppt_builtup_unit','required');
    $this->form_validation->set_rules('ppt_carpet_area', 'ppt_carpet_area', 'required');
    $this->form_validation->set_rules('ppt_carpet_unit','ppt_carpet_unit','required');
    $this->form_validation->set_rules('ppt_land_l','ppt_land_l','required');
    $this->form_validation->set_rules('ppt_land_b','ppt_land_b','required');
    //$this->form_validation->set_rules('ppt_gated', 'ppt_gated', 'required');
}else if($this->input->post('ppt_property_category')=='individual' && $this->input->post('ppt_property_type')=='house_villa'){
$this->form_validation->set_rules('ppt_builtup_area','ppt_builtup_area','required');
    $this->form_validation->set_rules('ppt_builtup_unit','ppt_builtup_unit','required');
    $this->form_validation->set_rules('ppt_carpet_area', 'ppt_carpet_area', 'required');
    $this->form_validation->set_rules('ppt_carpet_unit','ppt_carpet_unit','required');
    $this->form_validation->set_rules('ppt_bedroom_count','bedRooms','required');
    $this->form_validation->set_rules('ppt_bathroom_count', 'ppt_bathroom_count', 'required');
    $this->form_validation->set_rules('ppt_floor_number','ppt_floor_number','required');
    $this->form_validation->set_rules('ppt_furnishing','ppt_furnishing','required');
    $this->form_validation->set_rules('ppt_4wheeler_count', 'ppt_4wheeler_count', 'required');
    $this->form_validation->set_rules('ppt_2wheeler_count', 'ppt_2wheeler_count', 'required');
    $this->form_validation->set_rules('ppt_land_l','ppt_land_l','required');
    $this->form_validation->set_rules('ppt_land_b','ppt_land_b','required');
    //$this->form_validation->set_rules('ppt_gated', 'ppt_gated', 'required');
}

    if($this->input->post('address')!=''){
           $prepAddr = str_replace(' ','+',$this->input->post('address'));
      
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          $latitude = $output->results[0]->geometry->location->lat;
          $longitude = $output->results[0]->geometry->location->lng;
          $add_array = $add_array->address_components;

$country = "";

$state = ""; 

$city = "";
$pincode="";
$add_array=$output->results[0]->address_components;

foreach ($add_array as $key) {
    if($key->types[0] == 'postal_code'){
                     //Return the zipcode   
                  $pincode=$key->long_name; 
                }

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
if($pincode==''){
$this->session->set_flashdata('error', 'Please give proper address!');

      redirect($_SERVER['HTTP_REFERER']);
}
        }
    //$this->form_validation->set_rules('image1', '','callback_file_check');

    if($this->form_validation->run()== FALSE){
     
   $this->session->set_flashdata('error', 'Sorry your update failed1');
      redirect($_SERVER['HTTP_REFERER']);
   //echo validation_errors();
    }else{

       
            if(!empty($_FILES['image1']['name'])){ 
                  $_FILES['file']['name'] = $_FILES['image1']['name'];
                  $_FILES['file']['type'] = $_FILES['image1']['type'];
                  $_FILES['file']['tmp_name'] = $_FILES['image1']['tmp_name'];
                  $_FILES['file']['error'] = $_FILES['image1']['error'];
                  $_FILES['file']['size'] = $_FILES['image1']['size'];     
                  //$config['upload_path'] = 'uploads/restaurantImages/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = time().$_FILES['image1']['name'];
                  $this->load->library('upload',$config);  

                 $filename =$config['file_name'];
                $_POST['ppt_main_img']=$filename;
 $location = "uploads/module_file/".$filename;
           
    $this->compressImage($_FILES['image1']['tmp_name'],$location,50);
                  
                }
            $_POST['ppt_updatedBy'] =$user_id;
            //date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
            //$_POST['date_time'] =$today;
            //$_POST['ppt_createdAt'] =date('Y-m-d');
             $_POST['ppt_updatedAt'] =date('Y-m-d');
             $_POST['ppt_country']=$country;
        $_POST['ppt_state']=$state;
        $_POST['ppt_city']=$city;
        $_POST['ppt_pincode']=$pincode;
        $_POST['ppt_latitude']=$latitude;
        $_POST['ppt_longitude']=$longitude;
        $_POST['ppt_property_address']=$this->input->post('address');
        $_POST['ppt_landmark']=$this->input->post('landmark');
         if($this->input->post('ppt_broker_need')){
            $_POST['ppt_broker_need']=1;
          
            }else{
               $_POST['ppt_broker_need']=0; 
            }

             if($this->input->post('ppt_corner')){
            $_POST['ppt_corner']=1;
          
            }else{
               $_POST['ppt_corner']=0; 
            }

             if($this->input->post('ppt_gated')){
            $_POST['ppt_gated']=1;
          
            }else{
               $_POST['ppt_gated']=0; 
            }

             if($this->input->post('ppt_jointdev')){
            $_POST['ppt_jointdev']=1;
          
            }else{
               $_POST['ppt_jointdev']=0; 
            }

            
            $query= $this->General_model->show_data_id('propertypost_table',$id,'ppt_id','update',$this->input->post());

//-------------curse add----------------//



            $filename = $_FILES['upload_img']['name'];
            $file_tmp = $_FILES['upload_img']['tmp_name'];
            $filetype = $_FILES['upload_img']['type'];
            $filesize = $_FILES['upload_img']['size'];
    if($query){
      $this->session->set_flashdata('message', 'Data successfully Saved');
      for($i=0; $i<count($file_tmp); $i++){

        $_FILES['file']['name']     = $_FILES['upload_img']['name'][$i];
        $_FILES['file']['type']     = $_FILES['upload_img']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['upload_img']['tmp_name'][$i];
        $_FILES['file']['error']     = $_FILES['upload_img']['error'][$i];
        $_FILES['file']['size']     = $_FILES['upload_img']['size'][$i];

if(!empty($file_tmp[$i])){
$arr=getimagesize($file_tmp[$i]);
$userfile_extn = end(explode(".", strtolower($filename[$i])));
if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" )){
$tmp_name = $file_tmp[$i];
$name = time()."_".$filename[$i];
//$new_name = time().$_FILES["img"]['name'];
            $config = array(
                'upload_path' => "module_file/",
                'upload_url' => base_url() . "module_file/",
                'allowed_types' => "jpg|png|jpeg",
                'file_name'=>$name
            );

            $this->load->library('upload', $config);
            //$this->upload->initialize($config);
            //$this->upload->do_upload('file');
//move_uploaded_file($tmp_name, base_url() . "uploads/".$name);
$image_nm = $name;
$location = "uploads/module_file/".$name;
           
    $this->compressImage($tmp_name,$location,50);
$datalist2 = array( 
                'lbcontact_id'      => $id,
                'multi_image'   => $image_nm,
                
            );

$this->General_model->show_data_id('module_lbcontacts_part','','','insert',$datalist2);

 }

}

}
redirect($_SERVER['HTTP_REFERER']);
    }else{
       $this->session->set_flashdata('error', 'Sorry your update failed2');
      redirect($_SERVER['HTTP_REFERER']);
    }

}
    
    }
  else{
     $this->session->set_flashdata('error', 'Sorry your update failed3');
   redirect($_SERVER['HTTP_REFERER']);
  }

    }

public function change_adstatus()

    {
        $user_id=$this->session->userdata('front_sess')['userid'];
        
    $adsid=$this->input->post('ads');
    $adst=$this->input->post('st');
    $get_data=$this->General_model->show_data_id('module_lbcontacts',$adsid,'lbcontactId','get','');
    
    if($get_data[0]->adstatus_byuser==0){
        $ads_status=1;
    }else{
        $ads_status=0;
    }
    
    
    
    
if($get_data[0]->user_id==$user_id){
    
    
    $datalist = array( 

                        'adstatus_byuser'      => $ads_status,

                    );
    $query= $this->General_model->show_data_id('module_lbcontacts',$adsid,'lbcontactId','update',$datalist);
    if($query){
        echo "success";
    }else{
        echo "wrong";
    }
    
}else{
    echo "wrong";
}


    }

	function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}
}

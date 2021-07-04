<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Lbcontacts extends CI_Controller {

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
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->helper("file");
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
        
    }
	
	public function index()
	{
	    $g_catid=base64_decode($this->input->get('module', TRUE));
        $sub_catid=base64_decode($this->input->get('submodule', TRUE));
	    $data['category_list']=$this->General_model->show_data_id('category','','','get','');
        $data['subcat_list']=$this->General_model->show_data_id('subcategory',$g_catid,'categoryid','get','');
        $user_ip =$_SERVER['REMOTE_ADDR']; 
$geo =  unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip) );

//print_r($geo);
        $data['country_get']=trim($geo["geoplugin_countryCode"]);
        $data['state_get']=trim($geo["geoplugin_region"]);
        $data['city_get']=trim($geo["geoplugin_city"]);


		$data['title']='The Property Land';


      $user_id=$this->session->userdata('front_sess')['userid'];

     
		$this->load->view('header',$data);
		$this->load->view('lbc_event_organizers');
		$this->load->view('footer');
  
	}

 



  public function lbcontacts_post(){
      
      	
    $user_id=$this->session->userdata('front_sess')['userid'];
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
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
    if (empty($_FILES['image1']['name']))
{
    $this->form_validation->set_rules('image1', 'Main Photo', 'required');
}
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
   // $this->form_validation->set_rules('ppt_gated', 'ppt_gated', 'required');
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
  //  $this->form_validation->set_rules('ppt_gated', 'ppt_gated', 'required');
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

       $this->load->view('header');
       $this->load->view('lbc_event_organizers',$data);
       $this->load->view('footer');
}
        }
    //$this->form_validation->set_rules('image1', '','callback_file_check');

    if($this->form_validation->run()== FALSE){
      $this->session->set_flashdata('error', 'Sorry ads post failed');
      //$this->index();
    $this->load->view('header',$data);
		$this->load->view('lbc_event_organizers');
		$this->load->view('footer');
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
            $_POST['ppt_createdBy'] =$user_id;
            //date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
            //$_POST['date_time'] =$today;
            $_POST['ppt_createdAt'] =date('Y-m-d');
             $_POST['ppt_updatedAt'] =date('Y-m-d');
               $_POST['ppt_valid_till'] =date('Y-m-d',strtotime("+1 day"));
             $_POST['ppt_country']=$country;
        $_POST['ppt_state']=$state;
        $_POST['ppt_city']=$city;
        $_POST['ppt_pincode']=$pincode;
        $_POST['ppt_latitude']=$latitude;
        $_POST['ppt_longitude']=$longitude;
        $_POST['ppt_property_address']=$this->input->post('address');
        $_POST['ppt_landmark']=$this->input->post('landmark');

            $query= $this->General_model->show_data_id('propertypost_table','','','insert',$this->input->post());

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
                'lbcontact_id'      => $query,
                'multi_image'   => $image_nm,
                
            );

$this->General_model->show_data_id('module_lbcontacts_part','','','insert',$datalist2);

 }

}

}
redirect($_SERVER['HTTP_REFERER']);
    }else{
       $this->session->set_flashdata('error', 'Sorry your post failed');
      redirect($_SERVER['HTTP_REFERER']);
    }

}
    
    }
  else{
     $this->session->set_flashdata('error', 'Sorry your post failed');
   redirect($_SERVER['HTTP_REFERER']);
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
  public function lat_long(){
      $address =$_POST['address'];
          $prepAddr = str_replace(' ','+',$address);
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          $latitude = $output->results[0]->geometry->location->lat;
          $longitude = $output->results[0]->geometry->location->lng;
          print_r($output);
  }

public function category(){

		$this->form_validation->set_rules('cat_name_modal','Category','required');
		$this->form_validation->set_rules('subcat_name_nodal','Sub-category','required');
		if($this->form_validation->run()==FALSE){
			$this->index();
		}else{
			$catid=base64_encode($this->input->post('cat_name_modal'));
			$subcat_name=base64_encode($this->input->post('subcat_name_nodal'));
			
			redirect('lbcontacts/index?module='.$catid.'&submodule='.$subcat_name);
		}
	}
    public function get_state(){
      if ($this->input->server('REQUEST_METHOD') == 'POST'){
         $country=$_POST['country'];
          $sub=$this->General_model->show_data_id('state',$country,'countryid','get','');
          //print_r($sub);
          echo json_encode($sub);
        }else{
          redirect('register');
        }
    }
    public function get_city(){
         if ($this->input->server('REQUEST_METHOD') == 'POST'){
         $state=$_POST['state'];
          $sub=$this->General_model->show_data_id('cities',$state,'state_id','get','');
          //print_r($sub);
          echo json_encode($sub);
        }else{
          redirect('register');
        }
    }

     public function file_check($str){

        $allowed_mime_type_arr = array('image/jpeg','image/jpeg','image/png');
        $mime = get_mime_by_extension($_FILES['image1']['name']);
        if(isset($_FILES['image1']['name']) && $_FILES['image1']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }




 public function add_course()

    {
       
      $_POST['institution_id'] = $this->input->post('institution_id');


    $query= $this->General_model->show_data_id('courses','','','insert',$this->input->post());

    if($query){
      $this->session->set_flashdata('message', 'Course Added Successfully');

       redirect($_SERVER['HTTP_REFERER']); 

         }

        

    }

    public function update_course()

    {
       
      $id = $this->input->post('id');


    $query= $this->General_model->show_data_id('courses',$id,'id','update',$this->input->post());

    if($query){
      $this->session->set_flashdata('message', 'Course Updated Successfully');

       redirect($_SERVER['HTTP_REFERER']); 

         }

        

    }


      function course_del($id){
 
      


      $query= $this->General_model->show_data_id('courses',$id,'id','delete','');

      if($query){

        
        $this->session->set_flashdata('message', 'Course successfully Deleted');

        redirect($_SERVER['HTTP_REFERER']);
      }


 }

 function course_list(){

        $title="Course List";

        $institution_id = $this->input->get('inst');

  $data['course_list']= $this->General_model->show_data_id('courses',$institution_id,'institution_id','get','');      

        $this->load->view('header',$data);

        $this->load->view('course_list');

        $this->load->view('footer');

      //$this->load->view("admin/enquiry_list",compact('enquiry_list','page_link','profile','logo'));
    }
















}

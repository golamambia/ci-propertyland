<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }

	public function index()
 	{
  //      $id=$this->session->userdata('front_sess')['userid'];
// 		$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
// 		$data['title']='TLB || Profile';
// 		$this->load->view('header');
// 		$this->load->view('profile',$data);
// 		$this->load->view('footer');
    $this->Update();
	}
	public function Update()
	{	
	
		$id=$this->session->userdata('front_sess')['userid'];
		$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['title']='User || Profile';
		$this->load->view('header');
		$this->load->view('update_profile',$data);
		$this->load->view('footer');
	}
	public function Update_post()
    {
    	$id=$this->session->userdata('front_sess')['userid'];
	
	$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['title']='TLB || Profile';
      if($this->input->post('user_type')){
         if($this->input->post('user_type')!='agent' && $this->input->post('change_chk')){
                  $_POST['identity_proof']='';
                   $_POST['office_photo']='';
                }
        $usertype=$this->input->post('user_type');
      }else{
        $usertype=$data['user_info'][0]->user_type;
      }
        $this->form_validation->set_rules('name', 'Name', 'required');
        //$this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        //$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        //$this->form_validation->set_rules('address', 'Address', 'required');
        if($usertype=='agent'){
            $this->form_validation->set_rules('address','address','required');
            $this->form_validation->set_rules('landmark','Landmark','required');
            $this->form_validation->set_rules('agent_service','Agent service','required');
            
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

       $this->Update();
}
        }
        }
        if($usertype!='individual'){
            $this->form_validation->set_rules('office_project_name','Project name','required');
            
        }
        
        if ($this->form_validation->run() == FALSE) 
        {
            //$this->session->set_flashdata('error', 'Data  save failed');
        //    $this->load->view('header');
        // $this->load->view('register',$data);
        // $this->load->view('footer');
           $this->Update();

        }else{
            
        if(!empty($_FILES['photo']['name'])){ 
                  $_FILES['file']['name'] = $_FILES['photo']['name'];
                  $_FILES['file']['type'] = $_FILES['photo']['type'];
                  $_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'];
                  $_FILES['file']['error'] = $_FILES['photo']['error'];
                  $_FILES['file']['size'] = $_FILES['photo']['size'];     
                  $config['upload_path'] = 'uploads/restaurantImages/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = time().$_FILES['photo']['name'];
                 // $this->load->library('upload',$config);  

                 $filename =time().$_FILES['photo']['name'];
                $_POST['user_photo']=$filename;
 $location = "uploads/register/".$filename;
           
    $this->compressImage($_FILES['photo']['tmp_name'],$location,50);
                  
                }
                if(!empty($_FILES['photo2']['name'])){ 
                  $_FILES['file']['name'] = $_FILES['photo2']['name'];
                  $_FILES['file']['type'] = $_FILES['photo2']['type'];
                  $_FILES['file']['tmp_name'] = $_FILES['photo2']['tmp_name'];
                  $_FILES['file']['error'] = $_FILES['photo2']['error'];
                  $_FILES['file']['size'] = $_FILES['photo2']['size'];     
                  $config['upload_path'] = 'uploads/restaurantImages/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = time().$_FILES['photo2']['name'];
                  $this->load->library('upload',$config);  

                 $filename =$config['file_name'];
                $_POST['identity_proof']=$filename;
 $location = "uploads/register/".$filename;
           
    $this->compressImage($_FILES['photo2']['tmp_name'],$location,50);
                  
                }
                if(!empty($_FILES['photo3']['name'])){ 
                  $_FILES['file']['name'] = $_FILES['photo3']['name'];
                  $_FILES['file']['type'] = $_FILES['photo3']['type'];
                  $_FILES['file']['tmp_name'] = $_FILES['photo3']['tmp_name'];
                  $_FILES['file']['error'] = $_FILES['photo3']['error'];
                  $_FILES['file']['size'] = $_FILES['photo3']['size'];     
                  $config['upload_path'] = 'uploads/restaurantImages/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = time().$_FILES['photo3']['name'];
                  $this->load->library('upload',$config);  

                 $filename =$config['file_name'];
                $_POST['office_photo']=$filename;
 $location = "uploads/register/".$filename;
           
    $this->compressImage($_FILES['photo3']['tmp_name'],$location,50);
                  
                }

                $_POST['country']=$country;
        $_POST['state']=$state;
        $_POST['city']=$city;
        $_POST['pincode']=$pincode;
        $_POST['latitude']=$latitude;
        $_POST['longitude']=$longitude;
        $_POST['updated_date']=date('Y-m-d');
        	$query= $this->General_model->show_data_id('user_table',$id,'id','update',$this->input->post());
    if($query){

        $this->session->set_flashdata('message', 'Data successfully updated');
       redirect('profile/update');
       }else{
        $this->session->set_flashdata('error', 'Sorry your update failed');
        redirect('profile/update');
       } 
    
}
}

function compressImage($source, $destination, $quality,$imgx=NULL,$imgy=NULL) {

  $source_properties = getimagesize($source);

  if ($source_properties['mime'] == 'image/jpeg') 
    $image_resource_id = imagecreatefromjpeg($source);

  elseif ($source_properties['mime'] == 'image/gif') 
    $image_resource_id = imagecreatefromgif($source);

  elseif ($source_properties['mime'] == 'image/png') 
    $image_resource_id = imagecreatefrompng($source);

  if($imgx && $imgy){
  $target_layer = $this->fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
    imagejpeg($target_layer, $destination, $quality); 
  }else{
    imagejpeg($image_resource_id, $destination, $quality);
  }
  

}
function fn_resize($image_resource_id,$width,$height) {
$target_width =200;
$target_height =200;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}

}

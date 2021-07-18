<?php
ob_start();
class Settings extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('staff_panel/Model_users');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('is_logged_in_stf')==1)
        {
            redirect('staff_panel', 'refresh');
        }
      
    }

	public function profile()
	{   
        $userid=$this->session->userdata('logged_in_stf')['staff_id'];
        $data['country_list']=$this->General_model->show_data_id('country','','','get','');
         
    $data['user']=$this->db->query("SELECT st.* FROM staff_table as st WHERE st.id=".$userid." ")->result();
    $data['manager_list']=$this->db->query("SELECT st.* FROM staff_table as st WHERE st.id=".$data['user'][0]->manager_name." ")->result();
        $data['state_list']=$this->General_model->show_data_id('state', $data['user'][0]->country,'countryid','get','');
        
		$data['title']="Staff || Profile";
		$this->load->view('staff_panel/header',$data);
		$this->load->view('staff_panel/profile');
		$this->load->view('staff_panel/footer');
	}
     public function staff_edit_post()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('pincode', 'pincode', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect($_SERVER['HTTP_REFERER']);

        }else{
           if(!empty($_FILES['photo']['name'])){ 
                 
                 $filename =time().$_FILES['photo']['name'];
                $_POST['profile_photo']=$filename;
 $location = "uploads/staff/".$filename;
           
    $this->compressImage($_FILES['photo']['tmp_name'],$location,50);
                  
                }
                if(!empty($_FILES['photo2']['name'])){ 
                 
                 $filename =time().$_FILES['photo2']['name'];
                $_POST['photo_id_proof']=$filename;
 $location = "uploads/staff/".$filename;
           
    $this->compressImage($_FILES['photo2']['tmp_name'],$location,50);
                  
                }
                if(!empty($_FILES['photo3']['name'])){ 
                 
                 $filename =time().$_FILES['photo3']['name'];
                $_POST['address_id_proof']=$filename;
 $location = "uploads/staff/".$filename;
           
    $this->compressImage($_FILES['photo3']['tmp_name'],$location,50);
                  
                }
            
            $userid=$this->session->userdata('logged_in_stf')['staff_id'];
        $_POST['password']=md5($this->input->post('pass'));
     $_POST['pass_view'] = $this->input->post('pass');
        $query= $this->General_model->show_data_id('staff_table',$userid,'id','update',$this->input->post());
   
    if($query){
 $this->session->set_flashdata('message', 'Data successfully updated');
    }else{
        $this->session->set_flashdata('error', 'Data  update failed');
    }
      
        }  
        redirect($_SERVER['HTTP_REFERER']);
    }

   
    

public function change_password()
    {   
	
        $query=$this->General_model->show_data_id('staff_table','','','get','');
        $data['change_pass']=$query;
        
        $data['title']="Staff || Profile";
        $this->load->view('staff_panel/header',$data);
        $this->load->view('staff_panel/change_password');
        $this->load->view('staff_panel/footer');
    }

    public function update_password()
    {
    	$userid=$this->session->userdata('logged_in_stf')['staff_id'];
         $this->form_validation->set_rules('con_pass', 'Password', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required|matches[con_pass]');


       if ($this->form_validation->run() == false) 
        {
            $this->session->set_flashdata('error', 'Password and Confirm Password do not matched !');
            //echo validation_errors();
             redirect('staff_panel/settings/change_password');    
        }
        else
        {
            $old_password=$this->input->post('old_password');  
            $old_pass=md5($this->input->post('old_pass'));  
            $new_pass=md5($this->input->post('password'));
        
          if($old_password==$old_pass)
          {     
            $data=array(
             'password'=>$new_pass,
              'pass_view'=>$this->input->post('password') 
             ); 
            $query=$this->General_model->show_data_id('staff_table',$userid,'id','update',$data);
            $this->session->set_flashdata('success', 'Password Changed successfully.');
            redirect('staff_panel/settings/change_password');         
          }
          else
          {
            $this->session->set_flashdata('error', 'Current Password do not matched !');
            redirect('staff_panel/settings/change_password'); 
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


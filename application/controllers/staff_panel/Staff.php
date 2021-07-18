<?php
ob_start();
class Staff extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->library("PhpMailerLib");
        $this->load->model('General_model');
        //$this->load->model('Staff_model');
        $this->load->helper('url');
        $this->load->helper('string');
        //$this->load->helper('custom');
       if(!$this->session->userdata('is_logged_in_stf')==1)
        {
            redirect('staff_panel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
         $userid=$this->session->userdata('logged_in_stf')['staff_id'];
		$data['datatable']=$this->db->query("SELECT d.name as manager,st.*,c.countryname FROM staff_table as st LEFT JOIN country as c on(st.country=c.id) left join staff_table d on d.id=st.manager_name WHERE st.id!='' and st.manager_name=".$userid."")->result();
        
       //echo $this->db->last_query();
        $data['title']="Staff || List";

        //echo "<pre>"; print_r($data); exit();

		$this->load->view('staff_panel/header',$data);
		$this->load->view('staff_panel/stafflist');
		$this->load->view('staff_panel/footer');
	}

   
	
	//========================= Edit Admin =================================
	public function staff_edit($id)
	{
        $userid=$this->session->userdata('logged_in_stf')['staff_id'];
        $data['country_list']=$this->General_model->show_data_id('country','','','get','');
         $data['manager_list']=$this->General_model->show_data_id('staff_table',$userid,'manager_name','get','');
		$data['user']=$this->db->query("SELECT st.* FROM staff_table as st WHERE st.id=".$id." and st.manager_name=".$userid."")->result();
		
        $data['state_list']=$this->General_model->show_data_id('state', $data['user'][0]->country,'countryid','get','');
		$data['title']="Staff || Edit";
        $this->load->view('staff_panel/header',$data);
        $this->load->view('staff_panel/staff_edit');
        $this->load->view('staff_panel/footer');
	}

    

    public function staff_edit_post($id)
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
            
            
        $_POST['password']=md5($this->input->post('pass'));
     $_POST['pass_view'] = $this->input->post('pass');
        $query= $this->General_model->show_data_id('staff_table',$id,'id','update',$this->input->post());
   
    if($query){
 $this->session->set_flashdata('message', 'Data successfully updated');
    }else{
        $this->session->set_flashdata('error', 'Data  update failed');
    }
      
        }  
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function industry_selection_edit_post($id)
    {
        $this->form_validation->set_rules('industry', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/staff/industry_selection_edit/'.$id);

        }else{
            $datalist = array( 
                'industry'      => $this->input->post('industry')
            );
            
        
        $query= $this->General_model->show_data_id('industry_selection',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully updated');

       redirect('apanel/staff/industry_selection_edit/'.$id); 
        }  
    }

public function staff_add()
    {
        $data['country_list']=$this->General_model->show_data_id('country','','','get','');
       
        $data['title']="Staff || Registration";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/staff_add');
        $this->load->view('apanel/footer');
    }

public function industry_selection_add()
    {      
        $data['title']="industry selection";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/industry_selection_add');
        $this->load->view('apanel/footer');
    }    

    public function staff_add_post()
    {
       

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
         $this->form_validation->set_rules('user_type', 'user_type', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/staff/staff_add');

        }else{
            $email=$this->input->post('email');
        $RowCount= $this->General_model->RowCount('staff_table','email',$email);
        if($RowCount>0){
            $this->session->set_flashdata('error', 'Email already exist!');

       redirect('apanel/staff/staff_add'); 
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
             $rand='PHS'.rand (0,9999999);
     $_POST['password']=md5($this->input->post('pass'));
     $_POST['pass_view'] = $this->input->post('pass');
        $_POST['reference_id']=$rand;
        $_POST['mail_verification']='Inactive';
    $query= $this->General_model->show_data_id('staff_table','','','insert',$this->input->post());
    if($query>0){
        $actv=$rand.'AMB'.$query;
    $this->session->set_flashdata('message', 'Data successfully Saved');
 
        $log       = base_url(). "staff_panel/main/log_status?activation=".base64_encode($actv);
    $mail = $this->phpmailerlib->load();
    $subject   = "Registration Successful with us";
               
                $mail_body = '<html><body>';
                $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                $mail_body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $this->input->post('name') . "</td></tr>";
                $mail_body .= "<tr><td><strong>Your Reference ID:</strong> </td><td>" . $rand . "</td></tr>";
                
                $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $this->input->post('email') . "</td></tr>";
                //$mail_body .= "<tr ><td><strong>Password:</strong> </td><td>" . $this->input->post('password') . "</td></tr>";
                $mail_body .= "<tr><td><strong>Activation link:</strong> </td><td> <a href='" . $log . "'>Click here to verify your email address</a></td></tr>";
                $mail_body .= "</table>";
                $mail_body .= "</body></html>";
                $mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>Property Handshake</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
                //$name=$_POST["name"];
                
                $mail->IsSMTP();
               $mail->Host = $this->config->item('mlHost');
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = $this->config->item('mlUsername');
                $mail->Password = $this->config->item('mlPassword');
              $mail->From = $this->config->item('from');
                $mail->FromName = "Registration Successful - " . $this->input->post('name');
                
                //$mail->AddAddress('wtm.golam@gmail.com');
                $mail->AddAddress($this->input->post('email'));
                $mail->WordWrap = 5;
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $mail_body;
                $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
                $mail->Send();


       redirect('apanel/staff/staff_add');
       }else{
        $this->session->set_flashdata('error', 'Sorry registration failed');
        redirect('apanel/staff/staff_add');
       }  
        } 
        } 
    }
	//========================= End Edit Admin =================================



public function industry_selection_add_post()
    {
       

        $this->form_validation->set_rules('industry', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/staff/industry_selection_add');

        }else{
            
            
        $query= $this->General_model->show_data_id('industry_selection','','','insert',$this->input->post());
    
        $this->session->set_flashdata('message', 'Data successfully Saved');
        redirect('apanel/staff/industry_selection_add');
        
        
        } 
    }




	public function get_staffemail(){
        //echo $email;
        $email=$this->input->post('email');
       echo $query= $this->General_model->RowCount('staff_table','email',$email);
    }

	//========================= Delete Admin =================================
    public function staff_delete($id)
     { 
	    $query=$this->General_model->show_data_id('staff_table',$id,'id','delete','');

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/staff');
	
	 }
    //=========================End Delete Admin ================================= 

   public function industry_selection_delete($id)
     { 
        $query=$this->General_model->show_data_id('industry_selection',$id,'id','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/staff/industry_selection');
    
}

     public function get_state(){
      if ($this->input->server('REQUEST_METHOD') == 'POST'){
         $country=$_POST['country'];
          $sub=$this->General_model->show_data_id('state',$country,'countryid','get','');
          //print_r($sub);
          echo json_encode($sub);
        }
    }
    
    public function get_manager(){
      if ($this->input->server('REQUEST_METHOD') == 'POST'){
         $data='manager_staff';
          $sub=$this->General_model->show_data_id('staff_table',$data,'user_type','get','');
          //print_r($sub);
          echo json_encode($sub);
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


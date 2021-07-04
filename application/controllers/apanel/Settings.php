<?php
ob_start();
class Settings extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apanel/Model_users');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }
      
    }

	public function profile()
	{   
        $query=$this->General_model->show_data_id('admin_details','','','get','');
        $data['admin']=$query;
        
		$data['title']="Admin || Profile";
		$this->load->view('apanel/header',$data);
		$this->load->view('apanel/profile');
		$this->load->view('apanel/footer');
	}
    public function update_admin_user($id)
    {
        
       $this->form_validation->set_rules('admin_email', 'Admin Email', 'required');
        $this->form_validation->set_rules('username', 'Admin Username', 'required');
        $this->form_validation->set_rules('name', 'Admin name', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', validation_errors('<li>', '</li>'));
           redirect('apanel/settings/profile');

        }else{
            $datalist = array( 
                'username'      => $this->input->post('username'),
                'name'      => $this->input->post('name'),
                'company'     => $this->input->post('company'),
                'admin_email'   => $this->input->post('admin_email') 
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('admin_details',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully saved');

       redirect('apanel/settings/profile'); 
        }  

    }

     public function general()
    {   
        $query=$this->General_model->show_data_id('general_setting','','','get','');
        $data['admin']=$query;
        
        $data['title']="Admin || Settings";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/general');
        $this->load->view('apanel/footer');
    }

    public function general_update($id)
    {  

 if(!empty($_FILES['picture']['name'])){
    $tm=time();
    $new_name = time().$_FILES["picture"]['name'];

                $config['upload_path'] ='uploads/logo/';
                 $config['upload_url'] = base_url().'uploads/logo/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $new_name;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                     $picture = $new_name;
                    //exit();
                }else{
                   //echo $error =  $this->upload->display_errors();
                    $this->session->set_flashdata('error', 'Image upload only jpg|jpeg|png|gif');
                    $picture = $this->input->post('image');
                   
                }
            }else{
                $picture = $this->input->post('image');
            }

        $datalist = array( 
                'contact'      => $this->input->post('contact'),
                'email'      => $this->input->post('email'),
                'address'     => $this->input->post('address'),
                'facebook'      => $this->input->post('facebook'),
                'twitter'     => $this->input->post('twitter'),
                'logo'     => $picture,
                'linkedin'   => $this->input->post('linkedin') 
                //'status'        => $this->input->post('status'),
            );
            $datalist2 = array( 
               'admin_image'     => $picture
           );
            
        $this->General_model->show_data_id('admin_details',1,'id','update',$datalist2);
        $query= $this->General_model->show_data_id('general_setting',$id,'id','update',$datalist);
$this->session->set_flashdata('message', 'Data successfully saved');

       redirect('apanel/settings/general'); 
    }

public function change_password()
    {   

        $query=$this->General_model->show_data_id('admin_details','','','get','');
        $data['change_pass']=$query;
        
        $data['title']="Admin || Profile";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/change_password');
        $this->load->view('apanel/footer');
    }

    public function update_password()
    {
         $this->form_validation->set_rules('con_pass', 'Password', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required|matches[con_pass]');


       if ($this->form_validation->run() == false) 
        {
            $this->session->set_flashdata('error', 'Password and Confirm Password do not matched !');
            //echo validation_errors();
             redirect('apanel/settings/change_password');    
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
            $query=$this->General_model->show_data_id('admin_details',1,'id','update',$data);
            $this->session->set_flashdata('success', 'Password Changed successfully.');
            redirect('apanel/settings/change_password');         
          }
          else
          {
            $this->session->set_flashdata('error', 'Current Password do not matched !');
            redirect('apanel/settings/change_password'); 
          }     
      } 

    }

	
}


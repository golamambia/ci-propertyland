<?php
ob_start();
class Settings extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('manager_panel/Model_users');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('is_logged_in_mng')==1)
        {
            redirect('manager_panel', 'refresh');
        }
      
    }

	public function profile()
	{   
        $query=$this->General_model->show_data_id('staff_table','','','get','');
        $data['admin']=$query;
        
		$data['title']="Manager || Profile";
		$this->load->view('manager_panel/header',$data);
		$this->load->view('manager_panel/profile');
		$this->load->view('manager_panel/footer');
	}
    public function update_admin_user($id)
    {
        
       $this->form_validation->set_rules('admin_email', 'Admin Email', 'required');
        $this->form_validation->set_rules('username', 'Admin Username', 'required');
        $this->form_validation->set_rules('name', 'Admin name', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', validation_errors('<li>', '</li>'));
           redirect('manager_panel/settings/profile');

        }else{
            $datalist = array( 
                'username'      => $this->input->post('username'),
                'name'      => $this->input->post('name'),
                'company'     => $this->input->post('company'),
                'admin_email'   => $this->input->post('admin_email') 
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('staff_table',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully saved');

       redirect('manager_panel/settings/profile'); 
        }  

    }

   
    

public function change_password()
    {   

        $query=$this->General_model->show_data_id('staff_table','','','get','');
        $data['change_pass']=$query;
        
        $data['title']="Manager || Profile";
        $this->load->view('manager_panel/header',$data);
        $this->load->view('manager_panel/change_password');
        $this->load->view('manager_panel/footer');
    }

    public function update_password()
    {
         $this->form_validation->set_rules('con_pass', 'Password', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required|matches[con_pass]');


       if ($this->form_validation->run() == false) 
        {
            $this->session->set_flashdata('error', 'Password and Confirm Password do not matched !');
            //echo validation_errors();
             redirect('manager_panel/settings/change_password');    
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
            $query=$this->General_model->show_data_id('staff_table',1,'id','update',$data);
            $this->session->set_flashdata('success', 'Password Changed successfully.');
            redirect('manager_panel/settings/change_password');         
          }
          else
          {
            $this->session->set_flashdata('error', 'Current Password do not matched !');
            redirect('manager_panel/settings/change_password'); 
          }     
      } 

    }

	
}


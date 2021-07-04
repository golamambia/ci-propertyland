<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
	
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
        $this->load->model('General_model');
        $this->load->model('staff_panel/General_staff_model');
        $this->load->helper('url');
        $this->load->helper('string'); 
        $this->load->helper("file");
        if(!$this->session->userdata('is_logged_in_stf')==1)
        {
            redirect('staff_panel', 'refresh');
        }

        //Admin Access
        
    }
	
	public function index()
	{
	   echo $userid=$this->session->userdata('logged_in_stf')['staff_id'];
		$data['datatable']=$this->General_staff_model->show_data_id_join('notification','user_id','user_table','id','push_by',$userid);
		$data['user_list']=$this->General_model->show_data_id('user_table','','','get','');

		$data['title']='Notification Page';
		$this->load->view('staff_panel/header',$data);
		$this->load->view('staff_panel/notification');
		$this->load->view('staff_panel/footer');

	}
    public function notice_post()
    {
$userid=$this->session->userdata('logged_in_stf')['staff_id'];
        $this->form_validation->set_rules('user_id', 'Customer', 'required');
       $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('staff_panel/notification/'); 
            //echo 0;
        }else{
            date_default_timezone_set("Asia/Kolkata");
            $_POST['entry_date']=date('Y-m-d');
            $_POST['entry_time']=date('H:i:s');
             $_POST['push_from']='staff';
              $_POST['push_by']=$userid;
        $query= $this->General_model->show_data_id('notification','','','insert',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('staff_panel/notification/'); 
       //echo 1;
        } 
    }

    public function notice_edit($id)
    {

        $this->form_validation->set_rules('user_id', 'Customer', 'required');
       $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('staff_panel/notification/'); 
            //echo 0;
        }else{
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('notification',$id,'nid','update',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('staff_panel/notification/'); 
       //echo 1;
        } 
    }

    public function notice_delete($id)
     { 
        $query=$this->General_model->show_data_id('notification',$id,'nid','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('staff_panel/notification/');
    
     }

}

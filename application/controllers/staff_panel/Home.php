<?php
ob_start();
class Home extends CI_Controller {
    
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

	public function index()
	{   
        $user= $this->General_model->RowCount('user_table','','');
         $data['user']=$user;
		$data['title']="Dashboard || Abc";
		$this->load->view('staff_panel/header',$data);
		$this->load->view('staff_panel/dashboard');
		$this->load->view('staff_panel/footer');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('staff_panel/main/login');
    }
}


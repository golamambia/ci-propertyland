<?php
ob_start();
class Event extends CI_Controller {
    
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
         $this->load->helper('custom');
        // if(!$this->session->userdata('is_logged_in')==1)
        // {
        //     redirect('apanel', 'refresh');
        // }
      
    }

	public function index()
	{   

        // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;

		$data['title']="Point My Sport";
		$this->load->view('header',$data);
		$this->load->view('event');
		$this->load->view('footer');
	}
    
    public function details()
    {   
        // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
        $data['title']="Point My Sport";
        $this->load->view('header',$data);
        $this->load->view('login');
        $this->load->view('footer');
    }


}


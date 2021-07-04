<?php
ob_start();
class Users extends CI_Controller {
    
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

	public function register_user()
	{   $userid=$this->session->userdata('logged_in_stf')['staff_id'];
       $data['datatable']=$this->db->query("SELECT a.* FROM user_table as a WHERE a.tagged_staff_id=".$userid."")->result();
        
		$data['title']="User || Register";
		$this->load->view('staff_panel/header',$data);
		$this->load->view('staff_panel/userlist');
		$this->load->view('staff_panel/footer');
	}





}
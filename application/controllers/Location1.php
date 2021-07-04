<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

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
		$data['country_list']=$this->General_model->show_data_id('country','','','get','');
		$data['title']='Location';
		$this->load->view('header');
		$this->load->view('country',$data);
		$this->load->view('footer');
	}
	public function category(){

		$this->form_validation->set_rules('cat_name','Category','required');
		if($this->form_validation->run()==FALSE){
			$this->index();
		}else{
			$catid=base64_encode($this->input->post('cat_name'));
			// if($this->input->post()==15){

			// }
			redirect('lbcontacts/index?module='.$catid);
		}
	}
}

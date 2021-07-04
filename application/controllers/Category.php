<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
	    //echo "Testing KP";
		$data['module']=base64_decode($this->input->get('module', TRUE));
        $data['submodule']=base64_decode($this->input->get('submodule', TRUE));
		$data['category_list']=$this->General_model->show_data_id('category','','','get','');
		$data['subcatlist']=$this->General_model->show_data_id('subcategory',$data['module'],'categoryid','get','');
		//print_r($data['category_list']);
		$data['title']='Category';
		$this->load->view('header');
		$this->load->view('category',$data);
		$this->load->view('footer');
	}
	public function category(){

		$this->form_validation->set_rules('cat_name','Category','required');
	//	$this->form_validation->set_rules('subcat_name','Sub-category','required');
		if($this->form_validation->run()==FALSE){
			$this->index();
		}else{
			$catid=base64_encode($this->input->post('cat_name'));
			$subcat_name=base64_encode($this->input->post('subcat_name'));
			// if($this->input->post()==15){

			// }
			redirect('lbcontacts/index?module='.$catid);
		}
	}

	public function get_sub(){
		 $catid=$_POST['cat'];
		  $sub=$this->General_model->show_data_id('subcategory',$catid,'categoryid','get','');
		  //print_r($sub);
		  echo json_encode($sub);
	}
}

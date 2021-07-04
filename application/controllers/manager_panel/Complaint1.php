<?php
ob_start();
class Complaint extends CI_Controller {

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
        $this->load->model('apanel/Complaint_model');
        //$this->load->model('Staff_model');
        $this->load->helper('url');
        $this->load->helper('string');
        //$this->load->helper('custom');
       if(!$this->session->userdata('is_logged_in_mng')==1)
        {
            redirect('manager_panel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
		$query=$this->Complaint_model->get_complaint();
        
        $data['datatable']=$query;

        $data['title']="Complaint || List";

        //echo "<pre>"; print_r($data); exit();

		$this->load->view('manager_panel/header',$data);
		$this->load->view('manager_panel/complaint-list');
		$this->load->view('manager_panel/footer');
	} 

    public function report_list()
    {
        $query=$this->Complaint_model->get_report();
        
        $data['datatable']=$query;

        $data['title']="Report || List";

        //echo "<pre>"; print_r($data); exit();

        $this->load->view('manager_panel/header',$data);
        $this->load->view('apanel/reportlist');
        $this->load->view('manager_panel/footer');
    }




}


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
if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
		$this->complaint_list();
	}
public function complaint_list()
    {
  $cmpid=base64_decode($this->input->get('ads',true));
  if(!$cmpid){
      redirect('apanel/home');
  }
$query=$this->Complaint_model->get_complaint($cmpid);
        
        $data['datatable']=$query;

        $data['title']="Complaint || List";

        //echo "<pre>"; print_r($data); exit();

        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/complaint-list');
        $this->load->view('apanel/footer');


    }

    public function report_list()
    {
        $tmpid=base64_decode($this->input->get('ads',true));
  if(!$tmpid){
      redirect('apanel/home');
  }
        $query=$this->Complaint_model->get_report($tmpid);
        
        $data['datatable']=$query;

        $data['title']="Report || List";

        //echo "<pre>"; print_r($data); exit();

        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/reportlist');
        $this->load->view('apanel/footer');
    }




}


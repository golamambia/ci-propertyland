<?php
ob_start();
class Home extends CI_Controller {
    
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
        // if(!$this->session->userdata('is_logged_in')==1)
        // {
        //     redirect('apanel', 'refresh');
        // }
      
    }

	public function index()
	{   
	     //$prepAddr = str_replace(' ','+','Torneågatan 29, 16479 Kista, Stockholm, Sweden');
	    //$prepAddr = str_replace('Torneågatan 29, 16479 Kista, Stockholm, Sweden');
          //$geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyB2SeHmp1FvzINvHTcOPOOgA5taFPNdaAw');
         // $output= json_decode($geocode);
          //print_r($output);
        $data['category_list']=$this->General_model->show_data_id('category','','','get','');
        $data['top_catlist']=$this->General_model->show_data_id('subcategory',1,'top_category','get','');
        $data['home_catlist']=$this->General_model->show_data_id('subcategory',1,'home_page','get','');
        $data['cover_area']=$this->General_model->show_data_id('covering_area','','','get','');
        $data['cover_area_list']=$this->General_model->show_data_id('covering_area','','','get','');
        //  $data['user']=$user;
		$data['title']="Home page";
		$this->load->view('header',$data);
		$this->load->view('index');
		$this->load->view('footer');
        //echo "Not now try later";
	}
    public function about()
    {   
        // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
        $data['title']="Point My Sport";
        $this->load->view('header',$data);
        $this->load->view('about');
        $this->load->view('footer');
    }

public function term()
    {   
        // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
        $data['title']="Term";
        $this->load->view('header',$data);
        $this->load->view('terms_conditions');
        $this->load->view('footer');
    }
    public function policy()
    {   
        // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
        $data['title']="Policy";
        $this->load->view('header',$data);
        $this->load->view('policy');
        $this->load->view('footer');
    }

	public function logout()
    {
        $this->session->sess_destroy();
        //redirect('main/login');
    }
}


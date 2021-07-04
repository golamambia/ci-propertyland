<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->helper('string');
        
        //Admin Access
        
    }
	public function policy()
	{

		 // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
        $data['title']="Policy";
        //$data['fb_login_url'] = $this->facebook->login_url();
        $this->load->view('header',$data);
        $this->load->view('policy');
        $this->load->view('footer');
	}

    public function terms()
    {

         // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
        $data['title']="Policy";
        //$data['fb_login_url'] = $this->facebook->login_url();
        $this->load->view('header',$data);
        $this->load->view('policy');
        $this->load->view('footer');
    }
	
	
	
	
	/***********************************************************/

	

	
	 
}

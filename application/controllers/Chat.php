<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

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
        $this->load->model('Adslist_model');
        $this->load->model('Notice_model');
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
	    $user_id=$this->session->userdata('front_sess')['userid'];

     
   $data['chat']=$this->General_model->chat_list($user_id);  
     $data['title']="Message list";

        $this->load->view('header',$data);

        $this->load->view('chat_list');

        $this->load->view('footer');
	}


  public function post_chat()
  {

   $user_id=$this->session->userdata('front_sess')['userid'];   
      
            $datalist = array( 
                'sender_id' => $user_id,
                'chat_text' => $this->input->post('qt_message'),
                'entry_date' => date('Y-m-d'), 
                'sender_type' => 'user'             
            );
            
        
        $query= $this->General_model->show_data_id('chat','','','insert',$datalist);
        $this->session->set_flashdata('message', 'Chat send successfully ');

       redirect('chat');        
  }

 


}
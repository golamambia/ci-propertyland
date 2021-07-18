<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        $this->load->model('User_model');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->model('Search_model');
         $this->load->model('Adsview_model');
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
		
	$data['title']='Message';
		$this->load->view('header');
		$this->load->view('message',$data);
		$this->load->view('footer');
	}
	
	public function post_message(){
	    
         $id=base64_decode($this->input->post('adsid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
          $today = date("Y-m-d H:i:s");
      $this->form_validation->set_rules('chat_message', 'Message', 'required');
        
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            
     $check_by=$this->General_model->RowCount('module_lbcontacts','lbcontactId',$id);
        if($check_by>0){
            	$where="is_delete=0 and lbcontactId='".$id."'";
		
		    $data['ads_view']=$this->Adsview_model->show_data_id('module_lbcontacts',$where);
            $_POST['from_user']=$user_id;
             $_POST['chat_adsid']=$id;
              $_POST['chat_entry_time']=$today;
              $_POST['to_user']=$data['ads_view'][0]->user_id;
              
            $query=$this->General_model->show_data_id('chat_master','','','insert',$this->input->post());
            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
        }else{
         echo"not";   
        }
        
        }
 
	}
	
	
}
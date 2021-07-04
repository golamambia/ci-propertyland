<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

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
        // $this->load->model('Adslist_model');
        $this->load->model('staff_panel/Quote_model');
         $this->load->model('staff_panel/Support_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        error_reporting(0);
        if(!$this->session->userdata('is_logged_in_mng')==1)
        {
            redirect('manager_panel', 'refresh');
        }

      
    }




    function ads_user_list(){ 
      //print_r($data);exit();



        $data['title']="Ads User List";

        $data['user']=$this->General_model->show_data_id('user_table','','','get','');

        $this->load->view('manager_panel/header',$data);

        $this->load->view('manager_panel/ads_user_list');

        $this->load->view('manager_panel/footer');

      
    }

    function staff_list(){ 
      //print_r($data);exit();



        $data['title']="Staff List";

        $data['user']=$this->General_model->show_data_id('staff_table','','','get','');

        $this->load->view('manager_panel/header',$data);

        $this->load->view('manager_panel/staff_list');

        $this->load->view('manager_panel/footer');

      
    }

    function chat(){ 
      //print_r($data);exit();

$sender_id=$this->input->get('chat_id');

        $data['title']="Chat";

        $data['chat']=$this->General_model->chat_list_admin($sender_id);

     $datalist = array(

       'view' => 1
     );

        $this->General_model->show_data_id('chat',$sender_id,'sender_id','update',$datalist);

        $this->load->view('manager_panel/header',$data);

        $this->load->view('manager_panel/chat');

        $this->load->view('manager_panel/footer');

      
    }


     function staff_chat(){ 
      //print_r($data);exit();

$sender_id=$this->input->get('chat_id');

        $data['title']="Chat";

        $data['chat']=$this->General_model->chat_list_staff($sender_id);

     $datalist = array(

       'view' => 1
     );

        $this->General_model->show_data_id('staff_chat',$sender_id,'sender_id','update',$datalist);

        $this->load->view('manager_panel/header',$data);

        $this->load->view('manager_panel/staff_chat');

        $this->load->view('manager_panel/footer');

      
    }


    public function post_chat()
  {

   $user_id=$this->session->userdata('logged_in_mng')['manager_id'];
      
            $datalist = array( 
                'sender_id' => $user_id,
                'chat_text' => $this->input->post('qt_message'),
                'entry_date' => date('Y-m-d'), 
                'sender_type' => 'manager',
                'reciver_id' => $this->input->post('reciver_id'),
                'entry_time' => time()           
            );
            
        
        $query= $this->General_model->show_data_id('chat','','','insert',$datalist);
        $this->session->set_flashdata('message', 'Chat send successfully ');

       redirect($_SERVER['HTTP_REFERER']);    
  }

   
//--------------------  pagination ---------------//


public function post_staff_chat()
  {

   $user_id=$this->session->userdata('logged_in_mng')['manager_id'];
      
            $datalist = array( 
                'sender_id' => $user_id,
                'chat_text' => $this->input->post('qt_message'),
                'entry_date' => date('Y-m-d'), 
                'sender_type' => 'manager',
                'reciver_id' => $this->input->post('reciver_id'),
                'entry_time' => time()           
            );
            
        
        $query= $this->General_model->show_data_id('staff_chat','','','insert',$datalist);
        $this->session->set_flashdata('message', 'Chat send successfully ');

       redirect($_SERVER['HTTP_REFERER']);    
  }


  function admin(){ 
      //print_r($data);exit();

$sender_id=$this->session->userdata('logged_in_mng')['manager_id'];

        $data['title']="Chat";

        $data['chat']=$this->General_model->chat_list_admin1($sender_id);

     $datalist = array(

       'view' => 1
     );

        $this->General_model->show_data_id('chat',$sender_id,'sender_id','update',$datalist);

        $this->load->view('manager_panel/header',$data);

        $this->load->view('manager_panel/admin_chat');

        $this->load->view('manager_panel/footer');

      
    }


    public function admin_post_chat()
  {

   $user_id=$this->session->userdata('logged_in_mng')['manager_id'];
      
            $datalist = array( 
                'sender_id' => $user_id,
                'chat_text' => $this->input->post('qt_message'),
                'entry_date' => date('Y-m-d'), 
                'sender_type' => 'manager',
                'receiver_id' => $this->input->post('reciver_id'),
                'entry_time' => time()           
            );
               
        $query= $this->General_model->show_data_id('team_chat','','','insert',$datalist);
        $this->session->set_flashdata('message', 'Chat send successfully ');

       redirect($_SERVER['HTTP_REFERER']);    
  }



}
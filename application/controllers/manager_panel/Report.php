<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
        $this->load->model('staff_panel/Report_model');
        $this->load->model('staff_panel/Complaint_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        error_reporting(0);
        if(!$this->session->userdata('is_logged_in_mng')==1)
        {
            redirect('manager_panel', 'refresh');
        }
      
    }
    
    
    public function index()
	{
	    //$user=$this->session->userdata('front_sess')['userid'];
        //$data['notice_list']=$this->General_model->show_data_id('notification',$user,'user_id','get','');
	
		//$data['title']='Notification Page';
		//$this->load->view('header',$data);
		//$this->load->view('notice_board');
		//$this->load->view('footer');
    
        $this->report_list();
	}



//--------------------  pagination ---------------//

function report_list($offset=0){

      $limit=10;

     

      $report_list=$this->Report_model->report_data_list($limit,$offset);

      $total_rows=$this->Report_model->countall_report_data();

      //echo $total_rows;

      $config["total_rows"]=$total_rows;
      $config["per_page"]=$limit;
      $config["uri_segment"]=3;


        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');


      if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
      //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

      if(count($_GET) > 0){
        $config['first_url'] = site_url("manager_panel/report/report_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("manager_panel/report/report_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();


        $title="Report Page";

        $this->load->view('manager_panel/header',compact('report_list','page_link','title'));

        $this->load->view('manager_panel/report_list');

        $this->load->view('manager_panel/footer');

      
    }
    
    public function reported_list(){
      
      
       
      $ads=base64_decode($this->input->get('ads',true));
     $chat_user=base64_decode($this->input->get('user',true));
      
     $data['ad_check']=$this->General_model->show_data_id('module_lbcontacts',$ads,'lbcontactId','get','');
      $ads_owner=$data['ad_check'][0]->user_id;
     $get_user=$this->General_model->show_data_id('user_table',$ads_owner,'id','get','');
       $data['user_list']=$this->Report_model->report_user_list($ads_owner,$ads);
       $data['ads_owner_list']=$this->General_model->show_data_id('user_table',$ads_owner,'id','get','');
        
       $data['chat_user_photo']=$this->Report_model->chat_user_photo($chat_user);
    if($ads && $chat_user){
       $data['msg_list']=$this->Report_model->report_msg_list($ads,$ads_owner,$chat_user);
      
    }
    
    
       $data['ads']=$ads;
   $data['user']=$chat_user;
        $data['title']="Report list";

        $this->load->view('manager_panel/header',$data);

        $this->load->view('manager_panel/report_chat_list');

        $this->load->view('manager_panel/footer'); 
    }
    
     function complaint_list($offset=0){

      $limit=10;

      $complaint_list=$this->Complaint_model->complaint_data_list($limit,$offset);

      $total_rows=$this->Complaint_model->countall_complaint_data();

      //echo $total_rows;

      $config["total_rows"]=$total_rows;
      $config["per_page"]=$limit;
      $config["uri_segment"]=3;


        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');


      if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
      //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

      if(count($_GET) > 0){
        $config['first_url'] = site_url("manager_panel/report/complaint_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("manager_panel/report/complaint_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();

        $title="Complaint Page";

        $this->load->view('manager_panel/header',compact('complaint_list','page_link','title'));

        $this->load->view('manager_panel/complaint_list');

        $this->load->view('staff_panel/footer');

      
    }
    
    public function complaint_msg_list(){
       
      
     $ads=base64_decode($this->input->get('ads',true));
     $chat_user=base64_decode($this->input->get('user',true));
     $data['ad_check']=$this->General_model->show_data_id('module_lbcontacts',$ads,'lbcontactId','get','');
     $ads_owner=$data['ad_check'][0]->user_id;
     $get_user=$this->General_model->show_data_id('user_table',$ads_owner,'id','get','');
       $data['user_list']=$this->Complaint_model->complaint_user_list($ads_owner,$ads);
       $data['ads_owner_list']=$this->General_model->show_data_id('user_table',$ads_owner,'id','get','');
        
       $data['chat_user_photo']=$this->Complaint_model->chat_user_photo($chat_user);
    if($ads && $chat_user){
       $data['msg_list']=$this->Complaint_model->complaint_msg_list($ads,$ads_owner,$chat_user);
       
    }
    
    
       
       $data['ads']=$ads;
   $data['user']=$chat_user;
        $data['title']="Complaint list";

        $this->load->view('manager_panel/header',$data);

        $this->load->view('manager_panel/complaint_chat_list');

        $this->load->view('manager_panel/footer'); 
    }
    
}
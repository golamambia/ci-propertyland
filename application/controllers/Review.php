<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

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
         $this->load->model('Adsview_model');
        $this->load->model('Review_model');
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
	    //$user=$this->session->userdata('front_sess')['userid'];
        //$data['notice_list']=$this->General_model->show_data_id('notification',$user,'user_id','get','');
	
		//$data['title']='Notification Page';
		//$this->load->view('header',$data);
		//$this->load->view('notice_board');
		//$this->load->view('footer');

        $this->review_list();
	}



//--------------------  pagination ---------------//

function review_list($offset=0){

      $limit=10;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $review_list=$this->Review_model->review_data_list($limit,$offset,$user_id);

      $total_rows=$this->Review_model->countall_review_data($user_id);

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
        $config['first_url'] = site_url("review/review_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("review/review_list"); 
  

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();

        $title="Review Page";

        $this->load->view('header',compact('review_list','page_link','title'));

        $this->load->view('review_list');

        $this->load->view('footer');

      
    }
    public function post_review(){
        $rvid=base64_decode($this->input->post('rvid'));
         $id=base64_decode($this->input->post('adsid'));
        //exit();
     $user_id=$this->session->userdata('front_sess')['userid'];
     //date_default_timezone_set("Asia/Kolkata");
          //$today = date("Y-m-d H:i:s");
      //$this->form_validation->set_rules('rv_name', 'Name', 'required');
        $this->form_validation->set_rules('rv_rate', 'Rating', 'required');
        //$this->form_validation->set_rules('qt_email', 'Email', 'required');
        $this->form_validation->set_rules('rv_message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            $where=" lbcontactId='".$id."' and adstatus_byuser=0 and  user_id='".$user_id."'";
            $check_userpost=$this->Adsview_model->RowCount('module_lbcontacts',$where);
          
            if($check_userpost<1){
     $check_by=$this->General_model->RowCount('module_lbcontacts','lbcontactId',$id);
        if($check_by>0){
           // $_POST['rv_userid']=$user_id;
             //$_POST['rv_adsid']=$id;
             // $_POST['rv_name']=$this->session->userdata('front_sess')['name'];
              //$_POST['rv_entry_date']=$today;
               
                $where_review=" rv_adsid='".$id."' and rv_userid='".$user_id."'";
            
             $query=$this->General_model->show_data_id('user_review',$rvid,'rv_id','update',$this->input->post());
            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
            
        }else{
         echo"not";   
        }}
        else{
          echo"user";  
        }
        }
        
 }
    
    }
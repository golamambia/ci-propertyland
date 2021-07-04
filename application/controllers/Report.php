<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
        // $this->load->model('Adslist_model');
        $this->load->model('Report_model');
        $this->load->model('Complaint_model');
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

        $this->report_list();
	}



//--------------------  pagination ---------------//

function report_list($offset=0){

      $limit=10;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $report_list=$this->Report_model->report_data_list($limit,$offset,$user_id);

      $total_rows=$this->Report_model->countall_report_data($user_id);

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
        $config['first_url'] = site_url("report/report_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("report/report_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();


        $title="Report Page";

        $this->load->view('header',compact('report_list','page_link','title'));

        $this->load->view('report_list');

        $this->load->view('footer');

      
    }
    
    public function reported_list(){
       
       $user_id=$this->session->userdata('front_sess')['userid'];
     $ads=base64_decode($this->input->get('ads',true));
     $chat_user=base64_decode($this->input->get('user',true));
     $data['ad_check']=$this->General_model->show_data_id('module_lbcontacts',$ads,'lbcontactId','get','');
     $get_user=$this->General_model->show_data_id('user_table',$user_id,'id','get','');
       $data['user_list']=$this->Report_model->report_user_list($user_id,$ads);
       
       $data['chat_user_photo']=$this->Report_model->chat_user_photo($chat_user);
    if($ads && $chat_user){
       $data['msg_list']=$this->Report_model->report_msg_list($ads,$user_id,$chat_user);
       $this->Report_model->message_unread_toread($ads,$user_id,$chat_user);
    }
    
    
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
        $this->form_validation->set_rules('rpt_message','Description','required');
   

    if($this->form_validation->run()== FALSE){
      $this->session->set_flashdata('error', 'Please try again');
     redirect('report/reported_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 

    }else{
        //echo "good";
        $_POST['rpt_name']=$get_user[0]->name;
        $_POST['rpt_email']=$get_user[0]->email;
        $_POST['rpt_phone']=$get_user[0]->phone;
        $_POST['rpt_userid']=$user_id;
        $_POST['rpt_adsid']=$ads;
        $_POST['rpt_adsuser']=$chat_user;
        $_POST['rpt_adsowner']=$data['ad_check'][0]->user_id;
        $_POST['rpt_entry_date']=date('Y-m-d H:i:s');
        $query=$this->General_model->show_data_id('table_report','','','insert',$this->input->post());
        if($query){
                redirect('report/reported_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 
            }else{
                 redirect('report/reported_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 
              $this->session->set_flashdata('error', 'Sorry message not send!');
            }
    }
    }
    
       
       $data['ads']=$ads;
   $data['user']=$chat_user;
        $data['title']="Report list";

        $this->load->view('header',$data);

        $this->load->view('report_chat_list');

        $this->load->view('footer'); 
    }

    function complaint_list($offset=0){

      $limit=10;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $complaint_list=$this->Report_model->complaint_data_list($limit,$offset,$user_id);

      $total_rows=$this->Report_model->countall_complaint_data($user_id);

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
        $config['first_url'] = site_url("report/complaint_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("report/complaint_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();

      

        


        $title="Report Page";

        $this->load->view('header',compact('complaint_list','page_link','title'));

        $this->load->view('complaint_list');

        $this->load->view('footer');

      
    }

public function complaint_msg_list(){
       
       $user_id=$this->session->userdata('front_sess')['userid'];
     $ads=base64_decode($this->input->get('ads',true));
     $chat_user=base64_decode($this->input->get('user',true));
     $data['ad_check']=$this->General_model->show_data_id('module_lbcontacts',$ads,'lbcontactId','get','');
     $get_user=$this->General_model->show_data_id('user_table',$user_id,'id','get','');
       $data['user_list']=$this->Complaint_model->complaint_user_list($user_id,$ads);
       
       $data['chat_user_photo']=$this->Complaint_model->chat_user_photo($chat_user);
    if($ads && $chat_user){
       $data['msg_list']=$this->Complaint_model->complaint_msg_list($ads,$user_id,$chat_user);
       $this->Complaint_model->message_unread_toread($ads,$user_id,$chat_user);
    }
    
    
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
        $this->form_validation->set_rules('cmp_message','Description','required');
   

    if($this->form_validation->run()== FALSE){
      $this->session->set_flashdata('error', 'Please try again');
     redirect('report/complaint_msg_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 

    }else{
        //echo "good";
        $_POST['cmp_name']=$get_user[0]->name;
        $_POST['cmp_email']=$get_user[0]->email;
        $_POST['cmp_phone']=$get_user[0]->phone;
        $_POST['cmp_userid']=$user_id;
        $_POST['cmp_adsid']=$ads;
        $_POST['cmp_adsuser']=$chat_user;
        $_POST['cmp_adsowner']=$data['ad_check'][0]->user_id;
        $_POST['cmp_entry_date']=date('Y-m-d H:i:s');
        $query=$this->General_model->show_data_id('table_complaint','','','insert',$this->input->post());
        if($query){
                redirect('report/complaint_msg_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 
            }else{
                 redirect('report/complaint_msg_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 
              $this->session->set_flashdata('error', 'Sorry message not send!');
            }
    }
    }
    
       
       $data['ads']=$ads;
   $data['user']=$chat_user;
        $data['title']="Complaint list";

        $this->load->view('header',$data);

        $this->load->view('complaint_chat_list');

        $this->load->view('footer'); 
    }

//--------------------  pagination ---------------//
public function update_report(){
          $id=base64_decode($this->input->post('noteid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
          $today = date("Y-m-d H:i:s");
      //exit();
       
     $where="rpt_adsuser='".$user_id."' and rpt_id='".$id."'";
		
		$data['ads_view']=$this->Report_model->show_data_id('table_report',$where);
        if($data['ads_view'][0]->rpt_id>0){
            	
            
              //$_POST['view_date']=$today;
              $_POST['rpt_view']=1;
            $query=$this->General_model->show_data_id('table_report',$id,'rpt_id','update',$this->input->post());
            if($query){
                echo"success~".countReport();
            }else{
              echo"fail";  
            }
            
        }
        
        
 }
public function delete_report(){
          $id=base64_decode($this->input->post('noteid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
      //exit();
       
     $where="rpt_userid='".$user_id."' and rpt_id='".$id."'";
		
		$data['ads_view']=$this->Report_model->show_data_id('table_report',$where);
        if($data['ads_view'][0]->rpt_id>0){
            	
            
             
              $_POST['rpt_delete']=1;
            $query=$this->General_model->show_data_id('table_report',$id,'rpt_id','update',$this->input->post());
            if($query){
                echo"success~".countReport();
            }else{
              echo"fail";  
            }
            
        }
        
        
 }
    
public function update_complaint(){
          $id=base64_decode($this->input->post('noteid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
          $today = date("Y-m-d H:i:s");
      //exit();
       
     $where="cmp_adsuser='".$user_id."' and cmp_id='".$id."'";
		
		$data['ads_view']=$this->Report_model->show_data_id('table_complaint',$where);
        if($data['ads_view'][0]->cmp_id>0){
            	
            
              //$_POST['view_date']=$today;
              $_POST['cmp_view']=1;
            $query=$this->General_model->show_data_id('table_complaint',$id,'cmp_id','update',$this->input->post());
            if($query){
                echo"success~".countComplaint();
            }else{
              echo"fail";  
            }
            
        }
        
        
 }
public function delete_complaint(){
          $id=base64_decode($this->input->post('noteid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
      //exit();
       
     $where="cmp_userid='".$user_id."' and cmp_id='".$id."'";
		
		$data['ads_view']=$this->Report_model->show_data_id('table_complaint',$where);
        if($data['ads_view'][0]->cmp_id>0){
            	
            
             
              $_POST['cmp_delete']=1;
            $query=$this->General_model->show_data_id('table_complaint',$id,'cmp_id','update',$this->input->post());
            if($query){
                echo"success~".countComplaint();
            }else{
              echo"fail";  
            }
            
        }
        
        
 }





}
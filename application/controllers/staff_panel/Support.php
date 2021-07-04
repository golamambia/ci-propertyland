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
        if(!$this->session->userdata('is_logged_in_stf')==1)
        {
            redirect('staff_panel', 'refresh');
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

        $this->quote_list();
  }



//--------------------  pagination ---------------//

function quote_list($offset=0){ 

      $limit=10;

      $user_id=$this->session->userdata('front_sess')['userid']; 

      $quote_list=$this->Support_model->allquote_data_list($limit,$offset);

      $total_rows=$this->Support_model->countall_allquote_data();

      //echo $total_rows;
 
      $config["total_rows"]=$total_rows;
      $config["per_page"]=$limit;
      $config["uri_segment"]=4;


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
        $config['first_url'] = site_url("staff_panel/quote/quote_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("staff_panel/quote/quote_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();



        $title="Quote Page";

        $this->load->view('staff_panel/header',compact('quote_list','page_link','title'));

        $this->load->view('staff_panel/sp_quote_list');

        $this->load->view('staff_panel/footer');

      
    }


    function ads_user_list(){ 
      //print_r($data);exit();



        $data['title']="Ads User List";

        $data['user']=$this->General_model->show_data_id('user_table','','','get','');

        $this->load->view('staff_panel/header',$data);

        $this->load->view('staff_panel/ads_user_list');

        $this->load->view('staff_panel/footer');

      
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

        $this->load->view('staff_panel/header',$data);

        $this->load->view('staff_panel/chat');

        $this->load->view('staff_panel/footer');

      
    }


    public function post_chat()
  {

   $user_id=$this->session->userdata('logged_in_stf')['staff_id'];
      
            $datalist = array( 
                'sender_id' => $user_id,
                'chat_text' => $this->input->post('qt_message'),
                'entry_date' => date('Y-m-d'), 
                'sender_type' => 'staff',
                'reciver_id' => $this->input->post('reciver_id')           
            );
            
        
        $query= $this->General_model->show_data_id('chat','','','insert',$datalist);
        $this->session->set_flashdata('message', 'Chat send successfully ');

       redirect($_SERVER['HTTP_REFERER']);    
  }

    public function message_list(){
         $ads=base64_decode($this->input->get('ads',true));
     $chat_user=base64_decode($this->input->get('user',true));
     $data['ad_check']=$this->General_model->show_data_id('module_lbcontacts',$ads,'lbcontactId','get','');
    $ads_owner=$data['ad_check'][0]->user_id;
        $data['user_list']=$this->Quote_model->quote_user_list($ads_owner,$ads);
        $data['ads_owner_list']=$this->General_model->show_data_id('user_table',$ads_owner,'id','get','');
        
        if($ads && $chat_user){
       $data['msg_list']=$this->Quote_model->quote_msg_list($ads,$ads_owner,$chat_user);
       
    }
         
        $data['ads']=$ads;
   $data['user']=$chat_user;
     $data['title']="Message list";

        $this->load->view('staff_panel/header',$data);

        $this->load->view('staff_panel/sp_quote_message_list');

        $this->load->view('staff_panel/footer');
    }

//--------------------  pagination ---------------//






}
<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {

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
        $this->load->model('Quote_model');
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

        $this->quote_list();
	}



//--------------------  pagination ---------------//

function quote_list($offset=0){

      $limit=10;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $quote_list=$this->Quote_model->quote_data_list($limit,$offset,$user_id);

      $total_rows=$this->Quote_model->countall_quote_data($user_id);

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
        $config['first_url'] = site_url("quote/quote_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("quote/quote_list"); 
  

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();

        $title="My Messages";
         $message_list=$this->db->query('SELECT a.*,b.ppt_title FROM table_quote_new a inner join propertypost_table b on b.ppt_id=a.qt_adsid WHERE  a.`deletedBy`!='.$user_id.' and a.`qt_userid`='.$user_id.' or a.`qt_adsuser`='.$user_id.'')->result();

        $this->load->view('header',compact('message_list','page_link','title'));

        $this->load->view('quote_list');

        $this->load->view('footer');

      
    }

//--------------------  pagination ---------------//


    function clear_chat(){

      {


        $tm_adid=$this->input->get('adid');

$with=$this->input->get('with');
$user_id=$this->input->get('loginid');

$query=$this->General_model->show_data_id('module_lbcontacts',$tm_adid,'lbcontactId','get','');  

$owner=$query[0]->user_id;

if($user_id==$owner){

$query= $this->Quote_model->clear_chat($tm_adid,$with,$user_id);

}else{

$query= $this->Quote_model->clear_chat1($tm_adid,$with,$user_id);

}

          

          $this->session->set_flashdata('message', 'Data successfully updated');

          redirect($_SERVER['HTTP_REFERER']);

          }

    }


    function favourite_list($offset=0){

      $limit=1;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $favourite_list=$this->Quote_model->favourite_data_list($limit,$offset,$user_id);

      $total_rows=$this->Quote_model->countall_favourite_data($user_id);

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
        $config['first_url'] = site_url("quote/favourite_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("quote/favourite_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();

        $title="Quote Page";

        $this->load->view('header',compact('favourite_list','page_link','title'));

        $this->load->view('favourite_list');

        $this->load->view('footer');

      
    }


 public function update_quote(){
          $id=base64_decode($this->input->post('noteid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
          $today = date("Y-m-d H:i:s");
      //exit();
       
     $where="qt_userid='".$user_id."' and qt_id='".$id."'";
		
		$data['ads_view']=$this->Quote_model->show_data_id('table_quote',$where);
        if($data['ads_view'][0]->qt_id>0){
            	
            
              //$_POST['view_date']=$today;
              $_POST['qt_view']=1;
            $query=$this->General_model->show_data_id('table_quote',$id,'qt_id','update',$this->input->post());
            if($query){
                echo"success~".countQuote();
            }else{
              echo"fail";  
            }
            
        }
        
        
 }
 
 public function message_list(){
      $user_id=$this->session->userdata('front_sess')['userid'];
     $ads=base64_decode($this->input->get('ads',true));
     $chat_user=base64_decode($this->input->get('user',true));
     $data['ad_check']=$this->General_model->show_data_id('module_lbcontacts',$ads,'lbcontactId','get','');
     $get_user=$this->General_model->show_data_id('user_table',$user_id,'id','get','');
       $data['user_list']=$this->Quote_model->quote_user_list($user_id,$ads);
    //  if($data['ad_check'][0]->lbcontactId!=$ads){
         
    //  }
    $data['chat_user_photo']=$this->Quote_model->chat_user_photo($chat_user);
    if($ads && $chat_user){
       $data['msg_list']=$this->Quote_model->quote_msg_list($ads,$user_id,$chat_user);
       $this->Quote_model->message_unread_toread($ads,$user_id,$chat_user);
    }
    
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
        $this->form_validation->set_rules('qt_message','Description','required');
   

    if($this->form_validation->run()== FALSE){
      $this->session->set_flashdata('error', 'Please try again');
     redirect('quote/message_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 

    }else{
        //echo "good";
        $_POST['qt_name']=$get_user[0]->name;
        $_POST['qt_email']=$get_user[0]->email;
        $_POST['qt_phone']=$get_user[0]->phone;
        $_POST['qt_userid']=$user_id;
        $_POST['qt_adsid']=$ads;
        $_POST['qt_adsuser']=$chat_user;
        $_POST['qt_adsowner']=$data['ad_check'][0]->user_id;
        $_POST['qt_entry_date']=date('Y-m-d H:i:s');
        $query=$this->General_model->show_data_id('table_quote','','','insert',$this->input->post());
        if($query){
                redirect('quote/message_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 
            }else{
                 redirect('quote/message_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user)); 
              $this->session->set_flashdata('error', 'Sorry message not send!');
            }
    }
    }
    
   // $data['user_list']=
   $data['ads']=$ads;
   $data['user']=$chat_user;
     $data['title']="Message list";

        $this->load->view('header',$data);

        $this->load->view('quote_chat_list');

        $this->load->view('footer');
 }

public function delete_quote(){
         $id=base64_decode($this->input->post('qtid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
      $where=" qt_id='".$id."' and qt_userid='".$user_id."'";
            $query=$this->Quote_model->Quote_delete('table_quote',$where);
            if($query){
                echo"del";
            }else{
              echo"not";  
            }
     
        }
public function delete_msg(){
          $id=base64_decode($this->input->get('qtid'));
       
     $user_id=$this->session->userdata('front_sess')['userid'];
       $updata['deletedBy']=$user_id;
       $updata['deletedDate']=date('Y-m-d');
          $query=$this->General_model->show_data_id('table_quote_new',$id,'qt_id','update',$updata);
            if($query){
               $this->session->set_flashdata('message', 'Data successfully deleted');
          
            }else{
             $this->session->set_flashdata('error', 'Sorry something went wrong!');
            }
     redirect($_SERVER['HTTP_REFERER']);
        }



}
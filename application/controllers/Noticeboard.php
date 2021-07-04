<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticeboard extends CI_Controller {

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
	    //$user=$this->session->userdata('front_sess')['userid'];
        //$data['notice_list']=$this->General_model->show_data_id('notification',$user,'user_id','get','');
	
		//$data['title']='Notification Page';
		//$this->load->view('header',$data);
		//$this->load->view('notice_board');
		//$this->load->view('footer');

        $this->notice_list();
	}



//--------------------  pagination ---------------//

function notice_list($offset=0){

      $limit=10;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $notice_list=$this->Notice_model->notice_data_list($limit,$offset,$user_id);

      $total_rows=$this->Notice_model->countall_notice_data($user_id);

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
        $config['first_url'] = site_url("noticeboard/notice_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("noticeboard/notice_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links();     

      //print_r($data);exit();

      

        


        $title="Notification Page";

        $this->load->view('header',compact('notice_list','page_link','title'));

        $this->load->view('notice_board');

        $this->load->view('footer');

      
    }

//--------------------  pagination ---------------//

 public function update_notice(){
          $id=base64_decode($this->input->post('noteid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
          $today = date("Y-m-d H:i:s");
      //exit();
       
     $where="user_id='".$user_id."' and nid='".$id."'";
		
		$data['ads_view']=$this->Notice_model->show_data_id('notification',$where);
        if($data['ads_view'][0]->nid>0){
            	
            
              $_POST['view_date']=$today;
              $_POST['notice_view']=1;
            $query=$this->General_model->show_data_id('notification',$id,'nid','update',$this->input->post());
            if($query){
                echo"success~".countNotice();
            }else{
              echo"fail";  
            }
            
        }
        
        
 }

public function delete_notice(){
          $id=base64_decode($this->input->post('noteid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     
      //exit();
       
     $where="user_id='".$user_id."' and nid='".$id."'";
		
		$data['ads_view']=$this->Notice_model->show_data_id('notification',$where);
        if($data['ads_view'][0]->nid>0){
            	
            
             
              $_POST['is_delete']=1;
            $query=$this->General_model->show_data_id('notification',$id,'nid','update',$this->input->post());
            if($query){
                $this->session->set_flashdata('message', 'Data successfully Deleted');
                echo"success~".countNotice();
            }else{
              echo"fail";  
            }
            
        }
        
        
 }



}
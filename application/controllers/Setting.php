<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }

	public function index()
	{	$id=$this->session->userdata('front_sess')['userid'];
		$data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
		$data['title']='TLB || Profile';
		$this->load->view('header');
		$this->load->view('profile',$data);
		$this->load->view('footer');
	}


    public function change_password()
    {   $id=$this->session->userdata('front_sess')['userid'];
        $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        $data['title']='TLB || Change-Password';
        $this->load->view('header');
        $this->load->view('chande-password',$data);
        $this->load->view('footer');
    }



    public function do_change_pass()
    {

        $this->form_validation->set_rules('new_password', 'Password', 'required');

        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[new_password]');



        if ($this->form_validation->run() == FALSE) 
        {

            $this->session->set_flashdata('error', 'Password  update failed');

            redirect('setting/change_password'); 



        }else{

            $user_id = $this->session->userdata('front_sess')['userid'];

            $email = $this->session->userdata('front_sess')['email'];  

            $datalist = array( 

                'pass'      => base64_encode($this->input->post('confirm_password'))

            );

            $query= $this->General_model->show_data_id('user_table',$user_id,'id','update',$datalist);

            if($query){


//---------------send mail ----------------//


//---------------send mail ----------------//


                $this->session->set_flashdata('message', 'Password successfully updated');

                redirect('setting/change_password');

            }else{

               $this->session->set_flashdata('error', 'Password  update failed');

               redirect('setting/change_password'); 

            }

       }  

    }




}

<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

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
         if($this->session->userdata('log_check')==1)
            {
                redirect('dashboard', 'refresh');
            }
      
    }
    
    public function index(){
        $data['title']="Password Recover";
         $this->load->view('header',$data);
        $this->load->view('forgot_password');
        $this->load->view('footer');
    }
    public function change_password(){
        error_reporting(0);
        $this->form_validation->set_rules('user_name','User Id / Email','required');
        if ($this->form_validation->run() == FALSE) 
        {
           $data['title']="Password Recover";
         $this->load->view('header',$data);
        $this->load->view('forgot_password');
        $this->load->view('footer');
        }
    else{
         $rand=rand(0,9999999);;
        $email=$this->input->post('user_name');
        $dataarray=array(
             'pass'=>base64_encode($rand)
    );
        $RowCount= $this->General_model->RowCount('user_table','email',$email);
        if($RowCount>0){
        	$query= $this->General_model->show_data_id('user_table',$email,'email','update',$dataarray);
    if($query){
           $this->session->set_flashdata('message', 'Your password successfully reset');
    $log       = base_url(). "register/login";
    $mail = $this->phpmailerlib->load();
    $subject   = "Password Successful Reset";
               
                $mail_body = '<html><body>';
                $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                
                $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $this->input->post('user_name') . "</td></tr>";
                $mail_body .= "<tr><td><strong>Your password :</strong> </td><td>" . $rand . "</td></tr>";
                //$mail_body .= "<tr ><td><strong>Password:</strong> </td><td>" . $this->input->post('password') . "</td></tr>";
               $mail_body .= "<tr><td><strong>Login:</strong> </td><td><a href='" . $log . "'> Click here </a></td></tr>";
                $mail_body .= "</table>";
                $mail_body .= "</body></html>";
                $mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>The Local Browse</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
                //$name=$_POST["name"];
                
                $mail->IsSMTP();
                     $mail->Host = $this->config->item('mlHost');
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = $this->config->item('mlUsername');
                $mail->Password = $this->config->item('mlPassword');
    		  $mail->From = "sendmail@sharingmakesmehappy.com";
                $mail->FromName = "Password Recover Successful ";
                //$mail->AddAddress('wtm.golam@gmail.com');
                $mail->AddAddress($this->input->post('user_name'));
                $mail->WordWrap = 5;
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $mail_body;
                $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
                $mail->Send();
 //                if(!$mail->Send())
 // {
 //   echo "Message could not be sent. <p>";
 //   echo "Mailer Error: " . $mail->ErrorInfo;
 //    exit;
 // }
       redirect('register/login');
       }else{
        $this->session->set_flashdata('rserror', 'Sorry something went wrong');
        redirect('reset_password');
       }
    }else{
       $this->session->set_flashdata('rserror', 'Sorry email not exist!');
        redirect('reset_password'); 
    }
    }
        
    }
    
}
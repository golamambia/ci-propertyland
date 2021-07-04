<?php
ob_start();
class Main extends CI_Controller{

    function __construct()
    {
			parent::__construct();
			$this->load->database();
            $this->load->model('staff_panel/Model_users');
			//****************************backtrace prevent*** START HERE*************************

			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('General_model');
            $this->load->helper('cookie');
            //$this->load->library('cookie');
            $this->load->helper('url');
            $this->load->library("PhpMailerLib");
            $this->load->config('email');
        $this->load->library('email');
            if($this->session->userdata('is_logged_in_stf')==1)
            {
                redirect('staff_panel/home', 'refresh');
            }
			
			//****************************backtrace prevent*** END HERE*************************
    }

   public function index()
   {
    $this->login();
   }

   public function login()
   {
   	
  
     $data['title'] = "Abc || Staff Panel ";
     $this->load->view('staff_panel/login',$data);
   }
    public function forgot_password()
   {
     $data['title'] = "Abc || Admin Panel ";
     $this->load->view('staff_panel/forgot_password',$data);
   }
 public function pass_validation()
    {
	    $this->form_validation->set_rules('admin_email','Email','required');
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('loginerror', 'Email can not be blank');
			redirect('staff_panel/main/forgot_password');
		} else {

			$data = array(
				'email' => $this->input->post('admin_email'),
				
			);

			$result = $this->Model_users->forgot($data);

		if($result != false) {

			//echo $pass_hh = $this->input->post('username');
//exit();
			if($result != false) {

				$mail = $this->phpmailerlib->load();
        try {
            //Server settings
            $mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->IsSMTP();                                  
		  $mail->Host = "bh-ht-2.webhostbox.net";  
		  $mail->SMTPAuth = true; 
		  $mail->Username = "sendmail@webtechnomind.com"; 
		  $mail->Password = "ZM-(XPt2ie!z"; 
		  $mail->From = "sendmail@webtechnomind.com";
		  $mail->FromName = 'The Local Browse';
            $mail->addAddress($this->input->post('admin_email'));     // Add a recipient
            //$mail->addAttachment($traget_file, $_FILES['assign_task_file']['name']);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recovery Password';
            $mail->Body = 'Your password is '.$result;
            $mail->AltBody ='Simple text';
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit();
        }
				$this->session->set_flashdata('success', 'Your mail has been send');
				
			redirect('staff_panel/main/login');
			}

		}else {
			$this->session->set_flashdata('loginerror', 'Invalid email!!!!');

			redirect('staff_panel/main/forgot_password');
			}
		}
	}
   //==================================Form validation===========================================



    public function login_validation()
    {
	    $this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('loginerror', 'Username and password can not be blank');
			redirect('staff_panel/main/login');
		} else {

			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			 $remember_me=$this->input->post('remember_me');


		     $result = $this->Model_users->login($data);
		   //echo"<pre>";
		   //print_r($result);

		
		if($result=='mail_not'){

                $this->session->set_flashdata('error','Email verification not complete');
               
                redirect('staff_panel/main/login');
            }else if($result=='st_not'){
                $this->session->set_flashdata('error','Please contact administrator');
               redirect('staff_panel/main/login');
            }else if($result=='not'){
                $this->session->set_flashdata('loginerror','Invalid Username or Password!!!!');
                redirect('staff_panel/main/login');
            }else{

			$username = $this->input->post('username');

			if($result != false) {
				if ($remember_me == 'on') {
   
    $this->input->set_cookie('user', $username, time()+2592000);
    $this->input->set_cookie('pass', $this->input->post('password'), time()+2592000);
   
  
} else {
   delete_cookie('user'); 
   delete_cookie('pass');  
 
}

  
				// $session_data = array(
				// 	'username'=>$this->input->post('username'),
				// 	//'name'=>$this->input->post('name'),
				// 	'is_logged_in'=>1
				// );

			//$this->session->set_userdata('logged_in', $session_data);
			$this->session->set_userdata('is_logged_in_stf', '1');
			redirect('staff_panel/home');
			}

		}
		}

	}
	//==================================End Form validation===========================================

	//==============================superpanel Logout==============================================
    public function logout(){
		$this->session->sess_destroy();
		redirect('staff_panel/main/login');
	}
//==============================superpanel Logout============================================
  
public function log_status(){
        $reference_id1 = base64_decode($this->input->get('activation', TRUE));
         $exp=explode("AMB",$reference_id1);
          $id=$exp[1];
        //exit();
        echo "Activation going on please wait....";
        $ref_by=$this->General_model->RowCount('staff_table','id',$id);
        if($ref_by>0){
            $data['user']=$this->General_model->show_data_id('staff_table',$id,'id','get','');

            $mail_v=$data['user'][0]->mail_verification;
           
            if($mail_v=='Active'){
                redirect('staff_panel/main/login');
            }else{
            $datalist = array( 
                'mail_verification'   => 'Active' 
                //'status'        => $this->input->post('status'),
            );
            $query= $this->General_model->show_data_id('staff_table',$id,'id','update',$datalist);
            $this->session->set_flashdata('success', 'Email verification successful.');
            redirect('staff_panel/main/login');
        }
        }else{
             $this->session->set_flashdata('error', 'Sorry your activation failed for wrong referal id !');
             redirect('staff_panel/main/login');
        }
    }



}
?>
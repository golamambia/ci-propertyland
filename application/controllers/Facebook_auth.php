<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook_auth extends CI_Controller {

	public function index()
	{
		$this->load->library('facebook');
		$this->load->model('User');
		
		if($this->session->userdata('login') == true){
			redirect('home');
		}
		
		
		if ($this->facebook->logged_in())
		{
			$user = $this->facebook->user();

			//echo "<pre>";print_r($user);exit();

			if ($user['code'] === 200)
			{
				$session_data['name'] = $user['data']['name'];
		$session_data['email'] = $user['data']['email'];
		$session_data['oauth_provider'] = 'facebook';
		$session_data['oauth_uid'] = $user['data']['id'];
		$session_data['user_photo'] = '';
		$session_data['agreement'] = 1;

$query=$this->User->checkUser($session_data);

				$this->session->set_userdata('login',true);
				//$this->session->set_userdata('user_profile',$user['data']);


				$session_data1=array(
				'name'=>$user['data']['name'],
				'email'=>$user['data']['email'],
				'source'=>'facebook',
				'oauth_uid'=>$user['data']['id'],
				'photo'=>'',
				//'link'=>$google_data['link'],
				'userid'=>$query
				);

				$this->session->set_userdata('front_sess',$session_data1);

				$this->session->set_userdata('log_check','1');
		



				redirect('home');














			}

		}
		
		 else {
	
			$contents['link'] = $this->facebook->login_url();
		
			$this->load->view('welcome_message1',$contents);
		
	
		}
	}
	
	public function profile(){
		if($this->session->userdata('login') != true){
			redirect('');
		}
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$this->load->view('profile',$contents);
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
		
	}
	
}

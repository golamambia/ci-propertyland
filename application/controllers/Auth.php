<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Auth extends CI_Controller {
	 function __construct() {
        parent::__construct();
        //$this->load->library('google');
        $this->load->database();
         $this->load->model('User_model');
         $this->load->model('General_model');
          $this->load->library('session');
        $this->load->helper('url');
    }

	public function index(){
	if(isset($_GET['code'])) {
	try {
		// Get the access token 
		$data = $this->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

		// Access Token
		$access_token = $data['access_token'];
		
		// Get user information
        $google_data = $this->GetUserProfileInfo($access_token);
        //var_dump($google_data);
       // exit();
      $session_data['name'] = $google_data['name'];
	 $session_data['email'] = $google_data['email'];
		$session_data['oauth_provider'] = 'google';
		$session_data['oauth_uid'] = $google_data['id'];
		$session_data['user_photo'] = $google_data['picture'];
		$query=$this->User_model->checkUser($session_data);
	  
	 //exit();
if($query){
    //var_dump($google_data);
       // exit();
			$session_data2 = array(
					'name'=>$google_data['name'],
					'email'=> $google_data['email'],
					'phone'=>'',
					'oauth_provider'=>'google',
					'userid'=>$query
					
					//'user_photo'=>$result->user_photo
					
				);
			$this->session->set_userdata('user_photo', $google_data['picture']);
        	 	$this->session->set_userdata('log_check','1');
        	 	//$this->session->set_userdata('user_photo', $result->user_photo);
			$this->session->set_userdata('front_sess', $session_data2);
			 redirect('dashboard');
			//return redirect()->to('admin/login'); 
		}
		else{
			$this->session->set_flashdata('error','Opps! something went wrong, Please try again');
			redirect('register/login');
		}

	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
	}
	function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
	$url = 'https://www.googleapis.com/oauth2/v4/token';			

	$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
	$ch = curl_init();		
	curl_setopt($ch, CURLOPT_URL, $url);		
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
	curl_setopt($ch, CURLOPT_POST, 1);		
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);	
	$data = json_decode(curl_exec($ch), true);
	$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
	if($http_code != 200) 
		throw new Exception('Error : Failed to receieve access token');
	
	return $data;
}

function GetUserProfileInfo($access_token) {	
	$url = 'https://www.googleapis.com/oauth2/v2/userinfo?fields=name,email,gender,id,picture,verified_email';	
	
	$ch = curl_init();		
	curl_setopt($ch, CURLOPT_URL, $url);		
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
	$data = json_decode(curl_exec($ch), true);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
	if($http_code != 200) 
		throw new Exception('Error : Failed to get user information');
		
	return $data;
}



	public function logout(){
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data=array('sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		redirect(base_url());
	}
}
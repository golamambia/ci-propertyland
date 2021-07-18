<?php
ob_start();
class Register extends CI_Controller {
    
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
        $this->load->library('facebook');
        if($this->session->userdata('log_check')==1)
            {
                redirect('dashboard', 'refresh');
            }
      
    }

	public function index()
	{ 
//     $username="KRISHNA_SFB";
// $password ="get!N2BSMS";
// $number='7003832809';
// //$sender="TESTIP";
// $sender="BLKSMS";
// $message='Hi ambia ';
// $template_id='123';

// $url="http://api.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3');
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// echo $result = curl_exec($ch);
// curl_close($ch); 
// exit();
 
    $data['gmail_url']= 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

	    $user_ip =getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
//print_r($geo);
$data['country_get']=trim($geo["geoplugin_countryCode"]);
        $data['country_list']=$this->General_model->show_data_id('country','','','get','');
        // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
		$data['title']="Registration";
		$this->load->view('header',$data);
		$this->load->view('register');
		$this->load->view('footer');
	}
    public function log_status(){
        $reference_id1 = base64_decode($this->input->get('activation', TRUE));
         $exp=explode("AMB",$reference_id1);
          $id=$exp[1];
        //exit();
        echo "Activation going on please wait....";
        $ref_by=$this->General_model->RowCount('user_table','id',$id);
        if($ref_by>0){
            $data['user']=$this->General_model->show_data_id('user_table',$id,'id','get','');

            $mail_v=$data['user'][0]->mail_verification;
           
            if($mail_v=='Active'){
                redirect('register/login');
            }else{
            $datalist = array( 
                'mail_verification'   => 'Active' 
                //'status'        => $this->input->post('status'),
            );
            $query= $this->General_model->show_data_id('user_table',$id,'id','update',$datalist);
            $this->session->set_flashdata('message', 'Email verification successful.');
             redirect('register/login');
        }
        }else{
             $this->session->set_flashdata('error', 'Sorry your activation failed for wrong referal id !');
             redirect('register');
        }
    }
    public function login()
    {   
        $data['gmail_url']= 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

        // $user= $this->General_model->RowCount('user_table','','');
        //  $data['user']=$user;
        $data['title']="Login";
        $data['fb_login_url'] = $this->facebook->login_url();
        $this->load->view('header',$data);
        $this->load->view('login');
        $this->load->view('footer');
    }

     public function login_validation(){
        $this->form_validation->set_rules('user_name','User Id','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()==FALSE){
            
            $this->login();
            //redirect('register/login');

        }else{
            $data=array('email'=>$this->input->post('user_name'),'pass'=>$this->input->post('password'));
            $result = $this->User_model->login($data);
          $log=$this->input->get('log',true);
            if($result=='mail_not'){
                $this->session->set_flashdata('error','Email verification not complete');
                redirect('register/login');
            }else if($result=='st_not'){
                $this->session->set_flashdata('error','Please contact administrator');
                redirect('register/login');
            }else if($result=='not'){
                $this->session->set_flashdata('error','Please check username and password');
                redirect('register/login');
            }else{
              $datalist = array( 
                'logon_date'   => date('Y-m-d')
                //'status'        => $this->input->post('status'),
            );
 $userid=$this->session->userdata('front_sess')['userid'];
    $this->General_model->show_data_id('user_table',$userid,'id','update',$datalist);
                if($log!=''){
                    redirect('adsview/dataview?ads='.$log);
                }else{
                    redirect('dashboard');
                }
                
            }
        }


     }

    public function register_post()
    {   
        //$data['country_list']=$this->General_model->show_data_id('country','','','get','');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if($this->session->userdata('logged_in_stf')['staff_id']){
          $_POST['tagged_staff_id']=$this->session->userdata('logged_in_stf')['staff_id'];
        }else{
           $this->form_validation->set_rules('email', 'Email', 'required');
        }
       
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('user_type','User type','required');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
        $this->form_validation->set_rules('know_tlb','How you know TLB','required');
        $this->form_validation->set_rules('agreement','user Agreement','required');
        if (empty($_FILES['photo']['name']))
        {
            $this->form_validation->set_rules('photo','Profile picture','required');
          }
        if($this->input->post('know_tlb')=='other'){
            $this->form_validation->set_rules('know_tlb_other','Other Media','required');
        }
        if($this->input->post('user_type')=='agent'){
            $this->form_validation->set_rules('address','address','required');
            $this->form_validation->set_rules('landmark','Landmark','required');
            $this->form_validation->set_rules('agent_service','Agent service','required');
            if (empty($_FILES['photo2']['name']))
        {
            $this->form_validation->set_rules('photo2','Identity proof','required');
          }
             if($this->input->post('address')!=''){
           $prepAddr = str_replace(' ','+',$this->input->post('address'));
      
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          $latitude = $output->results[0]->geometry->location->lat;
          $longitude = $output->results[0]->geometry->location->lng;
          $add_array = $add_array->address_components;

$country = "";

$state = ""; 

$city = "";
$pincode="";
$add_array=$output->results[0]->address_components;

foreach ($add_array as $key) {
    if($key->types[0] == 'postal_code'){
                     //Return the zipcode   
                  $pincode=$key->long_name; 
                }

  if($key->types[0] == 'administrative_area_level_2')

  {

    $city = $key->long_name;

  }

  if($key->types[0] == 'administrative_area_level_1')

  {

    $state = $key->long_name;

  }

  if($key->types[0] == 'country')

  {

    $country = $key->long_name;

  } 

}
if($pincode==''){
$this->session->set_flashdata('error', 'Please give proper address!');

       $this->load->view('header');
       $this->load->view('register',$data);
       $this->load->view('footer');
}
        }
        }
        if($this->input->post('user_type')!='individual'){
            $this->form_validation->set_rules('office_project_name','Project name','required');
            if (empty($_FILES['photo3']['name']))
        {
            $this->form_validation->set_rules('photo3','Office main photo','required');
            //$this->form_validation->set_rules('photo2','Identity proof','required');
          }
        }

        if ($this->form_validation->run() == FALSE) 
        {
            //$this->session->set_flashdata('error', 'Data  save failed');
           $this->load->view('header');
        $this->load->view('register',$data);
        $this->load->view('footer');
            //redirect('register'); 
        }else{
            $email=$this->input->post('email');
             $reference_id=$this->input->post('referred_by');
             if($email){
              $RowCount= $this->General_model->RowCount('user_table','email',$email);
            }else{
              $RowCount=0;
            }
        
         $ref_by=$this->General_model->RowCount('user_table','reference_id',$reference_id);
        //exit();
        if($reference_id!=''){
            $ref_by=$this->General_model->RowCount('user_table','reference_id',$reference_id);
        }else{
            $ref_by=1;
        }
        
        if($RowCount>0){
            $this->session->set_flashdata('error', 'Email already exist!');

       $this->load->view('header');
       $this->load->view('register',$data);
       $this->load->view('footer');
        }else if($ref_by<=0){
            $this->session->set_flashdata('error', 'Reference id not exist!');

       $this->load->view('header');
       $this->load->view('register',$data);
       $this->load->view('footer');
        }

        else{
            if(!empty($_FILES['photo']['name'])){ 
                  $_FILES['file']['name'] = $_FILES['photo']['name'];
                  $_FILES['file']['type'] = $_FILES['photo']['type'];
                  $_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'];
                  $_FILES['file']['error'] = $_FILES['photo']['error'];
                  $_FILES['file']['size'] = $_FILES['photo']['size'];     
                  $config['upload_path'] = 'uploads/restaurantImages/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = time().$_FILES['photo']['name'];
                  $this->load->library('upload',$config);  

                 $filename =$config['file_name'];
                $_POST['user_photo']=$filename;
 $location = "uploads/register/".$filename;
           
    $this->compressImage($_FILES['photo']['tmp_name'],$location,50);
                  
                }
                if(!empty($_FILES['photo2']['name'])){ 
                  $_FILES['file']['name'] = $_FILES['photo2']['name'];
                  $_FILES['file']['type'] = $_FILES['photo2']['type'];
                  $_FILES['file']['tmp_name'] = $_FILES['photo2']['tmp_name'];
                  $_FILES['file']['error'] = $_FILES['photo2']['error'];
                  $_FILES['file']['size'] = $_FILES['photo2']['size'];     
                  $config['upload_path'] = 'uploads/restaurantImages/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = time().$_FILES['photo2']['name'];
                  $this->load->library('upload',$config);  

                 $filename =$config['file_name'];
                $_POST['identity_proof']=$filename;
 $location = "uploads/register/".$filename;
           
    $this->compressImage($_FILES['photo2']['tmp_name'],$location,50);
                  
                }
                if(!empty($_FILES['photo3']['name'])){ 
                  $_FILES['file']['name'] = $_FILES['photo3']['name'];
                  $_FILES['file']['type'] = $_FILES['photo3']['type'];
                  $_FILES['file']['tmp_name'] = $_FILES['photo3']['tmp_name'];
                  $_FILES['file']['error'] = $_FILES['photo3']['error'];
                  $_FILES['file']['size'] = $_FILES['photo3']['size'];     
                  $config['upload_path'] = 'uploads/restaurantImages/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|gif';
                  $config['file_name'] = time().$_FILES['photo3']['name'];
                  $this->load->library('upload',$config);  

                 $filename =$config['file_name'];
                $_POST['office_photo']=$filename;
 $location = "uploads/register/".$filename;
           
    $this->compressImage($_FILES['photo3']['tmp_name'],$location,50);
                  
                }
                
                
                
            $rand='PHS'.rand (0,9999999);
            
            $_POST['entry_date']=date('Y-m-d');
      
        $_POST['pass']=base64_encode($this->input->post('password'));
        $_POST['reference_id']=$rand;
        $_POST['status']='Active';
        if(!$this->session->userdata('logged_in_stf')['staff_id']){
        $_POST['mail_verification']='Inactive';
        }else{
          $_POST['registration_type']='offline';
          $_POST['mail_verification']='Active';
        }
        $_POST['country']=$country;
        $_POST['state']=$state;
        $_POST['city']=$city;
        $_POST['pincode']=$pincode;
        $_POST['latitude']=$latitude;
        $_POST['longitude']=$longitude;
    $query= $this->General_model->show_data_id('user_table','','','insert',$this->input->post());
    if($query>0){
        
        
        $actv=$rand.'AMB'.$query;
    
   
    $log       = base_url(). "register/log_status?activation=".base64_encode($actv);
    $mail = $this->phpmailerlib->load();
    $subject   = "Registration Successful with us";
               
                $mail_body = '<html><body>';
                $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                $mail_body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $this->input->post('name') . "</td></tr>";
                $mail_body .= "<tr><td><strong>Your Reference ID:</strong> </td><td>" . $rand . "</td></tr>";
                
                $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $this->input->post('email') . "</td></tr>";
                //$mail_body .= "<tr ><td><strong>Password:</strong> </td><td>" . $this->input->post('password') . "</td></tr>";
                $mail_body .= "<tr><td><strong>Activation link:</strong> </td><td> <a href='" . $log . "'>Click here to verify your email address</a></td></tr>";
                $mail_body .= "</table>";
                $mail_body .= "</body></html>";
                $mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>Property Handshake</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
                //$name=$_POST["name"];
                
                $mail->IsSMTP();
                $mail->Host = $this->config->item('mlHost');
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = $this->config->item('mlUsername');
                $mail->Password = $this->config->item('mlPassword');
              $mail->From =  $this->config->item('from');
                $mail->FromName = "Registration Successful - " . $this->input->post('name');
                
                //$mail->AddAddress('wtm.golam@gmail.com');
                $mail->AddAddress($this->input->post('email'));
                $mail->WordWrap = 5;
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $mail_body;
                $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
                if(!$this->session->userdata('logged_in_stf')['staff_id']){
                   $this->session->set_flashdata('message', 'Thankyou for Registration.Activation link has been sent to your email');
                  $mail->Send();
                }else{
                   $this->session->set_flashdata('message', 'Thankyou for Registration');
                }
                
       redirect('register/login');
       }else{
        $this->session->set_flashdata('error', 'Sorry your registration failed');
        redirect('register');
       } 
        } 
        } 
    }

    public function GetEmail(){

        $email=$this->input->post('email');
        echo $result=$this->General_model->RowCount('user_table','email',$email);
    }
    
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('register/login');
    }
}


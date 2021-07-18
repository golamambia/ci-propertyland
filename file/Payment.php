<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        //$this->load->helper('url');
        $this->load->helper(array('form','url'));
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }
	
	public function index()
	{


    $this->ad_list();
	}


//-------------------- ad pagination ---------------//

function ad_list($offset=0){

      $user_id=$this->session->userdata('front_sess')['userid'];
      $data['cart_list']=$this->db->query('select a.*,b.ppt_title,c.payment_type_text,c.payment_text,c.days_valid,c.price from payments as a left join propertypost_table as b on b.ppt_id=a.ppt_id inner join price as c on c.price_id=a.price_id where agent_id='.$user_id.' and payment_cleared=0')->result();
      $data['payment_type_list']=$this->db->query('select a.* from price as a where payment_type_id in(10,30) and price_active=1 group by payment_type_id')->result();
        $data['title']="Payment";

        $this->load->view('header',$data);

        $this->load->view('payment_cart');

        $this->load->view('footer');

    
    }
    function history($offset=0){

      $user_id=$this->session->userdata('front_sess')['userid'];
      $data['cart_list']=$this->db->query('select a.*,b.ppt_title,c.payment_type_text,c.payment_text,c.days_valid,c.price from payments as a left join propertypost_table as b on b.ppt_id=a.ppt_id inner join price as c on c.price_id=a.price_id where agent_id='.$user_id.' and payment_cleared=1')->result();
      
        $data['title']="Payment";

        $this->load->view('header',$data);

        $this->load->view('payment_history');

        $this->load->view('footer');

    
    }
public function post_tagged_agent(){
         $id=base64_decode($this->input->post('ads_id'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
       $this->form_validation->set_rules('payment_type_id', 'payment_type_id', 'required');
        $this->form_validation->set_rules('price_id', 'price_id', 'required');
        $this->form_validation->set_rules('tag_day', 'tag_day', 'required');
        $this->form_validation->set_rules('tag_price', 'tag_price', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Required field is missing');
        }else{
            
    
          $data['price_data']=$this->db->query('select a.* from price as a where price_id='.$this->input->post('price_id').' and price_active=1 ')->result();
          
         
            $_POST['agent_id']=$user_id;
             $_POST['ppt_id']=0;
              $_POST['created_date']=$today;
              $_POST['price_id']=$this->input->post('price_id');
              $_POST['amount']=$data['price_data'][0]->price;
            //  $_POST['tag_adsowner']=$data['ads_view'][0]->ppt_createdBy;
              
            $query=$this->General_model->show_data_id('payments','','','insert',$this->input->post());
            if($query){
                 $this->session->set_flashdata('success', 'Thank you ');
            }else{
               $this->session->set_flashdata('error', 'Server error please try again');
            }

          }
        
        
        
        redirect($_SERVER['HTTP_REFERER']);
 }
//-------------------- ad pagination ---------------//
public function getPriceList(){
$payment_type_id=$this->input->post('payment_type_id');
if($payment_type_id){
$data['list']=$this->db->query('select a.* from price as a where payment_type_id='.$payment_type_id.' and price_active=1 ')->result();
$data['status']='success';
}else{
  $data['list']=array();
$data['status']='not';
}
echo json_encode($data);
}
public function getPriceData(){
$price_id=$this->input->post('price_id');
if($price_id){
$dataall=$this->db->query('select a.* from price as a where price_id='.$price_id.' and price_active=1 ')->result();
$data['day']=$dataall[0]->days_valid;
$data['amount']=$dataall[0]->price;
$data['status']='success';
}else{
 $data['day']='';
$data['amount']='';
$data['status']='not';
}
echo json_encode($data);
}

	public function cart_del($id){
$user_id=$this->session->userdata('front_sess')['userid'];
		//$where="payment_id='".$id."' and agent_id='".$user_id."'";
		$query=$this->db->delete('payments', array('payment_id' => $id,'agent_id' => $user_id));

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect($_SERVER['HTTP_REFERER']);
	}



        




  function remove_location(){
 
      $id = $this->input->post('id');


      $query= $this->General_model->show_data_id('delivery_location',$id,'dl_id','delete','');

      if($query){

        
        $this->session->set_flashdata('message', 'Delivery Location successfully Deleted');
      }


 }

    public function get_multiimage()

    {

         $event_id=$_POST['val2'];

         $id=$_POST['val'];

         $img=$this->General_model->show_data_id('module_lbcontacts_part',$id,'id','get','');  

        $path=base_url()."uploads/module_file/".$img[0]->multi_image;

        $query=$this->General_model->show_data_id('module_lbcontacts_part',$id,'id','delete','');

       

    if ($query){ 

            if (file_exists($path)){

            unlink("uploads/module_file/".$img[0]->multi_image);

     }

        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$event_id,'lbcontact_id','get','');  

        echo $tt= $this->load->view('get_multiimage',$data,true);

    }



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
public function razorPaySuccess()
    { 
//$this->session->set_userdata('demo',$this->input->post('product_id'));
    if($this->input->post('razorpay_payment_id')){
       //$product_id[]=json_decode($this->input->post('product_id'));
            foreach ($this->input->post('product_id') as $key => $value) {
              $data = [
            'payment_mode' => 'Razorpay',
            'payment_date' => date('Y-m-d'),
            'payment_ref' => $this->input->post('razorpay_payment_id'),
            'payment_details' => $this->input->post('razorpay_payment_id'),
            'payment_cleared' => 1,
            
        ];
        $this->db->where('payment_id', $value);
        $this->db->update('payments', $data);
            }
     //$insert = $this->db->insert('payments', $data);
            $this->session->set_userdata('thankyou',$this->input->post('razorpay_payment_id'));
     $arr = array('msg' => 'Payment successfully credited', 'status' => true); 
   }else{
     $this->session->set_userdata('failed','payment failed');
     $arr = array('msg' => 'Payment failed', 'status' => false); 
   }

            
     echo json_encode($arr);
    }
    public function ThankYou()
    {
      if(!$this->session->userdata('thankyou')){
        //redirect('/', 'refresh');
      }
      $data['title']='title';
 $this->load->view('header',$data);

        $this->load->view('razor_thankyou');

        $this->load->view('footer');
    }

    public function failed()
    {
      if(!$this->session->userdata('failed')){
        //redirect('/', 'refresh');
      }
      $data['title']='title';
 $this->load->view('header',$data);

        $this->load->view('razor_failed');

        $this->load->view('footer');
    }
}

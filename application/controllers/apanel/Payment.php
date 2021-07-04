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
         if(!$this->session->userdata('is_logged_in')==1)

        {

            redirect('apanel', 'refresh');

        }
      
    }
	
	public function index()
	{


    $this->history();
	}


//-------------------- ad pagination ---------------//


    function history($offset=0){

      $where='';
      $user_id=$this->session->userdata('front_sess')['userid'];
       $start_date=$this->input->get('start_date',true);
         $end_date=$this->input->get('end_date',true);
         if($start_date !='' && $end_date !=''){
        $where.=' and a.payment_date between "'.$start_date.'" and "'.$end_date.'"';
        $data['cart_list']=$this->db->query('select  SUM(amount) as total, a.*,b.ppt_title,c.payment_type_text,c.payment_text,c.days_valid,c.price,d.name from payments as a left join propertypost_table as b on b.ppt_id=a.ppt_id inner join price as c on c.price_id=a.price_id inner join user_table d on d.id=a.agent_id where payment_cleared=1 '. $where.' group by payment_ref')->result();
        //echo $this->db->last_query();
      }else{
        $data['cart_list']=array();
      }

      
      
        $data['title']="Payment";

        $this->load->view('apanel/header',$data);

        $this->load->view('apanel/payment_history');

        $this->load->view('apanel/footer');

    
    }

     function payment_details($offset=0){
      $pay_ref=base64_decode($this->input->get('view'));
      
      $data['cart_list']=$this->db->query('select a.*,b.ppt_title,c.payment_type_text,c.payment_text,c.days_valid,c.price,d.name from payments as a left join propertypost_table as b on b.ppt_id=a.ppt_id inner join price as c on c.price_id=a.price_id inner join user_table d on d.id=a.agent_id where payment_cleared=1 and payment_ref="'.$pay_ref.'"')->result();
      
        $data['title']="Payment";

        $this->load->view('apanel/header',$data);

        $this->load->view('apanel/payment_history_details');

        $this->load->view('apanel/footer');

    
    }

//-------------------- ad pagination ---------------//


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

    

    
}

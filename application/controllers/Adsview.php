<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Adsview extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apanel/Model_users');
        $this->load->model('User_model');
        $this->load->model('Adsview_model');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->model('Adslist_model');
        $this->load->model('Review_model');
        $this->load->model('Message_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('log_check')!=1)
            {
                //redirect('register/login', 'refresh');
            }
      
    }
	
	public function index()
	{
	    redirect('/');
	}
 public function dataview(){
  $user_ip =$_SERVER['REMOTE_ADDR']; 
   $result_ip = json_decode(file_get_contents('http://ip-api.io/json/' . $user_ip));
  // echo trim($result_ip->country_name);
//echo"<pre>";

  if($this->session->userdata('front_sess')['userid']){
  $ref_user=$this->session->userdata('front_sess')['refferral_id'];
  }else{
    $ref_user=$this->session->userdata('logged_in_stf')['refferral_id'];
  }
 $data['refferral_id']=$ref_user;
  $data['ads']=base64_decode($this->input->get('ads', TRUE));
      $id=base64_decode($this->input->get('ads', TRUE));
$get_refferral_id=base64_decode($this->input->get('refferral_id', TRUE));
     //print_r($this->session->userdata('front_sess'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     $check_by=$this->General_model->RowCount('propertypost_table','ppt_id',$id);
     
        if($check_by>0){
          
		$where="ppt_id!=0 and ppt_id='".$id."'";
		$where_fav="fv_userid='".$user_id."' and fv_adsid='".$id."'";
		$data['ads_view']=$this->Adsview_model->show_data_id('propertypost_table',$where);
		
		  //print_r( $data['avg_review1']);
		 
   
        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

 

      $data['favourite_check']=$this->Adsview_model->All_fetch('favourite_master',$where_fav);
     $data['chat_message']=$this->Message_model->all_list($id,$user_id,$data['ads_view'][0]->user_id);
    $data['minimum_price']=$this->db->query('select * from price where payment_type_id=50 and price_active=1')->result();
     $data['payment_type_list']=$this->db->query('select a.* from price as a where payment_type_id in(20) and price_active=1 group by payment_type_id')->result();
  $data['admin']=$this->General_model->show_data_id('general_setting','','','get','');   
   $data['title']='Ads details';
   $data['post_charge_list']=$this->db->query('select a.* from price as a where payment_type_id=20 and price_active=1 ')->result();
   $data['tagged_agent_list']=$this->db->query('select a.*,b.name,b.agent_ppt_tag_cnt from ppt_agent_tag as a inner join user_table b on b.id=a.agent_id where ppt_id='.$id.' and tag_active=1 order by total_bid_amount desc')->result();
   $data['maxbid_amount']=$this->db->query("SELECT MAX(total_bid_amount) as 'max_bid',COUNT(tag_id) as 'total_agent' from ppt_agent_tag where ppt_id=".$id."")->result();
		// $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipAddress"));
//print_r($geo);
    $this->load->view('adsview_page',$data);
		$this->load->view('footer');
		$today = date("Y-m-d H:i:s");
		$ipAddress = $_SERVER['REMOTE_ADDR'];
		$where_vw=" vw_adsid='".$id."' and vw_ip='".$ipAddress."'";
		$check_by=$this->Adsview_model->RowCount('adsview_master',$where_vw);
        if($check_by<1){
            if($user_id){
                 $_POST['vw_userid']=$user_id;
            }else{
               $_POST['vw_userid']=''; 
            }
            
             $_POST['vw_adsid']=$id;
             $_POST['vw_ip']=$ipAddress;
             $_POST['vw_no']=1;
              $_POST['vw_entry_date']=$today;
               
            $query=$this->General_model->show_data_id('adsview_master','','','insert',$this->input->post());
            }
//$data['country_get']=trim($geo["geoplugin_countryCode"]);
//$data['state_get']=trim($geo["geoplugin_region"]);
//$data['city_get']=trim($geo["geoplugin_city"]);
            if($get_refferral_id!='' && $get_refferral_id!=$ref_user){
             $this->session->set_userdata('refferedBy', $get_refferral_id);
            $where_vw2=" vw_ppt_id='".$id."' and vw_ip='".$ipAddress."' and reference_id='".$get_refferral_id."' ";
    $check_by2=$this->Adsview_model->RowCount('referral_link_mktg',$where_vw2);
    if($check_by2<1){
            $_POST['vw_ip_ppt_id']=$ipAddress.'_'.$id;
             $_POST['vw_ip']=$ipAddress;
             $_POST['reference_id']=$get_refferral_id;
              $_POST['vw_date']=$today;
              $_POST['vw_ppt_id']=$id;
             $_POST['referral_link']= base_url()."adsview/dataview?ads=".base64_encode($data['ads'])."&refferral_id=".base64_encode($get_refferral_id);
             $_POST['vw_country']=trim($result_ip->country_name);
              $_POST['vw_state']=trim($result_ip->region_name);
              $_POST['vw_city']=trim($result_ip->city);
              $_POST['vw_pincode']=trim($result_ip->zip_code);
            $query_ref=$this->General_model->show_data_id('referral_link_mktg','','','insert',$this->input->post());
            }
          }
            
       
		
        }
        // else{
        //     redirect('/');
        // }
 }



  public function loadRecord(){
$rowno=$this->input->get('pagno',true);
    //echo 
    $id=base64_decode($this->input->get('ads',true));
    //$id=11;

    // Row per page
    $rowperpage = 10;

    // Row position
    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
        
        // All records count
        $allcount = $this->Review_model->getrecordCount($id);

        // Get  records
        $users_record = $this->Review_model->getData($rowno,$rowperpage,$id);


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
        $config['first_url'] = site_url("adsview/loadRecord".'?'.http_build_query($_GET));
      }



        
        // Pagination Configuration
        $config['base_url'] = base_url().'adsview/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

    // Initialize
    $this->pagination->initialize($config);

    // Initialize $data Array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;

    echo json_encode($data);
    
  }



 public function post_quote(){
         $id=base64_decode($this->input->post('adsid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
      $this->form_validation->set_rules('qt_name', 'Name', 'required');
        $this->form_validation->set_rules('qt_phone', 'Phone', 'required');
        $this->form_validation->set_rules('qt_email', 'Email', 'required');
        $this->form_validation->set_rules('qt_message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            
     $check_by=$this->General_model->RowCount('propertypost_table','ppt_id',$id);
        if($check_by>0){
            	$where="ppt_isDelete=0 and ppt_id='".$id."'";
		
		$data['ads_view']=$this->Adsview_model->show_data_id('propertypost_table',$where);
            $_POST['qt_userid']=$user_id;
             $_POST['qt_adsid']=$id;
              $_POST['qt_entry_date']=$today;
              $_POST['qt_adsuser']=$data['ads_view'][0]->ppt_createdBy;
              $_POST['qt_adsowner']=$data['ads_view'][0]->ppt_createdBy;
              
            $query=$this->General_model->show_data_id('table_quote_new','','','insert',$this->input->post());
            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
        }else{
         echo"not";   
        }
        
        }
 }
public function post_tagged_agent(){
         $id=base64_decode($this->input->post('ads_id'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
      $this->form_validation->set_rules('tag_agent', 'Name', 'required');
        $this->form_validation->set_rules('tag_amount', 'amount', 'required');
        $this->form_validation->set_rules('ads_id', 'adsid', 'required');
        $this->form_validation->set_rules('price_id2', 'price_id', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Required field is missing');
        }else{
            
     $check_by=$this->General_model->RowCount('propertypost_table','ppt_id',$id);
        if($check_by>0){
          $data['minimum_price']=$this->db->query('select * from price where payment_type_id=50 and price_active=1')->result();
          
          $data['agentamount_sum']=$this->db->query('SELECT SUM(amount) totalAmount FROM payments WHERE `ppt_id` = '.$id.' and `agent_id`='.$user_id.' and `payment_cleared`=0')->result();
 
 if(($data['agentamount_sum'][0]->totalAmount + $this->input->post('tag_amount'))>=$data['minimum_price'][0]->price && $this->input->post('tag_amount')>0){

              $where="ppt_isDelete=0 and ppt_id='".$id."'";
    
    $data['ads_view']=$this->Adsview_model->show_data_id('propertypost_table',$where);
              $data['price_data']=$this->db->query('select a.* from price as a where price_id='.$this->input->post('price_id2').' and price_active=1 ')->result();
            $_POST['agent_id']=$user_id;
             $_POST['ppt_id']=$id;
              $_POST['created_date']=$today;
              $_POST['price_id']=$this->input->post('price_id2');
              $_POST['amount']=$this->input->post('tag_amount');
              $_POST['payment_type_id']=$data['price_data'][0]->payment_type_id;
            //  $_POST['tag_adsowner']=$data['ads_view'][0]->ppt_createdBy;
              
            $query=$this->General_model->show_data_id('payments','','','insert',$this->input->post());
            if($query){
                 $this->session->set_flashdata('success', 'Thank you for bidding');
            }else{
               $this->session->set_flashdata('error', 'Server error please try again');
            }

          }else{
          $this->session->set_flashdata('error', 'Minimum amount is required');
        }
            
        }else{
          $this->session->set_flashdata('error', 'Oops something went wrong!');
        }
        
        }
        redirect($_SERVER['HTTP_REFERER']);
 }
 public function post_extend_owner(){
         $id=base64_decode($this->input->post('ads_id'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
       //$this->form_validation->set_rules('payment_type_id', 'payment_type_id', 'required');
        $this->form_validation->set_rules('price_id', 'price_id', 'required');
        $this->form_validation->set_rules('tag_day', 'tag_day', 'required');
        $this->form_validation->set_rules('tag_price', 'tag_price', 'required');
          $this->form_validation->set_rules('ads_id', 'adsid', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Required field is missing');
        }else{
            $check_by=$this->General_model->RowCount('propertypost_table','ppt_id',$id);
        if($check_by>0){
    
          $data['price_data']=$this->db->query('select a.* from price as a where price_id='.$this->input->post('price_id').' and price_active=1 ')->result();
          
         
             $_POST['payment_type_id']=20;
            $_POST['agent_id']=$user_id;
             $_POST['ppt_id']=$id;
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
        else{
          $this->session->set_flashdata('error', 'Oops something went wrong!');
        }
        }
        
        redirect($_SERVER['HTTP_REFERER']);
 }
public function post_report(){
         $id=base64_decode($this->input->post('adsid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     //date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
      
        $this->form_validation->set_rules('rpt_subject', 'Subject', 'required');
        $this->form_validation->set_rules('rpt_message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            
     $check_by=$this->General_model->RowCount('propertypost_table','ppt_id',$id);
        if($check_by>0){
            	$where="ppt_isDelete=0 and ppt_id='".$id."'";
		
		$data['ads_view']=$this->Adsview_model->show_data_id('propertypost_table',$where);
		$data['user_details']=$this->General_model->show_data_id('user_table',$user_id,'id','get','');
            $_POST['rpt_userid']=$user_id;
             $_POST['rpt_adsid']=$id;
              $_POST['rpt_entry_date']=$today;
              $_POST['rpt_adsuser']=$data['ads_view'][0]->ppt_createdBy;
              $_POST['rpt_adsowner']=$data['ads_view'][0]->ppt_createdBy;
              //$_POST['rpt_phone']=$data['user_details'][0]->phone;
              $_POST['rpt_name']=$data['user_details'][0]->name;
              //$_POST['rpt_email']=$data['user_details'][0]->email;
              
            $query=$this->General_model->show_data_id('table_report','','','insert',$this->input->post());
            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
        }else{
         echo"not";   
        }
        
        }
 }
public function post_complaint(){
         $id=base64_decode($this->input->post('adsid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
     //date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
      
        $this->form_validation->set_rules('cmp_subject', 'Subject', 'required');
        $this->form_validation->set_rules('cmp_message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            
     $check_by=$this->General_model->RowCount('module_lbcontacts','lbcontactId',$id);
        if($check_by>0){
            	$where="is_delete=0 and adstatus_byuser=0 and lbcontactId='".$id."'";
		
		$data['ads_view']=$this->Adsview_model->show_data_id('module_lbcontacts',$where);
		$data['user_details']=$this->General_model->show_data_id('user_table',$user_id,'id','get','');
            $_POST['cmp_userid']=$user_id;
             $_POST['cmp_adsid']=$id;
              $_POST['cmp_entry_date']=$today;
              $_POST['cmp_adsuser']=$data['ads_view'][0]->user_id;
              $_POST['cmp_adsowner']=$data['ads_view'][0]->user_id;
              //$_POST['cmp_phone']=$data['user_details'][0]->phone;
              $_POST['cmp_name']=$data['user_details'][0]->name;
             // $_POST['cmp_email']=$data['user_details'][0]->email;
              
            $query=$this->General_model->show_data_id('table_complaint','','','insert',$this->input->post());
            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
        }else{
         echo"not";   
        }
        
        }
 }


public function post_review(){
         $id=base64_decode($this->input->post('adsid'));
        //exit();
     $user_id=$this->session->userdata('front_sess')['userid'];
     //date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
      //$this->form_validation->set_rules('rv_name', 'Name', 'required');
        $this->form_validation->set_rules('rv_rate', 'Rating', 'required');
        //$this->form_validation->set_rules('qt_email', 'Email', 'required');
        $this->form_validation->set_rules('rv_message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            $where=" lbcontactId='".$id."' and adstatus_byuser=0 and  user_id='".$user_id."'";
            $check_userpost=$this->Adsview_model->RowCount('module_lbcontacts',$where);
          
            if($check_userpost<1){
     $check_by=$this->General_model->RowCount('module_lbcontacts','lbcontactId',$id);
        if($check_by>0){
            $_POST['rv_userid']=$user_id;
             $_POST['rv_adsid']=$id;
              $_POST['rv_name']=$this->session->userdata('front_sess')['name'];
              $_POST['rv_entry_date']=$today;
               
                $where_review=" rv_adsid='".$id."' and rv_userid='".$user_id."'";
            $check_review=$this->Adsview_model->RowCount('user_review',$where_review);
               if($check_review>0){
                echo"multiple";
            }else{
            $query=$this->General_model->show_data_id('user_review','','','insert',$this->input->post());



$rating=$_POST['tm_avrj_ratings'] + $_POST['rv_rate'];
     
     $user=$_POST['tm_total_user']+1;

     $final = round($rating/$user, 1);

     $data1 = array( 

                 'avj_review'      => $final

             ); 

 $query.= $this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactId','update', $data1);


            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            }
            
        }else{
         echo"not";   
        }}
        else{
          echo"user";  
        }
        }
        
 }


public function post_comment(){
         $id=base64_decode($this->input->post('ads_id'));
        //exit();
     $user_id=$this->session->userdata('front_sess')['userid'];
     //date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
      //$this->form_validation->set_rules('rv_name', 'Name', 'required');
        //$this->form_validation->set_rules('rv_rate', 'Rating', 'required');
        //$this->form_validation->set_rules('qt_email', 'Email', 'required');
        $this->form_validation->set_rules('comment', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
           
    
            $_POST['comment_userid']=$user_id;
             $_POST['ads_id']=$id;
              $_POST['comment_name']=$this->session->userdata('front_sess')['name'];
              $_POST['comment_entry_date']=$today;
               
            
               
           
            $query=$this->General_model->show_data_id('comment','','','insert',$this->input->post());




            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
            
        }
        
 }

 public function post_reply(){
         $id=base64_decode($this->input->post('ads_id'));
        //exit();
     $user_id=$this->session->userdata('front_sess')['userid'];
     //date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
      //$this->form_validation->set_rules('rv_name', 'Name', 'required');
        //$this->form_validation->set_rules('rv_rate', 'Rating', 'required');
        //$this->form_validation->set_rules('qt_email', 'Email', 'required');
        $this->form_validation->set_rules('comment', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
           
    
            $_POST['comment_userid']=$user_id;
             $_POST['ads_id']=$id;
              $_POST['comment_name']=$this->session->userdata('front_sess')['name'];
              $_POST['comment_entry_date']=$today;
               
            $_POST['parent_id']=$this->input->post('comentparent_id');
               
           
            $query=$this->General_model->show_data_id('comment','','','insert',$this->input->post());




            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
            
        }
        
 }


 
 public function update_review(){
        $rvid=base64_decode($this->input->post('rvid'));
         $id=base64_decode($this->input->post('adsid'));
        //exit();
     $user_id=$this->session->userdata('front_sess')['userid'];
     //date_default_timezone_set("Asia/Kolkata");
          //$today = date("Y-m-d H:i:s");
      //$this->form_validation->set_rules('rv_name', 'Name', 'required');
        $this->form_validation->set_rules('rv_rate', 'Rating', 'required');
        //$this->form_validation->set_rules('qt_email', 'Email', 'required');
        $this->form_validation->set_rules('rv_message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
          //echo"not";  
          $this->session->set_flashdata('error', 'Something went wrong');
      redirect($_SERVER['HTTP_REFERER']);  
        }else{
            $where=" lbcontactId='".$id."' and adstatus_byuser=0 and  user_id='".$user_id."'";
            $check_userpost=$this->Adsview_model->RowCount('module_lbcontacts',$where);
          
            if($check_userpost<1){
     $check_by=$this->General_model->RowCount('module_lbcontacts','lbcontactId',$id);
        if($check_by>0){
           // $_POST['rv_userid']=$user_id;
             //$_POST['rv_adsid']=$id;
             // $_POST['rv_name']=$this->session->userdata('front_sess')['name'];
              //$_POST['rv_entry_date']=$today;
               
                $where_review=" rv_adsid='".$id."' and rv_userid='".$user_id."'";
            
             $query=$this->General_model->show_data_id('user_review',$rvid,'rv_id','update',$this->input->post());



$rating=$_POST['tm_avrj_ratings'] + $_POST['rv_rate'];
     
     $user=$_POST['tm_total_user']+1;

     $final = round($rating/$user, 1);

     $data1 = array( 

                 'avj_review'      => $final

             ); 

 $query.= $this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactId','update', $data1);




             $rating=$_POST['tm_avrj_ratings'] + $_POST['rv_rate'];
     
     $user=$_POST['tm_total_user']+1;

     $final = round($rating/$user, 1);

     $data1 = array( 

                 'avj_review'      => $final

             ); 

 $query.= $this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactId','update', $data1);
            if($query){
                //echo"success";
                $this->session->set_flashdata('message', 'Review successfully updated');
      redirect($_SERVER['HTTP_REFERER']);
            }else{
              //echo"fail";  
              $this->session->set_flashdata('error', 'Review update faild');
      redirect($_SERVER['HTTP_REFERER']);
            }
            
            
        }else{
        $this->session->set_flashdata('error', 'Something went wrong');
      redirect($_SERVER['HTTP_REFERER']);   
        }}
        else{
          $this->session->set_flashdata('error', 'Something went wrong');
      redirect($_SERVER['HTTP_REFERER']);  
        }
        }
        
 }
 
public function delete_favourite(){
         $id=base64_decode($this->input->post('fv_adsid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
      $where=" fv_id='".$id."' and fv_userid='".$user_id."'";
            $query=$this->Adsview_model->Favourite_delete('favourite_master',$where);
            if($query){
                echo"del";
            }else{
              echo"not";  
            }
     
}
public function post_favourite(){
         $id=base64_decode($this->input->post('fv_adsid'));
     $user_id=$this->session->userdata('front_sess')['userid'];
    
          $today = date("Y-m-d H:i:s");
      $this->form_validation->set_rules('fv_adsid', 'Name', 'required');
        
        if ($this->form_validation->run() == FALSE) 
        {
          echo"not";  
        }else{
            $where="ppt_isDelete=0 and ppt_id='".$id."'";
            $where_fv=" fv_adsid='".$id."' and fv_userid='".$user_id."'";
            $check_userpost=$this->Adsview_model->RowCount('propertypost_table',$where);
           if($check_userpost>0){
     $check_by=$this->Adsview_model->RowCount('favourite_master',$where_fv);
        if($check_by<1){
            $_POST['fv_userid']=$user_id;
             $_POST['fv_adsid']=$id;
              $_POST['fv_entry_date']=$today;
               
            $query=$this->General_model->show_data_id('favourite_master','','','insert',$this->input->post());
            if($query){
                echo"success";
            }else{
              echo"fail";  
            }
            
        }else{
            $where=" fv_adsid='".$id."' and fv_userid='".$user_id."'";
            $query=$this->Adsview_model->Favourite_delete('favourite_master',$where);
            if($query){
                echo"del";
            }else{
              echo"not";  
            }
          
        }
        }else{
          echo"not";   
        }
}
        
 }





 
	
}
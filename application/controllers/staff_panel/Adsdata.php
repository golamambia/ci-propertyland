<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Adsdata extends CI_Controller {

  function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('staff_panel/Model_users');
        $this->load->model('User_model');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->model('Notice_model');
        $this->load->model('Adslist_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        //$this->load->helper('string');
        $this->load->helper("file");
        //error_reporting(0);
        if(!$this->session->userdata('is_logged_in_stf')==1)
        {
            redirect('staff_panel', 'refresh');
        }
        
    }
  
  public function index()
  {
      $adstype=$this->input->get('ads',true);
         $start_date=$this->input->get('start_date',true);
         $end_date=$this->input->get('end_date',true);
         $where="is_delete=0 ";
   		if($adstype =='pending'){
   			$where.=' and post_status=0';
   		}
   		if($adstype =='approved'){
   			$where.=' and post_status=1';
   		}
   		if($start_date !='' && $end_date !=''){
   			$where.=' and module_lbcontacts.entry_date between "'.$start_date.'" and "'.$end_date.'"';
   		}


    
     $data['ads_list']=$this->Adslist_model->show_data_id('module_lbcontacts',$where);
      // $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       //$data['countrylist']=$this->General_model->show_data_id('country','','','get','');

       
    $data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/adslist');
    $this->load->view('staff_panel/footer');
  
  }
  
  public function pending()
  {

    $where="is_delete=0 and post_status=0";
      $data['ads_list']=$this->Adslist_model->show_data_id('module_lbcontacts',$where);
      // $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       //$data['countrylist']=$this->General_model->show_data_id('country','','','get','');

       
    $data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/pending_list');
    $this->load->view('staff_panel/footer');
  
  }
  
  
   public function approved()
  {

    $where="is_delete=0 and post_status=1";
    $data['ads_list']=$this->Adslist_model->show_data_id('module_lbcontacts',$where);
      // $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       //$data['countrylist']=$this->General_model->show_data_id('country','','','get','');

       
    $data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/adslist');
    $this->load->view('staff_panel/footer');
  
  }
  
  public function approved_you()
  {
      $uid=$this->session->userdata('logged_in_stf')['staff_id'];

    $where="is_delete=0 and post_status=1 and approved_by=".$uid."";
    $data['ads_list']=$this->Adslist_model->show_data_id('module_lbcontacts',$where);
      // $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       //$data['countrylist']=$this->General_model->show_data_id('country','','','get','');

       
    $data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/adslist');
    $this->load->view('staff_panel/footer');
  
  }
  
  public function complaint_ads()
  {
      $uid=$this->session->userdata('logged_in_stf')['staff_id'];

    //$where="is_delete=0 and post_status=1 and approved_by=".$uid."";
    $data['ads_list']=$this->Adslist_model->show_data_comads('module_lbcontacts');
      
       
    $data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/ads_complaint_list_view');
    $this->load->view('staff_panel/footer');
  
  }
  public function report_ads()
  {
      $uid=$this->session->userdata('logged_in_stf')['staff_id'];

    //$where="is_delete=0 and post_status=1 and approved_by=".$uid."";
     $data['ads_list']=$this->Adslist_model->show_data_repads('module_lbcontacts');
      
       
    $data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/ads_report_list_view');
    $this->load->view('staff_panel/footer');
  
  }
  

  
public function adsdata_view(){
   
//------------------..----------------//        

        $id = base64_decode($this->input->get('view',TRUE));
       //exit();

        $query=$this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactid','get','');

        $data['result']=$query;
      $g_catid=$data['result'][0]->cat_name;
         $sub_catid=$data['result'][0]->sub_cat;
       $data['catlist']=$this->General_model->show_data_id('category',$g_catid,'id','get','');
       $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       $data['countrylist']=$this->General_model->show_data_id('country','','','get','');
       $data['category_title']=$data['catlist'][0]->name;
        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

        $c_id=$data['result'][0]->country;

        $data['add_country']=$this->General_model->show_data_id('country',$c_id,'id','get','');

        $state_id=$data['result'][0]->state;

        $data['add_state']=$this->General_model->show_data_id('state',$state_id,'sid','get','');

        $s_id=$data['add_state'][0]->sid;

        $city_id=$data['result'][0]->city;

        $data['add_city']=$this->General_model->show_data_id('cities',$city_id,'cid','get','');

        $cat_id=$data['result'][0]->cat_name;
        $sub_cat_id=$data['result'][0]->sub_cat;

        $data['category']=$this->General_model->show_data_id('category',$cat_id,'id','get','');

        $data['sub_category']=$this->General_model->show_data_id('subcategory',$sub_cat_id,'sid','get','');


         $data['notification']=$this->Notice_model->backend_notice_data_list($id);

         $arri_country=$data['result'][0]->depairport_country;

    $dep_coun=$data['result'][0]->arrival_country;

         $data['arrival_country']=$this->General_model->show_data_id('country',$arri_country,'countrycode','get','');

    $data['dep_country']=$this->General_model->show_data_id('country',$dep_coun,'countrycode','get','');

$data['val']=$this->General_model->show_data_id('delivery_location',$id,'post_id','get','');  
$data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/ads_list_view');
    $this->load->view('staff_panel/footer');

}

public function adsdata_checked(){
    //echo 1;
  date_default_timezone_set("Asia/Kolkata");
          $today = date("Y-m-d H:i:s");
  $uid=$this->session->userdata('logged_in_stf')['staff_id'];
  $id =$this->input->post('id');
  $post_st =$this->input->post('post_st');
   $RowCount= $this->General_model->RowCount('module_lbcontacts','lbcontactId',$id);
        if($RowCount<=0){
          $this->session->set_flashdata('error', 'Sorry something went wrong!');
      echo 1;
      }else{
        $datalist = array( 
                'approved_by'   => $uid,
                'approved_date' => $today,
                'post_status'   =>$post_st,
                'update_status'        => 0
                //'status'        => $this->input->post('status'),
            );
            $query= $this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactId','update',$datalist);
           if($query){
               if($post_st>0){
             $this->session->set_flashdata('message', 'Approved successfully done');
               }else{
                   $this->session->set_flashdata('message', 'Ads successfully inactive');
               }
        echo 2;
           }else{
       $this->session->set_flashdata('error', 'Sorry try again!');
      echo 3;
      }
      }
 }

 public function post_notification(){

    $uid=$this->session->userdata('logged_in_stf')['staff_id'];
    $id =$this->input->post('user_id');
    $ads_id =$this->input->post('ads_id');


      $datalist = array( 

        'notice_title'   => $this->input->post('comment_title'),

        'description'   => $this->input->post('comment'),

        'user_id'   => $id,

        'entry_time'   => date('h:i:s'),

        'entry_date'   => date('Y-m-d'),

        'push_by'   => $uid,

        'push_from'   => 'staff',

        'ads_id'   => $ads_id

      
      );
    $query= $this->General_model->show_data_id('notification','','','insert',$datalist);

    if($query){
      $this->session->set_flashdata('message', 'Notification successfully submit');
      redirect($_SERVER['HTTP_REFERER']);
    //redirect('staff_panel/adsdata/adsdata_view?view='.base64_encode($ads_id)); 
    }else{
      $this->session->set_flashdata('error', 'Notification submit faild');
      redirect($_SERVER['HTTP_REFERER']);
      //redirect('staff_panel/adsdata/adsdata_view?view='.base64_encode($ads_id)); 
    } 
      
 }

    public function post_quote(){
       // echo 1;
        $uid=$this->session->userdata('logged_in_stf')['staff_id'];
        $ads=base64_decode($this->input->post('ads'));
 $data['ad_check']=$this->General_model->show_data_id('module_lbcontacts',$ads,'lbcontactId','get','');
 
        $this->form_validation->set_rules('qt_message','Description','required');
   
    $ads_id=base64_encode($ads);
    if($this->form_validation->run()== FALSE){
      $this->session->set_flashdata('error', 'Please try again');
     redirect('staff_panel/adsdata/adsdata_view?view='.$ads_id); 
    //redirect($_SERVER['HTTP_REFERER']);
    }else{
        //echo "good";
        
        $_POST['qt_userid']='steam';
        $_POST['qt_adsid']=$ads;
        $_POST['qt_adsuser']=$data['ad_check'][0]->user_id;
        $_POST['qt_adsowner']=$data['ad_check'][0]->user_id;
        $_POST['qt_teamid']=$uid;
        $_POST['qt_entry_date']=date('Y-m-d H:i:s');
        $query=$this->General_model->show_data_id('support_team_quote','','','insert',$this->input->post());
        if($query){
            $this->session->set_flashdata('message', 'Message sent successfully');
                redirect('staff_panel/adsdata/adsdata_view?view='.$ads_id); 
            }else{
                 //redirect('quote/message_list?ads='.base64_encode($ads).'&user='.base64_encode($chat_user));
                
              $this->session->set_flashdata('error', 'Sorry message not send!');
               redirect('staff_panel/adsdata/adsdata_view?view='.$ads_id); 
            }
    }
    
 
 
    
    }




  

}

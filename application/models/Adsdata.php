<?php
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
        $this->load->model('Adslist_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->helper("file");
        if($this->session->userdata('is_logged_in_stf')!=1)
            {
                redirect('staff_panel', 'refresh');
            }
        
    }
  
  public function index()
  {

       
       
    $where="is_delete=0 ";
    $data['ads_list']=$this->Adslist_model->show_data_id('module_lbcontacts',$where);
      // $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       //$data['countrylist']=$this->General_model->show_data_id('country','','','get','');

       
    $data['title']='The Local Business';
    
    $this->load->view('staff_panel/header',$data);
    $this->load->view('staff_panel/adslist');
    $this->load->view('staff_panel/footer');
  

  }

  
public function adsdata_view(){
   // $user_ip ='103.218.236.102';
$user_ip =getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
//print_r($geo);
$data['country_get']=trim($geo["geoplugin_countryCode"]);
$data['state_get']=trim($geo["geoplugin_region"]);
$data['city_get']=trim($geo["geoplugin_city"]);

        $g_catid=base64_decode($this->input->get('module', TRUE));
        $sub_catid=base64_decode($this->input->get('submodule', TRUE));
       $data['catlist']=$this->General_model->show_data_id('category',$g_catid,'id','get','');
       $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       $data['countrylist']=$this->General_model->show_data_id('country','','','get','');

       $get_countryid=$this->General_model->show_data_id('country',$data['country_get'],'countrycode','get','');
       $get_stateid=$this->General_model->show_data_id('state',$data['state_get'],'state_name','get','');
       $data['statelist']=$this->General_model->show_data_id('state',$get_countryid[0]->id,'countryid','get','');

       $data['citylist']=$this->General_model->show_data_id('cities',$get_stateid[0]->sid,'state_id','get','');

        $data['category_title']=$data['catlist'][0]->name;
//------------------..----------------//        

        $id = base64_decode($this->input->get('view',TRUE));
       //exit();

        $query=$this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactid','get','');

        $data['result']=$query;

        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

        $c_id=$data['result'][0]->country;

        $data['add_country']=$this->General_model->show_data_id('country',$c_id,'id','get','');

        $data['add_state']=$this->General_model->show_data_id('state',$c_id,'countryid','get','');

        $s_id=$data['add_state'][0]->sid;

        $data['add_city']=$this->General_model->show_data_id('cities',$s_id,'state_id','get','');

  
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
   $RowCount= $this->General_model->RowCount('module_lbcontacts','lbcontactId',$id);
        if($RowCount<=0){
          $this->session->set_flashdata('error', 'Sorry something went wrong!');
      echo 1;
      }else{
        $datalist = array( 
                'approved_by'   => $uid,
                'approved_date' => $today,
                'post_status'   =>1
                //'status'        => $this->input->post('status'),
            );
            $query= $this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactId','update',$datalist);
           if($query){
             $this->session->set_flashdata('message', 'Approved successfully done');
        echo 2;
           }else{
       $this->session->set_flashdata('error', 'Sorry try again!');
      echo 3;
      }
      }
 }
  

}

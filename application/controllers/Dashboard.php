<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->model('Search_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
       
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }
	public function index()
	{
        $user_id=$this->session->userdata('front_sess')['userid'];

        $where="is_delete=0 and user_id='".$user_id."'";

        $data['ads_list']=$this->Adslist_model->show_data_id1('module_lbcontacts',$where);

        $data['count']=$this->Adslist_model->get_add_by_user($user_id)->num_rows();

		$data['title']="The Local Browse";
		$this->load->view('header');
		$this->load->view('dashboard',$data);
		$this->load->view('footer');
	}
		public function save_location()
	{
        $user_id=$this->session->userdata('front_sess')['userid'];
         $data['loc_list']=$this->General_model->show_data_id('save_location_list',$user_id,'slt_user','get','');
        
		$data['title']="The Local Browse";
		$this->load->view('header');
		$this->load->view('save_location_list',$data);
		$this->load->view('footer');
	}
	
	public function location_post()
	{
        $user_id=$this->session->userdata('front_sess')['userid'];
        $this->form_validation->set_rules('slt_title','title','required');
        $this->form_validation->set_rules('slt_location','location','required');
    if($this->form_validation->run()== FALSE){
         $this->session->set_flashdata('error', 'Sorry something went wrong, try again!');
        redirect('dashboard/save_location');
    }else{
        
         $RowCount= $this->Search_model->save_loc_count($user_id,$this->input->post('slt_location'));
        if($RowCount>0){
            $this->session->set_flashdata('error', 'Sorry location already exist');
        redirect('dashboard/save_location');
        }else{
        $prepAddr = str_replace(' ','+',$this->input->post('slt_location'));
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          //print_r($output);
          $_POST['slt_lat'] = $output->results[0]->geometry->location->lat;
           $_POST['slt_long'] = $output->results[0]->geometry->location->lng;
           $_POST['slt_user'] =$user_id;
           $_POST['slt_create'] =date('Y-m-d');
            if($_POST['slt_lat']!='' && $_POST['slt_long']!=''){
         $query=$this->General_model->show_data_id('save_location_list','','','insert',$this->input->post());
        
        if($query){
            $this->session->set_flashdata('success', 'Data successfully saved');
        redirect('dashboard/save_location');
        }else{
             $this->session->set_flashdata('error', 'Sorry something went wrong, try again!');
        redirect('dashboard/save_location');
        }
        
            }
            
            
    }
    }
	
	}
	public function location_edit()
    {
  $id=base64_decode($this->input->post('sltid'));

        $this->form_validation->set_rules('slt_title', 'slt_title', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
          redirect('dashboard/save_location');
           
        }else{

         
            //$id=$this->input->post('id');
            $datalist = array( 
                'slt_title'      => $this->input->post('slt_title'),
               
            );
        $query= $this->General_model->show_data_id('save_location_list',$id,'slt_id','update',$datalist);
        if($query){
            $this->session->set_flashdata('message', 'Data successfully Updated');
        }else{
            $this->session->set_flashdata('error', 'Data  update failed');
        }
    
    
   redirect('dashboard/save_location');
       
        } 
    }
		public function location_remove($id)
	{
	     $user_id=$this->session->userdata('front_sess')['userid'];
	    $result= $this->Search_model->save_loc_delete($user_id,$id);
        if($result){
            $this->session->set_flashdata('message', 'Location removed successfully');
        redirect('dashboard/save_location');
        }else{
           $this->session->set_flashdata('error', 'Sorry location already exist');
        redirect('dashboard/save_location'); 
        }
	    
	}
	public function logout()
    {
        $this->session->sess_destroy();
        redirect('register/login');
    }
}

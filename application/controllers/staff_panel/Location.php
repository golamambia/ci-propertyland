<?php
ob_start();
class Location extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->helper("file");
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }

        //Admin Access
        
    }

	// public function index()
	// {
	// 	$query=$this->General_model->show_data_id('event_master','','','get','');
        
 //        $data['datatable']=$query;
 //        $data['title']="User || List";
	// 	$this->load->view('apanel/header',$data);
	// 	$this->load->view('apanel/eventlist');
	// 	$this->load->view('apanel/footer');
	// }

	
	    
//=====================================event category============================//
public function country()
    {
         $data['datatable']=$this->General_model->show_data_id('country','','','get','');
       
        $data['title']="TLB || Country";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/country');
        $this->load->view('apanel/footer');
    }

        public function state()
    {
         $data['datatable']=json_decode($this->General_model->get_st_country());
         //print_r($data['datatable']);
         //exit();
         //$this->General_model->show_data_id_join('state','countryid','country','id','','');
       $data['country']=$this->General_model->show_data_id('country','','','get','');
       
        $data['title']="State";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/state');
        $this->load->view('apanel/footer');
    }

public function country_post()
    {

        $this->form_validation->set_rules('countryname', 'Name', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/location/create'); 
            
        }else{
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('country','','','insert',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/location/country'); 
       
        } 
    }
    public function state_post()
    {

        $this->form_validation->set_rules('state_name', 'Name', 'required');
       $this->form_validation->set_rules('countryid', 'countryname', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/location/state'); 
            //echo 0;
        }else{
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('state','','','insert',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/location/state'); 
       //echo 1;
        } 
    }
    public function country_edit($id)
    {
   

        $this->form_validation->set_rules('countryname', 'Name', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/location/country'); 
           
        }else{
            //$id=$this->input->post('id');
            $datalist = array( 
                'countryname'      => $this->input->post('countryname')
                
                
            );
        $query= $this->General_model->show_data_id('country',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/location/country'); 
       
        } 
    }

    public function state_edit($id)
    {
   //$data['category']=$this->General_model->show_data_id('event_category','','','get','');


        $this->form_validation->set_rules('state_name', 'Name', 'required');
        $this->form_validation->set_rules('countryid', 'countryname', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/location/state'); 
           
        }else{
            
            $datalist = array( 
                'state_name'      => $this->input->post('state_name'),
                 'countryid'  => $this->input->post('countryid')
                
                
            );
            //print_r($datalist);
            //exit();
        $query= $this->General_model->show_data_id('state',$id,'sid','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/location/state'); 
       
        } 
    }

     public function cat_delete($id)
     { 
        $query=$this->General_model->show_data_id('country',$id,'id','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/location/country');
    
     }
public function state_delete($id)
     { 
        $query=$this->General_model->show_data_id('state',$id,'sid','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/location/state');
    
     }

}

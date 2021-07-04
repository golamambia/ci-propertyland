<?php
ob_start();
class Category extends CI_Controller {

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
        $this->load->model('apanel/Custom_model');
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
public function category()
    {
         $data['datatable']=$this->General_model->show_data_id('category','','','get','');
       
        $data['title']="TLB || Category";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/category');
        $this->load->view('apanel/footer');
    }

        public function subcategory()
    {
         $data['datatable']=$this->General_model->show_data_id_join('subcategory','categoryid','category','id','','');
       $data['category']=$this->General_model->show_data_id('category','','','get','');
       
        $data['title']="TLB || Sub-category";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/subcategory');
        $this->load->view('apanel/footer');
    }

public function category_post()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        //$this->form_validation->set_rules('profile_pic', 'Icon', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/category/category'); 
            
        }else{
            if(!empty($_FILES['profile_pic']['name'])){
$new_name = time().$_FILES["profile_pic"]['name'];
            $config = array(
                'upload_path' => "icon/",
                'upload_url' => base_url() . "icon/",
                'allowed_types' => "jpg|png|jpeg",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("profile_pic");
            //$datalist['img'] = $this->upload->data();
            $_POST['icon_name'] =$new_name;
           

        }
        // $datalist = array( 
        //         'name'      => $this->input->post('name'),
        //         'icon_name'      => $_POST['icon_name']
                
                
        //     );
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('category','','','insert',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/category/category'); 
       
        } 
    }
    public function sub_catpost()
    {

        $this->form_validation->set_rules('subname', 'Name', 'required');
       $this->form_validation->set_rules('categoryid', 'categoryid', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/category/subcategory'); 
            //echo 0;
        }else{
            $_POST['entry_date']=date('Y-m-d');
        $query= $this->General_model->show_data_id('subcategory','','','insert',$_POST);
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/category/subcategory'); 
       //echo 1;
        } 
    }
    public function category_edit($id)
    {
   $data['cat_info']=$this->General_model->show_data_id('category',$id,'id','get','');

        $this->form_validation->set_rules('name', 'Name', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/category/category'); 
           
        }else{

            if(!empty($_FILES['profile_pic']['name'])){
$new_name = time().$_FILES["profile_pic"]['name'];
            $config = array(
                'upload_path' => "icon/",
                'upload_url' => base_url() . "icon/",
                'allowed_types' => "jpg|png|jpeg",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("profile_pic");
            //$datalist['img'] = $this->upload->data();
            $_POST['icon_name'] =$new_name;
            

}else{

$_POST['icon_name'] = $data['cat_info'][0]->icon_name;
}
            //$id=$this->input->post('id');
            $datalist = array( 
                'name'      => $this->input->post('name'),
                'icon_name'      => $_POST['icon_name']
                
                
            );
        $query= $this->General_model->show_data_id('category',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/category/category'); 
       
        } 
    }

    public function subcategory_edit($id)
    {
   //$data['category']=$this->General_model->show_data_id('event_category','','','get','');


        $this->form_validation->set_rules('subname', 'Name', 'required');
        $this->form_validation->set_rules('categoryid', 'category', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/category/subcategory'); 
           
        }else{
            
            $datalist = array( 
                'subname'      => $this->input->post('subname'),
                 'categoryid'  => $this->input->post('categoryid')
                
                
            );
            //print_r($datalist);
            //exit();
        $query= $this->General_model->show_data_id('subcategory',$id,'sid','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/category/subcategory'); 
       
        } 
    }

     public function cat_delete($id)
     { 
        $query=$this->General_model->show_data_id('category',$id,'id','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/category/category');
    
     }
public function subcat_delete($id)
     { 
        $query=$this->General_model->show_data_id('subcategory',$id,'sid','delete','');

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/category/subcategory');
    
     }
     
     public function set_sub_homepage(){
         $tab=$this->input->post('tab');
         $action=$this->input->post('action');
         $subcat=$this->input->post('subcat');
         $val=$this->input->post('val');
         if($tab=='top'){
             
         if($action=='yes'){
             $subcat_count=$this->Custom_model->idwise_count('subcategory','top_category',1);
             if($subcat_count>=4){
                 echo"Already selected 4 items";
             }else{
              $datalist = array( 
                //'subname'      => $this->input->post('subname'),
                 'top_category'  => 1
                
            );
            
        $query= $this->General_model->show_data_id('subcategory',$subcat,'sid','update',$datalist);
        if(!$query){
            echo"Sorry try again";
        }
        
             }
             
         }else{
             $datalist = array( 
                //'subname'      => $this->input->post('subname'),
                 'top_category'  => 0
                
            );
             $query= $this->General_model->show_data_id('subcategory',$subcat,'sid','update',$datalist);
        if(!$query){
            echo"Sorry try again";
        }
         }
        
         }else{
         if($action=='yes'){
             $subcat_count=$this->Custom_model->idwise_count('subcategory','home_page',1);
             if($subcat_count>=4){
                 echo"Already selected 4 items";
             }else{
              $datalist = array( 
                //'subname'      => $this->input->post('subname'),
                 'home_page'  => 1
                
            );
            
        $query= $this->General_model->show_data_id('subcategory',$subcat,'sid','update',$datalist);
        if(!$query){
            echo"Sorry try again";
        }
        
             }
             
         }else{
             $datalist = array( 
                //'subname'      => $this->input->post('subname'),
                 'home_page'  => 0
                
            );
             $query= $this->General_model->show_data_id('subcategory',$subcat,'sid','update',$datalist);
        if(!$query){
            echo"Sorry try again";
        }
         }
         
         //echo 1;
         
     }
     } 
    
     

}

<?php
ob_start();
class Event extends CI_Controller {

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
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
		$query=$this->General_model->show_data_id('event_master','','','get','');
        
        $data['datatable']=$query;
        $data['title']="User || List";
		$this->load->view('apanel/header',$data);
		$this->load->view('apanel/eventlist');
		$this->load->view('apanel/footer');
	}

	
	

	//========================= Edit Admin =================================
	public function edit($id)
	{
		$query=$this->General_model->show_data_id('event_master',$id,'id','get','');
        $data['result']=$query; 
		$data['title']="User || Edit";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/eventEdit');
        $this->load->view('apanel/footer');
	}
    public function edit_post($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('event_start_date', 'event', 'required');
        $this->form_validation->set_rules('event_end_date', 'event', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
          redirect('apanel/event/edit/'.$id); 

        }else{

if(!empty($_FILES['img']['name'])){
$new_name = time().$_FILES["img"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|mp3",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("img");
            //$datalist['img'] = $this->upload->data();

}else{

$new_name = $this->input->post('image_hid');
}

            $datalist = array( 
                'name'      => $this->input->post('name'),
                'location'      => $this->input->post('location'),
                'description'      => $this->input->post('description'),
                'event_start_date'     => $this->input->post('event_start_date'),
                'event_end_date'   => $this->input->post('event_end_date'),
                'img'   => $new_name,
                 'entry_date'   =>date('Y-m-d')
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('event_master',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully updated');

       redirect('apanel/event/edit/'.$id); 
        }
         
    }

public function create()
    {
        
       
        $data['title']="User || Registration";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/eventCreate');
        $this->load->view('apanel/footer');
    }
    public function create_post()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('event_start_date', 'event', 'required');
        $this->form_validation->set_rules('event_end_date', 'event', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/event/create'); 

        }else{
           
    $new_name = time().$_FILES["img"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|mp3",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("img");
            //$datalist['img'] = $this->upload->data();

            $datalist = array( 
                'name'      => $this->input->post('name'),
                'location'      => $this->input->post('location'),
                'description'      => $this->input->post('description'),
                'event_start_date'     => $this->input->post('event_start_date'),
                'event_end_date'   => $this->input->post('event_end_date'),
                'img'   => $new_name,
                 'entry_date'   =>date('Y-m-d')
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('event_master','','','insert',$datalist);
    $this->session->set_flashdata('message', 'Data successfully Saved');
if(!empty($get_last_id)){

for($i=0; $i<=count($file_tmp); $i++){
if(!empty($file_tmp[$i])){
$arr=getimagesize($file_tmp[$i]);
$userfile_extn = end(explode(".", strtolower($filename[$i])));
if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
$tmp_name = $file_tmp[$i];
$name = time()."_".$filename[$i];
move_uploaded_file($tmp_name, base_url() . "uploads/".$name);
$_POST['image'] = $name;
$_POST['post_id'] = $get_last_id;
//$db->insertDataArray(DTABLE_EVENT_IMG,$_POST);
}else{
$msg="Picture's must be .jpeg/.jpg/.png/.gif please check extension";
}
}
else{
$msg="Please select some images...";
}
}
}
       redirect('apanel/event/create'); 
       
        } 
    }
	//========================= End Edit Admin =================================

	public function get_useremail(){
        //echo $email;
        $email=$this->input->post('email');
       echo $query= $this->General_model->RowCount('user_table','email',$email);
    }

	//========================= Delete Admin =================================
    public function delete($id)
     { 
	    $query=$this->General_model->show_data_id('event_master',$id,'id','delete','');

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/event');
	
	 }
    //=========================End Delete Admin ================================= 



     //========================= Insert Admin =================================

    public function insert_admin()
    {
        $this->form_validation->set_rules('admin_email', 'Admin Email', 'required|is_unique[admin_details.admin_email]');
        $this->form_validation->set_rules('username', 'Admin Username', 'required|is_unique[admin_details.username]');
        $this->form_validation->set_rules('password', 'Admin Password', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', validation_errors('<li>', '</li>'));
            redirect('superpanel/admin_user/add_admin');

        }
        else
        {

            $config = array(
                'upload_path' => "uploads/admin/",
                'upload_url' => base_url() . "uploads/admin/",
                'allowed_types' => "gif|jpg|png|jpeg|mp3"
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("admin_image");
            $data['admin_image'] = $this->upload->data();

            $data = array(
                'admin_image' => base_url().'uploads/admin/'.$data['admin_image']['file_name'],
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'pass_view' => $this->input->post('password'),
                'admin_email' => $this->input->post('admin_email'),
                'status' => $this->input->post('status'),
                
            );

             $result=$this->General_model->show_data_id('admin_details','','','insert', $data);
             $last_id = $this->db->insert_id();

             $data1 = array(
                'admin_id' => $last_id,
                'name' => $this->input->post('username'),       
                'customer' => $this->input->post('customer'),
                'categories' => $this->input->post('categories'),
                'product' => $this->input->post('product'),
                
                'contact' => $this->input->post('contact'),
              );

            $result = $this->General_model->show_data_id('admin_access', '', '', 'insert', $data1);
            $this->session->set_flashdata('success', 'Admin added successfully');
            redirect('superpanel/admin_user');
             }

    }

    //========================= End Insert Admin =================================
}


<?php
ob_start();
class User extends CI_Controller {

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
        //$this->load->helper('custom');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
		$query=$this->General_model->show_data_id('user_table','','','get','');
        
        $data['datatable']=$query;
        $data['title']="User || List";
		$this->load->view('apanel/header',$data);
		$this->load->view('apanel/userlist');
		$this->load->view('apanel/footer');
	}

	public function add_admin()
	{
		$data['title']="Add Admin";
        $this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/admin_user_entry');
		$this->load->view('superpanel/footer');
	}

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

	//========================= Edit Admin =================================
	public function user_edit($id)
	{
		$query=$this->General_model->show_data_id('user_table',$id,'id','get','');
        $data['user']=$query; 
		$data['title']="User || Edit";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/user_edit');
        $this->load->view('apanel/footer');
	}
    public function user_edit_post($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/user/user_edit/'.$id);

        }else{
            $datalist = array( 
                'name'      => $this->input->post('name'),
                'email'      => $this->input->post('email'),
                'phone'     => $this->input->post('phone'),
                'status'   => $this->input->post('status') 
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('user_table',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully updated');

       redirect('apanel/user/user_edit/'.$id); 
        }  
    }

public function user_add()
    {
        
       
        $data['title']="User || Registration";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/user_add');
        $this->load->view('apanel/footer');
    }
    public function user_add_post()
    {
       

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/user/user_add');

        }else{
            $email=$this->input->post('email');
        $RowCount= $this->General_model->RowCount('user_table','email',$email);
        if($RowCount>0){
            $this->session->set_flashdata('error', 'Email already exist!');

       redirect('apanel/user/user_add'); 
        }else{
            // $datalist = array( 
            //     'name'      => $this->input->post('name'),
            //     'email'      => $this->input->post('email'),
            //     'phone'     => $this->input->post('phone'),
            //     //'status'   => $this->input->post('status'),
            //      'entry_date'   =>date('Y-m-d'),
            //     'status'        => $this->input->post('status')
            // );

            //$_POST['entry_date']=date('Y-m-d');
      //$jj=formData('k');
     
        
    $query= $this->General_model->show_data_id('user_table','','','insert',$this->input->post());
    $this->session->set_flashdata('message', 'Data successfully Saved');
 
       redirect('apanel/user/user_add'); 
        } 
        } 
    }
	//========================= End Edit Admin =================================

	public function get_useremail(){
        //echo $email;
        $email=$this->input->post('email');
       echo $query= $this->General_model->RowCount('user_table','email',$email);
    }

	//========================= Delete Admin =================================
    public function user_delete($id)
     { 
	    $query=$this->General_model->show_data_id('user_table',$id,'id','delete','');

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/user');
	
	 }
    //=========================End Delete Admin ================================= 
}


<?php
ob_start();
class Admin_user extends CI_Controller {

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
            redirect('superpanel', 'refresh');
        }

        //Admin Access
        $query = $this->General_model->show_data_id('admin_access',$this->session->userdata('access_id'),'admin_id','get','');
        if($query[0]->admin_users == 0 || $query[0]->admin_users == NULL){
            redirect('superpanel/home');
        }
        //End of Admin Access
    }

	public function index()
	{
		$query=$this->General_model->show_data_id('admin_details','','','get','');
        $data['admin']=$query;
        $data['title']="Dahboard || Great Wine Global";
		$this->load->view('superpanel/header',$data);
		$this->load->view('superpanel/admin_user');
		$this->load->view('superpanel/footer');
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
                'product_review' => $this->input->post('product_review'),
                'orders' => $this->input->post('orders'),
                'slider' => $this->input->post('slider'),
                'cms_pages' => $this->input->post('cms_pages'),
                'newsletter' => $this->input->post('newsletter'),           
                'general_settings' => $this->input->post('general_settings'),
                'admin_users' => $this->input->post('admin_users'),
                'subscription' => $this->input->post('subscription'),
                'visitor_enquery' => $this->input->post('visitor_enquery'),
                'contact' => $this->input->post('contact'),
              );

            $result = $this->General_model->show_data_id('admin_access', '', '', 'insert', $data1);
            $this->session->set_flashdata('success', 'Admin added successfully');
            redirect('superpanel/admin_user');
             }

	}

	//========================= End Insert Admin =================================

	//========================= Edit Admin =================================
	public function edit_admin_user($id)
	{
		$query=$this->General_model->show_data_id('admin_details',$id,'id','get','');
        $data['admin']=$query; 
		$data['title']="Dahboard || Great Wine Global";
        $this->load->view('superpanel/header',$data);
        $this->load->view('superpanel/edit_admin_user');
        $this->load->view('superpanel/footer');
	}
	//========================= End Edit Admin =================================

	//========================= Update Admin =================================
	public function update_admin_user($id)
	{
		$config = array(
            'upload_path' => "uploads/admin/",
            'upload_url' => base_url() . "uploads/admin/",
            'allowed_types' => "gif|jpg|png|jpeg"
        );

        $this->load->library('upload', $config);
        if($this->upload->do_upload('admin_image')) {

            $data['admin_image'] = $this->upload->data();
            $filename = $data['admin_image']['file_name'];
		   
            $datalist = array( 
                'admin_image'   => base_url().'uploads/admin/'.$filename, 
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')),
                'pass_view'     => $this->input->post('password'),
				'admin_email'   => $this->input->post('admin_email'), 
                'status'        => $this->input->post('status'), 
            );
        }else{
            $datalist = array( 
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')),
                'pass_view'     => $this->input->post('password'),
				'admin_email'   => $this->input->post('admin_email'), 
                'status'        => $this->input->post('status'),
            );
        }  

        $query= $this->General_model->show_data_id('admin_details',$id,'id','update',$datalist);
        redirect('superpanel/admin_user');
	}
   //========================= End Update Admin =================================

	//========================= Delete Admin =================================
    public function delete_admin_user($id)
     { 
	    $query=$this->General_model->show_data_id('admin_details',$id,'id','delete','');

	    if ($query) 
	    {   
		    $data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    @unlink(str_replace(base_url(),'',$query[0]->admin_image));
	    }

        redirect('superpanel/admin_user');
	
	 }
    //=========================End Delete Admin ================================= 
}


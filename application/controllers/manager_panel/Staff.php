<?php
ob_start();
class Staff extends CI_Controller {

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
        $this->load->library("PhpMailerLib");
        $this->load->model('General_model');
        //$this->load->model('Staff_model');
        $this->load->helper('url');
        $this->load->helper('string');
        //$this->load->helper('custom');
       if(!$this->session->userdata('is_logged_in_mng')==1)
        {
            redirect('manager_panel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
		$query=$this->General_model->get_mstaff();
        
        $data['datatable']=$query;

        $data['title']="Staff || List";

        //echo "<pre>"; print_r($data); exit();

		$this->load->view('manager_panel/header',$data);
		$this->load->view('manager_panel/stafflist');
		$this->load->view('manager_panel/footer');
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
	public function staff_edit($id)
	{
        $data['country_list']=$this->General_model->show_data_id('country','','','get','');
		$query=$this->General_model->show_data_id('staff_table',$id,'id','get','');
        $data['user']=$query; 
		$data['title']="Staff || Edit";
        $this->load->view('manager_panel/header',$data);
        $this->load->view('manager_panel/staff_edit');
        $this->load->view('manager_panel/footer');
	}
    public function staff_edit_post($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('manager_panel/staff/staff_edit/'.$id);

        }else{
            $datalist = array( 
                'name'      => $this->input->post('name'),
                //'email'      => $this->input->post('email'),
                'password'      => md5($this->input->post('pass')),
                'pass_view' => $this->input->post('pass'),
                'phone'     => $this->input->post('phone'),
                'user_type'     => $this->input->post('user_type'),
                'country'     => $this->input->post('country'),
                'status'   => $this->input->post('status') 
                //'status'        => $this->input->post('status'),
            );
            
        
        $query= $this->General_model->show_data_id('staff_table',$id,'id','update',$datalist);
    $this->session->set_flashdata('message', 'Data successfully updated');

       redirect('manager_panel/staff/staff_edit/'.$id); 
        }  
    }

public function staff_add()
    {
        $data['country_list']=$this->General_model->show_data_id('country','','','get','');
       
        $data['title']="Staff || Registration";
        $this->load->view('manager_panel/header',$data);
        $this->load->view('manager_panel/staff_add');
        $this->load->view('manager_panel/footer');
    }
    public function staff_add_post()
    {
       //exit(); 

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('manager_panel/staff/staff_add');

        }else{
            $email=$this->input->post('email');
        $RowCount= $this->General_model->RowCount('staff_table','email',$email);
        if($RowCount>0){
            $this->session->set_flashdata('error', 'Email already exist!');

       redirect('manager_panel/staff/staff_add'); 
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

             $rand='TLB'.rand (0,9999999);
     $_POST['password']=md5($this->input->post('pass'));
     $_POST['pass_view'] = $this->input->post('pass');
        $_POST['reference_id']=$rand;
        $_POST['mail_verification']='Inactive';

    $query= $this->General_model->show_data_id('staff_table','','','insert',$this->input->post());
    if($query>0){
        $actv=$rand.'AMB'.$query;
    $this->session->set_flashdata('message', 'Data successfully Saved');
 
        $log       = base_url(). "staff_panel/main/log_status?activation=".base64_encode($actv);
    $mail = $this->phpmailerlib->load();
    $subject   = "Registration Successful with us";
               
                $mail_body = '<html><body>';
                $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                $mail_body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $this->input->post('name') . "</td></tr>";
                $mail_body .= "<tr><td><strong>Your Reference ID:</strong> </td><td>" . $rand . "</td></tr>";
                
                $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $this->input->post('email') . "</td></tr>";
                //$mail_body .= "<tr ><td><strong>Password:</strong> </td><td>" . $this->input->post('password') . "</td></tr>";
                $mail_body .= "<tr><td><strong>Click here for activation:</strong> </td><td>" . $log . "</td></tr>";
                $mail_body .= "</table>";
                $mail_body .= "</body></html>";
                $mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>The Local Browse</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
                //$name=$_POST["name"];
                
                $mail->IsSMTP();
                $mail->Host     = "cp-46.webhostbox.net";
                $mail->SMTPAuth = true;
                $mail->Username = "sendmail@webtechnomind.co.in";
                $mail->Password = "ZM-(XPt2ie!z";
                $mail->From     = "sendmail@webtechnomind.co.in";
                $mail->FromName = "Registration Successful - " . $this->input->post('name');
                
                //$mail->AddAddress('wtm.golam@gmail.com');
                $mail->AddAddress($this->input->post('email'));
                $mail->WordWrap = 5;
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $mail_body;
                $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
                $mail->Send();


       redirect('manager_panel/staff/staff_add');
       }else{
        $this->session->set_flashdata('error', 'Sorry registration failed');
        redirect('manager_panel/staff/staff_add');
       }  
        } 
        } 
    }
	//========================= End Edit Admin =================================

	public function get_staffemail(){
        //echo $email;
        $email=$this->input->post('email');
       echo $query= $this->General_model->RowCount('staff_table','email',$email);
    }

	//========================= Delete Admin =================================
    public function staff_delete($id)
     { 
	    $query=$this->General_model->show_data_id('staff_table',$id,'id','delete','');

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/staff');
	
	 }
    //=========================End Delete Admin ================================= 
}


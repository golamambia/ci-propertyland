<?php
ob_start();
class Users extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('staff_panel/Model_users');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('is_logged_in_stf')==1)
        {
            redirect('staff_panel', 'refresh');
        }
      
    }
public function index()
    {   
      //print_r($this->session->userdata('logged_in_stf'));
      $user_status=$this->input->get('user_status',true);
      $staff=$this->input->get('staff',true);
         $start_date=$this->input->get('start_date',true);
         $end_date=$this->input->get('end_date',true);
         $where="";
      if($user_status =='pending'){
        $where.=' and a.status="Active"';
      }
      if($user_status =='approved'){
        $where.=' and a.status="Inactive"';
      }
      if($staff){
        $where.=' and a.verified_by='.$staff.'';
      }
      $userid=$this->session->userdata('logged_in_stf')['staff_id'];
       $data['datatable']=$this->db->query("SELECT a.* FROM user_table as a WHERE a.isDelete=0 ".$where." ")->result();
       $data['staff_list']=$this->db->query("SELECT a.* FROM staff_table as a WHERE a.status='Active' and a.manager_name=".$userid."")->result();
        
        $data['title']="User || Register";
        $this->load->view('staff_panel/header',$data);
        $this->load->view('staff_panel/register_userlist');
        $this->load->view('staff_panel/footer');
    }
	public function register_user()
	{   $userid=$this->session->userdata('logged_in_stf')['staff_id'];
       $data['datatable']=$this->db->query("SELECT a.* FROM user_table as a WHERE a.tagged_staff_id=".$userid." and a.isDelete=0")->result();
        
		$data['title']="User || Register";
		$this->load->view('staff_panel/header',$data);
		$this->load->view('staff_panel/userlist');
		$this->load->view('staff_panel/footer');
	}
public function verify()
    {   
      $user_status=$this->input->get('user_status',true);
      $staff=$this->input->get('staff',true);
         $start_date=$this->input->get('start_date',true);
         $end_date=$this->input->get('end_date',true);
         $where="";
      if($user_status =='pending'){
        $where.=' and a.status="Active"';
      }
      if($user_status =='approved'){
        $where.=' and a.status="Inactive"';
      }
      if($staff){
        $where.=' and a.verified_by='.$staff.'';
      }

      $userid=$this->session->userdata('logged_in_stf')['staff_id'];
       $data['datatable']=$this->db->query("SELECT a.* FROM user_table as a WHERE a.isDelete=0 and a.tagged_staff_id!=0 ".$where."")->result();
       $data['staff_list']=$this->db->query("SELECT a.* FROM staff_table as a WHERE a.status='Active' and a.manager_name=".$userid."")->result();
        
        $data['title']="User || Register";
        $this->load->view('staff_panel/header',$data);
        $this->load->view('staff_panel/register_userlist');
        $this->load->view('staff_panel/footer');
    }
    public function user_verify($id){
      $userid=$this->session->userdata('logged_in_stf')['staff_id'];
       $data['user']=$this->db->query("SELECT a.* FROM user_table as a WHERE a.isDelete=0 and a.id=".$id."")->result();
        
        $data['title']="User || verification";
        $this->load->view('staff_panel/header',$data);
        $this->load->view('staff_panel/useredit_verify');
        $this->load->view('staff_panel/footer');
    }
    public function verify_edit_post($id)
    {
    //$id=$this->session->userdata('front_sess')['userid'];
    
    $data['user_info']=$this->General_model->show_data_id('user_table',$id,'id','get','');
        $data['title']='TLB || Profile';
     
      if($this->input->post('status')=='Inactive'){
        $this->form_validation->set_rules('blocked_comment', 'Blocked comment', 'required');
      }else{
        $_POST['blocked_comment']='';
      }
      $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('verified_comments', 'verified comments', 'required');
        //$this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('verification_status', 'verification status', 'required');
        
        
        if ($this->form_validation->run() == FALSE) 
        {
            $data['user']=$this->db->query("SELECT a.* FROM user_table as a WHERE a.isDelete=0 and a.id=".$id."")->result();
          
        $data['title']="User || verification";
        $this->load->view('staff_panel/header',$data);
        $this->load->view('staff_panel/useredit_verify');
        $this->load->view('staff_panel/footer');

        }else{
       
           
        
        $_POST['verified_by']=$this->session->userdata('logged_in_stf')['staff_id'];
        $_POST['verified_date']=date('Y-m-d');
            $query= $this->General_model->show_data_id('user_table',$id,'id','update',$this->input->post());
    if($query){

        $this->session->set_flashdata('message', 'Data successfully updated');
      redirect($_SERVER['HTTP_REFERER']);
       }else{
        $this->session->set_flashdata('error', 'Sorry your update failed');
       redirect($_SERVER['HTTP_REFERER']);
       } 
    
} 
    }
     function payment($offset=0){
      $staff=$this->input->get('staff',true);
      $where='';
     $userid=$this->session->userdata('logged_in_stf')['staff_id'];
       $start_date=$this->input->get('start_date',true);
         $end_date=$this->input->get('end_date',true);
          if($staff){
        $where.=' and d.tagged_staff_id='.$staff.'';
      }
         if($start_date !='' && $end_date !=''){
        $where.=' and a.payment_date between "'.$start_date.'" and "'.$end_date.'"';
        $data['cart_list']=$this->db->query('select  SUM(amount) as total, a.*,b.ppt_title,b.tagged_staff_id,c.payment_type_text,c.payment_text,c.days_valid,c.price,d.name from payments as a left join propertypost_table as b on b.ppt_id=a.ppt_id inner join price as c on c.price_id=a.price_id inner join user_table d on d.id=a.agent_id where payment_cleared=1 and b.tagged_staff_id!=0 '. $where.' group by payment_ref')->result();
        //echo $this->db->last_query();
      }else{
        $data['cart_list']=array();
      }

       $data['staff_list']=$this->db->query("SELECT a.* FROM staff_table as a WHERE a.status='Active' and a.manager_name=".$userid."")->result();
      
        $data['title']="Payment";

        $this->load->view('staff_panel/header',$data);

        $this->load->view('staff_panel/payment_historybystf');

        $this->load->view('staff_panel/footer');

    
    }

     function payment_details($offset=0){
      $pay_ref=base64_decode($this->input->get('view'));
      
      $data['cart_list']=$this->db->query('select a.*,b.ppt_title,c.payment_type_text,c.payment_text,c.days_valid,c.price,d.name from payments as a left join propertypost_table as b on b.ppt_id=a.ppt_id inner join price as c on c.price_id=a.price_id inner join user_table d on d.id=a.agent_id where payment_cleared=1 and payment_ref="'.$pay_ref.'"')->result();
      
        $data['title']="Payment";

        $this->load->view('apanel/header',$data);

        $this->load->view('apanel/payment_history_details');

        $this->load->view('apanel/footer');

    
    }
  public function user_delete($id)
     { 
        $datalist = array( 
                'deletion_date'      => date('Y-m-d'),
                'isDelete'      => 1,
                'status'   => 'Inactive' 
                
            );
            
        
        $query= $this->General_model->show_data_id('user_table',$id,'id','update',$datalist);

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

      redirect($_SERVER['HTTP_REFERER']);
    
     }
     public function login(){
        $user=base64_decode($this->input->get('user'));
         $stf=$this->session->userdata('logged_in_stf')['staff_id'];
        $data['userdata']=$this->db->query("SELECT a.* FROM user_table as a WHERE a.tagged_staff_id=".$stf." and a.id=".$user." and a.isDelete=0")->result();

        if($data['userdata'][0]->id){
            $session_data = array(
                    'name'=>$data['userdata'][0]->name,
                    'email'=>$data['userdata'][0]->email,
                    'phone'=>$data['userdata'][0]->phone,
                    'user_type'=>$data['userdata'][0]->user_type,
                    'userid'=>$data['userdata'][0]->id,
                    'tagged_staff_id'=>$data['userdata'][0]->tagged_staff_id
                    
                );
                $this->session->set_userdata('log_check','1');
                $this->session->set_userdata('user_photo', $data['userdata'][0]->user_photo);
            $this->session->set_userdata('front_sess', $session_data);
            $this->session->set_flashdata('message', 'User login successful');
        }else{
             $this->session->set_flashdata('error', 'Something went wrong');
        }
        redirect($_SERVER['HTTP_REFERER']);

     }
     public function logout()
    {
        $this->session->unset_userdata('log_check');
        $this->session->unset_userdata('front_sess');
        //$this->session->sess_destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }

}
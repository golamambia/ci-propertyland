<?php 
 class Model_users extends CI_Model{
 	
    public function login($data) {
		$condition="email='".$data['username']."' and password='".md5($data['password'])."' and status='Active' ";
		$this->db->select('*');
		$this->db->from('staff_table');
		$this->db->where($condition);
		//$this->db->limit(1);
		$query = $this->db->get();
//$sql = $this->db->last_query();
	//return $sql;
		
		if ($query->num_rows() == 1) {
			$result=$query->row();
			//return $result;
			//return $result->mail_verification;
		//exit();
			if($result->mail_verification=='Inactive'){
        	 	return 'mail_not';
        	 }else if($result->status=='Inactive'){
        	 	return 'st_not';
        	 }else{
			$this->db->select('admin_image');
		$this->db->from('admin_details');
			$logo_get = $this->db->get();
			$logo_fetch =$logo_get->result_array();

		    //Admin Access
            $id=$query->result_array();
            $this->session->set_userdata('access_id_stf',$id[0]["id"]);
            //End Admin Access
            $session_data = array(
					'username'=>$id[0]["name"],
					'name'=>$id[0]["name"],
					'staff_id'=>$id[0]["id"],
					'logo'=>$logo_fetch[0]["admin_image"],
					'is_logged_in_stf'=>1
				);

			$this->session->set_userdata('logged_in_stf', $session_data);
            
			return 'ok';
		}
		} else {
			return 'not';
		}
	} 

public function forgot($data) {
		$condition = "email =" . "'" . $data['email'] . "' and status='Active' and mail_verification='Active' ";
		$this->db->select('*');
		$this->db->from('staff_table');
		$this->db->where($condition); 
		$this->db->limit(1);
		$query = $this->db->get();
	
		if ($query->num_rows() == 1) {

		    //Admin Access
            $id=$query->result_array();
            

            
			return $id[0]["pass_view"];
			//return true;
		} else {
			return false;
		}
	}


	 
	public function can_log_in(){
		$this->db->where('UserName',$this->input->post('username'));
		$this->db->where('UserPassword',md5($this->input->post('password')));
		$query=$this->db->get('admin_detail');
		$result = $query->result();
		return $result;
		/*if($query->num_rows()==1){
			return true;
		}else{
			return false;
		}*/
	} 
	
	
	 
	 
	public function checkOldPass($old_password,$id){
		$this->db->select('*');
		$this->db->where('AdminId', $id);
		$this->db->where('UserPassword', $old_password);
		$query = $this->db->get('admin_detail');
		$result = $query->result();
		return $result;
	}
	function show_pass()
	{
		$sql ="select * from admin_detail where AdminId=1 ";
		$query = $this->db->query($sql);
		return($query->num_rows() > 0) ? $query->result(): NULL;
	}
	public function saveNewPass($new_pass,$id){
		$data = array(
			   'UserPassword' => $new_pass
			);
		$this->db->where('AdminId', $id);
		$this->db->update('admin_detail', $data);
		return true;
		print $this->db->last_query();
	}
	
	
}



?>
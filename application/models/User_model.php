<?php
class User_model extends CI_Model{

		function __construct() 
		{
			$this->tableName = 'user_table';
		    parent::__construct();
		}
	//========================== LOGIN CHECK =========================
	function login($data)
	{
        $condition="email ="."'".$data['email']."' and pass ="."'". base64_encode($data['pass']) ."'";
        
		$this->db->select('*');
		$this->db->from('user_table');
		$this->db->where($condition);
		$this->db-> where('status','Active');
        $this->db-> where('isDelete',0);
		$this->db->limit(1);
		$query =$this->db->get();
        if($query->num_rows()==1){
        	//return 'yes';
        	$result=$query->row();
        	
        	 if($result->mail_verification=='Inactive'){
        	 	return 'mail_not';
        	 }else if($result->status=='Inactive'){
        	 	return 'st_not';
        	 }else{
        	 	$session_data = array(
					'name'=>$result->name,
					'email'=>$result->email,
					'phone'=>$result->phone,
                    'user_type'=>$result->user_type,
					'userid'=>$result->id,
                    'tagged_staff_id'=>$result->tagged_staff_id,
					
				);
        	 	$this->session->set_userdata('log_check','1');
        	 	$this->session->set_userdata('user_photo', $result->user_photo);
			$this->session->set_userdata('front_sess', $session_data);
        	 	return $result;
        	 }
        	
        }else{
            return 'not'; 
        }
		
	 } 
	//===================== LOGIN CHECK ============================== 

	public function checkUser($data = array()){ 
        //echo "<pre>";print_r($data);//exit();
        $this->db->select('*'); 
        $this->db->from($this->tableName); 
         
        $con = array( 
            'oauth_provider' => $data['oauth_provider'], 
            'oauth_uid' => $data['oauth_uid']  
        ); 
        $this->db->where($con); 
        $query = $this->db->get(); 
         
        $check = $query->num_rows(); 
        if($check > 0){ 
            // Get prev user data 
            $result = $query->row_array(); 
            // $dataupdate['name']=$data['name']; 
         $dataupdate['email']=$data['email'];
         $dataupdate['oauth_provider']=$data['oauth_provider']; 
         $dataupdate['oauth_uid']=$data['oauth_uid'];
         //$dataupdate['name']=$data['user_photo'];
        
            // Update user data 
            //$data['modified'] = date("Y-m-d"); 
            $update = $this->db->update($this->tableName, $dataupdate, array('id' => $result['id'])); 
             
            // Get user ID 
            $userID = $result['id']; 
        }else{ 
            // Insert user data 
            $rand='PLS'.rand (0,9999999);
            $data['reference_id']=$rand;
           $data['entry_date']=date('Y-m-d');
            $data['status']='Active';
            $data['mail_verification'] ='Active';
            $data['pass'] =base64_encode(rand(00000,99999)); 
            $insert = $this->db->insert($this->tableName, $data); 
             
            // Get user ID 
            $userID = $this->db->insert_id();

            $data1['userid'] = $userID; 

            //$this->db->insert('delivery_address', $data1);

            //$this->db->insert('invoice_address', $data1); 


        } 
         
        // Return user ID 
        return $userID?$userID:false; 
    } 
}
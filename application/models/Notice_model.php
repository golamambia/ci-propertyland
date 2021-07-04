<?php
class Notice_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}


function notice_data_list($limit,$offset,$user_id){
    
      $query=$this->db->query("SELECT * FROM notification WHERE user_id='$user_id' and is_delete=0 ORDER BY nid DESC LIMIT $limit OFFSET $offset")->result();
    
     return $query;
  }
  
function countall_notice_data($user_id){

      $this->db->where('user_id',$user_id);

      $this->db->from('notification');
      
    $data=$this->db->count_all_results();
    
    return $data;
  }

public function show_data_id($table_name,$where){
				//$this->db->select ('*');
			
			$this->db->where($where);
			//$this->db->join('user_table ut','ut.id=lb.user_id');
			$this->db->from($table_name);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		
	 }


function backend_notice_data_list($ads_id){
    
      $query=$this->db->query("SELECT * FROM notification WHERE ads_id='$ads_id' and is_delete=0 ORDER BY nid")->result();
    
     return $query;
  }	 


	
}
<?php 
 class Custom_model extends CI_Model{
     
    function idwise_count($table,$fieldname,$id) {
	//return $table;
	//exit();
		$this->db->select('*');
		$this->db->from($table);
	    $this->db->where($fieldname,$id);
		$query = $this->db->get();
	
		$return=$query->num_rows(); 
		
		return $return;
     
    }
     
     
     
     
     
 }
 ?>
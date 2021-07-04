<?php
class Message_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}
		
		function all_list($adsid,$user_id,$from_user){
    
      $query=$this->db->query("SELECT * FROM chat_master WHERE chat_adsid='$adsid' and to_user='$user_id' and from_user='$from_user' ORDER BY chat_id asc ")->result();
    
     return $query;
  }
		
}
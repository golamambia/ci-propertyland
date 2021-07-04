<?php 

 class Staff_model extends CI_Model{

 	function __construct() 
		{
		    parent::__construct();
		}

 	

  public function get_staff(){
  	 $query=$this->db->query("SELECT st.*,c.countryname FROM staff_table as st LEFT JOIN country as c on(st.country=c.id)")->result();
  	 echo $this->db->last_query(); exit(); 
  	 return $query;
  }

	

	

}







?>
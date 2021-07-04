<?php 

class Country_model extends CI_Model{

	

	function __construct() 

	{

        parent::__construct();

    }




  function country_list($limit,$offset){

    $query=$this->db->query("SELECT * FROM country ORDER BY id DESC LIMIT $limit OFFSET $offset")->result();
  
     return $query;
  }
  
  function countall_country_data(){

    $this->db->from('country');

    $data=$this->db->count_all_results();

    return $data;

  }

  function state_list($limit,$offset){

    $query=$this->db->query("SELECT s.*,c.countryname FROM state AS s LEFT JOIN country AS c ON (s.countryid=c.id) ORDER BY s.sid DESC LIMIT $limit OFFSET $offset")->result();
  
     return $query;
  }
  
  function countall_state_data(){

    $this->db->from('state');

    $data=$this->db->count_all_results();

    return $data;

  }

  function city_list($limit,$offset){

    $query=$this->db->query("SELECT c.*,s.state_name,cn.countryname FROM cities AS c LEFT JOIN state AS s ON (c.state_id=s.sid) LEFT JOIN country AS cn ON (s.countryid=cn.id) ORDER BY s.sid DESC LIMIT $limit OFFSET $offset")->result();
  
     return $query;
  }
  
  function countall_city_data(){

    $this->db->from('cities');

    $data=$this->db->count_all_results();

    return $data;

  }

    function airport_code_list($limit,$offset){

    $query=$this->db->query("SELECT * FROM airport_code ORDER BY name ASC LIMIT $limit OFFSET $offset")->result();
  
     return $query;
  }
  
  function countall_airport_code_data(){

    $this->db->from('airport_code');

    $data=$this->db->count_all_results();

    return $data;

  }


}

?>
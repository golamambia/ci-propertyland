<?php
class Adsview_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}
	
	public function show_data_id($table_name,$where){
				$this->db->select ('*');
			// $this->db->select ('ut.id AS idut, ut.name AS nameut, ut.email AS emailut, ut.phone AS phoneut, 
			// ut.user_photo AS user_photout, ut.address AS addressut, ut.dob AS dobut, ut.status AS statusut, 
			// ut.entry_date AS entry_dateut, ut.reference_id AS reference_idut, ut.referred_by AS referred_byut, 
			// ut.country AS countryut, lb.lbcontactId AS lbcontactId, lb.title AS title, lb.phone AS phone, 
			// lb.email AS email, lb.address AS address, lb.country AS country, lb.state AS state, 
			// lb.city AS city, lb.cat_name AS cat_name, lb.sub_cat AS sub_cat, lb.event_start_date AS event_start_date,
			// lb.event_end_date AS event_end_date, lb.event_start_time AS event_start_time, 
			// lb.event_end_time AS event_end_time, lb.description AS description, lb.description_extra AS description_extra, 
			// lb.weblink AS weblink,lb.media_facebook AS media_facebook, lb.media_linkedin AS media_linkedin, lb.media_twitter AS media_twitter,
			// lb.upload_file AS upload_file, lb.user_id AS user_id,
			// lb.post_status AS post_status, lb.is_delete AS is_delete, lb.entry_date AS entry_date, lb.date_time AS date_time,
			// lb.approved_by AS approved_by, lb.approved_date AS approved_date, lb.working_hour AS working_hour, lb.contact_person AS contact_person'); 
			$this->db->from($table_name.' ph');
			$this->db->where($where);
			$this->db->join('user_table ut','ut.id=ph.ppt_createdBy');
			//$this->db->order_by("lbcontactId", "desc");
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		
	 } 
	 public function RowCount($table_name,$where)

	{
			$this->db->where($where);

    	$result = $this->db->get($table_name)->num_rows();

    	return $result;
    	//$this->db->last_query();
    
	}
	
	public function TotalReview($table_name,$colomn,$adsid,$id)

	{
	$query= $this->db->query('SELECT SUM('.$colomn.') as total FROM '.$table_name.' where rv_adsid='.$id.' ');
	//return $query->result_array();
	$result = $query->row_array();
        return $result["total"];
	 
	}
	public function TotalReviewUser($table_name,$adsid,$id)

	{
	$query= $this->db->query('SELECT count(rv_adsid) as total FROM '.$table_name.' where rv_adsid='.$id.' ');
	//return $query->result_array();
	$result = $query->row_array();
        return $result["total"];
	 
	}
	
	
	
	 public function TotalRate($table_name,$colomn,$no,$adsid,$id)

	{
	   $this->db
       ->where($colomn,$no);
       $this->db
       ->where($adsid,$id);
       $query =$this->db->count_all_results($table_name);

    	return $query;
    	//$this->db->last_query();
    
	}
	
	public function Average_review($table_name,$colomn,$adsid,$id)

	{
	    $this->db->select('AVG('.$colomn.') as average');
    $this->db->where($adsid, $id);
    $this->db->from($table_name);
     $query = $this->db->get();
        $result = $query->row_array();
        return $result["average"];
	    
	}
	public function review_byid($user,$ads){
	    $query = $this->db->query("select * from user_review where rv_userid=".$user." and rv_adsid=".$ads."");
			$result = $query->result();
			return $result;
		//return $this->db->last_query();
	}
	
	public function Favourite_delete($table_name,$where)

	{
		$this->db->where($where);

		$result=$this->db->delete($table_name);

    	return $result;
    	//$this->db->last_query();
    
	}
	
	public function All_fetch($table_name,$where)

	{
		$this->db->where($where);

		$query = $this->db->get($table_name);
			$result = $query->result();
			return $result;
    	//$this->db->last_query();
    
	}
	
	 
}
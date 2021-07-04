<?php
class Adslist_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}
	//========================== LOGIN CHECK =========================
	public function show_data_id($table_name,$where){
				
			$this->db->select (''.$table_name.'.*'); 
			$this->db->from($table_name);
			$this->db->where($where);
			//$this->db->join('category','category.id='.$table_name.'.cat_name');
		
			//$this->db->join('subcategory','subcategory.sid='.$table_name.'.sub_cat','left');
			
			$this->db->order_by("ppt_id", "desc");
			$query = $this->db->get();
			$result = $query->result();
			return $result;
			
			//return $this->db->last_query();
		
	 }
	 public function show_data_comads($table_name){
				
			
			$query = $this->db->query('SELECT ml.*,tm.cmp_id, GROUP_CONCAT(tm.cmp_id ) AS comp_id FROM `propertypost_table` ml
			inner join table_complaint tm on tm.cmp_adsid=ml.ppt_id 
			 where ml.ppt_isDelete!=1 GROUP BY ml.ppt_id');
			$result = $query->result();
			return $result;
		
	 }
	 public function show_data_repads($table_name){
				
			
			$query = $this->db->query('SELECT ml.*,tr.rpt_id, GROUP_CONCAT(tr.rpt_id ) AS comp_id FROM `propertypost_table` ml
			inner join  table_report tr on tr.rpt_adsid=ml.ppt_id  where ml.ppt_isDelete!=1 GROUP BY ml.ppt_id');
			$result = $query->result();
			return $result;
			//return $this->db->last_query();
		
	 }
	 public function show_data_id1($table_name,$where){
				
			$this->db->select ('*'); 
			$this->db->from($table_name);
			$this->db->where($where);
			$this->db->join('category','category.id='.$table_name.'.cat_name');
			$this->db->order_by("lbcontactId", "desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		
	 }  
	 public function ads_del($table_name,$where,$id){
	     //$user_id=$this->session->userdata('front_sess')['userid'];
	 	$value= array('ppt_isDelete' => 1,'ppt_delete_date' => date('Y-m-d') );
	 	$this->db->where($where);
		$return=$this->db->update($table_name, $value);
		if($return){
		    //$this->db->query("delete from table_quote where qt_adsid=$id ");
		     //$this->db->query("delete from table_report where rpt_adsid=$id");
		     //$this->db->query("delete from user_review where rv_adsid=$id");
		     ///$this->db->query("delete from table_complaint where cmp_adsid=$id");
		     //$this->db->query("delete from notification where ads_id=$id");
		     //$this->db->query("delete from module_lbcontacts_part where lbcontact_id=$id");
		     //$this->db->query("delete from favourite_master where fv_adsid=$id");
		     //$this->db->query("delete from adsview_master where vw_adsid=$id");
		}
		return $return;
	 }
	//===================== LOGIN CHECK ============================== 


	 //public function get_single_add($add_id){

	 	//$this->db->query("SELECT lbc.* FROM module_lbcontacts as lbc ")->result_array();

	// }

	 public function get_add_by_user($user_id){
	 	$query = $this->db->query("SELECT m.* FROM module_lbcontacts as m LEFT JOIN category as c on(m.cat_name=c.id) WHERE m.user_id='$user_id' AND m.is_delete=0");
	 	return $query;
	 }


function ad_data_list($limit,$offset,$user_id){
    
      $query=$this->db->query("SELECT m.* FROM propertypost_table as m  WHERE m.ppt_createdBy='$user_id' AND m.ppt_isDelete=0 ORDER BY m.ppt_id DESC LIMIT $limit OFFSET $offset")->result();
    
     return $query;
  }
  
function countall_ad_data($user_id){

      $this->db->where('ppt_createdBy',$user_id);
      $this->db->where('ppt_isDelete',0);
      $this->db->from('propertypost_table');
      
    $data=$this->db->count_all_results();
    return $data;
  }


function company_list($limit,$offset,$user_id){
    
      $query=$this->db->query("SELECT * FROM company WHERE user_id='$user_id'")->result();
    
     return $query;
  }
  
function countall_company_data($user_id){

      $this->db->where('user_id',$user_id);

      $this->db->from('company');
      
    $data=$this->db->count_all_results();
    return $data;
  }
  




	
}
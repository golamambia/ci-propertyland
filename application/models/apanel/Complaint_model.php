<?php 

 class Complaint_model extends CI_Model{

 	function __construct() 
		{
		    parent::__construct();
		}

 	

  public function get_complaint($cmpid=NULL){
      if($cmpid){
          $query=$this->db->query("SELECT tc.*,ml.ppt_title FROM table_complaint as tc LEFT JOIN propertypost_table as ml on(tc.cmp_adsid=ml.ppt_id) where tc.cmp_adsid=".$cmpid."")->result();
      }else{
  	 $query=$this->db->query("SELECT tc.*,ml.ppt_title FROM table_complaint as tc LEFT JOIN propertypost_table as ml on(tc.cmp_adsid=ml.ppt_id)")->result();
  	 //echo $this->db->last_query(); exit();
      }
  	 return $query;
  }

  public function get_report($tmpid=NULL){
      if($tmpid){
          $query=$this->db->query("SELECT tr.*,ml.ppt_title FROM table_report as tr LEFT JOIN propertypost_table as ml on(tr.rpt_adsid=ml.ppt_id) where tr.rpt_adsid=".$tmpid."")->result();
  	 
      }else{
  	 $query=$this->db->query("SELECT tr.*,ml.ppt_title FROM table_report as tr LEFT JOIN propertypost_table as ml on(tr.rpt_adsid=ml.ppt_id)")->result();
  	 //echo $this->db->last_query(); exit(); 
      }
  	 //return $this->db->last_query();
  	 return $query;
  }

	

	

}







?>
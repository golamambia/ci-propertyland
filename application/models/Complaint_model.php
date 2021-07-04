<?php
class Complaint_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}


function report_data_list($limit,$offset,$user_id){
    
        $query=$this->db->query("SELECT tr.*,ml.lbcontactId,ml.title,GROUP_CONCAT(DISTINCT rpt_userid)as total_rpt_userid FROM `table_report` tr INNER JOIN module_lbcontacts ml on ml.lbcontactId=tr.rpt_adsid  WHERE (rpt_adsuser='$user_id'  or `rpt_userid`='$user_id') and (rpt_adsuser!=`rpt_userid`) AND rpt_delete=0 group by `rpt_adsid` ORDER BY rpt_id DESC LIMIT $limit OFFSET $offset")->result();
    //return $this->db->last_query();
     return $query;
  }
  function complaint_user_list($user_id,$ads){
     
      $query=$this->db->query("SELECT ut.id,ut.name,ut.user_photo, tc.*,ml.lbcontactId,ml.title FROM `table_complaint` tc INNER JOIN module_lbcontacts ml on ml.lbcontactId=tc.cmp_adsid INNER JOIN user_table ut ON (ut.id=tc.cmp_adsuser OR ut.id=tc.cmp_userid) WHERE (cmp_adsuser='$user_id' or `cmp_userid`='$user_id') and cmp_adsid='$ads' and ut.id!='$user_id' GROUP BY ut.id ORDER BY cmp_id DESC")->result();
    //return $this->db->last_query();
    
     return $query;
  }
  function chat_user_photo($chat_user){
      $query=$this->db->query("SELECT * FROM user_table WHERE id='$chat_user' ")->result();
   // return $this->db->last_query();
     return $query;
  }
  function complaint_msg_list($ads,$user_id,$chat_user){
     //$query=$this->db->query("SELECT ut.id,ut.name,ut.user_photo,tq.*,ml.lbcontactId,ml.title FROM `table_quote` tq INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid INNER JOIN user_table ut ON (ut.id=tq.qt_adsuser OR ut.id=tq.qt_userid) WHERE ((qt_adsuser='$user_id' and `qt_userid`='$chat_user') or (qt_adsuser='$chat_user' and `qt_userid`='$user_id')) and qt_adsid='$ads' GROUP by ut.id ORDER BY qt_id DESC")->result();
      $query=$this->db->query("SELECT tc.*,ml.lbcontactId,ml.title FROM `table_complaint` tc INNER JOIN module_lbcontacts ml on ml.lbcontactId=tc.cmp_adsid  WHERE ((cmp_adsuser='$user_id' and `cmp_userid`='$chat_user') or (cmp_adsuser='$chat_user' and `cmp_userid`='$user_id')) and cmp_adsid='$ads' GROUP by cmp_id ORDER BY cmp_id asc")->result();
   // return $this->db->last_query();
    
     return $query;
  }
  
  function message_unread_toread($ads,$touser,$fromuser){
    
      $query=$this->db->query('update table_complaint set `cmp_view` = 1 where `cmp_userid` = '.$fromuser.' AND `cmp_adsid` = '.$ads.' AND `cmp_adsuser` = '.$touser.' AND `cmp_view` = 0 AND `cmp_delete` = 0 ');
    //return $this->db->last_query();
     return $query;
  }
function countall_report_data($user_id){

       $where = "rpt_adsuser='$user_id'  or `rpt_userid`='$user_id'";

      $this->db->where($where);
      $this->db->from('table_report');
      
    $data=$this->db->count_all_results();
    
    return $data;
  }


function complaint_data_list($limit,$offset,$user_id){
    
      $query=$this->db->query("SELECT tc.*,ml.lbcontactId,ml.title,GROUP_CONCAT(DISTINCT cmp_userid)as total_cmp_userid FROM `table_complaint` tc INNER JOIN module_lbcontacts ml on ml.lbcontactId=tc.cmp_adsid  WHERE (cmp_adsuser='$user_id'  or `cmp_userid`='$user_id') and (cmp_adsuser!=`cmp_userid`) AND cmp_delete=0 group by `cmp_adsid` ORDER BY cmp_id DESC LIMIT $limit OFFSET $offset")->result();
    //return $this->db->last_query();
     return $query;
  }
  
function countall_complaint_data($user_id){

       $where = "cmp_adsuser='$user_id'  or `cmp_userid`='$user_id'";

      $this->db->where($where);

      $this->db->from('table_complaint');
      
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



	
}
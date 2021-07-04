<?php
class Report_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}
		
		function report_data_list($limit,$offset){
    
        $query=$this->db->query("SELECT tr.*,ml.lbcontactId,ml.title,GROUP_CONCAT(DISTINCT rpt_userid)as total_rpt_userid FROM `table_report` tr INNER JOIN module_lbcontacts ml on ml.lbcontactId=tr.rpt_adsid  WHERE  rpt_delete=0 group by `rpt_adsid` ORDER BY rpt_id DESC LIMIT $limit OFFSET $offset")->result();
    //return $this->db->last_query();
     return $query;
  }
		
function countall_report_data(){

       $where = "rpt_delete=0 ";

      $this->db->where($where);
      $this->db->from('table_report');
      
    $data=$this->db->count_all_results();
    
    return $data;
  }
  
  function chat_user_photo($chat_user){
      $query=$this->db->query("SELECT * FROM user_table WHERE id='$chat_user' ")->result();
   // return $this->db->last_query();
     return $query;
  }
  function report_msg_list($ads,$user_id,$chat_user){
     //$query=$this->db->query("SELECT ut.id,ut.name,ut.user_photo,tq.*,ml.lbcontactId,ml.title FROM `table_quote` tq INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid INNER JOIN user_table ut ON (ut.id=tq.qt_adsuser OR ut.id=tq.qt_userid) WHERE ((qt_adsuser='$user_id' and `qt_userid`='$chat_user') or (qt_adsuser='$chat_user' and `qt_userid`='$user_id')) and qt_adsid='$ads' GROUP by ut.id ORDER BY qt_id DESC")->result();
      $query=$this->db->query("SELECT tr.*,ml.lbcontactId,ml.title FROM `table_report` tr INNER JOIN module_lbcontacts ml on ml.lbcontactId=tr.rpt_adsid  WHERE ((rpt_adsuser='$user_id' and `rpt_userid`='$chat_user') or (rpt_adsuser='$chat_user' and `rpt_userid`='$user_id')) and rpt_adsid='$ads' GROUP by rpt_id ORDER BY rpt_id asc")->result();
   // return $this->db->last_query();
    
     return $query;
  }
  function report_user_list($user_id,$ads){
     
      $query=$this->db->query("SELECT ut.id,ut.name,ut.user_photo, tr.*,ml.lbcontactId,ml.title FROM `table_report` tr INNER JOIN module_lbcontacts ml on ml.lbcontactId=tr.rpt_adsid INNER JOIN user_table ut ON (ut.id=tr.rpt_adsuser OR ut.id=tr.rpt_userid) WHERE (rpt_adsuser='$user_id' or `rpt_userid`='$user_id') and rpt_adsid='$ads' and ut.id!='$user_id' GROUP BY ut.id ORDER BY rpt_id DESC")->result();
    //return $this->db->last_query();
    
     return $query;
  }
  
  
  
  
  
  
}		
<?php
class Support_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}


function allquote_data_list($limit,$offset){
    
      //$query=$this->db->query("SELECT * FROM table_quote  ORDER BY qt_id DESC LIMIT $limit OFFSET $offset")->result();
    $query=$this->db->query("SELECT tq.*,ml.lbcontactId,ml.title,GROUP_CONCAT(DISTINCT qt_userid)as total_qt_userid FROM `support_team_quote` tq INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid  WHERE  (qt_adsuser!=`qt_userid`) AND qt_isdelete=0 group by `qt_adsid` ORDER BY qt_id DESC LIMIT $limit OFFSET $offset")->result();
    //return $this->db->last_query();
     return $query;
  }
  
function countall_allquote_data(){

      $this->db->from('table_quote');
      $this->db->where('qt_isdelete=0');
      $this->db->group_by('qt_adsid');
      $data=$this->db->count_all_results();
    
      return $data;
  }
function quote_user_list($user_id,$ads){
     
      $query=$this->db->query("SELECT ut.id,ut.name,ut.user_photo, tq.*,ml.lbcontactId,ml.title FROM `table_quote` tq INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid INNER JOIN user_table ut ON (ut.id=tq.qt_adsuser OR ut.id=tq.qt_userid) WHERE (qt_adsuser='$user_id' or `qt_userid`='$user_id') and qt_adsid='$ads' and ut.id!='$user_id' GROUP BY ut.id ORDER BY qt_id DESC")->result();
    //return $this->db->last_query();
    
     return $query;
  }

function quote_msg_list($ads,$user_id,$chat_user){
     //$query=$this->db->query("SELECT ut.id,ut.name,ut.user_photo,tq.*,ml.lbcontactId,ml.title FROM `table_quote` tq INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid INNER JOIN user_table ut ON (ut.id=tq.qt_adsuser OR ut.id=tq.qt_userid) WHERE ((qt_adsuser='$user_id' and `qt_userid`='$chat_user') or (qt_adsuser='$chat_user' and `qt_userid`='$user_id')) and qt_adsid='$ads' GROUP by ut.id ORDER BY qt_id DESC")->result();
      $query=$this->db->query("SELECT tq.*,ml.lbcontactId,ml.title FROM `table_quote` tq INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid  WHERE ((qt_adsuser='$user_id' and `qt_userid`='$chat_user') or (qt_adsuser='$chat_user' and `qt_userid`='$user_id')) and qt_adsid='$ads' GROUP by qt_id ORDER BY qt_id asc")->result();
   // return $this->db->last_query();
    
     return $query;
  }


	
}
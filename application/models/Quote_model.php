<?php
class Quote_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}


function quote_data_list($limit,$offset,$user_id){
     
      $query=$this->db->query("SELECT tq.*,ml.lbcontactId,ml.title,GROUP_CONCAT(DISTINCT qt_userid)as total_qt_userid FROM `table_quote` tq INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid  WHERE (qt_adsuser='$user_id'  or `qt_userid`='$user_id') and (qt_adsuser!=`qt_userid`) AND qt_isdelete=0 group by `qt_adsid` ORDER BY qt_id DESC LIMIT $limit OFFSET $offset")->result();
    //return $this->db->last_query();
     return $query;
  }
  function allquote_data_list($limit,$offset,$user_id){
    
      $query=$this->db->query("SELECT * FROM table_quote WHERE qt_adsuser='$user_id' ORDER BY qt_id DESC LIMIT $limit OFFSET $offset")->result();
    
     return $query;
  }
  
function countall_quote_data($user_id){
    $where = "qt_adsuser='$user_id'  or `qt_userid`='$user_id'";

      $this->db->where($where);
     $this->db->group_by('qt_adsid'); 
      $this->db->from('table_quote');
      
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

  
  function chat_user_photo($chat_user){
      $query=$this->db->query("SELECT * FROM user_table WHERE id='$chat_user' ")->result();
   // return $this->db->last_query();
     return $query;
  }
  
function countall_allquote_data($user_id){

      $this->db->where('qt_userid',$user_id);

      $this->db->from('table_quote');
      
    $data=$this->db->count_all_results();
    
    return $data;
  }

function favourite_data_list1($limit,$offset,$user_id){
    
      $query=$this->db->query("SELECT fm.*,ml.title,ml.upload_file,ut.* FROM favourite_master as fm LEFT JOIN module_lbcontacts as ml on(fm.fv_adsid=ml.lbcontactid) LEFT JOIN user_table as ut on(fm.fv_userid=ut.id) WHERE ml.user_id='$user_id' ORDER BY fv_id DESC LIMIT $limit OFFSET $offset")->result();
    
     return $query;
  }

function favourite_data_list($limit,$offset,$user_id){
    
      $query=$this->db->query("SELECT fm.*,ml.title,ml.upload_file,ut.* FROM favourite_master as fm LEFT JOIN module_lbcontacts as ml on(fm.fv_adsid=ml.lbcontactid) LEFT JOIN user_table as ut on(fm.fv_userid=ut.id) WHERE fm.fv_userid='$user_id' ORDER BY fv_id DESC LIMIT $limit OFFSET $offset")->result();
    
     return $query;
  }
  function message_unread_toread($ads,$touser,$fromuser){
    
      $query=$this->db->query('update table_quote set `qt_view` = 1 where `qt_userid` = '.$fromuser.' AND `qt_adsid` = '.$ads.' AND `qt_adsuser` = '.$touser.' AND `qt_view` = 0 AND `qt_isdelete` = 0 ');
    //return $this->db->last_query();
     return $query;
  }
  
function countall_favourite_data($user_id){


    $this->db->select('fm,ml,ut');
    $this->db->from('favourite_master fm');
    $this->db->join('module_lbcontacts ml', 'ml.lbcontactid = fm.fv_adsid', 'left');
    $this->db->join('user_table ut', 'ut.id = fm.fv_userid', 'left');

      $this->db->where('ml.user_id', $user_id);
      
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
 function Quote_delete($table_name,$where)

	{
		$this->db->where($where);

		$result=$this->db->delete($table_name);

    	return $result;
    	//$this->db->last_query();
    
	}


  function clear_chat($tm_adid,$with,$user_id){
    $query = $this->db->query("UPDATE table_quote SET adelete=1 WHERE qt_adsid='$tm_adid' AND qt_userid IN ('$with','$user_id') ");
    if($query){
      return true;
    }else{
      return false;
    }
  }

    function clear_chat1($tm_adid,$with,$user_id){
    $query = $this->db->query("UPDATE table_quote SET bdelete=1 WHERE qt_adsid='$tm_adid' AND qt_userid IN ('$with','$user_id') ");
    if($query){
      return true;
    }else{
      return false;
    }
  }


	
}
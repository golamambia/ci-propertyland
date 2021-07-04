<?php
class Review_model extends CI_Model{

    function __construct() 
    {
        parent::__construct();
    }


  public function getData($rowno,$rowperpage,$id) {
      
    $this->db->select('*');
    $this->db->from('user_review');
    $this->db->join('user_table', 'user_table.id = user_review.rv_userid');
    $this->db->where('user_review.rv_adsid', $id);
    $this->db->order_by("rv_id", "desc");
    $this->db->limit($rowperpage, $rowno);  
    $query = $this->db->get();
        
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($id) {

        $this->db->select('count(*) as allcount');
        $this->db->from('user_review');
        
        $this->db->where('rv_adsid', $id);
        $query = $this->db->get();
        $result = $query->result_array();
      
        return $result[0]['allcount'];
    }

    function review_data_list($limit,$offset,$user_id){
     
      //$query=$this->db->query("SELECT tq.*,ml.lbcontactId,ml.title,GROUP_CONCAT(DISTINCT qt_userid)as total_qt_userid FROM `user_review` ur INNER JOIN module_lbcontacts ml on ml.lbcontactId=tq.qt_adsid  WHERE (qt_adsuser='$user_id'  or `qt_userid`='$user_id') and (qt_adsuser!=`qt_userid`) AND qt_isdelete=0 group by `qt_adsid` ORDER BY qt_id DESC LIMIT $limit OFFSET $offset")->result();
    $query=$this->db->query("SELECT ur.*, ml.lbcontactId,ml.title,ml.is_delete FROM `user_review` ur inner JOIN module_lbcontacts ml on ml.lbcontactId=ur.`rv_adsid` WHERE ur.`rv_userid`=$user_id and ml.is_delete=0
 ORDER BY rv_id DESC LIMIT $limit OFFSET $offset")->result();
    //return $this->db->last_query();
     return $query;
  }
  
function countall_review_data($user_id){
    $query=$this->db->query("SELECT ur.*, ml.lbcontactId,ml.title,ml.is_delete FROM `user_review` ur inner JOIN module_lbcontacts ml on ml.lbcontactId=ur.`rv_adsid` WHERE ur.`rv_userid`=$user_id and ml.is_delete=0
 ORDER BY rv_id DESC ")->result();
    $data=$this->db->count_all_results();
    
    return $data;
  }




  
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
if ( ! function_exists('getNotification')){
   function getNotification($no= NULL){
       $ci =& get_instance();
      $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
        
      if($user!=''){
     
        $ci->load->database();
      
          
          //$sql ="SELECT  FROM notification
         // JOIN field_name ON field_name.id=adfields.f_id
         // WHERE adid='$aid' GROUP BY adfields.f_id ORDER BY field_name.keyf ASC"; 
    $ci->db->select('*');
    $ci->db->from('notification');
     $ci->db->where('is_delete',0);
    $ci->db->where('user_id',$user);
    if($no){
    $ci->db->limit($no);
    }
    $query = $ci->db->get();
    $row = $query->result();
    return $row;
      }
    
  
   }
  
   
}

if ( ! function_exists('countNotice')){
    function countNotice(){
        $ci =& get_instance();
         $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
    
      
        $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('notification');
    $ci->db->where(array('user_id'=>$user,'notice_view'=>0,'is_delete'=>0));
     //$ci->db->where('notice_view',0);
    
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row;
}
}
    
}

if ( !function_exists('countQuote')){
    function countQuote(){
        $ci =& get_instance();
         $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
    
      
        $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('table_quote');
    $ci->db->where(array('qt_adsuser'=>$user,'qt_view'=>0,'qt_isdelete'=>0));
     //$ci->db->where('notice_view',0);
    
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row;
}
}
    
}

if ( ! function_exists('countReport')){
    function countReport(){
        $ci =& get_instance();
         $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
    
      
        $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('table_report');
    $ci->db->where(array('rpt_adsuser'=>$user,'rpt_view'=>0,'rpt_delete'=>0));
     //$ci->db->where('notice_view',0);
    
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row;
}else{
   $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('table_report');
    $ci->db->where(array('rpt_view'=>0,'rpt_delete'=>0));
     //$ci->db->where('notice_view',0);
    
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row; 
}
}
}
    

if ( ! function_exists('avgReview')){
    function avgReview($id){
        $ci =& get_instance();
         $ci->load->library('session');
     
      
        $ci->load->database();
      
       $ci->db->select('AVG(rv_rate) as average');
    $ci->db->where('rv_adsid', $id);
    $ci->db->from('user_review');
     $query = $ci->db->get();
        $result = $query->row_array();
       
        return number_format($result["average"], 1);

}
    
}



if ( ! function_exists('countComplaint')){
    function countComplaint(){
        $ci =& get_instance();
         $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
    
      
        $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('table_complaint');
    $ci->db->where(array('cmp_adsuser'=>$user,'cmp_view'=>0,'cmp_delete'=>0));
     //$ci->db->where('notice_view',0);
    
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row;
}else{
    $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('table_complaint');
    $ci->db->where(array('cmp_view'=>0,'cmp_delete'=>0));
     //$ci->db->where('notice_view',0);
    
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row;
}
}
    
}

if ( ! function_exists('countryCheck')){
    function countryCheck(){
        $ci =& get_instance();
        
        $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('notification');
    $ci->db->where('user_id',$user);
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row;

}
    
}
if ( ! function_exists('dataCount')){
    function dataCount($id,$sid){
        $ci =& get_instance();
        
        $ci->load->database();
      
       $ci->db->select('*');
    $ci->db->from('module_lbcontacts');
    if($id!='' && $sid==''){
     $ci->db->where(array('cat_name'=>$id,'is_delete'=>0,'post_status'=>1));   
    }
    if($id!='' && $sid!=''){
        $ci->db->where(array('cat_name'=>$id,'sub_cat'=>$sid,'is_delete'=>0,'post_status'=>1));
    }
    
    $query = $ci->db->get();
    $row = $query->num_rows();
    return $row;

}
    
}
if ( ! function_exists('visitorCount')){
    function visitorCount($id){
        $ci =& get_instance();
        $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
        $ci->load->database();
      
    
    $query= $ci->db->query('SELECT SUM(vw_no) as total FROM adsview_master where vw_userid='.$user.' and vw_adsid='.$id.' ');
	
	$result = $query->row_array();
       if($result["total"]){
	    return $result["total"];
	}else{
	  return 0;  
	}
    

}
    }  
}

if ( ! function_exists('totalComplaint')){
    function totalComplaint($id){
        $ci =& get_instance();
        $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
        $ci->load->database();
      
    
    $query= $ci->db->query('SELECT * FROM table_complaint where cmp_adsuser='.$user.' and cmp_adsid='.$id.' and cmp_delete!=1 ');
	
	$result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
    

}
    }  
}

if ( ! function_exists('totalReport')){
    function totalReport($id){
        $ci =& get_instance();
        $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
        $ci->load->database();
      
    
    $query= $ci->db->query('SELECT * FROM table_report where rpt_adsuser='.$user.' and rpt_adsid='.$id.' and rpt_delete!=1 ');
	
	$result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
    

}
    }  
}


if ( ! function_exists('favCheck')){
    function favCheck($id){
        $ci =& get_instance();
        $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
    
        $ci->load->database();
      
    
    $query= $ci->db->query('SELECT * FROM favourite_master where fv_userid='.$user.' and fv_adsid='.$id.' ');
	
	$result = $query->row_array();
       if($result["fv_userid"]){
	    return true;
	}else{
	  return false;  
	}
    


    }  
}
if ( ! function_exists('reviewCount')){
    function reviewCount($id){
        $ci =& get_instance();
        $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
        $ci->load->database();
//       $query_user= $ci->db->query('SELECT count(rv_adsid) as total FROM user_review where rv_adsid='.$id.' ');
	
// 	$result_user = $query_user->row_array();
//         $total_user=$result_user["total"];
//   $query= $ci->db->query('SELECT SUM(rv_rate) as total FROM user_review where rv_adsid='.$id.' ');
	
// 	$result = $query->row_array();

$ci->db->select('AVG(rv_rate) as average');
    $ci->db->where('rv_adsid', $id);
    $ci->db->from('user_review');
     $query = $ci->db->get();
        $result = $query->row_array();
       


	if($result["average"]){
	    //return $result["total"];
	     return number_format($result["average"],1);
	}else{
	  return 0;  
	}
        
    
}
    }  
}

if ( ! function_exists('profileCount')){
    function profileCount(){
        $ci =& get_instance();
        $ci->load->library('session');
      $user=$ci->session->userdata('front_sess')['userid'];
      if($user!=''){
        $ci->load->database();
      
  $ci->db->from('user_table');
    $ci->db->where('id',$user);
    $query = $ci->db->get();
	
	$result = $query->row_array();
	$no=0;
	if(trim($result["name"])!=''){
	 $no +=1;   
	}
	if(trim($result["email"])!=''){
	 $no +=1;   
	}
	if(trim($result["phone"])!=''){
	 $no +=1;   
	}
	if(trim($result["user_photo"])!=''){
	 $no +=1;   
	}
	if(trim($result["address"])!=''){
	 $no +=1;   
	}
	if(trim($result["dob"])!=''){
	 $no +=1;   
	}
	if(trim($result["country"])!=0){
	 $no +=1;   
	}
	if(trim($result["know_tlb"])!=''){
	 $no +=1;   
	}
	if(trim($result["mail_verification"])!=''){
	 $no +=1;   
	}
	if(trim($result["status"])!=''){
	 $no +=1;   
	}
	    return $no*10;

        
    
}
    }  
    
    
    if ( ! function_exists('getSubcatData')){
    function getSubcatData($id){
        $ci =& get_instance();
        $ci->load->library('session');
        $ci->load->database();
      
        $query= $ci->db->query('SELECT * FROM module_lbcontacts where sub_cat='.$id.' order by rand() limit 1');
	    $result = $query->result();
         return $result;
	
    }  
}
    if ( ! function_exists('getSubcatHome')){
    function getSubcatHome($id){
        $ci =& get_instance();
        $ci->load->library('session');
        $ci->load->database();
      
        $query= $ci->db->query('SELECT * FROM module_lbcontacts where sub_cat='.$id.' order by rand() limit 10');
	    $result = $query->result();
         return $result;
	
    }  
} 
   if ( ! function_exists('getUser')){
    function getUser($id){
        $ci =& get_instance();
        $ci->load->library('session');
        $ci->load->database();
      
        $query= $ci->db->query('SELECT id,name FROM user_table where id='.$id.' ');
	    $result = $query->result();
         return $result[0]->name;
	
    }  
} 
if ( ! function_exists('allCountry')){
    function allCountry(){
        $ci =& get_instance();
        $ci->load->library('session');
        $ci->load->database();
      
        $query= $ci->db->query('SELECT * FROM country where id!=0 ');
	    $result = $query->result();
         return $result;
         //return $result[0]->name;
	
    }  
} 

if ( ! function_exists('unreadMessage')){
    function unreadMessage($fuser,$ads,$tuser){
        $ci =& get_instance();
         
      if($fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query('SELECT * FROM `table_quote` WHERE `qt_userid` = '.$fuser.' AND `qt_adsid` = '.$ads.' AND `qt_adsuser` = '.$tuser.' AND `qt_view` = 0 AND `qt_isdelete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}
}
    
}

if ( ! function_exists('unreadMessageList')){
    function unreadMessageList($fuser=NULL,$ads,$tuser=NULL){
        $ci =& get_instance();
        //return $fuser;
         //exit();
      if($tuser!='' && $fuser!=''){
    
      
        $ci->load->database();
      
    try{
   $query= $ci->db->query('SELECT * FROM `table_quote` WHERE `qt_userid` in('.$fuser.') AND `qt_userid` != '.$tuser.' AND `qt_adsuser` = '.$tuser.' AND `qt_adsid` = '.$ads.' AND `qt_adsuser` = '.$tuser.' AND `qt_view` = 0 AND `qt_isdelete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
  
      if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
  }catch(mysqli_sql_exception $ex){
       return 0;
  }
}else{
    $query= $ci->db->query('SELECT * FROM `table_quote` WHERE  `qt_adsid` = '.$ads.' and `qt_view` = 0 AND `qt_isdelete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
      if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
    
}
}
    
}
    if ( ! function_exists('totalChatMessage')){
    function totalChatMessage($fuser,$ads,$tuser){
        $ci =& get_instance();
         
      if($fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query("SELECT * FROM `table_quote` WHERE ((qt_adsuser='$fuser' and `qt_userid`='$tuser') or (qt_adsuser='$tuser' and `qt_userid`='$fuser')) and qt_adsid='$ads' AND `qt_isdelete` = 0 ");
    //return $ci->db->last_query();
  $result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}
}
    
}

if ( ! function_exists('unreadReportList')){
    function unreadReportList($fuser=NULL,$ads,$tuser=NULL){
        $ci =& get_instance();
         
      if($tuser!='' && $fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query('SELECT * FROM `table_report` WHERE `rpt_userid` in('.$fuser.') AND `rpt_userid` != '.$tuser.' AND `rpt_adsuser` = '.$tuser.' AND `rpt_adsid` = '.$ads.' AND `rpt_adsuser` = '.$tuser.' AND `rpt_view` = 0 AND `rpt_delete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
      if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}else{
    $query= $ci->db->query('SELECT * FROM `table_report` WHERE  `rpt_adsid` = '.$ads.' and `rpt_view` = 0 AND `rpt_delete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
      if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
    
}
}
    
}

if ( ! function_exists('unreadReport')){
    function unreadReport($fuser,$ads,$tuser){
        $ci =& get_instance();
         
      if($fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query('SELECT * FROM `table_report` WHERE `rpt_userid` = '.$fuser.' AND `rpt_adsid` = '.$ads.' AND `rpt_adsuser` = '.$tuser.' AND `rpt_view` = 0 AND `rpt_delete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}
}
    
}
 if ( ! function_exists('totalChatReport')){
    function totalChatReport($fuser,$ads,$tuser){
        $ci =& get_instance();
         
      if($fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query("SELECT * FROM `table_report` WHERE ((rpt_adsuser='$tuser' and `rpt_userid`='$fuser') or (rpt_adsuser='$fuser' and `rpt_userid`='$tuser')) and rpt_adsid='$ads' AND `rpt_delete` = 0 ");
    //return $ci->db->last_query();
    //exit();
  $result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}
}
    
}

if ( ! function_exists('unreadComplaintList')){
    function unreadComplaintList($fuser=NULL,$ads,$tuser=NULL){
        $ci =& get_instance();
         
      if($tuser!='' && $fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query('SELECT * FROM `table_complaint` WHERE `cmp_userid` in('.$fuser.') AND `cmp_userid` != '.$tuser.' AND `cmp_adsuser` = '.$tuser.' AND `cmp_adsid` = '.$ads.' AND `cmp_adsuser` = '.$tuser.' AND `cmp_view` = 0 AND `cmp_delete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
      if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}else{
    $query= $ci->db->query('SELECT * FROM `table_complaint` WHERE  `cmp_adsid` = '.$ads.' and `cmp_view` = 0 AND `cmp_delete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
      if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
    
}
}
    
}

if ( ! function_exists('unreadComplaint')){
    function unreadComplaint($fuser,$ads,$tuser){
        $ci =& get_instance();
         
      if($fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query('SELECT * FROM `table_complaint` WHERE `cmp_userid` = '.$fuser.' AND `cmp_adsid` = '.$ads.' AND `cmp_adsuser` = '.$tuser.' AND `cmp_view` = 0 AND `cmp_delete` = 0 ');
    //return $ci->db->last_query();
  $result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}
}
    
}
 
 if ( ! function_exists('totalChatComplaint')){
    function totalChatComplaint($fuser,$ads,$tuser){
        $ci =& get_instance();
         
      if($fuser!=''){
    
      
        $ci->load->database();
      
    
   $query= $ci->db->query("SELECT * FROM `table_complaint` WHERE ((cmp_adsuser='$tuser' and `cmp_userid`='$fuser') or (cmp_adsuser='$fuser' and `cmp_userid`='$tuser')) and cmp_adsid='$ads' AND `cmp_delete` = 0 ");
    //return $ci->db->last_query();
    //exit();
  $result = $query->num_rows();
       if($result>0){
	    return $result;
	}else{
	  return 0;  
	}
}
}
    
}
 
    
}




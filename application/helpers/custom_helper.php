<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




if ( ! function_exists('formData')){
   function formData($table,$request){
      
       // get main CodeIgniter object
        $ci =& get_instance();
       
       // //load databse library
        $ci->load->database();
       
       $field_list = $ci->db->list_fields($table);
       foreach($request as $key => $value)
  {
  foreach($field_list as $field => $name)
  {
  if(strtolower(trim($key))==strtolower(trim($name)))
  {
  $data[$key] = $value;
  break;
  }
  }
  }
  return $data;
        
    //return $field_list;
   }
}
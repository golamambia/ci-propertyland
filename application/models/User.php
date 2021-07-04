<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Model { 
     
    function __construct() { 
        $this->tableName = 'user_table'; 
    } 
     
    public function checkUser($data = array()){ 
       // echo "<pre>";print_r($data);//exit();
        $this->db->select('id'); 
        $this->db->from($this->tableName); 
         
        $con = array( 
            'oauth_provider' => $data['oauth_provider'], 
            'oauth_uid' => $data['oauth_uid']  
        ); 
        $this->db->where($con); 
        $query = $this->db->get(); 
         
        $check = $query->num_rows(); 
        if($check > 0){ 
            // Get prev user data 
            $result = $query->row_array(); 
            //$dataupdate['name']=$data['name']; 
         $dataupdate['email']=$data['email'];
         $dataupdate['oauth_provider']=$data['oauth_provider']; 
         $dataupdate['oauth_uid']=$data['oauth_uid'];
         //$dataupdate['name']=$data['user_photo'];
         $dataupdate['agreement']=$data['agreement'];
            // Update user data 
            //$data['modified'] = date("Y-m-d H:i:s"); 
            $update = $this->db->update($this->tableName, $dataupdate, array('id' => $result['user_id'])); 
             
            // Get user ID 
            $userID = $result['user_id']; 
        }else{ 
            // Insert user data 
            $rand='PLS'.rand (0,9999999);
            $data['reference_id']=$rand;
            $data['entry_date'] = date("Y-m-d"); 
            //$data['modified'] = date("Y-m-d H:i:s"); 
            $insert = $this->db->insert($this->tableName, $data); 
             
            // Get user ID 
            $userID = $this->db->insert_id();

            //$data1['user_id'] = $userID; 

            //$this->db->insert('delivery_address', $data1);

            //$this->db->insert('invoice_address', $data1); 


        } 
         
        // Return user ID 
        return $userID?$userID:false; 
    } 
 
}
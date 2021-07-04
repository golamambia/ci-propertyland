<?php 

class General_model extends CI_Model{

	

	function __construct() 

	{

        parent::__construct();

    }


    function get_product_review($product_id){
     $query=$this->db->query("SELECT pr.*,ut.name FROM user_review as pr LEFT JOIN user_table as ut on(pr.rv_userid=ut.id) WHERE pr.rv_adsid='$product_id' ORDER BY pr.rv_id DESC ");
     return $query;
  } 

   function count_rating($product_id){

     return $this->db->query("SELECT COUNT(rv_id) as total_user,Sum(rv_rate) as rating_count FROM user_review WHERE rv_adsid='$product_id' ")->row();

  }    



   public function show_data_id($table_name,$id,$fieldname,$action,$data){

		if($action=='get'){

			if(($id !='') && ($fieldname!='')&& ($data=='')){

				$this->db->select ('*'); 

				$this->db->from($table_name);

				$this->db->where($fieldname,$id);

			}else{

				$this->db->select ('*'); 

				$this->db->from($table_name);

			}

			$query = $this->db->get();

			$result = $query->result();

			return $result;

		}

	if($action=='insert'){

		$data['entry_date']=date('Y-m-d');

		$value=formData($table_name,$data);

		$return = $this->db->insert($table_name, $value);

		if ((bool) $return === TRUE) {

			return $this->db->insert_id();

		}else {

			return $return;

		}  

		    

	}

	if($action=='update'){

		$value=formData($table_name,$data);

		$this->db->where($fieldname, $id);

		$return=$this->db->update($table_name, $value);

		//echo $this->db->last_query(); exit(); 

		return $return;

	}

	if($action=='delete'){

		$this->db->where($fieldname, $id);

		$return=$this->db->delete($table_name);

		return $return;

	}

    }

    

public function show_data_id_join($table_name1,$table1_id,$table_name2,$table2_id,$where_fieldname,$where_id){

		

			if(($where_id !='') && ($where_fieldname!='')){

				$this->db->select ('*'); 

				$this->db->from($table_name1);

				$this->db->join($table_name2, $table_name2.'.'.$table2_id.' = '.$table_name1.'.'.$table1_id);

				$this->db->where($where_fieldname,$where_id);

			}else{

				$this->db->select ('*'); 

				$this->db->from($table_name1);

				$this->db->join($table_name2, $table_name2.'.'.$table2_id.' = '.$table_name1.'.'.$table1_id);

			}

			$query = $this->db->get();

			$result = $query->result();

			return $result;

		



    }

    public function get_st_country(){



    	$this->db->select ('*'); 

				$this->db->from('state');

				$this->db->join('country','country.id=state.countryid');

			

			$query = $this->db->get();

			$this->db->limit(1, 10);

			$result = $query->result();

			return json_encode($result);

			//return 1;

    }



   public function getAllData($table_name,$primary_key,$wheredata,$limit,$start)

   {

		if(@$limit!='' || @$start!='')

		{

			$this->db->order_by('id', 'DESC');

			$this->db->limit($limit, $start);

		}

		$this->db->select ('*'); 

		$this->db->from($table_name);

		if($primary_key=='' && $wheredata=='')

		{

			$where='1=1';

		}

		else

		{

			$this->db->where($primary_key,$wheredata);

		}

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	

	}



	public function RowCount($table_name,$fieldname,$value)

	{

		if($fieldname!=''){

			$this->db->where($fieldname,$value);

    	$result = $this->db->get($table_name)->num_rows();

    	return $result;
    	//$this->db->last_query();
    	

		}else{

			return $this->db->count_all($table_name);

		}

		

	}



	public function fetch_products($limit, $start)

	{

		$this->db->limit($limit, $start);

		$query = $this->db->get("product");

		

		if ($query->num_rows() > 0) 

		{

           foreach ($query->result() as $row) 

           {

               $data[] = $row;

           }

           return $data;

        }

           return false;

	}



	function search($name)

	{

		$query = $this->db->query("SELECT * FROM product WHERE product_name LIKE ('$name%')");

	    return $query->result();

	}



	function alldistnict($table_name,$primary_key,$wheredata,$limit,$start)

	{

		if(@$limit!='' || @$start!='')

		{

			$this->db->limit($limit, $start);

		}

		$this->db->distinct();

		$this->db->select ($primary_key); 

		$this->db->from($table_name);

		

		$query = $this->db->get();

		$result = $query->result();

		return $result;

	}



	public function insertdata($data = array())

	{

		$insert = $this->db->insert_batch('product_multi_image',$data);

		return $insert?TRUE:FALSE;

	}

    public function get_mstaff(){
        $uid=$this->session->userdata('access_id_mng');
//         $this->db->select ('*'); 

// 				$this->db->from('staff_table as st');

// 				$this->db->join(country, 'country.id = st.country');
// 				//$this->db->join(state, 'state.countryid = country.id');

// 				$this->db->where('manager_name',$uid);
// 					$query = $this->db->get();

// 		$result = $query->result();

// 		return $result;

     $query=$this->db->query("SELECT st.*,c.countryname FROM staff_table as st LEFT JOIN country as c on(st.country=c.id) WHERE st.manager_name='".$uid."'")->result();
  	 //echo $this->db->last_query(); exit(); 
  	 return $query;
        
    }
    
	  public function get_staff(){
  	 $query=$this->db->query("SELECT st.*,c.countryname FROM staff_table as st LEFT JOIN country as c on(st.country=c.id) WHERE st.user_type='support_staff'")->result();
  	 //echo $this->db->last_query(); exit(); 
  	 return $query;
  }


  public function chat_list($user){
  	 $query=$this->db->query("SELECT * FROM chat WHERE sender_id='$user' AND sender_type='user' OR reciver_id='$user'")->result();
  	 //echo $this->db->last_query(); exit(); 
  	 return $query;
  }

   public function chat_list_admin($user){
  	 $query=$this->db->query("SELECT * FROM chat WHERE sender_id='$user' OR reciver_id='$user'")->result();
  	 //echo $this->db->last_query(); exit(); 
  	 return $query;
  }

    public function chat_list_admin1($user){
  	 $query=$this->db->query("SELECT * FROM team_chat WHERE sender_id='$user' OR receiver_id='$user' ORDER BY id " )->result();
  	 //echo $this->db->last_query(); exit(); 
  	 return $query;
  }

    public function chat_list_staff($user){
  	 $query=$this->db->query("SELECT * FROM staff_chat WHERE sender_id='$user' OR reciver_id='$user'")->result();
  	 //echo $this->db->last_query(); exit(); 
  	 return $query;
  }

	
  function get_airport(){
  	return $this->db->query("SELECT * FROM airport_code ORDER BY name ASC")->result();
  }
	



}

?>


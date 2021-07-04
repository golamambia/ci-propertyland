<?php 

class General_staff_model extends CI_Model{

	

	function __construct() 

	{

        parent::__construct();

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




	public function insertdata($data = array())

	{

		$insert = $this->db->insert_batch('product_multi_image',$data);

		return $insert?TRUE:FALSE;

	}


	  public function get_staff(){
  	 $query=$this->db->query("SELECT st.*,c.countryname FROM staff_table as st LEFT JOIN country as c on(st.country=c.id)")->result();
  	 //echo $this->db->last_query(); exit(); 
  	 return $query;
  }

	

	



}

?>


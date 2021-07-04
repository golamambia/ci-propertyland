<?php
class Custom_model extends CI_Model{

		function __construct() 
		{
		    parent::__construct();
		}
	//========================== LOGIN CHECK =========================
	function cus_login($email,$password)
	{
		$this -> db -> select('*');
		$this -> db -> from('customer');
		$this -> db -> where('email', $email);
		$this -> db -> where('password',$password);
		$this -> db -> where('status',1);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		return $query->result();
	 } 
	//===================== LOGIN CHECK ============================== 

	function you_may_need($product_id,$category_Id)
	{

        $sql="SELECT * FROM product WHERE product_id NOT IN('$product_id') and category_Id='$category_Id' and status=1  LIMIT 6 ";
        $query= $this->db->query($sql);
        $result= $query->result();
        return $result;
    }

    function cart_plus_minus_user($customer_id,$product_id,$data)
    {
		 $this->db->where('customer_id', $customer_id);
		 $this->db->where('product_id',$product_id);
	     $this->db->update('cart', $data);
	}

    public function cart_plus_minus_ip($ip_address,$product_id,$data)
    {
      $this->db->where('ip_address', $ip_address);
      $this->db->where('product_id', $product_id);
      $this->db->update('cart', $data);
    }
    
	function product_filter($id,$cat_id,$sort_by,$wine_type,$country,$varietals,$color,$product_name)
    {
        $this->db->select('*');
        $this->db->from('product');
        if(!empty($product_name)){
            $this->db->like('product_name',$product_name);
        }
        if(!empty($wine_type)){
            $this->db->join('categories','categories.category_Id = product.category_Id');
            $wine_type == str_replace(' ','-',$wine_type);
            $this->db->where('product.category_Id',$wine_type);
        }
        if(!empty($country)){
            $country== str_replace(' ','-',$country);
            $this->db->where('product.country',$country);
        }
        if(!empty($varietals)){
            $varietals == str_replace(' ','-',$varietals);
            $this->db->where('product.varietals',$varietals);
        }

        if(!empty($color)){
            $color == str_replace(' ','-',$color);
            $this->db->where('product.color',$color);
        }

        if(!empty($sort_by)){
            if($sort_by == 'price-low-to-high'){
                $this->db->order_by('product.price','ASC');
            }
            else if($sort_by == 'price-high-to-low'){
                $this->db->order_by('product.price','DESC');
            }
            else if($sort_by == 'latest-to-first'){
                $this->db->order_by('product.product_id','DESC');
            }
            else if($sort_by == 'first-to-last'){
                $this->db->order_by('product.product_id','ASC');
            }
            else if($sort_by == 'best-selling'){
                $this->db->order_by('product.product_id','ASC');
            }
            else if($sort_by == 'featured'){
                $this->db->where('product.featured','1');
            }
            else{
                $this->db->order_by('product.product_id','ASC'); 
            }
        }else{
            $this->db->order_by('product.product_id','DESC');
        }
        $this->db->where('product.status', '1');
        $query  = $this->db->get();
        $result = $query->result();

        return $result;
    }

	public function gen_random()
    { 
        $sql="SELECT FLOOR(RAND() * 99999999999) AS random_num FROM sales_order WHERE 'random_num' NOT IN (SELECT uni_order_id FROM sales_order)LIMIT 1 ";
        $query= $this->db->query($sql);
        $result= $query->result();
        return $result;
    }
}
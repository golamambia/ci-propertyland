<?php

class Shop_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();

    }

   

    public function product_data_list($limit = null, $offset = null, $grouping1 = null, $search1 = null, $search_category1 = null)
    {


        $where    = '';
        $sort     = '';
        $orderby    = '';
        $property_type = $this->session->userdata('property_type');
       $property_category = $this->session->userdata('property_category');
       $property_for = $this->session->userdata('property_for');
       $pincode = $this->session->userdata('pincode');
       $user_id=$this->session->userdata('front_sess')['userid'];
       $sort_by = $this->session->userdata('sort_by_session');
        $distance_val = $this->session->userdata('distance');
        $gated_val = $this->session->userdata('gated');
        $corner_val = $this->session->userdata('corner');
        $agent_assistent_val = $this->session->userdata('agent_assistent');
        $bedroom_val = $this->session->userdata('bedroom');
        $price_range_val = $this->session->userdata('price_range');
        $facing = $this->session->userdata('facing');
        $posted_by = $this->session->userdata('posted_by');
        if ($posted_by) {
           
          $where.=" and d.user_type = '" .$posted_by."'";
        }
        if ($facing) {
            $explore = '';
            for ($i = 0; $i < count($facing); $i++) {
                $explore .= "'".$facing[$i] . "',";
            }
            $where .= " and ppt_facing in (" . rtrim($explore, ',') . ")";

        }

        if($price_range_val==10001){
        
             $where.=" and a.ppt_total_price >=10001";
          
      }else if($price_range_val!='' && $price_range_val!=10001){
        $pricerange = explode('-', $price_range_val);
          //$distance=" distance <=5";
           $where.=" and a.ppt_total_price BETWEEN ".$pricerange[0]." and ".$pricerange[1]."";
      }
        if($bedroom_val==2){
        
             $where.=" and a.ppt_bedroom_count <=".$bedroom_val."";
          
      }
          if($corner_val==2){
        
             $where.=" and a.ppt_corner =0";
          
      }else if($corner_val==1){
          //$distance=" distance <=5";
           $where.=" and a.ppt_corner =1";
      }
       if($gated_val==2){
        
             $where.=" and a.ppt_gated =0";
          
      }else if($gated_val==1){
          //$distance=" distance <=5";
           $where.=" and a.ppt_gated =1";
      }

       if($distance_val!=''){
          if($distance_val>50){
             $distance=" distance >50";
          }else{
            $distance=" distance <= ".$distance_val."";
          }
         
      }else{
          $distance=" distance <=5";
         //$distance=" distance >50";
      }

       if($sort_by=='price'){
         $orderby.="order by a.ppt_total_price asc";
       }else if($sort_by=='post_date'){
        $orderby.="order by a.ppt_createdAt desc";
       }else if($sort_by=='distance'){
        $orderby.="order by distance asc";
       }else{
        $orderby.="order by a.ppt_id desc";
       }
        $user_ip   = $_SERVER['REMOTE_ADDR'];
    $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip));
    if (empty($this->session->userdata('lat_long'))) {
        $lat = trim($geo["geoplugin_latitude"]);
         $long = trim($geo["geoplugin_longitude"]);

        }else{
if ($this->session->userdata('latitude') && $this->session->userdata('longitude')) {
        $lat = $this->session->userdata('latitude');
         $long = $this->session->userdata('longitude');

        }else if ($this->session->userdata('address_list')) {
            
            $where_adrs = array('slt_id' => $this->session->userdata('address_list'), 'slt_user' => $user_id);
            $this->db->select('*');

            $this->db->from('save_location_list');

            $this->db->where($where_adrs);

            $get_user_ads_query = $this->db->get();
             $adrs_res=$get_user_ads_query->result_array();
             //print_r($adrs_res);
         $lat = $adrs_res[0]['slt_lat'];
         $long = $adrs_res[0]['slt_long'];

        }else if ($pincode) {
          if($this->session->userdata('pinlatitude') && $this->session->userdata('pinlongitude')){
            $lat = $this->session->userdata('pinlatitude');
        $long = $this->session->userdata('pinlongitude');
          }else{
            $lat = $this->session->userdata('lat_long')['lat'];
          $long = $this->session->userdata('lat_long')['long'];
          }

        }else if ($this->session->userdata('curlat_long')) {
        $lat = $this->session->userdata('curlat_long')['lat'];
          $long = $this->session->userdata('curlat_long')['long'];
          //exit();
       }
        else{
            $lat = $this->session->userdata('lat_long')['lat'];
        $long = $this->session->userdata('lat_long')['long'];
        }

        }

        if ($property_type) {
           
          $where.=" and a.ppt_property_type = '" .$property_type."'";
        }
       
        if ($property_category) {
            
           $where.=" and a.ppt_property_category = '" .$property_category."'";

        }
        if ($property_for) {
            
             $where.=" and a.ppt_property_for = '" .$property_for."'";

        }
        // if ($pincode) {
            
        //      $where.=" and a.ppt_pincode = '" .$pincode."'";

        // }
        $current_date=date('Y-m-d');

       if($this->session->userdata('result_view')=='my_fav'){
      $query = $this->db->query("SELECT d.user_type,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ppt_latitude*pi()/180))+cos(($lat*pi()/180)) * cos((ppt_latitude*pi()/180)) * cos((($long- ppt_longitude)* pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `propertypost_table` a inner join favourite_master as b on b.fv_adsid=a.ppt_id inner join user_table d on d.id=a.ppt_createdBy and a.ppt_isDelete=0 and a.ppt_property_status='active' and a.ppt_verification_status=1 and b.fv_userid=".$user_id." and a.ppt_valid_till>='".$current_date."'  " . $where . " ".$orderby." ")->result();
       }else if($this->session->userdata('result_view')=='my_view'){
      $query = $this->db->query("SELECT d.user_type,c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ppt_latitude*pi()/180))+cos(($lat*pi()/180)) * cos((ppt_latitude*pi()/180)) * cos((($long- ppt_longitude)* pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `propertypost_table` a left join favourite_master as b on b.fv_adsid=a.ppt_id inner join adsview_master as c on c.vw_adsid=a.ppt_id inner join user_table d on d.id=a.ppt_createdBy  where a.ppt_isDelete=0 and a.ppt_property_status='active'and a.ppt_verification_status=1 and c.vw_userid=".$user_id." and a.ppt_valid_till>='".$current_date."'  " . $where . "   group by c.vw_adsid having ".$distance." ".$orderby." ")->result();
       }
       else if($this->session->userdata('result_view')=='other_fav'){
         $query = $this->db->query("SELECT d.user_type,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ppt_latitude*pi()/180))+cos(($lat*pi()/180)) * cos((ppt_latitude*pi()/180)) * cos((($long- ppt_longitude)* pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `propertypost_table` a inner join favourite_master as b on b.fv_adsid=a.ppt_id inner join user_table d on d.id=a.ppt_createdBy where a.ppt_isDelete=0 and a.ppt_property_status='active' and a.ppt_verification_status=1 and b.fv_userid!=".$user_id." and a.ppt_valid_till>='".$current_date."'  ". $where . "  group by a.ppt_id having ".$distance." ".$orderby." ")->result();
       }
       else{
        $query = $this->db->query("SELECT d.user_type,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ppt_latitude*pi()/180))+cos(($lat*pi()/180)) * cos((ppt_latitude*pi()/180)) * cos((($long- ppt_longitude)* pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `propertypost_table` a left join favourite_master as b on b.fv_adsid=a.ppt_id inner join user_table d on d.id=a.ppt_createdBy having ".$distance." and a.ppt_isDelete=0 and a.ppt_property_status='active' and a.ppt_verification_status=1 and a.ppt_valid_till>='".$current_date."' " . $where . " ".$orderby."")->result();
       }
        
       // echo $q=$this->db->last_query();
        return $query;
    }
    public function agent_list()
    {
      $pincode = $this->session->userdata('pincode');
       $user_id=$this->session->userdata('front_sess')['userid'];
          $user_ip   = $_SERVER['REMOTE_ADDR'];
   $distance_val = $this->session->userdata('distance');
  if($distance_val!=''){
          if($distance_val>50){
             $distance=" distance >50";
          }else{
            $distance=" distance <= ".$distance_val."";
          }
         
      }else{
          $distance=" distance <=5";
         //$distance=" distance >50";
      }


       $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip));
    if (empty($this->session->userdata('lat_long'))) {
        $lat = trim($geo["geoplugin_latitude"]);
         $long = trim($geo["geoplugin_longitude"]);

        }else{
if ($this->session->userdata('latitude') && $this->session->userdata('longitude')) {
        $lat = $this->session->userdata('latitude');
         $long = $this->session->userdata('longitude');

        }else if ($this->session->userdata('address_list')) {
            
            $where_adrs = array('slt_id' => $this->session->userdata('address_list'), 'slt_user' => $user_id);
            $this->db->select('*');

            $this->db->from('save_location_list');

            $this->db->where($where_adrs);

            $get_user_ads_query = $this->db->get();
             $adrs_res=$get_user_ads_query->result_array();
             //print_r($adrs_res);
         $lat = $adrs_res[0]['slt_lat'];
         $long = $adrs_res[0]['slt_long'];

        }else if ($pincode) {
          if($this->session->userdata('pinlatitude') && $this->session->userdata('pinlongitude')){
            $lat = $this->session->userdata('pinlatitude');
        $long = $this->session->userdata('pinlongitude');
          }else{
            $lat = $this->session->userdata('lat_long')['lat'];
          $long = $this->session->userdata('lat_long')['long'];
          }

        }else if ($this->session->userdata('curlat_long')) {
        $lat = $this->session->userdata('curlat_long')['lat'];
          $long = $this->session->userdata('curlat_long')['long'];
          //exit();
       }
        else{
            $lat = $this->session->userdata('lat_long')['lat'];
        $long = $this->session->userdata('lat_long')['long'];
        }

        }
      $query = $this->db->query("SELECT a.*,(((acos(sin(($lat*pi()/180)) * sin((latitude*pi()/180))+cos(($lat*pi()/180)) * cos((latitude*pi()/180)) * cos((($long- longitude)* pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `user_table` a  having ".$distance." and a.status=0 and a.user_type='agent'")->result();
       
        
        //echo $q=$this->db->last_query();
        return $query;
    }

    public function countall_product_data($grouping, $search, $search_category)
    {

        if ($grouping != '') {

            
           $this->db->like('grouping_KW', $grouping, 'both');

        } elseif ($search_category != '') {
            
           $this->db->like('category_KW', $grouping, 'both');
        } elseif ($search != '') {

            
            $this->db->like('category_KW', $search, 'both');

        } 
        $this->db->from('product');
        //echo $this->db->last_query();
        $data = $this->db->count_all_results();
        return $data;
    }
 
     public function refine_sort($data,$productid_text=NULL)
    {
        $where    = '';
        if ($productid_text) {
           
            $where.=" and b.product_id = '" .$productid_text."'";
        }
        
        $grouping = $this->session->userdata('grouping');
        if ($grouping) {
           
            $where.=" and b.grouping_search_text like " ." '%".$grouping."%'";
        }
        $search_category = $this->session->userdata('search_category');
        if ($search_category) {
            
            $where.=" and b.category_search_text like " ." '%".$search_category."%'";

        }
        $search = $this->session->userdata('title');
        if ($search) {
            if($grouping || $search_category){
            $where.=" and MATCH(b.seller_product_id,b.brand,b.product,b.category_main_own,b.category_search_text,b.grouping_search_text) AGAINST ('".$search."') ";
        }else{
            $where.=" and MATCH(b.seller_product_id,b.brand,b.product,b.category_main_own,b.category_search_text,b.grouping_search_text) AGAINST ('".$search."') ";
            //$where.="and MATCH(b.seller_product_id,b.brand,b.product,b.category_main_own,b.category_search_text,b.grouping_search_text) AGAINST ('".$search."') or b.category_search_text like " ." '%".$search."%' or b.product_desc like "." '%".$search."%'";
        }
        }

        if($data=='seller'){
          $query = $this->db->query("SELECT b.seller_id,b.seller_name,b.seller_product_id,b.brand,b.product,b.category_main_own,b.category_search_text,b.grouping_search_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.seller_id ORDER BY b.seller_name asc ")->result();
        }else if($data=='brand'){
          $query = $this->db->query("SELECT b.brand FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.brand ORDER BY b.brand asc ")->result();  
        }else if($data=='discount_range'){
          $query = $this->db->query("SELECT b.discount_range_id,b.discount_range_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.discount_range_id ORDER BY b.discount_range_id asc ")->result();  
        }else if($data=='reviews_range'){
          $query = $this->db->query("SELECT b.reviews_range_id,b.reviews_range_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.reviews_range_id ORDER BY b.reviews_range_id asc ")->result();  
        }else if($data=='view_range'){
          $query = $this->db->query("SELECT b.views_range_id,b.views_range_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.views_range_id ORDER BY b.views_range_id asc ")->result();  
        }
        else if($data=='fav_range'){
          $query = $this->db->query("SELECT b.favourite_range_id,b.favourite_range_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.favourite_range_id ORDER BY b.favourite_range_id asc ")->result();  
        }else if($data=='cart_range'){
          $query = $this->db->query("SELECT b.cart_range_id,b.cart_range_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.cart_range_id ORDER BY b.cart_range_id asc ")->result();  
        }else if($data=='price_range'){
          $query = $this->db->query("SELECT b.price_range_id,b.price_range_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.price_range_id ORDER BY b.price_range_id asc ")->result();  
        } else if($data=='rating_range'){
          $query = $this->db->query("SELECT b.rating_range_id,b.price_range_text FROM `product` a INNER JOIN view_product b on b.product_id=a.product_id where b.product_id!='' " . $where . " group by b.rating_range_id ORDER BY b.rating_range_id asc ")->result();  
        } 

       

        //echo $this->db->last_query();
        return $query;
    }
    public function get_product_review_by_user($product_id, $user_id)
    {
        $query = $this->db->query("SELECT * FROM product_riview WHERE product_id='$product_id' and user_id='$user_id' ");
        return $query;
    }

    public function get_product_review($product_id)
    {
        $query = $this->db->query("SELECT pr.*,ut.name FROM product_riview as pr LEFT JOIN user_table as ut on(pr.user_id=ut.id) WHERE pr.product_id='$product_id' ORDER BY pr.id DESC ");
        return $query;
    }

    public function wish_data_add($table_name, $id, $fieldname, $action, $data)
    {
        $uid = $data['user_id'];
        $pid = $data['product_id'];
        if ($action == 'insert') {

            $where = "user_id='" . $uid . "' AND product_id='" . $pid . "'";
            $this->db->select('*');

            $this->db->from($table_name);

            $query = $this->db->where($where);

            $query = $this->db->get();

            $num = $query->num_rows();

            if ($num > 0) {
                return 2;
            } else {

                $return = $this->db->insert($table_name, $data);

                if ((bool) $return === true) {

                    return 1;

                } else {

                    return 0;

                }
            }
        }
        //return $ff;
    }

    public function get_wish_list1($user_id)
    {
        $query = $this->db->query("SELECT w.*,p.name,p.price,p.image FROM wishlist as w LEFT JOIN product as p on(w.product_id=p.id) WHERE w.user_id='$user_id' ORDER BY w.id DESC ");
        return $query;
    }

        public function get_wish_list($user_id)
    {
        $query = $this->db->query("SELECT w.*,p.* FROM user_views as w LEFT JOIN view_product as p on(w.product_id=p.product_id) WHERE w.user_id='$user_id' AND w.favourite_flag='1' ORDER BY w.uv_autoid DESC ")->result();

        return $query;
    }

            public function get_cart_history($user_id)
    {
        $query = $this->db->query("SELECT ch.*,p.* FROM user_views as ch LEFT JOIN view_product as p on(ch.product_id=p.product_id) WHERE ch.user_id='$user_id' AND ch.cart_flag='1' ORDER BY ch.uv_autoid DESC ")->result();

        return $query;
    }
         public function get_shared($user_id)
    {
        $query = $this->db->query("SELECT ch.*,p.* FROM cart_history as ch LEFT JOIN view_product as p on(ch.product_id=p.product_id) WHERE ch.user_id='$user_id' ORDER BY ch.product_id DESC ")->result();

        return $query;
    }

    function remove_product_cart($product_id,$user_id){

    $query = $this->db->query("DELETE FROM cart_history WHERE product_id='$product_id' AND user_id='$user_id'");
        if($query){
            return true;
        }else{
            return false;
        }
        
    }

     function delete_cart($uv_autoid){

    $query = $this->db->query("UPDATE user_views SET cart_flag='0' WHERE uv_autoid='$uv_autoid' ");
        if($query){
            return true;
        }else{
            return false;
        }
        
    }

    // function delete_wishlist($product_id,$user_id){

    // $query = $this->db->query("DELETE FROM wishlist WHERE product_id='$product_id' AND user_id='$user_id'");
    //     if($query){
    //         return true;
    //     }else{
    //         return false;
    //     }
        
    // }

        function delete_wishlist($uv_autoid,$user_id){

    $query = $this->db->query("UPDATE user_views SET favourite_flag='0'  WHERE uv_autoid='$uv_autoid' AND user_id='$user_id'");
        if($query){
            return true;
        }else{
            return false;
        }
        
    }
    function get_address(){
         $user_id=$this->session->userdata('front_sess')['userid'];

        $where = "slt_user='" . $user_id . "'";
            $this->db->select('*');

            $this->db->from('save_location_list');

            $query = $this->db->where($where);

            $query = $this->db->get();
            return $query->result();
    }

}

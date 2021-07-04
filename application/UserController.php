<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header("Content-Type: application/json");

class UserController extends CI_Controller {
    public function __construct() {
        parent::__construct();
//         $this->load->database();
// 		$this->load->model('apanel/Categorymodel', '', TRUE);
// 		$this->load->model('General_model');
// 		$this->load->library("PhpMailerLib");
// 		$this->load->helper('url');	$this->load->database();

		$this->load->model('User_model');
		//****************************backtrace prevent*** START HERE*************************
		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
		$this->output->set_header('Pragma: no-cache');
		$this->load->library('form_validation');
		$this->load->model('General_model');
		$this->load->library("PhpMailerLib");

		$this->load->library('session');
		$this->load->helper('url');

    }
	
	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
		return 0;
	  }
	  else {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
	
		if ($unit == "K") {
		  return ($miles * 1.609344);
		} else if ($unit == "N") {
		  return ($miles * 0.8684);
		} else {
		  return $miles;
		}
	  }
	}

	public function registration()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		$data['isActive']  	 = 1;
		$data['isDelete']  	 = 0;
		/*print_r($user);
		exit;*/
		$check_user = $this->db->select('email')->from('user_table')->where('email', $data['email'])->get()->num_rows();
		if(trim($data['email']) == ""){
			$array['status'] = 0;
			$array['msg'] = 'Please enter your email address.';
		}elseif(trim($data['name']) == ""){
			$array['status'] = 0;
			$array['msg'] = 'Please enter your name.';
		}elseif(trim($data['phone']) == ""){
			$array['status'] = 0;
			$array['msg'] = 'Please enter your phone no.';
		}elseif(trim($data['address']) == ""){
			$array['status'] = 0;
			$array['msg'] = 'Please enter your address.';
		}elseif(trim($data['pass']) == ""){
			$array['status'] = 0;
			$array['msg'] = 'Please enter your password.';
		}elseif($data['pass'] != $data['confirmPassword']){
			$array['status'] = 0;
			$array['msg'] = 'Password and confirm password should be same.';
		}
// 		elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
// 			$array['status'] = 0;
// 			$array['msg'] = 'Invalid email format';
// 		}
		elseif($check_user > 0){
			$array['status'] = 0;
			$array['msg'] = 'Email already exist!';
		}/*elseif($this->check_password($data['user']->password) != ''){
			$array['status'] = 0;
			$array['message'] = $this->check_password($data['user']->password);
		}*/else{
			//$user['date_of_join'] = date('Y-m-d H:i:s');
			$data1['name'] = $data['name'];
			$data1['email'] = $data['email'];
			$data1['phone'] = $data['phone'];
			$data1['pass'] = base64_encode($data['pass']);
			$data1['entry_date'] = date('Y-m-d');
			$data1['isActive']  	 = 1;
			$data1['isDelete']  	 = 0;
			$this->db->insert('user_table', $data1);
			$user_id = $this->db->insert_id();
			
			$data2['usa_address'] = $data['address'];
			$data2['usa_user'] = $user_id;
			$data2['usa_createdAt'] = strtotime('Now');
			$data2['usa_isDelete']  = 0;
			$this->db->insert('user_save_adrs', $data2);
			$user = array(
				"name" => $data['name'],
				"email" => $data['email']
			);
			$array['user_id'] = $user_id;
			$array['user'] = $user;
			$array['token'] = rand(1111111, 9999999);
			$array['status'] = 1;
			$array['msg'] = 'Registration Succesful.You can login now';
		}
		echo json_encode($array);
	}
	
	public function login(){
		$data = json_decode(file_get_contents('php://input',true)); //Form Data
		//print_r($data);
		$sql_user = $this->db->select('*')->from('user_table')->where("email = '".$data->email."' OR phone='".$data->email."'")->where(array('pass'=>base64_encode($data->password), 'isDelete'=>0))->get();
		//echo $this->db->last_query();
		if(trim($data->email) == ""){
			$array['status'] = 0;
			$array['msg'] = 'Please enter your email address or phone no.';
		}elseif(trim($data->password) == ""){
			$array['status'] = 0;
			$array['msg'] = 'Please enter your password.';
		}elseif($sql_user -> num_rows() == 0){
			$array['status'] = 0;
			$array['msg'] = 'Email or password do not match!';
		}else{
			$rows_user = $sql_user -> row_array();
			if($rows_user['isActive'] == 0){
				$array['status'] = 0;
				$array['msg'] = 'Account is not activated!';
			}else{
				$user = array(
					"name" => $rows_user['name'],
					"email" => $rows_user['email'],
					"phone" => $rows_user['phone']
				);
				$array['status'] = 1;
				$array['token'] = "lucky".rand(1111111, 9999999);
				$array['user'] = $user;
				$array['user_id'] = $rows_user['id'];
			}
		}
		echo json_encode($array);
	}
	
	public function forgotPassword()
	{
		$data = json_decode(file_get_contents('php://input',true)); //Form Data
		$sql_user = $this->db->select('*')->from('user_table')->where("email = '".$data->username."' OR phone='".$data->username."'")->where('isDelete', '0')->get();
		if($sql_user -> num_rows() == 0){
			$array['status'] = 0;
			$array['msg'] = 'User not exist!';
		}else{
			$rows_user = $sql_user -> row();
			$message = rawurlencode(''.base64_decode($rows_user->pass).' is your www.luckydeliveries.com login password.');
  			$log       = base_url(). "register/login";
   			$mail = $this->phpmailerlib->load();
    		$subject   = "Password Successful Reset";
               
			$mail_body = '<html><body>';
			$mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			
			$mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $rows_user->phone . "</td></tr>";
			$mail_body .= "<tr><td><strong>Your password :</strong> </td><td>" . base64_decode($rows_user->pass). "</td></tr>";
			$mail_body .= "</table>";
			$mail_body .= "</body></html>";
			$mail_body .= "<p>We appreciate your association. </p><p>Thank You,</p><p>www.luckydeliveries.com</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";
			//$name=$_POST["name"];
			
			$mail->IsSMTP();
			$mail->Host = $this->config->item('mlHost');
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->Username = $this->config->item('mlUsername');
			$mail->Password = $this->config->item('mlPassword');
			$mail->From     = "sendmail@luckydeliveries.com";
			$mail->FromName = "Password Recover Successful ";
			//$mail->AddAddress('wtm.golam@gmail.com');
			$mail->AddAddress($rows_user->email);
			$mail->WordWrap = 5;
			$mail->IsHTML(true);
			$mail->Subject = $subject;
			$mail->Body    = $mail_body;
			$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
			$response=$mail->Send();
			
			$array['status'] = 1;
			$array['msg'] = 'Password successfully send';
		}
		echo json_encode($array);
	}
	
	public function getUser($userId)
	{
		$user = $this->db->select('*')->from('user_table')->where('id', $userId)->get()->row_array();
		$array['name'] = $user['name'];
		$array['phone'] = $user['phone'];
		$array['email'] = $user['email'];
		//$array['address'] = $user['address'];
		$array['profile_pic'] =$user['profile_pic'];
		$array['pic_url']=base_url().'uploads/customers/';
		echo json_encode($array);
	}
	public function changePassword()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		if($data['action']=='updatePassword'){
		    $row = $this->db->select('*')->from('user_table')->where('id', $data['userId'])->get()->row_array();
		    $old_pass=$row['pass'];
	if($old_pass==base64_encode($data['old_password'])){
	    $datasave['pass'] = base64_encode($data['new_pass']);
				
				$this->db->where('id', $data['userId'])->update('user_table', $datasave);
					$response['status'] = 1;
	}else{
	    $response['status'] = 0;
	}
				//$data1['email'] = $data['email'];
				
		}
	
		echo json_encode($response);
	}
	
	public function updateProfile()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		if($data['action']=='updateProfile'){
		    $row = $this->db->select('name, email, phone, profile_pic')->from('user_table')->where('id', $data['userId'])->get()->row_array();	
				$prevImage = $row['profile_pic'];
				// if($data['photo']){
				// $img = str_replace(' ', '+', $data['photo']);
				// $imagedata = base64_decode($img);
				// $image_name = strtotime('now').rand(11111, 99999).'.png';
				// file_put_contents($_SERVER['DOCUMENT_ROOT'].'/uploads/customers/'.$image_name, $imagedata);
				// $data1['profile_pic'] = $image_name;
				// if($prevImage != "" && file_exists($_SERVER['DOCUMENT_ROOT']."/uploads/customers/".$prevImage))
				// {
				// 	unlink($_SERVER['DOCUMENT_ROOT']."/uploads/customers/".$prevImage);
				// }
				// $array['profile_pic'] = base_url().'uploads/customers/'.$image_name;
				// }
				
					//$img = str_replace(' ', '+', $data['photo']);
				//$imagedata = base64_decode($img);
				//$new_name = $_FILES['photo']['name'];
				//$datalist['img'] = $this->upload->data();
				//$data2['profile_pic'] = $imagedata;
				

		
			
				$data1['name'] = $data['name'];
				//$data1['email'] = $data['email'];
				$data1['phone'] = $data['phone'];
				
				$this->db->where('id', $data['userId'])->update('user_table', $data1);
					$data2['status'] = 1;
		}
	
		echo json_encode($data2);
	}
	
	public function addAddress()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		//$this->db->insert('user_save_adrs', $data);
		//$array['status'] = 1;
//$_POST['usa_user'] = $this->session->userdata('cus_sess')['userid'];
if($data['usa_address']==''){
    $return_data['msg'] = message('Address required.', 2);
				$return_data['status'] = 0;
}else if($data['usa_doorno']==''){
    $return_data['msg'] = message('door or flat no required.', 2);
				$return_data['status'] = 0;
}else if($data['usa_landmark']==''){
    $return_data['msg'] = message('Land mark required.', 2);
				$return_data['status'] = 0;
}else{

			$data['usa_createdAt'] = time();

			$query = $this->General_model->show_data_id('user_save_adrs', '', '', 'insert', $data);

			if ($query) {
					$return_data['msg'] = message('Address has been successfully added.', 2);
				$return_data['status'] = 1;
			} else {
				$return_data['msg'] = message('Something went wrong, pleace try again.', 2);
				$return_data['status'] = 0;
			}
}
		
		echo json_encode($return_data);
	}

	public function updateAddress()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		
if($data['usa_address']==''){
    $return_data['msg'] = message('Address required.', 2);
				$return_data['status'] = 0;
}else if($data['usa_doorno']==''){
    $return_data['msg'] = message('door or flat no required.', 2);
				$return_data['status'] = 0;
}else if($data['usa_landmark']==''){
    $return_data['msg'] = message('Land mark required.', 2);
				$return_data['status'] = 0;
}

else{

			//$data['usa_createdAt'] = time();

			$query = $this->General_model->show_data_id('user_save_adrs',$data['edit_id'],'usa_id', 'update', $data);

			if ($query) {
					$return_data['msg'] = message('Address has been successfully updated.', 2);
				$return_data['status'] = 1;
			} else {
				$return_data['msg'] = message('Something went wrong, pleace try again.', 2);
				$return_data['status'] = 0;
			}
}
		
		echo json_encode($return_data);
	}
	
	public function getAddress($userId)
	{
	    //echo $userId;
	    $return_data['voucher_amount'] = $this->cm->getSingleRow('voucher_balance', 'user_table', array('id' => $userId))->voucher_balance;
		$addresses = $this->db->select('*')->from('user_save_adrs')->where('usa_user', $userId)->where('usa_isDelete', 0)->get()->result_array();
		foreach($addresses as $value)
		{
			$add['usa_id'] = $value['usa_id'];
			$add['usa_address'] = $value['usa_address'];
			$add['usa_doorno'] = $value['usa_doorno'];
			$add['usa_landmark'] = $value['usa_landmark'];
			$array['address'][] = $add;
		}
		$return_data['addresses'] =$addresses;
		echo json_encode($return_data);
	}
	public function getAddressUser($userId)
	{

		$addresses = $this->db->select('*')->from('user_save_adrs')->where('usa_id', $userId)->where('usa_isDelete', 0)->get()->row_array();
			$return_data['usa_id'] = $addresses['usa_id'];
			$return_data['usa_address'] = $addresses['usa_address'];
			$return_data['usa_doorno'] = $addresses['usa_doorno'];
			$return_data['usa_landmark'] = $addresses['usa_landmark'];
			
		
		echo json_encode($addresses);
	}
	public function deleteAddressUser()
	{
	$data = (array)json_decode(file_get_contents('php://input',true));
		$addresses = $this->db->select('*')->from('user_save_adrs')->where('usa_id', $data['editid'])->where('usa_isDelete', 0)->get()->row_array();
			//$return_data['usa_id'] = $addresses['usa_id'];
			if($addresses['usa_user']==$data['usa_user']){
			 
			$deldata['usa_isDelete']=1;
			$query=$this->General_model->show_data_id('user_save_adrs',$data['editid'],'usa_id', 'update', $deldata);

			if ($query) {
					$return_data['msg'] = message('Address has been successfully updated.', 2);
				$return_data['status'] = 1;
			} else {
				$return_data['msg'] = message('Something went wrong, pleace try again1.', 2);
				$return_data['status'] = 0;
			}
			} else {
				$return_data['msg'] = message('Something went wrong, pleace try again2.', 2);
				$return_data['status'] = 0;
			}
			
		
		echo json_encode($return_data);
	}
	public function getDeliveryCharge()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		$row_restaurant = $this->db->select('res_lat,res_long')->from('restaurant')->where('restaurant_id', $data['restaurantId'])->get()->row_array();
		$row_address = $this->db->select('usa_address')->from('user_save_adrs')->where('usa_id', $data['addressId'])->get()->row_array();
		$geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($row_address['usa_address']).'&key=AIzaSyDWs6GeWeeR-oiZayXk6VeOCRIk403pPjI');
        $output= json_decode($geocode);
        //print_r($output);
        $user_lat = $output->results[0]->geometry->location->lat;
        $user_long = $output->results[0]->geometry->location->lng;
		$miles=$this->distance($row_restaurant['res_lat'], $row_restaurant['res_long'], $user_lat, $user_long, "M");
		$mile = round($miles);
		if($mile == 2)
        {
			$mile_price = 2;
        }elseif($mile == 3){
			$mile_price = 3.5;
		}elseif($mile == 4){
			$mile_price = 4;
		}elseif($mile == 5){
			$mile_price = 4.5;
		}elseif($mile == 6){
			$mile_price = 5.5;
		}elseif($mile == 7){
			$mile_price = 6.5;
		}elseif($mile == 8){
			$mile_price = 7.5;
		}elseif($mile == 9){
			$mile_price = 8.5;
		}elseif($mile == 10){
			$mile_price = 9.5;
		}elseif($mile > 10){
			$mile_price = $mile + 5;
		}
		
		$array['mile_price'] = $mile_price;
		$array['mile'] = $mile;
		echo json_encode($array);
	}
	
	public function createOrder()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		//print_r($data); //exit;
		require_once('application/libraries/stripe-php/init.php');
		\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
		$charge =  \Stripe\Charge::create ([
                "amount" => ($data['totalPrice'] + $data['milePrice']) * 100,
                "currency" => "GBP",
                "source" => $data['token'],
                "description" => "payment from luckydeliveries" 
        ]);
        //echo $charge; //exit();
		//echo "<pre>"; print_r($charge); exit;
        if($charge->status=='succeeded'){
			$row_user = $this->db->select('name,phone')->from('user_table')->where('id', $data['user_id'])->get()->row_array();
			$row_user_add = $this->db->select('usa_address')->from('user_save_adrs')->where('usa_id', $data['address_id'])->get()->row_array();
			$row_restaurant = $this->db->select('address,res_lat,res_long')->from('restaurant')->where('restaurant_id', $data['cartItems'][0]->restaurant_id)->get()->row();
			$rand='lk'.random_string('alnum',12);
			//$detailsData    =   $this->session->userdata('post_data');
			
			$commission=$data['totalPrice']/10;
			$detailsData['uba_chargeid']=$charge->id;
			$detailsData['uba_transaction']=$charge->balance_transaction;
			$detailsData['uba_payStatus']=$charge->status;
			$detailsData['uba_orderid']= strtoupper($rand);
			$detailsData['uba_user']=$data['user_id'];
			$detailsData['uba_username']=$row_user['name'];
			$detailsData['uba_lat']="";
			$detailsData['uba_long']="";
			$detailsData['uba_total']=$data['totalPrice'];
			$detailsData['uba_address']=$row_user_add['usa_address'];
			$detailsData['uba_adsfrom']=$row_restaurant->address;
			$detailsData['uba_restulat']=$row_restaurant->res_lat;
			$detailsData['uba_restulong']=$row_restaurant->res_long;
			$detailsData['uba_restaurantid']=$data['cartItems'][0]->restaurant_id;
			$detailsData['uba_phone']=$row_user['phone'];
			$detailsData['uba_pickup_date']="";
			$detailsData['uba_delivery_date']="";
			$detailsData['uba_createdAt']=time();
			$detailsData['uba_date']=date('Y-m-d');
			$detailsData['uba_order_status']='1';
			$detailsData['order_status']='1';
			$detailsData['uba_distance']=$data['mile'];
			$detailsData['uba_commission']=$commission;
			$detailsData['uba_amout_get']=$data['totalPrice']-$commission;
			$detailsData['uba_driver_charge']=$data['milePrice'];
			$detailsData['uba_alltotal']=$charge->amount / 100;
			//print_r($detailsData); exit;
			$query= $this->General_model->show_data_id('user_billing_address','','','insert',$detailsData);
			if($query>0){
				$msg1='';
				foreach ($data['cartItems'] as $items) {
					//print_r($items);
					$data_array=array(
						"up_ubaid" => $query,
						"up_user" => $data['user_id'],
						"up_username" => $row_user['name'],
						"up_productid" => $items->menu_id,
						"up_item" => $items->menu_name,
						"up_image" => '',
						"up_restaurantid" => $items->restaurant_id,
						"up_qty" => $items->quantity,
						"up_price" => $items->menu_price,
						"up_total" => $items->menu_price * $items->quantity,
						"up_order_date"=>time()
					);
					$lid= $this->General_model->show_data_id('user_purchase','','','insert',$data_array);
				}				
			}
			$array['status'] = 1;
			$array['msg'] = "Order sucessfully placed.";
		}else{
			$array['status'] = 0;
			$array['msg'] = "There have some error now.";
		}
		echo json_encode($array, JSON_UNESCAPED_SLASHES);
	}
	
	public function cancelOrder()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		$order_id = $data['order_id'];
		$row_order = $this->db->select('uba_chargeid')->from('user_billing_address')->where('uba_id', $order_id)->get()->row_array();
		//print_r($data); //exit;
		require_once('application/libraries/stripe-php/init.php');
		\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
		$charge = \Stripe\Refund::create([
		  'charge' => $row_order['uba_chargeid']
		]);
        //echo $charge; //exit();
		//echo "<pre>"; print_r($charge); //exit;
        if($charge->status=='succeeded'){
			$array['status'] = 1;
			$update_array['uba_refund_id'] = $charge->id;
			$update_array['uba_order_status'] = 4;
			$update_array['order_status'] = "4";
			$this->db->where('uba_id', $order_id)->update('user_billing_address', $update_array);
		}else{
			$array['status'] = 0;
		}
		echo json_encode($array);
	}
	
	public function allOrders($userId)
	{
		$sql_order = $this->db->select('uba_id, uba_orderid, uba_alltotal, uba_driver, uba_delivery_date, uba_amout_get, uba_address, uba_refund_id, uba_createdAt, order_status')->from('user_billing_address')->where('uba_user', $userId)->get();
		$status = array(1=> 'Processing', 2=>'On The Way', 3=>'Delivered', 4=>'Cancelled');
		if($sql_order->num_rows() > 0)
		{
			$orders = $sql_order->result_array();
			foreach($orders as $value)
			{
				$array_order['id'] = $value['uba_id'];
				$array_order['order_id'] = $value['uba_orderid'];
				if($value['uba_delivery_date'] != '0000-00-00')
				{
					$array_order['delivery_time'] = date('m/d/Y', strtotime($value['uba_delivery_date']));
				}else{
					$array_order['delivery_time'] = "";
				}
				$array_order['order_amount'] = $value['uba_alltotal'];
				$array_order['uba_createdAt'] = date('m/d/Y h:i A', $value['uba_createdAt']);
				$array_order['uba_driver'] = $value['uba_driver'];
				$array_order['delivery_address'] = $value['uba_address'];
				$array_order['uba_refund_id'] = $value['uba_refund_id'];
				$array_order['order_status'] = $value['order_status'];
				$array_order['order_status_text'] = $status[$value['order_status']];
				$array[] = $array_order;
			}
		}else{
			$array = array();
		}
		echo json_encode($array, JSON_UNESCAPED_SLASHES);
	}
	
	public function getOrder($orderId)
	{
		$status = array(1=> 'Processing', 2=>'On The Way', 3=>'Delivered', 4=>'Cancelled');
		$status_color = array(1=> 'ontheway', 2=>'ontheway', 3=>'delivered', 4=>'canceled');
		$row_order = $this->db->select('*')->from('user_billing_address a')->where('a.uba_user', $orderId)->get()->result_array();
		//echo $this->db->last_query();
if($row_order){
		foreach($row_order as $order)
		{
			//$array1['items'][]= '';
			unset($array1); 
		$items = $this->db->select('*')->from('user_purchase a')->where('up_ubaid', $order['uba_id'])->get()->result_array();
		foreach($items as $item)
		{
			
			$array_item['up_item'] = $item['up_item'];
			$array_item['up_qty'] = $item['up_qty'];
			$array_item['up_price'] = $item['up_price'];
			
			$array1['items'][]= $item;
		}
		//$order_hist['uba_orderid'] = $order['uba_orderid'];
		$order['orderStatus']=$status[$order['uba_order_status']];
		$order['orderStatusColor']=$status_color[$order['uba_order_status']];
		$order['orderDate']=date('d F Y',strtotime($order['uba_date']));
			$order_hist['billing_list'] = $order;
			
			$order_hist['item'] = $array1['items'];
			$array['order_hist'][] = $order_hist;
	}
	
		
	}else{
		$array['order_hist'] ='';
	}
		
		echo json_encode($array);
	}
	
	public function restaurantReview()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data
		/*$where['rv_userid'] = $data['userId'];
		$where['rv_adsid'] = $data['restaurantId'];
		$where['rv_orderid'] = $data['orderId'];
		$count = $this->db->select('rv_id')->from('user_review')->where($where)->get()->num_rows();*/
		$array['rv_userid'] = $data['userId'];
		$array['rv_title'] = $data['title'];
		$array['rv_rate'] = $data['rating'];
		$array['rv_adsid'] = $data['restaurantId'];
		$array['rv_orderid'] = $data['orderId'];
		$array['rv_message'] = $data['review'];
		$array['rv_entry_date'] = date('Y-m-d H:i:s');
		$this->db->insert('user_review', $array);
	}
	
	public function restaurantBookmark()
	{
		$data = (array)json_decode(file_get_contents('php://input',true)); //Form Data		
		$array1['restaurant_id'] = $data['restaurant_id'];
		$array1['user_id'] = $data['user_id'];
		$check_bookmark = $this->db->select('*')->from('user_bookmark')->where($array1)->get()->num_rows();
		if($check_bookmark == 0)
		{
			$this->db->insert('user_bookmark', $array1);
			$array['status'] = 1;
		}else{
			$this->db->where($array1)->delete('user_bookmark');
			$array['status'] = 0;
		}
		echo json_encode($array);
	}
	public function uservoucher_list($user)
	{
		$dataGet=(array)json_decode(file_get_contents('php://input',true));
       
       // $user=$dataGet['userid'];
		$status = array(1=> 'Processing', 2=>'On The Way', 3=>'Delivered', 4=>'Cancelled');
		//$status_color = array(1=> 'ontheway', 2=>'ontheway', 3=>'delivered', 4=>'canceled');
		$array['voucher_amount'] = $this->cm->getSingleRow('voucher_balance', 'user_table', array('id' => $user))->voucher_balance;
		$row_order = $this->db->select('*')->from('voucher_order a')->where('a.user_id', $user)->group_by('order_no')->get()->result_array();
		//echo $this->db->last_query();
if($row_order){
	
		foreach($row_order as $order)
		{
			$tot=0;
			//$array1['items'][]= '';
			unset($array1); 
		$items = $this->db->select('*')->from('voucher_order a')->where('order_no', $order['order_no'])->get()->result_array();
		foreach($items as $item)
		{
			
			$array_item['up_item'] = $item['price'];
			$array_item['up_qty'] = $item['quantity'];
			$array_item['up_price'] = $item['price'];
			
			$array1['items'][]= $item;
			$tot +=$item['total_amount'];
		}
		//$order_hist['uba_orderid'] = $order['uba_orderid'];
		$order['orderStatus']=$order['status'];
		$order['ambtotal']=$tot; 
		$order['orderDate']=date('d F Y',strtotime($order['created_at']));
			$order_hist['billing_list'] = $order;
			
			$order_hist['item'] = $array1['items'];
			$array['order_hist'][] = $order_hist;
	}
	
		
	}else{
		$array['order_hist'] ='';
	}
		
		echo json_encode($array);
	}

}
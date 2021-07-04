<?php

ob_start();

defined('BASEPATH') OR exit('No direct script access allowed');



class Search extends CI_Controller {



	function __construct()

    {

        parent::__construct();

        $this->load->database();

        $this->load->model('apanel/Model_users');

        $this->load->model('User_model');

        //****************************backtrace prevent*** START HERE*************************

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');

        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);

        $this->output->set_header('Pragma: no-cache');

        $this->load->library('form_validation');

        $this->load->model('General_model');

         $this->load->model('Search_model');

        $this->load->library("PhpMailerLib"); 

        $this->load->library('session');

        $this->load->helper('url');

        // if($this->session->userdata('log_check')!=1)

        //     {

        //         redirect('register/login', 'refresh');

        //     }

     // error_reporting(0);

    }

	

	public function index()

	{

		

	

		$this->result();

	}

	public function result1()

	{

		  $page_number =$_POST["page"]+1;

        $position = (($page_number-1) * 5);

		 

		   $data['module']=$this->session->userdata('module');

		 //exit();

        $data['sub_module']=$this->input->post('sub_module');

       $data['looking_for']=$this->input->post('looking_for');

       $data['location']=$this->input->post('location');

       $data['location']=$this->session->userdata('location');

         $data['cover_area']=$this->session->userdata('cover_area');

         $min_rent=$this->input->get('min_rent', TRUE);

    $max_rent=$this->input->get('max_rent', TRUE);

    if($min_rent!='' && $max_rent!=''){

        $this->session->set_userdata('min_rent',$min_rent);

        $this->session->set_userdata('max_rent',$max_rent);

    }

    //   $prepAddr = str_replace(' ','+',$data['location']);

    //       $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');

    //       $output= json_decode($geocode);

    //       $latset['lat'] = $output->results[0]->geometry->location->lat;

    //       $latset['long'] = $output->results[0]->geometry->location->lng;

    //   $this->session->set_userdata('lat_long',$latset);

       

       

       if(empty($this->session->userdata('lat_long'))){

           $data['search_data']=array();

       }else{

           

       

        $data['search_data']=$this->Search_model->ad_data_list2($data['module'],$data['sub_module'],$position,$data['looking_for'],$data['location']);

}



 		$this->load->view('result_test',$data);



	}

	

	

public function result(){

    



//exit();

     

     $save_check=$this->input->get('save_per'); 

     $loc_allow='';

    $user_ip =$_SERVER['REMOTE_ADDR']; 

    $geo =  unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip) );

    //print_r($geo);

    $mod=base64_decode($this->input->get('module', TRUE));

    $cov=base64_decode($this->input->get('cover_area', TRUE));

    $loc=$this->input->get('location', TRUE);

    if($this->input->post('travelType', TRUE)!=''){
    $travelType=$this->input->post('travelType', TRUE);
    }else{
    $travelType=$this->session->userdata('travelType');
    }

    

    if($this->input->post('locationType', TRUE)!=''){
    $locationType=$this->input->post('locationType', TRUE);
    }else{
    $locationType=$this->session->userdata('locationType');
    }
    


    $departureDateAfter=$this->input->post('departureDateAfter', TRUE);



    if($this->input->post('depairportAirport_code', TRUE)!=''){
     $depairportAirport_code=$this->input->post('depairportAirport_code', TRUE);
    }else{
    $depairportAirport_code=$this->session->userdata('depairportAirport_code');
    }


    if($this->input->post('arrivalAirport_code', TRUE)!=''){
     $arrivalAirport_code=$this->input->post('arrivalAirport_code', TRUE);
    }else{
    $arrivalAirport_code=$this->session->userdata('arrivalAirport_code');
    }

    if($this->input->post('direct', TRUE)!=''){
     $direct=$this->input->post('direct', TRUE);
    }else{
    $direct=$this->session->userdata('direct');
    }

        if($this->input->post('singleAirlines', TRUE)!=''){
     $singleAirlines=$this->input->post('singleAirlines', TRUE);
    }else{
    $singleAirlines=$this->session->userdata('singleAirlines');
    }


    $save_location=base64_decode($this->input->get('save_location', TRUE));

    $accommodationtype=$this->input->get('accommodationtype', TRUE);

    $roomtype=$this->input->post('roomtype');

    $sharingtype=$this->input->post('sharingtype');

     $min_rent=$this->input->post('min_rent');

    $max_rent=$this->input->post('max_rent');

    $accoposted_by=$this->input->post('accoposted_by');

    $availablefrom=$this->input->post('availablefrom');

    $post_date=$this->input->post('post_date');

    $furnishedType=$this->input->get('furnishedType', TRUE);

    $bedRooms=$this->input->get('bedRooms', TRUE);



    $this->session->set_userdata('travelType',$travelType);

    $this->session->set_userdata('locationType',$locationType);

    $this->session->set_userdata('departureDateAfter',$departureDateAfter);

    $this->session->set_userdata('depairportAirport_code',$depairportAirport_code);

    $this->session->set_userdata('arrivalAirport_code',$arrivalAirport_code);

    $this->session->set_userdata('direct',$direct);

    $this->session->set_userdata('singleAirlines',$singleAirlines);
    //echo 'ok'.$this->session->userdata('travelType'); 



    if($this->input->post('tution_mode')){

        $this->session->set_userdata('tution_mode',$this->input->post('tution_mode'));

    }

    if($furnishedType!=''){

        $this->session->set_userdata('furnishedType',$furnishedType);

    }

    if($bedRooms!=''){

        $this->session->set_userdata('bedRooms',$bedRooms);

    }

    if($post_date!=''){

        $this->session->set_userdata('post_date',$post_date);

    }

    if($availablefrom!=''){

        $this->session->set_userdata('availablefrom',$availablefrom);

    }

    if($accoposted_by!=''){

        $this->session->set_userdata('accoposted_by',$accoposted_by);

    }

    if($min_rent!='' && $max_rent!=''){

        $this->session->set_userdata('min_rent',$min_rent);

        $this->session->set_userdata('max_rent',$max_rent);

    }

    if($accommodationtype!=''){

        $this->session->set_userdata('accommodationtype',$accommodationtype);

    }

    if($roomtype!=''){

        $this->session->set_userdata('roomtype',$roomtype);

    }

    if($sharingtype!=''){

        $this->session->set_userdata('sharingtype',$sharingtype);

    }

    if($mod!=''){

        $this->session->set_userdata('module',$mod);

    }

    if($cov!=''){

        $this->session->set_userdata('cover_area',$cov);

    }

    if($save_location!='' && $save_location!='current'  && $save_location!='other' && $save_location!=$this->session->userdata('save_location')){

        

        $this->session->set_userdata('save_location',$save_location);

        $this->session->set_userdata('location',$loc);

         

       $loc_allow='ok';

        $loc_allow1='ok';

        //exit();

        //$loc='';

        

    }else{

    if($loc!='' && $loc!=$this->session->userdata('location')){

        if($save_location=='other'){

             $this->session->set_userdata('get_curr','');

        }

         $this->session->set_userdata('save_location',$save_location); 

       $this->session->set_userdata('location',$loc); 

       $loc_allow='ok';

       $loc_allow1='not';

       //exit();

    }

    } 

    //echo 1;



        $data['module']=$this->session->userdata('module');

        $data['sub_module']=base64_decode($this->input->get('sub_module', TRUE));

        $data['looking_for']=$this->input->get('looking_for', TRUE);

        $data['location']=$this->session->userdata('location');

        $data['travelType']=$this->session->userdata('travelType');

        $data['departureDateAfter']=$this->session->userdata('departureDateAfter');

        $data['depairportAirport_code']=$this->session->userdata('depairportAirport_code');

        $data['arrivalAirport_code']=$this->session->userdata('arrivalAirport_code');

        $data['direct']=$this->session->userdata('direct');

        $data['singleAirlinesz']=$this->session->userdata('singleAirlinesz');

        $data['locationType']=$this->session->userdata('locationType');

        $data['save_location']=$this->session->userdata('save_location');

        $data['cover_area']=$this->session->userdata('cover_area');

        $data['category_list']=$this->General_model->show_data_id('category','','','get','');

        $data['subcat_list']=$this->General_model->show_data_id('subcategory',$data['module'],'categoryid','get','');

        $data['cover_area_list']=$this->General_model->show_data_id('covering_area','','','get','');

      //$user_id=$this->session->userdata('front_sess')['userid'];

      

      if($data['looking_for']){

          $this->session->set_userdata('looking_for',$data['looking_for']);

      }

      

       if($loc_allow=='ok'){

          

       if($loc_allow1=='ok'){

           //echo 11;

           $get_save_loc= $this->Search_model->get_saveloc($this->session->userdata('front_sess')['userid'],$data['save_location']);

       $latset['lat'] = $get_save_loc[0]->slt_lat;

           $latset['long'] = $get_save_loc[0]->slt_long;

           if($latset['lat']!='' && $latset['long']!=''){

               $this->session->set_userdata('lat_long',$latset);

               $this->session->set_userdata('lat_long_chk','1');

           }

           

           

       }else{

            //echo 22; 

     $prepAddr = str_replace(' ','+',$data['location']);

          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');

          $output= json_decode($geocode);

          //print_r($output);

          $latset['lat'] = $output->results[0]->geometry->location->lat;

           $latset['long'] = $output->results[0]->geometry->location->lng;

           if($latset['lat']!='' && $latset['long']!=''){

               $this->session->set_userdata('lat_long',$latset);

               $this->session->set_userdata('lat_long_chk','1');

              

               if($save_check=='yes'){

                    $RowCount= $this->Search_model->save_loc_count($this->session->userdata('front_sess')['userid'],$data['location']);

        if($RowCount>0){

            //$this->session->set_flashdata('error', 'Sorry location already exist');

        //redirect('dashboard/save_location');

        }else{

               $data_sv['slt_lat'] = $latset['lat'];

           $data_sv['slt_long'] = $latset['long'];

           $data_sv['slt_user'] =$this->session->userdata('front_sess')['userid'];

           $data_sv['slt_location'] =$data['location'];

           $data_sv['slt_create'] =date('Y-m-d');

           $data_sv['slt_title'] ='new'.date("Y_m_d-h-i-s");

           if($this->session->userdata('front_sess')['userid']){

               $query=$this->General_model->show_data_id('save_location_list','','','insert',$data_sv);

           }

        }

               }

           }

       }

            }

      

      if(empty($this->session->userdata('lat_long'))){

           $data['search_data']=array();

       }else{

           //if(($save_location!='' && $save_location!=$this->session->userdata('save_location')) || ){

         $geocode111=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$this->session->userdata('lat_long')['lat'].','.$this->session->userdata('lat_long')['long'].'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');

          $output111= json_decode($geocode111);

          $data22 = $output111;

$add_array  = $data22->results;

$add_array = $add_array[0];

$add_array = $add_array->address_components;

$country = "";

$state = ""; 

$city = "";

foreach ($add_array as $key) {

  if($key->types[0] == 'administrative_area_level_2')

  {

    $city = $key->long_name;

  }

  if($key->types[0] == 'administrative_area_level_1')

  {

    $state = $key->long_name;

  }

  if($key->types[0] == 'country')

  {

    $country = $key->long_name;

  }

}

if($country){

    $this->session->set_userdata('country',$country);

}

if($state){

    $this->session->set_userdata('state',$state);

}

if($city){

    $this->session->set_userdata('city',$city);

}


//echo $state;

           $data['search_data_loc']=$this->Search_model->ad_data_list($data['module'],$data['sub_module'],$data['looking_for'],$data['location'],$data['travelType'],$data['locationType'],$country,$data['departureDateAfter'],$data['depairportAirport_code'],$data['arrivalAirport_code'],$data['direct'],$data['singleAirlines']);

       //exit();

           $this->session->set_userdata('alldata', $data['search_data_loc']);

           

       }

         $data['search_data'] =$data['search_data_loc']; 

        

//exit();

       //echo"<pre>";

    //print_r($data['search_data']);

    // forv

    // if($data['looking_for']!=''){

    //     $data['search_data'] =json_decode(json_encode($this->search($this->session->userdata('alldata'), 'search_keyword', $data['looking_for'],'title'))); 



    // }else{

    //   $data['search_data']=$this->session->userdata('alldata');

    // }

    

    //print_r($data['search_data']);

    $user_id= $this->session->userdata('front_sess')['userid'];

   if($user_id){

       //echo "4454";

    $data['loc_list']=$this->General_model->show_data_id('save_location_list',$user_id,'slt_user','get','');

   // print_r($data['loc_list']);

   }else{

       $data['loc_list']=array();

   }

   

   //print_r($this->session->userdata('lat_long'));



//echo "Country : ".$country." ,State : ".$state." ,City : ".$city;

          //$jsondata = $output111;



   

         // echo"<pre>";

         //print_r($output111);

          //echo $output1->results[0]->formatted_address;

          //exit();

   $data['countrylist']=$this->General_model->show_data_id('country','','','get','');

        $data['title']="Search result";



        //echo"<pre>";

         //print_r($data);

         

          //exit();



        $this->load->view('header',$data);



        $this->load->view('result');



        $this->load->view('footer');



     

    }

     function search($array, $key, $value,$title) { 

   

    $arrIt = new RecursiveArrayIterator($array); 

   

    $it = new RecursiveIteratorIterator($arrIt); 

   

    foreach ($it as $sub) { 

   

        // Current active sub iterator 

        $subArray = $it->getSubIterator(); 

   if(strpos(strtolower($subArray[$title]), strtolower($value)) !== false){

        

            $result[] =iterator_to_array($subArray); 

         }

          else  if (strpos(strtolower($subArray[$key]), strtolower($value)) !== false) { 

             // echo 111;

               $result[] = iterator_to_array($subArray); 

          } 

        //  if ($subArray[$key] === $value) { 

        //     $result[] = iterator_to_array($subArray); 

        //  } 

         

    } 

    return $result; 

} 

    public function sort_by()

	{

		$this->session->set_userdata('sort_by',$this->input->post('data'));

	}

	public function by_distance()

	{

		$this->session->set_userdata('by_distance',$this->input->post('data'));

	}

  public function by_rating()

  {

    $this->session->set_userdata('by_rating',$this->input->post('data'));

  }

	public function get_latlong()

	{

	    if($this->session->userdata('lat_long_chk')!=1){

	        if($this->session->userdata('lat_long')['lat']!=$this->input->post('lat') && $this->session->userdata('lat_long')['long']!=$this->input->post('long')){

	         $prepAddr1 = $this->input->post('lat').','.$this->input->post('long');

          $geocode1=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$prepAddr1.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');

          $output1= json_decode($geocode1);

          //echo"<pre>";

          //print_r($output1);

          echo $output1->results[0]->formatted_address;

          $this->session->set_userdata('get_curr',$output1->results[0]->formatted_address);

	        }

           

           

		$this->session->set_userdata('lat_long',$this->input->post());

	    }

	}

    public function get_save_loc()

	{

	   $loc=base64_decode($this->input->post('location'));

	    $user_id= $this->session->userdata('front_sess')['userid'];

	  echo $data['search_data_loc']=$this->Search_model->save_loc_get($user_id,$loc)[0]->slt_location;

	}

public function get_current_loc()

	{

    //$gg=https://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452&key=YOUR_API_KEY;

    $prepAddr1 = $this->input->post('lat').','.$this->input->post('long');

          $geocode1=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$prepAddr1.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');

          $output1= json_decode($geocode1);

          //echo"<pre>";

          //print_r($output1);

          echo $output1->results[0]->formatted_address;

          

	}



}


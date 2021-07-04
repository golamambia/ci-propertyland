<?php
class Search_model extends CI_Model
{



    public function __construct()

    {



        parent::__construct();



    }



    public function ad_data_list($module = null, $sub_module = null, $looking_for1 = null, $location = null, $travel_type = null , $location_type = null, $country = null, $departureDateAfter = null, $depairportAirport_code = null,$arrivalAirport_code = null,$direct = null,$singleAirlines = null,$international_county = null)

    {
        $location_type;

       $international_county ;

        $query = $this->db->query("SELECT countrycode FROM country WHERE countryname='$country'")->row();

       $countryCode = $query->countrycode; 

        //echo $travel_type;

        $where = "";



        $order_by = "";



        echo $sortby_val = $this->session->userdata('sort_by');



        $distance_val = $this->session->userdata('by_distance');



        $lat = $this->session->userdata('lat_long')['lat'];



        $long = $this->session->userdata('lat_long')['long'];



        $user_ip = $_SERVER['REMOTE_ADDR'];



        $country = $this->session->userdata('country');



        $state = $this->session->userdata('state');



        $city = $this->session->userdata('city');



        $cover_area = $this->session->userdata('cover_area');



        $accommodationtype = $this->session->userdata('accommodationtype');



        $roomtype = $this->session->userdata('roomtype');



        $sharingtype = $this->session->userdata('sharingtype');



        $min_rent = $this->session->userdata('min_rent');



        $max_rent = $this->session->userdata('max_rent');



        $accoposted_by = $this->session->userdata('accoposted_by');



        $availablefrom = $this->session->userdata('availablefrom');

        $tution_mode = $this->session->userdata('tution_mode');

        $post_date = $this->session->userdata('post_date');

        $bedRooms = $this->session->userdata('bedRooms');

        $furnishedType = $this->session->userdata('furnishedType');

        $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip));



        if (empty($this->session->userdata('lat_long'))) {



            $lat = trim($geo["geoplugin_latitude"]);



            $long = trim($geo["geoplugin_longitude"]);



        }



        $looking_for = $this->session->userdata('looking_for');



//exit();



        //print_r($geo);



        if ($cover_area != '') {

    if ($module!=21 && $module!=24) {

            $where .= ' and cover_area=' . $cover_area;

    }

        }



        if ($module != '' && $module==24) {

            $where1='';
            $where2='';
            $where3='';
            $where4='';

            if($direct!=''){
                $where1=' and direct='.$direct;
            }

            if($singleAirlines!=''){
                $where2=' and singleAirlines='.$singleAirlines;
            }

            if($departureDateAfter!=''){
                $where3=' and date_of_travel > Date "'.$departureDateAfter.'"';
            }

            if($arrivalAirport_code!=''){
                $where4=' and arrairport_code="'.$arrivalAirport_code.'"';
            }


        if($location_type=='Departure' && $international_county=='' && $travel_type=='International'){

            if($depairportAirport_code!=''){

            $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and depairport_country="'.$countryCode.'" and depairport_code="'.$depairportAirport_code.'" '.$where1.$where2.$where3;
            }else{

            $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and depairport_country="'.$countryCode.'" and date_of_travel>"'.$departureDateAfter.'"  '.$where1.$where2.$where3;

            }

            $this->session->unset_userdata('international_county');

        }elseif($location_type=='Arrival' && $international_county==''  && $travel_type=='International'){

            if($depairportAirport_code!=''){

            $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and arrival_country="'.$countryCode.'" and arrairport_code="'.$arrivalAirport_code.'" '.$where1.$where2.$where3;
            }else{

            $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and arrival_country="'.$countryCode.'"  '.$where1.$where2.$where3.$where4;

            }

            $this->session->unset_userdata('international_county');

        }elseif($location_type=='Departure' && $travel_type=='International' && $international_county!=''){

             $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and depairport_country="'.$countryCode.'" and arrival_country="'.$international_county.'" '.$where1.$where2.$where3;

        }elseif($location_type=='Arrival' && $travel_type=='International' && $international_county!=''){

             $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and arrival_country="'.$countryCode.'" and depairport_country="'.$international_county.'" '.$where1.$where2;

        }elseif($travel_type=='Domestic' && $location_type=='Departure' OR  $location_type=='Arrival'){


            if($depairportAirport_code!=''){
             $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and arrival_country="'.$countryCode.'" and depairport_country="'.$countryCode.'" and depairport_code="'.$depairportAirport_code.'"'.$where1.$where2.$where3;

            }else{

                 $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and arrival_country="'.$countryCode.'" and depairport_country="'.$countryCode.'" '.$where1.$where2.$where3.$where4;

            }
        }

        else{

            $where .= ' and cat_name=' . $module. ' and travel_Type="'.$travel_type.'" and depairport_country=""';
            $this->session->unset_userdata('international_county');

        }




        }



    if ($module != '') {



            $where .= ' and cat_name=' . $module;



        }



        if ($sub_module != '') {



            $where .= ' and sub_cat=' . $sub_module;



        }



        if ($country != '') {

        if ( $module!=24) {

            $where .= ' and countryname="' . $country . '"';

        }

        }



        if ($city != '') {



            // $where.=' and d.name="'.$city.'"';



        }



        if ($looking_for != '') {



            //$where.=' and search_keyword like '."'%".$looking_for."%'".' or title like '."'%".$looking_for."%'";



            $where .= ' and MATCH (`title`, `search_keyword`) AGAINST ("' . $looking_for . '") ';



        }



        //   if($location!=''){



        //       $where.=' and address like '."'%".$location."%'";



        //   }



        if ($sortby_val != '') {



            if ($sortby_val == 'by_post_date') {

                $order_by .= ' order by lbcontactId desc';

            }

if ( $module==24) {
            if ($sortby_val == 'by_distance24') {

                $order_by .= ' order by distance';

            }
            if ($sortby_val == 'by_departure_airport_code') {

                $order_by .= ' order by depairport_code';

            }
            if ($sortby_val == 'by_arrival_airport_code') {

                $order_by .= ' order by arrairport_code';

            }

}


        }



        if ($distance_val != '') {



            $distance = $distance_val;



        } else {



            //$distance=3;



            $distance = 3;



        }



        //$this->db->select();



        //$this->db->where('cmp_adsuser',$user_id);



        //$this->db->from('module_lbcontacts');



        //$this->db->join('module_lbcontacts', 'module_lbcontacts.lbcontactId = table_complaint.cmp_adsid');



        //$this->db->where($wh);



        //$query=$this->db->query("select * from module_lbcontacts where is_delete=0 and post_status=1 $where");



        if ($cover_area == 1) {



            //5 SHARED ACCOMMODATION FOR RENT



            if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            } else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or b.course_header like '."'%".$looking_for."%'";

                }

                $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");



            }

//////////////////////////////////tm cover/////////////////////
            else if ($module == 24) {

          
                $query = $this->db->query("select   a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a  having  is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");

              
            }

//////////////////////////////////tm cover/////////////////////
            else {



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            }



        } else if ($cover_area == 2) {



            $inner_field = '';



            $inner_join = '';



            if ($state != '') {

////////////////////////////tm////////////////////////////
                if($module != 24){



                $where .= ' and state_name="' . $state . '"';



                $inner_join .= ' INNER JOIN state c on c.sid=a.state ';



                $inner_field .= ' c.state_name,c.countryid, ';

            }
////////////////////////////tm////////////////////////////


            }



            if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select " . $inner_field . " b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country " . $inner_join . " having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            }else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or b.course_header like '."'%".$looking_for."%'";

                }

                $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country  having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");



            }else if ($module == 24) {

          
                $query = $this->db->query("select   a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a  having  is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");

              
            } else {



                $query = $this->db->query("select " . $inner_field . " b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country " . $inner_join . " having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            }



        } else if ($cover_area == 3) {



            if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            }else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or b.course_header like '."'%".$looking_for."%'";

                }

                $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");



            } else {



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            }



        } else {

//echo 1;

            if ($module == 22) {



                $query = $this->db->query("select  c.address,c.dl_lat as ads_lat,c.dl_long as ads_long,a.ads_lat as ads_lat2,a.ads_long as ads_long2,a.address as address2,b.*,



                a.`lbcontactId`, a.`title`, a.`phone`, a.`email`, a.`contact_person`, a.`landmark`, a.`cover_area`, a.`country`, a.`state`, a.`city`, a.`zipcode`,



                a.`cat_name`, a.`sub_cat`, a.`event_start_date`, a.`event_end_date`, a.`event_start_time`, a.`event_end_time`, a.`description`, a.`search_keyword`,



                a.`description_extra`, a.`weblink`, a.`media_facebook`, a.`media_linkedin`, a.`media_twitter`, a.`upload_file`, a.`user_id`, a.`post_status`,



                a.`is_delete`, a.`entry_date`, a.`date_time`, a.`adstatus_byuser`, a.`approved_by`, a.`approved_date`, a.`working_hour`, a.`update_status`,



                a.`updated_at`, a.`avj_review`, a.`website`, a.`type`, a.`event_frequency`,a.`furnishedType`, a.`accommodationType`, a.`roomType`,



                a.`sharingType`, a.`gender`, a.`bedRooms`, a.`toilets`, a.`floor`, a.`liftAvailable`, a.`petsAllowed`, a.`utilitiesIncluded`,



                a.`availablefrom`, a.`monthlyrent`, a.`currency`, a.`accomPostedby`, a.`noticePeriod`, a.`advanceMonths`, a.`roomDetails`,



                a.`terms`, a.`bachelorsAllowed`, a.`area`, a.`areaUnits`, a.`date_of_travel`, a.`arrival_date`, a.`depairport_code`,



                a.`arrairport_code`, a.`active`, a.`institution`, a.`tution_mode`,



                (((acos(sin(($lat*pi()/180)) * sin((c.dl_lat*pi()/180))+cos(($lat*pi()/180)) * cos((c.dl_lat*pi()/180)) * cos((($long- c.dl_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country inner join delivery_location c on c.post_id=a.lbcontactId having distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");



            } else if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country having distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");



                //    exit();



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit 0,5 ");



            } else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or course_header like '."'%".$looking_for."%'";

                }

                 if ($tution_mode==1 || $tution_mode==3) {



            $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");



                }else{

                $query = $this->db->query("select  c.*,b.*, a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country inner join courses c on c.institution_id=a.lbcontactId having tution_mode=2 and distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");

                }

            }else if ($module == 24) {



          
                $query = $this->db->query("select   a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a  having  is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");

              
            }else {



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country having distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");



                //    exit();



            }



        }



        //$query=$this->db->query("select *,(((acos(sin((22.6113371*pi()/180)) * sin((ads_lat*pi()/180))+cos((22.6113371*pi()/180)) * cos((ads_lat*pi()/180)) * cos(((88.4285688- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        //    as distance from module_lbcontacts having distance <= '".$distance."' and is_delete=0 and post_status=1 $where $order_by");



        $result = $query->result();

//echo $where;

if($this->session->userdata('front_sess')['name']=='tanmoy'){
    echo $this->db->last_query();
}

       //echo  $this->db->last_query();



        return $result;



    }



    public function ad_data_list2($module1 = null, $sub_module2 = null, $position = null, $looking_for2 = null, $location = null)

    {



        $cover_area = $this->session->userdata('cover_area');



        $country = $this->session->userdata('country');



        $state = $this->session->userdata('state');



        $city = $this->session->userdata('city');



        $looking_for = $this->session->userdata('looking_for');



        $accommodationtype = $this->session->userdata('accommodationtype');



        $roomtype = $this->session->userdata('roomtype');



        $sharingtype = $this->session->userdata('sharingtype');



        $min_rent = $this->session->userdata('min_rent');



        $max_rent = $this->session->userdata('max_rent');



        $accoposted_by = $this->session->userdata('accoposted_by');



        $availablefrom = $this->session->userdata('availablefrom');



        $post_date = $this->session->userdata('post_date');

        $bedRooms = $this->session->userdata('bedRooms');

        $furnishedType = $this->session->userdata('furnishedType');

        $tution_mode = $this->session->userdata('tution_mode');

        

        if ($module1 != 'not' && $module1 != '') {



            $module = $module1;



        } else {



            $module = '';



        }



        //  if($looking_for2!='not'){



        //      $looking_for=$looking_for2;



        //  }else{



        //     $looking_for='';



        //  }



        if ($sub_module2 != 'not') {



            $sub_module = $sub_module2;



        } else {



            $sub_module = '';



        }



         if ($country != '') {

        

            $where .= ' and countryname="' . $country . '"';

        

        }



          if($state!=''){



////////////////////////////tm////////////////////////////
                if($module != 24){



$where .= ' and state_name="' . $state . '"';



                $inner_join .= ' INNER JOIN state c on c.sid=a.state ';



                $inner_field .= ' c.state_name,c.countryid, ';

            }
////////////////////////////tm////////////////////////////


             



          }



        if ($city != '') {



            // $where.=' and d.name="'.$city.'"';



        }



        //  if($location!=''){



        //       $where.=' and address like '."'%".$location."%'";



        //   }



        $where = "";



        $order_by = "";



        $sortby_val = $this->session->userdata('sort_by');



        $distance_val = $this->session->userdata('by_distance');



        $lat = $this->session->userdata('lat_long')['lat'];



        $long = $this->session->userdata('lat_long')['long'];



        $user_ip = $_SERVER['REMOTE_ADDR'];



        $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip));



        if (empty($this->session->userdata('lat_long'))) {



            $lat = trim($geo["geoplugin_latitude"]);



            $long = trim($geo["geoplugin_longitude"]);



        }



//print_r($geo);



        if ($cover_area != '') {

    if ($module!=21) {

            $where .= ' and cover_area=' . $cover_area;

    }

        }



        if ($module != '') {



            $where .= ' and cat_name=' . $module;



        }



        if ($sub_module != '') {



            $where .= ' and sub_cat=' . $sub_module;



        }



        if ($looking_for != '') {



            //$where.=' and search_keyword like '."'%".$looking_for."%'".' or title like '."'%".$looking_for."%'";



            $where .= ' and MATCH (`title`, `search_keyword`) AGAINST ("' . $looking_for . '") ';



        }



        if ($sortby_val != '') {



            if ($sortby_val == 'by_post_date') {



                $order_by .= ' order by lbcontactId desc';



            }



        }



        if ($distance_val != '') {



            $distance = $distance_val;



        } else {



            //$distance=3;



            $distance = 3;



        }



        if ($cover_area == 1) {



            //5 SHARED ACCOMMODATION FOR RENT



            if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            }else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or b.course_header like '."'%".$looking_for."%'";

                }

                $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



            } 

 //////////////////////////tm///////////////////////////
 else if ($module == 24) {



          
                $query = $this->db->query("select   a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a  having  is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");

              
            }
/////////////////////////////tm////////////////////////                       

            else {



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



            as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            }



        } else if ($cover_area == 2) {



            $inner_field = '';



            $inner_join = '';



            if ($state != '') {



                $where .= ' and state_name="' . $state . '"';



                $inner_join .= ' INNER JOIN state c on c.sid=a.state ';



                $inner_field .= ' c.state_name,c.countryid, ';



            }



            if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select " . $inner_field . " b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country " . $inner_join . " having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select " . $inner_field . " b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country " . $inner_join . " having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            }else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or b.course_header like '."'%".$looking_for."%'";

                }

                $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



            } 

 //////////////////////////tm///////////////////////////
 else if ($module == 24) {



          
                $query = $this->db->query("select   a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a  having  is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");

              
            }
/////////////////////////////tm////////////////////////             

            else {



                $query = $this->db->query("select " . $inner_field . " b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country " . $inner_join . " having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            }



        } else if ($cover_area == 3) {



            if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            }else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or b.course_header like '."'%".$looking_for."%'";

                }

                $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



            } 


 //////////////////////////tm///////////////////////////
 else if ($module == 24) {



          
                $query = $this->db->query("select   a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a  having  is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit 0,5 ");

              
            }
/////////////////////////////tm////////////////////////             


            else {



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country  having is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . "  limit " . $position . ",5 ");



            }



        } else {



            if ($module == 22) {



                $query = $this->db->query("select  c.address,c.dl_lat as ads_lat,c.dl_long as ads_long,a.ads_lat as ads_lat2,a.ads_long as ads_long2,a.address as address2,b.*,



                a.`lbcontactId`, a.`title`, a.`phone`, a.`email`, a.`contact_person`, a.`landmark`, a.`cover_area`, a.`country`, a.`state`, a.`city`, a.`zipcode`,



                a.`cat_name`, a.`sub_cat`, a.`event_start_date`, a.`event_end_date`, a.`event_start_time`, a.`event_end_time`, a.`description`, a.`search_keyword`,



                a.`description_extra`, a.`weblink`, a.`media_facebook`, a.`media_linkedin`, a.`media_twitter`, a.`upload_file`, a.`user_id`, a.`post_status`,



                a.`is_delete`, a.`entry_date`, a.`date_time`, a.`adstatus_byuser`, a.`approved_by`, a.`approved_date`, a.`working_hour`, a.`update_status`,



                a.`updated_at`, a.`avj_review`, a.`website`, a.`type`, a.`event_frequency`,a.`furnishedType`, a.`accommodationType`, a.`roomType`,



                a.`sharingType`, a.`gender`, a.`bedRooms`, a.`toilets`, a.`floor`, a.`liftAvailable`, a.`petsAllowed`, a.`utilitiesIncluded`,



                a.`availablefrom`, a.`monthlyrent`, a.`currency`, a.`accomPostedby`, a.`noticePeriod`, a.`advanceMonths`, a.`roomDetails`,



                a.`terms`, a.`bachelorsAllowed`, a.`area`, a.`areaUnits`, a.`date_of_travel`, a.`arrival_date`, a.`depairport_code`,



                a.`arrairport_code`, a.`active`, a.`institution`, a.`tution_mode`,



                (((acos(sin(($lat*pi()/180)) * sin((c.dl_lat*pi()/180))+cos(($lat*pi()/180)) * cos((c.dl_lat*pi()/180)) * cos((($long- c.dl_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country inner join delivery_location c on c.post_id=a.lbcontactId having distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



            } else if ($module == 5) {



                if ($sortby_val == 'availablefrom') {



                    $order_by .= ' order by availablefrom desc';



                }



                if ($sortby_val == 'accoposted_by') {



                    $order_by .= ' order by accommodationType desc';



                }



                if ($sortby_val == 'roomtype') {



                    $order_by .= ' order by roomType desc';



                }



                if ($sortby_val == 'monthlyrent') {



                    $order_by .= ' order by monthlyrent desc';



                }



                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }



                if ($roomtype != '') {



                    $where .= ' and roomType="' . $roomtype . '"';



                }



                if ($sharingtype != '') {



                    $where .= ' and sharingType="' . $sharingtype . '"';



                }



                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }



                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country having distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



                //    exit();



            } else if ($module == 17) {

                if ($bedRooms != '') {



                    $where .= ' and bedRooms="' . $bedRooms . '"';



                }

                if ($furnishedType != '') {



                    $where .= ' and furnishedType="' . $furnishedType . '"';



                }

                if ($accoposted_by != '') {



                    $where .= ' and accomPostedby="' . $accoposted_by . '"';



                }

                if ($availablefrom != '') {



                    $where .= ' and availablefrom >="' . $availablefrom . '"';



                }

                if ($accommodationtype != '') {



                    $where .= ' and accommodationType="' . $accommodationtype . '"';



                }

                if ($min_rent != '' && $max_rent != '') {



                    $where .= ' and monthlyrent  BETWEEN ' . $min_rent . ' and ' . $max_rent;



                }



                if ($post_date != '') {



                    $where .= ' and entry_date ="' . $post_date . '"';



                }



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country having distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



            } else if ($module == 21) {

                if ($looking_for != '') {



            $where.=' or course_header like '."'%".$looking_for."%'";

                }

                 if ($tution_mode==1 || $tution_mode==3) {



            $query = $this->db->query("select  c.*,b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN courses b on b.institution_id=a.lbcontactId INNER JOIN country c on c.id=a.country having tution_mode=1 or tution_mode=3 and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



                }else{

                $query = $this->db->query("select  c.*,b.*, a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country inner join courses c on c.institution_id=a.lbcontactId having tution_mode=2 and distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");

                }

            } else {



                $query = $this->db->query("select  b.*,a.*,(((acos(sin(($lat*pi()/180)) * sin((ads_lat*pi()/180))+cos(($lat*pi()/180)) * cos((ads_lat*pi()/180)) * cos((($long- ads_long)* pi()/180))))*180/pi())*60*1.1515*1.609344)



        as distance from module_lbcontacts a INNER JOIN country b on b.id=a.country having distance <= " . $distance . " and is_delete=0 and post_status=1 and adstatus_byuser=0 " . $where . " " . $order_by . " limit " . $position . ",5 ");



                //    exit();



            }



        }



        $result = $query->result();



        $str = $this->db->last_query();



        return $str;



    }



    public function get_saveloc($user, $id)

    {



        $query = $this->db->query("select * from save_location_list where slt_id=" . $id . " and slt_user=" . $user . "");



        $result = $query->result();



        return $result;



    }



    public function countall_ad_data()

    {



        //$this->db->where('post_status',1);



        $this->db->where('is_delete', 0);



        $this->db->from('module_lbcontacts');



        $data = $this->db->count_all_results();



        return $data;



    }



    public function show_data_id()

    {



        $this->db->select('*');



        $this->db->from('module_lbcontacts');



        $this->db->where(array('is_delete' => 0, 'post_status' => 1));



        $query = $this->db->get();



        $result = $query->result();



        return $result;



    }



    public function save_loc_count($user, $loc)

    {



        $query = $this->db->query('SELECT * FROM `save_location_list` WHERE `slt_location`="' . $loc . '" and `slt_user`=' . $user . '');



        $result = $query->num_rows();



        return $result;



    }



    public function save_loc_delete($user, $locid)

    {



        $query = $this->db->query('delete FROM `save_location_list` WHERE `slt_id`=' . $locid . ' and `slt_user`=' . $user . '');



        return $query;



    }



    public function save_loc_get($user, $loc)

    {



        $query = $this->db->query('SELECT * FROM `save_location_list` WHERE `slt_id`="' . $loc . '" and `slt_user`=' . $user . '');



        $result = $query->result();



        return $result;



    }



}


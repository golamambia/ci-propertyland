<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

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
        $this->load->model('Adslist_model');
        $this->load->library("PhpMailerLib");
        $this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('log_check')!=1)
            {
                redirect('register/login', 'refresh');
            }
      
    }
	
	public function index()
	{
		//$user_id=$this->session->userdata('front_sess')['userid'];
		//$where="is_delete=0 and user_id='".$user_id."'";


		//$data['ads_list']=$this->Adslist_model->show_data_id('module_lbcontacts',$where);


		//$data['title']='Location';
		//$this->load->view('header');
		//$this->load->view('user_ads_list',$data);
		//$this->load->view('footer');

    $this->company_list();
	}


//-------------------- ad pagination ---------------//

function company_list($offset=0){

      $limit=50000;

      $user_id=$this->session->userdata('front_sess')['userid'];

      $ads_list=$this->Adslist_model->company_list($limit,$offset,$user_id);

      $total_rows=$this->Adslist_model->countall_company_data($user_id);

      //echo $total_rows;

      $config["total_rows"]=$total_rows;
      $config["per_page"]=$limit;
      $config["uri_segment"]=3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');


      if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
      //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

      if(count($_GET) > 0){
        $config['first_url'] = site_url("company/company_list".'?'.http_build_query($_GET));
      }

        $config["base_url"]=site_url("company/company_list"); 
  
      

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $page_link=$this->pagination->create_links(); 

      $industry=$this->General_model->show_data_id('industry_selection','','','get','');    


        $title="Location";

        $this->load->view('header',compact('ads_list','page_link','title','industry'));

        $this->load->view('company_list');

        $this->load->view('footer');

      
    }

//-------------------- ad pagination ---------------//



	public function company_del($id){



		$query = $this->General_model->show_data_id('company',$id,'id','delete','');

  $query .= $this->General_model->show_data_id('company_loaction',$id,'company_id','delete','');   


	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('company');
	}



        public function single_add1()
    {

        $user_ip ='103.218.236.102';
//getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
//print_r($geo);
$data['country_get']=trim($geo["geoplugin_countryCode"]);
$data['state_get']=trim($geo["geoplugin_region"]);
$data['city_get']=trim($geo["geoplugin_city"]);

        $g_catid=base64_decode($this->input->get('module', TRUE));
        $sub_catid=base64_decode($this->input->get('submodule', TRUE));
       $data['catlist']=$this->General_model->show_data_id('category',$g_catid,'id','get','');
       $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       $data['countrylist']=$this->General_model->show_data_id('country','','','get','');

       $get_countryid=$this->General_model->show_data_id('country',$data['country_get'],'countrycode','get','');
       $get_stateid=$this->General_model->show_data_id('state',$data['state_get'],'state_name','get','');
       $data['statelist']=$this->General_model->show_data_id('state',$get_countryid[0]->id,'countryid','get','');

       $data['citylist']=$this->General_model->show_data_id('cities',$get_stateid[0]->sid,'state_id','get','');

        $data['category_title']=$data['catlist'][0]->name;
        $data['title']='The Local Business';
    
        $this->load->view('header',$data);
        $this->load->view('lbc_single_add');
        $this->load->view('footer');


    }



    public function edit_ad()

    {
                //$user_ip =$_SERVER['REMOTE_ADDR'];
                //'103.218.236.102';
//$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
//print_r($geo);
// $data['country_get']=trim($geo["geoplugin_countryCode"]);
// $data['state_get']=trim($geo["geoplugin_region"]);
// $data['city_get']=trim($geo["geoplugin_city"]);

//         $g_catid=base64_decode($this->input->get('module', TRUE));
//         $sub_catid=base64_decode($this->input->get('submodule', TRUE));
//       $data['catlist']=$this->General_model->show_data_id('category',$g_catid,'id','get','');
//       $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
//       $data['countrylist']=$this->General_model->show_data_id('country','','','get','');

//       $get_countryid=$this->General_model->show_data_id('country',$data['country_get'],'countrycode','get','');
//       $get_stateid=$this->General_model->show_data_id('state',$data['state_get'],'state_name','get','');
//       $data['statelist']=$this->General_model->show_data_id('state',$get_countryid[0]->id,'countryid','get','');

//       $data['citylist']=$this->General_model->show_data_id('cities',$get_stateid[0]->sid,'state_id','get','');

        
//------------------..----------------//        

        $id = base64_decode($this->input->get('id'));
         
        $query=$this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactid','get','');

        $data['result']=$query;
     $g_catid=$data['result'][0]->cat_name;
         $sub_catid=$data['result'][0]->sub_cat;
       $data['catlist']=$this->General_model->show_data_id('category',$g_catid,'id','get','');
       $data['subcatlist']=$this->General_model->show_data_id('subcategory',$g_catid,'categoryid','get','');
       $data['countrylist']=$this->General_model->show_data_id('country','','','get','');
       $data['category_title']=$data['catlist'][0]->name;
        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

        $c_id=$data['result'][0]->country;

        //$data['add_country']=$this->General_model->show_data_id('country',$c_id,'id','get','');

        $data['statelist']=$this->General_model->show_data_id('state',$c_id,'countryid','get','');

        $s_id=$data['result'][0]->state;

        $data['citylist']=$this->General_model->show_data_id('cities',$s_id,'state_id','get','');
    $data['cover_area']=$this->General_model->show_data_id('covering_area','','','get','');

        //$data['category']=$this->General_model->show_data_id('event_category','','','get','');
       //print_r($query);

     $data['val']=$this->General_model->show_data_id('delivery_location',$id,'post_id','get','');

        $data['title']="lbc || single add";

        //echo "<pre>"; print_r($data); exit();

        $this->load->view('header',$data);

        $this->load->view('edit_lbc_add');

        $this->load->view('footer');

    }

        public function single_add()

    {

       
//------------------..----------------//        

        $id = base64_decode($this->input->get('id'));

        $query=$this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactid','get','');

        $data['result']=$query;
    
            
    $g_catid=$data['result'][0]->cat_name;
         $sub_catid=$data['result'][0]->sub_cat;
       $data['catlist']=$this->General_model->show_data_id('category',$g_catid,'id','get','');
       $data['subcatlist']=$this->General_model->show_data_id('subcategory',$sub_catid,'sid','get','');
       $data['countrylist']=$this->General_model->show_data_id('country','','','get','');
       $data['category_title']=$data['catlist'][0]->name;
        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

        $c_id=$data['result'][0]->country;

        //$data['add_country']=$this->General_model->show_data_id('country',$c_id,'id','get','');

        $data['statelist']=$this->General_model->show_data_id('state',$c_id,'countryid','get','');

        $s_id=$data['result'][0]->state;

        $data['citylist']=$this->General_model->show_data_id('cities',$s_id,'state_id','get','');

        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$id,'lbcontact_id','get','');

        $c_id=$data['result'][0]->country;

        $data['add_country']=$this->General_model->show_data_id('country',$c_id,'id','get','');

        $state_id=$data['result'][0]->state;

        $data['add_state']=$this->General_model->show_data_id('state',$state_id,'sid','get','');

        $s_id=$data['add_state'][0]->sid;

        $city_id=$data['result'][0]->city;

        $data['add_city']=$this->General_model->show_data_id('cities',$city_id,'cid','get','');

        $cat_id=$data['result'][0]->cat_name;
        $sub_cat_id=$data['result'][0]->sub_cat;

        $data['category']=$this->General_model->show_data_id('category',$cat_id,'id','get','');

        $data['sub_category']=$this->General_model->show_data_id('subcategory',$sub_cat_id,'sid','get','');

    $data['cover_area']=$this->General_model->show_data_id('covering_area',$data['result'][0]->cover_area,'cov_id','get','');
        //$data['category']=$this->General_model->show_data_id('event_category','','','get','');
       //print_r($query);

    $data['val']=$this->General_model->show_data_id('delivery_location',$id,'post_id','get','');

        $data['title']="lbc || single ad";

        //echo "<pre>"; print_r($data); exit();

        $this->load->view('header',$data);

        $this->load->view('lbc_single_add');

        $this->load->view('footer');

    }

  function remove_company_location(){
 
      $id = $this->input->post('id');


      $query= $this->General_model->show_data_id('company_loaction',$id,'l_id','delete','');

      if($query){

        
        $this->session->set_flashdata('message', 'Location successfully Deleted');
      }


 }

    public function get_multiimage()

    {

         $event_id=$_POST['val2'];

         $id=$_POST['val'];

         $img=$this->General_model->show_data_id('module_lbcontacts_part',$id,'id','get','');  

        $path=base_url()."module_file/".$img[0]->multi_image;

        $query=$this->General_model->show_data_id('module_lbcontacts_part',$id,'id','delete','');

       

    if ($query){ 

            if (file_exists($path)){

            unlink("module_file/".$img[0]->multi_image);

     }

        $data['multiimage']=$this->General_model->show_data_id('module_lbcontacts_part',$event_id,'lbcontact_id','get','');  

        echo $tt= $this->load->view('get_multiimage',$data,true);

    }



  }



      public function edit_post($id)

    {
        $user_id=$this->session->userdata('front_sess')['userid'];

        //$this->form_validation->set_rules('title','Title','required');
        //$this->form_validation->set_rules('phone','Phone','required');
        //$this->form_validation->set_rules('email','Email','required');
        //$this->form_validation->set_rules('address','Address','required');
        //$this->form_validation->set_rules('country','Country','required');
        //$this->form_validation->set_rules('state','State','required');
        //$this->form_validation->set_rules('city','City','required');
        //$this->form_validation->set_rules('zipcode','Zipcode','required');
        $this->form_validation->set_rules('cat_name','Category','required');
        //$this->form_validation->set_rules('sub_cat','Sub-category','required');
        //$this->form_validation->set_rules('event_start_date','Event start date','required');
        //$this->form_validation->set_rules('event_end_date','Event end date','required');
        //$this->form_validation->set_rules('event_start_time','Event start time','required');
        //$this->form_validation->set_rules('event_end_time','Event end time','required');
        //$this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('search_keyword','Search keyword','required');
        //$this->form_validation->set_rules('contact_person','Contact person','required');
        


        if ($this->form_validation->run() == FALSE) 

        {

            $this->session->set_flashdata('error', 'Data  update failed');

          redirect('adslist/edit_ad?id='.base64_encode($id)); 



        }else{



if(!empty($_FILES['image1']['name'])){

 $new_name = time().$_FILES["image1"]['name'];

            $config = array(

                'upload_path' => "module_file/",

                'upload_url' => base_url() . "module_file/",

                'allowed_types' => "gif|jpg|png|jpeg",

                'file_name'=>$new_name

            );



            $this->load->library('upload', $config);

            $this->upload->do_upload("image1");

            //$datalist['img'] = $this->upload->data();



}else{



$new_name = $this->input->post('image_hid');

}

$featured_value=0;
            if(isset($_POST['featured'])){
                $featured_value=1;
            }

    $address =$_POST['address'].' '.$_POST['zipcode'];
          $prepAddr = str_replace(' ','+',$address);
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          $latitude = $output->results[0]->geometry->location->lat;
          $longitude = $output->results[0]->geometry->location->lng;

if($_POST['cat_name'] == 24){
  $title = $_POST['date_of_travel'].'_'.$_POST['depairport_code'].'_'.$_POST['arrival_date'].'_'.$_POST['arrairport_code'];
}else{ 
$title = $this->input->post('title');
}

            $datalist = array( 

                'title'      => $title,

                'phone'      => $this->input->post('phone'),

                'email'      => $this->input->post('email'),
                'contact_person'      => $this->input->post('contact_person'),

                'address'      => $this->input->post('address'),
                'landmark'      => $this->input->post('landmark'),
                'ads_lat'      => $latitude,
                'ads_long'      => $longitude,

                'cover_area'      => $this->input->post('cover_area'),

                'country'      => $this->input->post('country'),

                'state'      => $this->input->post('state'),

                'city'      => $this->input->post('city'),

                'cat_name'      => $this->input->post('cat_name'),               

                'sub_cat'     => $this->input->post('sub_cat'),

               'event_start_date'   => $this->input->post('event_start_date'),

               'event_frequency'     => $this->input->post('event_frequency'),

               // 'event_end_date'     => $this->input->post('event_end_date'),

                //'event_start_time'   => $this->input->post('event_start_time'),

                //'event_end_time'   => $this->input->post('event_end_time'),

                 'description'   =>$this->input->post('description'),
                 'search_keyword'   =>$this->input->post('search_keyword'),

                 'description_extra'      => $this->input->post('description_extra'),

                 'weblink'      => $this->input->post('weblink'),

                 'website'      => $this->input->post('website'),

                 'media_facebook'      => $this->input->post('media_facebook'),

                 'media_linkedin'      => $this->input->post('media_linkedin'),

                 'media_twitter'      => $this->input->post('media_twitter'),

                 'working_hour'      => $this->input->post('w_hour'),

                 'upload_file'   => $new_name,
                 'zipcode'      => $this->input->post('zipcode'),

                'post_status'        => 0,
                'updated_at'        => date("Y-m-d H:i:s"),
                'update_status'        => 1,

                //aco//

'furnishedType'      => $this->input->post('furnishedType'),
'accommodationType'      => $this->input->post('accommodationType'),
'roomType'      => $this->input->post('roomType'),
'sharingType'      => $this->input->post('sharingType'),
'gender'      => $this->input->post('gender'),
'bedRooms'      => $this->input->post('bedRooms'),
'toilets'      => $this->input->post('toilets'),
'floor'      => $this->input->post('floor'),
'liftAvailable'      => $this->input->post('liftAvailable'),
'petsAllowed'      => $this->input->post('petsAllowed'),
'utilitiesIncluded'      => $this->input->post('utilitiesIncluded'),
'availablefrom'      => $this->input->post('availablefrom'),
'monthlyrent'      => $this->input->post('monthlyrent'),
'currency'      => $this->input->post('currency'),
'accomPostedby'      => $this->input->post('accomPostedby'),
'noticePeriod'      => $this->input->post('noticePeriod'),
'advanceMonths'      => $this->input->post('advanceMonths'),
'roomDetails'      => $this->input->post('roomDetails'),
'terms'      => $this->input->post('terms'),
'bachelorsAllowed'      => $this->input->post('bachelorsAllowed'),
'area'      => $this->input->post('area'),
'date_of_travel'      => $this->input->post('date_of_travel'),//Date of Departure
'arrival_date'      => $this->input->post('arrival_date'),//Date of Arrival
'depairport_code'      => $this->input->post('depairport_code'),//Departure Airport Code
'arrairport_code'      => $this->input->post('arrairport_code'),//Arrival Airport Code
'active'      => $this->input->post('active'),

'institution'      => $this->input->post('institution'),
'tution_mode'      => $this->input->post('tution_mode'),
                //aco//
'jobType'      => $this->input->post('jobType'),
'employnentType'      => $this->input->post('employnentType'),
'companyName'      => $this->input->post('companyName'),
'cOMPANY_JOB_ID'      => $this->input->post('cOMPANY_JOB_ID'),
'jOBLINK'      => $this->input->post('jOBLINK'),
'jobEXPERIENCE'      => $this->input->post('jobEXPERIENCE'),
'POSITION_OPEN_TILl'      => $this->input->post('POSITION_OPEN_TILl')

            );

            

        

        $query= $this->General_model->show_data_id('module_lbcontacts',$id,'lbcontactId','update',$datalist);

//-------------curse add----------------//



if($_POST['cat_name'] == 21){


$courseId = $this->input->post('courseId');
$course_header = $this->input->post('course_header1');

$course_cat = $this->input->post('course_cat1');

$video_llink = $this->input->post('video_llink1');

$duration = $this->input->post('duration1');

$course_content = $this->input->post('course_content1');

$details = $this->input->post('details1');

for($i=0; $i<count($course_header); $i++){
$courseId1 = $courseId[$i];
    $datalist5 = array( 

                'course_header'        => $course_header[$i],

                'course_cat'    => $course_cat[$i],

                'video_llink'          => $video_llink[$i],

                'duration'   => $duration[$i],

                'course_content'          => $course_content[$i],

                'details'          => $details[$i]

            );

$this->General_model->show_data_id('courses',$courseId1,'id','update',$datalist5);


}




}











if($_POST['cat_name'] == 21){



$course_header = $this->input->post('course_header');

$course_cat = $this->input->post('course_cat');

$video_llink = $this->input->post('video_llink');

$duration = $this->input->post('duration');

$course_content = $this->input->post('course_content');

$details = $this->input->post('details');

for($i=0; $i<count($course_header); $i++){

    $datalist3 = array( 

                'institution_id'        => $id,

                'course_header'        => $course_header[$i],

                'course_cat'    => $course_cat[$i],

                'video_llink'          => $video_llink[$i],

                'duration'   => $duration[$i],

                'course_content'          => $course_content[$i],

                'details'          => $details[$i]

            );

$this->General_model->show_data_id('courses','','','insert',$datalist3);


}





}
//--------------course add-------------//


        
////////////////delivery location//////////////

if(count($this->input->post('location'))>0 ){  

$file_tmp1 = $this->input->post('location');

$attr_price = $this->input->post('location_land');

for($i=0; $i<count($file_tmp1); $i++){
    $address_act = $file_tmp1[$i];
    $address_mark = $attr_price[$i];
    if($address_act){
     $address =$address_act;
          $prepAddr = str_replace(' ','+',$address);
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          $latitude = $output->results[0]->geometry->location->lat;
          $longitude = $output->results[0]->geometry->location->lng;



    $datalist3 = array( 

                'address'        => $file_tmp1[$i],

                'dl_land_mark'    => $attr_price[$i],
                'dl_lat'        => $latitude,

                'dl_long'    => $longitude,

                'post_id'   => $id

            );

$this->General_model->show_data_id('delivery_location
','','','insert',$datalist3);
}


}

}



////////////////delivery location//////////////

    $this->session->set_flashdata('message', 'Data successfully updated');



        $filename = $_FILES['upload_img']['name'];

        $file_tmp = $_FILES['upload_img']['tmp_name'];

        $filetype = $_FILES['upload_img']['type'];

        $filesize = $_FILES['upload_img']['size'];





        if($query==true){



        for($i=0; $i<count($file_tmp); $i++){

            

        if(!empty($file_tmp[$i])){



        $_FILES['file']['name']     = $_FILES['upload_img']['name'][$i];

        $_FILES['file']['type']     = $_FILES['upload_img']['type'][$i];

        $_FILES['file']['tmp_name'] = $_FILES['upload_img']['tmp_name'][$i];

        $_FILES['file']['error']     = $_FILES['upload_img']['error'][$i];

        $_FILES['file']['size']     = $_FILES['upload_img']['size'][$i];







        $arr=getimagesize($file_tmp[$i]);

        $userfile_extn = end(explode(".", strtolower($filename[$i])));

        if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){

        $tmp_name = $file_tmp[$i];

        $name = time()."_".$filename[$i];

        //move_uploaded_file($tmp_name,"http://localhost/new_ciadmin/uploads/".$name);

        $config = array(

                'upload_path' => "module_file/",

                'upload_url' => base_url() . "module_file/",

                'allowed_types' => "gif|jpg|png|jpeg|mp3",

                'file_name'=>$name

            );



            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            $this->upload->do_upload('file');

        $image_nm = $name;



        $datalist2 = array( 

                        'lbcontact_id'      => $id,

                        'multi_image'   => $image_nm,

                        

                    );

        //$db->insertDataArray(DTABLE_EVENT_IMG,$_POST);

        $this->General_model->show_data_id('module_lbcontacts_part','','','insert',$datalist2);

        }else{



        $msg="Picture's must be .jpeg/.jpg/.png/.gif please check extension";

         $this->session->set_flashdata('error_msg', $msg);

        }

        }

        else{

        $msg="Please select some images...";

        //$this->session->set_flashdata('error_msg', $msg);

        }

        }

        }



          redirect('adslist/edit_ad?id='.base64_encode($id)); 

        }

         

    }

public function change_adstatus()

    {
        $user_id=$this->session->userdata('front_sess')['userid'];
        
    $adsid=$this->input->post('ads');
    $adst=$this->input->post('st');
    $get_data=$this->General_model->show_data_id('module_lbcontacts',$adsid,'lbcontactId','get','');
    
    if($get_data[0]->adstatus_byuser==0){
        $ads_status=1;
    }else{
        $ads_status=0;
    }
    
    
    
    
if($get_data[0]->user_id==$user_id){
    
    
    $datalist = array( 

                        'adstatus_byuser'      => $ads_status,

                    );
    $query= $this->General_model->show_data_id('module_lbcontacts',$adsid,'lbcontactId','update',$datalist);
    if($query){
        echo "success";
    }else{
        echo "wrong";
    }
    
}else{
    echo "wrong";
}


    }


function add_company(){


        $datalist2 = array( 

                        'company_name'      => $this->input->post('company_name'),

                        'company_link'      => $this->input->post('company_link'),

                        'industry_id'      => $this->input->post('industry_id'),

                        'user_id'      =>  $user_id=$this->session->userdata('front_sess')['userid']

                    );


        $query=$this->General_model->show_data_id(' company','','','insert',$datalist2);

        if($query){



////////////////Company location//////////////

if(count($this->input->post('location'))>0 ){  

$file_tmp1 = $this->input->post('location');

$location_land = $this->input->post('location_land');

for($i=0; $i<count($file_tmp1); $i++){
    $address_act = $file_tmp1[$i];
    $address_mark = $attr_price[$i];
    if($address_act){
     $address =$address_act;
          $prepAddr = str_replace(' ','+',$address);
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          $latitude = $output->results[0]->geometry->location->lat;
          $longitude = $output->results[0]->geometry->location->lng;



    $datalist3 = array( 

                'location'        => $file_tmp1[$i],

                'location_landmark'    => $location_land[$i],

                'dl_lat'        => $latitude,

                'dl_long'    => $longitude,

                'company_id'   => $query

            );

$this->General_model->show_data_id('company_loaction','','','insert',$datalist3);
}


}

}



////////////////Company location//////////////








          $this->session->set_flashdata('message', 'Company Details successfully Deleted');
          redirect('company');
        }else{
         $this->session->set_flashdata('eror_msg', 'Company Details Not saved');
         redirect('company');
        }

}




function edit_company($id){


        $datalist2 = array( 

                        'company_name'      => $this->input->post('company_name'),

                        'company_link'      => $this->input->post('company_link'),

                        'industry_id'      => $this->input->post('industry_id'),

                        'user_id'      =>  $user_id=$this->session->userdata('front_sess')['userid']

                    );


        $query=$this->General_model->show_data_id(' company',$id,'id','update',$datalist2);

        if($query){



////////////////Company location//////////////

if(count($this->input->post('location'))>0 ){ 

$file_tmp1 = $this->input->post('location');

$location_land = $this->input->post('location_land');

for($i=0; $i<count($file_tmp1); $i++){
    $address_act = $file_tmp1[$i];
    $address_mark = $attr_price[$i];
    if($address_act){
     $address =$address_act;
          $prepAddr = str_replace(' ','+',$address);
          $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4');
          $output= json_decode($geocode);
          $latitude = $output->results[0]->geometry->location->lat;
          $longitude = $output->results[0]->geometry->location->lng;



    $datalist3 = array( 

                'location'        => $file_tmp1[$i],

                'location_landmark'    => $location_land[$i],

                'dl_lat'        => $latitude,

                'dl_long'    => $longitude,

                'company_id'   => $query

            );

$this->General_model->show_data_id('company_loaction','','','insert',$datalist3);
}


}

}



////////////////Company location//////////////








          $this->session->set_flashdata('message', 'Company Details successfully Updated');
          redirect('company');

        }else{
         $this->session->set_flashdata('eror_msg', 'Company Details Not saved');
         redirect('company');
        }

}









	
}

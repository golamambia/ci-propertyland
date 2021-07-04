<?php
error_reporting(0);
$user_ip =$_SERVER['REMOTE_ADDR']; 
   
$geo =  unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip) );
//print_r($geo);
 //echo $output= $geo['geoplugin_countryName'];
 
                $allcountry=allCountry();
      $user_data=$this->General_model->show_data_id('user_table',$this->session->userdata('front_sess')['userid'],'id','get','');        
?>
<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title;?></title>

     <link rel="icon" href="<?php echo base_url();?>assets_front/images/favicon.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" type="text/css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" type="text/css">
    <!-- Bootstrap -->

    <link href="<?php echo base_url();?>assets_front/css/bootstrap.min.css" rel="stylesheet">
 
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_front/css/slick.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_front/css/slick-theme.css">

    <link href="<?php echo base_url();?>assets_front/css/icofont.min.css" rel="stylesheet">

     <link href="<?php echo base_url();?>assets_front/css/range.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets_front/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets_front/css/responsive.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css'>
   


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<!-- <script src="https://maps.google.com/maps/api/js?sensor=true"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4&sensor=false&libraries=places"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvEFtcY6tsbTnqB7xe8enKEXUVaB_qHV4"></script> -->
      
      
<link rel="stylesheet" href="<?php echo base_url();?>assets_front/css/popup.css">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://demos.jquerymobile.com/1.4.2/css/themes/default/jquery.mobile-1.4.2.min.css"> 

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> 

</head>



<body >



 <!-- header css Start -->

    <header class="header-wrap clearfix">

      <div class="container clearfix">

       <div class="header-left">

             <div class="logo">
<!-- 
               <a href="<?=base_url();?>"><img src="<?php echo base_url();?>assets_front/images/logo.png" alt="logo" title=""></a> -->
    

                <a href="<?=base_url();?>"><img  src="<?=base_url();?>uploads/logo/logo1.png" alt="logo" title=""></a> 

             </div>

             <div class="autolocation">

              <img src="<?php echo base_url();?>assets_front/images/locetion.png" alt="">
                
                <select class="form-control" id="countries">
                    <?php foreach($allcountry as $countrydata){?>
                     <option <?php if(strtoupper($geo['geoplugin_countryCode'])==$countrydata->countrycode){echo"selected";}?> value="<?=strtoupper($countrydata->countrycode);?>" ><?=$countrydata->countryname;?></option>
                     <?php }?>
                     </select>

             </div>

         </div>

         <div class="header-right clearfix">

            <nav class="menubox">

                    <a class="btn-topmenu d-lg-none" href="javascript:void(0)"><i class="fa fa-bars" aria-hidden="true"></i></a>

                    <div class="top-menu">

                        <a class="btn-topmenu-close d-lg-none" href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>

                        <ul>

                            <li class="current-menu-item"><a href="<?=base_url();?>"><img src="<?php echo base_url();?>assets_front/images/home.png" alt=""></a></li>

                            <li><a href="javascript:void(0)">About Us</a></li>

                            <li><a href="javascript:void(0)">Help Support</a></li>

                            

                       </ul>

                    </div>

               </nav>

               <div class="header_menuright">

                  <ul>

                    <?php if($this->session->userdata('log_check')!=1){?>

                     <li><a href="<?=base_url();?>register" class="btn btn-outline-info">Sign up</a></li>

                     <li><a href="<?=base_url();?>register/login" class="btn btn-primary">Login</a></li>

                 <?php }else{?>
                     <li><a href="<?=base_url();?>payment" class="btn btn-primary">Payment</a></li>
                    <li><a href="<?=base_url();?>dashboard" class="btn btn-primary">Dashboard</a></li>
                    <li><a href="<?=base_url();?>dashboard/logout" class="btn btn-primary">Logout</a></li>
                    <li><a href="<?=base_url();?>profile" class="btn btn-primary"><?=ucfirst($user_data[0]->name);?></a></li>


                 <?php }?>

                  </ul>

               </div>

         </div>

      </div>

    </header>

<!-- header css stop -->
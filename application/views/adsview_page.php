<style type="text/css">
  .modal-backdrop {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
}
.footer_wizget ul li a i {
    line-height: 36px !important;
    }
</style>
<?php
error_reporting(0);
$user_ip =$_SERVER['REMOTE_ADDR']; 
   
$geo =  unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $user_ip) );
//print_r($geo);
 //echo $output= $geo['geoplugin_countryName'];
 
                $allcountry=allCountry();
              
?>
<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta property="og:image" itemprop="image" content="<?=base_url();?>uploads/module_file/<?=$ads_view[0]->ppt_main_img;?>" />
    <meta  property="og:title" content="<?=$ads_view[0]->ppt_title;?>"  >
    <meta property="og:image:url" itemprop="image" content="<?=base_url();?>uploads/module_file/<?=$ads_view[0]->ppt_main_img;?>" />
    <meta property="og:description" content="" />


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?=$ads_view[0]->ppt_title;?>" />
    
    <meta name="twitter:site" content="thelocalbrowse.com" />
    <meta name="twitter:image" content="<?=base_url();?>uploads/module_file/<?=$ads_view[0]->ppt_main_img;?>" />
    <meta name="twitter:image:width" content="610" />
    <meta name="twitter:image:height" content="610" />

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
                    <li><a href="<?=base_url();?>profile" class="btn btn-primary"><?=$this->session->userdata('front_sess')['name'];?></a></li>


                 <?php }?>

                  </ul>

               </div>

         </div>

      </div>

    </header>

<!-- header css stop -->


<!-- banner css Start -->
<style type="text/css">
.star-rating {
  line-height:32px;
  font-size:1.25em;
  cursor: pointer;
}

.star-rating .fa-star{color: #e53935;}
.star-rating span.fa-star.hover > .star-rating .fa-star {
  color:#FFCC36;
}
</style>
    <?php
    $this->load->view('user_page_banner');
    ?>
        <div class="container">
            <div class="inner_banner_contant">
                <h2><?=$ads_view[0]->ppt_title;?> <div class="reating"><!-- <span><?=$avg_review;?></span><i class="fa fa-star" aria-hidden="true"></i> --> <a href="#" class="verifi">
                    <?php if($ads_view[0]->ppt_verifiedBy==1){?><img src="<?php echo base_url();?>assets_front/images/verifide.png" alt="" />VERIFIDE <?php }else{echo"NOT VERIFIED";}?></a></div></h2>
                <h3>Property Location -</h3>
                <h3><?=$ads_view[0]->ppt_property_address;?></h3>
                <?php if($ads_view[0]->ppt_landmark){?>
                <h3>Landmark -</h3>
                <h3><?=$ads_view[0]->ppt_landmark;?></h3>
            <?php }?>

<?php 

$currentURL = current_url(); 
$params = $_SERVER['QUERY_STRING']; 
$fullURL = $currentURL . '?' . $params; 

?>
<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>


<div class="social-share-btns clearfix mt-2">
                                <a class="share-btn share-btn-twitter" href="http://www.twitter.com/intent/tweet?url=<?php echo urlencode($actual_link); ?>&text=<?=$ads_view[0]->ppt_title;?>" target="_blank"><i class="fa fa-twitter"></i></a>
<a class="share-btn share-btn-facebook"  href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($fullURL); ?>&t=<?=$ads_view[0]->ppt_title;?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a class="share-btn share-btn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=http://developer.linkedin.com&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>

<a style="background-color: #0fcc26;" class="share-btn share-btn-linkedin" href="https://api.whatsapp.com/send?text=<?php echo urlencode($actual_link); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>                                
                                
                              </div>


                <ul>
                    <?php if($ads_view[0]->contact_mode=='any' || $ads_view[0]->contact_mode=='phone'){?>
                    <li><a  href="tel:?=$ads_view[0]->phone;?>"><i class="fa fa-phone" aria-hidden="true"></i><?=$ads_view[0]->phone;?></a></li><?php }  if($ads_view[0]->contact_mode=='any' || $ads_view[0]->contact_mode=='email'){?>
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><?=$ads_view[0]->email;?></a></li><?php }?>
                </ul>
                <div class="right_area">
                    <?php if($this->session->userdata('log_check')!=1){?>
                         <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="btn-right favourite <?php if($favourite_check){echo"btn_orange";}?>"><i class="fa fa-star-o" aria-hidden="true"></i> Favourite</a>
                         <?php }else{ if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){?>
                    <button class="btn-right favourite <?php if($favourite_check){echo"btn_orange";}?>"><i class="fa fa-star-o" aria-hidden="true"></i> Favourite</button>
                    <?php }}
                    if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){
                    ?>
                    <a class="btn-right" href="javascript:void(0);" id="report_error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report Error</a><?php }?>
                   <!--  <a class="btn-right"  href="tel:?=$ads_view[0]->phone;?>"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> -->
                   <!--  <button class="btn-right btn_orange"><i class="fa fa-clone" aria-hidden="true"></i> Get A Quote</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- banner css stop -->

    <!-- main_area css Start -->
    <div class="main_area" style="background-image:url(<?php echo base_url();?>assets_front/images/main_bg.jpg);">
        <div class="container">
            <div class="main_area_innerbox details_area">
                <div class="row">
                    <div class="col-lg-8">
                        <article class="article_area">
                            <div class="listing_box_area dtles">
                              <div class="about-manu">
                                 <ul>

<li class="d-inline"><a href="#one">PROPERTY INFO</a></li>


                                   <!--  <li class="d-inline"><a href="#two">Comment</a></li> -->
<li class="d-inline"><a href="#three">CONTACT INFO</a></li>
<?php 

if($this->session->userdata('front_sess')['user_type']=='agent'){?>
<li class="d-inline"><a href="#two">AGENTS TAGGED</a></li>

<?php }?>
<?php 

if($this->session->userdata('front_sess')['userid']==$ads_view[0]->ppt_createdBy){?>
<li class="d-inline"><a href="#two_own">OWNER SECTION</a></li>

<?php }?>


                                    

                                 </ul>
                                 </div>
                                <div class="image_box_area">
                                    <div class="row row-8">
                                        <div class="col-lg-8">
<?php if($ads_view[0]->ppt_main_img!=''){ ?>
                                <a href="#gallery-4"  class="btn-gallery">
                                           <!--  <a href="<?=base_url();?>uploads/module_file/<?=$ads_view[0]->ppt_main_img;?>" data-fancybox="images" data-caption="My caption"> -->

                                            <div class="image_box_left">
                                                <img src="<?=base_url();?>uploads/module_file/<?=$ads_view[0]->ppt_main_img;?>" alt="img" title="" />
                                               <!-- <div class="hover">
                                                    <a href="images/big1.jpg" data-fancybox="images" data-caption="My caption"><img src="images/hover.png"></a>
                                                </div>-->
                                            </div></a>

<?php } ?>

                                        </div>

                                        <div class="col-lg-4">
                                          <?php 
$img_multi=count($multiimage);
if($img_multi!=0){
                                          ?>

                                           <a href="<?php echo base_url();?>uploads/module_file/<?=$multiimage[0]->multi_image;?>" data-fancybox="images" data-caption="My caption"> 
                                           <div class="image_box_right">
                                                <img src="<?php echo base_url();?>uploads/module_file/<?=$multiimage[0]->multi_image;?>" alt="img" title="" />
                                             </div></a>

                                             <?php 
                                               }
                                             if($img_multi>1){?>

                                            <div class="image_box_right">
                                                <img src="<?php echo base_url();?>uploads/module_file/<?=$multiimage[1]->multi_image;?>" alt="img" title="" />
                                                <div class="hover">
                                                    <a href="#gallery-4" class="btn-gallery">
                                                    <img src="<?php echo base_url();?>assets_front/images/hover.png"><span>view more</span>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php }?>


                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div id="gallery-4" class="hidden">
                                        <a href="<?=base_url();?>uploads/module_file/<?=$ads_view[0]->ppt_main_img;?>" /></a>
                                    <?php 
                                   
               foreach ($multiimage as $key => $row_rec) {
             
               ?>

<a href="<?=base_url();?>uploads/module_file/<?PHP echo $row_rec->multi_image;?>" /></a>

         <?php } ?>
 
                                      
                                   </div>

                                </div>







                         
                                
                                <div class="box_area" id="one">
                                    <div class="heading_area">
                                        <h3><strong>Property information</strong></h3>
                                    </div>
                                    <div class="box_details">
                                                        
<div class="row">
    <div class="col-lg-4">
<h4>Property For</h4>
<p><?=$ads_view[0]->ppt_property_for; ?></p>
</div>
<div class="col-lg-4">
<h4>Property Type</h4>
<p><?=$ads_view[0]->ppt_property_type; ?></p>
</div>
<div class="col-lg-4">
<h4>Property Cagatogy*</h4>
<p><?=$ads_view[0]->ppt_property_category; ?></p>
</div>
<?php if($ads_view[0]->ppt_property_category=='individual'){?>
<div class="col-lg-6">
<h4>Land Area*</h4>
<p><?=$ads_view[0]->ppt_land_area; ?></p>
</div>

<div class="col-lg-6">
<h4>Land Units*</h4>
<p><?=$ads_view[0]->ppt_land_unit; ?></p>
</div>



<div class="col-lg-6">
<h4>Facing*</h4>
<p><?=$ads_view[0]->ppt_facing; ?></p>
</div>
<?php  if($ads_view[0]->ppt_property_type=='apartment_flat' || $ads_view[0]->ppt_property_type=='house_villa'){?>

<div class="col-lg-6">
<h4>Built-Up Area*</h4>
<p><?=$ads_view[0]->ppt_builtup_area; ?></p>
</div>

<div class="col-lg-6">
<h4>Built-up Units*</h4>
<p><?=$ads_view[0]->ppt_builtup_unit; ?></p>
</div>

<div class="col-lg-6">
<h4>Carpet Area*</h4>
<p><?=$ads_view[0]->ppt_carpet_area; ?></p>
</div>

<div class="col-lg-6">
<h4>Carpet Units*</h4>
<p><?=$ads_view[0]->ppt_carpet_unit; ?></p>
</div>

<div class="col-lg-6">
<h4>Bedrooms Count*</h4>
<p><?=$ads_view[0]->ppt_bedroom_count; ?></p>
</div>

<div class="col-lg-6">
<h4>Bathrooms Count*</h4>
<p><?=$result[0]->ppt_bathroom_count; ?></p>
</div>

<div class="col-lg-6">
<h4>Floor Number*</h4>
<p><?=$result[0]->ppt_floor_number; ?></p>
</div>


<div class="col-lg-6">
<h4>Furnishing*</h4>
<p><?=$ads_view[0]->ppt_furnishing; ?></p>
</div>

<div class="col-lg-6">
<h4>4Wheeler Parking Count</h4>
<p><?=$ads_view[0]->ppt_4wheeler_count; ?></p>
</div>

<div class="col-lg-6">
<h4>2Wheeler Parking Count</h4>
<p><?=$ads_view[0]->ppt_2wheeler_count; ?></p>
</div>
<?php } }?>

<div class="col-lg-6">
<h4>Website</h4>
<?php if($ads_view[0]->ppt_website){?>
<p style="overflow-wrap: break-word;" ><a target="_blank" href="<?=$ads_view[0]->ppt_website; ?>">Click here</a></p>
<?php }?>
</div>

<div class="col-lg-6">
<h4>Posted on</h4>
<p><?=$ads_view[0]->ppt_createdAt; ?></p>
</div>

<div class="col-lg-6">
<h4>Price*</h4>
<p><?=$ads_view[0]->ppt_total_price; ?></p>
</div>

<div class="col-lg-6">
<h4>Available From*</h4>
<p><?=$ads_view[0]->ppt_available_from; ?></p>
</div>
</div>
                                        <br><br>
                                       <h4> Property Details</h4>
                                    <?=$ads_view[0]->ppt_details;?>
                                    
                                     </div>
                                </div>



                                
                                <div class="box_area" id="three">
                                    <div class="heading_area">
                                        <h3>Contact <strong>Information</strong></h3>
                                    </div>
                                    <div class="box_details">
                                        <h6>Contact Person<span><?=$ads_view[0]->name;?></span></h6>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6>Address<span><?=$ads_view[0]->ppt_property_address;?>


                                            </span></h6>
                                            </div>
                                           <?php if($ads_view[0]->contact_mode=='any' || $ads_view[0]->contact_mode=='email'){?>
                                            <div class="col-lg-6">
                                                <h6>Email<span><?=$ads_view[0]->email;?></span></h6>
                                            </div>
                                        <?php } if($ads_view[0]->contact_mode=='any' || $ads_view[0]->contact_mode=='phone'){?>
                                           <div class="col-lg-6">
                                                <h6>Phone<span><?=$ads_view[0]->phone;?></span></h6>
                                            </div>
                                           <?php }?>
                                        </div>
                                      
                                        
                                    </div>
                                </div>

                                
                                <?php 
                                if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){
                                    if($review_data[0]->rv_userid==$this->session->userdata('front_sess')['userid']){

                                ?>
                                <?php if($this->session->flashdata('error')){?>

                              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
                  </div>                           
                   <?php } if($this->session->flashdata('message')){?>
                    <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>

</div>

                   <?php }?>
                                <!-- <div class="box_area" id="two">
                                    <div class="heading_area">
                                        <h3>Update Your <strong>Review</strong></h3>
                                    </div>
                                    <div class="box_details">
                                        <p>Writing good r reviews may help others to detect places that can help everyone to find us easily</p>
                                       
                                    <form method="post" action="<?=base_url();?>adsview/update_review">
                                            <div class="row row-8">
                                                <input type="hidden" name="adsid" value="<?=base64_encode($review_data[0]->rv_adsid);?>" />
                                                <input type="hidden" name="rvid" value="<?=base64_encode($review_data[0]->rv_id);?>" />

<input type="hidden" name="tm_avrj_ratings" value="<?php echo $average_rating->rating_count; ?>">
<input type="hidden" name="tm_total_user" value="<?php echo $ratingCount_by_product; ?>">


                                                <div class="col-lg-12">
                                      <div class="star-rating">
                                        <span class="fa fa-star-o" data-rating="1"></span>
                                        <span class="fa fa-star-o" data-rating="2"></span>
                                        <span class="fa fa-star-o" data-rating="3"></span>
                                        <span class="fa fa-star-o" data-rating="4"></span>
                                        <span class="fa fa-star-o" data-rating="5"></span>
                                        <input type="hidden" name="rv_rate" class="rating-value" value="<?=$review_data[0]->rv_rate;?>">
                                      </div>
                                    </div>
                                                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" placeholder="Full Name" readonly />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="rv_message" placeholder="Write Review" required><?=$review_data[0]->rv_message;?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    
                                                        <button type="submit" class="btn btn-primary sub2">Update</button>
                                                         
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->

                            <?php }else{?>
<?php if($ads_view[0]->cat_name!=4 && $ads_view[0]->cat_name!=13){ ?>


                                <!-- <div class="box_area" id="two">
                                    <div class="heading_area">
                                        <h3>Write Your <strong>Reviews</strong></h3>
                                    </div>
                                    <div class="box_details">
                                        <p>Writing good r reviews may help others to detect places that can help everyone to find us easily</p>
                                       
                                    <form id="review_form">


<input type="hidden" name="tm_avrj_ratings" id="tm_avrj_ratings" value="<?php echo $average_rating->rating_count; ?>">
<input type="hidden" name="tm_total_user" id="tm_total_user" value="<?php echo $ratingCount_by_product; ?>">

                                            <div class="row row-8">
                                                <input type="hidden" name="adsid" value="<?=$_REQUEST['ads'];?>" />
                                                <div class="col-lg-12">
                                      <div class="star-rating">
                                        <span class="fa fa-star-o" data-rating="1"></span>
                                        <span class="fa fa-star-o" data-rating="2"></span>
                                        <span class="fa fa-star-o" data-rating="3"></span>
                                        <span class="fa fa-star-o" data-rating="4"></span>
                                        <span class="fa fa-star-o" data-rating="5"></span>
                                        <input type="hidden" name="rv_rate" class="rating-value" value="1">

                                      </div>
                                    </div>
                                                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" placeholder="Full Name" readonly />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="rv_message" placeholder="Write Review" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <?php if($this->session->userdata('log_check')!=1){?>
                                                    <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="btn btn-primary sub2">Submit</a>
                                                    <?php }else{?>
                                                        <button type="submit" class="btn btn-primary sub2">Submit</button>
                                                         <?php }?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->

<?php } ?>

                            <?php }}?>


<!-------------------review area----------------->


<!------------agent tagged------>
<?php 

if($this->session->userdata('front_sess')['user_type']=='agent'){?>
<div class="box_area" id="two">
                                    <div class="heading_area">
                                        <h3> <strong>Agents Tagged</strong></h3>
                                    </div>
                                    <div class="box_details">
                                        <?php
                                if($ads_view[0]->ppt_broker_need){

                                ?>
                                         <p style="    color: blue;
    font-size: 13px;
    font-weight: 700;">Owner Interested to Market this Property through  Agent . Agents can contact Owner for more information</p>
<?php }?>
                                         <table class="as shadow table" border="1">
                        <tbody><tr class="look">
                          
                          <th>Agent Tagged
                            
                           </th>

                          <th>Highest Bid Amount
                          
                           </th>
                          
                           
                        </tr>
                        <tr>
       
        <td><?=$maxbid_amount[0]->total_agent;?></td>
        <td><?=$maxbid_amount[0]->max_bid;?></td>
      </tr>

                      </tbody></table>
                       <form id="" action="<?=base_url('adsview/post_tagged_agent');?>" method="post">



                                            <div class="row row-8">
                                                <input type="hidden" name="ads_id" value="<?=$_REQUEST['ads'];?>" required>
                                                
                                                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <select class="form-control " name="tag_agent" required="">
                                                            <option value="">Select agent</option>
                                                            <option value="<?=$this->session->userdata('front_sess')['userid'];?>" selected><?=$this->session->userdata('front_sess')['name'];?></option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                 <div class="col-lg-5">
                                                    <label>Minimum amount to get tagged</label>
                                                    <div class="form-group">
                                                        
                                                       <select class="form-control " name="price_id2" required="">
                                                        <?php foreach ($minimum_price as $key => $value): ?>
                                                            <option value="<?=$value->price_id;?>"><?=$value->price;?></option>
                                                        <?php endforeach ?>
                                                            
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <label>Amount</label>
                                                    <div class="form-group">
                                                        <input style="height: 38px;" type="text" name="tag_amount" class="form-control numeric_input" maxlength="11" placeholder="Tagged amount" value="<?=$minimum_price[0]->price;?>" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-2" style="padding-top: 27px;">
                                                    <?php if($this->session->userdata('log_check')!=1){?>
                                                    <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="btn btn-primary tag_btn">Submit</a>
                                                    <?php }else{?>
                                                        <button type="submit" class="btn btn-primary tag_btn">Submit</button>
                                                         <?php }?>
                                                </div>
                                              
                                            </div>
                                        </form>
                                        <p>Tagged Agent are listed in the sorting order</p>
                                       
                              <table class="as shadow table" border="1">
                        <tbody><tr class="look">
                          <th>Sl.No
                          
                            </th>
                          <th>Agent
                            
                           </th>

                          <th>Bid Amount
                          
                           </th>
                          
                           
                        </tr>
                         <?php
                        foreach ($tagged_agent_list as $key => $tag_value) {
                            ?>
                        <tr>
        <td><?=$key+1;?></td>
        <td><?=$tag_value->name;?></td>
        <td><?=$tag_value->total_bid_amount;?></td>
      </tr>
  <?php }?>

                      </tbody></table>
                                    </div>
                                </div>
                            <?php }?>

<!------------agent tagged------>
<?php 

if($this->session->userdata('front_sess')['userid']==$ads_view[0]->ppt_createdBy){?>
<div class="box_area" id="two_own">
                                    <div class="heading_area">
                                        <h3> <strong>Owner section</strong></h3>
                                    </div>
                                    <div class="box_details">
                                    
                                         
                     <form id="" action="<?=base_url('adsview/post_extend_owner');?>" method="post">

                        <input type="hidden" name="ads_id" value="<?=$_REQUEST['ads'];?>" required>

                                            <div class="row row-8">
                                               
                                                        <div class="col-lg-3">
                                                    <label>Validity expires on</label>
                                                    <div class="form-group">
                                                        <input style="height: 38px;" type="text" name="" id="" class="form-control numeric_input" maxlength="11" placeholder="" value="<?=$ads_view[0]->ppt_valid_till;?>" required readonly/>
                                                    </div>
                                                </div>                         
                                               <div class="col-lg-9">
                                                   <label>Payment For</label>
                                                    <div class="form-group">
                                                        
                                                      <select class="form-control" id="price_id" name="price_id" required>
                                                        <option value="">Extend post</option>
                                                        <?php foreach ($post_charge_list as $key => $value) {?>
                                                            <option value="<?=$value->price_id;?>" ><?=$value->payment_text;?></option>
                                                            <?php 
                                                            }?>
                                                      </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label>Days</label>
                                                    <div class="form-group">
                                                        <input style="height: 38px;" type="text" name="tag_day" id="tag_day" class="form-control numeric_input" maxlength="11" placeholder="Days"  required readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Price</label>
                                                    <div class="form-group">
                                                        <input style="height: 38px;" type="text" name="tag_price" id="tag_price" class="form-control numeric_input" maxlength="11" placeholder="Price"  required readonly/>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-lg-3" style="padding-top: 27px;">
                                                    
                                                        <button type="submit" class="btn btn-primary tag_btn">Add to pay</button>
                                                         
                                                </div>
                                              
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php }?>


<!-------------------comment area----------------->
<?php 
if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->user_id){
if($ads_view[0]->cat_name==4 OR $ads_view[0]->cat_name==13 ){ ?>
<div class="box_area" id="two">
                                    <div class="heading_area">
                                        <h3>Write Your <strong>Comment</strong></h3>
                                    </div>
                                    <div class="box_details">
                                       
                                       
                                    <form id="comment_form">



                                            <div class="row row-8">
                                                <input type="hidden" name="ads_id" value="<?=$_REQUEST['ads'];?>" />
                                                
                                                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" placeholder="Full Name" readonly />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="comment" placeholder="Write Comment" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <?php if($this->session->userdata('log_check')!=1){?>
                                                    <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="btn btn-primary sub2">Submit</a>
                                                    <?php }else{?>
                                                        <button type="submit" class="btn btn-primary sub3">Submit</button>
                                                         <?php }?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

<?php } } ?>
<!-------------------comment area----------------->


<!------------------------------user review----------------------->
                              


<!------------------------------user review----------------------->








                            </div>


                        </article>
                    </div>

                    <div class="col-lg-4">
                        <aside class="aside_area">
                            <div class="aside_innerarea">
                               
                                <div class="aside_box">
                                    <h4>Our Location</h4>
                                    <div class="aside_body">
                                        <?php
                                     
                                          $addts=$ads_view[0]->ppt_property_address;  
                                        
                                        $address=str_replace(",", "", str_replace(" ", "+",$addts));
echo '<iframe width="" height="" frameborder="0" style="border:0;" allowfullscreen="" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' .$address. '&z=14&output=embed"></iframe>';

                                        ?>
                                       <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7774723.510965041!2d7.19826856760574!3d61.59229951227372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465cb2396d35f0f1%3A0x22b8eba28dad6f62!2sSweden!5e0!3m2!1sen!2sin!4v1576839434335!5m2!1sen!2sin" width="" height="" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
                                    </div>
                                </div>
                                <div class="aside_box">
                                    <h4>Agent tagged </h4>
                                    <div class="aside_body">
                                        <table class="as shadow table" border="1">
                        <tbody><tr class="look">
                          <th>Sl.No
                          
                            </th>
                          <th>Agent Name
                            
                           </th>

                          <th>Property Count
                          
                           </th>
                          
                           
                        </tr>
                         <?php
                        foreach ($tagged_agent_list as $key => $tag_value) {
                            ?>
                        <tr>
        <td><?=$key+1;?></td>
        <td><?=$tag_value->name;?></td>
        <td><?=$tag_value->agent_ppt_tag_cnt;?></td>
      </tr>
  <?php }?>

                      </tbody></table>
                                      
                                    </div>
                                </div>
                                <?php
                                if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->ppt_createdBy){

                                ?>
                                <div class="aside_box">
                                    <h4 class="msg_area" style="cursor: pointer;">Send Message</h4>

                                    <div id="msg_area">
                                    <form action="" method="post" id="quote_form">
                                    <div class="aside_body">
                                        <p>Provide your personal info </p>
                                        <div class="form-group">
                                            <input type="hidden" name="adsid" value="<?=$_REQUEST['ads'];?>" />
                                            <input type="text" name="qt_name" class="form-control" placeholder="Enter Your Name" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="qt_phone" class="form-control numeric_input" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['phone'] : '' ?>" placeholder="Enter Your Mobile No."  />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['email'] : '' ?>" name="qt_email" class="form-control" placeholder="Enter Your Email"  />
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="qt_sklang" class="form-control" placeholder="Speaking language"  />
                                        </div>
                                        <div class="form-group">
                                                        <textarea class="form-control" name="qt_message" placeholder="Write Message" required></textarea>
                                                    </div>
                                        <button type="submit" class="btn btn-primary sub">SEND</button>
                                    </div>
                                    </form>
                                </div>
                                    
                                </div>
                                <hr>
                            <?php }?>
                               <!--  <div class="box2">
                                    <div class="thumble_img_area">
                                        <img src="<?php echo base_url();?>assets_front/images/img1.jpg" alt="img" title="" />
                                    </div>
                                    <div class="contain_area">
<?php
if($ads_view[0]->user_photout!=''){  ?>
<img src="<?php //echo base_url();?>uploads/<?=$ads_view[0]->user_photout;?>" alt="member" title="" />

  <?php
}else{
?>

<img src="<?php //echo base_url();?>uploads/download.png" alt="member" title="" />
<?php
}
?>
                                        

                                        <h3><?=$ads_view[0]->nameut;?><span>Member since <?=date('F Y',strtotime($ads_view[0]->entry_dateut));?> </span></h3>
                                        <a  href="javascript:void(0)" class="btn btn-primary">Chat User</a>
                                    </div>
                                </div> -->
                                
                                <!-- <hr>
                                <div class="aside_box aside_box2">
                                    <h4>Listing Guarantee</h4>
                                    <div class="aside_body">
                                        <ul class="listing">
                                            <li>
                                                <img src="<?php echo base_url();?>assets_front/images/listing1.png" alt="" title="" />
                                                Service Guarantee
                                                <span>Upto 6 monts of service</span>
                                            </li>
                                            <li>
                                                <img src="<?php echo base_url();?>assets_front/images/listing2.png" alt="" title="" />
                                                Professionals
                                                <span>100% certified professionals</span>
                                            </li>
                                            <li>
                                                <img src="<?php echo base_url();?>assets_front/images/listing3.png" alt="" title="" />
                                                Discounts
                                                <span>30% discounts of each services</span>
                                            </li>
                                        </ul>
                                         
                                    </div>
                                </div> -->
                            </div>
                        </aside>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- main_area css stop -->
<!-- app_area css Start -->
  <div class="app_area p-6" style="background-image:url(<?php echo base_url();?>assets_front/images/footer_topbg.png);">
     <div class="container">
        <div class="row">
            <div class="col-lg-7">
              <div class="app_thumble">
                <img src="<?php echo base_url();?>assets_front/images/mobail.png" alt=""> 
              </div>
            </div>
            <div class="col-lg-5">
              <div class="app_contantbox">
                <h2>Looking for the Best Service Provider? <span>Get The App!</span></h2>
                <ul>
                   <li>Find nearby listings</li>
                   <li>Easy service enquiry</li>
                   <li>Listing reviews and ratings</li>
                </ul>
               <a class="appicon" href="#"><img src="<?php echo base_url();?>assets_front/images/googleplay.png" alt=""></a> 
               <a class="appicon" href="#"><img src="<?php echo base_url();?>assets_front/images/app_store.png" alt=""></a> 
              </div>
            </div>
        </div>
     </div>
  </div>
<!-- app_area css stop -->
        <?php
                if($this->session->userdata('log_check')){
                ?>
 <!-- report error modal start -->
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Report Error</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>
                </div>
                
                <!-- Mobiledal body -->
                <div class="modal-body">
                    <div class="contriner">
                       <form id="report_form">
                                            <div class="row row-8">
                                               
                            <div class="col-lg-6">
                               <div class="form-group">
                                            <input type="hidden" name="adsid" value="<?=$_REQUEST['ads'];?>" />
                                            <input type="text" class="form-control" placeholder="Your Name" value="<?=$this->session->userdata('front_sess')['name'];?>" readonly required />
                                        </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="text"  class="form-control numeric_input" placeholder="Your Mobile No." value="<?=$this->session->userdata('front_sess')['phone'];?>" readonly  />
                                        </div>
                            </div> -->
                            <!-- <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="email"  class="form-control" placeholder="Your Email" value="<?=$this->session->userdata('front_sess')['email'];?>" readonly  />
                                        </div>
                            </div> -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="text" name="rpt_subject" class="form-control" placeholder="Enter Your Subject" required />
                                        </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="rpt_message" placeholder="Your Comment" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary report_sub">Submit</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- report error modal stop -->

 <!-- report Complaint modal start -->
    <div class="modal fade" id="myModal3">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Report Complaint</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="contriner">
                        <form id="complaint_form">
                                            <div class="row row-8">
                                                <div class="col-lg-6">
                               <div class="form-group">
                                            <input type="hidden" name="adsid" value="<?=$_REQUEST['ads'];?>" />
                                            <input type="text" class="form-control" placeholder="Your Name" value="<?=$this->session->userdata('front_sess')['name'];?>" readonly required />
                                        </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="text"  class="form-control numeric_input" placeholder="Your Mobile No." value="<?=$this->session->userdata('front_sess')['phone'];?>" readonly  />
                                        </div>
                            </div> -->
                            <!-- <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="email"  class="form-control" placeholder="Your Email" value="<?=$this->session->userdata('front_sess')['email'];?>" readonly  />
                                        </div>
                            </div> -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="text" name="cmp_subject" class="form-control" placeholder="Enter Your Subject" required />
                                        </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="cmp_message" placeholder="Your Comment" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary complaint_sub">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- report Complaint modal stop -->


<?php } ?>








    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e){ 
            $("#msg_area").hide();
$(".msg_area").click(function(){
    $("#msg_area").toggle('slow');
  });

$(".chat_send").on('click',function(e){
                e.preventDefault();
                var message=$('#chat_message').val();
                 var adsid='<?=$_REQUEST['ads'];?>';
                if(message.trim()!=''){

                
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>message/post_message',
                    data:{adsid:adsid,chat_message:message.trim()},
                    //contentType: false,
                    cache: false,
                   
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             //$('#quote_form')[0].reset();
                         //swal("Okay!", "Message successfully send", "success");
                         $('#chat_message').val('');
                     }else if(html=='fail'){
                         swal("Sorry!", "Message failed to send", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }
                          //$('#quote_form').css("opacity","");
                        //$(".sub").removeAttr("disabled");
                    }
                });
                }else{
                    swal("Please", "Write somethinge", "error");
            }

            });
            
            function displayChat(){
        id = '<?=$_REQUEST['ads'];?>';
        $.ajax({
             url:'<?=base_url();?>message/fetch_message',
            type: 'POST',
            async: false,
            data:{
                id: id,
                fetch: 1,
            },
            success: function(response){
                $('.chat_converse').html(response);
                $(".chat_converse").scrollTop($(".chat_converse")[0].scrollHeight);
            }
        });
    }
        $("#complaint_form").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_complaint',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        $('.complaint_sub').attr('disabled','disabled');
                        $('#complaint_form').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             $('#complaint_form')[0].reset();
                              $("#myModal3").modal("hide");
                         swal("Okay!", "Message successfully send", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Message failed to send", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          $('#complaint_form').css("opacity","");
                        $(".complaint_sub").removeAttr("disabled");
                    }
                });

            });


        $("#report_form").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_report',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        $('.report_sub').attr('disabled','disabled');
                        $('#report_form').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             $('#report_form')[0].reset();
                              $("#myModal2").modal("hide");
                         swal("Okay!", "Message successfully send", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Message failed to send", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          $('#report_form').css("opacity","");
                        $(".report_sub").removeAttr("disabled");
                    }
                });

            });

            $("#quote_form").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_quote',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        $('.sub').attr('disabled','disabled');
                        $('#quote_form').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             $('#quote_form')[0].reset();
                         swal("Okay!", "Message successfully send", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Message failed to send", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          $('#quote_form').css("opacity","");
                        $(".sub").removeAttr("disabled");
                    }
                });

            });
             $("#bid_tagged_form").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_tagged_agent',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        $('.tag_btn').attr('disabled','disabled');
                        $('#bid_tagged_form').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             $('#bid_tagged_form')[0].reset();
                         swal("Okay!", "Agent tagged successfull", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Agent tagged failed", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          $('#bid_tagged_form').css("opacity","");
                        $(".tag_btn").removeAttr("disabled");
                    }
                });

            });

            $("#review_form").on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_review',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        $('.sub2').attr('disabled','disabled');
                        $('#review_form').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             $('#review_form')[0].reset();
                         swal("Okay!", "Review successfully post", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Review failed to post", "error");
                     }else if(html=='user'){
                         swal("Sorry!", "This is your ad , you cant do", "error");
                     }else if(html=='multiple'){
                         swal("Sorry!", "Multiple review not available", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          $('#review_form').css("opacity","");
                          $(".sub2").removeAttr("disabled");
                          window.location.reload();
                    }
                });

            });



            $("#comment_form").on('submit',function(e){

              //alert(1);

                e.preventDefault();
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_comment',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        //$('.sub2').attr('disabled','disabled');
                        $('#comment_form').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        //alert(html);
                        if(html=='success'){
                            
                         swal("Okay!", "Comment successfully post", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Comment failed to post", "error");
                     }else if(html=='user'){
                         swal("Sorry!", "This is your ad , you cant do", "error");
                     }else if(html=='multiple'){
                         swal("Sorry!", "Multiple review not available", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          //$('#comment_form').css("opacity","");
                          //$(".sub2").removeAttr("disabled");
                          window.location.reload();
                    }
                });

            }); 

            

            $('.favourite').click(function(e){
                var val='<?=$_REQUEST['ads'];?>';
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_favourite',
                    data:{fv_adsid:val},
                    cache:false,
                    success:function(response){
                        //alert(1);
                        //console.log(response);
                         var html=response.trim();
                        if(html=='success'){
                             
                         swal("Okay!", "Added successfully", "success");
                          $('.favourite').addClass("btn_orange");
                     }else if(html=='fail'){
                         swal("Sorry!", "Failed to add", "error");
                     }else if(html=='del'){
                             
                         swal("Okay!", "Removed successfully", "success");
                          $('.favourite').removeClass("btn_orange");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                      
                            }
                });
            });
             

            var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();




        });

    </script>
     <script type="text/javascript">
        $(document).ready(function(e){ 
            

$("#payment_type_id").on('change',function(e){
                e.preventDefault();
                $('#price_id').children('option:not(:first)').remove();
                 var payment_type_id=$("#payment_type_id").val();
                 $("#tag_day").val('');
                 $("#tag_price").val('');
                                
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>payment/getPriceList',
                    data:{payment_type_id:payment_type_id},
                    //contentType: false,
                     dataType : 'json',
                    cache: false,
                   
                    success:function(response){
                        //console.log(response);
                        var html=response;
                        if(html.status=='success'){
                          var len = html.list.length;
                             var select = document.getElementById("price_id");
                var options = [];
                  var option = document.createElement('option');
                     
                           for (var i = 0; i < len; ++i)
            {
                //var data = '<option value="' + escapeHTML(i) +'">" + escapeHTML(i) + "</option>';
                option.text = response.list[i].payment_text;
                option.value = response.list[i].price_id;
                options.push(option.outerHTML);
            }

            select.insertAdjacentHTML('beforeEnd', options.join('\n'));

                     }
                          //$('#quote_form').css("opacity","");
                        //$(".sub").removeAttr("disabled");
                    }
                });
                

            });

          $("#price_id").on('change',function(e){
                e.preventDefault();
                
                 var price_id=$("#price_id").val();
                                
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>payment/getPriceData',
                    data:{price_id:price_id},
                    //contentType: false,
                     dataType : 'json',
                    cache: false,
                   
                    success:function(response){
                        //console.log(response);
                       
                        if(response.status=='success'){
                         $("#tag_day").val(response.day);
                 $("#tag_price").val(response.amount);

                     }else{
                      $("#tag_day").val(response.day);
                 $("#tag_price").val(response.amount);
                     }
                         
                    }
                });
                

            });



 });
            </script>
<script>
        hideChat(0);

        $('#prime').click(function() {
            //alert(1);
            toggleFab();
        });
        //Toggle chat and links
        function toggleFab() {
            $('.prime').toggleClass('zmdi-comment-outline');
            $('.prime').toggleClass('zmdi-close');
            $('.prime').toggleClass('is-active');
            $('.prime').toggleClass('is-visible');
            $('#prime').toggleClass('is-float');
            $('.chat').toggleClass('is-visible');
            $('.fab').toggleClass('is-visible');

        }
        $('#chat_first_screen').click(function(e) {
            hideChat(1);
        });
        function hideChat(hide) {
            switch (hide) {
                case 0:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'block');
                    $('.chat_fullscreen_loader').css('display', 'none');
                    $('#chat_fullscreen').css('display', 'none');
                    break;
                case 1:
                    $('#chat_converse').css('display', 'block');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    break;
                case 2:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'block');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    break;
                case 3:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'block');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    break;
                case 4:
                    $('#chat_converse').css('display', 'none');
                    $('#chat_body').css('display', 'none');
                    $('#chat_form').css('display', 'none');
                    $('.chat_login').css('display', 'none');
                    $('.chat_fullscreen_loader').css('display', 'block');
                    $('#chat_fullscreen').css('display', 'block');
                    break;
            }
        }

    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php if($this->session->flashdata('success')){?>

                            <script>
                                swal({
                                    title: "Done",
                                    text: "<?php echo $this->session->flashdata('success'); ?>",
                                    //timer: 5000,
                                    icon: "success",
                                    button: "ok",
                                    type: 'success'

                                });
                            </script>

     <?php } ?>

        <?php if($this->session->flashdata('error')){ ?>
        
        <script>
        swal({
        title: "Error",
        text: "<?php echo $this->session->flashdata('error'); ?>",
        //timer: 5000,
        icon: "error",
        button: "ok",
        type: 'error'
        
        });
        </script>
        
        <?php } ?>
       
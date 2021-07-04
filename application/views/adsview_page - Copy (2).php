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


                <a href="<?=base_url();?>"><img  src="https://thelocalbrowse.com/uploads/logo/logo1.png" alt="logo" title=""></a> 

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
                <h2><?=$ads_view[0]->title;?> <div class="reating"><span><?=$avg_review;?></span><i class="fa fa-star" aria-hidden="true"></i> <a href="#" class="verifi">
                    <?php if($ads_view[0]->post_status==1){?><img src="<?php echo base_url();?>assets_front/images/verifide.png" alt="" />VERIFIDE <?php }else{echo"NOT VERIFIED";}?></a></div></h2>
                <h3>Express Avenue Mall, Santa Monica</h3>
                <h3><?=$ads_view[0]->address;?></h3>

<?php 

$currentURL = current_url(); 
$params = $_SERVER['QUERY_STRING']; 
$fullURL = $currentURL . '?' . $params; 

?>
<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>


<div class="social-share-btns clearfix mt-2">
                                <a class="share-btn share-btn-twitter" href="http://www.twitter.com/intent/tweet?url=<?php echo urlencode($actual_link); ?>&text=<?=$ads_view[0]->title;?>" target="_blank"><i class="fa fa-twitter"></i></a>
<a class="share-btn share-btn-facebook"  href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($fullURL); ?>&t=<?=$ads_view[0]->title;?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a class="share-btn share-btn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=http://developer.linkedin.com&title=LinkedIn%20Developer%20Network&summary=My%20favorite%20developer%20program&source=LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>

<a style="background-color: #0fcc26;" class="share-btn share-btn-linkedin" href="https://api.whatsapp.com/send?text=<?php echo urlencode($actual_link); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>                                
                                
                              </div>









                <ul>
                    <li><a  href="tel:?=$ads_view[0]->phone;?>"><i class="fa fa-phone" aria-hidden="true"></i><?=$ads_view[0]->phone;?></a></li>
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><?=$ads_view[0]->email;?></a></li>
                </ul>
                <div class="right_area">
                    <?php if($this->session->userdata('log_check')!=1){?>
                         <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="btn-right favourite <?php if($favourite_check){echo"btn_orange";}?>"><i class="fa fa-star-o" aria-hidden="true"></i> Favourite</a>
                         <?php }else{ if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){?>
                    <button class="btn-right favourite <?php if($favourite_check){echo"btn_orange";}?>"><i class="fa fa-star-o" aria-hidden="true"></i> Favourite</button>
                    <?php }}
                    if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){
                    ?>
                    <a class="btn-right" href="#two"><i class="fa fa-star-o" aria-hidden="true"></i> Write review</a><?php }?>
                    <a class="btn-right"  href="tel:?=$ads_view[0]->phone;?>"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a>
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

<li class="d-inline"><a href="#one">USER REVIEW</a></li>


                                    <li class="d-inline"><a href="#two">Comment</a></li>

<li class="d-inline"><a href="#two">WRITE YOUR REVIEWS</a></li>




                                    <li class="d-inline"><a href="#three">CONTACT INFORMATION</a></li>


                                 </ul>
                                 </div>
                                <div class="image_box_area">
                                    <div class="row row-8">
                                        <div class="col-lg-8">
<?php if($ads_view[0]->upload_file!=''){ ?>

                                            <a href="<?=base_url();?>module_file/<?=$ads_view[0]->upload_file;?>" data-fancybox="images" data-caption="My caption">

                                            <div class="image_box_left">
                                                <img src="<?=base_url();?>module_file/<?=$ads_view[0]->upload_file;?>" alt="img" title="" />
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

                                           <a href="<?php echo base_url();?>module_file/<?=$multiimage[0]->multi_image;?>" data-fancybox="images" data-caption="My caption"> 
                                           <div class="image_box_right">
                                                <img src="<?php echo base_url();?>module_file/<?=$multiimage[0]->multi_image;?>" alt="img" title="" />
                                             </div></a>

                                             <?php 
                                               }
                                             if($img_multi>1){?>

                                            <div class="image_box_right">
                                                <img src="<?php echo base_url();?>module_file/<?=$multiimage[1]->multi_image;?>" alt="img" title="" />
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
                                    <?php 
                                   
               foreach ($multiimage as $key => $row_rec) {
             
               ?>

<a href="<?=base_url();?>module_file/<?PHP echo $row_rec->multi_image;?>" /></a>

         <?php } ?>
 
                                      
                                   </div>

                                </div>

<?php
if($ads_view[0]->cat_name==5 OR $ads_view[0]->cat_name==17){ ?>

<div class="box_area">
                                    <div class="heading_area">
                                        <h3><strong></strong></h3>
                                    </div>
                                    <div class="box_details">

<?php
$tm_id=$ads_view[0]->lbcontactId;
$ads_view=$this->General_model->show_data_id('module_lbcontacts',$tm_id,'lbcontactId','get','')
?>                                      
<div class="row">
<div class="col-lg-6">
<h4>Furnished Type</h4>
<p><?=$ads_view[0]->furnishedType; ?></p>
</div>

<div class="col-lg-6">
<h4>Accommodation Type</h4>
<p><?=$ads_view[0]->accommodationType; ?></p>
</div>

<?php
if($ads_view[0]->cat_name==5){ ?>

<div class="col-lg-6">
<h4>Room Type</h4>
<p><?=$ads_view[0]->roomType; ?></p>
</div>

<div class="col-lg-6">
<h4>Sharing Type</h4>
<p><?=$ads_view[0]->sharingType; ?></p>
</div>

<div class="col-lg-6">
<h4>Gender</h4>
<p><?=$ads_view[0]->gender; ?></p>
</div>

<?php } ?>

<div class="col-lg-6">
<h4>Bed Rooms</h4>
<p><?=$ads_view[0]->bedRooms; ?></p>
</div>

<div class="col-lg-6">
<h4>Toilets</h4>
<p><?=$ads_view[0]->toilets; ?></p>
</div>

<div class="col-lg-6">
<h4>Floor</h4>
<p><?=$ads_view[0]->floor; ?></p>
</div>

<div class="col-lg-6">
<h4>Lift Available</h4>
<p><?php if($ads_view[0]->petsAllowed==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Pets Allowed</h4>
<p><?php if($ads_view[0]->petsAllowed==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Bachelors Allowed</h4>
<p><?php if($ads_view[0]->bachelorsAllowed==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Area</h4>
<p><?=$result[0]->area; ?></p>
</div>

<div class="col-lg-6">
<h4>Area Units</h4>
<p><?=$result[0]->areaUnits; ?></p>
</div>


<div class="col-lg-6">
<h4>Utilities Included</h4>
<p><?php if($ads_view[0]->utilitiesIncluded==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Available from Date</h4>
<p><?=$ads_view[0]->availablefrom; ?></p>
</div>

<div class="col-lg-6">
<h4>Rent Per Month</h4>
<p><?=$ads_view[0]->monthlyrent; ?></p>
</div>

<div class="col-lg-6">
<h4>Currency</h4>
<p><?=$ads_view[0]->currency; ?></p>
</div>

<div class="col-lg-6">
<h4>Accommodation Posted by</h4>
<p><?=$ads_view[0]->accomPostedby; ?></p>
</div>

<div class="col-lg-6">
<h4>Notice Period</h4>
<p><?=$ads_view[0]->noticePeriod; ?></p>
</div>

<div class="col-lg-6">
<h4>Advance Months</h4>
<p><?=$ads_view[0]->advanceMonths; ?></p>
</div>
</div>

                                     </div>
                                </div>
<?php
if($ads_view[0]->cat_name==5){ ?>

<div class="box_area">
                                    <div class="heading_area">
                                        <h3><strong>Room Details</strong></h3>
                                    </div>
                                    <div class="box_details">
                                    <?=$ads_view[0]->roomDetails;?>
                                     </div>
                                </div>
<?php } ?>


                                <div class="box_area">
                                    <div class="heading_area">
                                        <h3><strong>Terms & Conditions</strong></h3>
                                    </div>
                                    <div class="box_details">
                                    <?=$ads_view[0]->terms;?>
                                     </div>
                                </div>



<?php } ?>                                
                                
                                <div class="box_area">
                                    <div class="heading_area">
                                        <h3><strong>details</strong></h3>
                                    </div>
                                    <div class="box_details">
                                    <?=$ads_view[0]->description;?>
                                    <?=$ads_view[0]->description_extra;?>
                                     </div>
                                </div>



<?php if($ads_view[0]->cat_name!=4 and $ads_view[0]->cat_name!=13){ ?>                                
                                <div class="box_area" id="three">
                                    <div class="heading_area">
                                        <h3>Contact <strong>Information</strong></h3>
                                    </div>
                                    <div class="box_details">
                                        <h6>Contact Person<span><?=$ads_view[0]->contact_person;?></span></h6>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h6>Address<span><?=$ads_view[0]->address;?>
<?php
$cid=$ads_view[0]->country;
$country=$this->General_model->show_data_id('country',$cid,'id','get','');
?>
                                              (<?php echo $country[0]->countryname; ?>)

                                            </span></h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6>Working Hours<span><?=$ads_view[0]->working_hour;?></span></h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6>Email<span><?=$ads_view[0]->email;?></span></h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6>Website<span><a style="text-decoration: underline;" target="_blank" href="<?=$ads_view[0]->weblink;?>"><?=$ads_view[0]->weblink;?></a></span></h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6>Facebook<span><a style="text-decoration: underline;" target="_blank" href="<?=$ads_view[0]->media_facebook;?>"><?=$ads_view[0]->media_facebook;?></a></span></h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6>Linkedin<span><a style="text-decoration: underline;" target="_blank" href="<?=$ads_view[0]->media_linkedin;?>"><?=$ads_view[0]->media_linkedin;?></a></span></h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <h6>Twitter<span><a style="text-decoration: underline;" target="_blank" href="<?=$ads_view[0]->media_twitter;?>"><?=$ads_view[0]->media_twitter;?></a></span></h6>
                                            </div>
                                        </div>
                                       <?php if($this->session->userdata('log_check')!=1){?>
                                        <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="report" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report Error</a><?php }else{
                                            if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){
                                            ?>
                                            <a href="javascript:void(0);" class="report" id="report_error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report Error</a>
                                        <?php }}?>
                                        <?php if($this->session->userdata('log_check')!=1){?>
                                        <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="report" id="report_complaint"><i class="fa fa-bug" aria-hidden="true"></i> Report Complaint</a>
                                        <?php }else{
                                            if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){
                                            ?>
                                         
                                            <a href="javascript:void(0);" class="report" id="report_complaint"><i class="fa fa-bug" aria-hidden="true"></i> Report Complaint</a>
                                             <?php }}?>
                                    </div>
                                </div>
<?php } ?>
                                
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
                                <div class="box_area" id="two">
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
                                </div>

                            <?php }else{?>
<?php if($ads_view[0]->cat_name!=4 && $ads_view[0]->cat_name!=13){ ?>


                                <div class="box_area" id="two">
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
                                </div>

<?php } ?>

                            <?php }}?>


<!-------------------review area----------------->



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

<?php if($ads_view[0]->cat_name!=4 && $ads_view[0]->cat_name!=13){ ?>
<!------------------------------user review----------------------->
                                <div class="box_area" id="one">
                                    <div class="heading_area">
                                        <h3>User <strong>Review</strong></h3>
                                    </div>
                                    <div class="box_details">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="reviewesratingbox clearfix">
                                                    <div class="reviewbox">
                                                        <ul>
                                                            <li class="clearfix">
                                                                <span>Excellent</span>
                                                                <div class="progress" style="height:5px">
                                                                    <div class="progress-bar" style="width:<?=$wd*$total_rate5;?>%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <span>Good</span>
                                                                <div class="progress" style="height:5px">
                                                                    <div class="progress-bar" style="width:<?=$wd*$total_rate4;?>%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <span>Average</span>
                                                                <div class="progress" style="height:5px">
                                                                    <div class="progress-bar" style="width:<?=$wd*$total_rate3;?>%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <span>Bad</span>
                                                                <div class="progress" style="height:5px">
                                                                    <div class="progress-bar" style="width:<?=$wd*$total_rate2;?>%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <span>Very Bad</span>
                                                                <div class="progress" style="height:5px">
                                                                    <div class="progress-bar" style="width:<?=$wd*$total_rate1;?>%;"></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="overview_reating">
                                                    <h4>Overall Ratings</h4>
                                                    <div class="review_it">
                                                        <h3><?=$avg_review;?><sup><i class="fa fa-star" aria-hidden="true"></i></sup></h3>
                                                    </div>
                                                    <p><!-- <?=$total_review;?> --><?=$avg_review;?> Rating<?php if($total_review>0){echo"s";} ?> & <?=$total_review_user;?> Review<?php if($total_review_user>0){echo"s";} ?></p>
                                                </div>
                                            </div>
                                        </div>
<!--------------ajax review ------------->

 <h3>Reviews</h3>

<div id='postsList'>



</div>


<div style='margin-top: 10px;' id='pagination'></div>



<script type='text/javascript'>
        $(document).ready(function(){

            // Detect pagination click
            $('#pagination').on('click','a',function(e){
                //alert(2);
                e.preventDefault(); 
                var pageno = $(this).attr('data-ci-pagination-page');
                loadPagination(pageno,'<?php echo $_REQUEST['ads']; ?>');
                //alert(pageno);
            });

            loadPagination(0,'<?php echo $_REQUEST['ads']; ?>');

            // Load pagination
            function loadPagination(pagno,adsid){
                //alert(adsid);
                $.ajax({
                    url: '<?=base_url()?>adsview/loadRecord/?pagno='+pagno+'&ads='+adsid,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        $('#pagination').html(response.pagination);
                        createTable(response.result,response.row);
                    }
                });
            }

            // Create table list
            function createTable(result,sno){
                sno = Number(sno);
                $('#postsList').empty();

                for(index in result){
                    var id = result[index].rv_id;
                    var title = result[index].rv_name;
                    var review = result[index].rv_rate;
                    var image = result[index].user_photo;
                    if(image==''){image = 'review-img1.png'}
                    var content = result[index].rv_message;
                    content = content.substr(0, 60) + " ...";
                    var link = result[index].link;
                    sno+=1;

                   


    var tr = '<div class="review_body">';
    tr += '<img src="<?=base_url();?>uploads/'+ image +'" alt="img" title="" />'
    tr += '<h4>'+ title +'<span class="review_reating">'+ review +' <sup><i class="fa fa-star" aria-hidden="true"></i></sup></span></h4>';
    tr += '<h5>15th January, 2020</h5>';
    tr += '<p>'+ content +'</p>';
    tr += '</div>';
    $('#postsList').append(tr);


                    
                }

            }
        });
    </script>




<!--------------ajax review ------------->
                                       





                                    </div>
                                </div>


<!------------------------------user review----------------------->
<?php } else{ ?>


<div class="box_area" id="four">
                                    <div class="heading_area">
                                        <h3>Comment<strong></strong></h3>
                                    </div>
                                    <div class="box_details">
                                       
<?php
$count=0;
$ads_id=$ads_view[0]->lbcontactId;
$comment = $this->db->query("SELECT * FROM comment WHERE ads_id='$ads_id' AND parent_id=''")->result();
foreach ($comment as $value) { 
$count++;
  ?>
   <p><?php echo $value->comment_name; ?><br><?php echo $value->comment; ?> <span style="color:green;">(<?php echo $value->comment_entry_date; ?> )</span>

<a style="color: red;" href="#"  data-toggle="modal" data-target="#myModal<?php echo $count; ?>">reply</a>

<div class="modal fade" id="myModal<?php echo $count; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">

<form id="reply_form<?php echo $count; ?>">
  <div class="form-group">
    <textarea name="comment" class="form-control"></textarea>
  </div>
  
 

 <input type="hidden" name="ads_id" value="<?=$_REQUEST['ads'];?>" />

  <input type="hidden" name="comentparent_id" value="<?php echo $value->comment_id; ?>" />

  <button type="submit" class="btn btn-default">Submit</button>
</form>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<?php
$pid=$value->comment_id;
$comment = $this->db->query("SELECT * FROM comment WHERE ads_id='$ads_id' AND parent_id='$pid'")->result();
foreach ($comment as $value) { 
?>
<p style="margin-left: 40px;"><?php echo $value->comment_name; ?><br><?php echo $value->comment; ?> <span style="color:green;">(<?php echo $value->comment_entry_date; ?> )</span></p>

<?php  
}?>

<script type="text/javascript">

  $("#reply_form<?php echo $count; ?>").on('submit',function(e){

              //alert(1);

                e.preventDefault();
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/post_reply',
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        //$('.sub2').attr('disabled','disabled');
                        $('#reply_form').css('opacity','.5');
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

            }); </script>


<?php
} 
?>                                       
                                   


                                    </div>
                                </div>



<?php } ?>

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
                                        if($ads_view[0]->address){
                                          $addts=$ads_view[0]->address;  
                                        }else{
                                           $addts=$this->General_model->show_data_id('country',$ads_view[0]->country,'id','get','')[0]->countryname; 
                                        }
                                        
                                        $address=str_replace(",", "", str_replace(" ", "+",$addts));
echo '<iframe width="" height="" frameborder="0" style="border:0;" allowfullscreen="" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' .$address. '&z=14&output=embed"></iframe>';

                                        ?>
                                       <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7774723.510965041!2d7.19826856760574!3d61.59229951227372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465cb2396d35f0f1%3A0x22b8eba28dad6f62!2sSweden!5e0!3m2!1sen!2sin!4v1576839434335!5m2!1sen!2sin" width="" height="" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
                                    </div>
                                </div>
                                <?php
                                if($this->session->userdata('front_sess')['userid']!=$ads_view[0]->idut){

                                ?>
                                <div class="aside_box">
                                    <h4>Message</h4>


                                    <form action="" method="post" id="quote_form">
                                    <div class="aside_body">
                                        <p>Provide your personal info </p>
                                        <div class="form-group">
                                            <input type="hidden" name="adsid" value="<?=$_REQUEST['ads'];?>" />
                                            <input type="text" name="qt_name" class="form-control" placeholder="Enter Your Name" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" required />
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="text" name="qt_phone" class="form-control numeric_input" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['phone'] : '' ?>" placeholder="Enter Your Mobile No."  />
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <input type="email" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['email'] : '' ?>" name="qt_email" class="form-control" placeholder="Enter Your Email"  />
                                        </div> -->
                                        <div class="form-group">
                                                        <textarea class="form-control" name="qt_message" placeholder="Write Message" required></textarea>
                                                    </div>
                                        <button type="submit" class="btn btn-primary sub">SEND</button>
                                    </div>
                                    </form>
                                    
                                </div>
                                <hr>
                            <?php }?>
                                <div class="box2">
                                    <div class="thumble_img_area">
                                        <img src="<?php echo base_url();?>assets_front/images/img1.jpg" alt="img" title="" />
                                    </div>
                                    <div class="contain_area">
<?php
if($ads_view[0]->user_photout!=''){  ?>
<img src="<?php echo base_url();?>uploads/<?=$ads_view[0]->user_photout;?>" alt="member" title="" />

  <?php
}else{
?>

<img src="<?php echo base_url();?>uploads/download.png" alt="member" title="" />
<?php
}
?>
                                        

                                        <h3><?=$ads_view[0]->nameut;?><span>Member since <?=date('F Y',strtotime($ads_view[0]->entry_dateut));?> </span></h3>
                                        <a  href="javascript:void(0)" class="btn btn-primary">Chat User</a>
                                    </div>
                                </div>
                                
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



 <!-- chat option start -->
    <div class="fabs">
        <div class="chat">
            <div class="chat_header">
                <div class="chat_option">
                    <div class="header_img">
                        <?php if($this->session->userdata('user_photo')!=''){?>
                                <img src="<?=base_url();?>uploads/<?=$this->session->userdata('user_photo');?>" alt="">
                                <?php }else{?>
                        <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg" />
                    <?php }?>
                    </div>
                    <span id="chat_head"><?=$this->session->userdata('front_sess')['name'];?></span> <br> <span class="agent"><?=$ads_view[0]->nameut;?></span> <span class="online">(Online)</span>
                    <span id="chat_fullscreen_loader" class="chat_fullscreen_loader"><i class="fullscreen zmdi zmdi-window-maximize"></i></span>

                </div>

            </div>
            <div id="chat_first_screen" class="chat_conversion chat_converse">
                <span class="chat_msg_item chat_msg_item_admin">
                    <div class="chat_avatar">
                        <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg" />
                    </div>Hey there! Any question?
            
                </span>
                <?php
            //echo "<pre>";
            //print_r($chat_message);
                foreach ($chat_message as $chat) {
                   if($chat->to_user==$ads_view[0]->user_id){
                ?>
                <span class="chat_msg_item chat_msg_item_admin">
                    <div class="chat_avatar">
                        <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg" />
                    </div><!-- Hey there! Any question? -->
                    <?=$chat->chat_message;?>
                </span>
            <?php }if($chat->from_user==$this->session->userdata('front_sess')['userid']){?>
                <span class="chat_msg_item chat_msg_item_user">
                    <?=$chat->chat_message;?></span>
                <span class="status">20m ago</span>
                
                <?php }}?>
                
            </div>
            <div class="fab_field">
              <!--   <a id="fab_camera" class="fab"><i class="zmdi zmdi-camera"></i></a> -->
                <a id="fab_send" class="fab chat_send"><i class="zmdi zmdi-mail-send"></i></a>
                <textarea id="chat_message" name="chat_message" class="chat_field chat_message" placeholder="Type a message"></textarea>
            </div>
        </div>
        <a id="prime" class="fab "><i class="prime zmdi zmdi-comment-outline"></i></a>
    </div>
    <!-- chat option stop -->




    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e){


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
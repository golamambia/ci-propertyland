<style type="text/css">
  .total_searchbox .box {
    width: 22.8% !important;
  }
</style>
<!-- banner css Start -->

  <div class="banner_area inner_banner text-center" style="background-image:url(<?=base_url();?>assets_front/images/bannerimg.jpg);">
    <div class="container">
      <h1 class="wow zoomIn" data-wow-deuration="1s" data-wow-delay=".1s">Welcome To<br>The Local Browse</h1>
      <p class="wow zoomIn" data-wow-deuration="1s" data-wow-delay=".2s">Find B2B & B2C businesses contact addresses, phone numbers,</p>
     <div class="total_searchbox clearfix wow zoomIn" data-wow-deuration="1s" data-wow-delay=".3s">
         <form action="<?=base_url();?>search/result"  method="get" <?php if($this->session->userdata('front_sess')['userid']){?> onsubmit="return save_loc();" <?php }?>>
             <!-- <div class="box">
               <input type="text" value="<?=$looking_for;?>" name="looking_for" class="form-control" placeholder="What are you looking for?">
             </div> -->
             
             <div class="box">
               <select class="form-control" name="cover_area">
                 <option value="" disabled selected="">Coverage area</option>
             <?php 
                     foreach ($cover_area_list as $key => $value) {
                      //print_r($value)
                     ?>
                       <option <?php if($value->cov_id==$cover_area){echo"selected";} ?> value="<?=base64_encode($value->cov_id);?>"><?=$value->cover_area;?></option>
                       <?php }?>
               </select>
             </div>
             <div class="box">
               <select class="form-control " name="module">
                 <option value="">All Categories</option>
             <?php 
                     foreach ($category_list as $key => $value) {
                      //print_r($value)
                     ?>
                       <option <?php if($value->id==$module){echo"selected";} ?> value="<?=base64_encode($value->id);?>"><?=$value->name;?></option>
                       <?php }?>
               </select>
             </div>
             <div class="box">
               <input type="text" value="<?php if($location!=''){echo $location;}else{echo $this->session->userdata('get_curr');}?>" name="location" id="locationTextField" class="form-control" placeholder="Search location" <?php if('other'!=$save_location){echo'style="pointer-events: none;"';}?>>
             </div>
             <div class="box">
              <select class="form-control save_location" name="save_location">
                 <!-- <option value="" disabled selected="">your save location</option> -->
                 <option <?php if('current'==$save_location){echo"selected";}else if($this->session->userdata('get_curr')){echo"selected";} ?> value="<?=base64_encode('current');?>">Current location</option>
                 <?php if($this->session->userdata('front_sess')['userid']){?>
                 <option <?php if('other'==$save_location){echo"selected";} ?> value="<?=base64_encode('other');?>">Other location</option>
               <?php }?>
                 <?php 
                     foreach ($loc_list as $key => $value) {
                      //print_r($value)
                     ?>
                       <option <?php if($value->slt_id==$save_location){echo"selected";} ?> value="<?=base64_encode($value->slt_id);?>"><?=$value->slt_title;?></option>
                       <?php }?>
               </select>
             </div>
             <div class="search_btn">
              <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
             </div>
             <input type="hidden" name="save_per" id="save_per" value="">
         </form>
      </div>
     
      
    </div>
  </div>


<!-- banner css stop --> 

<!-- categories_area css Start -->
 <div class="categories_area text-center p-6">
    <div class="container">
      <h2 class="mb-3 mb-lg-4">Categories</h2>
      <div class="categories_innerarea">
       <div class="row">
           
           
           <?php 
         
               foreach ($category_list as $key => $value) {
                  
               ?>
          
             <div class="col-lg-2">
               <div class="categories_totalbox wow fadeInUp" data-wow-deuration="1s" data-wow-delay=".1s">
                 <a href="<?=base_url();?>search?module=<?php echo base64_encode($value->id);?>">
                     <div class="categories_box">
                       <div class="categories_thumble">
                        <img src="<?=base_url();?>/icon/<?=$value->icon_name;?>" alt="<?=$value->name;?>">
                       </div>
                      </div>
                     <h4><?=$value->name;?></h4>
                 </a>
               </div>
             </div>
            
       <?php }?>
         
       </div>
    </div>
 </div>
 </div>
    
<!-- categories_area css stop --> 
<!-- all_categories css Start -->
  <div class="all_categoriesarea bg-gray p-6">
    <div class="container">
    
    
    <?php 
    foreach($home_catlist as $key => $value ){
        $get_sub_cat=getSubcatHome($value->sid);
        //print_r($get_sub_cat);
    ?>
    
    
    
    <div class="catagori_slider mb-4">
      <div class="catagori_slidertop pb-3 clearfix">
         <h2 class="wow zoomIn" data-wow-deuration="1s" data-wow-delay=".1s"><?=$value->subname;?></h2>
         <a href="<?=base_url();?>search?module=<?php echo base64_encode($value->categoryid);?>&sub_module=<?php echo base64_encode($value->sid);?>" class="btn btn-outline-warning wow zoomIn" data-wow-deuration="1s" data-wow-delay=".2s">View All</a>
      </div>
      <div class="owl-carousel catagori-carousel">
      
   <?php 
    foreach($get_sub_cat as $key => $value2 ){?>
          <div class="all_catagoribox wow fadeInUp" data-wow-deuration="1s" data-wow-delay=".1s">
               <a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($value2->lbcontactId);?>">
                 <figure class="all_catagorithumble">
                    <img src="<?php echo base_url(); ?>module_file/<?=$value2->upload_file;?>" alt="cetagori_thum">
                 </figure>
                 <div class="body_text">
                     <h4><?=$value2->title;?></h4>
                     <p><?=substr($value2->address,0,60).'...';?></p>
                     <?php if($this->session->userdata('log_check')!=1){?>
                                    
     <span class="btn btn-outline-warning" onclick="log_alert()"> get quotes</span>
                                    <?php }else{ if($this->session->userdata('front_sess')['userid']!=$value2->user_id){?>
                                  
                                   <span class="btn btn-outline-warning" onclick="quote_model('<?=base64_encode($value2->lbcontactId);?>')"> get quotes</span>
                                  <?php }else{?>
            
             <span class="btn btn-outline-warning" onclick="own_post()"> get quotes</span>

                                  <?php }}?>
                </div>
                </a>
           </div>
           
            <?php }?>
           
           
             
        </div>
    </div>
    <?php }?>
    
    
    
    
    
    
    
    
    
    
       
    </div>
  </div>
<!-- all_categories css stop -->
<!-- topmore_categoriesarea css Start -->
  <div class="topmore_categoriesarea p-6">
     <div class="container">
       <h2 class="text-center mb-4">Top More Categories For You</h2>
        <div class="row">
        <?php 
    foreach($top_catlist as $key => $value ){
        $get_sub_cat=getSubcatData($value->sid);
        //print_r($get_sub_cat);
    ?>
        
          <div class="col-lg-6 col-md-6">
            <div class="catagori_slider topmore mt-4">
                  <div class="catagori_slidertop pb-2 clearfix">
                     <h2><?=$value->subname;?></h2>
                     <a href="<?=base_url();?>search?module=<?php echo base64_encode($value->categoryid);?>&sub_module=<?php echo base64_encode($value->sid);?>" class="btn btn-outline-warning">View All</a>
                  </div>
                  <div class="topmore_cetagoribox clearfix">
                  <a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($get_sub_cat[0]->lbcontactId);?>">
                    <figure>
                      <div class="topmore_cetagorithumble">
                        <img src="<?php echo base_url(); ?>module_file/<?=$get_sub_cat[0]->upload_file;?>" alt=""> 
                      </div>
                    </figure>
                    <div class="body_text">
                       <h4><?=$get_sub_cat[0]->title;?></h4>
                        <p><?=substr($get_sub_cat[0]->address,0,60).'...';?></p>
                       <?php if($this->session->userdata('log_check')!=1){?>
                                    
     <span class="btn btn-outline-warning" onclick="log_alert()"> get quotes</span>
                                    <?php }else{ if($this->session->userdata('front_sess')['userid']!=$get_sub_cat[0]->user_id){?>
                                  
                                   <span class="btn btn-outline-warning" onclick="quote_model('<?=base64_encode($get_sub_cat[0]->lbcontactId);?>')"> get quotes</span>
                                  <?php }else{?>
            
             <span class="btn btn-outline-warning" onclick="own_post()"> get quotes</span>

                                  <?php }}?>
                       <div class="reting"><?=avgReview($get_sub_cat[0]->lbcontactId);?></div>
                    </div>
                    </a>
                 </div>
              </div>
          </div>
          
                <?php }?>    
          
          
        </div>
     </div>
  </div>
<!-- topmore_categoriesarea css stop -->
 
<!-- who_weare_area css Start -->
 
<!-- who_weare_area css Start -->





<!-- our_clients css Start -->
 
<!-- our_clients css stop -->
<!-- how_itworks_area css Start -->
  <div class="how_itworks_area text-center p-6" style="background-image:url(<?php echo base_url();?>assets_front/images/howitwork_bg.jpg);">
     <div class="container">
        <h2 class="mb-5">How it Works</h2>
        <div class="howitworkbox">
               <div class="row">
                  <div class="col-lg-4 box">
                     <div class="howitworkround">
                        <img src="<?php echo base_url();?>assets_front/images/box.png" alt=""> 
                        <div class="howitworkround_inner">
                           <p><img src="<?php echo base_url();?>assets_front/images/howit_icon.png" alt=""></p>
                        </div>
                     </div>
                     <h4>Choose What To Do</h4>
                     <p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                  </div>
                  <div class="col-lg-4 text-center box">
                     <div class="howitworkround">
                        <img src="<?php echo base_url();?>assets_front/images/box.png" alt=""> 
                        <div class="howitworkround_inner">
                           <p><img src="<?php echo base_url();?>assets_front/images/howit_icon1.png" alt=""></p>
                        </div>
                     </div>
                      <h4>Find What You Want</h4>
                      <p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                  </div>
                  <div class="col-lg-4  box">
                     <div class="howitworkround">
                        <img src="<?php echo base_url();?>assets_front/images/box.png" alt="">
                        <div class="howitworkround_inner">
                           <p><img src="<?php echo base_url();?>assets_front/images/howit_icon2.png" alt=""></p>
                        </div>
                     </div>
                     <h4>Explore Amazing Places</h4>
                     <p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                  </div>
               </div>
            </div>
     </div>
  </div>
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
    <div class="modal fade" id="myModal_listquote_front">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>
                </div>
                
                <!-- Mobiledal body -->
                <div class="modal-body">
                    <div class="contriner">
                       <form id="listquote_form_frnt">
                                            <div class="row row-8">
                                               
                            <div class="col-lg-6">
                               <div class="form-group">
                                           
                                            <input type="text" name="qt_name" class="form-control" placeholder="Enter Your Name" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" required />
                                        </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="text" name="qt_phone" class="form-control numeric_input" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['phone'] : '' ?>" placeholder="Enter Your Mobile No." required />
                                        </div>
                            </div>
                            <input type="hidden" name="adsid" id="adsid">
                            <div class="col-lg-6">
                                <div class="form-group">
                                            <input type="email" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['email'] : '' ?>" name="qt_email" class="form-control" placeholder="Enter Your Email" required />
                                        </div>
                            </div>
                            
                            <div class="col-lg-12">
                                 <div class="form-group">
                                                        <textarea class="form-control" name="qt_message" placeholder="Write Message" required></textarea>
                                                    </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary sub">Submit</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php }?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

function quote_model(val){
      //$('#adsid').val(val);
      $('#myModal_listquote_front').modal('show');
    }

function log_alert(){
      swal("Sorry!", "Please login first", "error");
    }
    function own_post(){
      swal("Sorry!", "Posted by you", "error");
    }
$( document ).ready(function() {
     //alert(1);
     $("#listquote_form_frnt").on('submit',function(e){
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
                        $('#listquote_form_frnt').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             $('#listquote_form_frnt')[0].reset();
                             $('#myModal_listquote_front').modal('hide');
                         swal("Okay!", "Message successfully send", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Message failed to send", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          $('#listquote_form_frnt').css("opacity","");
                        $(".sub").removeAttr("disabled");
                    }
                });

            });
      
      
});


function save_loc(){

var loc=$("#locationTextField").val();
var alt_loc='<?=$this->session->userdata('location');?>';
var save_location=$('.save_location').val();
//alert(save_location);
//'<?=$this->session->userdata('save_location');?>';
if(save_location=='b3RoZXI=' || save_location=='Y3VycmVudA=='){
if(loc!=alt_loc){
  var con=confirm('Do you want to save this location?');
if(con){
  
  $("#save_per").val('yes');
}
}
}
}

</script>
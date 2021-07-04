<style type="text/css">
  .adstatusdactive{
    display: inline-block;
    font-size: 12px;
    background-color: #f16919;
    padding: 4px 12px;
    color: #fff;
    border-radius: 30px;
    text-transform: capitalize;
    font-weight: 600;
  }
</style>
<!-- banner css Start -->
  <div class="banner_area text-center" style="background-image:url(<?php echo base_url(); ?>assets_front/images/bannerimg.jpg);">
    <div class="container">
     <div class="inner_banner_contant pt-0">
         <h2>Dashboard</h2>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
      </div>
    </div>
  </div>
<!-- banner css stop --> 
  
<!-- main_area css Start -->
  <div class="main_area dashboard pb-3 pt-3">
     <div class="container">
        <div class="dashboard_area">
          <div class="row row-8">
            <div class="col-lg-3 dashboard_left mt-3">
               <?php
                                 $this->load->view('left_bar');
                                ?>
               
               
            </div>
            
            <div class="col-lg-6 dashboard_main mt-3">
              <div class="dashboard_mainbox">
                 <h3>My Review List</h3>
                 <div class="dashboard_mainboby">
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
                    <div class="listing_area table-responsive">
                       <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 <th>Ads</th>
                                 <!-- <th>Email</th>
                                 <th>Phone</th> -->
                                 <th>Details</th>
                                     <!-- <th>New Message</th>  -->                           
                                 <th>View ad</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($review_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              ?>

                              <tr class="dview<?=$i;?>">
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td><a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->lbcontactId);?>"><?=$result->title;?></a></td>
                                <!--  <td><?=$result->qt_email;?></td>
                                 <td><?=$result->qt_phone;?></td> -->
                                <td class="ads-details-td">
                                   
                                    <p> <strong> Posted On </strong>:
                                       <?=date('d-M-Y',strtotime($result->rv_entry_date));?>, <?php
                                       $date = new DateTime($result->rv_entry_date);
                                      echo $date->format('h:i:s a') ;
                                     ?>
                                    </p>
                                    <p> 
                                    <strong>Description:</strong> <?=substr($result->rv_message, 0,100).'...';?> </p>
                                 </td>
                               
                                
                                 <td class="action-td">
                                  <p>
                                  <a href="javascript:void(0)" class="view_btn" onclick="document.getElementById('id'+<?php echo $i;?>).style.display='block'" title="Click to view message" class="view_btn" ><i class="fview fa fa-eye"  aria-hidden="true"></i></a>
                                </p>
                                   
                                    <p>
                                        <a  href="javascript:void(0)" class="view_btn"  onclick="get_modal(<?=$i;?>)"  title="Edit review"><i class="fa fa-pencil"  aria-hidden="true"></i></a>
                                        

                                    </p>
                                    


<!-------------popup notice --------------->
  <div id="id<?php echo $i; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id<?php echo $i; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><?php echo $result->title; ?></h2>
      </header>
      <div style="padding: 16px;" class="w3-container">
        
        
        <p>Description  : <?php echo $result->rv_message ?></p>
        <p>Posted On  : <?php echo $date->format('h:i:s a') ; ?></p>
      </div>
      
    </div>
  </div>
  <!-------------popup notice --------------->


  <!-- review modal start -->
    <div class="modal fade" id="fid<?php echo $i; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Your <strong>Review</strong></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="contriner">
                        <form id="listreview_form<?php echo $i; ?>">
                                            <div class="row row-8">
                                              <div class="row row-8">
                                                <input type="hidden" name="adsid" id="adsid" value="<?=base64_encode($result->lbcontactId);?>" />
                                                <div class="col-lg-12">
                                      <div class="star-rating<?php echo $i; ?>">
                                        <span class=" fa fa-star-o" data-rating="1"></span>
                                        <span class="fa fa-star-o" data-rating="2"></span>
                                        <span class="fa fa-star-o" data-rating="3"></span>
                                        <span class="fa fa-star-o" data-rating="4"></span>
                                        <span class="fa fa-star-o" data-rating="5"></span>
                                        <input type="hidden" name="rv_rate" class="rating-value" value="<?php echo $result->rv_rate;?>">
                                      </div>
                                    </div>
                                                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" placeholder="Full Name" readonly />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="rv_message" placeholder="Write Review" required><?php echo $result->rv_message ?></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rvid" id="rvid" value="<?=base64_encode($result->rv_id);?>" />
                                                <div class="col-lg-12">
                                                    <?php if($this->session->userdata('log_check')!=1){?>
                                                    <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="btn btn-primary sub2">Submit</a>
                                                    <?php }else{?>
                                                        <button type="submit" class="btn btn-primary sub<?php echo $i; ?>">Update</button>
                                                         <?php }?>
                                                </div>
                                            </div>
                                            </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- review modal stop -->
<script type="text/javascript">
  $( document ).ready(function() {
  $("#listreview_form<?php echo $i; ?>").on('submit',function(e){
                e.preventDefault();
                //var val=$("input[name=adsid<?php echo $i; ?>]").val();
                var formData = new FormData(this);
                //formData.set('adsid', val);
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>review/post_review',
                    data:formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend:function(){
                        $('.sub<?php echo $i; ?>').attr('disabled','disabled');
                        $('#listreview_form<?php echo $i; ?>').css('opacity','.5');
                    },
                    success:function(response){
                        //console.log(response);
                        var html=response.trim();
                        if(html=='success'){
                             //$('#listreview_form')[0].reset();
                             $('#fid'+<?php echo $i; ?>).modal('hide');
                             $('#myModal_listreview<?php echo $i; ?>').modal('hide');
                         swal("Okay!", "Review successfully updated", "success");
                     }else if(html=='fail'){
                         swal("Sorry!", "Review failed to post", "error");
                     }else if(html=='user'){
                         swal("Sorry!", "This is your ad , you cant do", "error");
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                          $('#listreview_form<?php echo $i; ?>').css("opacity","");
                          $(".sub<?php echo $i; ?>").removeAttr("disabled");
                        
                    }
                });

            }); 
  }); 
</script>
                                    
                                    
                                 </td>
                              </tr>
                              
                             <?php }?>
                              
                              
                           </tbody>
                        </table>
                    </div>
                    
                    
                 </div>
              </div>

<?php echo $page_link; ?>

            </div>
            
            <div class="col-lg-3 dashboard_right mt-3">
               <div class="dashboardright_area">
                 <div class="aside_box">
                   <?php 
                                $this->load->view('notification');
                                ?>
                 </div>
               </div>
            </div>
            
            
          </div>
        </div>
     </div>
  </div>
<!-- main_area css stop -->

<!-- main_area css stop -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
 
  function delete_fav_msg(nid,val){
    
   var con=confirm("Are you sure to delete ?");
      if(con){

                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>quote/delete_quote',
                    data:{qtid:nid},
                    cache:false,
                    success:function(response){
                        //alert(1);
                        //console.log(response);
                         var html=response.trim();
                        
                      if(html=='del'){
                             
                         swal("Okay!", "Removed successfully", "success");
                          $(".dview"+val).remove();
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                      
                            }
                });

      }
    }

function view_msg(nid,val){
   
    $('#id'+val).show();
  
   $.ajax({
    method:'post',
    url:'<?=base_url();?>quote/update_quote',
    data:{noteid:nid},
    cache:false,
    success:function(response){
      
      var html=response.trim();
      var result=html.split("~");
      if(result[0]=='success'){
        
        
        $('.quoteno').html(result[1]);
        $(".fview"+val).removeClass("fa-eye-slash");
        $(".fview"+val).addClass("fa-eye");
      }
    }


   }); 
  
  }
 function get_modal(val){
$('#fid'+val).modal('show');
var $star_rating = $('.star-rating'+val+' .fa');

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
 }
  

</script>
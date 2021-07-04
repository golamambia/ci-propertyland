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
                 <h3>My Location List</h3>
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

                    <!-- review modal start -->
    <div class="modal fade" id="modal_loc">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Save Your <strong>location</strong></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="contriner">
                        <form method="post" action="<?=base_url();?>dashboard/location_post">
                                            <div class="row row-8">
                                              <div class="row row-8">
                                                
                                                                                
                                               <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="slt_title" placeholder="Address title" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="slt_location" placeholder="Location name" required></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    
                                                        <button type="submit" class="btn btn-primary sub">Save now</button>
                                                         
                                                </div>
                                            </div>
                                            </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
            <div style="float: right;margin-bottom: 14px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_loc">Add address</button>
            </div>


                    <div class="listing_area table-responsive">
                       <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 <th>Title</th>
                                 <!-- <th>Email</th>
                                 <th>Phone</th> -->
                                 <th>Address</th>
                                     <!-- <th>New Message</th>  -->                           
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($loc_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              ?>

                              <tr class="dview<?=$i;?>">
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td><?=$result->slt_title;?>
                                       &nbsp;&nbsp; <a  href="javascript:void(0)" class="view_btn" title="Click here to edit title" data-toggle="modal" data-target="#fid<?=$result->slt_id;?>"><i class="fa fa-pencil"  aria-hidden="true"></i></a>
                                        

                                   </td>
                                <!--  <td><?=$result->qt_email;?></td>
                                 <td><?=$result->qt_phone;?></td> -->
                                <td class="ads-details-td">
                                   <?=$result->slt_location;?>
                                    
                                 </td>
                               
                                
                                 <td class="action-td">
                                
                                   
                                    <p>
                                        <a  href="<?=base_url();?>dashboard/location_remove/<?=$result->slt_id;?>" class="view_btn" onclick="return confirm('Are you sure to remove this data')" title="Remove address"><i class="fa fa-trash"  aria-hidden="true"></i></a>
                                        

                                    </p>
                                    
                                    
                                    
                                 </td>
                              </tr>
                              <!-- review modal start -->
    <div class="modal fade" id="fid<?=$result->slt_id;?>">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Your <strong>Title</strong></h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="contriner">
                        <form method="post" action="<?=base_url();?>dashboard/location_edit">
                                            <div class="row row-8">
                                              <div class="row row-8">
                                                <input type="hidden" name="sltid" id="slt_id" value="<?=base64_encode($result->slt_id);?>" />
                                                
                                                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <input type="text" name="slt_title" class="form-control" value="<?=$result->slt_title;?>" placeholder="Title" required />
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-lg-12">
                                                    
                                                        <button type="submit" class="btn btn-primary ">Update</button>
                                                       
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
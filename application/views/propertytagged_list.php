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
  #example_filter input{
    border: 1px solid #ced4da;
     width: 75% !important;
  }
  .dataTables_length {
    display: block !important;

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
                 <h3>My Tagged Properties</h3>



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
                       <table id="example" class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 <th>Photo</th>
                                 <th>Ads Details</th>
                                 <th>Verification Status</th>
                                 <th>Post Status</th>
                                 <!-- <th>Action</th> -->
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($ads_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              ?>

                              <tr>
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td class="add-img-td">
                                    <a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->ppt_id);?>">
                                    <img class="img-fluid" src="<?php echo base_url('uploads/'); ?>module_file/<?=$result->ppt_main_img;?>" alt="img">
                                    </a>
                                 </td>
                                 <td class="ads-details-td">
                                    <h4><a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->ppt_id);?>"><?=$result->ppt_title;?></a></h4>
                                    <p> <strong> Posted On </strong>:
                                       <?=date('d-M-Y',strtotime($result->ppt_createdAt));?>
                                    </p>
                                    <p> <strong>Visitors </strong>: <?=visitorCount($result->ppt_id);?> <br>
                                      <strong>Rating </strong>: <?=reviewCount($result->ppt_id);?> <br>
                                      <strong>Complain </strong>: <?=totalComplaint($result->ppt_id);?> <br>
                                      <strong>Report </strong>: <?=totalReport($result->ppt_id);?> <br>
                                     </p>






                                 </td>
                                 <td class="price-td">
                                  <?php if($result->ppt_verification_status==1){?>
                                  <span class="adstatusactive">active</span>
                                <?php }else{?>
                                  <span class="adstatusdactive">pending</span>
                                <?php }?>
                                 </td>
                                 <td class="price-td">
                                    <?php if($result->ppt_property_status=='active'){?>
                                  <span  class="adstatusactive">Active</span>
                                <?php }else{?>
                                  <span  class="adstatusdactive">Pause</span>
                                <?php }?>
                                 </td>
                                 <!-- <td class="action-td"> -->
                                   <!--  <p><a class="view_btn" href="<?php echo base_url(); ?>adslist/single_add?id=<?=base64_encode($result->ppt_id);?>" title="view"> <i class="fa fa-eye" aria-hidden="true"></i></a></p> -->
                                    <!-- <p><a class="edit_btn" href="<?php echo base_url(); ?>adslist/edit_ad?id=<?=base64_encode($result->ppt_id);?>" title="Edit"> <i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                                    <p><a class="trash_btn" href="<?=base_url();?>adslist/ads_del/<?=$result->ppt_id;?>" title="trash" onclick="return confirm('Are you sure to delete?')"> <i class="fa fa-trash" aria-hidden="true"></i></a></p>
                                 </td> -->
                              </tr>
                              
                             <?php }?>
                              
                              
                           </tbody>
                        </table>
                    </div>
                    
                    
                 </div>
              </div>

<?php //echo $page_link; ?>


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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
 
    function changeAds(ads,st) {
    //alert(1);
    swal({
  title: "Are you sure to change status?",
  text: "you can active/inactive your own ad!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {



    // swal("Poof! Your imaginary file has been deleted!", {
    //   icon: "success",
    // });
$.ajax({
        type: "POST",
        url: "<?=base_url();?>adslist/change_adstatus",
        data: {ads:ads,st:st},
        cache: false,
        success: function(html) {
        //alert(html);
    var res=html.trim();
    if(res=='success'){
       location.reload(true);
      }else{
        swal("Sorry!", "Please try again", "error");
      }
           //console.log(html);

        }
        });



  } 
});
}

</script>
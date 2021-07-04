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
                 <h3>Course List</h3>
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
                                 <th>Course</th>
                                 <th>Category</th>
                                 <th>Duration</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($course_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              ?>

                              <tr>
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td class="add-img-td">
                                   <?php echo $result->course_header; ?> 
                                 </td>
                                 <td class="ads-details-td">
                                <?php echo $result->course_cat; ?> 

                                 </td>

                                 <td class="ads-details-td">
                                  <?php echo $result->duration; ?> 
                                 </td>
                                 
                                 
                                 <td class="action-td">
                                    
  <p><a class="edit_btn" href="#" title="Edit" data-toggle="modal" data-target="#myModal00<?php echo $i; ?>"> <i class="fa fa-pencil" aria-hidden="true"></i></a></p>




<div class="modal fade" id="myModal00<?php echo $i; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div style="
  height: 500px;
  overflow-y: scroll;" class="modal-content">

<div class="container">
<form class="form"  method="post" action="<?php echo base_url();?>lbcontacts/update_course">


<input type="hidden" value="<?=$result->id;?>" name="id" id="" >


        <div class="modal-body">

 <div class="form-group">
    <label for="exampleInputPassword1">Course Header</label>
    <input type="text" value="<?php echo $result->course_header; ?>" name="course_header" class="form-control" required>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Course Category</label>
    <input type="text" name="course_cat" value="<?php echo $result->course_cat; ?>" class="form-control" required>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Video Link</label>
    <input type="text" name="video_llink" value="<?php echo $result->video_llink; ?>" class="form-control" required>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Duration</label>
    <input type="text" name="duration" value="<?php echo $result->duration; ?>" class="form-control" required>

  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Course Content</label>

    <textarea name="course_content" style="border-radius: 10px;" class="form-control mceEditor" rows="3" ><?php echo $result->course_content; ?></textarea>

  </div> 
 <div class="form-group">
    <label for="exampleInputPassword1">Details</label>

    <textarea name="details" style="border-radius: 10px;" class="form-control mceEditor" rows="3" ><?php echo $result->details; ?></textarea>

  </div> 

        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" >Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
</form>
</div>
      </div>
      
    </div>
  </div>






                                    <p><a class="trash_btn" href="<?=base_url();?>lbcontacts/course_del/<?=$result->id;?>" title="trash" onclick="return confirm('Are you sure to delete?')"> <i class="fa fa-trash" aria-hidden="true"></i></a></p>
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
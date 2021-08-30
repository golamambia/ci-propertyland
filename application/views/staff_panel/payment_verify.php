
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Payment Details - <?=$cart_list[0]->name;?>
              
              <br>
              Payment ref - <?=$cart_list[0]->payment_ref;?>
            </h3>
                        
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            </h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>

        </div>
         <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            <!-- <p class="card-text">&nbsp;</p> -->

         <!--    <form id="user_search" method="get">
            <div class="row">
              
              
                <div class="col-md">
                <label>Ads type</label>
            <select  class="form-control" name="ads" >
  <option value=""  selected>--Select type--</option>
  <option <?php if($this->input->get('ads',true)=='all'){echo"selected";}?> value="all">All</option>
  <option <?php if($this->input->get('ads',true)=='pending'){echo"selected";}?> value="pending">Pending Ads</option>
  
  <option <?php if($this->input->get('ads',true)=='approved'){echo"selected";}?> value="approved">Approved Ads</option>
</select>
</div>
<div class="col-md">
<label>From date</label>
<input type="date" value="<?=$this->input->get('start_date',true);?>" class="form-control" name="start_date" id="start_date">
  </div>
  <div class="col-md">
    <label>End date</label>
<input type="date" value="<?=$this->input->get('end_date',true);?>" class="form-control" name="end_date" id="end_date" >
  </div>
  
  <div class="col-md">
    <input type="submit" style="margin-top: 27px;color: #fff;" class="form-control btn btn-sm btn-primary" value="Search Now">
  </div>



</div>
</form> -->


            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  
                   <th>Payment Type</th>
                                 <th>Payment For</th>
                                  <th>Post ID</th>
                                 <th>Days</th>
                                 <th>Price</th>
                                 
                                 <th>Date</th>
                  <th class="float-centre">Pay mode</th>
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
               
               <?php 
               foreach ($cart_list as $key => $result) {
                //print_r($value)
               ?>
                 <tr>
                   
                                 <td class="price-td">
                                 <?=$result->payment_type_text;?>
                                 </td>
                                 <td class="price-td">
                                    <?=$result->payment_text;?>
                                 </td> 
                                 <td class="ads-details-td">
                                    <h4><a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->ppt_id);?>" target="_blank"><?=$result->ppt_title;?></a></h4>
                                   
                                 </td>
                                  <td class="price-td">
                                 <?=$result->days_valid;?>
                                 </td>
                                 <td class="price-td">
                                  <?php 
                                 
                                 echo $result->amount;
                                  
                                  ?>
                                 </td>
                                  
                                 <td class="action-td">
                                <?=$result->payment_date;?>
                                  
                                 </td>
                  <td class="float-centre">
                    <?=$result->payment_mode;?>

                   </td>
                 
                </tr>
                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
               <th>Payment Type</th>
                                 <th>Payment For</th>
                                  <th>Post ID</th>
                                 <th>Days</th>
                                 <th>Price</th>
                                 
                                 <th>Date</th>
                  <th class="float-centre">Pay mode</th>
                </tr>
              </tfoot>        
            </table>     

            <div class="row">
              <div class="col-md-8">
                
            <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>staff_panel/users/payverify_edit_post/<?php echo $payment_hdr[0]->payment_ref?>">
               <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Verification status</label>
                                  <select class="form-control" name="verification_status" id="verification_status" required>

                                    <option value="">Status</option>

                                    <option <?php if($payment_hdr[0]->verification_status==1){ echo "selected"; }?> value="1">Verified</option>

                                    <option <?php if($payment_hdr[0]->verification_status==0){ echo "selected"; }?> value="pending">Pending</option>
                                                                       

                                  </select>

                                  <div class="error_msg"><?php echo form_error('verification_status'); ?></div>

                                </div>
                            </div>
                                       <div class="col-lg-12 " >
                                        <div class="form-group">
                                            <label>Verification Comment</label>
                                  <textarea class="form-control" name="verified_comments" id="verified_comments" placeholder="Verification comment" required><?=$payment_hdr[0]->verified_comments;?></textarea>

                                    

                                  <div class="error_msg"><?php echo form_error('verified_comments'); ?></div>

                                </div>
                            </div>
                            <div class="form-actions center">
                                <a href="<?php echo base_url();?>staff_panel/users/payment" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <?php if($payment_hdr[0]->verification_status==0 && $this->session->userdata('logged_in_stf')['user_type']=='support_staff'){?>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Update Now
                                </button>
                            <?php }?>
                            </div>
                            </form>
                             </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  //alert(1);
  $("#end_date").change(function(){
   $("#start_date").prop('required',true);
  });
  $("#start_date").change(function(){
   $("#end_date").prop('required',true);
  });


});
</script>
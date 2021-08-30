<div class="content-wrapper">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">User Ads</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>staff_panel/home/">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>staff_panel/adsdata/">Ads List</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">View</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-content collapse show">
                    <div class="card-body">
                        
                        <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
<?php if($this->session->flashdata('error_msg')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error_msg');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>


 <?php if($result[0]->update_status>0){?>
                        <div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;">Ads updated by user please check</p>
</div>
<?php }?>


                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>staff_panel/adsdata/adsdata_checked">
                            <input type="hidden" name="id" value="<?=$result[0]->ppt_id;?>" reuired>
                             <input type="hidden" name="post_st" value="<?=$result[0]->ppt_verification_status;?>" reuired>
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Ads Info</h4>
                                
                                <div class="row">
                                        
                                        <div class="col-lg-6">
                                            <h4>Title</h4>
                                            <p><?=$result[0]->ppt_title; ?></p>

                                             
                                        </div>

                                       <!--  <div class="col-lg-6">
                                            <h4>Phone</h4>
                                            <p><?=$result[0]->phone; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Email</h4>
                                            <p><?=$result[0]->email; ?></p>

                                             
                                        </div>
                                        <div class="col-lg-6">
                                            <h4>Contact Person</h4>
                                            <p><?=$result[0]->contact_person; ?></p>

                                             
                                        </div> -->

                                        <div class="col-lg-12">
                                            <h4>Address</h4>
                                            <p><?=$result[0]->ppt_property_address; ?></p>

                                             
                                        </div>


                                        <div class="col-lg-12">
                                            <h4>Location Infirmation</h4>

                                            <p>Country : <?=$result[0]->ppt_country;?></p>
                                            <p>State : <?=$result[0]->ppt_state;?></p>
                                            <p>City : <?=$result[0]->ppt_city;?></p>
                                             <p>Pincode : <?=$result[0]->ppt_pincode;?></p>

                                             
                                        </div>

                                        
                                        <div class="col-lg-6">
                                            <h4>Category</h4>
                                            <p><?=$result[0]->ppt_property_category;?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Property for</h4>
                                            <p><?=$result[0]->ppt_property_for;?></p>

                                             
                                        </div>
                                          <div class="col-lg-6">
                                            <h4>Property type</h4>
                                            <p><?=str_replace('_', ' ',$result[0]->ppt_property_type);?></p>

                                             
                                        </div>

                                        

                                        <div class="col-lg-12">
                                            <h4>Description</h4>
                                            <p><?=$result[0]->ppt_details;?></p>
                                            
                                        </div>

                                       <!--  <div class="col-lg-12">

                                            <h4>Search Keyword</h4>
                                            <p><?=$result[0]->search_keyword;?></p>

                                            
                                        </div> -->

                                        <div class="col-lg-12">
                                            <h4>Social Media Informations:</h4>

                                            <div>Web Link : <a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->weblink;?>"><?=$result[0]->ppt_website;?></a></div>
                                           <!--  <div>facebook :<a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->media_facebook;?>"> <?=$result[0]->media_facebook;?></a></div>
                                            <div>Linkedin : <a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->media_linkedin;?>"><?=$result[0]->media_linkedin;?></a></div>
                                            <div>Twitter : <a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->media_twitter;?>"><?=$result[0]->media_twitter;?></a></div> -->

                                             
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Google Map:</h4>
                                            
                                            <?php
echo '<iframe width="" height="" frameborder="0" style="border:0;" allowfullscreen="" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+",$result[0]->ppt_property_address)) . '&z=14&output=embed"></iframe>';

                                        ?>
                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Single Image </h4>

                                            <img src="<?=base_url();?>uploads/module_file/<?=$result[0]->ppt_main_img;?>" height="60"/>
                                            
                                        </div>






                                        <div class="col-lg-12">
                                            <h4>Photo Gallery</h4>



                          <div class="row">
                          <?php foreach ($multiimage as $key => $row_rec) { ?>
                              <div class="col-lg-1"> 
                                  <img src="<?=base_url();?>uploads/module_file/<?PHP echo $row_rec->multi_image;?>" height="60"/>
                              </div>
                          <?php } ?>   
                          </div>
             
                                            

                                        </div>
                                        
                                        
                                    
                                        
                                    </div>   

                                    <br>
                                     <div class="row">
              <div class="col-md-8">
                
             
               <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Verification status</label>
                                  <select class="form-control" name="ppt_verification_status" id="ppt_verification_status" required="">

                                    <option value="">Status</option>

                                    <option <?php if($result[0]->ppt_verification_status==1){ echo "selected"; }?> value="1">Verified</option>

                                    <option <?php if($result[0]->ppt_verification_status==0){ echo "selected"; }?> value="0">Pending</option>
                                                                       

                                  </select>

                                  <div class="error_msg"><?php echo form_error('ppt_verification_status'); ?></div>

                                </div>
                            </div>
                                       <div class="col-lg-12 " >
                                        <div class="form-group">
                                            <label>Verification Comment</label>
                                  <textarea class="form-control" name="verified_comments" id="verified_comments" placeholder="Verification comment" required><?=$result[0]->verified_comments;?></textarea>

                                    

                                  <div class="error_msg"><?php echo form_error('verified_comments'); ?></div>

                                </div>
                            </div>
                          
                           
                             </div>
            </div>     

                                
                            </div>

                            <div class="form-actions">
                               <a href="<?php echo base_url();?>staff_panel/adsdata/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <?php 
                                  if($result[0]->ppt_verification_status==1){
                                  $post_st=0;
                                  ?>
                               <!--  <button type="button" class="btn btn-success " id="sub">
                                    <i class="fa fa-check-square-o"></i> Inactive Now
                                </button> -->
                                <?php }else{
                                  $post_st=1;

                                  ?>
                             <!--    <button type="button" class="btn btn-primary " id="sub">
                                    <i class="fa fa-check-square-o"></i> Approve Now
                                </button> -->


                              <?php }?>
                              <button type="button" class="btn btn-primary " id="sub">
                                    <i class="fa fa-check-square-o"></i> Submit Now
                                </button>
                            </div>
                        </form> 
<?php if($notification){?>
                        <br>

<div class="listing_area table-responsive">
                       <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 
                                 <th>Notification Details</th>
                                                                 
                                 
                              </tr>
                           </thead>
                           <tbody>

<?php
$i=0; 
foreach ($notification as $value) {
$i++; 
?>

                        <tr class="dview1">
                        <td class="add-img-selector">
                        <?=$i;?>                                 
                        </td>

                        <td class="ads-details-td">
                        <h4><?=$value->notice_title;?></h4>
                        <p> 
                            <strong> Posted On </strong>:
                                       <?=date('d-M-Y',strtotime($value->entry_date));?>
                                     
                        </p>


                         <p>                                               
                            
                        <strong>Description:</strong> <?=$value->description;?> 
                        </p>
                        </td>


                        </tr>
                             

<?php } ?>                            
                            
 
                             
                              
                              
                                                           
                              
                           </tbody>
                        </table>
                    </div>

                  <?php }?>

                    </div>
                </div>
            </div>
        </div>

<div class="col-md-4">
            <div class="card">

                <div class="card-content collapse show">
                    <div class="card-body">



<div class="listing_area table-responsive">
                       <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Date</th>
                                 
                                 <th>Log</th>
                                                                 
                                 
                              </tr>
                           </thead>
                           <tbody>

<?php
$i=0;
$chk_d=0; 
foreach ($change_history as $value) {
$i++; 
?>

                        <tr class="dview1">
                        <td class="add-img-selector">
                      <?=date('d-M-Y',strtotime($value->c_date));?>                      
                        </td>

                        <td class="ads-details-td">
                        
                         <p>                                               
                            
                        <strong>Description:</strong> <?php
                        
                      //  $value->c_log;
                        $str_arr = explode ("::", $value->c_log);
                      
                             for ($i=0;$i<count($str_arr);$i++) { 
                                $str_arr1 = explode (" ", $str_arr[$i]);
                                 for ($i2=0;$i2<count($str_arr1);$i2++) { 
                                 if($i<=2){
                            echo $str_arr1[$i2];
                          } 
                         
                         
                          if($i2>0){
                          
                            if($i<2){
                              echo"<br>";
                          } 
                          }                            
                           
                          }
                           //echo"<br>";
                           if($i>2){
                            $chk_d=1;
                          }
                        }
                     
//print_r($str_arr);

                        ?> 
                        </p>
                        <?php
                        if( $chk_d==1){?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#historyModal<?=$value->c_id;?>">
   View Details
  </button>
<?php }?>
                          <!-- The Modal -->
  <div class="modal" id="historyModal<?=$value->c_id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?=$result[0]->ppt_title; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
       
        <th>Description</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td><?=date('d-M-Y',strtotime($value->c_date));?></td>
       
        <td><?php

                      //  $value->c_log;
                        $str_arr = explode ("::", $value->c_log);
                      
                             for ($i=0;$i<count($str_arr);$i++) { 
                                $str_arr1 = explode (" ", $str_arr[$i]);
                                 for ($i2=0;$i2<count($str_arr1);$i2++) {  
                          echo $str_arr1[$i2];
                          if($i2>0){
                            echo"<br>";
                          }                            
                           
                          }
                           //echo"<br>";
                        }
                      
//print_r($str_arr);

                        ?> </td>
        
      </tr>
     
    </tbody>
  </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
                        </td>


                        </tr>
                             

<?php $chk_d=0;} ?>                            
                            
 
                             
                              
                              
                                                           
                              
                           </tbody>
                        </table>
                    </div>





                    </div>
                  </div>
                </div>
              </div>
       <!--  <div class="col-md-4">
            <div class="card">

                <div class="card-content collapse show">
                    <div class="card-body">


                      <form class="form"  method="post"  action="<?php echo base_url();?>staff_panel/adsdata/post_quote">
 
                           

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Message</h4>

                                

                                        <div class="form-group">
                                            
                                          <textarea name="qt_message" class="form-control" required></textarea>
                                        </div>

                                        <input type="hidden" value="<?=$result[0]->user_id; ?>" name="user_id">

                                        <input type="hidden" value="<?=base64_encode($result[0]->lbcontactId);?>" name="ads">

                                

                            </div>
                            <br>
                            <div class="form-body">
                                <button type="submit" class="btn btn-primary " id="">
                                    <i class="fa fa-check-square-o"></i> Send
                                </button>

                            </div>

                        </form>

                        <br>


                        <form class="form"  method="post"  action="<?php echo base_url();?>staff_panel/adsdata/post_notification">
 
                           

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Comment</h4>

                                <div class="form-group">
                                            
                                            <input type="text" class="form-control" placeholder="Title" name="comment_title"  required>
                                        </div>


                                        <div class="form-group">
                                            
                                          <textarea name="comment" class="form-control" required></textarea>
                                        </div>

                                        <input type="hidden" value="<?=$result[0]->user_id; ?>" name="user_id">

                                        <input type="hidden" value="<?=$result[0]->lbcontactId; ?>" name="ads_id">

                                

                            </div>
                            <br>
                            <div class="form-body">
                                <button type="submit" class="btn btn-primary " id="">
                                    <i class="fa fa-check-square-o"></i> Submit
                                </button>

                            </div>

                        </form>



<br>



<div class="listing_area table-responsive">
                       <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 
                                 <th>Details</th>
                                                                 
                                 
                              </tr>
                           </thead>
                           <tbody>

<?php
$i=0; 
foreach ($notification as $value) {
$i++; 
?>

                        <tr class="dview1">
                        <td class="add-img-selector">
                        <?=$i;?>                                 
                        </td>

                        <td class="ads-details-td">
                        <h4><?=$value->notice_title;?></h4>
                        <p> 
                            <strong> Posted On </strong>:
                                       <?=date('d-M-Y',strtotime($value->entry_date));?>
                                     
                        </p>


                         <p>                                               
                            
                        <strong>Description:</strong> <?=$value->description;?> 
                        </p>
                        </td>


                        </tr>
                             

<?php } ?>                            
                            
 
                             
                              
                              
                                                           
                              
                           </tbody>
                        </table>
                    </div>









                    </div>
                </div>
            </div>
        </div>
 -->


    </div>
</section>

        </div>
      </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#sub').click(function(){
      var val='<?=$result[0]->ppt_id;?>';
      var val2='<?=$post_st;?>';
      var verified_comments=$('#verified_comments').val();
      var ppt_verification_status=$('#ppt_verification_status').val();
      //alert(val2);
      $.ajax({
        method:'POST',
        url:'<?=base_url();?>staff_panel/adsdata/adsdata_checked',
        cache:false,
        data:{id:val,post_st:val2,verified_comments:verified_comments,ppt_verification_status:ppt_verification_status},
        Type:'text',
        success:function(response){
          //alert(response);
         // console.log(response);
          var html=response.trim();
          if(html>0){
            location.reload(true);
          }
        }

      });

    });

          });

</script>

      

      
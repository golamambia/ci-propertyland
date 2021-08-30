<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0"><?php echo ucfirst($user[0]->name);?>'s Profile</h3>
            
          </div>
          
        </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Verify Profile</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <!-- <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        
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

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>staff_panel/users/verify_edit_post/<?php echo $user[0]->id?>">
                            <div class="row justify-content-md-center1">
                                <div class="col-md-12">
                                    <div class="form-body">
                                      
                                        <div class="col-lg-12">

                                            <div class="form-group" style="" readonly>
                                                <label>Name</label>
                                    <input type="text" name="" id="name" class="form-control" placeholder="Name" value="<?=$user[0]->name;?>" readonly style="cursor: no-drop;">

                                    <div class="error_msg"><?php echo form_error('name'); ?></div>

                                </div>

                                        </div>
                                                 
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Your referral id</label>
                                    <label class="form-control" >
                                        <?=$user[0]->reference_id;?>
                                    </label>
                                    
                                </div>

                                        </div>
<!-- 
                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Email</label>

                                    <input type="email"  id="" class="form-control" placeholder="Email ID" value="<?=$user[0]->email;?>" autocomplete="off" readonly>

                                    

                                </div>

                                        </div> -->

                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Reference ID</label>
                                    <input type="text"  id="referred_by" class="form-control" placeholder="Reference ID" autocomplete="off" value="<?=$user[0]->referred_by;?>" readonly>

                                    

                                </div>

                                        </div>

                                      <!--   <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Mobile<span> *</span></label>
                                    <input type="text" name="phone" id="phone" pattern="[0-9]+" class="form-control numeric_input" placeholder="Mobile No" autocomplete="off" required value="<?=$user[0]->phone;?>" minlength="10" maxlength="11"  title="please enter number only">

                                    
                                </div>

                                        </div> -->
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>How do you want to be contacted?</label>
                                  <select class="form-control" name="" id="contact_mode" disabled="" style="cursor: no-drop;">

                                    <option value="">How do you want to be contacted?</option>

                                    <option <?php if($user[0]->contact_mode=="any"){ echo "selected"; }?> value="any">Any</option>

                                    <option <?php if($user[0]->contact_mode=="phone"){ echo "selected"; }?> value="phone">Phone</option>

                                    <option <?php if($user[0]->contact_mode=="email"){ echo "selected"; }?> value="email">Email</option>

                                    

                                  </select>

                                  <div class="error_msg"><?php echo form_error('contact_mode'); ?></div>

                                </div>
                            </div>
                                 
                                       
                                         <div class="col-lg-12">
                                        
                                        <div class="form-group">
                                             <label>User type<span> </span></label>
                                             <input type="hidden" name="" value="1">
                                  <select class="form-control" name="" id="user_type" disabled="" style="cursor: no-drop;">

                                    <option value="">User type</option>

                                    <option <?php if($user[0]->user_type=="individual"){ echo "selected"; }?> value="individual">Individual</option>

                                    <option <?php if($user[0]->user_type=="agent"){ echo "selected"; }?> value="agent">Agent</option>

                                    <option <?php if($user[0]->user_type=="builder"){ echo "selected"; }?> value="builder">Builder</option>

                                    

                                  </select>

                                  <div class="error_msg"><?php echo form_error('user_type'); ?></div>

                                </div>
                            </div>
                                       <!--  <div class="col-lg-12">

                                            <div class="form-group">

                                           <label>Country name<span> *</span></label>

                                          <input type="text"  id="" class="form-control" placeholder="Country" autocomplete="off" value="<?=$user[0]->country;?>" readonly>


                                        </div>

                                        </div> -->

                                       
                                       <!--  <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Date of birth<span> *</span></label>
                                                <input type="date" name="dob" id="dob" class="form-control" value="<?=$user[0]->dob;?>" placeholder="Date Of Birth" required />

                                            </div>

                                        </div> -->
                                       
                                        <div class="col-lg-12">
                                        <div class="form-group agent_proof" style="display: <?php if($user[0]->user_type=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                  <label>Identity proof</label>
                                   <!--  <input type="file" name="photo2" id="photo2"  class="form-control " placeholder="Mobile No" autocomplete="off"  title="Identity proof" >

                                    <div class="error_msg"><?php echo form_error('photo2'); ?></div> -->

                                </div>
                            </div>
                            <div class="col-lg-12">
                                
                                        <div class="form-group agent_proof" style="display: <?php if($user[0]->user_type=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                         

                                            <img style="width: 201px;" src="<?=base_url();?>uploads/register/<?=$user[0]->identity_proof;?>">

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group adrs" style="display: <?php if($user[0]->user_type=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Address with pincode</label>
                                    <input type="text" name="" id="address" class="form-control" placeholder="Address with pincode" value="<?php echo $user[0]->address?>" autocomplete="off" readonly style="cursor: no-drop;">

                                    <div class="error_msg"><?php echo form_error('address'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group adrs_landmark" style="display: <?php if($user[0]->user_type=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Landmark</label>
                                    <input type="text" name="" id="landmark" class="form-control" placeholder="Landmark" value="<?php echo $user[0]->landmark?>" autocomplete="off" readonly style="cursor: no-drop;">

                                    <div class="error_msg"><?php echo form_error('landmark'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group agent_ser" style="display: <?php if($user[0]->user_type=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Agent service</label>
                                    <textarea rows="6" name="" id="agent_service" class="form-control" placeholder="Agent service" autocomplete="off" readonly style="cursor: no-drop;"><?php echo $user[0]->agent_service;?></textarea>
                                    <div class="error_msg"><?php echo form_error('agent_service'); ?></div>

                                </div>
                            </div>

                       
                            <div class="col-lg-12">
                                <div class="form-group agent_builder_project" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Office or project name</label>
                                    <input type="text" name="" id="office_project_name" class="form-control" placeholder="Office or project name" value="<?php echo $user[0]->office_project_name;?>" autocomplete="off" readonly style="cursor: no-drop;">

                                    <div class="error_msg"><?php echo form_error('office_project_name'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                
                                        <div class="form-group agent_buil_ofc_photo" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                          <label>Office main photo</label> 

                                    <!-- <input type="file" name="photo3" id="photo3"  class="form-control " placeholder="Mobile No" autocomplete="off"   title="Office main photo">

                                    <div class="error_msg"><?php echo form_error('photo3'); ?></div> -->

                                </div>
                            </div>
                            <div class="col-lg-12">
                                
                                        <div class="form-group agent_buil_ofc_photo" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                         

                                            <img style="width: 201px;" src="<?=base_url();?>uploads/register/<?=$user[0]->office_photo;?>">

                                </div>
                            </div>

                  
                            
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Languages you can speak</label>
                                    <input type="text" name="" id="speak_lang" class="form-control" placeholder="Languages you can speak" value="<?php echo $user[0]->speak_lang;?>" autocomplete="off" readonly style="cursor: no-drop;">

                                    <div class="error_msg"><?php echo form_error('speak_lang'); ?></div>

                                </div>
                            </div>

                                        <div class="col-lg-12">
                                            <label>Profile Image<span> *</span></label>
                                            <div class="form-group " >
                                                
                                               <!--  <input type="file" class="custom-file-input" id="cropzee-input" accept="image/*" name="photo" <?php if($user[0]->user_photo==''){echo"";}?>>

                                                <label class="custom-file-label" for="customFile_file">Choose file</label> -->

                                            </div>
                                             <!-- <div id="carbon-block" align="center"></div> -->
                                        </div>
                                       <div class="col-lg-12">
                                
                                        <div class="form-group " >
                                         

                                            <img style="width: 201px;" src="<?=base_url();?>uploads/register/<?=$user[0]->user_photo;?>">

                                </div>
                            </div>
                                        <div class="col-lg-12">
                                        <div class="form-group social_media" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                            <label>Social media link</label>
                                    <input type="text" name="" id="social_media_link" class="form-control" placeholder="Social media link" value="<?php echo $user[0]->social_media_link;?>" autocomplete="off" readonly style="cursor: no-drop;">

                                    <div class="error_msg"><?php echo form_error('social_media_link'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group website_link" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Website link</label>
                                    <input type="text" name="" id="website" class="form-control" placeholder="Website link" value="<?php echo $user[0]->website;?>" autocomplete="off" readonly style="cursor: no-drop;">

                                    <div class="error_msg"><?php echo form_error('website'); ?></div>

                                </div>
                            </div>
                             <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>User status</label>
                                  <select class="form-control" name="status" id="status" required>

                                    <option value="">Status</option>

                                    <option <?php if($user[0]->status=="Active"){ echo "selected"; }?> value="Active">Active</option>

                                    <option <?php if($user[0]->status=="Inactive"){ echo "selected"; }?> value="Inactive">Blocked</option>
                                                                       

                                  </select>

                                  <div class="error_msg"><?php echo form_error('status'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12 bk_comm" style="display: <?php if($user[0]->status=="Inactive"){ echo "block"; }else{echo 'none';}?>;">
                                        <div class="form-group">
                                            <label>Blocked Comment</label>
                                  <textarea class="form-control" name="blocked_comment" id="blocked_comment" placeholder="Blocked comment"><?=$user[0]->blocked_comment;?></textarea>

                                    

                                  <div class="error_msg"><?php echo form_error('blocked_comment'); ?></div>

                                </div>
                            </div>
                   <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Verification status</label>
                                  <select class="form-control" name="verification_status" id="verification_status" required>

                                    <option value="">Status</option>

                                    <option <?php if($user[0]->verification_status=="verified"){ echo "selected"; }?> value="verified">Verified</option>

                                    <option <?php if($user[0]->verification_status=="pending"){ echo "selected"; }?> value="pending">Pending</option>
                                                                       

                                  </select>

                                  <div class="error_msg"><?php echo form_error('verification_status'); ?></div>

                                </div>
                            </div>
                                       <div class="col-lg-12 " >
                                        <div class="form-group">
                                            <label>Verification Comment</label>
                                  <textarea class="form-control" name="verified_comments" id="verified_comments" placeholder="Verification comment" required><?=$user[0]->verified_comments;?></textarea>

                                    

                                  <div class="error_msg"><?php echo form_error('verified_comments'); ?></div>

                                </div>
                            </div>
                                       

                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a href="<?php echo base_url();?>staff_panel/users/verify" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <?php if($user[0]->status=="Active" && $this->session->userdata('logged_in_stf')['user_type']=='support_staff'){?>
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

<div class="col-md-4">
    
            <div class="card">

                <div class="card-content collapse show">
                    <div class="card-body">


                      <!-- <form class="form"  method="post"  action="<?php echo base_url();?>staff_panel/adsdata/post_quote">
 
                           

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

                        <br> -->


                        <form class="form"  method="post"  action="<?php echo base_url();?>staff_panel/users/post_notification">
 
                           

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Comment</h4>

                                <div class="form-group">
                                            
                                            <input type="text" class="form-control" placeholder="Title" name="comment_title"  required>
                                        </div>


                                        <div class="form-group">
                                            
                                          <textarea name="comment" class="form-control" required></textarea>
                                        </div>

                                        <input type="hidden" value="<?php echo $user[0]->id?>" name="user_id">

                                        <input type="hidden" value="0" name="ads_id">

                                

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


    </div>
</section>

        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      
<script src="<?php echo base_url();?>assets_front/js/wow.min.js"></script> 
     <script>
    new WOW().init();
    </script>
 <script>
            function init() {
                var input = document.getElementById('locationTextField');
                var autocomplete = new google.maps.places.Autocomplete(input);
                var input2 = document.getElementById('address');
                var autocomplete2 = new google.maps.places.Autocomplete(input2);
            //     google.maps.event.addListener(autocomplete, 'place_changed', function () {
            //     var place = autocomplete.getPlace();
            //     //document.getElementById('city2').value = place.name;
            //     //document.getElementById('cityLat').value = place.geometry.location.lat();
            //     //document.getElementById('cityLng').value = place.geometry.location.lng();
            //    // console.log( place.name+place.geometry.location.lat());
            // });
            }
 
            google.maps.event.addDomListener(window, 'load', init);
        </script>
       <script type="text/javascript">

      $(document).ready(function(){
        //alert(1);
        $('#status').change(function(){
             var status = $('#status').val();
      if(status=='Inactive'){
        $('#blocked_comment').prop('required',true);
        $('.bk_comm').show();
      }else{
        $('#blocked_comment').prop('required',false);
        $('#blocked_comment').val('');
        $('.bk_comm').hide();
    }
  });

      $('#user_type').change(function(){
      var user_type = $('#user_type').val();
      if(user_type=='agent'){
        $('#address').prop('required',true);
        $('.adrs').show();
        $('#landmark').prop('required',true);
        $('.adrs_landmark').show();
        $('#agent_service').prop('required',true);
        $('.agent_ser').show();
         $('#photo2').prop('required',true);
        $('.agent_proof').show();
      }else{
        $('#address').prop('required',false);
        $('#address').val('');
        $('.adrs').hide();
        $('#landmark').prop('required',false);
        $('#landmark').val('');
        $('.adrs_landmark').hide();
         $('#agent_service').prop('required',false);
         $('#agent_service').val('');
        $('.agent_ser').hide();
        $('#photo2').prop('required',false);
        $('#photo2').val('');
        $('.agent_proof').hide();
      }

      if(user_type!='individual'){
        $('#photo3').prop('required',true);
        $('.agent_buil_ofc_photo').show();
        $('.agent_builder_project').show();
         $('#office_project_name').prop('required',true);
         $('.social_media').show();
         $('.website_link').show();
      }else{
$('#photo3').prop('required',false);
$('#photo3').val('');
        $('.agent_buil_ofc_photo').hide();
        $('.agent_builder_project').hide();
         $('#office_project_name').prop('required',false);
         $('#office_project_name').val('');
         $('.social_media').hide();
         $('.website_link').hide();
      }
                });

       });
            </script>

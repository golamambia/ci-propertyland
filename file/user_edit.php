<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0"><?php echo ucfirst($user[0]->name);?>'s Profile</h3>
            
          </div>
          
        </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Update Profile</h4>
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

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/user/user_edit_post/<?php echo $user[0]->id?>">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-body">
                                      
                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?=$user[0]->name;?>" >

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

                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Email</label>

                                    <input type="email"  id="" class="form-control" placeholder="Email ID" value="<?=$user[0]->email;?>" autocomplete="off" readonly>

                                    

                                </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Reference ID</label>
                                    <input type="text"  id="referred_by" class="form-control" placeholder="Reference ID" autocomplete="off" value="<?=$user[0]->referred_by;?>" readonly>

                                    

                                </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Mobile<span> *</span></label>
                                    <input type="text" name="phone" id="phone" pattern="[0-9]+" class="form-control numeric_input" placeholder="Mobile No" autocomplete="off" required value="<?=$user[0]->phone;?>" minlength="10" maxlength="11"  title="please enter number only">

                                    
                                </div>

                                        </div>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>How do you want to be contacted?</label>
                                  <select class="form-control" name="contact_mode" id="contact_mode" required>

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
                                             <input type="hidden" name="change_chk" value="1">
                                  <select class="form-control" name="user_type" id="user_type" required>

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
                                    <input type="file" name="photo2" id="photo2"  class="form-control " placeholder="Mobile No" autocomplete="off"  title="Identity proof" >

                                    <div class="error_msg"><?php echo form_error('photo2'); ?></div>

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
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address with pincode" value="<?php echo $user[0]->address?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('address'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group adrs_landmark" style="display: <?php if($user[0]->user_type=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Landmark</label>
                                    <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Landmark" value="<?php echo $user[0]->landmark?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('landmark'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group agent_ser" style="display: <?php if($user[0]->user_type=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Agent service</label>
                                    <textarea rows="6" name="agent_service" id="agent_service" class="form-control" placeholder="Agent service" autocomplete="off" ><?php echo $user[0]->agent_service;?></textarea>
                                    <div class="error_msg"><?php echo form_error('agent_service'); ?></div>

                                </div>
                            </div>

                       
                            <div class="col-lg-12">
                                <div class="form-group agent_builder_project" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Office or project name</label>
                                    <input type="text" name="office_project_name" id="office_project_name" class="form-control" placeholder="Office or project name" value="<?php echo $user[0]->office_project_name;?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('office_project_name'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                
                                        <div class="form-group agent_buil_ofc_photo" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                          <label>Office main photo</label> 

                                    <input type="file" name="photo3" id="photo3"  class="form-control " placeholder="Mobile No" autocomplete="off"   title="Office main photo">

                                    <div class="error_msg"><?php echo form_error('photo3'); ?></div>

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
                                    <input type="text" name="speak_lang" id="speak_lang" class="form-control" placeholder="Languages you can speak" value="<?php echo $user[0]->speak_lang;?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('speak_lang'); ?></div>

                                </div>
                            </div>

                                        <div class="col-lg-12">
                                            <label>Profile Image<span> *</span></label>
                                            <div class="custom-file mb-2">
                                                
                                                <input type="file" class="custom-file-input" id="cropzee-input" accept="image/*" name="photo" <?php if($user[0]->user_photo==''){echo"required";}?>>

                                                <label class="custom-file-label" for="customFile_file">Choose file</label>

                                            </div>
                                             <div id="carbon-block" align="center"></div>
                                        </div>
                                       
                                        <div class="col-lg-12">
                                        <div class="form-group social_media" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                            <label>Social media link</label>
                                    <input type="text" name="social_media_link" id="social_media_link" class="form-control" placeholder="Social media link" value="<?php echo $user[0]->social_media_link;?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('social_media_link'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group website_link" style="display: <?php if($user[0]->user_type!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                    <label>Website link</label>
                                    <input type="text" name="website" id="website" class="form-control" placeholder="Website link" value="<?php echo $user[0]->website;?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('website'); ?></div>

                                </div>
                            </div>
                  
                                       
                                       

                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a href="<?php echo base_url();?>apanel/user/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Update Now
                                </button>
                            </div>
                        </form> 

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

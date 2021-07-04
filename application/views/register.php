<!-- banner css Start -->

<style type="text/css">

  .field-icon{

    position: absolute;

    top: 15px;

    right: 5px;

    cursor: pointer;

  }

  .error_msg p{

    color: #e53935 !important;

  }

</style>

    <div class="banner_area text-center" style="background-image:url(<?php echo base_url();?>assets_front/images/bannerimg.jpg);">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="login_area">

                        <div class="login_left_part">

                            <h2>Hello</h2>

                            <p>Don't have an account? Create your account. It's take less then a minutes</p>

                            <h4>Login With Social Media</h4>

                            <ul>

                                <li><a href="<?=$this->facebook->login_url();?>" class="bg-facebook"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>

                                <li><a href="<?=$gmail_url;?>" class="bg-google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a></li>

                            </ul>

                        </div>

                        <div class="login_right_part">

                            <h2>Create Account</h2>

                            <?php if($this->session->flashdata('error')){?>



                              <div class="alert alert-danger alert-dismissable">

                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>

                  </div>                           

                   <?php } if($this->session->flashdata('message')){?>

                    <div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>

<p style="font-weight: 500;">For activation please check your email.</p>

</div>



                   <?php }?>



                            <p>Don't have an account? Create your account. It's take less then a minutes</p>
 
                            <form method="post"  action="<?=base_url();?>register/register_post" enctype="multipart/form-data">

                                <div class="form-group">

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(isset($_REQUEST['name'])){ echo $_REQUEST['name'];}?>" >

                                    <div class="error_msg"><?php echo form_error('name'); ?></div>

                                </div>

                                <div class="form-group">

                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email ID" value="<?php if(isset($_REQUEST['email'])){ echo $_REQUEST['email'];}?>" autocomplete="new-password" <?php if(!$this->session->userdata('logged_in_stf')['staff_id']){echo"required";}?>>

                                    <div class="error_msg"><?php echo form_error('email'); ?></div>

                                     <span id="error_msg" style="color:#e53935; "></span>

                                </div>
                                <input type="hidden" name="stf" value="<?=$this->input->get('stf',true);?>">

                                <div class="form-group">

                                    <input type="text" name="referred_by" id="referred_by" class="form-control" placeholder="Reference ID" autocomplete="off" value="<?php if(isset($_REQUEST['referred_by'])){ echo $_REQUEST['referred_by']; }?>">

                                    <span id="ref_msg" style="color:#e53935; "></span>

                                </div>

                                <div class="form-group">

                                    <input type="text" name="phone" id="phone" pattern="[0-9]+" class="form-control numeric_input" placeholder="Mobile No" autocomplete="off" required value="<?php if(isset($_REQUEST['phone'])){ echo $_REQUEST['phone']; }?>" minlength="10" maxlength="11"  title="please enter number only">

                                    <div class="error_msg"><?php echo form_error('phone'); ?></div>

                                </div>
                                <div class="form-group">

                                  <select class="form-control" name="contact_mode" id="contact_mode" required>

                                    <option value="">How do you want to be contacted?</option>

                                    <option <?php if(isset($_REQUEST['contact_mode']) && $_REQUEST['contact_mode']=="any"){ echo "selected"; }?> value="any">Any</option>

                                    <option <?php if(isset($_REQUEST['contact_mode']) && $_REQUEST['contact_mode']=="phone"){ echo "selected"; }?> value="phone">Phone</option>

                                    <option <?php if(isset($_REQUEST['contact_mode']) && $_REQUEST['contact_mode']=="email"){ echo "selected"; }?> value="email">Email</option>

                                    

                                  </select>

                                  <div class="error_msg"><?php echo form_error('contact_mode'); ?></div>

                                </div>
                                <div class="form-group">

                                  <select class="form-control" name="user_type" id="user_type" required>

                                    <option value="">User type</option>

                                    <option <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']=="individual"){ echo "selected"; }?> value="individual">Individual</option>

                                    <option <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']=="agent"){ echo "selected"; }?> value="agent">Agent</option>

                                    <option <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']=="builder"){ echo "selected"; }?> value="builder">Builder</option>

                                    

                                  </select>

                                  <div class="error_msg"><?php echo form_error('user_type'); ?></div>

                                </div>
                                  <div class="form-group">
                                    <label>Profile picture</label>
                                    <input type="file" name="photo" id="photo"  class="form-control " placeholder="Mobile No" autocomplete="off" required  title="Profile picture">

                                    <div class="error_msg"><?php echo form_error('photo'); ?></div>

                                </div>
                                <div class="form-group agent_proof" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']=="agent"){ echo "block"; }else{echo 'none';}?>;">
                                  <label>Identity proof</label>
                                    <input type="file" name="photo2" id="photo2"  class="form-control " placeholder="Mobile No" autocomplete="off"  title="Identity proof">

                                    <div class="error_msg"><?php echo form_error('photo2'); ?></div>

                                </div>
                                <div class="form-group agent_builder_project" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']!="individual"){ echo "block"; }else{echo 'none';}?>;">

                                    <input type="text" name="office_project_name" id="office_project_name" class="form-control" placeholder="Office or project name" value="<?php if(isset($_REQUEST['office_project_name'])){ echo $_REQUEST['office_project_name'];}?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('office_project_name'); ?></div>

                                </div>
                                <div class="form-group adrs" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']=="agent"){ echo "block"; }else{echo 'none';}?>;">

                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address with pincode" value="<?php if(isset($_REQUEST['address'])){ echo $_REQUEST['address'];}?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('address'); ?></div>

                                </div>
                                <div class="form-group adrs_landmark" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']=="agent"){ echo "block"; }else{echo 'none';}?>;">

                                    <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Landmark" value="<?php if(isset($_REQUEST['landmark'])){ echo $_REQUEST['landmark'];}?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('landmark'); ?></div>

                                </div>
                                <div class="form-group agent_ser" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']=="agent"){ echo "block"; }else{echo 'none';}?>;">

                                    <textarea rows="6" name="agent_service" id="agent_service" class="form-control" placeholder="Agent service" autocomplete="off" ><?php if(isset($_REQUEST['agent_service'])){ echo $_REQUEST['agent_service'];}?></textarea>
                                    <div class="error_msg"><?php echo form_error('agent_service'); ?></div>

                                </div>
                                
                                        <div class="form-group agent_buil_ofc_photo" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']!="individual"){ echo "block"; }else{echo 'none';}?>;">
                                          <label>Office main photo</label> 

                                    <input type="file" name="photo3" id="photo3"  class="form-control " placeholder="Mobile No" autocomplete="off"   title="Office main photo">

                                    <div class="error_msg"><?php echo form_error('photo3'); ?></div>

                                </div>
                                <div class="form-group">

                                    <input type="text" name="speak_lang" id="speak_lang" class="form-control" placeholder="Languages you can speak" value="<?php if(isset($_REQUEST['speak_lang'])){ echo $_REQUEST['speak_lang'];}?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('speak_lang'); ?></div>

                                </div>

                                <div class="form-group" style="position: relative;">

                                    <input type="password" name="password" id="password" onkeyup='check_pass();'  class="form-control" placeholder="Password" required value="<?php if(isset($_REQUEST['password'])){ echo $_REQUEST['password']; }?>">

                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                    <div class="error_msg"><?php echo form_error('password'); ?></div>

                                </div>

                                <div class="form-group">

                                    <input type="password" onkeyup='check_pass();'  class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="<?php if(isset($_REQUEST['confirm_password'])){ echo $_REQUEST['confirm_password']; }?>" required>

                                    <span id="pass_msg"></span>

                                    <div class="error_msg"><?php echo form_error('confirm_password'); ?></div>

                                </div>

                                <div class="form-group">

                                  <select class="form-control" name="know_tlb" id="know_tlb" required>

                                    <option value="">How did you come to know</option>

                                    <option <?php if(isset($_REQUEST['know_tlb']) && $_REQUEST['know_tlb']=="facebook"){ echo "selected"; }?> value="facebook">Facebook</option>

                                    <option <?php if(isset($_REQUEST['know_tlb']) && $_REQUEST['know_tlb']=="whatsapp"){ echo "selected"; }?> value="whatsapp">Whatsapp</option>

                                    <option <?php if(isset($_REQUEST['know_tlb']) && $_REQUEST['know_tlb']=="instagram"){ echo "selected"; }?> value="instagram">Instagram</option>

                                    <option <?php if(isset($_REQUEST['know_tlb']) && $_REQUEST['know_tlb']=="gmail"){ echo "selected"; }?> value="gmail">Gmail</option>

                                    <option <?php if(isset($_REQUEST['know_tlb']) && $_REQUEST['know_tlb']=="other"){ echo "selected"; }?> value="other">Other</option>

                                  </select>

                                  <div class="error_msg"><?php echo form_error('know_tlb'); ?></div>

                                </div>

                                <div class="form-group">

                                  <input type="text" name="know_tlb_other" id="know_tlb_other" class="form-control" <?php if(isset($_REQUEST['know_tlb']) && $_REQUEST['know_tlb']=="other"){ echo 'style="display:block;"'; }else{echo'style="display:none;"';}?> placeholder="Other Media" value="<?php if(isset($_REQUEST['know_tlb_other'])){ echo $_REQUEST['know_tlb_other']; }?>">

                                  <div class="error_msg"><?php echo form_error('know_tlb_other'); ?></div>

                                </div>
                                <div class="form-group social_media" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']!="individual"){ echo "block"; }else{echo 'none';}?>;">

                                    <input type="text" name="social_media_link" id="social_media_link" class="form-control" placeholder="Social media link" value="<?php if(isset($_REQUEST['social_media_link'])){ echo $_REQUEST['social_media_link'];}?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('social_media_link'); ?></div>

                                </div>
                                <div class="form-group website_link" style="display: <?php if(isset($_REQUEST['user_type']) && $_REQUEST['user_type']!="individual"){ echo "block"; }else{echo 'none';}?>;">

                                    <input type="text" name="website" id="website" class="form-control" placeholder="Website link" value="<?php if(isset($_REQUEST['website'])){ echo $_REQUEST['website'];}?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('website'); ?></div>

                                </div>
                                <div class="form-group">

                                    <input type="checkbox" <?php if(isset($_REQUEST['agreement']) && $_REQUEST['agreement']==1){ echo "checked"; }?> name="agreement" id="agreement" value="1" required > <a href="#">Accept the user Agreement</a>

                                    <div class="error_msg"><?php echo form_error('agreement'); ?></div>

                                </div>

                                <button type="submit" class="btn btn-primary sub" id="submit">Register</button>

                            </form>

                            <h5>Are you already a member?<a href="<?=base_url();?>register/login">Login</a></h5>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <script type="text/javascript">

      $(document).ready(function(){

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
       $('#email').keyup(function(){

                //alert(1);

                var email = $('#email').val();

                $.ajax({

                  type:"post",

                  url:'<?=base_url();?>register/GetEmail',

                  data:{email:email},

                  cache:false,

                  success:function(response){

                    console.log(response);

                    var html=response.trim();

                    if(html>0){

                      $('#error_msg').html('Email alredy exist!');

                      $('.sub').prop('disabled',true);

                    }else{

                      $('#error_msg').html('');

                      $('.sub').prop('disabled',false);

                    }



                  }

                });



            });

      });

    </script>

    <div class="banner_area text-center" style="background-image:url(<?=base_url();?>assets_front/images/bannerimg.jpg);">

        <div class="container">

            <div class="inner_banner_contant pt-0">

                <h2>Agent Details</h2>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Agent's - <?=$user_info[0]->name;?></li>

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

                  

<style type="text/css">
  
 input[type=text] {
 pointer-events: none;
}
</style>


                    <div class="col-lg-8 dashboard_main mt-3">

                        <div class="dashboard_mainbox">

                            <h3>Agent Info</h3>

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

                            <div class="dashboard_mainboby">

                               <!--  <h4 class="add_listing">Edit Profile</h4>

                                <p class="contain">All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p> -->

                                <div class="form_area mb-3">

                                    <form method="post" enctype="multipart/form-data" action="#">

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?=$user_info[0]->name;?>" >

                                    <div class="error_msg"><?php echo form_error('name'); ?></div>

                                </div>

                                        </div>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Agent id</label>
                                    <label class="form-control" >
                                        <?=$user_info[0]->id;?>
                                    </label>
                                    
                                </div>

                                        </div>
                                        <?php
                                        if($user_info[0]->contact_mode=="any" || $user_info[0]->contact_mode=="email"){?>
                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Email</label>

                                    <input type="email"  id="" class="form-control" placeholder="Email ID" value="<?=$user_info[0]->email;?>" autocomplete="off" readonly>

                                    

                                </div>

                                        </div><?php } if($user_info[0]->contact_mode=="any" || $user_info[0]->contact_mode=="phone"){?>

                                     

                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>Mobile<span> *</span></label>
                                    <input type="email" name="phone" id="phone" pattern="[0-9]+" class="form-control numeric_input" placeholder="Mobile No" autocomplete="off" required value="<?=$user_info[0]->phone;?>" minlength="10" maxlength="11"  title="please enter number only" readonly>

                                    
                                </div>

                                        </div>
                                    <?php }?>
                                         <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>Properties Tagged</label>
                                    <label class="form-control" >
                                        <?=$user_info[0]->agent_ppt_tag_cnt;?>
                                    </label>
                                    
                                </div>

                                        </div>
                                       
                                
                                        <div class="col-lg-12">

                                            <div class="form-group">

                                           <label>Country name<span> *</span></label>

                                          <input type="text"  id="" class="form-control" placeholder="Country" autocomplete="off" value="<?=$user_info[0]->country;?>" readonly>


                                        </div>

                                        </div>

                                       
                                        
                                        <?php if($user_info[0]->user_type=="agent"){?>
                                      
                            <div class="col-lg-12">
                                
                                        <div class="form-group " >
                                          <label>Profile Picture</label>

                                            <img style="width: 201px;" src="<?=base_url();?>uploads/register/<?=$user_info[0]->user_photo;?>">

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group adrs" >
                                    <label>Address with pincode</label>
                                    <input type="text" name="address" id="" class="form-control" placeholder="Address with pincode" value="<?php echo $user_info[0]->address?>" autocomplete="off" required>

                                    <div class="error_msg"><?php echo form_error('address'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group adrs_landmark" >
                                    <label>Landmark</label>
                                    <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Landmark" value="<?php echo $user_info[0]->landmark?>" autocomplete="off" required>

                                    <div class="error_msg"><?php echo form_error('landmark'); ?></div>

                                </div>
                            </div>
                           

                        <?php } if($user_info[0]->user_type!="individual"){?>
                            <div class="col-lg-12">
                                <div class="form-group agent_builder_project" >
                                    <label>Office or project name</label>
                                    <input type="text" name="office_project_name" id="office_project_name" class="form-control" placeholder="Office or project name" value="<?php echo $user_info[0]->office_project_name;?>" autocomplete="off" required>

                                    <div class="error_msg"><?php echo form_error('office_project_name'); ?></div>

                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                
                                        <div class="form-group " >
                                          <label>Office main photo</label> 

                                            <img style="width: 201px;" src="<?=base_url();?>uploads/register/<?=$user_info[0]->office_photo;?>">

                                </div>
                            </div>

                        <?php }?>
                            
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Languages you can speak</label>
                                    <input type="text" name="speak_lang" id="speak_lang" class="form-control" placeholder="Languages you can speak" value="<?php echo $user_info[0]->speak_lang;?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('speak_lang'); ?></div>

                                </div>
                            </div>

                                       
                                        <?php if($user_info[0]->user_type!="individual"){?>
                                        <div class="col-lg-12">
                                        <div class="form-group social_media" >
                                            <label>Social media link</label>
                                    <input type="text" name="social_media_link" id="social_media_link" class="form-control" placeholder="Social media link" value="<?php echo $user_info[0]->social_media_link;?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('social_media_link'); ?></div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group website_link" >
                                    <label>Website link</label>
                                    <input type="text" name="website" id="website" class="form-control" placeholder="Website link" value="<?php echo $user_info[0]->website;?>" autocomplete="off" >

                                    <div class="error_msg"><?php echo form_error('website'); ?></div>

                                </div>
                            </div>
                             <div class="col-lg-12">
                                <div class="form-group agent_ser" >
                                    <label>Agent service</label>
                                    <p><?php echo $user_info[0]->agent_service;?></p>
                                    <div class="error_msg"><?php echo form_error('agent_service'); ?></div>

                                </div>
                            </div>
                        <?php }?>

                                        <div class="col-lg-12">

                                          <!--   <button type="submit" class="btn btn-primary">Update</button> -->

                                        </div>

                                    </div>

                                    </form>

                                </div>

                                

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-4 dashboard_right mt-3">

                         <aside class="aside_area1">
                            <div class="aside_innerarea">
                               
                                <div class="aside_box">
                                    <h4>Location</h4>
                                    <div class="aside_body">
                                        <?php
                                     
                                          $addts=$user_info[0]->address.' '.$user_info[0]->landmark;  
                                        
                                        $address=str_replace(",", "", str_replace(" ", "+",$addts));
echo '<iframe width="" height="" frameborder="0" style="border:0;" allowfullscreen="" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' .$address. '&z=14&output=embed"></iframe>';

                                        ?>
                                       <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7774723.510965041!2d7.19826856760574!3d61.59229951227372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465cb2396d35f0f1%3A0x22b8eba28dad6f62!2sSweden!5e0!3m2!1sen!2sin!4v1576839434335!5m2!1sen!2sin" width="" height="" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
                                    </div>
                                </div>
                            
                            
                              
                            </div>
                        </aside>

                    </div>





                </div>

            </div>

        </div>

    </div>

    <!-- main_area css stop
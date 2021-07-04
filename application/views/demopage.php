
    <div class="banner_area text-center" style="background-image:url(<?=base_url();?>assets_front/images/bannerimg.jpg);">
        <div class="container">
            <div class="inner_banner_contant pt-0">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                            <h3>Profile</h3>
                            
                            <div class="dashboard_mainboby">
                                <h4 class="add_listing">Edit Profile</h4>
                                <p class="contain">All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
                                <div class="form_area mb-3">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url();?>profile/update_post">
                                    <div class="row">
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                           
                                           <select class="form-control" name="country" id="country" required>
                                            <option value="">--Select Country--</option>
                                            <?php 
                                             foreach ($country_list as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($value->id==$user_info[0]->country){echo"selected";} ?> value="<?=$value->id;?>"><?=$value->countryname;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="error_msg"><?php echo form_error('country'); ?></div>

                                        </div>
                                        </div>
                                        
                                      
                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
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
    <!-- main_area css stop
  <style type="text/css">
      .error_msg p{
    color: #e53935 !important;
  }
  </style>
  <!-- banner css Start -->
    <div class="banner_area text-center" style="background-image:url(<?php echo base_url(); ?>assets_front/images/bannerimg.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="login_area">
                        
                        <div class="login_right_part">
                            <h2>Password Recover</h2>
                            <?php if($this->session->flashdata('rserror')){?>

                              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('rserror');?></p>
                  </div>                           
                   <?php } ?>
                            <!-- <p>Don't have an account? Create your account. It's take less then a minutes</p> -->
                            <form action="<?=base_url();?>reset_password/change_password" method="post">
                                <div class="form-group">
                                    <input type="email" name="user_name" class="form-control" placeholder="User id or email id" value="<?php echo set_value('user_name'); ?>" required>
                                    <div class="error_msg"><?=form_error('user_name');?></div>
                                </div>
                               
                                <button type="submit" class="btn btn-primary">Reset Now</button>
                            </form>
                            <h5> <a href="<?=base_url();?>register/login">Click here for login</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner css stop -->
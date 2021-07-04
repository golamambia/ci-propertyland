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
                        <div class="login_left_part">
                            <h2>Hello</h2>
                            <p>Don't have an account? Create your account. It's take less then a minutes</p>
                            <h4>Login With Social Media</h4>
                            <ul>
                                <li><a href="<?php echo $fb_login_url; ?>" target="_blank" class="bg-facebook"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                                <li><a href="<?=$gmail_url;?>" class="bg-google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a></li>
                            </ul>
                        </div>
                        <div class="login_right_part">
                            <h2>Login</h2>
                            <?php if($this->session->flashdata('error')){?>

                              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('error');?></p>
                  </div>                           
                   <?php } if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>
                            <p>Don't have an account? Create your account. It's take less then a minutes</p>
                            <form action="<?=base_url();?>register/login_validation?log=<?=$this->input->get('log',true);?>" method="post">
                                <div class="form-group">
                                    <input type="email" name="user_name" class="form-control" placeholder="Email address" value="<?php echo set_value('user_name'); ?>" required>
                                    <div class="error_msg"><?=form_error('user_name');?></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
                                    <div class="error_msg"><?=form_error('password');?></div>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="<?=base_url();?>reset_password" class="btn btn-primary">Forgot Password</a>
                            </form>
                            <h5>Are you not a member yet? <a href="<?=base_url();?>register">Create an account</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner css stop -->
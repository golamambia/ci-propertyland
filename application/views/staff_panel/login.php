<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    
    <title>Staff Login</title>
    <link rel="apple-touch-icon" href="<?php echo base_url();?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets_front/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/fonts/meteocons/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/fonts/feather/style.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>app-assets/css/pages/timeline.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                       <!--  <img src="<?=base_url();?>app-assets/images/logo/stack-logo-dark.png" alt="branding logo1"> -->
                       <span style="font-size: 20px;font-weight: bold;"><?=$this->config->config['SITE_NAME'];?></span>
                    </div>
                    
                </div>
                <div class="card-content">
                    
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span> Use Account Details</span></p>
                    <div class="card-body">
                      <?php if($this->session->flashdata('loginerror')!=''){?>
              <div class="alert alert-fill-danger" style="background-color:#f9d2d5; padding:10px;text-align:center;">
                <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                <strong style="color:#900;"><?php echo @$this->session->flashdata('loginerror');?></strong>
              </div>
              <?php }?>

              <?php if($this->session->flashdata('success')!=''){?>
                  <center>
                      <div class="alert alert-success" > <strong><?php echo @$this->session->flashdata('success');?></strong> </div>
                  </center>
              <?php }
              if($this->session->flashdata('error')){?>

                               <div class="alert alert-fill-danger" style="background-color:#f9d2d5; padding:10px;text-align:center;">
                <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                <strong style="color:#900;"><?php echo @$this->session->flashdata('error');?></strong>
              </div>                    
                   <?php }?>
                        <form class="form-horizontal" action="<?php echo base_url();?>staff_panel/main/login_validation" method="POST">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="email" class="form-control" required="" id="username" placeholder="Username" name="username" value="<?=$this->input->cookie('user');?>">
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" class="form-control" required="" value="<?=$this->input->cookie('pass');?>" >
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                    <fieldset>
                                        <input type="checkbox" id="remember-me" name="remember_me" class="chk-remember" value="on" <?php if($this->input->cookie('user')!=''){ ?> checked="checked" <?php } ?>>
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="<?php echo base_url();?>staff_panel/main/forgot_password" class="card-link">Forgot Password?</a></div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> Login</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->
<!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>app-assets/js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/core/app.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

</html>
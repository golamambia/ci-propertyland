<!-- BEGIN: Main Menu-->
<style type="text/css">
	.mn_act_cls{
		background: #1b9b9d !important;
	}
</style>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" navigation-header"><span>Staff Panel</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          
          
          <li class="nav-item"><a href="<?php echo base_url();?>staff_panel/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          
          
        
         <!-- 
          
         <li class="nav-item has-sub <?php if($this->router->fetch_class()=='notification'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title" data-i18n="">Customer Notice </span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/notification/">Notification List</a>
              </li>
              
              
            </ul>
          </li>

<li class="nav-item has-sub <?php if($this->router->fetch_class()=='support'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Customer Chat</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='ads_user_list'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/support/ads_user_list">Chat List</a>
              </li>
                            
            </ul>
          </li>
          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='quote'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Message</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/quote/">Message List</a>
              </li>
                            
            </ul>
          </li>
          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='report'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Report & Complaint</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index' || $this->router->fetch_method()=='report_list'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/report/">Report Error List</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='complaint_list'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/report/complaint_list">Complaint List</a>
              </li>
              
            </ul>
          </li>


          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='adsdata' || $this->router->fetch_class()=='complaint'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Ads Section</span><span class="badge badge badge-primary badge-pill float-right mr-2">6</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/">Ads All list</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='pending'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/pending">Ads pending list</a>
              </li>

              <li class="<?php if($this->router->fetch_method()=='approved'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/approved">Ads approved list</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='approved_you'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/approved_you">Approved by you</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='complaint_ads'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/complaint_ads">Complaint ads</a>
              </li>

              <li class="<?php if($this->router->fetch_method()=='report_ads'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/report_ads">Report ads</a>
              </li>
              
              
            </ul>
          </li>

                  
           -->
             <li class="nav-item has-sub <?php if($this->router->fetch_class()=='staff'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title" data-i18n="">Staff</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index' && $this->router->fetch_class()=='staff'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/staff/">Staff list</a>
              </li>
            
            </ul>
          </li>

          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='users'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title" data-i18n="">Users</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='profile'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/users/register_user">Register user</a>
              </li>
               <li class="<?php if($this->router->fetch_method()=='index' && $this->router->fetch_class()=='users'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/users/">User List</a>
              </li>
               <li class="<?php if($this->router->fetch_method()=='payment' && $this->router->fetch_class()=='users'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/users/payment">User payments</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='verify' && $this->router->fetch_class()=='users'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/users/verify">Verify users</a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='adsdata' || $this->router->fetch_class()=='complaint'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Ads Section</span><span class="badge badge badge-primary badge-pill float-right mr-2">6</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/">Ads All list</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='pending'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/pending">Ads pending list</a>
              </li>

              <li class="<?php if($this->router->fetch_method()=='approved'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/approved">Ads approved list</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='approved_you'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/approved_you">Approved by you</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='complaint_ads'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/complaint_ads">Complaint ads</a>
              </li>

              <li class="<?php if($this->router->fetch_method()=='report_ads'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/adsdata/report_ads">Report ads</a>
              </li>
              
              
            </ul>
          </li>

          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='settings'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-settings"></i><span class="menu-title" data-i18n="">Settings</span><span class="badge badge badge-primary badge-pill float-right mr-2">2</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='profile'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/settings/profile">Profile</a>
              </li>
              <!-- <li class="<?php if($this->router->fetch_method()=='general'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/settings/general">General Setting</a>
              </li> -->
              <li class="<?php if($this->router->fetch_method()=='change_password'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>staff_panel/settings/change_password">Change Password</a>
              </li>
              
            </ul>
          </li>
          
          
        </ul>



      </div>
    </div>
    <!-- END: Main Menu-->
    <div class="app-content content">
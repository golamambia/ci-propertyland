<!-- BEGIN: Main Menu-->

<style type="text/css">

	.mn_act_cls{

		background: #1b9b9d !important;

	}

</style>

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">

      <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class=" navigation-header"><span>Admin Panel</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>

          </li>

          

          

          <li class="nav-item"><a href="<?php echo base_url();?>apanel/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>

          </li>

          

          

          

          <!-- <li class="nav-item has-sub"><a href="#"><i class="ft-edit"></i><span class="menu-title" data-i18n="">Forms</span></a>

            <ul class="menu-content" style="">

              <li class="has-sub"><a class="menu-item" href="#">Form Elements</a>

                <ul class="menu-content">

                  <li><a class="menu-item" href="form-inputs.html">Form Inputs</a>

                  </li>

                  

                </ul>

              </li>

              

              <li class=""><a class="menu-item" href="form-repeater.html">Form Repeater</a>

              </li>

            </ul>

          </li> -->

         <!--  <li class="nav-item has-sub <?php if($this->router->fetch_class()=='location'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-calendar"></i><span class="menu-title" data-i18n="">Area Section</span><span class="badge badge badge-primary badge-pill float-right mr-2">2</span></a>

            <ul class="menu-content" style="">



               <li class="has-sub <?php if($this->router->fetch_method()=='country'){echo "open";}?>"><a class="menu-item" href="#">Country</a>

                <ul class="menu-content">

                  <li class="<?php if($this->router->fetch_method()=='country'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/location/country">Country List</a>

                  </li>

                  

                </ul>

              </li>

            <li class="has-sub <?php if($this->router->fetch_method()=='state'){echo "open";}?>"><a class="menu-item" href="#">State</a>

                <ul class="menu-content">

                  <li class="<?php if($this->router->fetch_method()=='state'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/location/state">State List</a>

                  </li>

                  

                </ul>

              </li>

              <li class="has-sub <?php if($this->router->fetch_method()=='city'){echo "open";}?>"><a class="menu-item" href="#">City</a>

                <ul class="menu-content">

                  <li class="<?php if($this->router->fetch_method()=='city'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/location/city">City List</a>

                  </li>

                  

                </ul>

              </li> 



             

             

            </ul>

          </li> -->

         

          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='staff' && $this->router->fetch_method()=='index'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title" data-i18n="">Staff</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>

            <ul class="menu-content" style="">

              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/staff/">Staff List</a>

              </li>

              

              

            </ul>

          </li>

          
          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='user'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title" data-i18n="">Users</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>

            <ul class="menu-content" style="">

              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/user/">User List</a>

              </li>

              

              

            </ul>

          </li>

<li class="nav-item has-sub <?php if($this->router->fetch_class()=='adsdata' || $this->router->fetch_class()=='complaint'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Ads Section</span><span class="badge badge badge-primary badge-pill float-right mr-2">6</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/adsdata/">Ads All list</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='pending'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/adsdata/pending">Ads pending list</a>
              </li>

              <li class="<?php if($this->router->fetch_method()=='approved'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/adsdata/approved">Ads approved list</a>
              </li>
              <!-- <li class="<?php if($this->router->fetch_method()=='approved_you'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/adsdata/approved_you">Approved by you</a>
              </li> -->
              <li class="<?php if($this->router->fetch_method()=='complaint_ads'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/adsdata/complaint_ads">Complaint ads</a>
              </li>

              <li class="<?php if($this->router->fetch_method()=='report_ads'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/adsdata/report_ads">Report ads</a>
              </li>
              
              
            </ul>
          </li>



        <!--   <li class="nav-item has-sub <?php if($this->router->fetch_class()=='notification'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title" data-i18n="">Customer Notice </span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>

            <ul class="menu-content" style="">

              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/notification/">Notification List</a>

              </li>

              

              

            </ul>

          </li> -->
<!-- <li class="nav-item has-sub <?php if($this->router->fetch_class()=='support'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Team Chat</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='manager_list'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/support/manager_list">Chat List</a>
              </li>
                            
            </ul>
          </li> -->

          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='quote'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Message</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/quote/">Message List</a>
              </li>
                            
            </ul>
          </li>



            <li class="nav-item has-sub <?php if($this->router->fetch_class()=='payment'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Payments</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/payment/">Payment List</a>
              </li>
                            
            </ul>
          </li>




<!--                                   <li class="nav-item has-sub <?php if($this->router->fetch_class()=='complaint'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Complaint</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>

            <ul class="menu-content" style="">

              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/complaint/">Complaint List</a>

              </li>

              

              

            </ul>

          </li> -->

 <!--            <li class="nav-item has-sub <?php if($this->router->fetch_method()=='report_list'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Report</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>

            <ul class="menu-content" style="">

              <li class="<?php if($this->router->fetch_method()=='report_list'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/complaint/report_list">Report List</a>

              </li>

              

               

            </ul>

          </li> -->
         <li class="nav-item has-sub <?php if($this->router->fetch_class()=='report'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-file"></i><span class="menu-title" data-i18n="">Report & Complaint</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index' || $this->router->fetch_method()=='report_list'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/report/">Report Error List</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='complaint_list'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/report/complaint_list">Complaint List</a>
              </li>
              
            </ul>
          </li>







          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='settings'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-settings"></i><span class="menu-title" data-i18n="">Settings</span><span class="badge badge badge-primary badge-pill float-right mr-2">3</span></a>

            <ul class="menu-content" style="">

              <li class="<?php if($this->router->fetch_method()=='profile'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/settings/profile">Profile</a>

              </li>

              <li class="<?php if($this->router->fetch_method()=='general'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/settings/general">General Setting</a>

              </li>

              <li class="<?php if($this->router->fetch_method()=='change_password'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/settings/change_password">Change Password</a>

              </li>

              

            </ul>

          </li>

          

          

        </ul>







      </div>

    </div>

    <!-- END: Main Menu-->

    <div class="app-content content">
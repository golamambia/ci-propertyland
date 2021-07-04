<?php $url_array = explode('/',trim($_SERVER['REQUEST_URI'],'/'));?>

<aside class="sidebar-menu fixed<?php if($this->session->userdata('sidebar-mini') == 1 ){ ?> sidebar-mini<?php } ?>">

  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">

    <div class="sidebar-inner scrollable-sidebar" style="overflow: hidden; width: auto; height: 100%;">

      <div class="main-menu">

        <ul class="accordion">

          <?php /*?><?php

		  	if($this->session->userdata('executive') == '0'){

		  ?>

              <!-------------------------------------------------- Page Management -------------------------------------------------------->

              <li class="bg-palette2 <?php if(isset($url_array[3]) AND ($url_array[3] == 'all-pages' OR $url_array[3] == 'add-page' OR $url_array[3] == 'edit-page')){ ?>active<?php } ?>"> <a href="<?php echo base_url()."backend/all-pages"; ?>"> <span class="menu-content block"> <span class="menu-icon"><i class="block fa fa-files-o fa-lg"></i></span> <span class="text m-left-sm">Pages</span></span> <span class="menu-content-hover block"> Page </span> </a> </li>

              

              <!-------------------------------------------------- Menu Management -------------------------------------------------------->

              <li class="openable bg-palette2 <?php if(isset($url_array[3]) AND ($url_array[3] == 'header-menu' OR $url_array[3] == 'add-header-menu' OR $url_array[3] == 'manage-header-menu-order' OR $url_array[3] == 'footer-menu' OR $url_array[3] == 'add-footer-menu' OR $url_array[3] == 'manage-footer-menu-order')){ ?>active open<?php } ?>"> <a href="#"> <span class="menu-content block"> <span class="menu-icon"><i class="block fa fa-list fa-lg"></i></span> <span class="text m-left-sm">Menu Management</span> <span class="submenu-icon"></span> </span> <span class="menu-content-hover block"> Menus </span> </a>

                <ul class="submenu">

                  <li <?php if(isset($url_array[3]) AND ($url_array[3] == 'header-menu' OR $url_array[3] == 'add-header-menu' OR $url_array[3] == 'manage-header-menu-order')){ ?>class="active"<?php } ?>><a href="<?php echo base_url()."backend/header-menu"; ?>"><span class="submenu-label">Heder Menu</span></a></li>

                </ul>

              </li>          

          <?php

			}

		  ?>  <?php */?>  

          <!-------------------------------------------------- Page Management -------------------------------------------------------->

              <li class="bg-palette2 <?php if(isset($url_array[3]) AND ($url_array[3] == 'all-pages' OR $url_array[3] == 'add-page' OR $url_array[3] == 'edit-page')){ ?>active<?php } ?>"> <a href="<?php echo base_url()."backend/all-pages"; ?>"> <span class="menu-content block"> <span class="menu-icon"><i class="block fa fa-files-o fa-lg"></i></span> <span class="text m-left-sm">Pages</span></span> <span class="menu-content-hover block"> Page </span> </a> </li>

          

          

          <li class="bg-palette2 <?php if(isset($url_array[3]) AND ($url_array[3] == 'all-bookings')){ ?>active<?php } ?>"> <a href="<?php echo base_url()."backend/all-bookings"; ?>"> <span class="menu-content block"> <span class="menu-icon"><i class="block fa fa-plane  fa-lg"></i></span> <span class="text m-left-sm">Booking</span></span> </span> <span class="menu-content-hover block"> Booking </span> </a> </li> 

          

          <!----------------------------------------------  Profile Management -------------------------------------------------------->

          <li class="bg-palette2 <?php if(isset($url_array[3]) AND ($url_array[3] == 'all-users' OR $url_array[3] == 'add-user' OR $url_array[3] == 'view-user')){ ?>active<?php } ?>"> <a href="<?php echo base_url()."backend/all-users"; ?>"> <span class="menu-content block"> <span class="menu-icon"><i class="block fa fa-users fa-lg"></i></span> <span class="text m-left-sm">Users</span></span> <span class="menu-content-hover block"> Users </span> </a> </li>

          <li class="bg-palette2 <?php if(isset($url_array[3]) AND $url_array[3] == 'my-profile'){ ?>active<?php } ?>"> <a href="<?php echo base_url()."backend/my-profile"; ?>"> <span class="menu-content block"> <span class="menu-icon"><i class="block fa fa-user fa-lg"></i></span> <span class="text m-left-sm">Profile</span></span> <span class="menu-content-hover block"> Profile </span> </a> </li>

          

          <?php /*?><!------------------------ Contact Management ------------------------------------>

          <li class="bg-palette2 <?php if(isset($url_array[3]) AND ($url_array[3] == 'all-contacts' OR $url_array[3] == 'view-contact')){ ?>active<?php } ?>"> <a href="<?php echo base_url()."backend/all-contacts"; ?>"> <span class="menu-content block"> <span class="menu-icon"><i class="block fa fa-phone-square fa-lg"></i></span> <span class="text m-left-sm">Contact</span>  <small class="badge badge-danger badge-square bounceIn animation-delay5 m-left-xs"><?php echo $unread_contact; ?></small> </span> </span> <span class="menu-content-hover block"> Contact </span> </a> </li>  <?php */?>

                 

        </ul>

      </div>

      <div class="sidebar-fix-bottom clearfix"> <a href="<?php echo base_url(); ?>backend/logout" class="font-18"><i class="fa fa-power-off"></i></a>

        <?php /*?><a href="lockscreen.html" class="pull-right font-18"><i class="fa fa-lock"></i></a><?php */?>

      </div>

    </div>

  </div>

</aside>


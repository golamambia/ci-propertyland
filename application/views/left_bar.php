<style type="text/css">
	.leftbar_act{
		background-color: #e53935;
    padding-left: 10px !important;
    /*color: #ffe1e1;*/
    color: #ffffff !important;
	}
</style>
<?php 
 $page_con=$this->router->fetch_class(); 
$page_fun=$this->router->fetch_method(); 
$user_data=$this->General_model->show_data_id('user_table',$this->session->userdata('front_sess')['userid'],'id','get','');
?>
<div class="dashboardleft_box clearfix">
                            <figure class="user_thumble image-previewer" data-cropzee="cropzee-input">
                            	<?php if($user_data[0]->user_photo!=''){?>
                                <img src="<?=base_url();?>uploads/register/<?=$user_data[0]->user_photo;?>" alt="">
                                <?php }else{?>
                                	 <img src="<?=base_url();?>assets_front/images/videro_bg.jpg" alt="">
                                <?php } ?>
                                <div class="name"><h3><?=ucfirst($user_data[0]->name);?></h3></div>
                            </figure>
                            <ul class="user_list clearfix">
                                <li><span><?=profileCount();?>%</span> profile complete</li>
                                <li><span class="noteno"><?=countNotice();?></span> Notifications</li>
                            </ul>
                        </div>
                        <div class="dashboardleft_box clearfix">
                            <div class="dashboard_menu">
                                <ul>
						<li>
							<a href="<?php echo base_url();?>dashboard" class="tz-lma <?php if($page_con=='dashboard' && $page_fun=='index'){echo"leftbar_act";} ?>"><img src="<?php echo base_url(); ?>assets_front/images/dbl1.png" alt=""> My Dashboard</a>
						</li>
						<li>
							<a href="<?=base_url();?>lbcontacts" <?php if($page_con=='category' || $page_con =='lbcontacts'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl2.png" alt=""> Ad Post</a>
						</li>
						 <li>
							<a href="<?=base_url();?>adslist" <?php if($page_con =='adslist' && $page_fun =='index'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl3.png" alt="">Ads List</a>
						</li>
						<?php if($this->session->userdata('front_sess')['user_type']=='agent'){?>
						<li>
							<a href="<?=base_url();?>adslist/propertytagged_list" <?php if($page_con =='adslist' && $page_fun =='propertytagged_list'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl3.png" alt="">Tagged Properties</a>
						</li>
						<?php }?>
						<li>
							<a href="<?=base_url();?>noticeboard" <?php if($page_con =='noticeboard'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl3.png" alt="">Notice Board</a>
						</li>

						<li>
							<a href="<?=base_url();?>chat" <?php if($page_con =='chat'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl3.png" alt="">Support Team</a>
						</li>
						<li>
							<a  href="<?=base_url();?>messages" <?php if($page_con =='quote' && $page_fun =='index'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl14.png" alt=""> Messages <span class="quoteno">(<?=countQuote();?>)</span></a>
						</li>
						<li>
							<a  href="<?=base_url();?>report" <?php if($page_con =='report' && $page_fun =='index'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl14.png" alt=""> Reported Error <span class="reportno">(<?=countReport();?>)</span></a>
						</li>
						<li>
							<a  href="<?=base_url();?>report/complaint_list" <?php if($page_con =='report' && $page_fun =='complaint_list'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl14.png" alt=""> Complaint List <span class="cmptno">(<?=countComplaint();?>)</a>
						</li>
						<li>
							<a  href="<?=base_url();?>quote/favourite_list" <?php if($page_con =='quote' && $page_fun =='favourite_list'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl14.png" alt=""> Favourite</a>
						</li>
						<li>
							<a  href="<?=base_url();?>review/review_list" <?php if($page_con =='review' && $page_fun =='review_list'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl14.png" alt=""> Review</a>
						</li>
                        <!-- <li>
							<a href="<?=base_url();?>message" <?php if($page_con =='message'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl14.png" alt=""> Message</a>
						</li> --> 
						<li>
							<a href="<?=base_url();?>payment/history" <?php if($page_con=='payment' && $page_fun =='history'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl1.png" alt="">Payment history</a>
						</li>
						<li>
							<a href="<?=base_url();?>dashboard/save_location" <?php if($page_con=='save_location'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl1.png" alt="">Save Location</a>
						</li>
						<li>
							<a href="<?=base_url();?>profile" <?php if($page_con=='profile'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/dbl6.png" alt=""> My Profile</a>
						</li>
						<?php

						
						if($user_data[0]->oauth_provider=='normal'){
						?>
						<li>
							<a href="<?=base_url();?>setting/change_password" <?php if($page_con=='setting'){echo"class='leftbar_act'";} ?>><img src="<?php echo base_url(); ?>assets_front/images/change_pass.png" alt=""> Change Password</a>
						</li>
					<?php }?>
						<!-- <li>
							<a href="#"><img src="<?php echo base_url(); ?>assets_front/images/db21.png" alt=""> Invoice</a>
						</li>
                        <li>
							<a href="#"><img src="<?php echo base_url(); ?>assets_front/images/dbl15.png" alt=""> Payments</a>
						</li>
						<li>
							<a href="#"><img src="<?php echo base_url(); ?>assets_front/images/dbl210.png" alt="">  Setting</a>
						</li> -->
                        <li>
							<a href="<?=base_url();?>dashboard/logout"><img src="<?php echo base_url(); ?>assets_front/images/dbl12.png" alt="">  Log Out</a>
						</li>
					
						
					</ul>
                            </div>
                        </div>

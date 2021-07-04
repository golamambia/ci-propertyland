

    <!-- banner css Start -->
    <div class="banner_area text-center" style="background-image:url(<?php echo base_url(); ?>assets_front/images/bannerimg.jpg);">
        <div class="container">
            <div class="inner_banner_contant pt-0">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Messages</li>
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
                            <h3>Error Messages</h3>
                            <div class="dashboard_mainboby">
                                <div class="dashboard-wrapper">
                                <div class="row offers-messages">
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 d-flex flex-wrap align-content-stretch pl-0 pr-0">
                                    <div class="offers-box">
                                    <div class="dashboardboxtitle">
                                    <h2>User</h2>
                                    </div>
                                    <ul class="offers-user-online clearfix">
                                      <?php
                                     // echo"<pre>";
                                      //print_r($user_list);
                                      foreach ($user_list as $key => $value) {
                                        $status = '';
             $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 50 second');
             $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
             $user_last_activity =  $value->rpt_entry_date;
             if($user_last_activity > $current_timestamp)
             {
              $status = 'Online';
             }
             else
             {
              $status = 'Offline';
             }
             $user_photo=$value->user_photo;
                                     ?>
                                    <li class="offerer">
                                        <figure>
                                          <?php if($user_photo!=''){
                                            ?>
                                             <img src="<?php echo base_url(); ?>assets_front/images/<?=$user_photo;?>" alt="">
                                            <?php 
                                          }else{?>
                                        <img src="<?php echo base_url(); ?>assets_front/images/quote_user.png" alt="">
                                      <?php }?>
                                        </figure>
                                        <span class="bolticon"></span>
                                        <div class="user-name">
                                           <h4><a href="<?php echo base_url(); ?>report/reported_list?ads=<?=base64_encode($ads);?>&user=<?=base64_encode($value->id);?>"><?=$value->name;?></a></h4>
                                           <h5><!-- <?=$status;?> --><?php $msg_no=unreadReport($value->id,$value->lbcontactId,$this->session->userdata('front_sess')['userid']);

                                           if($msg_no>0){
                                            echo $msg_no;
                                           }
                                           ?></h5>
                                        </div>
                                    </li>
                                    <?php }?>
                                   </ul>
                                  </div>
                                </div>
                                
                                
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 d-flex flex-wrap align-content-stretch pl-0 pr-0">
                                  <?php 
                                        if($ads && $user){
                                          $chat_uphoto=$chat_user_photo[0]->user_photo;
                                          ?>
                                   
                                    <div class="chatmassage">
      <div class="chat-header clearfix">
       <?php if($chat_uphoto!=''){
                                            ?>
                                             <img src="<?php echo base_url(); ?>assets_front/images/<?=$chat_uphoto;?>" alt="">
                                            <?php 
                                          }else{?>
                                        <img src="<?php echo base_url(); ?>assets_front/images/quote_user.png" alt="">
                                      <?php }?>
        
        <div class="chat-about">
          <div class="chat-with">Message with <?=ucfirst(getUser($user));?></div>
          <div class="chat-num-messages">total <?=totalChatReport($user,$ads,$this->session->userdata('front_sess')['userid']);?> messages</div>
          <div class="chat-num-messages" style="
    float: right;
    color: #e00a0a;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    line-height: 3px;
">Clear chat &nbsp;<i class="fa fa-trash"></i></div>
        </div>
       <!--  <i class="fa fa-star"></i> -->
      </div> <!-- end chat-header -->
      
      <div class="chat-history">
        <ul>
          <?php
                                      //echo"<pre>";
                                     // print_r($user_list);
                                      foreach ($msg_list as $key => $value) {
                                        if(date('M d, Y')==date('M d, Y',strtotime($value->rpt_entry_date))){
                                          $chat_date='Today';
                                        }else{
                                          $chat_date=date('M d, Y',strtotime($value->rpt_entry_date));
                                        }
                                       
                          $chat_time = new DateTime($value->rpt_entry_date);
                          
                                      //echo  $value->qt_userid;
                                        if($value->rpt_userid==$this->session->userdata('front_sess')['userid'])
                              {
                               $user_name = 'You';


                               ?>
                          
          <li class="clearfix">
            <div class="message-data align-right">
              <span class="message-data-time" ><?=$chat_time->format('h:i A');?>, <?=$chat_date;?></span> &nbsp; &nbsp;
              <span class="message-data-name" ><?=ucfirst($user_name);?></span> <i class="fa fa-circle me"></i>
              
            </div>
            <div class="message other-message float-right">
             <?=$value->rpt_message;?>
            </div>
          </li>
          
                               <?php 
                              }
                              else
                              {
                               $user_name = getUser($value->rpt_userid);


                               ?>


                                    <li class="clearfix">
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i> <?=ucfirst($user_name);?></span>
              <span class="message-data-time"><?=$chat_time->format('h:i A');?>, <?=$chat_date;?></span>
            </div>
            <div class="message my-message">
             <?=$value->rpt_message;?>
            </div>
          </li>


                               <?php 
                              }

                                     ?>
          
          
           <?php }?>

          
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
        <form method="post">
        <textarea name="rpt_message" id="message-to-send" placeholder ="Type your message" rows="3" required></textarea>
                
        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i>
        
        <button type="submit">Send</button>
</form>
      </div> <!-- end chat-message -->
      
    </div> 

                      <?php 
                                      }else{

                                        ?>
                                        <div class="chat-message-box">
                                        <div class="dashboardboxtitle">
                                             <h2>Message Dashboard</h2>
                                        </div>
                                        
                                        <div class="offerermessage">
                                            
                                            <div class="description">
                                               
                                                  <p>Welcome to Local Browse</p>
                                               
                                            </div>
                                        </div>
                                        


                                    </div>

                                        <?php 
                                      }
                                      ?>





                                    </div>
                                
                                
                                
                                
                                </div>
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
    <!-- main_area css stop -->
    
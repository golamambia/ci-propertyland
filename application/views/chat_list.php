

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
                            <h3>Chat List</h3>
                            <div class="dashboard_mainboby">
                                <div class="dashboard-wrapper">
                                <div class="row offers-messages">

                                
                                
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap align-content-stretch pl-0 pr-0">
                                                                     
                                    <div class="chatmassage">

      
      <div class="chat-history">
        <ul>
                    
<?php foreach ($chat as $value) { 

if($value->reciver_id==0){

?>

<li class="clearfix">
<div class="message-data align-right">
<span class="message-data-time"><?php echo $value->entry_date; ?></span> &nbsp; &nbsp;
<span class="message-data-name">You</span> <i class="fa fa-circle me"></i>

</div>
<div class="message other-message float-right">
<?php echo $value->chat_text; ?>            </div>
</li>

<?php
}else{ 
$sender=$this->General_model->show_data_id('staff_table',$value->sender_id,'id','get','');

$sender_name=$sender[0]->name;
  ?>


<li class="clearfix">
  <div class="message-data">
  <span class="message-data-name"><i class="fa fa-circle online"></i><?php echo $sender_name; ?></span>
  <span class="message-data-time"><?php echo $value->entry_date; ?></span>
  </div>
  <div class="message my-message">
  <?php echo $value->chat_text; ?>            </div>
  </li>



<?php
}
} 
?>
  

        
                                    

 

           
          
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">

          <form action="<?php echo base_url(); ?>chat/post_chat" method="post">
          <textarea name="qt_message" id="message-to-send" placeholder="Type your message" rows="3" required=""></textarea>

          <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
          <i class="fa fa-file-image-o"></i>

          <button type="submit">Send</button>
          </form>

      </div> <!-- end chat-message -->
      
    </div> 

                      




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
    
<style type="text/css">
  .offers-messages .offers-box {
    padding: 0;
    display: inline-block;
    border-right: 1px solid #ddd;
    box-sizing: border-box;
    padding: 0 15px;
}
.offers-messages .offers-box ul {
    margin: 0;
    padding: 0;
    list-style: none;
    height: 590px;
    overflow-x: auto;
    overflow-y: scroll;
}
.chatmassage {
   width: 100%;
  color: #434651;
}
.chatmassage .chat-header {
   padding: 20px;
   border-bottom: 2px solid white;
}
.chatmassage .chat-header img {
   float: left;
}.chatmassage .chat-header .chat-about {
   float: left;
   padding-left: 10px;
   margin-top: 6px;
}.chatmassage .chat-header .chat-with {
   font-weight: bold;
   font-size: 16px;
}.chatmassage .chat-header .chat-num-messages {
   color: #92959e;
}.chatmassage .chat-header .fa-star {
   float: right;
   color: #d8dadf;
   font-size: 20px;
   margin-top: 12px;
}
.chatmassage .chat-history {
    padding: 15px 15px;
    /* border-bottom: 2px solid white; */
   overflow:auto;
    height: 400px;
    transform: rotate(180deg);
    direction: rtl;
    box-sizing: border-box;
}.chatmassage .chat-history ul{ margin:0; padding:0; list-style:none;   transform:rotate(180deg);
    direction:ltr}.chatmassage .chat-history .message-data {
   margin-bottom: 15px;
}.chatmassage .chat-history .message-data-time {
    color: #a8aab1;
    padding-left: 6px;
    font-size: 10px;
    font-weight: 400;
}
span.message-data-name {
    font-size: 14px;
    font-weight: 700;
}.chatmassage .chat-history .message {
    color: white;
    padding: 10px 10px;
    line-height: 18px;
    font-size: 12px;
    border-radius: 5px;
    margin-bottom: 30px;
    width: 90%;
    position: relative;
}.chatmassage .chat-history .message:after {
   bottom: 100%;
   left: 7%;
   border: solid transparent;
   content: " ";
   height: 0;
   width: 0;
   position: absolute;
   pointer-events: none;
   border-bottom-color: #86bb71;
   border-width: 10px;
   margin-left: -10px;
}.chatmassage .chat-history .my-message {
   background: #86bb71;
}.chatmassage .chat-history .other-message {
   background: #94c2ed;
}.chatmassage .chat-history .other-message:after {
   border-bottom-color: #94c2ed;
   left: 93%;
}.chatmassage .chat-message {
    padding: 15px;
    background-color: #f2f2f2;
}.chatmassage .chat-message textarea {
   width: 100%;
   border: none;
   padding: 10px 20px;
   font: 14px/22px "Lato", Arial, sans-serif;
   margin-bottom: 10px;
   border-radius: 5px;
   resize: none;
}.chatmassage .chat-message .fa-file-o, .chatmassage.chatmassage-message .fa-file-image-o {
   font-size: 16px;
   color: gray;
   cursor: pointer;
}.chatmassage .chat-message button {
   float: right;
   color: #94c2ed;
   font-size: 16px;
   text-transform: uppercase;
   border: none;
   cursor: pointer;
   font-weight: bold;
   background: #f2f5f8;
}.chatmassage .chat-message button:hover {
   color: #75b1e8;
}
 .online, .offline, .me {
   margin-right: 3px;
   font-size: 10px;
}
 .online {
   color: #86bb71;
}
 .offline {
   color: #e38968;
}
 .me {
   color: #94c2ed;
}
 .align-left {
   text-align: left;
}
 .align-right {
   text-align: right;
}
 .float-right {
   float: right;
}
 .clearfix:after {
   visibility: hidden;
   display: block;
   font-size: 0;
   content: " ";
   clear: both;
   height: 0;
}
</style>
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Chat List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">



              
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>

        </div>
         <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            



<div class="row offers-messages">

                                
                                
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap align-content-stretch pl-0 pr-0">
                                                                     
                                    <div class="chatmassage">

      
      <div class="chat-history">
        <ul>
                    

<?php foreach ($chat as $value) { 

if($value->reciver_id==0){
$sender=$this->General_model->show_data_id('user_table',$value->sender_id,'id','get','');

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
}else{ 

  ?>

<li class="clearfix">
<div class="message-data align-right">
<span class="message-data-time"><?php echo $value->entry_date; ?></span> &nbsp; &nbsp;
<span class="message-data-name">You</span> <i class="fa fa-circle me"></i>

</div>
<div class="message other-message float-right">
<?php echo $value->chat_text; ?>           </div>
</li>




<?php
}
} 
?>

 

           
          
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">

          <form action="<?php echo base_url(); ?>staff_panel/support/post_chat" method="post">
          <textarea name="qt_message" id="message-to-send" placeholder="Type your message" rows="3" required=""></textarea>

          <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
          <i class="fa fa-file-image-o"></i>
<input type="hidden" name="reciver_id" value="<?php echo $this->input->get('chat_id'); ?>">
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
  </div>
</section>


        </div>
      </div>

<style type="text/css">
  .adstatusdactive{
    display: inline-block;
    font-size: 12px;
    background-color: #f16919;
    padding: 4px 12px;
    color: #fff;
    border-radius: 30px;
    text-transform: capitalize;
    font-weight: 600;
  }
</style>
<!-- banner css Start -->
  <div class="banner_area text-center" style="background-image:url(<?php echo base_url(); ?>assets_front/images/bannerimg.jpg);">
    <div class="container">
     <div class="inner_banner_contant pt-0">
         <h2>Dashboard</h2>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                 <h3>My Messages</h3>
                 <div class="dashboard_mainboby">
                    <?php if($this->session->flashdata('error')){?>

                              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
                  </div>                           
                   <?php } if($this->session->flashdata('message')){?>
                    <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>

</div>

                   <?php }?>
                    <div class="listing_area table-responsive">
                       <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 <th>Name</th>
                                 <th>Post ID</th>
                                 <th>Date</th>
                                 <!-- <th>Details</th> -->
                                     <th>Message</th>                            
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($message_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              if($result->deletedBy!=$this->session->userdata('front_sess')['userid']){
                              ?>

                              <tr class="dview<?=$i;?>">
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td><?=$result->qt_name;?></td>
                                 <td><a  href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->qt_adsid);?>" target="_blank" class="view_btn"  title="Click to view ad"><?=$result->ppt_title;?></a></td>
                                 <td><?=date('d-m-Y',strtotime($result->qt_entry_date));?></td>
                                 <!-- <td class="ads-details-td">
                                   
                                    <p> <strong> Posted On </strong>:
                                       <?=date('d-M-Y',strtotime($result->qt_entry_date));?>, <?php
                                       $date = new DateTime($result->qt_entry_date);
                                      echo $date->format('h:i:s a') ;
                                     ?>
                                    </p>
                                    <p> 
                                    <strong>Description:</strong> <?=substr($result->qt_message, 0,100).'...';?> </p>
                                 </td> -->
                                 <td class="action-td"><a  href="javascript:void(0)" class="view_btn" onclick="document.getElementById('id'+<?php echo $i;?>).style.display='block'" title="Click to view message"><i class="fview fa fa-eye"  aria-hidden="true"></i></a></td>
                                
                                 <td class="action-td">
                                  <a  href="<?=base_url();?>quote/delete_msg?qtid=<?=base64_encode($result->qt_id);?>" class="view_btn" onclick="return confirm('Are you sure to delete?')" title="Click to delete message"><i class="fview<?php echo $i;?> fa fa-trash"  aria-hidden="true"></i></a>
                                  
                                    <!-- <p>
                                      <?php if($result->qt_view!=1){?>
                                        <a  href="javascript:void(0)" class="view_btn" onclick="view_msg('<?=base64_encode($result->qt_id);?>',<?php echo $i;?>)" title="Click to view message"><i class="fview<?php echo $i;?> fa fa-eye-slash"  aria-hidden="true"></i></a>
                                        <?php }else{?>
                                          <a  href="javascript:void(0)" class="view_btn" onclick="document.getElementById('id'+<?php echo $i;?>).style.display='block'" title="Click to view message"><i class="fview fa fa-eye"  aria-hidden="true"></i></a>
                                        <?php }?>
                                      

                                    </p> -->
                                    <!--<p>
                                        <a  href="javascript:void(0)" class="view_btn" onclick="document.getElementById('fid'+<?php //echo $i;?>).style.display='block'" title="view"><i class="fa fa-paper-plane-o"  aria-hidden="true"></i></a>
                                        

                                    </p>-->
                                    <!-- <p>
                                     
                                        <a  href="javascript:void(0)" class=" view_btn" onclick="delete_fav_msg('<?=base64_encode($result->qt_id);?>','<?php echo $i;?>')" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        

                                    </p> -->


<!-------------popup notice --------------->
  <div id="id<?php echo $i; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id<?php echo $i; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><?php echo $result->qt_name; ?></h2>
      </header>
      <div style="padding: 16px;" class="w3-container">
        
        <p>From : <?php echo $result->qt_name; ?></p>
        <p>Phone : <?php echo $result->qt_phone; ?></p>
        <p>Email : <?php echo $result->qt_email; ?></p>
        <p>Description  : <?php echo $result->qt_message ?></p>
        <p>Posted On  : <?php echo $date->format('Y-m-d') ; ?> ,<?php echo $date->format('h:i:s a') ; ?></p>
      </div>
      
    </div>
  </div>
  <!-------------popup notice --------------->


  <!-------------popup form --------------->
  <div id="fid<?php echo $i; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('fid<?php echo $i; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h6>Send Message</h6>
      </header>
      <div style="padding: 16px;" class="w3-container">


<form action="" method="post">
  <div class="form-group">
    
    <textarea class="form-control"></textarea>

  </div>
  
  <input type="text" value="<?php echo $result->qt_id; ?>" name="message_id">
  <input type="text" value="<?php echo $result->qt_adsuser; ?>" name="sent_user_id">
  <input type="text" value="<?php echo $result->qt_userid; ?>" name="receive_user_id">

  <button type="submit" class="btn btn-default">Submit</button>
</form>


      </div>
      
    </div>
  </div>
  <!-------------popup form --------------->

                                    
                                    
                                 </td>
                              </tr>
                              
                             <?php }}?>
                              
                              
                           </tbody>
                        </table>
                    </div>
                    
                    
                 </div>
              </div>

<?php echo $page_link; ?>

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

<!-- main_area css stop -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
 
  function delete_fav_msg(nid,val){
    
   var con=confirm("Are you sure to delete ?");
      if(con){

                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>quote/delete_quote',
                    data:{qtid:nid},
                    cache:false,
                    success:function(response){
                        //alert(1);
                        //console.log(response);
                         var html=response.trim();
                        
                      if(html=='del'){
                             
                         swal("Okay!", "Removed successfully", "success");
                          $(".dview"+val).remove();
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                      
                            }
                });

      }
    }

function view_msg(nid,val){
   
    $('#id'+val).show();
  
   $.ajax({
    method:'post',
    url:'<?=base_url();?>quote/update_quote',
    data:{noteid:nid},
    cache:false,
    success:function(response){
      
      var html=response.trim();
      var result=html.split("~");
      if(result[0]=='success'){
        
        
        $('.quoteno').html(result[1]);
        $(".fview"+val).removeClass("fa-eye-slash");
        $(".fview"+val).addClass("fa-eye");
      }
    }


   }); 
  
  }

</script>
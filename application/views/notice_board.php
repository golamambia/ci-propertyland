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
                 <h3>My Notification</h3>
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
                                 
                                 <th>Details</th>
                                                                 
                                 <th>Option</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($notice_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              ?>

                              <tr class="dview<?php echo $i;?>">
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 
                                 <td class="ads-details-td">
                                    <h4><a href="javascript:void(0)"><?=$result->notice_title;?></a></h4>
                                    <p> <strong> Posted On </strong>:
                                       <?=date('d-M-Y',strtotime($result->entry_date));?>, <?php
                                       $date = new DateTime($result->entry_time);
                                      echo $date->format('h:i:s a') ;
                                     ?>
                                    </p>
                                    <p> <strong>From </strong>:  <?php 

                                                    $type=$result->push_from;
                                                    if($type=='admin'){
                                                        echo"Administrator";
                                                    }else if($type=='staff'){
                                                        echo"report team";
                                                    }else if($type=='customer'){
                                                        echo"customer";
                                                    }else{
                                                        echo"report team";
                                                    }
                                                    ?>
                                                 <br>
                                    <strong>Description:</strong> <?=substr($result->description, 0,100).'...';?> </p>
                                 </td>
                                
                                 <td class="action-td">

                                    <p>
                                      <?php if($result->notice_view!=1){?>
                                        <a  href="javascript:void(0)" class="view_btn" onclick="view_msg('<?=base64_encode($result->nid);?>',<?php echo $i;?>)" title="view"><i class="fview<?php echo $i;?> fa fa-eye-slash" style="color: #0b0000;
    font-size: 32px;" aria-hidden="true"></i></a>
                                        <?php }else{?>
                                          <a  href="javascript:void(0)" class="view_btn" onclick="document.getElementById('id'+<?php echo $i;?>).style.display='block'" title="view"><i class="fview fa fa-eye" style="color: #0b0000;
    font-size: 32px;" aria-hidden="true"></i></a>
                                        <?php }?>
                                      

                                    </p>
                                    <p>
                                     
                                        <a  href="javascript:void(0)" class=" view_btn" onclick="delete_note_msg('<?=base64_encode($result->nid);?>',<?php echo $i;?>)" title="Delete"><i class="fa fa-trash" style="color: #0b0000;
    font-size: 32px;" aria-hidden="true"></i></a>
                                        

                                    </p>

<!-------------popup notice --------------->
  <div id="id<?php echo $i; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id<?php echo $i; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2><?php echo $result->notice_title; ?></h2>
      </header>
      <div style="padding: 16px;" class="w3-container">
        <p>Posted On  : <?php echo $date->format('h:i:s a') ; ?></p>
        <p>From : <?php 

                                                    $type=$result->push_from;
                                                    if($type=='admin'){
                                                        echo"Administrator";
                                                    }else if($type=='staff'){
                                                        echo"report team";
                                                    }else if($type=='customer'){
                                                        echo"customer";
                                                    }else{
                                                        echo"report team";
                                                    }
                                                    ?></p>
        <p>Description  : <?php echo $result->description ?></p>
      </div>
      
    </div>
  </div>
  <!-------------popup notice --------------->

                                    
                                    
                                 </td>
                              </tr>
                              
                             <?php }?>
                              
                              
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  function view_msg(nid,val){
   
    $('#id'+val).show();
  
   $.ajax({
    method:'post',
    url:'<?=base_url();?>noticeboard/update_notice',
    data:{noteid:nid},
    cache:false,
    success:function(response){
      
      var html=response.trim();
      var result=html.split("~");
      if(result[0]=='success'){
        
        
        $('.noteno').html(result[1]);
        $(".fview"+val).removeClass("fa-eye-slash");
        $(".fview"+val).addClass("fa-eye");
      }
    }


   }); 
  
  }
  function delete_note_msg(nid,val){
   var con=confirm("Are you sure to delete ?");
      if(con){
   $.ajax({
    method:'post',
    url:'<?=base_url();?>noticeboard/delete_notice',
    data:{noteid:nid},
    cache:false,
    success:function(response){
      
      var html=response.trim();
      var result=html.split("~");
      if(result[0]=='success'){
                
        $('.noteno').html(result[1]);
        $(".dview"+val).remove();
       swal("Okay!", "Data successfully deleted", "success");
       location.reload();
      }else{
        swal("Sorry!", "Please try again", "error");
      }
    }


   }); 
 }
  
  }
</script>

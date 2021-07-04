<div class="content-wrapper">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">User Ads</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>staff_panel/home/">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>staff_panel/adsdata/">Ads List</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">View</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-content collapse show">
                    <div class="card-body">
                        
                        <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
<?php if($this->session->flashdata('error_msg')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error_msg');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>


 <?php if($result[0]->update_status>0){?>
                        <div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;">Ads updated by user please check</p>
</div>
<?php }?>

<!--------------------- Form -------------------->
<?php
$cat=$result[0]->cat_name;
if($cat==15){
require_once('local_business.php'); 
}elseif($cat==5){
require_once('SHARED_ACCOMMODATION_FOR_RENT.php');   
}elseif($cat==4){
require_once('FEED_REQUEST.php');   
}elseif($cat==11){
require_once('EVENTS.php');   
}elseif($cat==13){
require_once('GOOD_TO_KNOW.php');   
}elseif($cat==17){
require_once('WHOLE_ACCOMMODATION_FOR_RENT.php');   
}elseif($cat==18){
require_once('JOBS_SITES_LISTING.php');   
}elseif($cat==19){
require_once('JOB.php');   
}elseif($cat==20){
require_once('JOB_SEEKER.php');   
}elseif($cat==21){
require_once('COACHING.php');   
}elseif($cat==22){
require_once('FOOD_BOX.php');   
}elseif($cat==23){
require_once('OTHERS.php');   
}elseif($cat==24){
require_once('HELP_THROUGH_TRAVEL.php');   
}
?>                       
<!--------------------- Form -------------------->





                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">

                <div class="card-content collapse show">
                    <div class="card-body">


                      <form class="form"  method="post"  action="<?php echo base_url();?>staff_panel/adsdata/post_quote">
 
                           

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Message</h4>

                                

                                        <div class="form-group">
                                            
                                          <textarea name="qt_message" class="form-control" required></textarea>
                                        </div>

                                        <input type="hidden" value="<?=$result[0]->user_id; ?>" name="user_id">

                                        <input type="hidden" value="<?=base64_encode($result[0]->lbcontactId);?>" name="ads">

                                

                            </div>
                            <br>
                            <div class="form-body">
                                <button type="submit" class="btn btn-primary " id="">
                                    <i class="fa fa-check-square-o"></i> Send
                                </button>

                            </div>

                        </form>

                        <br>


                        <form class="form"  method="post"  action="<?php echo base_url();?>staff_panel/adsdata/post_notification">
 
                           

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Comment</h4>

                                <div class="form-group">
                                            
                                            <input type="text" class="form-control" placeholder="Title" name="comment_title"  required>
                                        </div>


                                        <div class="form-group">
                                            
                                          <textarea name="comment" class="form-control" required></textarea>
                                        </div>

                                        <input type="hidden" value="<?=$result[0]->user_id; ?>" name="user_id">

                                        <input type="hidden" value="<?=$result[0]->lbcontactId; ?>" name="ads_id">

                                

                            </div>
                            <br>
                            <div class="form-body">
                                <button type="submit" class="btn btn-primary " id="">
                                    <i class="fa fa-check-square-o"></i> Submit
                                </button>

                            </div>

                        </form>



<br>



<div class="listing_area table-responsive">
                       <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 
                                 <th>Details</th>
                                                                 
                                 
                              </tr>
                           </thead>
                           <tbody>

<?php
$i=0; 
foreach ($notification as $value) {
$i++; 
?>

                        <tr class="dview1">
                        <td class="add-img-selector">
                        <?=$i;?>                                 
                        </td>

                        <td class="ads-details-td">
                        <h4><?=$value->notice_title;?></h4>
                        <p> 
                            <strong> Posted On </strong>:
                                       <?=date('d-M-Y',strtotime($value->entry_date));?>
                                     
                        </p>


                         <p>                                               
                            
                        <strong>Description:</strong> <?=$value->description;?> 
                        </p>
                        </td>


                        </tr>
                             

<?php } ?>                            
                            
 
                             
                              
                              
                                                           
                              
                           </tbody>
                        </table>
                    </div>









                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

        </div>
      </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#sub').click(function(){
      var val='<?=$result[0]->lbcontactId;?>';
      var val2='<?=$post_st;?>';
      //alert(val2);
      $.ajax({
        method:'POST',
        url:'<?=base_url();?>staff_panel/adsdata/adsdata_checked',
        cache:false,
        data:{id:val,post_st:val2},
        Type:'text',
        success:function(response){
          //alert(response);
          console.log(response);
          var html=response.trim();
          if(html>0){
            location.reload(true);
          }
        }

      });

    });

          });

</script>

      

      
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
                 <h3>My Favourite List</h3>
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
                                 <th>Image</th>
                                 <th>Ad</th>
                                 <!-- <th>Email</th>
                                 <th>Phone</th> -->
                                 <th>Option</th>
                                                                 
                                 <!--<th>Option</th>-->
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($favourite_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              ?>

                              <tr class="dview<?php echo $i;?>">
                                <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                <td class="add-img-td">
                                   <a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->fv_adsid);?>">
                                    <img class="img-fluid" src="<?=base_url();?>module_file/<?=$result->upload_file;?>" alt="img">
                                    </a>
                                 </td>
                                 
                                 <td><a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->fv_adsid);?>"><?=$result->title;?></a></td>
                                
                                   <td class="action-td">
                                   <p>
                                     
                                        <a  href="javascript:void(0)" class=" view_btn" onclick="delete_fav_msg('<?=base64_encode($result->fv_id);?>','<?php echo $i;?>')" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        

                                    </p>
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
 
  function delete_fav_msg(nid,val){
    
   var con=confirm("Are you sure to delete ?");
      if(con){

                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>adsview/delete_favourite',
                    data:{fv_adsid:nid},
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
</script>
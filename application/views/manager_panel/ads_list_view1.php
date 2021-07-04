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
        <div class="col-md-10">
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

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/staff/staff_add_post">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Ads Info</h4>
                                
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="title" type="text" class="form-control" placeholder="Title" value="<?=$result[0]->title; ?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?=$result[0]->phone; ?>" />
                                                <div class="ci_error"><?=form_error('phone');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$result[0]->email; ?>" />
                                                <div class="ci_error"><?=form_error('email');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea name="address" class="form-control" placeholder="Address"><?=$result[0]->address; ?></textarea>
                                                <div class="ci_error"><?=form_error('address');?></div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>Listing Type</option>
                                                    <option>Free</option>
                                                    <option>Premium</option>
                                                    <option>Premium Plus</option>
                                                    <option>Ultra Premium Plus</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <h4>Country</h4>
                                                <p><?=$result[0]->event_start_date;?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <select class="form-control" name="state" id="state" required>
                                            <option value="">--Select State--</option>
                                            <?php 
                                             foreach ($statelist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if(set_value('state')==$value->sid){echo"selected";}else{ if($value->state_name==$state_get){echo"selected";}}?> value="<?=$value->sid;?>"><?=$value->state_name;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('state');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <select class="form-control" name="city" id="city" required>
                                            <option value="">--Select City--</option>
                                            <?php 
                                             foreach ($citylist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if(set_value('city')==$value->cid){echo"selected";}else{ if($value->name==$city_get){echo"selected";}}?> value="<?=$value->cid;?>"><?=$value->name;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('city');?></div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="city" id="city" class="form-control" placeholder="City" />
                                            </div>
                                        </div> -->
                                        <div class="col-lg-11">
                                            <div class="form-group">
                                                <select class="form-control" name="cat_name" id="cat_name" required>
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             foreach ($catlist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option value="<?=$value->id;?>"><?=$value->name;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('cat_name');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                    <a href="<?=base_url();?>category/index?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div>
                                    <div class="col-lg-11">
                                            <div class="form-group">
                                                <select class="form-control" name="sub_cat" id="sub_cat" required>
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             foreach ($subcatlist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option value="<?=$value->sid;?>"><?=$value->subname;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('sub_cat');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-1">
                                            <div class="form-group">
                                    <a href="<?=base_url();?>category/index?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h4>Event start date</h4>
                                                <p><?=$result[0]->event_start_date;?></p>
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h4>Event end date</h4>
                                                <p><?=$result[0]->event_end_date;?></p>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h4>Event start time</h4>
                                                <p><?=$result[0]->event_start_time;?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h4>Event tend time</h4>
                                                <p><?=$result[0]->event_end_time;?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Description</h4>
                                            <p><?=$result[0]->description;?></p>
                                            
                                        </div>

                                        <div class="col-lg-12">

                                            <h4>Extra Description</h4>
                                            <p><?=$result[0]->description_extra;?></p>

                                            
                                        </div>

                                        <div class="col-lg-12">
                                            <h4>Social Media Informations:</h4>

                                            <p>Web Link : <?=$result[0]->weblink;?></p>
                                            <p>facebook : <?=$result[0]->media_facebook;?></p>
                                            <p>Linkedin : <?=$result[0]->media_linkedin;?></p>
                                            <p>Twitter : <?=$result[0]->media_twitter;?></p>

                                             
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Google Map:</h4>
                                            

                                            <div class="form-group">
                                                <input name="d" type="text" class="form-control" placeholder="Past your iframe code here" value="<?=set_value('d');?>" />
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Single Image </h4>

                                            <img src="<?=base_url();?>module_file/<?=$result[0]->upload_file;?>" height="60"/>
                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Photo Gallery</h4>

                                            <div class="form-group">

    <label id="projectinput7" class="file center-block">

                                    <div id="multi_img">

                    <?php 

               foreach ($multiimage as $key => $row_rec) {

                //print_r($value)

               ?>



<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><img src="<?=base_url();?>module_file/<?PHP echo $row_rec->multi_image;?>" height="60"/></div>



         <?php } ?>

                </div>

</label>



                                </div>
                                            

                                        </div>
                                        
                                        
                                    </div>        

                                
                            </div>

                            <div class="form-actions">
                               <a href="<?php echo base_url();?>staff_panel/adsdata/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <?php 
                                  if($result[0]->post_status==1){
                                  if($result[0]->approved_by==$this->session->userdata('logged_in_stf')['staff_id']){
                                  ?>
                                <button type="button" class="btn btn-success " >
                                    <i class="fa fa-check-square-o"></i>Approved by You
                                </button>
                              <?php }else{?>
                                <button type="button" class="btn btn-success " >
                                    <i class="fa fa-check-square-o"></i>Approved
                                </button>

                                <?php }}else{?>
                                <button type="button" class="btn btn-primary " id="sub">
                                    <i class="fa fa-check-square-o"></i>Approve Now
                                </button>


                              <?php }?>
                            </div>
                        </form> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
<?php if($result[0]->post_status==0){
                                  
                                  ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sub').click(function(){
      var val='<?=$result[0]->lbcontactId;?>';
      //alert(val);
      $.ajax({
        method:'POST',
        url:'<?=base_url();?>staff_panel/adsdata/adsdata_checked',
        cache:false,
        data:{id:val},
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
<?php }?>
      

      
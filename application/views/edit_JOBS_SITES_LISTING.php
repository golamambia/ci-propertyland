<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>adslist/edit_post/<?php echo $result[0]->lbcontactId?>"  onsubmit="return confirm('Are you sure to update ,after update your ad will deactive for verification ?')">

                                        <input type="hidden" name="image_hid" value="<?php echo $result[0]->upload_file;?>">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Title<span> *</span></label>
                                                <input name="title" type="text" class="form-control" placeholder="Title" value="<?=$result[0]->title; ?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Phone<span> *</span></label>
                                                <input type="text" name="phone" class="form-control numeric_input" placeholder="Phone" value="<?=$result[0]->phone; ?>" required />
                                                <div class="ci_error"><?=form_error('phone');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Email<span> *</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$result[0]->email; ?>"  required/>
                                                <div class="ci_error"><?=form_error('email');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Contact Person<span> *</span></label>
                                                <input name="contact_person" type="text" class="form-control" placeholder="Contact Person" value="<?=$result[0]->contact_person; ?>" required />
                                                <div class="ci_error"><?=form_error('contact_person');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Address<span> *</span></label>
                                                <textarea name="address" class="form-control" placeholder="Address" required><?=$result[0]->address; ?></textarea>
                                                <div class="ci_error"><?=form_error('address');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Landmark<span> *</span></label>
                                                <textarea name="landmark" class="form-control" placeholder="Landmark" required><?=$result[0]->landmark; ?></textarea>
                                                <div class="ci_error"><?=form_error('landmark');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Coverage area<span> *</span></label>
                                                <select class="form-control" name="cover_area" id="cover_area" required>
                                            <option value="">--Select one--</option>
                                            <?php 
                                             foreach ($cover_area as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($result[0]->cover_area==$value->cov_id){echo"selected";}?> value="<?=$value->cov_id;?>"><?=$value->cover_area;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('country');?></div>
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
                                              <label>Country<span> *</span></label>
                                                <select class="form-control" name="country" id="country" required>
                                            <option value="">--Select Country--</option>
                                            <?php 
                                             foreach ($countrylist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($result[0]->country==$value->id){echo"selected";}?> value="<?=$value->id;?>"><?=$value->countryname;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('country');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 state">
                                            <div class="form-group">
                                              <label>State<span> *</span></label>
                                                <select class="form-control" name="state" id="state" required>
                                            <option value="">--Select State--</option>
                                            <?php 
                                             foreach ($statelist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($result[0]->state==$value->sid){echo"selected";}?> value="<?=$value->sid;?>"><?=$value->state_name;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('state');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 city">
                                            <div class="form-group">
                                              <label>City<span> *</span></label>
                                                <select class="form-control" name="city" id="city" required>
                                            <option value="">--Select City--</option>
                                            <?php 
                                             foreach ($citylist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($result[0]->city==$value->cid){echo"selected";}?> value="<?=$value->cid;?>"><?=$value->name;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('city');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-12">
                                            <div class="form-group">
                                               <label>Pincode/Zipcode<span> *</span></label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?=$result[0]->zipcode;?>" placeholder="Pincode/Zipcode" required />
                                                <div class="ci_error"><?=form_error('zipcode');?></div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="city" id="city" class="form-control" placeholder="City" />
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Category<span> *</span></label>
                                                <select class="form-control" name="cat_name" id="cat_name" required>
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             foreach ($catlist as $key => $value) {
                                              //print_r($value)
                                                if($result[0]->cat_name==$value->id){
                                             ?>

                                               <option value="<?=$value->id;?>"><?=$value->name;?></option>

                                               <?php } }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('cat_name');?></div>
                                            </div>
                                        </div>
                                        
                                    <div class="col-lg-12">
                                      
                                            <div class="form-group">
                                               <label>Sub-category<span> *</span></label>
                                                <select class="form-control" name="sub_cat" id="sub_cat" required>
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             foreach ($subcatlist as $key => $value) {
                                              //print_r($value)
                                                
                                             ?>
                                               <option <?php if($result[0]->sub_cat==$value->sid){echo"selected";} ?> value="<?=$value->sid;?>"><?=$value->subname;?></option>

                                               <?php  }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('sub_cat');?></div>
                                            </div>
                                        </div>
                                         
                                        
                                        <!-- <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" name="event_start_date" id="event_start_date" value="<?=$result[0]->event_start_date; ?>" class="form-control"  />
                                                <div class="ci_error"><?=form_error('event_start_date');?></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" name="event_end_date" id="event_end_date" value="<?=$result[0]->event_end_date; ?>" class="form-control" />
                                               <div class="ci_error"><?=form_error('event_end_date');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="event_start_time" id="event_start_time" class="form-control" placeholder="Event Start Time" value="<?=$result[0]->event_start_time;?>" />
                                               <div class="ci_error"><?=form_error('event_start_time');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="event_end_time" id="event_start_time" class="form-control" placeholder="Event End Time" value="<?=$result[0]->event_end_time;?>" />
                                              <div class="ci_error"><?=form_error('event_end_time');?></div>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Description<span> *</span></label>
                                                <textarea name="description" class="form-control mceEditor" placeholder=" Description" required><?=$result[0]->description;?></textarea>
                                                <div class="ci_error"><?=form_error('description');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Search Keyword<span> *</span></label>
                                                <textarea name="search_keyword" class="form-control " placeholder="Search Keyword" required><?=$result[0]->search_keyword;?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Social Media Informations:</h4>
                                             <div class="form-group">
                                              <label>Website Link</label>
                                                <input name="weblink" type="text" class="form-control" placeholder="Website Link" value="<?=$result[0]->weblink;?>" />
                                            </div>
                                            <div class="form-group">
                                              <label>Facebook</label>
                                                <input name="media_facebook" type="text" class="form-control" placeholder="www.facebook.com/directory" value="<?=$result[0]->media_facebook;?>" />
                                            </div>
                                            <div class="form-group">
                                              <label>Linkedin</label>
                                                <input name="media_linkedin" type="text" class="form-control" placeholder="www.linkedin.com/directory" value="<?=$result[0]->media_linkedin;?>" />
                                            </div>
                                            <div class="form-group">
                                              <label>Twitter</label>
                                                <input name="media_twitter" type="text" class="form-control" placeholder="www.twitter.com/directory" value="<?=$result[0]->media_twitter;?>" />
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <h4>Google Map:</h4>
                                            <div class="form-group">
                                                <input name="d" type="text" class="form-control" placeholder="Past your iframe code here" value="<?=set_value('d');?>" />
                                            </div>
                                        </div> -->

                                        <div class="col-lg-12">
                                            <h4>Working Hour:</h4>
                                            <div class="form-group">
                                                <input name="w_hour" type="text" class="form-control" placeholder="Working Hour" value="<?=$result[0]->working_hour;?>" />
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <h4>Single Image <span>(image size 1350x500)</span>:</h4>
                                            <div class="row">

                                            
                                            <div class="col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image1">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="ci_error"><?=form_error('image1');?></div>
                                            </div>
                                            </div>

                                            <div class="col-md-6">

                                <div class="form-group">

                                            <label for="eventInput3">&nbsp; </label>

                                           <img src="<?=base_url();?>module_file/<?php echo $result[0]->upload_file;?>" alt="Smiley face" style="width: 70px;height: 70px;">



                                        </div>

                                    </div>

                                        </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <h4>Photo Gallery <span>(upload multiple photos note:size 750x500)</span>:</h4>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile2" name="upload_img[]"  multiple="multiple" >
                                                <label class="custom-file-label" for="customFile2">Choose file</label>
                                            </div>
                                        </div>


<div class="col-md-12">

                                    <p id="alert_rem" style="color: green;font-size: 16px;font-weight: 600;display: none">Image Removed Successfully</p>

                            </div>                                        


<!----------- image loop -------------->
  

                                    <div class="col-md-12">

<div class="form-group">

    <label id="projectinput7" class="file center-block">

                                    <div id="multi_img">
<div class="row">                                        

                    <?php 

               foreach ($multiimage as $key => $row_rec) {

                //print_r($value)

               ?>

<div class="col-md-4">

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec->id;?>,'<?=$row_rec->lbcontact_id;?>')">Remove</span><img src="<?=base_url();?>module_file/<?php echo $row_rec->multi_image;?>" height="60"/></div>
</div>


         <?php } ?>
</div>         

                </div>

</label>



                                </div>



                            </div>



<!----------- image loop -------------->


                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary w-100">Update Ad</button>
                                        </div>
                                    </div>

                                </form>
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
                 <h3>Complaint List</h3>
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
                                 <th>Ad</th>
                                <th>New Complaint</th>
                                                                 
                                 <th>Option</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($complaint_list as $result){
                              
                              $i++;
                              ?>

                              <tr class="dview<?=$i;?>">
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td>
                                  <a href="<?=base_url();?>report/complaint_msg_list?ads=<?=base64_encode($result->lbcontactId);?>"><?=$result->title;?></a></td>

                                   <td class="ads-details-td">
                                  <?=unreadReportList($result->total_cmp_userid,$result->lbcontactId,$this->session->userdata('front_sess')['userid']);?></td>
                                 
                                
                                 <td class="action-td">
                                  
                                    <p>
                                     
                                        <a  href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->lbcontactId);?>" class="view_btn"  title="Click to view ad"><i class="fview fa fa-eye"  aria-hidden="true"></i></a>

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
  function view_msg(nid,val){
   
    $('#id'+val).show();
  
   $.ajax({
    method:'post',
    url:'<?=base_url();?>report/update_complaint',
    data:{noteid:nid},
    cache:false,
    success:function(response){
      
      var html=response.trim();
      var result=html.split("~");
      if(result[0]=='success'){
        
        
        $('.cmptno').html(result[1]);
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
    url:'<?=base_url();?>report/delete_complaint',
    data:{noteid:nid},
    cache:false,
    success:function(response){
      
      var html=response.trim();
      var result=html.split("~");
      if(result[0]=='success'){
                
        $('.cmptno').html(result[1]);
        $(".dview"+val).remove();
       swal("Okay!", "Data successfully delete", "success");
      }else{
        swal("Sorry!", "Please try again", "error");
      }
    }


   }); 
 }
  
  }
</script>
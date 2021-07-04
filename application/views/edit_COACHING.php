<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>adslist/edit_post/<?php echo $result[0]->lbcontactId?>"  onsubmit="return confirm('Are you sure to update ,after update your ad will deactive for verification ?')">

                                        <input type="hidden" name="image_hid" value="<?php echo $result[0]->upload_file;?>">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Header<span> *</span></label>
                                                <input name="title" type="text" class="form-control" placeholder="Title" value="<?=$result[0]->title; ?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>

      <div class="col-lg-12">
      <div class="form-group">
      <label>Institution Name<span> *</span></label>
      <input name="institution" type="text" class="form-control" placeholder="Institution" value="<?=$result[0]->institution; ?>" required />
      <div class="ci_error"><?=form_error('institution');?></div>
      </div>
      </div>

<div class="col-lg-12">
<div class="form-group">
<label>Tution Mode<spsn> *</spsn></label>
<select class="form-control" name="tution_mode" required>
<option value="">Select Tution Mode</option>
<option <?php if($result[0]->tution_mode==1){echo 'selected="selected"'; } ?> value="1">Online</option>
<option <?php if($result[0]->tution_mode==2){echo 'selected="selected"'; } ?> value="2">Offline</option>
<option <?php if($result[0]->tution_mode==3){echo 'selected="selected"'; } ?> value="3">Both</option>
</select>

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
  <div class="form-group dcourses">
  <label>Courses</label>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php
$institution_id = $result[0]->lbcontactId;
$courses = $this->General_model->show_data_id('courses',$institution_id,'institution_id','get','');
$count=0;
foreach ($courses as  $value) { 
$count++; 
  ?>

<div class="panel panel-default">


<div class="panel-heading" role="tab" id="headingOne<?php echo $count; ?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $count; ?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $value->course_cat; ?> - <?php echo $value->course_header; ?>
        </a>
      </h4>
    </div>



<div id="collapseOne<?php echo $count; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne<?php echo $count; ?>">
      <div class="panel-body">
<div id='TextBoxesGroup1'>
<div id="TextBoxDiv11" class="tm_area1">
<div class="row">
<div class="col-lg-6">
 <div class="form-group">
    <label for="exampleInputPassword1">Course Header</label>
    <input type="text" value="<?php echo $value->course_header; ?>" name="course_header1[]" class="form-control" required>
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Course Category</label>
    <input type="text" value="<?php echo $value->course_cat; ?>" name="course_cat1[]" class="form-control" required>
  </div>
</div>
</div>
<div class="row">
<div class="col-lg-6"> 
  <div class="form-group">
    <label for="exampleInputPassword1">Video Link</label>
    <input type="text" value="<?php echo $value->video_llink; ?>" name="video_llink1[]" class="form-control" required>
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Duration</label>
    <input type="text" value="<?php echo $value->duration; ?>" name="duration1[]" class="form-control" required>
  </div>
</div></div>
<div class="col-lg-12">
   <div class="form-group">
    <label for="exampleInputPassword1">Course Content</label>
    <textarea name="course_content1[]" style="border-radius: 10px;" class="form-control mceEditor" rows="3" ><?php echo $value->course_content; ?></textarea>
  </div> 
</div>
<div class="col-lg-12">  
 <div class="form-group">
    <label for="exampleInputPassword1">Details</label>
    <textarea name="details1[]" style="border-radius: 10px;" class="form-control mceEditor" rows="3" ><?php echo $value->details; ?></textarea>
  </div> 
</div>

<input type="hidden" name="courseId[]" value="<?php echo $value->id; ?>" >

<a href="<?php echo base_url();?>lbcontacts/course_del/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
</div>
</div>
</div>



</div>
</div>
<?php } ?>

</div>



<!-----------------------course----------------------->
<div style="clear: both; width: 100%; height: 10px;"></div>
<div>
<div id='TextBoxesGroup'>
<div id="TextBoxDiv1" class="tm_area">

</div>
</div>

<input type='button' value='Add More Course' id='addButton' class="course">
<input type='button' value='Remove Course' id='removeButton' class="course">

<?php $this->load->view('add_field_js.php'); ?>
</div>
<!-----------------------course----------------------->
</div>
</div>
<br><br>


                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary w-100">Update Ad</button>
                                        </div>
                                    </div>

                                </form>



<script type="text/javascript">
  function product_attr_update(val1,val2,val3,val4){

    var product = <?php echo $result[0]->productid; ?>;

          $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>apanel/product/update_product_attr',
            data: {id:val1,rp:val2,sp:val3,dis:val4,product:product},
            success: function (data) {

              //alert(1);
       
                $('#tm_attr_details').html(data);

            }
          });




}
</script>
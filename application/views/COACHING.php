<form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Header<spsn> *</spsn></label>
                                                <input name="title" type="text" class="form-control" placeholder="Title" value="<?=set_value('title');?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Institution Name<spsn> *</spsn></label>
                                                <input name="institution" type="text" class="form-control" placeholder="Institution Name" value="<?=set_value('institution');?>" required />
                                                <div class="ci_error"><?=form_error('institution');?></div>
                                            </div>
                                        </div>





<div class="col-lg-12">
<div class="form-group">
<label>Tution Mode<spsn> *</spsn></label>
<select class="form-control" name="tution_mode" required>
<option value="">Select Tution Mode</option>
<option value="1">Online</option>
<option value="2">Offline</option>
<option value="3">Both</option>
</select>

</div>
</div>                                      
<!-----------------------course----------------------->

<div id='TextBoxesGroup'>
<div id="TextBoxDiv1" class="tm_area">
<p style="color:red;">Course 1</p>
<div class="row">
<div class="col-lg-6">
 <div class="form-group">
    <label for="exampleInputPassword1">Course Header</label>
    <input type="text" name="course_header[]" class="form-control" required>
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Course Category</label>
    <input type="text" name="course_cat[]" class="form-control" required>
  </div>
</div>
</div>
<div class="row">
<div class="col-lg-6"> 
  <div class="form-group">
    <label for="exampleInputPassword1">Video Link</label>
    <input type="text" name="video_llink[]" class="form-control" required>
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Duration</label>
    <input type="text" name="duration[]" class="form-control" required>
  </div>
</div></div>
<div class="col-lg-12">
   <div class="form-group">
    <label for="exampleInputPassword1">Course Content</label>
    <textarea name="course_content[]" id="course_content1" style="border-radius: 10px;" class="form-control" rows="3" ></textarea>
  </div> 
</div>
<div class="col-lg-12">  
 <div class="form-group">
    <label for="exampleInputPassword1">Details</label>
    <textarea name="details[]" id="details1" style="border-radius: 10px;" class="form-control mceEditor" rows="3" ></textarea>
  </div> 
</div>

</div>
</div>

<input type='button' value='Add More Course' id='addButton'>
<input type='button' value='Remove Course' id='removeButton'>

<?php $this->load->view('add_field_js.php'); ?>

<!-----------------------course----------------------->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Phone<spsn> *</spsn></label>
                                                <input type="text" name="phone" class="form-control numeric_input" placeholder="Phone" value="<?=set_value('phone');?>" required />
                                                <div class="ci_error"><?=form_error('phone');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Email<spsn> *</spsn></label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?=set_value('email');?>" />
                                                <div class="ci_error"><?=form_error('email');?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Address<spsn> *</spsn></label>
                                                <textarea name="address" id="address" class="form-control" placeholder="Address" required><?=set_value('address');?></textarea>
                                                <div class="ci_error"><?=form_error('address');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Landmark<spsn></spsn></label>
                                                <textarea name="landmark" class="form-control" placeholder="Landmark" ><?=set_value('landmark');?></textarea>
                                                <div class="ci_error"><?=form_error('landmark');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Coverage area<spsn> *</spsn></label>
                                                <select class="form-control" name="cover_area" id="cover_area" required>
                                            <option value="">--Select one--</option>
                                            <?php 
                                             foreach ($cover_area as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if(set_value('cover_area')==$value->cov_id){echo"selected";}?> value="<?=$value->cov_id;?>"><?=$value->cover_area;?></option>
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
                                              <label>Country<spsn> *</spsn></label>
                                                <select class="form-control" name="country" id="country" required>
                                            <option value="">--Select Country--</option>
                                            <?php 
                                             foreach ($countrylist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if(set_value('country')==$value->id){echo"selected";}else{ if($value->countrycode==$country_get){echo"selected";}}?> value="<?=$value->id;?>"><?=$value->countryname;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('country');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 state">
                                            <div class="form-group">
                                              <label>State<spsn> *</spsn></label>
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
                                        <div class="col-lg-12 city">
                                            <div class="form-group">
                                              <label>City<spsn> *</spsn></label>
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
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                               <label>Pincode/Zipcode<spsn></spsn></label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?=set_value('zipcode');?>" placeholder="Pincode/Zipcode"  />
                                                <div class="ci_error"><?=form_error('zipcode');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                              <label>Category<spsn> *</spsn></label>
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
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                               <label>&nbsp;</label>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_cat" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div>
                                    <div class="col-lg-11">
                                            <div class="form-group">
                                               <label>Sub-category<spsn> *</spsn></label>
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
                                              <label>&nbsp;</label>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_cat" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div>




                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Search Keyword<spsn> *</spsn></label>
                                                <textarea name="search_keyword" class="form-control " placeholder="Search Keyword" required><?=set_value('search_keyword');?></textarea>
                                                <div class="ci_error"><?=form_error('search_keyword');?></div>
                                            </div>
                                        </div>

                                      
                                        <div class="col-lg-12">
                                            <h4>Social Media Informations:</h4>
                                             <div class="form-group">
                                              <label>Website Link</label>
                                                <input name="weblink" type="text" class="form-control" placeholder="Website Link" value="<?=set_value('weblink');?>" />
                                            </div>
                                            <div class="form-group">
                                              <label>Facebook</label>
                                                <input name="media_facebook" type="text" class="form-control" placeholder="www.facebook.com/directory" value="<?=set_value('media_facebook');?>" />
                                            </div>
                                            <div class="form-group">
                                              <label>Linkedin</label>
                                                <input name="media_linkedin" type="text" class="form-control" placeholder="www.linkedin.com/directory" value="<?=set_value('media_linkedin');?>" />
                                            </div>
                                            <div class="form-group">
                                              <label>Twitter</label>
                                                <input name="media_twitter" type="text" class="form-control" placeholder="www.twitter.com/directory" value="<?=set_value('media_twitter');?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <h4>Single Image <span>(image size 1350x500)</span>:</h4>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image1" >
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="ci_error"><?=form_error('image1');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Photo Gallery <span>(upload multiple photos note:size 750x500)</span>:</h4>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile2" name="upload_img[]"  multiple="multiple" >
                                                <label class="custom-file-label" for="customFile2">Choose file</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary w-100">Post Ad</button>
                                        </div>
                                    </div>

                                </form>

<script type="text/javascript">

  CKEDITOR.replace( 'course_content1' );

  CKEDITOR.replace( 'details1' );             
                
</script>
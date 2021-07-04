<form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Subject<spsn> *</spsn></label>
                                                <input name="title" type="text" class="form-control" placeholder="Subject" value="<?=set_value('title');?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Contact Number<spsn> *</spsn></label>
                                                <input type="text" name="phone" class="form-control numeric_input" placeholder="Contact Number" value="<?=set_value('phone');?>" required />
                                                <div class="ci_error"><?=form_error('phone');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Contact Email<spsn> *</spsn></label>
                                                <input type="email" name="email" class="form-control" placeholder="Contact Email" value="<?=set_value('email');?>" />
                                                <div class="ci_error"><?=form_error('email');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Contact Name<spsn> *</spsn></label>
                                                <input name="contact_person" type="text" class="form-control" placeholder="Contact Name" value="<?=set_value('contact_person');?>" required />
                                                <div class="ci_error"><?=form_error('contact_person');?></div>
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
                                              <label>Landmark<spsn> *</spsn></label>
                                                <textarea name="landmark" class="form-control" placeholder="Landmark" required><?=set_value('landmark');?></textarea>
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
                                               <label>Pincode/Zipcode<spsn> *</spsn></label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?=set_value('zipcode');?>" placeholder="Pincode/Zipcode" required />
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

<?php if($sub_cat==555){ ?>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" name="event_start_date" id="event_start_date" value="<?=date('Y-m-d');?>" class="form-control"  />
                                                <div class="ci_error"><?=form_error('event_start_date');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" name="event_end_date" id="event_end_date" value="<?=date('Y-m-d',strtotime(' +1 day'));?>" class="form-control" />
                                               <div class="ci_error"><?=form_error('event_end_date');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="event_start_time" id="event_start_time" class="form-control" placeholder="Event Start Time" value="<?=set_value('event_start_time');?>" />
                                               <div class="ci_error"><?=form_error('event_start_time');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="event_end_time" id="event_end_time" class="form-control" placeholder="Event End Time" value="<?=set_value('event_end_time');?>" />
                                              <div class="ci_error"><?=form_error('event_end_time');?></div>
                                            </div>
                                        </div>
<?php } ?>



                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Details</label>
                                                <textarea name="description" class="form-control mceEditor" placeholder=" Details"  ><?=set_value('description');?></textarea>
                                                <div class="ci_error"><?=form_error('description');?></div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Search Keyword<spsn> *</spsn></label>
                                                <textarea name="search_keyword" class="form-control " placeholder="Search Keyword" required><?=set_value('search_keyword');?></textarea>
                                                <div class="ci_error"><?=form_error('search_keyword');?></div>
                                            </div>
                                        </div>

                                       <!--  <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Extra Option</label>
                                                <textarea name="" class="form-control mceEditor" placeholder="Extra" ><?=set_value('description_extra');?></textarea>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <h4>Social Media Informations:</h4>
                                             <div class="form-group">
                                              <label>Website Link</label>
                                                <input name="weblink" type="text" class="form-control" placeholder="Website Link" value="<?=set_value('weblink');?>" />
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
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image1" >
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="ci_error"><?=form_error('image1');?></div>
                                            </div>
                                        </div>




<!---multiple----------->
<div class="col-md-12">

<h4>Delivery Locations</h4>

<div class="input_fields_wrap">
  
<div class="row">
<div class="col-md-6">
<div class="form-group" >
<label for="">Location</label>
<input name="location[]" type="text" value="" class="form-control" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="">Location Landmark</label>
<input name="location_land[]" type="text" value="" class="form-control" >
</div>
</div>



</div>
</div>

<button style="background-color:green;" class="add_field_button btn btn-info active">Add More Address</button>
</div>
<script>
$(document).ready(function() {
var max_fields = 15; //maximum input boxes allowed
var wrapper = $(".input_fields_wrap"); //Fields wrapper
var add_button = $(".add_field_button"); //Add button ID
var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="row"><div class="col-md-6"><div class="form-group" ><label for="">Location</label><input name="location[]" type="text" value="" class="form-control" ></div></div><div class="col-md-6"><div class="form-group"><label for="">Location Landmark</label><input name="location_land[]" type="text" value="" class="form-control" ></div></div><div style="cursor:pointer;background-color:red;" class="remove_field btn btn-info">Remove</div></div>'); //add input box'); //add input box
}
});
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x--;
})
});
</script>
<!-------mulyiple---->











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

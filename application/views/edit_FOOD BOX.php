<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>adslist/edit_post/<?php echo $result[0]->lbcontactId?>"  onsubmit="return confirm('Are you sure to update ,after update your ad will deactive for verification ?')">

                                        <input type="hidden" name="image_hid" value="<?php echo $result[0]->upload_file;?>">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Subject<span> *</span></label>
                                                <input name="title" type="text" class="form-control" placeholder="Subject" value="<?=$result[0]->title; ?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Contact Number<span> *</span></label>
                                                <input type="text" name="phone" class="form-control numeric_input" placeholder="Contact Number" value="<?=$result[0]->phone; ?>" required />
                                                <div class="ci_error"><?=form_error('phone');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Contact Email<span> *</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$result[0]->email; ?>"  required/>
                                                <div class="ci_error"><?=form_error('email');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Contact Name<span> *</span></label>
                                                <input name="contact_person" type="text" class="form-control" placeholder="Contact Name" value="<?=$result[0]->contact_person; ?>" required />
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
                                              <label>Details<span> *</span></label>
                                                <textarea name="description" class="form-control mceEditor" placeholder=" Details" required><?=$result[0]->description;?></textarea>
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


<!---multiple----------->
<div class="col-md-12">

<h4>Delivery Locations</h4>

<?php $count=0;  foreach ($val as  $value) { $count++; ?>


<div class="row">
<div class="col-md-6">
<div class="form-group" >
<label for="">Location</label>
<input name="location1" id="rp<?php echo $count; ?>" type="text" value="<?php echo $value->address; ?>" class="form-control" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="">Location Landmark</label>
<input name="location_land1" id="sp<?php echo $count; ?>" type="text" value="<?php echo $value->dl_land_mark; ?>" class="form-control" >
</div>
</div>
</div>




<div class="col-md-2">

    <!-- <a onclick="product_attr_update(<?php echo $value->id; ?>,rp<?php echo $count; ?>.value,sp<?php echo $count; ?>.value,v_dis<?php echo $count; ?>.value)" href="javascript:void(0)" class="refress refrech bg-green"><i class="fa fa-refresh" aria-hidden="true"></i></a> -->


    <a onclick="_remove(<?php echo $value->dl_id; ?>)" href="javascript:void(0)" class="trash bg-red cart_remove"><i class="fa fa-trash" aria-hidden="true"></i></a>

</div>


<div style="width: 100%; height: 10px; clear: both;"></div>
<?php } ?>




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

<script type="text/javascript">
function _remove(val){


      $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>adslist/remove_location',
      data: {id:val},
      success: function (data) {

      //alert(1);
location.reload();
      

      }
      });

}
</script>
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
                                              <label>Furnished Type<spsn> *</spsn></label>
                                                <select class="form-control" name="furnishedType" id="" required>
                                            <option value="">--Select one--</option>
                                           
<option <?php if($result[0]->furnishedType=='Furnished'){ echo 'selected="selected"'; } ?> value="Furnished">Furnished</option>
            <option <?php if($result[0]->furnishedType=='Semi Furnished'){ echo 'selected="selected"'; } ?> value="Semi Furnished">Semi Furnished</option>
            <option <?php if($result[0]->furnishedType=='Un Furnished'){ echo 'selected="selected"'; } ?> value="Un Furnished">Un Furnished</option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('furnishedType');?></div>
                                            </div>
                                        </div>

<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Accommodation Type <spsn> *</spsn></label>
                    <select class="form-control" name="accommodationType" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option <?php if($result[0]->accommodationType=='Appartment'){ echo 'selected="selected"'; } ?> value="Appartment">Appartment</option>
            <option <?php if($result[0]->accommodationType=='Independent'){ echo 'selected="selected"'; } ?> value="Independent ">Independent </option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('accommodationType');?></div>
                                            </div>
                                        </div>

<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Room Type <spsn> *</spsn></label>
                                                <select class="form-control" name="roomType" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option <?php if($result[0]->roomType=='Separate'){ echo 'selected="selected"'; } ?> value="Separate">Separate</option>
            <option <?php if($result[0]->roomType=='Shared'){ echo 'selected="selected"'; } ?> value="Shared">Shared </option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('roomType');?></div>
                                            </div>
                                        </div>

<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Sharing Type <spsn> *</spsn></label>
                                                <select class="form-control" name="sharingType" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option <?php if($result[0]->sharingType=='Single'){ echo 'selected="selected"'; } ?> value="Single">Single</option>
            <option <?php if($result[0]->sharingType=='Family'){ echo 'selected="selected"'; } ?> value="Family">Family</option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('sharingType');?></div>
                                            </div>
                                        </div>

 <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Gender <spsn> *</spsn></label>
                                                <select class="form-control" name="gender" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option <?php if($result[0]->gender=='Male'){ echo 'selected="selected"'; } ?> value="Male">Male</option>
            <option <?php if($result[0]->gender=='Female'){ echo 'selected="selected"'; } ?> value="Female">Female </option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('gender');?></div>
                                            </div>
                                        </div>  

 <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Bed Rooms<spsn> *</spsn></label>
                                               
<input name="bedRooms" value="<?php echo $result[0]->bedRooms; ?>" type="text" class="form-control" placeholder="bedRooms"  required />

                                           <div class="ci_error"><?=form_error('bedRooms');?></div>
                                            </div>
                                        </div>                                                                             
<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Toilets<spsn> *</spsn></label>
                                               
<input name="toilets" value="<?php echo $result[0]->toilets; ?>" type="text" class="form-control" placeholder="Toilets"  required />

                                           <div class="ci_error"><?=form_error('toilets');?></div>
                                            </div>
                                        </div> 


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Floor<spsn> *</spsn></label>
                                               
<input name="floor" type="text" value="<?php echo $result[0]->floor; ?>" class="form-control" placeholder="Floor"  required />

                                           <div class="ci_error"><?=form_error('floor');?></div>
                                            </div>
                                        </div>


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Lift Available <spsn> *</spsn></label>
                                               
<div class="radio">
  <label>
    <input type="radio" name="liftAvailable" id="optionsRadios1" value="1" <?php if($result[0]->liftAvailable==1){ echo 'checked'; } ?> >
   Yes
  </label>
  <label>
    <input type="radio" name="liftAvailable" id="optionsRadios1" value="0" <?php if($result[0]->liftAvailable==0){ echo 'checked'; } ?>  >
   No
  </label>
</div>
                                        </div> 
                                        </div>                                                                            
<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Pets Allowed  <spsn> *</spsn></label>
                                               
<div class="radio">
  <label>
    <input type="radio" name="petsAllowed" id="optionsRadios1" value="1" <?php if($result[0]->petsAllowed==1){ echo 'checked'; } ?>  >
   Yes
  </label>
  <label>
    <input type="radio" name="petsAllowed" id="optionsRadios1" value="0" <?php if($result[0]->petsAllowed==0){ echo 'checked'; } ?>  >
   No
  </label>
</div>
                                        </div> 
                                        </div> 


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Utilities Included  <spsn> *</spsn></label>
                                               
<div class="radio">
  <label>
    <input type="radio" name="utilitiesIncluded" id="optionsRadios1" value="1" <?php if($result[0]->utilitiesIncluded==1){ echo 'checked'; } ?> >
   Yes
  </label>
  <label>
    <input type="radio" name="utilitiesIncluded" id="optionsRadios1" value="0" <?php if($result[0]->utilitiesIncluded==0){ echo 'checked'; } ?> >
   No
  </label>
</div>
                                        </div> 
                                        </div>


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Available from Date<spsn> *</spsn></label>
                                               
<input name="availablefrom" type="date" class="form-control" value="<?php echo $result[0]->availablefrom; ?>"   required />

                                           <div class="ci_error"><?=form_error('availablefrom');?></div>
                                            </div>
                                        </div>                                                                             
<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Rent Per Month<spsn> *</spsn></label>
                                               
<input name="monthlyrent" type="number" value="<?php echo $result[0]->monthlyrent; ?>" class="form-control" placeholder="Rent Per Month"  required />

                                           <div class="ci_error"><?=form_error('monthlyrent');?></div>
                                            </div>
                                        </div> 


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Currency<spsn> *</spsn></label>
                                               
<input name="currency" value="<?php echo $result[0]->currency; ?>" type="text" class="form-control" placeholder="Currency"  required />

                                           <div class="ci_error"><?=form_error('currency');?></div>
                                            </div>
                                        </div>

 <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Accommodation Posted by <spsn> *</spsn></label>
                                                <select class="form-control" name="accomPostedby" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option <?php if($result[0]->accomPostedby=='Tenant'){ echo 'selected="selected"'; } ?> value="Tenant">Tenant</option>
            <option <?php if($result[0]->accomPostedby=='Owner'){ echo 'selected="selected"'; } ?> value="Owner">Owner</option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('accomPostedby');?></div>
                                            </div>
                                        </div>

<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Notice Period<spsn> *</spsn></label>
                                               
<input name="noticePeriod" value="<?php echo $result[0]->noticePeriod; ?>" type="text" class="form-control" placeholder="Notice Period"  required />

                                           <div class="ci_error"><?=form_error('noticePeriod');?></div>
                                            </div>
                                        </div>


<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Advance Months<spsn> *</spsn></label>
                                               
<input name="advanceMonths" value="<?php echo $result[0]->advanceMonths; ?>" type="text" class="form-control" placeholder="Advance Months"  required />

                                           <div class="ci_error"><?=form_error('advanceMonths');?></div>
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
                                               if($value->cov_id==4){
                                             ?>
                                               <option <?php if($result[0]->cover_area==$value->cov_id){echo"selected";}?> value="<?=$value->cov_id;?>"><?=$value->cover_area;?></option>
                                               <?php } }?>
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
                                        
<input type="hidden" value="3" name="sub_cat">
                                         
                                        
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
                                              <label>Accommodation Details<span> *</span></label>
                                                <textarea name="description" class="form-control mceEditor" placeholder=" Description" required><?=$result[0]->description;?></textarea>
                                                <div class="ci_error"><?=form_error('description');?></div>
                                            </div>
                                        </div>


<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Room Details</label>
                                                <textarea name="roomDetails" class="form-control mceEditor" placeholder=" Room Details"  ><?=set_value('roomDetails');?><?=$result[0]->roomDetails;?></textarea>
                                                <div class="ci_error"><?=form_error('roomDetails');?></div>
                                            </div>
                                        </div>
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Terms & Conditions</label>
                                                <textarea name="terms" class="form-control mceEditor" placeholder=" Terms & Conditions"  ><?=set_value('terms');?><?=$result[0]->terms;?></textarea>
                                                <div class="ci_error"><?=form_error('terms');?></div>
                                            </div>
                                        </div>





                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Search Keyword<span> *</span></label>
                                                <textarea name="search_keyword" class="form-control " placeholder="Search Keyword" required><?=$result[0]->search_keyword;?></textarea>
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

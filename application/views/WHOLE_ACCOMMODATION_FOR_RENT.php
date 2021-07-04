<form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Title<spsn> *</spsn></label>
                                                <input name="title" type="text" class="form-control" placeholder="Title" value="<?=set_value('title');?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>

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
                                              <label>Contact Person<spsn> *</spsn></label>
                                                <input name="contact_person" type="text" class="form-control" placeholder="Contact Person" value="<?=set_value('contact_person');?>" required />
                                                <div class="ci_error"><?=form_error('contact_person');?></div>
                                            </div>
                                        </div>

<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Furnished Type<spsn> *</spsn></label>
                                                <select class="form-control" name="furnishedType" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option value="Furnished">Furnished</option>
            <option value="Semi Furnished">Semi Furnished</option>
            <option value="Un Furnished">Un Furnished</option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('furnishedType');?></div>
                                            </div>
                                        </div>

<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Accommodation Type <spsn> *</spsn></label>
                                                <select class="form-control" name="accommodationType" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option value="Appartment">Appartment</option>
            <option value="Independent ">Independent </option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('accommodationType');?></div>
                                            </div>
                                        </div>



 <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Bed Rooms<spsn> *</spsn></label>
                                               
<input name="bedRooms" type="text" class="form-control" placeholder="bedRooms"  required />

                                           <div class="ci_error"><?=form_error('bedRooms');?></div>
                                            </div>
                                        </div>                                                                             
<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Toilets<spsn> *</spsn></label>
                                               
<input name="toilets" type="text" class="form-control" placeholder="Toilets"  required />

                                           <div class="ci_error"><?=form_error('toilets');?></div>
                                            </div>
                                        </div> 


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Floor<spsn> *</spsn></label>
                                               
<input name="floor" type="text" class="form-control" placeholder="Floor"  required />

                                           <div class="ci_error"><?=form_error('floor');?></div>
                                            </div>
                                        </div>


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Lift Available <spsn> *</spsn></label>
                                               
<div class="radio">
  <label>
    <input type="radio" name="liftAvailable" id="optionsRadios1" value="1" >
   Yes
  </label>
  <label>
    <input type="radio" name="liftAvailable" id="optionsRadios1" value="0" checked="">
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
    <input type="radio" name="petsAllowed" id="optionsRadios1" value="1" >
   Yes
  </label>
  <label>
    <input type="radio" name="petsAllowed" id="optionsRadios1" value="0" checked="">
   No
  </label>
</div>
                                        </div> 
                                        </div> 



<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Bachelors Allowed  <spsn> *</spsn></label>
                                               
<div class="radio">
  <label>
    <input type="radio" name="bachelorsAllowed" id="optionsRadios1" value="1" >
   Yes
  </label>
  <label>
    <input type="radio" name="bachelorsAllowed" id="optionsRadios1" value="0" checked="">
   No
  </label>
</div>
                                        </div> 
                                        </div> 


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Area<spsn> *</spsn></label>
                                               
<input name="area" type="text" class="form-control" placeholder="Area"  required />

                                           <div class="ci_error"><?=form_error('area');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Area Units<spsn> *</spsn></label>
                                               
<input name="areaUnits" type="text" class="form-control" placeholder="Area Units"  required />

                                           <div class="ci_error"><?=form_error('areaUnits');?></div>
                                            </div>
                                        </div>


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Utilities Included  <spsn> *</spsn></label>
                                               
<div class="radio">
  <label>
    <input type="radio" name="utilitiesIncluded" id="optionsRadios1" value="1" >
   Yes
  </label>
  <label>
    <input type="radio" name="utilitiesIncluded" id="optionsRadios1" value="0" checked="">
   No
  </label>
</div>
                                        </div> 
                                        </div>


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Available from Date<spsn> *</spsn></label>
                                               
<input name="availablefrom" type="date" class="form-control"   required />

                                           <div class="ci_error"><?=form_error('availablefrom');?></div>
                                            </div>
                                        </div>                                                                             
<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Rent Per Month<spsn> *</spsn></label>
                                               
<input name="monthlyrent" type="number" class="form-control" placeholder="Rent Per Month"  required />

                                           <div class="ci_error"><?=form_error('monthlyrent');?></div>
                                            </div>
                                        </div> 


<div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Currency<spsn> *</spsn></label>
                                               
<input name="currency" type="text" class="form-control" placeholder="Currency"  required />

                                           <div class="ci_error"><?=form_error('currency');?></div>
                                            </div>
                                        </div>

 <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Accommodation Posted by <spsn> *</spsn></label>
                                                <select class="form-control" name="accomPostedby" id="" required>
                                            <option value="">--Select one--</option>
                                           
            <option value="Tenant">Tenant</option>
            <option value="Owner">Owner</option>
            <option value="Broker">Broker</option>
            <option value="Friend">Friend</option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('accomPostedby');?></div>
                                            </div>
                                        </div>

<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Notice Period<spsn> *</spsn></label>
                                               
<input name="noticePeriod" type="text" class="form-control" placeholder="Notice Period"  required />

                                           <div class="ci_error"><?=form_error('noticePeriod');?></div>
                                            </div>
                                        </div>


<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Advance Months<spsn> *</spsn></label>
                                               
<input name="advanceMonths" type="text" class="form-control" placeholder="Advance Months"  required />

                                           <div class="ci_error"><?=form_error('advanceMonths');?></div>
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
                                               if($value->cov_id==4){
                                             ?>
                                               <option <?php if(set_value('cover_area')==$value->cov_id OR $value->cov_id==4){echo"selected";}?> value="<?=$value->cov_id;?>"><?=$value->cover_area;?></option>
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
<input type="hidden" value="30" name="sub_cat">                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Accommodation Details</label>
                                                <textarea name="description" class="form-control mceEditor" placeholder=" Accommodation Details"  ><?=set_value('description');?></textarea>
                                                <div class="ci_error"><?=form_error('description');?></div>
                                            </div>
                                        </div>



                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Terms & Conditions</label>
                                                <textarea name="terms" class="form-control mceEditor" placeholder=" Terms & Conditions"  ><?=set_value('description');?></textarea>
                                                <div class="ci_error"><?=form_error('terms');?></div>
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

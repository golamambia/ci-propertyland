<?php  
//$cat = base64_decode($this->input->get('module'));
//$sub_cat = base64_decode($this->input->get('submodule'));
?>
<style type="text/css">
  .ci_error p{
    color: #cc0404;
    font-size: 14px;
    font-weight: 600;
  }
</style>
    <?php
    $this->load->view('user_page_banner');
    ?>
        <div class="container">
            <div class="inner_banner_contant pt-0">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
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
                            <h3>Ad post</h3>
                            <div class="dashboard_mainboby">
                                <h4 class="add_listing">Add New Listings</h4>
                                <p class="contain">All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
                                <div class="form_area">


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

                                    
<!----------------- category wise form ------------------->                                    
<form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post">
                                    <div class="row">
                                       <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Property for<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_property_for" id="ppt_property_for" required>
  <option value="rent">Rent</option>
   <option value="sale">Sale</option>
</select>

                                           <div class="ci_error"><?=form_error('ppt_property_for');?></div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Property type<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_property_type" id="ppt_property_type" required>
  <option value="">Select one</option>
  <option value="plot">Plot</option>
   <option value="apartment_flat">Apartment/Flat</option>
   <option value="house_villa">House/Villa</option>
   <option value="farm_agriculture">Farm/Agriculture land</option>
   <option value="commercial">Commercial space</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_property_type');?></div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Property category<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_property_category" id="ppt_property_category" required>
  <option value="">Select one</option>
  <option value="individual">Individual</option>
   <option value="project">Project</option>
</select>

                                           <div class="ci_error"><?=form_error('ppt_property_category');?></div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Title<spsn> *</spsn></label>
                                                <input name="ppt_title" type="text" class="form-control" placeholder="Title" value="<?=set_value('ppt_title');?>" required />
                                                <div class="ci_error"><?=form_error('ppt_title');?></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Available from<spsn> *</spsn></label>
                                                <input type="date" name="ppt_available_from" class="form-control " placeholder="Phone" value="<?=set_value('ppt_available_from');?>" required />
                                                <div class="ci_error"><?=form_error('ppt_available_from');?></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 individual">
                                            <div class="form-group">
                                              <label>Land area<spsn> *</spsn></label>
                                                <input type="text" name="ppt_land_area" id="ppt_land_area" class="form-control" placeholder="Land area" value="<?=set_value('ppt_land_area');?>" />
                                                <div class="ci_error"><?=form_error('ppt_land_area');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 individual">
                                            <div class="form-group">
                                              <label>Land units<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_land_unit" id="ppt_land_unit"  >
  <option value="feet">Sq. Feet</option>
   <option value="yard">Sq. Yard</option>
   <option value="meter">Sq. Meters</option>
   <option value="acres">Acres</option>
   <option value="cent">Cent</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_land_unit');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 individual">
                                            <div class="form-group">
                                              <label>Facing<spsn> *</spsn></label>
                                                <select class="form-control" name="ppt_facing" id="ppt_facing"  >
  <option value="east">East</option>
   <option value="west">West</option>
   <option value="south">South</option>
   <option value="north">North</option>
   <option value="north_west">North-West</option>
    <option value="north_east">North-East</option>
   <option value="south_west">South-West</option>
   <option value="south_east">South-East</option>
      
</select>
                                                <div class="ci_error"><?=form_error('ppt_facing');?></div>
                                            </div>
                                        </div>
 <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Built-up area<spsn> *</spsn></label>
                                                <input type="text" name="ppt_builtup_area" id="ppt_builtup_area" class="form-control" placeholder="Built-up area" value="<?=set_value('ppt_builtup_area');?>" />
                                                <div class="ci_error"><?=form_error('ppt_builtup_area');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Built-up units<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_builtup_unit" id="ppt_builtup_unit"  >
  <option value="feet">Sq. Feet</option>
   <option value="yard">Sq. Yard</option>
   <option value="meter">Sq. Meters</option>
   <option value="acres">Acres</option>
   <option value="cent">Cent</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_builtup_unit');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Carpet area<spsn> *</spsn></label>
                                                <input type="text" name="ppt_carpet_area" id="ppt_carpet_area" class="form-control" placeholder="Carpet area" value="<?=set_value('ppt_carpet_area');?>" />
                                                <div class="ci_error"><?=form_error('ppt_carpet_area');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Carpet units<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_carpet_unit" id="ppt_carpet_unit" >

  <option value="feet">Sq. Feet</option>
   <option value="yard">Sq. Yard</option>
   <option value="meter">Sq. Meters</option>
   <option value="acres">Acres</option>
   <option value="cent">Cent</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_carpet_unit');?></div>
                                            </div>
                                        </div>
<!----------------- Begin Land Dimension ------------------->  										
                                         <div class="col-lg-6 cat_property measurement">
                                            <div class="form-group">
                                              <label>Measurement in Feet Road(L)<spsn> *</spsn></label>
                                                <input type="text" name="ppt_land_l" id="ppt_land_l" class="form-control" placeholder="Road(L)" value="<?=set_value('ppt_land_l');?>" />
                                                <div class="ci_error"><?=form_error('ppt_land_l');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property measurement">
                                            <div class="form-group">
                                              <label>Measurement other side(B)<spsn> *</spsn></label>
                                                <input type="text" name="ppt_land_b" id="ppt_land_b" class="form-control" placeholder="Other(B)" value="<?=set_value('ppt_land_b');?>" />
                                                <div class="ci_error"><?=form_error('ppt_land_b');?></div>
                                            </div>
                                        </div>
<!----------------- End Land Dimension ------------------->  										

<!----------------- Begin Corner ------------------->  										
                                         <div class="col-lg-6 individual  ">
                                            <div class="form-group">
                                              <label>Corner<spsn> *</spsn></label>
                                                <input type="checkbox" name="ppt_corner" id="ppt_corner" class="form-control" value="1" />
                                                <div class="ci_error"><?=form_error('ppt_corner');?></div>
                                            </div>
                                        </div>
<!----------------- End Corner ------------------->  										
<!----------------- Begin Gated ------------------->  										
                                         <div class="col-lg-6 cat_property gated">
                                            <div class="form-group">
                                              <label>Gated<spsn> </spsn></label>
                                                <input type="checkbox" name="ppt_gated" id="ppt_gated" class="form-control" value="1" />
                                                <div class="ci_error"><?=form_error('ppt_gated');?></div>
                                            </div>
                                        </div>
<!----------------- End Gated ------------------->  										
<!----------------- Begin Gated ------------------->  										
                                         <div class="col-lg-6 cat_property1 individual1 joint_sale">
                                            <div class="form-group">
                                              <label>Interested in Joint Development<spsn> *</spsn></label>
                                                <input type="checkbox" name="ppt_jointdev" id="ppt_jointdev" class="form-control" value="1" />
                                                <div class="ci_error"><?=form_error('ppt_jointdev');?></div>
                                            </div>
                                        </div>
<!----------------- End Gated ------------------->  										

                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Property Details</label>
                                                <textarea name="ppt_details" class="form-control mceEditor" placeholder=" Property Details"  ><?=set_value('description');?></textarea>
                                                <div class="ci_error"><?=form_error('ppt_details');?></div>
                                            </div>
                                        </div>



<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Total price<spsn> *</spsn></label>
                                                                                            
<input name="ppt_total_price"  type="text" class="form-control" placeholder="Total price"  required />

                                           <div class="ci_error"><?=form_error('ppt_total_price');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Need broker/agent assistance</label>
                                                                                            
<input name="ppt_broker_need"  type="checkbox" class="form-control" value="1" />

                                           <div class="ci_error"><?=form_error('ppt_broker_need');?></div>
                                            </div>
                                        </div>

<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Website</label>
                                               
<input name="ppt_website" type="text" class="form-control" placeholder="Website"  />

                                           <div class="ci_error"><?=form_error('ppt_website');?></div>
                                            </div>
                                        </div>        

 <div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Bed Rooms<spsn> *</spsn></label>
                                               
<input name="ppt_bedroom_count" id="bedRooms" type="text" class="form-control" placeholder="Bed Rooms"  required />

                                           <div class="ci_error"><?=form_error('ppt_bedroom_count');?></div>
                                            </div>
                                        </div>  

 <div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Bathroom count<spsn> *</spsn></label>
                                               
<input name="ppt_bathroom_count" id="ppt_bathroom_count" type="text" class="form-control" placeholder="Bathroom count"  required />

                                           <div class="ci_error"><?=form_error('ppt_bathroom_count');?></div>
                                            </div>
                                        </div>                                                                                                                                                    
<div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Floor Number<spsn> *</spsn></label>
                                               
<input name="ppt_floor_number" id="ppt_floor_number" type="text" class="form-control" placeholder="Floor Number"  required />

                                           <div class="ci_error"><?=form_error('ppt_floor_number');?></div>
                                            </div>
                                        </div> 

<div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Furnishing<spsn> *</spsn></label>
                                                <select class="form-control" name="ppt_furnishing" id="ppt_furnishing" required>
                                            <option value="">--Select one--</option>
                                           
            <option value="Furnished">Furnished</option>
            <option value="Semi_Furnished">Semi-Furnished</option>
            <option value="UnFurnished">Un-Furnished</option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('ppt_furnishing');?></div>
                                            </div>
                                        </div>
<div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Four Wheeler Parking<spsn> *</spsn></label>
                                               
<input name="ppt_4wheeler_count" id="ppt_4wheeler_count" type="text" class="form-control" placeholder="Count"  required />

                                           <div class="ci_error"><?=form_error('ppt_4wheeler_count');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Two Wheeler Parking<spsn> *</spsn></label>
                                               
<input name="ppt_2wheeler_count" id="ppt_2wheeler_count" type="text" class="form-control" placeholder="Count"  required />

                                           <div class="ci_error"><?=form_error('ppt_2wheeler_count');?></div>
                                            </div>
                                        </div>


<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Property Status <spsn> *</spsn></label>
<select class="form-control" name="ppt_property_status" id="ppt_property_status" required>
                                            <option value="">--Select one--</option>
                                           
            <option value="active">Active</option>
            <option value="pause">Pause</option>
            
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('ppt_property_status');?></div>
                                            </div> 
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Property Address<spsn> *</spsn></label>
                                                <textarea name="address" id="address" class="form-control" placeholder="Address with pincode" required><?=set_value('address');?></textarea>
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
                                            <h4>Main Photo <span> *</span>:</h4>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image1" >
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="ci_error"><?=form_error('image1');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Other Photos <span>(upload multiple photos note)</span>:</h4>
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

<!----------------- category wise form ------------------->



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 dashboard_right mt-3">
                        <div class="dashboardright_area">
                            <div class="aside_box">
                                <?php 
                                $this->load->view('notification');
                                ?>
                            </div>
                        </div>


<!--Company List-->

             

<!--Company List-->
                    </div>








                </div>
            </div>
        </div>
    </div>

<!-- report error modal start -->
    <div class="modal fade" id="myModal_cat"></div>
    <!-- report error modal stop -->

 

    <script type="text/javascript">
        $(document).ready(function(){
           $('.individual').hide();
           $('.cat_property').hide();
           $('.joint_sale').hide();
           $('.gated').hide();
            $('.measurement').hide();
$('#ppt_property_category').change(function(){
 var cat= $('#ppt_property_category').val();
 if(cat=='individual'){
$('#ppt_land_area').prop('required',true);
$('#ppt_land_unit').prop('required',true);
$('#ppt_facing').prop('required',true);
//$('#ppt_corner').prop('required',true);
//$('#ppt_gated').prop('required',true);
$('#ppt_land_l').prop('required',true);
$('#ppt_land_b').prop('required',true);
$('#ppt_jointdev').prop('required',true);
$('.individual').show();
 //$('.joint_sale').show();
 }else{
$('#ppt_land_area').val('');
$('#ppt_land_unit').val('');
$('#ppt_facing').val('');
$('#ppt_builtup_area').val('');
$('#ppt_builtup_unit').val('');
$('#ppt_carpet_area').val('');
$('#ppt_carpet_unit').val('');
$('#ppt_corner').prop('checked', false);
$('#ppt_gated').prop('checked', false);
$('#ppt_land_l').val('');
$('#ppt_land_b').val('');
$('#bedRooms').val('');
$('#ppt_bathroom_count').val('');
$('#ppt_floor_number').val('');
$('#ppt_furnishing').val('');
$('#ppt_4wheeler_count').val('');
$('#ppt_2wheeler_count').val('');
 $('#ppt_jointdev').prop('checked', false);
$('#ppt_builtup_area').prop('required',false);
$('#ppt_builtup_unit').prop('required',false);
$('#ppt_carpet_area').prop('required',false);
$('#ppt_carpet_unit').prop('required',false);
$('#ppt_corner').prop('required',false);
$('#ppt_gated').prop('required',false);
$('#ppt_jointdev').prop('required',false);
$('#ppt_land_l').prop('required',false); 
$('#ppt_land_b').prop('required',false);
$('#bedRooms').prop('required',false);
$('#ppt_bathroom_count').prop('required',false);
$('#ppt_floor_number').prop('required',false);
$('#ppt_furnishing').prop('required',false);
$('#ppt_4wheeler_count').prop('required',false);
$('#ppt_2wheeler_count').prop('required',false);
  $('.individual').hide();
   //$('.joint_sale').hide();
 }

 }); 

$('#ppt_property_type,#ppt_property_category,#ppt_property_for').change(function(){
var cat_type= $('#ppt_property_category').val();
var property_for= $('#ppt_property_for').val();
var property_type= $('#ppt_property_type').val();
if(cat_type=='individual' && property_type=='apartment_flat' ){ 
  //alert(1);
$('#ppt_builtup_area').prop('required',true);
$('#ppt_builtup_unit').prop('required',true);
$('#ppt_carpet_area').prop('required',true);
$('#ppt_carpet_unit').prop('required',true);
//$('#ppt_corner').prop('required',true);


$('#bedRooms').prop('required',true);
$('#ppt_bathroom_count').prop('required',true);
$('#ppt_floor_number').prop('required',true);
$('#ppt_furnishing').prop('required',true);
$('#ppt_4wheeler_count').prop('required',true);
$('#ppt_2wheeler_count').prop('required',true);
//$('#ppt_gated').prop('required',true);
  
  $('#ppt_land_l').prop('required',false);
  $('#ppt_land_b').prop('required',false);
  
  $('#ppt_land_l').val('');
  $('#ppt_land_b').val('');
$('.cat_property').show();
$('.gated').show();

$('.joint_sale').hide();
  $('#ppt_jointdev').prop('required',false);
  $('#ppt_jointdev').prop('checked', false);
  $('.measurement').hide();
}else if(cat_type=='individual' &&  property_type=='house_villa'){ 
$('#ppt_builtup_area').prop('required',true);
$('#ppt_builtup_unit').prop('required',true);
$('#ppt_carpet_area').prop('required',true);
$('#ppt_carpet_unit').prop('required',true);
//$('#ppt_corner').prop('required',true);


$('#bedRooms').prop('required',true);
$('#ppt_bathroom_count').prop('required',true);
$('#ppt_floor_number').prop('required',true);
$('#ppt_furnishing').prop('required',true);
$('#ppt_4wheeler_count').prop('required',true);
$('#ppt_2wheeler_count').prop('required',true);
$('.cat_property').show();
$('.gated').show();
 $('#ppt_land_l').prop('required',true);
$('#ppt_land_b').prop('required',true);
//$('#ppt_gated').prop('required',true);
  
  
$('.joint_sale').hide();
  $('#ppt_jointdev').prop('required',false);
  $('#ppt_jointdev').prop('checked', false);
  $('.measurement').show();
}else if(cat_type=='individual' && property_type=='farm_agriculture'){
$('#ppt_builtup_area').val('');
$('#ppt_builtup_unit').val('');
$('#ppt_carpet_area').val('');
$('#ppt_carpet_unit').val('');
$('#bedRooms').val('');
$('#ppt_bathroom_count').val('');
$('#ppt_floor_number').val('');
$('#ppt_furnishing').val('');
$('#ppt_4wheeler_count').val('');
$('#ppt_2wheeler_count').val('');

$('#ppt_builtup_area').prop('required',false);
$('#ppt_builtup_unit').prop('required',false);
$('#ppt_carpet_area').prop('required',false);
$('#ppt_carpet_unit').prop('required',false);
//$('#ppt_corner').prop('required',true);
 $('#ppt_land_l').prop('required',true);
$('#ppt_land_b').prop('required',true);

$('#ppt_gated').prop('required',false);
  $('#ppt_gated').prop('checked', false);


$('#bedRooms').prop('required',false);
$('#ppt_bathroom_count').prop('required',false);
$('#ppt_floor_number').prop('required',false);
$('#ppt_furnishing').prop('required',false);
$('#ppt_4wheeler_count').prop('required',false);
$('#ppt_2wheeler_count').prop('required',false);
$('.cat_property').show();

  $('#ppt_gated').prop('required',false);
  $('#ppt_gated').prop('checked', false);
  
$('.gated').hide();
$('.measurement').show();
}else if(cat_type=='individual' && property_type=='plot'){
$('#ppt_builtup_area').val('');
$('#ppt_builtup_unit').val('');
$('#ppt_carpet_area').val('');
$('#ppt_carpet_unit').val('');
$('#bedRooms').val('');
$('#ppt_bathroom_count').val('');
$('#ppt_floor_number').val('');
$('#ppt_furnishing').val('');
$('#ppt_4wheeler_count').val('');
$('#ppt_2wheeler_count').val('');

$('#ppt_builtup_area').prop('required',false);
$('#ppt_builtup_unit').prop('required',false);
$('#ppt_carpet_area').prop('required',false);
$('#ppt_carpet_unit').prop('required',false);
//$('#ppt_corner').prop('required',true);
 $('#ppt_land_l').prop('required',true);
$('#ppt_land_b').prop('required',true);

  
if(property_for=='sale'){
  $('.joint_sale').show();
  $('#ppt_jointdev').prop('required',true);
}else{
  $('.joint_sale').hide();
  $('#ppt_jointdev').prop('required',false);
  $('#ppt_jointdev').prop('checked', false);
}

$('#bedRooms').prop('required',false);
$('#ppt_bathroom_count').prop('required',false);
$('#ppt_floor_number').prop('required',false);
$('#ppt_furnishing').prop('required',false);
$('#ppt_4wheeler_count').prop('required',false);
$('#ppt_2wheeler_count').prop('required',false);
$('.cat_property').show();
//$('#ppt_gated').prop('required',true);
$('.gated').show();
$('.measurement').show();
}else{
$('#ppt_builtup_area').val('');
$('#ppt_builtup_unit').val('');
$('#ppt_carpet_area').val('');
$('#ppt_carpet_unit').val('');
$('#ppt_corner').prop('checked', false);
$('#ppt_gated').prop('checked', false);
$('#ppt_land_l').val('');
$('#ppt_land_b').val('');
$('#bedRooms').val('');
$('#ppt_bathroom_count').val('');
$('#ppt_floor_number').val('');
$('#ppt_furnishing').val('');
$('#ppt_4wheeler_count').val('');
$('#ppt_2wheeler_count').val('');

$('#ppt_builtup_area').prop('required',false);
$('#ppt_builtup_unit').prop('required',false);
$('#ppt_carpet_area').prop('required',false);
$('#ppt_carpet_unit').prop('required',false);
$('#ppt_corner').prop('required',false);
$('#ppt_gated').prop('required',false);
$('#ppt_jointdev').prop('required',false);
 $('#ppt_jointdev').prop('checked', false);
$('#ppt_land_l').prop('required',false);
$('#ppt_land_b').prop('required',false);
$('#bedRooms').prop('required',false);
$('#ppt_bathroom_count').prop('required',false);
$('#ppt_floor_number').prop('required',false);
$('#ppt_furnishing').prop('required',false);
$('#ppt_4wheeler_count').prop('required',false);
$('#ppt_2wheeler_count').prop('required',false);
$('.cat_property').hide();
  $('.joint_sale').hide();
  $('.gated').hide();
  $('.measurement').hide();
}
});

          });
        $(document).ready(function(){
          $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
            
            $('#address').blur(function(){
                //alert(1);
                var address=$('#address').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>Lbcontacts/lat_long',
                    cache:false,
                    //dataType: 'json',
                    data:{address:address},
                    success:function(response){
                        console.log(response);
                       
                
                }

                });

            });


        });
    </script>
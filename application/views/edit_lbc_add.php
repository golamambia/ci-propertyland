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
                            <h3>Update post</h3>
                            <?php echo validation_errors(); ?>
                            <div class="dashboard_mainboby">
                                <h4 class="add_listing">Add New Information</h4>
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
<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>adslist/edit_post/<?php echo $single_info[0]->ppt_id?>"  onsubmit="return confirm('Are you sure to update ,after update your ad will deactive for verification ?')">
                                    <div class="row">
                                       <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Property for<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_property_for" id="ppt_property_for" required>
  <option <?php if($single_info[0]->ppt_property_for=='rent'){echo "selected";}?>  value="rent">Rent</option>
   <option <?php if($single_info[0]->ppt_property_for=='sale'){echo "selected";}?> value="sale">Sale</option>
</select>

                                           <div class="ci_error"><?=form_error('ppt_property_for');?></div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Property type<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_property_type" id="ppt_property_type" required>
  <option value="">Select one</option>
  <option value="plot" <?php if($single_info[0]->ppt_property_type=='plot'){echo "selected";}?>>Plot</option>
   <option value="apartment_flat" <?php if($single_info[0]->ppt_property_type=='apartment_flat'){echo "selected";}?>>Apartment/Flat</option>
   <option value="house_villa" <?php if($single_info[0]->ppt_property_type=='house_villa'){echo "selected";}?>>House/Villa</option>
   <option value="farm_agriculture" <?php if($single_info[0]->ppt_property_type=='farm_agriculture'){echo "selected";}?>>Farm/Agriculture land</option>
   <option value="commercial" <?php if($single_info[0]->ppt_property_type=='commercial'){echo "selected";}?>>Commercial space</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_property_type');?></div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                              <label>Property category<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_property_category" id="ppt_property_category" required>
  <option value="">Select one</option>
  <option value="individual" <?php if($single_info[0]->ppt_property_category=='individual'){echo "selected";}?>>Individual</option>
   <option value="project" <?php if($single_info[0]->ppt_property_category=='project'){echo "selected";}?>>Project</option>
</select>

                                           <div class="ci_error"><?=form_error('ppt_property_category');?></div>
                                            </div>
                                        </div> 
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Title<spsn> *</spsn></label>
                                                <input name="ppt_title" type="text" class="form-control" placeholder="Title" value="<?=$single_info[0]->ppt_title;?>" required />
                                                <div class="ci_error"><?=form_error('ppt_title');?></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Available from<spsn> *</spsn></label>
                                                <input type="date" name="ppt_available_from" class="form-control " placeholder="Phone" value="<?=$single_info[0]->ppt_available_from;?>" required />
                                                <div class="ci_error"><?=form_error('ppt_available_from');?></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 individual">
                                            <div class="form-group">
                                              <label>Land area<spsn> *</spsn></label>
                                                <input type="text" name="ppt_land_area" id="ppt_land_area" class="form-control" placeholder="Land area" value="<?=$single_info[0]->ppt_land_area;?>" />
                                                <div class="ci_error"><?=form_error('ppt_land_area');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 individual">
                                            <div class="form-group">
                                              <label>Land units<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_land_unit" id="ppt_land_unit"  >
  <option value="">--Select one--</option>
  <option value="feet" <?php if($single_info[0]->ppt_land_unit=='feet'){echo "selected";}?>>Sq. Feet</option>
   <option value="yard" <?php if($single_info[0]->ppt_land_unit=='yard'){echo "selected";}?>>Sq. Yard</option>
   <option value="individual" <?php if($single_info[0]->ppt_land_unit=='individual'){echo "selected";}?>>Sq. Meters</option>
   <option value="acres" <?php if($single_info[0]->ppt_land_unit=='acres'){echo "selected";}?>>Acres</option>
   <option value="cent" <?php if($single_info[0]->ppt_land_unit=='cent'){echo "selected";}?>>Cent</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_land_unit');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 individual">
                                            <div class="form-group">
                                              <label>Facing<spsn> *</spsn></label>
                                                <select class="form-control" name="ppt_facing" id="ppt_facing"  >
                                                  <option value="">--Select one--</option>
  <option value="east" <?php if($single_info[0]->ppt_facing=='cent'){echo "selected";}?>>East</option>
   <option value="west" <?php if($single_info[0]->ppt_facing=='west'){echo "selected";}?>>West</option>
   <option value="south" <?php if($single_info[0]->ppt_facing=='south'){echo "selected";}?>>South</option>
   <option value="north" <?php if($single_info[0]->ppt_facing=='north'){echo "selected";}?>>North</option>
   <option value="north_west" <?php if($single_info[0]->ppt_facing=='north_west'){echo "selected";}?>>North-West</option>
    <option value="north_east" <?php if($single_info[0]->ppt_facing=='north_east'){echo "selected";}?>>North-East</option>
   <option value="south_west" <?php if($single_info[0]->ppt_facing=='south_west'){echo "selected";}?>>South-West</option>
   <option value="south_east" <?php if($single_info[0]->ppt_facing=='south_east'){echo "selected";}?>>South-East</option>
      
</select>
                                                <div class="ci_error"><?=form_error('ppt_facing');?></div>
                                            </div>
                                        </div>
 <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Built-up area<spsn> *</spsn></label>
                                                <input type="text" name="ppt_builtup_area" id="ppt_builtup_area" class="form-control" placeholder="Built-up area" value="<?=$single_info[0]->ppt_builtup_area;?>" />
                                                <div class="ci_error"><?=form_error('ppt_builtup_area');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Built-up units<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_builtup_unit" id="ppt_builtup_unit"  >
  <option value="">--Select one--</option>
  <option value="feet" <?php if($single_info[0]->ppt_builtup_unit=='feet'){echo "selected";}?>>Sq. Feet</option>
   <option value="yard" <?php if($single_info[0]->ppt_builtup_unit=='yard'){echo "selected";}?>>Sq. Yard</option>
   <option value="individual" <?php if($single_info[0]->ppt_builtup_unit=='individual'){echo "selected";}?>>Sq. Meters</option>
   <option value="acres" <?php if($single_info[0]->ppt_builtup_unit=='acres'){echo "selected";}?>>Acres</option>
   <option value="cent" <?php if($single_info[0]->ppt_builtup_unit=='cent'){echo "selected";}?>>Cent</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_builtup_unit');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Carpet area<spsn> *</spsn></label>
                                                <input type="text" name="ppt_carpet_area" id="ppt_carpet_area" class="form-control" placeholder="Carpet area" value="<?=$single_info[0]->ppt_carpet_area;?>" />
                                                <div class="ci_error"><?=form_error('ppt_carpet_area');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property">
                                            <div class="form-group">
                                              <label>Carpet units<spsn> *</spsn></label>
                                               

<select class="form-control" name="ppt_carpet_unit" id="ppt_carpet_unit" >
<option value="">--Select one--</option>
  <option value="feet" <?php if($single_info[0]->ppt_carpet_unit=='feet'){echo "selected";}?>>Sq. Feet</option>
   <option value="yard" <?php if($single_info[0]->ppt_carpet_unit=='yard'){echo "selected";}?>>Sq. Yard</option>
   <option value="individual" <?php if($single_info[0]->ppt_carpet_unit=='individual'){echo "selected";}?>>Sq. Meters</option>
   <option value="acres" <?php if($single_info[0]->ppt_carpet_unit=='acres'){echo "selected";}?>>Acres</option>
   <option value="cent" <?php if($single_info[0]->ppt_carpet_unit=='cent'){echo "selected";}?>>Cent</option>
   
</select>

                                           <div class="ci_error"><?=form_error('ppt_carpet_unit');?></div>
                                            </div>
                                        </div>
                                        <!----------------- Begin Land Dimension ------------------->                     
                                         <div class="col-lg-6 cat_property measurement">
                                            <div class="form-group">
                                              <label>Measurement in Feet Road(L)<spsn> *</spsn></label>
                                                <input type="text" name="ppt_land_l" id="ppt_land_l" class="form-control" placeholder="Road(L)" value="<?=$single_info[0]->ppt_land_l;?>" />
                                                <div class="ci_error"><?=form_error('ppt_land_l');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-6 cat_property measurement">
                                            <div class="form-group">
                                              <label>Measurement other side(B)<spsn> *</spsn></label>
                                                <input type="text" name="ppt_land_b" id="ppt_land_b" class="form-control" placeholder="Other(B)" value="<?=$single_info[0]->ppt_land_b;?>" />
                                                <div class="ci_error"><?=form_error('ppt_land_b');?></div>
                                            </div>
                                        </div>
<!----------------- End Land Dimension ------------------->                     

<!----------------- Begin Corner ------------------->                     
                                         <div class="col-lg-6 individual  ">
                                            <div class="form-group">
                                              <label>Corner<spsn> *</spsn></label>
                                                <input type="checkbox" name="ppt_corner" id="ppt_corner" class="form-control" value="1" <?php if($single_info[0]->ppt_corner==1){echo"checked";}?> />
                                                <div class="ci_error"><?=form_error('ppt_corner');?></div>
                                            </div>
                                        </div>
<!----------------- End Corner ------------------->                     
<!----------------- Begin Gated ------------------->                      
                                         <div class="col-lg-6 cat_property gated">
                                            <div class="form-group">
                                              <label>Gated<spsn> *</spsn></label>
                                                <input type="checkbox" name="ppt_gated" id="ppt_gated" class="form-control" value="1" <?php if($single_info[0]->ppt_gated==1){echo"checked";}?>/>
                                                <div class="ci_error"><?=form_error('ppt_gated');?></div>
                                            </div>
                                        </div>
<!----------------- End Gated ------------------->                      
<!----------------- Begin Gated ------------------->                      
                                         <div class="col-lg-6 cat_property1 individual1 joint_sale">
                                            <div class="form-group">
                                              <label>Interested in Joint Development<spsn> *</spsn></label>
                                                <input type="checkbox" name="ppt_jointdev" id="ppt_jointdev" class="form-control" value="1" <?php if($single_info[0]->ppt_jointdev==1){echo"checked";}?>/>
                                                <div class="ci_error"><?=form_error('ppt_jointdev');?></div>
                                            </div>
                                        </div>
<!----------------- End Gated -------------------> 
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Property Details</label>
                                                <textarea name="ppt_details" class="form-control mceEditor" placeholder=" Property Details"  ><?=$single_info[0]->ppt_details;?></textarea>
                                                <div class="ci_error"><?=form_error('ppt_details');?></div>
                                            </div>
                                        </div>



<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Total price<spsn> *</spsn></label>
                                                                                            
<input name="ppt_total_price"  type="text" class="form-control" placeholder="Total price" value="<?=$single_info[0]->ppt_total_price;?>" required />

                                           <div class="ci_error"><?=form_error('ppt_total_price');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Need broker/agent assistance</label>
                                                                                            
<input name="ppt_broker_need"  type="checkbox" class="form-control" value="1" <?php if($single_info[0]->ppt_broker_need==1){echo "checked";}?> />

                                           <div class="ci_error"><?=form_error('ppt_broker_need');?></div>
                                            </div>
                                        </div>

<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Website</label>
                                               
<input name="ppt_website" type="text" class="form-control" placeholder="Website" value="<?=$single_info[0]->ppt_website;?>"  />

                                           <div class="ci_error"><?=form_error('ppt_website');?></div>
                                            </div>
                                        </div>        

 <div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Bed Rooms<spsn> *</spsn></label>
                                               
<input name="ppt_bedroom_count" id="bedRooms" type="text" class="form-control" placeholder="Bed Rooms"  required value="<?=$single_info[0]->ppt_bedroom_count;?>" />

                                           <div class="ci_error"><?=form_error('ppt_bedroom_count');?></div>
                                            </div>
                                        </div>  

 <div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Bathroom count<spsn> *</spsn></label>
                                               
<input name="ppt_bathroom_count" id="ppt_bathroom_count" type="text" class="form-control" placeholder="Bathroom count" value="<?=$single_info[0]->ppt_bathroom_count;?>" required />

                                           <div class="ci_error"><?=form_error('ppt_bathroom_count');?></div>
                                            </div>
                                        </div>                                                                                                                                                    
<div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Floor Number<spsn> *</spsn></label>
                                               
<input name="ppt_floor_number" id="ppt_floor_number" type="text" class="form-control" placeholder="Floor Number"  required value="<?=$single_info[0]->ppt_floor_number;?>" />

                                           <div class="ci_error"><?=form_error('ppt_floor_number');?></div>
                                            </div>
                                        </div> 

<div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Furnishing<spsn> *</spsn></label>
                                                <select class="form-control" name="ppt_furnishing" id="ppt_furnishing" >
                                            <option value="">--Select one--</option>
                                           
            <option value="Furnished" <?php if($single_info[0]->ppt_furnishing=='Furnished'){echo "selected";}?>>Furnished</option>
            <option value="Semi_Furnished" <?php if($single_info[0]->ppt_furnishing=='Semi_Furnished'){echo "selected";}?>>Semi-Furnished</option>
            <option value="UnFurnished" <?php if($single_info[0]->ppt_furnishing=='UnFurnished'){echo "selected";}?>>Un-Furnished</option>
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('ppt_furnishing');?></div>
                                            </div>
                                        </div>
<div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Four Wheeler Parking<spsn> *</spsn></label>
                                               
<input name="ppt_4wheeler_count" id="ppt_4wheeler_count" type="text" class="form-control" placeholder="Count"  required value="<?=$single_info[0]->ppt_4wheeler_count;?>" />

                                           <div class="ci_error"><?=form_error('ppt_4wheeler_count');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 cat_property">
                                            <div class="form-group">
                                              <label>Two Wheeler Parking<spsn> *</spsn></label>
                                               
<input name="ppt_2wheeler_count" id="ppt_2wheeler_count" type="text" class="form-control" placeholder="Count"  required value="<?=$single_info[0]->ppt_2wheeler_count;?>" />

                                           <div class="ci_error"><?=form_error('ppt_2wheeler_count');?></div>
                                            </div>
                                        </div>


<div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Property Status <spsn> *</spsn></label>
<select class="form-control" name="ppt_property_status" id="ppt_property_status" required>
                                            <option value="">--Select one--</option>
                                           
            <option value="active" <?php if($single_info[0]->ppt_property_status=='active'){echo "selected";}?>>Active</option>
            <option value="pause" <?php if($single_info[0]->ppt_property_status=='pause'){echo "selected";}?>>Pause</option>
            
                                              
                                           </select>
                                           <div class="ci_error"><?=form_error('ppt_property_status');?></div>
                                            </div> 
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Property Address<spsn> *</spsn></label>
                                                <textarea name="address" id="address" class="form-control" placeholder="Address with pincode" required><?=$single_info[0]->ppt_property_address;?></textarea>
                                                <div class="ci_error"><?=form_error('address');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Landmark<spsn> *</spsn></label>
                                                <textarea name="landmark" class="form-control" placeholder="Landmark" required><?=$single_info[0]->ppt_landmark;?></textarea>
                                                <div class="ci_error"><?=form_error('landmark');?></div>
                                            </div>
                                        </div>
                                     
                                     
                                        <div class="col-lg-6">
                                            <h4>Main Photo <span> *</span>:</h4>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image1" >
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="ci_error"><?=form_error('image1');?></div>
                                            </div>
                                        </div>
                                             <div class="col-md-6">

                                <div class="form-group">

                                            <label for="eventInput3">&nbsp; </label>

                                           <img src="<?=base_url();?>uploads/module_file/<?php echo $single_info[0]->ppt_main_img;?>" alt="Smiley face" style="width: 70px;height: 70px;">



                                        </div>

                                    </div>
                                        <div class="col-lg-12">
                                            <h4>Other Photos <span>(upload multiple photos note)</span>:</h4>
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

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec->id;?>,'<?=$row_rec->lbcontact_id;?>')">Remove</span><img src="<?=base_url();?>uploads/module_file/<?php echo $row_rec->multi_image;?>" style="height: 100px;"/></div>
</div>


         <?php } ?>
</div>         

                </div>

</label>



                                </div>



                            </div>



<!----------- image loop -------------->
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary w-100">Save</button>
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
          
          <?php if($single_info[0]->ppt_property_category=='individual' && $single_info[0]->ppt_property_type=='apartment_flat'){?>
            //alert(1);
          $('.cat_property').show();
          $('.gated').show();
          $('.joint_sale').hide();
          $('.measurement').hide();
         <?php }else if($single_info[0]->ppt_property_category=='individual' && $single_info[0]->ppt_property_type=='house_villa'){?>
          $('.cat_property').show();
          $('.gated').show();
          $('.joint_sale').hide();
          $('.measurement').show();
         <?php }else if($single_info[0]->ppt_property_category=='individual' && $single_info[0]->ppt_property_type=='plot'){?>
          $('.cat_property').show();
          $('.gated').show();
          <?php if($single_info[0]->ppt_property_for=='sale'){?>
            $('.joint_sale').hide();
          <?php }else{?>
            $('.joint_sale').hide();
          <?php }?>
          
          $('.measurement').show();
         <?php }else if($single_info[0]->ppt_property_category=='individual' && $single_info[0]->ppt_property_type=='farm_agriculture'){?>
          $('.cat_property').show();
          $('.gated').hide();
          $('.joint_sale').hide();
          $('.measurement').show();
         <?php }else{?>
          $('.individual').hide();
           $('.cat_property').hide();
           $('.joint_sale').hide();
           $('.gated').hide();
            $('.measurement').hide();
         <?php }?>
           
$('#ppt_property_category').change(function(){
 var cat= $('#ppt_property_category').val();
 if(cat=='individual'){
$('#ppt_land_area').prop('required',true);
$('#ppt_land_unit').prop('required',true);
$('#ppt_facing').prop('required',true);
$('#ppt_corner').prop('required',false);
$('#ppt_gated').prop('required',false);
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
$('#ppt_gated').prop('required',false);
  
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
$('#ppt_gated').prop('required',false);
  
  
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
$('#ppt_gated').prop('required',false);
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

 <script type="text/javascript">
     function del_img(val,val2){

    //alert(1);

    $con=confirm("Are you to delete ?");

    if($con){

$.ajax({

type: "POST",

url: "<?php echo base_url();?>adslist/get_multiimage",

data: 'val=' + val+'&val2='+val2,

cache: false,

success: function(html) {

//alert(html);

$("#alert_rem").show();

$("#multi_img").html(html);



}

});

}



return false;

}


 </script>   
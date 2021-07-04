
                            <div class="dashboard_mainboby">
                               
                                <div class="form_area">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">


                                        <div class="col-lg-6">
                                            <h4>Title</h4>
                                            <p><?=$result[0]->title; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Phone</h4>
                                            <p><?=$result[0]->phone; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Email</h4>
                                            <p><?=$result[0]->email; ?></p>

                                             
                                        </div>
                                        <div class="col-lg-6">
                                            <h4>Contact Person</h4>
                                            <p><?=$result[0]->contact_person; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-12">
                                            <h4>Address</h4>
                                            <p><?=$result[0]->address; ?></p>

                                             
                                        </div>

<div class="col-lg-6">
<h4>Furnished Type</h4>
<p><?=$result[0]->furnishedType; ?></p>
</div>

<div class="col-lg-6">
<h4>Accommodation Type</h4>
<p><?=$result[0]->accommodationType; ?></p>
</div>


<div class="col-lg-6">
<h4>Bed Rooms</h4>
<p><?=$result[0]->bedRooms; ?></p>
</div>

<div class="col-lg-6">
<h4>Toilets</h4>
<p><?=$result[0]->toilets; ?></p>
</div>

<div class="col-lg-6">
<h4>Floor</h4>
<p><?=$result[0]->floor; ?></p>
</div>

<div class="col-lg-6">
<h4>Lift Available</h4>
<p><?php if($result[0]->petsAllowed==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Pets Allowed</h4>
<p><?php if($result[0]->petsAllowed==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Bachelors Allowed</h4>
<p><?php if($result[0]->bachelorsAllowed==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Area</h4>
<p><?=$result[0]->area; ?></p>
</div>

<div class="col-lg-6">
<h4>Area Units</h4>
<p><?=$result[0]->areaUnits; ?></p>
</div>



<div class="col-lg-6">
<h4>Utilities Included</h4>
<p><?php if($result[0]->utilitiesIncluded==1){ echo 'Yes'; }else { echo "No"; } ?></p>
</div>

<div class="col-lg-6">
<h4>Available from Date</h4>
<p><?=$result[0]->availablefrom; ?></p>
</div>

<div class="col-lg-6">
<h4>Rent Per Month</h4>
<p><?=$result[0]->monthlyrent; ?></p>
</div>

<div class="col-lg-6">
<h4>Currency</h4>
<p><?=$result[0]->currency; ?></p>
</div>

<div class="col-lg-6">
<h4>Accommodation Posted by</h4>
<p><?=$result[0]->accomPostedby; ?></p>
</div>

<div class="col-lg-6">
<h4>Notice Period</h4>
<p><?=$result[0]->noticePeriod; ?></p>
</div>

<div class="col-lg-6">
<h4>Advance Months</h4>
<p><?=$result[0]->advanceMonths; ?></p>
</div>                                      





                                        <div class="col-lg-12">
                                            <h4>Landmark</h4>
                                            <p><?=$result[0]->landmark; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-12">
                                            <h4>Coverage area</h4>
                                            <p><?=$cover_area[0]->cover_area; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-12">
                                            <h4>Location Infirmation</h4>

                                            <p>Country : <?=$add_country[0]->countryname;?></p>
                                            <p>State : <?=$add_state[0]->state_name;?></p>
                                            <p>City : <?=$add_city[0]->name;?></p>

                                             
                                        </div>




                                      
                                        
                                        <div class="col-lg-6">
                                            <h4>Category</h4>
                                            <p><?=$category[0]->name;?></p>

                                             
                                        </div>
                                        

                                        <div class="col-lg-12">
                                            <h4>Accommodation Details</h4>
                                            <p><?=$result[0]->description;?></p>
                                            
                                        </div>


                                        <div class="col-lg-12">
                                            <h4>Terms & Conditions</h4>
                                            <p><?=$result[0]->terms;?></p>
                                            
                                        </div>

                                        <div class="col-lg-12">

                                            <h4>Search Keyword</h4>
                                            <p><?=$result[0]->search_keyword;?></p>

                                            
                                        </div>

                                        
                                        <div class="col-lg-12">
                                            <h4>Google Map:</h4>
                                            
                                            <div class="map_area">
                                                <?php
echo '<iframe width="" height="" frameborder="0" style="border:0;" allowfullscreen="" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+",$result[0]->address)) . '&z=14&output=embed"></iframe>';

                                        ?>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Single Image </h4>

                                            <img src="<?=base_url();?>module_file/<?=$result[0]->upload_file;?>" height="60"/>
                                            
                                        </div>

                                        <div class="col-lg-12">
                                            <h4>Photo Gallery</h4>



<div class="row">
<?php foreach ($multiimage as $key => $row_rec) { ?>
    <div class="col-lg-4">
        <img src="<?=base_url();?>module_file/<?PHP echo $row_rec->multi_image;?>" height="60"/>
    </div>
<?php } ?>   
</div>





                                             
                                            

                                        </div>
                                        
                                        
                                    </div>

                                </form>

                                </div>
                            </div>
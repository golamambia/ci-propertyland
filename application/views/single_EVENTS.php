
                            <div class="dashboard_mainboby">
                               
                                <div class="form_area">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">


                                        <div class="col-lg-6">
                                            <h4>Event Name</h4>
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
                                        <div class="col-lg-12">
                                            <h4>Landmark</h4>
                                            <p><?=$result[0]->landmark; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-12">
                                            <h4>Event Date</h4>
                                            <p><?=$result[0]->event_start_date; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-12">
                                            <h4>Event Frequency</h4>
                                            <p><?=$result[0]->event_frequency; ?></p>

                                             
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

                                        <div class="col-lg-6">
                                            <h4>Sub Category</h4>
                                            <p><?=$sub_category[0]->subname;?></p>

                                             
                                        </div>

                                        

                                        <div class="col-lg-12">
                                            <h4>Description</h4>
                                            <p><?=$result[0]->description;?></p>
                                            
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
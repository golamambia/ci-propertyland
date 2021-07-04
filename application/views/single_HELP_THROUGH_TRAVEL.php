
                            <div class="dashboard_mainboby">
                               
                                <div class="form_area">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">


                                        <div class="col-lg-12">
                                            <h4>Title</h4>
                                            <p><?=$result[0]->title; ?></p>

                                             
                                        </div>
<div class="col-lg-12">
                                            <h4>Travel Type</h4>
                                            <p><?=$result[0]->travel_type; ?></p>

                                             
                                        </div>
                                        

                                        <div class="col-lg-6">
                                            <h4>Date of Departure</h4>
                                            <p><?=$result[0]->date_of_travel; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Date of Arrival</h4>
                                            <p><?=$result[0]->arrival_date; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Departure Country</h4>
                                            <p><?=$arrival_country[0]->countryname; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Arrival Country</h4>
                                            <p><?=$dep_country[0]->countryname; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Departure Airport Code</h4>
                                            <p><?=$result[0]->depairport_code; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Arrival Airport Code</h4>
                                            <p><?=$result[0]->arrairport_code; ?></p>

                                             
                                        </div>

                                       
<div class="col-lg-6">
                                            <h4>Direct</h4>
                                            <p><?php if($result[0]->direct==1){echo 'Yes';}else{echo 'No';} ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Single Airlines</h4>
                    <p><?php if($result[0]->singleAirlines==1){echo 'Yes';}else{echo 'No';} ?></p>

                                             
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
                                            <h4>Details</h4>
                                            <p><?=$result[0]->description;?></p>
                                            
                                        </div>

                                        <div class="col-lg-12">

                                            <h4>Search Keyword</h4>
                                            <p><?=$result[0]->search_keyword;?></p>

                                            
                                        </div>

                                        
                                      
                                        
                                        
                                        
                                    </div>

                                </form>

                                </div>
                            </div>
<form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/staff/staff_add_post">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Ads Info</h4>
                                
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

                                
                            </div>

                            <div class="form-actions">
                               <a href="<?php echo base_url();?>staff_panel/adsdata/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <?php 
                                  if($result[0]->post_status==1){
                                  if($result[0]->approved_by==$this->session->userdata('logged_in_stf')['staff_id']){
                                    $post_st=0;
                                  ?>
                                <button type="button" class="btn btn-success " >
                                    <i class="fa fa-check-square-o"></i> Approved by You
                                </button>

                                <button type="button" class="btn btn-warning " id="sub">
                                    <i class="fa fa-check-square-o"></i> Change to Inactive
                                </button>


                              <?php }else{
                                $post_st=0;
                                ?>
                                <button type="button" class="btn btn-success " >
                                    <i class="fa fa-check-square-o"></i> Approved
                                </button>
                                <button type="button" class="btn btn-warning " id="sub">
                                    <i class="fa fa-check-square-o"></i> Change to Inactive
                                </button>
                                <?php }}else{
                                  $post_st=1;

                                  ?>
                                <button type="button" class="btn btn-primary " id="sub">
                                    <i class="fa fa-check-square-o"></i> Approve Now
                                </button>


                              <?php }?>
                            </div>
                        </form> 
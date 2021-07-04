<form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/staff/staff_add_post">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Ads Info</h4>
                                
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
                                            <h4>Social Media Informations:</h4>

                                            <div>Web Link : <a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->weblink;?>"><?=$result[0]->weblink;?></a></div>
                                            <div>facebook :<a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->media_facebook;?>"> <?=$result[0]->media_facebook;?></a></div>
                                            <div>Linkedin : <a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->media_linkedin;?>"><?=$result[0]->media_linkedin;?></a></div>
                                            <div>Twitter : <a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->media_twitter;?>"><?=$result[0]->media_twitter;?></a></div>

                                             
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Google Map:</h4>
                                            
                                            <?php
echo '<iframe width="" height="" frameborder="0" style="border:0;" allowfullscreen="" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+",$result[0]->address)) . '&z=14&output=embed"></iframe>';

                                        ?>
                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Single Image </h4>

                                            <img src="<?=base_url();?>module_file/<?=$result[0]->upload_file;?>" height="60"/>
                                            
                                        </div>


<div class="col-lg-12">
<div class="bs-example" data-example-id="simple-table">
    <h4>Delivery Locations</h4>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Location</th>
          <th>Land Mark</th>
        </tr>
      </thead>
      <tbody>

<?php $count=0;  foreach ($val as  $value) { $count++; ?>
        <tr>
          <th scope="row"><?php echo $count; ?></th>
          <td><?php echo $value->address; ?></td>
          <td><?php echo $value->dl_land_mark; ?></td>
        </tr>
<?php } ?>
      </tbody>
    </table>
  </div>
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
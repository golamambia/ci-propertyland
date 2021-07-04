
                            <div class="dashboard_mainboby">
                               
                                <div class="form_area">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">


                                        <div class="col-lg-6">
                                            <h4>Subject</h4>
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
                                            <h4>Social Media Informations:</h4>

                                            <div>Web Link : <a style="text-decoration: underline;" target="_blank" href="<?=$result[0]->weblink;?>"><?=$result[0]->weblink;?></a></div>
                                            

                                             
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

                                </form>

                                </div>
                            </div>
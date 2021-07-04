
                            <div class="dashboard_mainboby">
                               
                                <div class="form_area">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">


                                        <div class="col-lg-6">
                                            <h4>Header</h4>
                                            <p><?=$result[0]->title; ?></p>

                                             
                                        </div>

    <div class="col-lg-6">
                                            <h4>Institution Name</h4>
                                            <p><?=$result[0]->institution; ?></p>

                                             
                                        </div>
                                        
                                           <div class="col-lg-6">
                                            <h4>Tution Mode</h4>
                                            <p>
<?php
if($result[0]->tution_mode==1){
 echo 'Online';
}elseif($result[0]->tution_mode==2){
echo 'Offline';
}elseif($result[0]->tution_mode==3){
echo 'Online , Offline';
}

?>

                                             
                                        </div>


                                                                            

                                        <div class="col-lg-6">
                                            <h4>Phone</h4>
                                            <p><?=$result[0]->phone; ?></p>

                                             
                                        </div>

                                        <div class="col-lg-6">
                                            <h4>Email</h4>
                                            <p><?=$result[0]->email; ?></p>

                                             
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
<!--                                         <div class="col-lg-12">
                                            <h4>Google Map:</h4>
                                            
                                            <div class="map_area">
                                                <?php
echo '<iframe width="" height="" frameborder="0" style="border:0;" allowfullscreen="" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+",$result[0]->address)) . '&z=14&output=embed"></iframe>';

                                        ?>
                                            </div>
                                            
                                        </div> -->
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

 <div class="col-lg-12">
                                            <h4>Course Details </h4>
<table class="table">
    <thead>
      <tr>
       <!--  <th>Course Header</th>
        <th>Duration</th> -->
        <th>Course List</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

<?php
$institution_id = $result[0]->lbcontactId;
$courses = $this->General_model->show_data_id('courses',$institution_id,'institution_id','get','');
$count=0;
foreach ($courses as  $value) { 
$count++;
    ?>
       <tr>
        <!-- <td><?php echo $value->course_header; ?></td>
        <td><?php echo $value->duration; ?></td> -->
        <td><?php echo $value->course_cat; ?> - <?php echo $value->course_header; ?></td>
       <!--  <td><a href="<?php echo base_url();?>lbcontacts/course_del/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
       <td><a  data-toggle="modal" data-target="#myModal<?php echo $count; ?>" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>



       </td>
      </tr>

<!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $count; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 style="padding: 0px;" class="modal-title"><?php echo $value->course_cat; ?> - <?php echo $value->course_header; ?></h4>
        </div>
        <div class="modal-body">



<p><strong>Course Category</strong> - <?php echo $value->course_cat; ?></p>

<p><strong>Video Link</strong><br><?php echo $value->video_llink; ?></p>

<p><strong>Duration</strong> - <?php echo $value->duration; ?></p>

<p><strong>Course Content</strong><br><?php echo $value->course_content; ?></p>

<p><strong>Course Details</strong><br><?php echo $value->details; ?></p>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->      
<?php 
}
?>

    </tbody>
  </table>
</div>



                                        
                                        
                                    </div>

                                </form>

                                </div>
                            </div>
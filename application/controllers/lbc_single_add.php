
    <?php
    $this->load->view('user_page_banner');
    ?>
        <div class="container">
            <div class="inner_banner_contant pt-0">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$category_title;?></li>
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
                            <h3>Submit Listings</h3>
                            <div class="dashboard_mainboby">
                                <h4 class="add_listing">Add New Listings</h4>
                                <p class="contain">All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
                                <div class="form_area">
                                    <form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="title" type="text" class="form-control" placeholder="Title" value="<?=$result[0]->title; ?>" required />
                                                <div class="ci_error"><?=form_error('title');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?=$result[0]->phone; ?>" />
                                                <div class="ci_error"><?=form_error('phone');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$result[0]->email; ?>" />
                                                <div class="ci_error"><?=form_error('email');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea name="address" class="form-control" placeholder="Address"><?=$result[0]->address; ?></textarea>
                                                <div class="ci_error"><?=form_error('address');?></div>
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
                                        <div class="col-lg-12">
                                            <div class="form-group">
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
                                        <div class="col-lg-12">
                                            <div class="form-group">
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
                                        <!-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="city" id="city" class="form-control" placeholder="City" />
                                            </div>
                                        </div> -->
                                        <div class="col-lg-11">
                                            <div class="form-group">
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
                                        <div class="col-lg-1">
                                            <div class="form-group">
                                    <a href="<?=base_url();?>category/index?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div>
                                    <div class="col-lg-11">
                                            <div class="form-group">
                                                <select class="form-control" name="sub_cat" id="sub_cat" required>
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             foreach ($subcatlist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option value="<?=$value->sid;?>"><?=$value->subname;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('sub_cat');?></div>
                                            </div>
                                        </div>
                                         <div class="col-lg-1">
                                            <div class="form-group">
                                    <a href="<?=base_url();?>category/index?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" name="event_start_date" id="event_start_date" value="<?=date('Y-m-d');?>" class="form-control"  />
                                                <div class="ci_error"><?=form_error('event_start_date');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="date" name="event_end_date" id="event_end_date" value="<?=date('Y-m-d',strtotime(' +1 day'));?>" class="form-control" />
                                               <div class="ci_error"><?=form_error('event_end_date');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="event_start_time" id="event_start_time" class="form-control" placeholder="Event Start Time" value="<?=set_value('event_start_time');?>" />
                                               <div class="ci_error"><?=form_error('event_start_time');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="event_end_time" id="event_start_time" class="form-control" placeholder="Event End Time" value="<?=set_value('event_end_time');?>" />
                                              <div class="ci_error"><?=form_error('event_end_time');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea name="description" class="form-control" placeholder=" Description" required><?=set_value('description');?></textarea>
                                                <div class="ci_error"><?=form_error('description');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea name="description_extra" class="form-control" placeholder="Extra" ><?=set_value('description_extra');?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Social Media Informations:</h4>
                                             <div class="form-group">
                                                <input name="weblink" type="text" class="form-control" placeholder="Website Link" value="<?=set_value('weblink');?>" />
                                            </div>
                                            <div class="form-group">
                                                <input name="media_facebook" type="text" class="form-control" placeholder="www.facebook.com/directory" value="<?=set_value('media_facebook');?>" />
                                            </div>
                                            <div class="form-group">
                                                <input name="media_linkedin" type="text" class="form-control" placeholder="www.linkedin.com/directory" value="<?=set_value('media_linkedin');?>" />
                                            </div>
                                            <div class="form-group">
                                                <input name="media_twitter" type="text" class="form-control" placeholder="www.twitter.com/directory" value="<?=set_value('media_twitter');?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Google Map:</h4>
                                            <div class="form-group">
                                                <input name="d" type="text" class="form-control" placeholder="Past your iframe code here" value="<?=set_value('d');?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Single Image <span>(image size 1350x500)</span>:</h4>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image1">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="ci_error"><?=form_error('image1');?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4>Photo Gallery <span>(upload multiple photos note:size 750x500)</span>:</h4>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile2" name="upload_img[]"  multiple="multiple" required>
                                                <label class="custom-file-label" for="customFile2">Choose file</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary w-100">Post Ad</button>
                                        </div>
                                    </div>

                                </form>

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
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            //alert(1);
            $('#country').bind("change", function() { 
            //$('#country').change(function(){
                //alert(1);
                $('#city').find('option').not(':first').remove();
                var country=$('#country').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>lbcontacts/get_state',
                    cache:false,
                    dataType: 'json',
                    data:{country:country},
                    success:function(response){
                        //console.log(response);
                       
            $('#state').find('option').not(':first').remove();


         // Add options
         $.each(response,function(index,data){
           $('#state').append('<option value="'+data['sid']+'">'+data['state_name']+'</option>');
         });
                    
                }

                });

            });



            $('#state').bind("change", function() { 
            //$('#country').change(function(){
                //alert(1);
                $('#city').find('option').not(':first').remove();
                var state=$('#state').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>lbcontacts/get_city',
                    cache:false,
                    dataType: 'json',
                    data:{state:state},
                    success:function(response){
                        //console.log(response);
                       
                     // Add options
         $.each(response,function(index,data){
           $('#city').append('<option value="'+data['cid']+'">'+data['name']+'</option>');
         });
                    
                }

                });

            });




        });

        //$.get("https://api.ipdata.co?api-key=test", function(response) {
  //$("#ip").html("IP: " + response.ip);
  //$("#city").val(response.city);
  //$("#response").html(JSON.stringify(response, null, 4));
//}, "jsonp");
    </script>
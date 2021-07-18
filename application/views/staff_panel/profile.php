<div class="content-wrapper">

        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0"><?php echo ucfirst($user[0]->name);?>'s Profile</h3>
            
          </div>
          
        </div>

        <div class="content-body">

          <section id="basic-form-layouts">

   

<div class="row match-height">

        <div class="col-md-10">

            <div class="card">

                

                <div class="card-content collapse show">

                    <div class="card-body">

                        

                        <?php if($this->session->flashdata('error')){?>

                        <div class="alert alert-danger alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>

</div>

<?php }?>

<?php if($this->session->flashdata('error_msg')){?>

                        <div class="alert alert-danger alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;"><?=$this->session->flashdata('error_msg');?></p>

</div>

<?php }?>

                        <?php if($this->session->flashdata('message')){?>

                        <div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>

</div>

<?php }?>



                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>staff_panel/staff1/staff_edit1_post2/<?php echo $user[0]->id?>">

                            <div class="form-body">

                                <h4 class="form-section"><i class="ft-calendar"></i>Staff Info</h4>

                                

                                        <div class="form-group">

                                            <label for="eventInput2">Name</label>

                                            <input type="text" id="eventInput2" class="form-control" placeholder="name" name="name" value="<?php echo $user[0]->name;?>" required>

                                        </div>

                                        <div class="form-group">

                                            <label for="eventInput4">Email</label>

                                            <input type="email" id="eventInput4" class="form-control" placeholder="email" name="email" value="<?php echo $user[0]->email;?>" autocomplete="new-password" required>

                                        </div>



                                        <div class="form-group">

                                            <label for="eventInput3">Phone</label>

                                            <input type="text" id="eventInput3" class="form-control numeric_input" placeholder="Phone" name="phone" value="<?php echo $user[0]->phone; ?>"  required  maxlength="11">

                                        </div>

                                        <!--  <div class="form-group" style="position: relative;">

                                            <label for="eventInput3">Password</label>

                                            <input type="password" id="password-field" class="form-control" value="<?php echo $user[0]->pass_view; ?>" placeholder="Password" name="pass" >

                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                        </div> -->

                                        <div class="form-group">

                                            <label for="eventInput3">Address</label>

                                            <textarea rows="6" class="form-control" placeholder="Address" name="address" required><?php echo $user[0]->address; ?></textarea>

                                            

                                        </div>
                                         <div class="form-group">

                                            <label for="pincode">Pincode</label>

                                            <input type="text" id="pincode" class="form-control numeric_input" placeholder="Pincode" name="pincode" value="<?php echo $user[0]->pincode; ?>"  required  maxlength="6">

                                        </div>

                                        <div class="form-group">

                                            <label for="eventInput3">Country</label>

                                           <select class="form-control" name="country" id="country" required style="pointer-events: none;">

                                            <option value="">--Select Country--</option>

                                             <?php 

                                             foreach ($country_list as $key => $value) {

                                              //print_r($value)

                                             ?>

                                               <option <?php if($value->id==$user[0]->country){echo"selected";} ?> value="<?=$value->id;?>"><?=$value->countryname;?></option>

                                               <?php }?>

                                               

                                           </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="eventInput3">State</label>

                                           <select class="form-control" name="state" id="state" required style="pointer-events: none;">

                                            <option value="">--Select state--</option>
                                          <?php 

                                             foreach ($state_list as $key => $value) {

                                             ?>

                                               <option <?php if($value->sid==$user[0]->state){echo"selected";} ?> value="<?=$value->sid;?>"><?=$value->state_name;?></option>

                                               <?php }?>
                                           
                                           </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="eventInput3">User Type</label>

                                           <select class="form-control" name="" id="" style="pointer-events: none;">

                                           
                                             <?php if($user[0]->user_type=='manager_staff'){?>
                                             <option selected value="manager_staff">Manager</option> <?php }?>
                                        <?php if($user[0]->user_type=='support_staff'){?>
                                               <option selected value="support_staff">Support Staff</option>
                                              <?php }?>
                                               <?php if($user[0]->user_type=='field_staff'){?>
                                                <option selected value="field_staff">Field Staff</option>
                                               <?php }?>

                                           </select>

                                        </div>

                                        <div class="form-group manager_name"  style="<?php if($user[0]->user_type=='manager_staff'){echo"display: none";}?>">

                                            <label for="eventInput3">Manager Name</label>

                                           <select class="form-control" name="" id="manager_name" <?php if($user[0]->user_type=='support_staff'){echo"required";}?> style="pointer-events: none;">

                                            <option value="">--Select Manager--</option>
                                             <?php 

                                             foreach ($manager_list as $key => $value) {

                                              //print_r($value)

                                             ?>

                                               <option <?php if($value->id==$user[0]->manager_name){echo"selected";} ?> value="<?=$value->id;?>"><?=$value->name;?></option>

                                               <?php }?>
                                              
                                           </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="eventInput3">Status</label>

                                           <select class="form-control" name="status" required  style="pointer-events: none;">

                                            <option value="">--Select Status--</option>

                                               <option <?php if($user[0]->status=='Active'){echo"selected";}?> value="Active">Active</option>

                                               <option <?php if($user[0]->status=='Inactive'){echo"selected";}?> value="Inactive">Inactive</option>

                                           </select>

                                        </div>

                                          <div class="form-group">

                                            <label for="eventInput3">Profile photo</label>

                                           <!-- <input type="file" class="form-control" name="photo" id="photo" > -->

                                           
                                        </div>
                                        <div class="form-group">
                                          <img src="<?=base_url();?>uploads/staff/<?=$user[0]->profile_photo;?>" style="width: 100px;height: 100px">
                                        </div>
                                        <div class="form-group">

                                            <label for="eventInput3">Photo id proof</label>

                                           <!-- <input type="file" class="form-control" name="photo2" id="photo2" > -->

                                           
                                        </div>
                                        <div class="form-group">
                                          <img src="<?=base_url();?>uploads/staff/<?=$user[0]->photo_id_proof;?>" style="width: 100px;height: 100px">
                                        </div>
                                        <div class="form-group">

                                            <label for="eventInput3">Address id proof</label>

                                           <!-- <input type="file" class="form-control" name="photo3" id="photo3" > -->

                                           
                                        </div>
                                        <div class="form-group">
                                          <img src="<?=base_url();?>uploads/staff/<?=$user[0]->address_id_proof;?>" style="width: 100px;height: 100px">
                                        </div>


                            </div>



                            <div class="form-actions">

                              
                                <?php
                                if($user[0]->id){?>
                               <!--  <button type="submit" class="btn btn-primary">

                                    <i class="fa fa-check-square-o"></i> Update Now

                                </button> -->
                              <?php }?>
                            </div>

                        </form> 



                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



        </div>

      </div>



      <script type="text/javascript">
        $(document).ready(function(){
            //alert(1);
            $('#country').bind("change", function() { 
            
                var country=$('#country').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>apanel/staff/get_state',
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

            $('#user_type').bind("change", function() { 
            
                var user_type=$('#user_type').val();
                if(user_type!='manager_staff'){

                  $('.manager_name').show();
                  $("#manager_name").attr("required", true);
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>apanel/staff/get_manager',
                    cache:false,
                    dataType: 'json',
                    data:{user_type:user_type},
                    success:function(response){
                        //console.log(response);
                       
            $('#manager_name').find('option').not(':first').remove();

         // Add options
         $.each(response,function(index,data){
           $('#manager_name').append('<option value="'+data['id']+'">'+data['name']+'</option>');
         });
                    
                }

                });
              }else{
                $('.manager_name').hide();
                $("#manager_name").attr("required", false);
              }

            });


        });
    </script>
      
<div class="content-wrapper">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Staff Add.</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>apanel/home/">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>apanel/staff/">Staff List</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a>
                  </li>
                </ol>
              </div>
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

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>manager_panel/staff/staff_add_post"> 
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-calendar"></i>Staff Info</h4>
                                
                                        <div class="form-group">
                                            <label for="eventInput2">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="name" name="name"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4">Email</label>
                                            <input type="email" id="staff_email" class="form-control" placeholder="email" name="email"  required>
                                            <p id="stf_malert" style="color: red;"></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput3">Phone</label>
                                            <input type="text" id="phone" class="form-control" placeholder="Phone" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput3">Address</label>
                                            <textarea rows="6" class="form-control" placeholder="Address" name="address" required></textarea>
                                            
                                        </div>
                                        <div class="form-group" style="position: relative;">
                                            <label for="eventInput3">Password</label>
                                            <input type="password" id="password-field" class="form-control" placeholder="Password" name="pass" required>
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput3">Country</label>
                                           <select class="form-control" name="country" required>
                                            <option value="">--Select Country--</option>
                                            <?php 
                                             foreach ($country_list as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($value->id==102){echo"selected";} ?> value="<?=$value->id;?>"><?=$value->countryname;?></option>
                                               <?php }?>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput3">User Type</label>
                                           <select class="form-control" name="user_type" required>
                                            <option value="">--Select Type--</option>
                                             <option  value="manager_staff">Manager</option>
                                               <option  value="support_staff">Support Staff</option>
                                              
                                           </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput3">Status</label>
                                           <select class="form-control" name="status" required>
                                            <option value="">--Select Status--</option>
                                               <option  value="Active">Active</option>
                                               <option  value="Inactive">Inactive</option>
                                           </select>
                                        </div>

                                   
                                    
                               <!--  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput3">Start Date</label>
                                            <input type="date" id="projectinput3" class="form-control" placeholder="E-mail" name="event_start_date" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Start Time</label>
                                            <input type="time" id="projectinput4" class="form-control" placeholder="Phone" name="start_time" >
                                        </div>
                                    </div>
                                </div> -->

                                
                            </div>

                            <div class="form-actions">
                               <a href="<?php echo base_url();?>apanel/staff/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <button type="submit" class="btn btn-primary " id="sub">
                                    <i class="fa fa-check-square-o"></i> Create Now
                                </button>
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

      
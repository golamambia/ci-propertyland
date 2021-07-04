<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Change Password</h3>
            
          </div>
          
        </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Update Password</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <!-- <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        
                        <!-- <div class="card-text">
                            <p></p>
                        </div> -->
                        <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger  alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('success')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('success');?></p>
</div>
<?php }?>

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>staff_panel/settings/update_password">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-body">
                                        <input type="hidden" name="old_password" value="<?=$change_pass[0]->password;?>">
                                        <div class="form-group">
                                            <label for="eventInput1">Current Password</label>
                                            <input type="password" class="form-control" placeholder="Current Password" name="old_pass" id="old_pass"  required>
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput2">New Password</label>
                                            <input type="text"  class="form-control" placeholder="New Password" name="password" id="password" value="<?php echo set_value('password'); ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="eventInput3">Confirm Password</label>
                                            <input type="text"  class="form-control" placeholder="Confirm Password" name="con_pass" id="con_pass" required>
                                        </div>

                                        

                                       

                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                               <!--  <button type="reset" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button> -->
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save Now
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
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">General Setting</h3>
            
          </div>
          
        </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Update Info</h4>
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
                        <!-- <?php echo validation_errors(); ?> -->
                        <!-- <div class="card-text">
                            <p></p>
                        </div> -->
                        <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger  alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;">Updated Successfully.</p>
</div>
<?php }?>

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/settings/general_update/<?php echo $admin[0]->id?>">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <input type="hidden" name="image" value="<?php echo $admin[0]->logo;?>">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1">Phone </label>
                                            <input type="text" id="eventInput1" class="form-control numeric_input" placeholder="Phone" name="contact" maxlength="11" value="<?php echo $admin[0]->contact;?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput2">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Email" name="email" value="<?php echo $admin[0]->email;?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4">Address</label>
                                            <input type="text" id="address" class="form-control" placeholder="Address" name="address" value="<?php echo $admin[0]->address;?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput3">Facebook Link</label>
                                            <input type="text" id="facebook" class="form-control" placeholder="Facebook Link" name="facebook" value="<?php echo $admin[0]->facebook; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput3">Twitter Link</label>
                                            <input type="text" id="twitter" class="form-control" placeholder="Twitter Link" name="twitter" value="<?php echo $admin[0]->twitter; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput3">Linkedin Link</label>
                                            <input type="text" id="linkedin" class="form-control" placeholder="Linkedin Link" name="linkedin" value="<?php echo $admin[0]->linkedin; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput3">Logo </label>
                                            <input type="file" id="picture" class="form-control"  name="picture" >
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput3">&nbsp; </label>
                                           <img src="<?=base_url();?>uploads/logo/<?php echo $admin[0]->logo;?>" alt="Smiley face" style="width: 50%;height: 50%;">

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
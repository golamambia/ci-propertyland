<div class="content-wrapper">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Event Page</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>apanel/home/">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>apanel/event/">Event List</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="<?php echo base_url();?>apanel/event/edit/<?php echo $result[0]->id?>">Event Upadte</a>
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

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/event/edit_post/<?php echo $result[0]->id?>">
                            <div class="form-body">
                                <input type="hidden" name="image_hid" value="<?php echo $result[0]->img;?>">
                                <h4 class="form-section"><i class="ft-calendar"></i>Event Info</h4>
                                
                                        <div class="form-group">
                                            <label for="projectinput1">Event Name</label>
                                            <input type="text" id="projectinput1" class="form-control" placeholder="Event Name" name="name" required value="<?php echo $result[0]->name?>">
                                        </div>
                                   
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput3">Start Date</label>
                                            <input type="date" id="projectinput3" class="form-control" placeholder="E-mail" name="event_start_date"  value="<?php echo $result[0]->event_start_date?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Start Time</label>
                                            <input type="time" id="projectinput4" class="form-control" placeholder="Phone" name="start_time" value="<?php echo $result[0]->start_time?>" >
                                        </div>
                                    </div>
                                </div>

<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput3">End Date</label>
                                            <input type="date" id="projectinput3" class="form-control" placeholder="E-mail" name="event_end_date"  value="<?php echo $result[0]->event_end_date?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">End Time</label>
                                            <input type="time" id="projectinput4" class="form-control" placeholder="Phone" name="end_time" value="<?php echo $result[0]->end_time?>" >
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="projectinput8">Description</label>
                                    <textarea id="projectinput8" rows="5" class="form-control" name="description" placeholder="Description"><?php echo $result[0]->description?></textarea>
                                </div>
                               <div class="form-group">
                                    <label for="projectinput8">Location</label>
                                    <textarea id="projectinput8" rows="5" class="form-control" name="location" placeholder="Location"><?php echo $result[0]->location?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Image</label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file" name="img" >
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                            <label for="eventInput3">&nbsp; </label>
                                           <img src="<?=base_url();?>uploads/<?php echo $result[0]->img;?>" alt="Smiley face" style="width: 70px;height: 70px;">

                                        </div>
                                    </div>
                                    </div>


                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Image for details page</label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file2" name="upload_img[]"  multiple="multiple">
                                        <span class="file-custom"></span>
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p id="alert_rem" style="color: green;font-size: 16px;font-weight: 600;display: none">Image Removed Successfully</p>
                            </div>
                            </div>


<div class="row">   
                                    <div class="col-md-12">
<div class="form-group">
    <label id="projectinput7" class="file center-block">
                                    <div id="multi_img">
                    <?php 
               foreach ($multiimage as $key => $row_rec) {
                //print_r($value)
               ?>

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec->id;?>,'<?=$row_rec->event_id;?>')">Remove</span><img src="<?=base_url();?>uploads/<?PHP echo $row_rec->image;?>" height="60"/></div>

         <?php } ?>
                </div>
</label>

                                </div>

                            </div>
                            </div>

                            </div>

                            <div class="form-actions">
                               <a href="<?php echo base_url();?>apanel/event/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <button type="submit" class="btn btn-primary">
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
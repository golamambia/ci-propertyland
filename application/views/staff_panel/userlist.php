
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">User List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <a target="_blank" href="<?php echo base_url();?>register?stf=<?=base64_encode($this->session->userdata('logged_in_stf')['staff_id']);?>" class="btn btn-primary mr-1">
                                    <i class="ft-plus"></i> Add New User
                                </a></h4>
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>

        </div>
         <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
                 <!--  <form id="user_search" method="get">
            <div class="row">
              
              <div class="col-md">
                <label>Staff</label>
            <select  class="form-control" name="ads" >
  <option value=""  selected>--Select staff--</option>
  
</select>
</div>
                <div class="col-md">
                <label>User status</label>
            <select  class="form-control" name="user_status" >
  <option value=""  selected>--Select type--</option>
  <option <?php if($this->input->get('user_status',true)=='all'){echo"selected";}?> value="all">All</option>
  <option <?php if($this->input->get('user_status',true)=='pending'){echo"selected";}?> value="pending">Active</option>
  
  <option <?php if($this->input->get('user_status',true)=='approved'){echo"selected";}?> value="approved">Blocked</option>
</select>
</div> -->
<!-- <div class="col-md">
<label>From date</label>
<input type="date" value="<?=$this->input->get('start_date',true);?>" class="form-control" name="start_date" id="start_date">
  </div>
  <div class="col-md">
    <label>End date</label>
<input type="date" value="<?=$this->input->get('end_date',true);?>" class="form-control" name="end_date" id="end_date" >
  </div> -->
  
  <!-- <div class="col-md">
    <input type="submit" style="margin-top: 27px;color: #fff;" class="form-control btn btn-sm btn-primary" value="Search Now">
  </div>



</div>
</form> -->
            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Pincode</th>
                  <th>Verify Status</th>
                  <th>Status</th>
                  <th>Login</th>
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
               
               <?php 
               foreach ($datatable as $key => $value) {
                //print_r($value)
               ?>
                 <tr>
                  <td><?=$value->name;?></td>
                  <td><?=$value->phone;?></td>
                  <td><?=$value->pimcode;?></td>
                  <td><?php 
                    
                    if($value->verification_status=='verified'){
                    ?>
                    <span class="badge bg-success"> Verified</span>

                  <?php }else{?>
                     <span class="badge bg-warning"> Pending</span>
                  <?php }?></td>
                  <td>
                    <?php 
                    
                    if($value->status=='Active'){
                    ?>
                    <span class="badge bg-success"> Active</span>

                  <?php }else{?>
                     <span class="badge bg-warning"> Inactive</span>
                  <?php }?>
                  </td>
                  <td>
                    <?php
                    if($this->session->userdata('front_sess')['userid']==$value->id && $this->session->userdata('front_sess')['tagged_staff_id']==$value->tagged_staff_id){?>
                    <a target="_blank" href="<?php echo base_url();?>dashboard"><span class="badge bg-success" title="Goto dashboard"> Dashboard</span></a>
                    <a href="<?php echo base_url();?>staff_panel/users/logout"><span class="badge bg-warning" title="Click here for logout"><i class="fa fa-lock" aria-hidden="true"></i> Logout</span></a>
                  <?php }else{?>
                    <a href="<?php echo base_url();?>staff_panel/users/login?user=<?=base64_encode($value->id);?>"><span class="badge bg-primary" title="Click here for login"><i class="fa fa-unlock" aria-hidden="true"></i> Login Now</span></a>
                  <?php }?>

                  </td>
                  <td class="float-centre">
                    <?php
                    if($this->session->userdata('front_sess')['userid']==$value->id && $this->session->userdata('front_sess')['tagged_staff_id']==$value->tagged_staff_id){?>
                 <a target="_blank" href="<?php echo base_url();?>profile"><span class="badge bg-primary" title="Click here for edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</span></a>
               <?php }?>
                <a href="<?php echo base_url();?>staff_panel/users/user_delete/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><span class="badge badge-danger" title="Click here for delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></a> 
            

                   </td>
                 
                </tr>
                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Pincode</th>
                  <th>Verify Status</th>
                  <th>Status</th>
                  <th>Login</th>
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
              </tfoot>        
            </table>        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        </div>
      </div>
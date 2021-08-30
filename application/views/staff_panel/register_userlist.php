
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
          <!-- <h4 class="card-title">
            <a href="<?php echo base_url();?>apanel/user/user_add" class="btn btn-primary mr-1">
                                    <i class="ft-plus"></i> Add New User
                                </a></h4> -->
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
            <form id="user_search" method="get">
            <div class="row">
              
            <!--   <div class="col-md">
                <label>Staff</label>
            <select  class="form-control" name="staff" >
  <option value=""  selected>--Select staff--</option>
  <?php foreach ($staff_list as $key => $value) {?>
   <option <?php if($this->input->get('staff',true)==$value->id){echo"selected";}?> value="<?=$value->id;?>"><?=$value->name;?></option>
 <?php } ?>
</select>
</div> -->

                <div class="col-md">
                <label>User type</label>
            <select  class="form-control" name="user_type" >
  <option value=""  selected>All</option>
    <option <?php if($this->input->get('user_type',true)=='individual'){echo"selected";}?> value="individual">Indivdual</option>
  
  <option <?php if($this->input->get('user_type',true)=='agent'){echo"selected";}?> value="agent">Agent</option>
  <option <?php if($this->input->get('user_type',true)=='builder'){echo"selected";}?> value="builder">Builder</option>
</select>
</div>
 <div class="col-md">
                <label>Reg type</label>
            <select  class="form-control" name="registration_type" >
  <option value=""  selected>All</option>
  
  <option <?php if($this->input->get('registration_type',true)=='direct'){echo"selected";}?> value="direct">Direct</option>
  <option <?php if($this->input->get('registration_type',true)=='offline'){echo"selected";}?> value="offline">Offline</option>
</select>
</div>
<div class="col-md">
<label>From date</label>
<input type="date" value="<?=$this->input->get('start_date',true);?>" class="form-control" name="start_date" id="start_date">
  </div>
  <div class="col-md">
    <label>End date</label>
<input type="date" value="<?=$this->input->get('end_date',true);?>" class="form-control" name="end_date" id="end_date" >
  </div>
  <?php if($this->session->userdata('logged_in_stf')['user_type']=='manager_staff'){
    if($this->input->get()){

    ?>
   <div class="col-md">
                <label>Field staff</label>
            <select  class="form-control" name="field_staff" >
  <option value=""  selected>All</option>
  <?php foreach ($field_staff as $key => $value) {?>
    <option <?php if($this->input->get('field_staff',true)==$value->id){echo"selected";}?> value="<?=$value->id;?>"><?=$value->name;?></option>
  <?php }?>
  
</select>
</div>
 <div class="col-md">
                <label>Support staff</label>
            <select  class="form-control" name="support_staff" >
  <option value=""  selected>All</option>
   <?php foreach ($support_staff as $key => $value) {?>
    <option <?php if($this->input->get('support_staff',true)==$value->id){echo"selected";}?> value="<?=$value->id;?>"><?=$value->name;?></option>
  <?php }?>
</select>
</div>
<?php }}?>
  
  <div class="col-md">
    <input type="submit" style="margin-top: 27px;color: #fff;" class="form-control btn btn-sm btn-primary" value="Search Now">
  </div>



</div>
</form>
            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Reg. type</th>
                  <th title="User status">U Status</th>
                  <th title="Verification status">V Status</th>
                  <th>Verify date</th>
                  <th class="float-centre">Action</th>
                  
                </tr>
              </thead>
              <tbody>
               
               <?php 
               foreach ($datatable as $key => $value) {
                //print_r($value)
               ?>
                 <tr>
                  <td><?=$value->name;?></td>
                  <td><?=$value->user_type;?></td>
                  <td><?=$value->entry_date;?></td>
                  <td><?=$value->registration_type;?></td>
                   <td>
                    <?php 
                    
                    if($value->status=='Active'){
                    ?>
                    <span class="badge bg-success"> Active</span>

                  <?php }else{?>
                     <span class="badge bg-danger"> Blocked</span>
                  <?php }?>
                  </td>
                  <td>
                    <p style="margin-bottom: 2px;">Status : <?php echo ($value->verification_status!='verified')?'<span class="badge bg-warning">Pending</span>':'<span class="badge bg-success">Verified</span>'; ?> </p>
                    
                  <p style="margin-bottom: 2px;">V By : <?=getStaff($value->verified_by);?></p>
                  </td>
                  <td><?php
                  if($value->verified_date!= '0000-00-00'){
                    echo $value->verified_date;
                  }
                  
                  ?></td>
                 <td class="float-centre">

                <a href="<?php echo base_url();?>staff_panel/users/user_verify/<?=$value->id;?>" target="_blank"><span class="badge bg-primary" title="Click here for verify / view"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Verify</span></a>
             <!--    <a href="<?php echo base_url();?>apanel/user/user_delete/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><span class="viewbadge badge-danger" title="Click here for delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></a> -->
            

                   </td>
                 
                </tr>
                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
                 <th>Name</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Reg. type</th>
                 <th title="User status">U Status</th>
                  <th title="Verification status">V Status</th>
                  <th>Verify date</th>
                  <th class="float-centre">Action</th>
                  
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
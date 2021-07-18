
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Staff List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <!-- <h4 class="card-title">
            <a href="<?php echo base_url();?>apanel/staff/staff_add" class="btn btn-primary mr-1">
                                    <i class="ft-plus"></i> Add New Staff
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
            <!-- <p class="card-text">&nbsp;</p> -->
            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <!-- <th>Country</th> -->
                  <th>Staff Type</th>
                  <th>Manager</th>
                  <th>Status</th>
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
                  <td><?=$value->email;?></td>
                  <td><?=$value->phone;?></td>
                  <!-- <td><?=$value->countryname;?></td> -->
                  <td>
                    <?php
                    if($value->user_type=="manager_staff"){
                        echo "Manager";
                    }elseif($value->user_type=="support_staff"){
                      echo "Support Staff";
                    }elseif($value->user_type=="field_staff"){
                      echo "Field Staff";
                    }
                    ?>
                      
                  </td>
                  <td><?=$value->manager;?></td>
                  <td>
                    <?php 
                    
                    if($value->status=='Active'){
                    ?>
                    <span class="badge bg-success"> Active</span>

                  <?php }else{?>
                     <span class="badge bg-warning"> Inactive</span>
                  <?php }?>
                  </td>
                  <td class="float-centre">

                <a href="<?php echo base_url();?>staff_panel/staff/staff_edit/<?=$value->id;?>"><span class="badge bg-primary" title="Click here for view"><i class="fa fa-eye" aria-hidden="true"></i> View</span></a>
               <!--  <a href="<?php echo base_url();?>apanel/staff/staff_delete/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><span class="badge badge-danger" title="Click here for delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></a> -->
            

                   </td>
                 
                </tr>
                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <!-- <th>Country</th> -->
                  <th>Staff Type</th>
                  <th>Manager</th>
                  <th>Status</th>
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
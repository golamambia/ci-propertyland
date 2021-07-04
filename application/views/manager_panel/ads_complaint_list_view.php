
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Ads complaint List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            </h4>
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
                  <th>Ads title</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Date & Time</th>
                  <th>Complaint list</th>
                  <th>Status</th>
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
               
               <?php 
               foreach ($ads_list as $key => $value) {
                //print_r($value)
               ?>
                 <tr>
                   <td><a title="Click here details view" target="_blank" href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($value->lbcontactId);?>"><?=$value->title;?></a></td>
                  <td><?=$value->name;?></td>
                  <td><?=$value->subname;?></td>
                  <td><?php echo $value->date_time;?></td>
                 <td><a href="<?=base_url();?>manager_panel/complaint/complaint_list?ads=<?=base64_encode($value->lbcontactId);?>">View list</a></td>
                  <td>
                    <?php 
                    
                    if($value->post_status==1){
                    ?>
                    <span class="badge bg-success"> Active</span>

                  <?php }else{?>
                     <span class="badge bg-warning"> Inactive</span>
                  <?php }?>
                  </td>
                  <td class="float-centre">

                <a href="<?php echo base_url();?>manager_panel/adsdata/adsdata_view?view=<?=base64_encode($value->lbcontactId);?>"><span class="badge bg-primary" title="Click here for view"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View</span></a>
                
            

                   </td>
                 
                </tr>
                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
                 <th>Ads title</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                   <th>Date & Time</th>
                    <th>Complaint list</th>
                  <th>Status</th>
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
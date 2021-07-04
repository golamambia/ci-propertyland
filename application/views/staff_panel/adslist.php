<style type="text/css">
  div.dataTables_wrapper div.dataTables_filter input {
    width: 232px;
}
</style>
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Ads All List</h3>
            
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

            <form id="user_search" method="get">
            <div class="row">
              
              
                <div class="col-md">
                <label>Ads type</label>
            <select  class="form-control" name="ads" >
  <option value=""  selected>--Select type--</option>
  <option <?php if($this->input->get('ads',true)=='all'){echo"selected";}?> value="all">All</option>
  <option <?php if($this->input->get('ads',true)=='pending'){echo"selected";}?> value="pending">Pending Ads</option>
  
  <option <?php if($this->input->get('ads',true)=='approved'){echo"selected";}?> value="approved">Approved Ads</option>
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
  
  <div class="col-md">
    <input type="submit" style="margin-top: 27px;color: #fff;" class="form-control btn btn-sm btn-primary" value="Search Now">
  </div>



</div>
</form>


            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  <th>Ads title</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Date & Time</th>
                  
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
                  <td><?=$value->title;?></td>
                  <td><?=$value->name;?></td>
                  <td><?=$value->subname;?></td>
                  <td><?php echo $value->date_time;?></td>
                 
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

                <a href="<?php echo base_url();?>staff_panel/adsdata/adsdata_view?view=<?=base64_encode($value->lbcontactId);?>"><span class="badge bg-primary" title="Click here for view"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View</span></a>
                
            

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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  //alert(1);
  $("#end_date").change(function(){
   $("#start_date").prop('required',true);
  });
  $("#start_date").change(function(){
   $("#end_date").prop('required',true);
  });


});
</script>
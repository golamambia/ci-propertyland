<style type="text/css">
  div.dataTables_wrapper div.dataTables_paginate {
    display: none!important;
}
.dataTables_length{ display: none; }
</style>
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Error Message List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">



              
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
                                 <th data-type="numeric">#</th>
                                 <th>Ad</th>
                                 <!-- <th>Email</th> -->
                                 <th>New Report</th>             
                                 <th>Option</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($report_list as $result){
                              
                              $i++;
                              ?>

                              <tr class="dview<?=$i;?>">
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 
                                 <td>
                                  <a href="<?=base_url();?>apanel/report/reported_list?ads=<?=base64_encode($result->lbcontactId);?>"><?=$result->title;?></a></td>

                                   <td class="ads-details-td">
                                  <?=unreadReportList('',$result->lbcontactId,'');?></td>
                                 <td class="action-td">

                                    
                                  
                                    <p>
                                     
                                       <a target="_blank" href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->lbcontactId);?>" class="view_btn"  title="Click to view ad"><i class="fview fa fa-eye"  aria-hidden="true"></i></a>
                                        

                                    </p>

                                    
                                    
                                 </td>
                              </tr>
                              
                             <?php }?>
                              
                              
                           </tbody>
              <tfoot>
                <tr>
                                 <th data-type="numeric">#</th>
                                 <th>Ad</th>
                                 <!-- <th>Email</th> -->
                                 <th>New Report</th>             
                                 <th>Option</th>
                              </tr>
              </tfoot>        
            </table>
<?php echo $page_link; ?>
                    
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        </div>
      </div>
<script type="text/javascript">
  $( document ).ready(function() {
    //alert(1);
    //$('#example_paginate').css('display','none');
    document.getElementById("example_paginate").style.display = "none";
});
</script>      
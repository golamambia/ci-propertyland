<style type="text/css">
  div.dataTables_wrapper div.dataTables_paginate {
    display: none!important;
}
.dataTables_length{ display: none; }
</style>
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">User Message List</h3>
           
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

        	<h4 class="card-title">
            <a href="<?=base_url();?>apanel/quote/" class="btn btn-primary mr-1" >
                                    <i class="ft-arrow-left"></i> Back
                                </a>
                                 <p style="text-align: center;">Ad : <?=$ad_check[0]->title;?></p>

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
          <form id="user_search" method="get">
            <div class="row">
              <input type="hidden" name="ads" value="<?=base64_encode($ads);?>">
              
                <div class="col-md">
                <label>Search User</label>
            <select  class="form-control" name="user" >
  <option value=""  selected>--Select one--</option>
  
  <?php
                                     // echo"<pre>";
                                      //print_r($user_list);
                                      foreach ($user_list as $key => $value) {?>

                                        <option <?php if($value->id==base64_decode($this->input->get('user',true))){echo"selected";}?> value="<?=base64_encode($value->id);?>"  ><?=$value->name;?></option>
                                         <?php }?>


</select>
</div>
  <div class="col-md">
                <label>Ad Owner</label>
            <select  class="form-control" name="ads_user" >
  <option value="<?=base64_encode($ads_owner_list[0]->id);?>"  selected><?=$ads_owner_list[0]->name;?></option>
  
  
</select>
</div>
  
  <div class="col-md">
    <input type="submit" style="margin-top: 27px;color: #fff;" class="form-control btn btn-sm btn-primary" value="Search Now">
  </div>



</div>
</form>
            <table id="example_tab" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                 <th data-type="numeric">#</th>
                                 <th>Date & Time</th>
                                 <th>Search User</th>
                                 <th>Date & Time</th>
                                     <th>Ads Owner</th>                            
                                 <th>View ad</th>
                </tr>
              </thead>
              <tbody>
               
               <?php
                            $i=0;
                           foreach ($msg_list as $key => $value) {
                              if(date('M d, Y')==date('M d, Y',strtotime($value->qt_entry_date))){
                                          $chat_date='Today';
                                        }else{
                                          $chat_date=date('M d, Y',strtotime($value->qt_entry_date));
                                        }
                                       
                          $chat_time = new DateTime($value->qt_entry_date);
                           //$user_name = getUser($value->qt_userid);
                           $i++;
                          ?>
                           <tr class="dview<?=$i;?>">
                             <?php 
                              if($value->qt_userid==$ads_owner_list[0]->id)
                              {
                              ?>

                             
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td></td>
                                 <td></td>
                                 <td><?=$chat_time->format('h:i A');?>, <?=$chat_date;?></td>
                                  <td><?=$value->qt_message;?></td>
                                 <td class="action-td">
                                  <a target="_blank" href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($ads);?>" class="view_btn"  title="Click to view ad"><i class="fview fa fa-eye"  aria-hidden="true"></i></a></td>

                 
               
              <?php }else{?>

                
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td><?=$chat_time->format('h:i A');?>, <?=$chat_date;?></td>
                                 <td><?=$value->qt_message;?></td>
                                 <td></td>
                                  <td></td>
                                 <td class="action-td">
                                  <a target="_blank" href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($ads);?>" class="view_btn"  title="Click to view ad"><i class="fview fa fa-eye"  aria-hidden="true"></i></a></td>

                   <?php }?>
                 </tr>
                              
              <?php }?>
               
              </tbody>
              <tfoot>
                <tr>
                  <!--<th>ID</th>-->
                <th data-type="numeric">#</th>
                                 <th>Date & Time</th>
                                 <th>Search User</th>
                                 <th>Date & Time</th>
                                     <th>Ads Owner</th>                            
                                 <th>View ad</th>
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
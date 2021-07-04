<style type="text/css">
  .adstatusdactive{
    display: inline-block;
    font-size: 12px;
    background-color: #f16919;
    padding: 4px 12px;
    color: #fff;
    border-radius: 30px;
    text-transform: capitalize;
    font-weight: 600;
  }
  #example_filter input{
    border: 1px solid #ced4da;
     width: 75% !important;
  }
  .dataTables_length {
    display: block !important;

}
</style>
<!-- banner css Start -->
  <div class="banner_area text-center" style="background-image:url(<?php echo base_url(); ?>assets_front/images/bannerimg.jpg);">
    <div class="container">
     <div class="inner_banner_contant pt-0">
         <h2>Dashboard</h2>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
      </div>
    </div>
  </div>
<!-- banner css stop --> 
  
<!-- main_area css Start -->
  <div class="main_area dashboard pb-3 pt-3">
     <div class="container">
        <div class="dashboard_area">
          <div class="row row-8">
            <div class="col-lg-3 dashboard_left mt-3">
               <?php
                                 $this->load->view('left_bar');
                                ?>
               
               
            </div>
            
            <div class="col-lg-6 dashboard_main mt-3">
              <div class="dashboard_mainbox">
                 <h3>Company List</h3>

                 <div class="dashboard_mainboby">

<!----------------------modal------------------------>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Company</h4>
      </div>
      <div class="modal-body">
<form method="post" action="<?php echo base_url(); ?>company/add_company">
  <div class="form-group">
    <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" placeholder="Company Name">
  </div>

  <div class="form-group">
    <input type="text" name="company_link" class="form-control" id="exampleInputEmail1" placeholder="Company Link">
  </div>

  <div class="form-group">

   <select class="form-control" name="industry_id">
<option value="">Select Industry</option>    
<?php foreach ($industry as  $value) { ?>
  <option value="<?php echo $value->id; ?>"><?php echo $value->industry; ?></option>
<?php } ?>

</select>
  </div>




<!---multiple----------->
<div class="col-md-12">

<h4>Operating locations</h4>

<div class="input_fields_wrap">
  
<div class="row">
<div class="col-md-6">
<div class="form-group" >
<label for="">Location</label>
<input name="location[]" type="text" value="" class="form-control" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="">Location Landmark</label>
<input name="location_land[]" type="text" value="" class="form-control" >
</div>
</div>



</div>
</div>

<button style="background-color:green;" class="add_field_button btn btn-info active">Add More Address</button>
</div>
<script>
$(document).ready(function() {
var max_fields = 15; //maximum input boxes allowed
var wrapper = $(".input_fields_wrap"); //Fields wrapper
var add_button = $(".add_field_button"); //Add button ID
var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="row"><div class="col-md-6"><div class="form-group" ><label for="">Location</label><input name="location[]" type="text" value="" class="form-control" ></div></div><div class="col-md-6"><div class="form-group"><label for="">Location Landmark</label><input name="location_land[]" type="text" value="" class="form-control" ></div></div><div style="cursor:pointer;background-color:red;" class="remove_field btn btn-info">Remove</div></div>'); //add input box'); //add input box
}
});
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x--;
})
});
</script>
<!-------mulyiple---->





  <button type="submit" class="btn btn-default">Submit</button>
</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!---------------------------modal---------------------->


                    <?php if($this->session->flashdata('error')){?>

                              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
                  </div>                           
                   <?php } if($this->session->flashdata('message')){?>
                    <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>

</div>

                   <?php }?>
                    <div class="listing_area table-responsive">
                       <table id="example" class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th data-type="numeric">#</th>
                                 <th>Company Name</th>
                                
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php
                            $i=0;
                            foreach($ads_list as $result){
                              //echo"<pre>";
                              //print_r($result);

                              $i++;
                              ?>

                              <tr>
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>

                                 <td class="add-img-selector">
                                    <?=$result->company_name;?>
                                 </td>
                                 
                                 <td class="action-td">

          <p><a class="view_btn" href="#"  data-toggle="modal" data-target="#tmmyModal<?php echo $i; ?>" title="view"> <i class="fa fa-pencil" aria-hidden="true"></i></a></p>




<!----------------------modal------------------------>

<!-- Modal -->
<div id="tmmyModal<?php echo $i; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Company</h4>
      </div>
      <div class="modal-body">
<form method="post" action="<?php echo base_url(); ?>company/edit_company/<?=$result->id;?>">
  <div class="form-group">
    <input type="text" value="<?=$result->company_name;?>" name="company_name" class="form-control" id="exampleInputEmail1" placeholder="Company Name">
  </div>

  <div class="form-group">
    <input type="text" value="<?=$result->company_link;?>" name="company_link" class="form-control" id="exampleInputEmail1" placeholder="Company Link">
  </div>

  <div class="form-group">

   <select class="form-control" name="industry_id">
<option value="">Select Industry</option>    
<?php foreach ($industry as  $value) { ?>
  <option <?php if($value->id==$result->industry_id){echo 'selected';} ?> value="<?php echo $value->id; ?>"><?php echo $value->industry; ?></option>
<?php } ?>

</select>
  </div>



 
 <!---multiple----------->
<div class="col-md-12">

<h4>Delivery Locations</h4>

<?php
$company_id = $result->id;
$val=$this->General_model->show_data_id('company_loaction',$company_id,'company_id','get','');
$count=0;  foreach ($val as  $value) { $count++; ?>


<div class="row">
<div class="col-md-6">
<div class="form-group" >
<label for="">Location</label>
<input name="location1" id="rp<?php echo $count; ?>" type="text" value="<?php echo $value->location; ?>" class="form-control" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="">Location Landmark</label>
<input name="location_land1" id="sp<?php echo $count; ?>" type="text" value="<?php echo $value->location_landmark; ?>" class="form-control" >
</div>
</div>
</div>




<div class="col-md-2">

    <!-- <a onclick="product_attr_update(<?php echo $value->id; ?>,rp<?php echo $count; ?>.value,sp<?php echo $count; ?>.value,v_dis<?php echo $count; ?>.value)" href="javascript:void(0)" class="refress refrech bg-green"><i class="fa fa-refresh" aria-hidden="true"></i></a> -->


    <a onclick="_remove(<?php echo $value->l_id; ?>)" href="javascript:void(0)" class="trash bg-red cart_remove"><i class="fa fa-trash" aria-hidden="true"></i></a>

</div>


<div style="width: 100%; height: 10px; clear: both;"></div>
<?php } ?>




<div class="tminput_fields_wrap">
  
<div class="row">
<div class="col-md-6">
<div class="form-group" >
<label for="">Location</label>
<input name="location[]" type="text" value="" class="form-control" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="">Location Landmark</label>
<input name="location_land[]" type="text" value="" class="form-control" >
</div>
</div>



</div>
</div>

<button style="background-color:green;" class="tmadd_field_button btn btn-info active">Add More Address</button>
</div>
<script>
$(document).ready(function() {
var max_fields = 15; //maximum input boxes allowed
var wrapper = $(".tminput_fields_wrap"); //Fields wrapper
var add_button = $(".tmadd_field_button"); //Add button ID
var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="row"><div class="col-md-6"><div class="form-group" ><label for="">Location</label><input name="location[]" type="text" value="" class="form-control" ></div></div><div class="col-md-6"><div class="form-group"><label for="">Location Landmark</label><input name="location_land[]" type="text" value="" class="form-control" ></div></div><div style="cursor:pointer;background-color:red;" class="remove_field btn btn-info">Remove</div></div>'); //add input box'); //add input box
}
});
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x--;
})
});
</script>
<!-------mulyiple----> 





  <button type="submit" class="btn btn-default">update</button>
</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!---------------------------modal---------------------->








                                   
                                    <p><a class="trash_btn" href="<?=base_url();?>company/company_del/<?=$result->id?>" title="trash" onclick="return confirm('Are you sure to delete?')"> <i class="fa fa-trash" aria-hidden="true"></i></a></p>

                                 </td>
                              </tr>
                              
                             <?php }?>
                              
                              
                           </tbody>
                        </table>
                    </div>
                    
                    
                 </div>
              </div>

<?php //echo $page_link; ?>


            </div>
            
            <div class="col-lg-3 dashboard_right mt-3">
               <div class="dashboardright_area">
                 <div class="aside_box">
                   <?php 
                                $this->load->view('notification');
                                ?>
                 </div>
               </div>
            </div>
            
           
          </div>
        </div>
     </div>
  </div>
<!-- main_area css stop -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
 
    function changeAds(ads,st) {
    //alert(1);
    swal({
  title: "Are you sure to change status?",
  text: "you can active/inactive your own ad!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {



    // swal("Poof! Your imaginary file has been deleted!", {
    //   icon: "success",
    // });
$.ajax({
        type: "POST",
        url: "<?=base_url();?>adslist/change_adstatus",
        data: {ads:ads,st:st},
        cache: false,
        success: function(html) {
        //alert(html);
    var res=html.trim();
    if(res=='success'){
       location.reload(true);
      }else{
        swal("Sorry!", "Please try again", "error");
      }
           //console.log(html);

        }
        });



  } 
});
}

</script>
<script type="text/javascript">
function _remove(val){


      $.ajax({
      type: 'post',
      url: '<?php echo base_url(); ?>company/remove_company_location',
      data: {id:val},
      success: function (data) {

      //alert(1);
location.reload();
      

      }
      });

}
</script>
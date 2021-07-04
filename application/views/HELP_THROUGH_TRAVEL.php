<form method="post" enctype="multipart/form-data" action="<?=base_url();?>lbcontacts/lbcontacts_post?module=<?=base64_encode($catlist[0]->id);?>&submodule=<?=base64_encode($subcatlist[0]->sid);?>">
                                    <div class="row">



                                      
<div class="col-lg-6">
<div class="form-group">
<label>Date of Departure<spsn> *</spsn></label>
<input type="date" id="txtDate" name="date_of_travel" class="form-control"  value="<?=set_value('date_of_travel');?>" required />
<div class="ci_error"><?=form_error('date_of_travel');?></div>
</div>
</div>

<div class="col-lg-6">
<div class="form-group">
<label>Date of Arrival<spsn> *</spsn></label>
<input type="date" id="txtDate1" name="arrival_date" class="form-control"  value="<?=set_value('arrival_date');?>" required />
<div class="ci_error"><?=form_error('arrival_date');?></div>
</div>
</div>



<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Departure Country<spsn> *</spsn></label>
 <select class="form-control select2" onchange="depairport_country_code()" name="depairport_country" id="depairport_country" required>
                                            <option value="">--Select one--</option>
                                            <?php
                                         
                                           foreach ($countrylist as $key => $value) {
                                            
                                              //print_r($value)
                                              //print_r($value)
                                             ?>
  <option  value="<?=$value->countrycode;?>"><?=$value->countryname;?> </option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('country');?></div>
                                            </div>
                                        </div>



<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Arrival Country<spsn> *</spsn></label>
    <select class="form-control select2" onchange="arrival_country_code()" name="arrival_country" id="arrival_country" required>
                                            <option value="">--Select one--</option>
                                            <?php
                                         
                                             foreach ($countrylist as $key => $value) {
                                            
                                              //print_r($value)
                                             ?>
  <option  value="<?=$value->countrycode;?>"><?=$value->countryname;?> </option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('country');?></div>
                                            </div>
                                        </div>






<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Departure Airport Code<spsn> *</spsn></label>
    <select class="form-control select2" name="depairport_code" id="depairport_code" required>
                                            <option value="">--Select one--</option>
                                            


                                           </select>
                                           <div class="ci_error"><?=form_error('country');?></div>
                                            </div>
                                        </div>









<div class="col-lg-6">
                                            <div class="form-group">
                                              <label>Arrival Airport Code<spsn> *</spsn></label>
      <select class="form-control select2" name="arrairport_code" id="arrival_code" required>
<option value="">--Select one--</option>
                                           


                                           </select>
                      <div class="ci_error"><?=form_error('arrairport_code');?></div>
                                            </div>
                                        </div>



<div class="col-lg-6">
<div class="form-group">
<label>Direct<spsn> *</spsn></label>

<div class="radio">
<label>
<input type="radio" name="direct" id="optionsRadios1" value="1">
Yes
</label>
<label>
<input type="radio" name="direct" id="optionsRadios1" value="0" checked="">
No
</label>
</div>
</div> 
</div>


<div class="col-lg-6">
<div class="form-group">
<label>Single Airlines <spsn> *</spsn></label>

<div class="radio">
<label>
<input type="radio" name="singleAirlines" id="optionsRadios1" value="1">
Yes
</label>
<label>
<input type="radio" name="single Airlines" id="optionsRadios1" value="0" checked="">
No
</label>
</div>
</div> 
</div>



                                        
                                      
                                        
                                        <div class="col-lg-10">
                                            <div class="form-group">
                                              <label>Category<spsn> *</spsn></label>
                                                <select class="form-control " name="cat_name" id="cat_name" required>
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             foreach ($catlist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option value="<?=$value->id;?>"><?=$value->name;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('cat_name');?></div>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="col-lg-2">
                                            <div class="form-group">
                                               <label>&nbsp;</label>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_cat" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div> -->


                                    <!-- <div class="col-lg-11">
                                            <div class="form-group">
                                               <label>Sub-category<spsn> *</spsn></label>
                                                <select class="form-control" name="sub_cat" id="sub_cat" required> -->
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             //foreach ($subcatlist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <!-- <option value="<?=$value->sid;?>"><?=$value->subname;?></option> -->
                                               <?php //}?>
                                           <!-- </select>
                                           <div class="ci_error"><?=form_error('sub_cat');?></div>
                                            </div>
                                        </div> -->

                                         <!-- <div class="col-lg-1">
                                            <div class="form-group">
                                              <label>&nbsp;</label>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_cat" style="cursor: pointer;" title="Click here for edit" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </div> -->





                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Details</label>
                                                <textarea name="description" class="form-control mceEditor" placeholder=" Description"  ><?=set_value('description');?></textarea>
                                                <div class="ci_error"><?=form_error('description');?></div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Search Keyword<spsn> *</spsn></label>
                                                <textarea name="search_keyword" class="form-control " placeholder="Search Keyword" required><?=set_value('search_keyword');?></textarea>
                                                <div class="ci_error"><?=form_error('search_keyword');?></div>
                                            </div>
                                        </div>

                                     
                                        
                                       
                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary w-100">Post Ad</button>
                                        </div>
                                    </div>

                                </form>

                               

<script type="text/javascript">

function depairport_country_code(){
  var depairport_country = $('#depairport_country').val();

  //alert(depairport_country);

  $.post( "<?php echo base_url(); ?>lbcontacts/country_wise_airport", {depairport_country:depairport_country}, function( data ) {

    $( "#depairport_code" ).html( data );


  });
}


function arrival_country_code(){
  var arrival_country = $('#arrival_country').val();

  //alert(arrival_country);

  $.post( "<?php echo base_url(); ?>lbcontacts/country_arrival_wise_airport", {arrival_country:arrival_country}, function( data ) {

    $( "#arrival_code" ).html( data );


  });
}

</script> 

<script type="text/javascript">


$( document ).ready(function() {

    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    //alert(maxDate);

    $('#txtDate').attr('min', maxDate);
    $('#txtDate1').attr('min', maxDate);


    $( "#txtDate" ).change(function() {

      $("#txtDate1").val(null);

      var r = $("#txtDate").val();

      //alert(r);

      var from = $("#txtDate").val().split("-");

       //alert(from);

       var y = (from[2], from[1] - 1, from[0]);

       //alert(y);

      var f = new Date(r);

          
//alert(f);
          

          var dtToday = f;

          
    
    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    

    $('#txtDate1').attr('min', maxDate);

    });



});


</script>
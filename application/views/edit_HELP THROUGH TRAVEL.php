<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>adslist/edit_post/<?php echo $result[0]->lbcontactId?>"  onsubmit="return confirm('Are you sure to update ,after update your ad will deactive for verification ?')">

                                        <input type="hidden" name="image_hid" value="<?php echo $result[0]->upload_file;?>">

                                    <div class="row">

<div class="col-lg-6">
<div class="form-group">
<label>Date of Departure<spsn> *</spsn></label>
<input type="date" id="txtDate" name="date_of_travel" class="form-control"  value="<?=$result[0]->date_of_travel; ?>" required />
<div class="ci_error"><?=form_error('date_of_travel');?></div>
</div>
</div>

<div class="col-lg-6">
<div class="form-group">
<label>Date of Arrival<spsn> *</spsn></label>
<input type="date" id="txtDate1" name="arrival_date" class="form-control"  value="<?=$result[0]->arrival_date; ?>" required />
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
  <option <?php if($value->countrycode==$result[0]->depairport_country){echo 'selected';} ?>  value="<?=$value->countrycode;?>"><?=$value->countryname;?> </option>
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
  <option <?php if($value->countrycode==$result[0]->arrival_country){echo 'selected';} ?>  value="<?=$value->countrycode;?>"><?=$value->countryname;?> </option>
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
<input <?php if($result[0]->direct==1){echo 'checked';} ?> type="radio" name="direct" id="optionsRadios1" value="1">
Yes
</label>
<label>
<input <?php if($result[0]->direct==0){echo 'checked';} ?> type="radio" name="direct" id="optionsRadios1" value="0">
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
<input <?php if($result[0]->singleAirlines==1){echo 'checked';} ?> type="radio" name="singleAirlines" id="optionsRadios1" value="1">
Yes
</label>
<label>
<input <?php if($result[0]->singleAirlines==0){echo 'checked';} ?> type="radio" name="singleAirlines" id="optionsRadios1" value="0" >
No
</label>
</div>
</div> 
</div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Category<span> *</span></label>
                                                <select class="form-control" name="cat_name" id="cat_name" required>
                                            <!-- <option value="">--Select Category--</option> -->
                                            <?php 
                                             foreach ($catlist as $key => $value) {
                                              //print_r($value)
                                                if($result[0]->cat_name==$value->id){
                                             ?>

                                               <option value="<?=$value->id;?>"><?=$value->name;?></option>

                                               <?php } }?>
                                           </select>
                                           <div class="ci_error"><?=form_error('cat_name');?></div>
                                            </div>
                                        </div>
                                        
                                   
                                         
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Details<span> *</span></label>
                                                <textarea name="description" class="form-control mceEditor" placeholder=" Description" required><?=$result[0]->description;?></textarea>
                                                <div class="ci_error"><?=form_error('description');?></div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Search Keyword<span> *</span></label>
                                                <textarea name="search_keyword" class="form-control " placeholder="Search Keyword" required><?=$result[0]->search_keyword;?></textarea>
                                            </div>
                                        </div>
                                        



                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary w-100">Update Ad</button>
                                        </div>
                                    </div>

                                </form>
                                
<script type="text/javascript">
  $(document).ready(function(){
          $('.select2').select2();

          depairport_country_code();

          arrival_country_code();
 });


function depairport_country_code(){

  var depairport_code =  '<?php echo $result[0]->depairport_code; ?>';

  var depairport_country = $('#depairport_country').val();



  $.post( "<?php echo base_url(); ?>lbcontacts/country_wise_airport", {depairport_country:depairport_country,depairport_code:depairport_code}, function( data ) {

    $( "#depairport_code" ).html( data );


  });
}


function arrival_country_code(){

  var arrivalairport_code =  '<?php echo $result[0]->arrairport_code; ?>';
  var arrival_country = $('#arrival_country').val();

  //alert(arrival_country);

  $.post( "<?php echo base_url(); ?>lbcontacts/country_arrival_wise_airport", {arrival_country:arrival_country,arrivalairport_code:arrivalairport_code}, function( data ) {

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
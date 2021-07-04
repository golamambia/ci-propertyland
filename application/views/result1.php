<?php
$tm_cover = base64_decode($this->input->get("cover_area"));


$cat=$module;


?>

<style type="text/css">

.star-rating {

  line-height:32px;

  font-size:1.25em;

  cursor: pointer;

}



.star-rating .fa-star{color: #e53935;}

.star-rating span.fa-star.hover > .star-rating .fa-star {

  color:#FFCC36;

}

.sort_byone {

  margin-top: 15px;

  position: relative;

  width: 100%;

  z-index: 4;

}

.sort_bytwo{

  margin-top: 15px;

  position: relative;

  width: 100%;

  z-index: 3;

}

.sort_byone label, .sort_bytwo label{



    font-size: 15px;

    font-weight: 600;

    padding-left: 2px;



}

.select li a {

  display: block;

  color: #757575;

}

.select li {

  display: none;

  cursor: pointer;

  padding: 1px 15px;

  border-top: 1px solid #eaeaea;

  /* min-width: 150px; */

  background-color: #fff;

  font-size: 12px;

}

.select li:first-child {

  display: block;

  border-top: 0px;

  margin-bottom: 0px;

  background-color: #fff;

  color: #3e3e3e;

  padding: 5px 15px;

  font-size: 14px;

}



.select {



    border: 1px solid #e1e1e1;

    display: block;

    padding: 0;

    border-radius: 0;

    position: relative;

    font-size: 14px;

    height: 42px;

    line-height: 30px;

    z-index: 3;



}



.select li:hover {

  background-color: #ddd;

}



.select li:first-child:hover {

  background-color: transparent;

}



.select.open li {

  display: block;

}



.select span:before {

  position: absolute;

  top: 5px;

  right: 15px;

  content: "\2193";

}



.select.open span:before {

  content: "\2191";

}

.fav_act{

  background: #e53935;

    border-color: #e53935 !important;

    color: #fff !important;

}

.end-record-info{

  text-align: center;

    color: chocolate;

    font-size: 19px;

    font-weight: 600;

}

</style>



  <div class="banner_area inner_banner text-center" style="background-image:url(<?=base_url();?>assets_front/images/bannerimg.jpg);">

    <div class="container">

     <div class="total_searchbox clearfix wow zoomIn" data-wow-deuration="1s" data-wow-delay=".3s">

         <form  method="get" <?php if($this->session->userdata('front_sess')['userid']){?> onsubmit="return save_loc();" <?php }?>>

             <!-- <div class="box">

               <input type="text" value="<?=$looking_for;?>" name="looking_for" class="form-control" placeholder="What are you looking for?">

             </div> -->

            

             <div class="box">

               <select class="form-control" name="cover_area">

                 <option value="" disabled selected="">Coverage area</option>

             <?php 

                     foreach ($cover_area_list as $key => $value) {

                      //print_r($value)

                     ?>

                       <option <?php if($value->cov_id==$cover_area){echo"selected";} ?> value="<?=base64_encode($value->cov_id);?>"><?=$value->cover_area;?></option>

                       <?php }?>

               </select>

             </div>

             <div class="box">

               <select class="form-control " name="module">

                 <option value="">All Categories</option>

             <?php 

                     foreach ($category_list as $key => $value) {

                      //print_r($value)

                     ?>

                       <option <?php if($value->id==$module){echo"selected";} ?> value="<?=base64_encode($value->id);?>"><?=$value->name;?></option>

                       <?php }?>

               </select>

             </div>

             <div class="box">

               <input type="text" value="<?php if($location!=''){echo $location;}else{echo $this->session->userdata('get_curr');}?>" name="location" id="locationTextField" class="form-control" placeholder="Search location" <?php if('other'!=$save_location){echo'style="pointer-events: none;"';}?>>

             </div>

             <div class="box">

              <select class="form-control save_location" name="save_location">

                 <!-- <option value="" disabled selected="">your save location</option> -->

                 <option <?php if('current'==$save_location){echo"selected";}else if($this->session->userdata('get_curr')){echo"selected";} ?> value="<?=base64_encode('current');?>">Current location</option>

                 <?php if($this->session->userdata('front_sess')['userid']){?>

                 <option <?php if('other'==$save_location){echo"selected";} ?> value="<?=base64_encode('other');?>">Other location</option>

               <?php }?>

                 <?php 

                     foreach ($loc_list as $key => $value) {

                      //print_r($value)

                     ?>

                       <option <?php if($value->slt_id==$save_location){echo"selected";} ?> value="<?=base64_encode($value->slt_id);?>"><?=$value->slt_title;?></option>

                       <?php }?>

               </select>

             </div>

             <div class="search_btn">

              <button type="submit"  class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>

             </div>

             <input type="hidden" name="save_per" id="save_per" value="">

             <input type="hidden" name="tm_save_per" id="" value="omega">

         </form>

      </div>

      <div class="total_searchbox clearfix wow zoomIn" data-wow-deuration="1s" data-wow-delay=".3s">

         


<?php if($cat==24){ ?> 



<form method="post">

             <div class="box dep">

             

<select class="form-control" id="locationType" onchange="this.form.submit()" name="locationType">

                 <!-- <option value="" disabled selected="">your save location</option> -->

                 <option value="">Select Location Type</option>

                 <option <?php if($this->session->userdata('locationType')=='Departure'){echo 'selected';} ?> value="Departure">Departure</option>

                 <option <?php if($this->session->userdata('locationType')=='Arrival'){echo 'selected';} ?> value="Arrival">Arrival</option>



               </select>



             </div>

 

         </form>









<?php if($this->session->userdata('locationType')!=''){ ?>

<form method="post">

             <div class="box dep">

             

<select class="form-control" name="travelType" id="travelType" onchange="this.form.submit()">

                 <!-- <option value="" disabled selected="">your save location</option> -->

                 <option value="">Select Travel Type</option>

                 <option <?php if($this->session->userdata('travelType')=='Domestic'){echo 'selected';} ?> value="Domestic">Domestic</option>

                 <option <?php if($this->session->userdata('travelType')=='International'){echo 'selected';} ?> value="International">International</option>



               </select>



             </div>

 </form>            

<form method="post">
             <div class="box dep" id="internationalCountry">

             

 <select class="form-control select2"  name="international_county" id="international_county" onchange="this.form.submit()" required>
                                            <option value="">--Select one--</option>
                                            <?php
                                         
                                           foreach ($countrylist as $key => $value) {
                                            
                                              //print_r($value)
                                              //print_r($value)
                                             ?>
  <option <?php if($this->session->userdata('international_county')==$value->countrycode){echo 'selected';} ?>  value="<?=$value->countrycode;?>"><?=$value->countryname;?> </option>
                                               <?php }?>
                                           </select>



             </div>             



         </form>

<?php } ?>




<?php } ?>


<?php if($cat==24){ ?>

  <?php if($this->session->userdata('locationType')=='' OR $this->session->userdata('travelType')==''){ ?>

  <?php }else{ ?>

     <form  method="get">

      <div class="box">

          <input type="text" value="<?=$looking_for;?>" name="looking_for" id="looking_for" class="form-control" placeholder="What are you looking for?">

      </div>

      <div class="search_btn">

          <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>

      </div>

    </form>


  <?php } ?>
   
<?php }else{ ?>

 <form  method="get">

      <div class="box">

          <input type="text" value="<?=$looking_for;?>" name="looking_for" id="looking_for" class="form-control" placeholder="What are you looking for?">

      </div>

      <div class="search_btn">

          <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>

      </div>

    </form>

<?php } ?>
      </div>

      <div class="inner_banner_contant">

         <h2>All Categories listing The local browse</h2>

         <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">all listing</li>

          </ol>

      </div>

    </div>

  </div>

<!-- banner css stop --> 

<!-- main_area css Start -->

  <div class="main_area" style="background-image:url(<?=base_url();?>assets_front/images/main_bg.jpg);">

     <div class="container">

        <div class="main_area_innerbox">

           <div class="row">

              <div class="col-lg-3">

                <aside class="aside_area">

                  <div class="aside_innerarea">

                      <div class="aside_box">

                         <h3>Filters</h3>

                         <div class="aside_body filter">

                             

                             <div class="sort_by_area">







<!----------------------------help travel------------------->

<?php if($cat==24){ ?> 





<div class="accordion">

  <div class="card">

  <div class="sort_byone">





<div class="card-header" id="heading3">

            <h2 class="mb-0">

              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne3"  aria-controls="collapseOne"> Refine By </button>

            </h2>

          </div>

<?php
$show='';
if($this->session->userdata('depairportAirport_code')!='' OR $this->session->userdata('arrivalAirport_code')!='' OR $this->session->userdata('direct')!='' OR $this->session->userdata('singleAirlines')!='' OR $this->session->userdata('departureDateAfter')!=''){
$show='show';
}

?>



<div id="collapseOne3" class="collapse <?php echo $show; ?>" aria-labelledby="heading3">

            <div class="card-body">


<?php if($this->session->userdata('locationType')=='Departure'){ ?>

 <form method="post">
                                          
                                              <p>Departure Airport Code</p>
    <select class="form-control select2" onchange="this.form.submit()" name="depairportAirport_code" id="" required>
                                            <option value="">--Select one--</option>




<?php

foreach ($search_data as $key => $result) {

$name = $result->depairport_code;
?>                                            

<option <?php if($name==$this->session->userdata('depairportAirport_code')){echo 'selected';} ?>  value="<?=$name;?>"> <?=$name;?> </option>                                           
<?php } ?>                                            


                                           </select>
                                           
 </form>                                       

<?php } ?>



<?php if($this->session->userdata('locationType')=='Arrival'){ ?>

 <form method="post">
                                          
                                              <p>Arrival Airport Code</p>
    <select class="form-control select2" onchange="this.form.submit()" name="arrivalAirport_code" id="" required>
                                            <option value="">--Select one--</option>




<?php

foreach ($search_data as $key => $result) {

$name = $result->arrairport_code;
?>                                            

<option <?php if($name==$this->session->userdata('arrivalAirport_code')){echo 'selected';} ?>  value="<?=$name;?>"> <?=$name;?> </option>                                           
<?php } ?>                                            


                                           </select>
                                           
 </form>                                       

<?php } ?>

<form method="post">
                                          
                                              <p>Direct</p>
    <select class="form-control" onchange="this.form.submit()" name="direct" id="" required>
                                            <option  value="">--Select one--</option>


<option <?php if($this->session->userdata('direct')=='1'){echo 'selected';} ?>  value="1"> Yes </option>                                           
 <option <?php if($this->session->userdata('direct')=='0'){echo 'selected';} ?> value="0"> No </option>                                           


                                           </select>
                                           
 </form>

 <form method="post">
                                          
                                              <p>Single Airlines</p>
    <select class="form-control" onchange="this.form.submit()" name="singleAirlines" id="" required>
                                            <option value="">--Select one--</option>


<option  <?php if($this->session->userdata('singleAirlines')=='1'){echo 'selected';} ?> value="1"> Yes </option>                                           
 <option  <?php if($this->session->userdata('singleAirlines')=='0'){echo 'selected';} ?> value="0"> No </option>                                           


                                           </select>
                                           
 </form>  


 <form method="post">

<p>Departure Date After</p>

<input type="date" value="<?php echo $this->session->userdata('departureDateAfter'); ?>" name="departureDateAfter" class="form-control" onchange="this.form.submit()">

 </form>


 </div></div>                                                 



                                

                            </div>

</div>





</div>









<?php } ?>

<!----------------------------help travel------------------->



<?php



if($cat==17){ ?>



<div class="accordion">

  <div class="card">

  <div class="sort_byone">





<div class="card-header" id="heading1">

            <h2 class="mb-0">

              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"  aria-controls="collapseOne"> Refine By </button>

            </h2>

          </div>





<div id="collapseOne" class="collapse" aria-labelledby="heading1">

            <div class="card-body">



<form method="get">

                              <select onchange="this.form.submit()" name="accommodationtype" class="custom-select sort_by">

                                <option value="">--Accommodation Type--</option>

                                

                                <option <?php if($this->session->userdata('accommodationtype')=='Appartment'){echo"selected";}?> value="Appartment">Appartment</option>

                                <option <?php if($this->session->userdata('accommodationtype')=='Independent'){echo"selected";}?> value="Independent">Independent</option>  



                              </select>

                           </form>



<form method="get" class="rent">

 <h2>Number of Bedrooms</h2> 

  <div class="row">

      <div class="col-lg-12">



<input type="number" name="bedRooms"  class="form-control custom-select  numeric_input" required="" value="<?=$this->session->userdata('bedRooms');?>">

                                 

      </div>



      <button type="submit" class="cmn-btn btn go">Go</button>

  </div>               

 </form>



<form method="post" class="rent">

 <h2>Rent Per month Range</h2> 

  <div class="row">

      <div class="col-lg-6 pr-1">

          

                              <input type="number" name="min_rent"  class="form-control custom-select numeric_input" value="<?=$this->session->userdata('min_rent');?>" placeholder="0" required="">

                         

          

      </div>

      <div class="col-lg-6 pl-1">

          

                              <input type="number" name="max_rent"  class="form-control custom-select  numeric_input" value="<?=$this->session->userdata('max_rent');?>" placeholder="max" required="">

                          

          

      </div>

      <button type="submit" class="cmn-btn btn go">Go</button>

  </div>

                  



 </form>



  <form method="post">

<p>Available from</p>

<input type="date" value="<?=$this->session->userdata('availablefrom');?>" name="availablefrom" class="form-control" onchange="this.form.submit()">

 </form>



                           <form method="get">

                              <select onchange="this.form.submit()" name="furnishedType" class="custom-select ">

                                <option value="">--Furnished Type--</option>

                                

                                <option <?php if($this->session->userdata('furnishedType')=='Furnished'){echo"selected";}?> value="Furnished">Furnished</option>

                               <option <?php if($this->session->userdata('furnishedType')=='Semi Furnished'){echo"selected";}?> value="Semi Furnished">Semi Furnished</option>

                               <option <?php if($this->session->userdata('furnishedType')=='Un Furnished'){echo"selected";}?> value="Un Furnished">Un Furnished</option>



                              </select>

                           </form>







  

  <form method="POST">

<p>Posting date</p>

<input type="date" value="<?=$this->session->userdata('post_date');?>" name="post_date" class="form-control" onchange="this.form.submit()">

 </form>







                           <form method="POST">

                              <select name="accoposted_by" onchange="this.form.submit()" class="custom-select ">

                                <option value="">--Accommodation Posted by--</option>

                                

                                <option <?php if($this->session->userdata('accoposted_by')=='Tenant'){echo"selected";}?> value="Tenant">Tenant</option>

                                <option <?php if($this->session->userdata('accoposted_by')=='Owner'){echo"selected";}?> value="Owner">Owner</option>  



                              </select>

                           </form> 



 </div></div>                                                 



                                

                            </div>

</div>





</div>





<?php }  



if($cat==5){ ?>



<div class="accordion">

  <div class="card">

  <div class="sort_byone">





<div class="card-header" id="heading2">

            <h2 class="mb-0">

              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"  aria-controls="collapseOne"> Refine By </button>

            </h2>

          </div>





<div id="collapseOne" class="collapse" aria-labelledby="heading2">

            <div class="card-body">









                               











                                <form method="get">

                              <select onchange="this.form.submit()" name="accommodationtype" class="custom-select ">

                                <option value="">--Accommodation Type--</option>

                                

                                <option <?php if($this->session->userdata('accommodationtype')=='Appartment'){echo"selected";}?> value="Appartment">Appartment</option>

                                <option <?php if($this->session->userdata('accommodationtype')=='Independent'){echo"selected";}?> value="Independent">Independent</option>  



                              </select>

                           </form>

                           <form method="post">

                              <select name="roomtype" onchange="this.form.submit()" class="custom-select ">

                                <option value="">--Room Type--</option>

                                

                                <option <?php if($this->session->userdata('roomtype')=='Separate'){echo"selected";}?> value="Separate">Separate</option>

                                <option <?php if($this->session->userdata('roomtype')=='Shared'){echo"selected";}?> value="Shared">Shared</option>  



                              </select>

                           </form>

                           <form method="post">

                              <select name="sharingtype" onchange="this.form.submit()" class="custom-select ">

                                <option value="">--Sharing Type--</option>

                                

                                <option <?php if($this->session->userdata('sharingtype')=='Single'){echo"selected";}?> value="Single">Single</option>

                                <option <?php if($this->session->userdata('sharingtype')=='Family'){echo"selected";}?> value="Family">Family</option>  



                              </select>

                           </form>







<form method="post" class="rent">

 <h2>Rent Per month Range</h2> 

  <div class="row">

      <div class="col-lg-6 pr-1">

          

                              <input type="number" name="min_rent"  class="form-control custom-select numeric_input" value="<?=$this->session->userdata('min_rent');?>" placeholder="0" required="">

                         

          

      </div>

      <div class="col-lg-6 pl-1">

          

                              <input type="number" name="max_rent"  class="form-control custom-select  numeric_input" value="<?=$this->session->userdata('max_rent');?>" placeholder="max" required="">

                          

          

      </div>

      <button type="submit" class="cmn-btn btn go">Go</button>

  </div>

                  



 </form>



 <form method="post">

<p>Available from</p>

<input type="date" value="<?=$this->session->userdata('availablefrom');?>" name="availablefrom" class="form-control" onchange="this.form.submit()">

 </form>





  <form method="POST">

<p>Posting date</p>

<input type="date" value="<?=$this->session->userdata('post_date');?>" name="post_date" class="form-control" onchange="this.form.submit()">

 </form>







                           <form method="POST">

                              <select name="accoposted_by" onchange="this.form.submit()" class="custom-select ">

                                <option value="">--Accommodation Posted by--</option>

                                

                                <option <?php if($this->session->userdata('accoposted_by')=='Tenant'){echo"selected";}?> value="Tenant">Tenant</option>

                                <option <?php if($this->session->userdata('accoposted_by')=='Owner'){echo"selected";}?> value="Owner">Owner</option>  



                              </select>

                           </form>                         



                                

 </div></div>                                                 



                                

                            </div>

</div>





</div>                          



<?php } 



if($cat==21){ ?>

  





<div class="sort_byone">

                                <label>Refine By</label>

                                <form method="post">

                              <select onchange="this.form.submit()" name="tution_mode" class="custom-select ">

                               <option value="0">Select Tution Mode</option>

<option <?php if($this->session->userdata('tution_mode')==1){echo"selected";}?> value="1">Online</option>

<option <?php if($this->session->userdata('tution_mode')==2){echo"selected";}?> value="2">Offline</option>

<option <?php if($this->session->userdata('tution_mode')==3){echo"selected";}?> value="3">Both</option>



                              </select>









                           </form>

                        



                                

                            </div>







<?php } ?>

                            

                            <div class="sort_byone">

                                <label>Sort By</label>

                                <form method="POST">

                              <select name="sort_by" class="custom-select sort_by">

                                <option value="">--Choose one--</option>
<?php if($cat!=24){ ?> ?>
                                <option <?php if($this->session->userdata('sort_by')=='by_post_date'){echo"selected";}?> value="by_post_date">Posting date</option>

                                <!-- <option <?php if($this->session->userdata('sort_by')=='by_rating'){echo"selected";}?> value="by_rating">Rating</option>

                                <option <?php if($this->session->userdata('sort_by')=='by_view'){echo"selected";}?> value="by_view">Views</option> -->
<?php } ?>
<?php if($cat==24){ ?> ?>

<option <?php if($this->session->userdata('sort_by')=='by_distance24'){echo"selected";}?> value="by_distance24">Distance </option>
<option <?php if($this->session->userdata('sort_by')=='by_departure_airport_code'){echo"selected";}?> value="by_departure_airport_code">Departure Airport code
</option>
<option <?php if($this->session->userdata('sort_by')=='by_arrival_airport_code'){echo"selected";}?> value="by_arrival_airport_code">Arrival Airport code
</option>

<?php } ?>




<?php if($cat==5){ ?> ?>



                                 <option value="">Distance Range</option>

                                 <option <?php if($this->session->userdata('sort_by')=='availablefrom'){echo"selected";}?> value="availablefrom">Available from</option>

                                 <option <?php if($this->session->userdata('sort_by')=='accoposted_by'){echo"selected";}?> value="accoposted_by">Accommodation Type</option>

                                 <option <?php if($this->session->userdata('sort_by')=='roomtype'){echo"selected";}?> value="roomtype">Room Type</option>

                                 <option <?php if($this->session->userdata('sort_by')=='monthlyrent'){echo"selected";}?> value="monthlyrent">Rent Per month</option>

<?php } ?>



                              </select>

                           </form>











                           

                                

                            </div>















<?php if($cover_area==4){

   

    if($cat==21){



if($this->session->userdata('tution_mode')==2){

?>



                            <div class="sort_bytwo">

                                <label>Distance</label>

                                <form method="POST">

                                <select name="by_distance" class="custom-select by_distance">

                                <option <?php if($this->session->userdata('by_distance')==3){echo"selected";}?> value="3">3 km</option>

                                <option <?php if($this->session->userdata('by_distance')==5){echo"selected";}?> value="5">5 km</option>

                                <option <?php if($this->session->userdata('by_distance')==10){echo"selected";}?> value="10">10 km</option>

                                <option <?php if($this->session->userdata('by_distance')==20){echo"selected";}?> value="20">20 km</option>

                                <option <?php if($this->session->userdata('by_distance')==30){echo"selected";}?> value="30">30 km</option>

                                <option <?php if($this->session->userdata('by_distance')==40){echo"selected";}?> value="40">40 km</option>

                                <option <?php if($this->session->userdata('by_distance')==50){echo"selected";}?> value="50">50 km</option>

                                

                              </select>

                                </form>

                              </div> 

<?php }}else{?>





<div class="sort_bytwo">

                                <label>Distance</label>

                                <form method="POST">

                                <select name="by_distance" class="custom-select by_distance">

                                <option <?php if($this->session->userdata('by_distance')==3){echo"selected";}?> value="3">3 km</option>

                                <option <?php if($this->session->userdata('by_distance')==5){echo"selected";}?> value="5">5 km</option>

                                <option <?php if($this->session->userdata('by_distance')==10){echo"selected";}?> value="10">10 km</option>

                                <option <?php if($this->session->userdata('by_distance')==20){echo"selected";}?> value="20">20 km</option>

                                <option <?php if($this->session->userdata('by_distance')==30){echo"selected";}?> value="30">30 km</option>

                                <option <?php if($this->session->userdata('by_distance')==40){echo"selected";}?> value="40">40 km</option>

                                <option <?php if($this->session->userdata('by_distance')==50){echo"selected";}?> value="50">50 km</option>

                                

                              </select>

                                </form>

                              </div> 



<?php }} ?>






<?php if($cat!=24){ ?> ?>
                              <div class="sort_bytwo">

                                <label>Rating</label>

                                <form method="POST">

                                <select name="by_rating" class="custom-select by_rating">

                                  <option value="">Select</option>

                                <option value="4">4 star and avobe</option>

                                <option value="3">3 star and avobe</option>

                                <option value="2">2 star and avobe</option>

                                <option value="1">1 star and avobe</option>

                                

                              </select>

                                </form>

                              </div>  

<?php } ?>                                 

                             </div>

                             

                             

                         </div>

                      </div>

                      <div class="aside_box">

                       <h4>Category</h4>

                       <div class="aside_body">



                          <div class="form-group">

                           <?php 

                     foreach ($category_list as $key => $value) {

                      //print_r($value)

                     ?>

                     <label <?php if($value->id==$module){echo'class="active"';} ?> for="box-1"><a class="category" href="<?=base_url();?>search?module=<?php echo base64_encode($value->id);?>"><?=$value->name;?> (<?=dataCount($value->id,'');?>)</a></label>

                       

                       <?php }?>

                            

                          </div>

                           

                       </div>

                     </div>

                      

                     <?php if($module!='all' && $module!=''){?>

                     <div class="aside_box">

                       <h4>Sub Category</h4>

                       <div class="aside_body">



                          <div class="form-group">

                           <?php 

                                             foreach ($subcat_list as $key => $value) {

                                              

                                             ?>

                                             <label <?php if($value->sid==$sub_module){echo'class="active"';} ?> for="box-1"><a class="category" href="<?=base_url();?>search?module=<?php echo base64_encode($module);?>&sub_module=<?php echo base64_encode($value->sid);?>"><?=$value->subname;?> (<?=dataCount($module,$value->sid);?>)</a></label>

                                              

                                               <?php }?>

                            

                          </div>

                           

                       </div>

                     </div>

                   <?php }?>

                      <!-- <div class="aside_box">

                       <h4>Ratings</h4>

                       <div class="aside_body">

                         <a href="http://webtechnomind.co.in/project/localbrowse/search">

                          <div class="form-group">

                           

                            <input type="checkbox" id="box-1" >

                            <label for="box-1">

                                <a href="https://www.google.com/">

                                    <span class="list-rat-ch active">

                                        <span>5.0</span>

                                        <i class="fa fa-star" aria-hidden="true"></i>

                                        <i class="fa fa-star" aria-hidden="true"></i>

                                        <i class="fa fa-star" aria-hidden="true"></i>

                                        <i class="fa fa-star" aria-hidden="true"></i>

                                        <i class="fa fa-star" aria-hidden="true"></i>

                                    </span>

                                </a>

                              </label>

                            

                          </div>

                          </a>

                           <div class="form-group">

                            <input type="checkbox" id="box-2" >

                            <label for="box-2">

                                <a href="#">

                                    <span class="list-rat-ch">

                                    <span>4.0</span>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                </span>

                                </a>

                                

                            </label>

                           </div>

                           <div class="form-group">

                              <input type="checkbox" id="box-3">

                              <label for="box-3">

                                <a href="#">

                                    <span class="list-rat-ch">

                                    <span>3.0</span>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                </span>

                                </a>

                               </label>

                          </div>

                          <div class="form-group">

                              <input type="checkbox" id="box-4">

                              <label for="box-4">

                                <a href="#">

                                    <span class="list-rat-ch">

                                    <span>2.0</span>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                </span>

                                </a>

                              </label>

                          </div>

                          <div class="form-group">

                              <input type="checkbox" id="box-5">

                              <label for="box-5">

                                <a href="#">

                                    <span class="list-rat-ch">

                                    <span>1.0</span>

                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                    <i class="fa fa-star-o" aria-hidden="true"></i>

                                </span>

                                </a>

                              </label>

                          </div>

                       </div>

                     </div> -->









                  </div>

                </aside>

              </div>

              <div class="col-lg-9">

                <article class="article_area">

                   <div class="listing_box_area">



                    <?php

                    if(!empty($search_data)){

                      $i=0;

                    foreach ($search_data as $key => $result) {
$cat = $result->cat_name;                      

                      $i++;

                      ?>

                        <div class="catagori_slider">

                          <div class="topmore_cetagoribox clearfix">

<?php

if($cat!=24){
?>
                            <figure>

                              <a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->lbcontactId);?>">

                              <div class="topmore_cetagorithumble">                                

                              <img  src="<?php echo base_url(); ?>module_file/<?=$result->upload_file;?>" alt="cetagori_thum6" title="">                               

                              </div>

                              </a>

                            </figure>
<?php }  ?>


                            <div <?php if($cat==24){echo 'class="body_text1"';}else {echo 'class="body_text"';} ?>>
                           

                               <h4><a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->lbcontactId);?>"><?=$result->title;?></a></h4>

                              <!--  <p><strong>Express Avenue Mall, Santa Monica</strong></p> -->

                               <p><i class="fa fa-map-marker" aria-hidden="true"></i> <strong><?=$result->address;?></strong></p>

                               <ul>

                                 <!-- <li><a href="javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i> </a></li>

                                 <li><a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i></a></li> -->

                                 <li><a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true"></i><?=date('d-m-Y',strtotime($result->entry_date));?></a></li>

                                 <li><a href="javascript:void(0)"><i class="fa fa-road" aria-hidden="true"></i><?php

                                 $dis=round($result->distance,2);

                                 if($dis>1){

                                  echo $dis." km";

                                 }else{

                                  echo ($dis*1000)." m";

                                 }

                                 ?></a></li>

<?php

if($cat==24){
?>
                                <li>Departure date <?=date('d-m-Y',strtotime($result->date_of_travel));?></li>


                                <li>Type : <?php echo $result->travel_type; ?></li>

                               

                                <li>Direct : <?php if($result->direct==1){echo 'Yes';}else{echo 'No';} ?></li>

     <li>Dep.Airport : <?php echo $result->depairport_code; ?></li>

      <li>Arr.Airport : <?php echo $result->arrairport_code; ?></li>

<?php } ?>

                               </ul>

                               <ul class="button_area">

                                 <li>

                                   <?php if($this->session->userdata('log_check')!=1){?>

                                    <a href="javascript:void(0)" onclick="log_alert()" class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i>review</a>



                                    <?php }else{ if($this->session->userdata('front_sess')['userid']!=$result->user_id){?>

                                  <a href="javascript:void(0)" onclick="review_model('<?=base64_encode($result->lbcontactId);?>')" class="btn btn-outline-success"><i class="fa fa-star-o" aria-hidden="true"></i>Review</a>

                                  <?php }else{?>

            <a href="javascript:void(0)" onclick="own_post()" class="btn btn-outline-success"><i class="fa fa-star-o" aria-hidden="true"></i>Review</a>



                                  <?php }}?>



                                </li>

                                 <li><a href="tel:<?=$result->phone;?>" class="btn btn-outline-success"><i class="zmdi zmdi-phone"></i>call now</a></li>

                                 <li>

                                   <?php if($this->session->userdata('log_check')!=1){?>

                                    <a href="javascript:void(0)" onclick="log_alert()" class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i>quotes</a>



                                    <?php }else{ if($this->session->userdata('front_sess')['userid']!=$result->user_id){?>

                                  <a href="javascript:void(0)" onclick="quote_model('<?=base64_encode($result->lbcontactId);?>')"  class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i> get a quotes</a>

                                  <?php }else{?>

            <a href="javascript:void(0)" onclick="own_post()" class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i> get a quotes</a>



                                  <?php }}?>



                                </li>

                                 <li>

                                  <?php if($this->session->userdata('log_check')!=1){?>

                         <a href="javascript:void(0)" onclick="log_alert()" class="btn btn-outline-success"><i class="fa fa-heart-o" aria-hidden="true"></i>Favourite</a>

                         <?php }else{ if($this->session->userdata('front_sess')['userid']!=$result->user_id){?>

                                  <a href="javascript:void(0)" onclick="post_favourite('<?=base64_encode($result->lbcontactId);?>','<?=$i;?>')" class="fav_cls<?=$i;?> btn btn-outline-success <?php if(favCheck($result->lbcontactId)){echo"fav_act";}?>"><i class="fa fa-heart-o" aria-hidden="true"></i>Favourite </a>

                                  <?php }else{?>

                                    <a href="javascript:void(0)" onclick="own_post()" class="btn btn-outline-success"><i class="fa fa-heart-o" aria-hidden="true"></i>Favourite </a>

                                   <?php }}?>

                                </li>

                               </ul>

                              

                               <div class="reting"><?=avgReview($result->lbcontactId);?><sup><i class="fa fa-star" aria-hidden="true"></i></sup></div>

                            </div>

                           

                         </div>

                      </div>

                      

                      <?php }}if(empty($this->session->userdata('lat_long'))){ ?>

                        <div class="catagori_slider">

                     <div class="topmore_cetagoribox clearfix" style="

    text-align: center;

    font-size: 22px;

    color: crimson;

">

                            

                          Please allow your location or increase distance to find nearest ads  

                           

                         </div>

                       </div>

                      

                      <?php } ?>







                       <div class="catagori_slider">

                     <div class="topmore_cetagoribox clearfix" >

                            

                         <div id="results"></div> 

                           

                         </div>

                       </div>







                      

                  </div>

                  

                  <?php //echo $page_link; ?>

                </article>

              </div>

           </div>

        </div>

     </div>

  </div>





<!-- app_area css stop -->

        <?php

                if($this->session->userdata('log_check')){

                ?>

 <!-- report error modal start -->

    <div class="modal fade" id="myModal_listquote">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">



                <!-- Modal Header -->

                <div class="modal-header">

                    <h4 class="modal-title">Message</h4>

                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>

                </div>

                

                <!-- Mobiledal body -->

                <div class="modal-body">

                    <div class="contriner">

                       <form id="listquote_form">

                                            <div class="row row-8">

                                               

                            <div class="col-lg-6">

                               <div class="form-group">

                                           

                                            <input type="text" name="qt_name" class="form-control" placeholder="Enter Your Name" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" required />

                                        </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">

                                            <input type="text" name="qt_phone" class="form-control numeric_input" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['phone'] : '' ?>" placeholder="Enter Your Mobile No." required />

                                        </div>

                            </div>

                            <input type="hidden" name="adsid" id="adsid">

                            <div class="col-lg-6">

                                <div class="form-group">

                                            <input type="email" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['email'] : '' ?>" name="qt_email" class="form-control" placeholder="Enter Your Email" required />

                                        </div>

                            </div>

                            

                            <div class="col-lg-12">

                                 <div class="form-group">

                                                        <textarea class="form-control" name="qt_message" placeholder="Write Message" required></textarea>

                                                    </div>

                            </div>

                            <div class="col-lg-12">

                                <button type="submit" class="btn btn-primary sub">Submit</button>

                            </div>

                        </div>

                    </form>



                    </div>

                </div>



            </div>

        </div>

    </div>

    <!-- report error modal stop -->



 <!-- report Complaint modal start -->

    <div class="modal fade" id="myModal_listreview">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">



                <!-- Modal Header -->

                <div class="modal-header">

                    <h4 class="modal-title">Write Your <strong>Reviews</strong></h4>

                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>

                </div>



                <!-- Modal body -->

                <div class="modal-body">

                    <div class="contriner">

                        <form id="listreview_form">

                                            <div class="row row-8">

                                              <div class="row row-8">

                                                <input type="hidden" name="adsid2" id="adsid2" />

                                                <div class="col-lg-12">

                                      <div class="star-rating">

                                        <span class="fa fa-star-o" data-rating="1"></span>

                                        <span class="fa fa-star-o" data-rating="2"></span>

                                        <span class="fa fa-star-o" data-rating="3"></span>

                                        <span class="fa fa-star-o" data-rating="4"></span>

                                        <span class="fa fa-star-o" data-rating="5"></span>

                                        <input type="hidden" name="rv_rate" class="rating-value" value="1">

                                      </div>

                                    </div>

                                                                                

                                                <div class="col-lg-12">

                                                    <div class="form-group">

                                                        <input type="text" name="" class="form-control" value="<?php echo $this->session->userdata('log_check') ? $this->session->userdata('front_sess')['name'] : '' ?>" placeholder="Full Name" readonly />

                                                    </div>

                                                </div>

                                                

                                                <div class="col-lg-12">

                                                    <div class="form-group">

                                                        <textarea class="form-control" name="rv_message" placeholder="Write Review" required></textarea>

                                                    </div>

                                                </div>

                                                <div class="col-lg-12">

                                                    <?php if($this->session->userdata('log_check')!=1){?>

                                                    <a href="<?=base_url();?>register/login?log=<?=base64_encode($ads_view[0]->lbcontactId);?>" class="btn btn-primary sub2">Submit</a>

                                                    <?php }else{?>

                                                        <button type="submit" class="btn btn-primary sub2">Submit</button>

                                                         <?php }?>

                                                </div>

                                            </div>

                                            </div>

                    </form>

                    </div>

                </div>



            </div>

        </div>

    </div>

    <!-- report Complaint modal stop -->



<?php } ?>





<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

$("#looking_for11").on("keyup", function() {

  //console.log('1');

    var value = $(this).val().toLowerCase();

    $(".catagori_slider").filter(function() {

     //console.log('1');

      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

    });

  });

  $('.save_location').change(function(){



                var val = $('.save_location').val();

                //console.log(val);

                if(val!='Y3VycmVudA==' && val!='b3RoZXI='){

                  $('#locationTextField').css('pointer-events', 'none');

                 // alert(1);

                $.ajax({

                  type:"post",

                  url:'<?=base_url();?>search/get_save_loc',

                  data:{location:val},

                  cache:false,

                 //dataType: 'json',

                 success:function(response){

         $('#locationTextField').val(response);

   

            }



            });

            }else if(val=='b3RoZXI='){

              $('#locationTextField').css('pointer-events', '');

               $('#locationTextField').val('');

            }else{

              $('#locationTextField').css('pointer-events', 'none');

              //alert(1);

             // var lat='';

  //var long='';

           if ("geolocation" in navigator){

      navigator.geolocation.getCurrentPosition(function(position){ 

          var lat=position.coords.latitude;

  var long=position.coords.longitude;

  //console.log(long);

  $.ajax({

                  type:"post",

                  url:'<?=base_url();?>search/get_current_loc',

                  data:{lat:lat,long:long},

                  cache:false,

                 //dataType: 'json',

                 success:function(response){

         $('#locationTextField').val(response);

   

            }



            });

        });

    }else { 

   alert("Geolocation is not supported by this browser.");

  }

      //console.log(response);

      //var lat=response.latitude;

  //var long=response.longitude;





  //console.log(response);

     

               //$('#locationTextField').val('');

              // console.log(lat);

               

            }





                 });

  });



  

</script>

<script>

  $("#one").click(function() {

  var is_open = $(this).hasClass("open");

  if (is_open) {

    $(this).removeClass("open");

  } else {

    $(this).addClass("open");

  }

});



$("#one li").click(function() {



  var selected_value = $(this).html();

  var first_li = $("#one li:first-child").html();



  $("#one li:first-child").html(selected_value);

  $(this).html(first_li);



});



$(document).mouseup(function(event) {



  var target = event.target;

  var select = $("#one");



  if (!select.is(target) && select.has(target).length === 0) {

    select.removeClass("open");

  }



});









 $("#two").click(function() {

  var is_open = $(this).hasClass("open");

  if (is_open) {

    $(this).removeClass("open");

  } else {

    $(this).addClass("open");

  }

});



$("#two li").click(function() {



  var selected_value = $(this).html();

  var first_li = $("#two li:first-child").html();



  $("#two li:first-child").html(selected_value);

  $(this).html(first_li);



});



$(document).mouseup(function(event) {



  var target = event.target;

  var select = $("#two");



  if (!select.is(target) && select.has(target).length === 0) {

    select.removeClass("open");

  }



});

function save_loc(){


var loc=$("#locationTextField").val();

var alt_loc='<?=$this->session->userdata('location');?>';

var save_location=$('.save_location').val();

//alert(save_location);

//'<?=$this->session->userdata('save_location');?>';

if(save_location=='b3RoZXI=' || save_location=='Y3VycmVudA=='){

if(loc!=alt_loc){

  var con=confirm('Do you want to save this location?');

if(con){

  

  $("#save_per").val('yes');

}

}

}

}

</script>

<script>

    $( document ).ready(function() {

      $('select.selectpicker').on('show.bs.select', function (e) {

        //alert('hello');

      });





     $("#listquote_form").on('submit',function(e){

                e.preventDefault();

             

                $.ajax({

                    method:'post',

                    url:'<?=base_url();?>adsview/post_quote',

                    data:new FormData(this),

                    contentType: false,

                    cache: false,

                    processData:false,

                    beforeSend:function(){

                        $('.sub').attr('disabled','disabled');

                        $('#listquote_form').css('opacity','.5');

                    },

                    success:function(response){

                        //console.log(response);

                        var html=response.trim();

                        if(html=='success'){

                             $('#listquote_form')[0].reset();

                             $('#myModal_listquote').modal('hide');

                         swal("Okay!", "Message successfully send", "success");

                     }else if(html=='fail'){

                         swal("Sorry!", "Message failed to send", "error");

                     }else{

                        swal("Sorry!", "Something went wrong", "error");

                     }



                          $('#listquote_form').css("opacity","");

                        $(".sub").removeAttr("disabled");

                    }

                });



            });

    $(".sort_by").change(function(e) {

      e.preventDefault();

                var val=$(".sort_by").val();

                

      $.ajax({

                    method:'post',

                    url:'<?=base_url();?>search/sort_by',

                    data:{data:val},

                    

                    cache: false,

                    

                    success:function(response){

                        //console.log(response);

                        location.reload(true);

                        

                    }

                });

              });



$(".by_distance").change(function(e) {

      e.preventDefault();

                var val=$(".by_distance").val();

                

      $.ajax({

                    method:'post',

                    url:'<?=base_url();?>search/by_distance',

                    data:{data:val},

                    

                    cache: false,

                    

                    success:function(response){

                        //console.log(response);

                        location.reload(true);

                        

                    }

                });

});



$(".by_rating").change(function(e) {

      e.preventDefault();

                var val=$(".by_rating").val();

                

      $.ajax({

                    method:'post',

                    url:'<?=base_url();?>search/by_rating',

                    data:{data:val},

                    

                    cache: false,

                    

                    success:function(response){

                        //console.log(response);

                        location.reload(true);

                        

                    }

                });

});







      $("#listreview_form").on('submit',function(e){

                e.preventDefault();

                var val=$("input[name=adsid2]").val();

                var formData = new FormData(this);

                formData.set('adsid', val);

                $.ajax({

                    method:'post',

                    url:'<?=base_url();?>adsview/post_review',

                    data:formData,

                    contentType: false,

                    cache: false,

                    processData:false,

                    beforeSend:function(){

                        $('.sub2').attr('disabled','disabled');

                        $('#listreview_form').css('opacity','.5');

                    },

                    success:function(response){

                        //console.log(response);

                        var html=response.trim();

                        if(html=='success'){

                             $('#listreview_form')[0].reset();

                             $('#myModal_listreview').modal('hide');

                         swal("Okay!", "Review successfully post", "success");

                     }else if(html=='fail'){

                         swal("Sorry!", "Review failed to post", "error");

                     }else if(html=='user'){

                         swal("Sorry!", "This is your ad , you cant do", "error");

                     }else{

                        swal("Sorry!", "Something went wrong", "error");

                     }



                          $('#listreview_form').css("opacity","");

                          $(".sub2").removeAttr("disabled");

                        

                    }

                });



            }); 



      





      var $star_rating = $('.star-rating .fa');



var SetRatingStar = function() {

  return $star_rating.each(function() {

    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {

      return $(this).removeClass('fa-star-o').addClass('fa-star');

    } else {

      return $(this).removeClass('fa-star').addClass('fa-star-o');

    }

  });

};



$star_rating.on('click', function() {

  $star_rating.siblings('input.rating-value').val($(this).data('rating'));

  return SetRatingStar();

});



SetRatingStar();



    });



  



    function quote_model(val){

      $('#adsid').val(val);

      $('#myModal_listquote').modal('show');

    }

    function review_model(val){

      //alert(val);

      $('#adsid2').val(val);

      $('#myModal_listreview').modal('show');

    }

   function log_alert(){

      swal("Sorry!", "Please login first", "error");

    }

    function own_post(){

      swal("Sorry!", "Posted by you", "error");

    }



    function post_favourite(val,val2){

$.ajax({

                    method:'post',

                    url:'<?=base_url();?>adsview/post_favourite',

                    data:{fv_adsid:val},

                    cache:false,

                    success:function(response){

                        //alert(1);

                        //console.log(response);

                         var html=response.trim();

                        if(html=='success'){

                             

                         swal("Okay!", "Added successfully", "success");

                          $('.fav_cls'+val2).addClass("fav_act");

                     }else if(html=='fail'){

                         swal("Sorry!", "Failed to add", "error");

                     }else if(html=='del'){

                             

                         swal("Okay!", "Removed successfully", "success");

                          $('.fav_cls'+val2).removeClass("fav_act");

                     }else{

                        swal("Sorry!", "Something went wrong", "error");

                     }



                      

                            }

                });

  }

  

</script>

<script type="text/javascript">



(function($){ 

  $.fn.loaddata = function(options) {// Settings

    var settings = $.extend({ 

      loading_gif_url : "<?=base_url();?>assets_front/images/ajax-loader.gif", //url to loading gif

      end_record_text : 'No more records found!', //end of record text

      loadbutton_text : 'Load More Contents!', //load button text

      data_url    : '<?=base_url();?>/search/result1', //url to PHP page

      start_page    : 1 //initial page

    }, options);

    

    var el = this;  

    loading  = false; 

    end_record = false;   

    

    //initialize load button

    var load_more_btn = $('<button/>').text(settings.loadbutton_text).addClass('load-button').click(function(e){ 

      contents(el, this, settings); //load data on click

    });

    

    contents(el, load_more_btn, settings); //initial data load  

  }; 

  

  //Ajax load function

  function contents(el, load_btn,  settings){

    var load_img = $('<img/>').attr('src',settings.loading_gif_url).addClass('loading-image'); //loading image

    var record_end_txt = $('<div/>').text(settings.end_record_text).addClass('end-record-info'); //end record text

      

    if(loading == false && end_record == false){

      loading = true; //set loading flag on

      el.append(load_img); //append loading image

      

      //temporarily remove button on click

      if(load_btn.type === 'submit' || load_btn.type === 'click'){

        load_btn.remove(); //remove loading img

      }

      

      $.post( settings.data_url, {'page': settings.start_page,' ':<?php if($module){echo $module;}else{echo"'not'";}?>,'sub_module':<?php if($sub_module){echo $sub_module;}else{echo"'not'";}?>,'looking_for':<?php if($looking_for){echo "'".$looking_for."'";}else{echo"'not'";}?>}, function(data){ //jQuery Ajax post

        if(data.trim().length == 0){ //if no more records

          el.append(record_end_txt); //show end record text

          load_img.remove(); //remove loading img

          load_btn.remove(); //remove load button

          end_record = true; //set end record flag on

          return; //exit

        }

        loading = false;  //set loading flag off

        load_img.remove(); //remove loading img 

        el.append(data).append(load_btn);  //append content and button

        settings.start_page ++; //page increment

      })

    }

  }



})(jQuery);



$("#results").loaddata();

</script>







<script type="text/javascript">  

$('input').popup(); 

</script>



<script type="text/javascript">

          $(document).ready(function(){



          $('.select2').select2();



    //Initialize Select2 Elements

    $('.select2bs4').select2({

      theme: 'bootstrap4'

    })



    //$("#internationalCountry").hide();

showCountry();



})



              function showCountry(){





      var travelType = $('#travelType').val();







      if(travelType=='International'){

      $("#internationalCountry").show();

    }else{

      $("#internationalCountry").hide();

    }



    }

</script>




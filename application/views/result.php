<style type="text/css">
.star-rating {
  line-height: 32px;
  font-size: 1.25em;
  cursor: pointer;
}
.star-rating .fa-star {
  color: #e53935;
}
.star-rating span.fa-star.hover > .star-rating .fa-star {
  color: #FFCC36; 
}
.sort_byone {
  margin-top: 15px;
  position: relative;
  width: 100%;
  z-index: 4;
}
.sort_bytwo {
  margin-top: 15px;
  position: relative;
  width: 100%;
  z-index: 3;
}
.sort_byone label, .sort_bytwo label {
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
.fav_act {
  background: #e53935;
  border-color: #e53935 !important;
  color: #fff !important;
}
.end-record-info {
  text-align: center;
  color: chocolate;
  font-size: 19px;
  font-weight: 600;
}
</style>
<style>
/* The container */

.tm_container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 19px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  float: left;
  line-height: 27px;
  margin-right: 10px;
}
/* Hide the browser's default radio button */
.tm_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}
/* On mouse-over, add a grey background color */
.tm_container:hover input ~ .checkmark {
  background-color: #ccc;
}
/* When the radio button is checked, add a blue background */
.tm_container input:checked ~ .checkmark {
  background-color: #2196F3;
}
/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
/* Show the indicator (dot/circle) when checked */
.tm_container input:checked ~ .checkmark:after {
  display: block;
}
/* Style the indicator (dot/circle) */
.tm_container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
.cusTable td, .cusTable th {
    padding: .4rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.form-control {
  height: 40px !important;
  }
  .aside_box .search_btn_down {
    height: 40px !important;
}
</style>
<div class="banner_area inner_banner text-center" style="background-image:url(<?=base_url();?>assets_front/images/bannerimg.jpg);"> </div>
<!-- banner css stop --> 
<!-- main_area css Start -->
<div class="main_area" style="background-image:url(<?=base_url();?>assets_front/images/main_bg.jpg);">
  <div class="container-fluid">
    <div class="main_area_innerbox">
      <div class="row">
        <div class="col-lg-2">
          <?php 
          $user_data=$this->General_model->show_data_id('user_table',$this->session->userdata('front_sess')['userid'],'id','get','');
          if($myproduct==''){?>
          
           
              <div class="card_refine">
                <?php
                         //$originalArray =json_decode(json_encode($product), true);
                   
                         
                         ?>
                <h3>REFINE BY</h3>
                <div class="card">

                  <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Distance (Km)</h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('distance')){echo"show";}?>" id="collapse_5" style="">
                       <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="distance"  value="clear" onclick="this.form.submit()">
                            <label class="form-check-label" for="distance<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          
                           <div class="form-check_info">
                            <input name="distance" <?php if($this->session->userdata('distance')=='5'){echo "checked";} ?> class="form-check-input" type="radio"  id="distance" onclick="this.form.submit()"  value="5">
                            <label class="form-check-label" for="distance"> &nbsp;&nbsp;Below 5</label>
                          </div>
                           <div class="form-check_info">
                            <input name="distance" <?php if($this->session->userdata('distance')=='10'){echo "checked";} ?> class="form-check-input" type="radio"  id="distance" onclick="this.form.submit()"  value="10">
                            <label class="form-check-label" for="distance"> &nbsp;&nbsp;Below 10 </label>
                          </div>
                          <div class="form-check_info">
                            <input name="distance" <?php if($this->session->userdata('distance')=='20'){echo "checked";} ?> class="form-check-input" type="radio"  id="distance" onclick="this.form.submit()"  value="20">
                            <label class="form-check-label" for="distance"> &nbsp;&nbsp;Below 20</label>
                          </div>
                           <div class="form-check_info">
                            <input name="distance" <?php if($this->session->userdata('distance')=='30'){echo "checked";} ?> class="form-check-input" type="radio"  id="distance" onclick="this.form.submit()"  value="30">
                            <label class="form-check-label" for="distance"> &nbsp;&nbsp;Below 30</label>
                          </div>
                          <div class="form-check_info">
                            <input name="distance" <?php if($this->session->userdata('distance')=='50'){echo "checked";} ?> class="form-check-input" type="radio"  id="distance" onclick="this.form.submit()"  value="50">
                            <label class="form-check-label" for="distance"> &nbsp;&nbsp;Below 50</label>
                          </div>
                            <div class="form-check_info">
                            <input name="distance" <?php if($this->session->userdata('distance')=='51'){echo "checked";} ?> class="form-check-input" type="radio"  id="distance" onclick="this.form.submit()"  value="51">
                            <label class="form-check-label" for="distance"> &nbsp;&nbsp;Above 50</label>
                          </div>
                        
                        </div>
                        <!-- card-body.// --> 
                      </div>
                    </article>
                  </form>
                  <!-- filter-group .// -->
                   <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapseref_posted_by" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Posted By</h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('posted_by')){echo"show";}?>" id="collapseref_posted_by" style="">
                       <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="posted_by"  value="clear" onclick="this.form.submit()">
                            <label class="form-check-label" for="posted_by<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          
                           <div class="form-check_info">
                            <input name="posted_by" <?php if($this->session->userdata('posted_by')=='individual'){echo "checked";} ?> class="form-check-input" type="radio"  id="posted_by1" onclick="this.form.submit()"  value="individual">
                            <label class="form-check-label" for="posted_by1"> &nbsp;&nbsp;Individual</label>
                          </div>
                          <div class="form-check_info">
                            <input name="posted_by" <?php if($this->session->userdata('posted_by')=='agent'){echo "checked";} ?> class="form-check-input" type="radio"  id="posted_by2" onclick="this.form.submit()"  value="agent">
                            <label class="form-check-label" for="posted_by2"> &nbsp;&nbsp;Agent</label>
                          </div>
                          <div class="form-check_info">
                            <input name="posted_by" <?php if($this->session->userdata('posted_by')=='builder'){echo "checked";} ?> class="form-check-input" type="radio"  id="posted_by3" onclick="this.form.submit()"  value="builder">
                            <label class="form-check-label" for="posted_by3"> &nbsp;&nbsp;Builder</label>
                          </div>
                      
                        
                        </div>
                        <!-- card-body.// --> 
                      </div>
                    </article>
                  </form>
                  <!-- filter-group .// -->
                    <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Price Range </h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('price_range')){echo"show";}?>" id="collapse_3" style="">
                        
                        <!-- card-body.// --> 
                        <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="price_range"  value="clear" onclick="this.form.submit()">
                            <label class="form-check-label" for="exampleprovider<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          <p style="margin-top: 12px">Property Type : Rent</p>
                           <div class="form-check_info">
                            <input name="price_range" <?php if($this->session->userdata('price_range')=='0-1000'){echo "checked";} ?> class="form-check-input" type="radio"  id="price_range" onclick="this.form.submit()"  value="0-1000">
                            <label class="form-check-label" for="price_range"> &nbsp;&nbsp;0-1000</label>
                          </div>
                           <div class="form-check_info">
                            <input name="price_range" <?php if($this->session->userdata('price_range')=='1000-5000'){echo "checked";} ?> class="form-check-input" type="radio"  id="price_range" onclick="this.form.submit()"  value="1000-5000">
                            <label class="form-check-label" for="price_range"> &nbsp;&nbsp;1000-5000 </label>
                          </div>
                          <div class="form-check_info">
                            <input name="price_range" <?php if($this->session->userdata('price_range')=='5000-10000'){echo "checked";} ?> class="form-check-input" type="radio"  id="price_range" onclick="this.form.submit()"  value="5000-10000">
                            <label class="form-check-label" for="price_range"> &nbsp;&nbsp;5000-10000</label>
                          </div>
                           <div class="form-check_info">
                            <input name="price_range" <?php if($this->session->userdata('price_range')=='10001'){echo "checked";} ?> class="form-check-input" type="radio"  id="price_range" onclick="this.form.submit()"  value="10001">
                            <label class="form-check-label" for="price_range"> &nbsp;&nbsp;10000 +</label>
                          </div>
                        
                        </div>
                      </div>
                    </article>
                  </form>
                 <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" > <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Facing</h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('facing')){echo"show";}?> " id="collapse_1" >
                        <div class="card-body">
                          <label class="custom-control custom-checkbox">
                          <input type="checkbox" name="facing[]" class="custom-control-input" value="clear" onclick="this.form.submit()">
                          <div class="custom-control-label">Clear</div>
                          </label>
                          
                          <label class="custom-control custom-checkbox">
                          <input name="facing[]"  type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="east" <?php if (in_array('east', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label"> East
                             </div>
                          </label>
                          <label class="custom-control custom-checkbox">
                          <input name="facing[]" type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="west" <?php if (in_array('west', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label"> West
                             </div>
                          </label>
                           <label class="custom-control custom-checkbox">
                          <input name="facing[]"  type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="south" <?php if (in_array('south', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label"> South
                             </div>
                          </label>
                          <label class="custom-control custom-checkbox">
                          <input name="facing[]" type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="north" <?php if (in_array('north', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label"> North
                             </div>
                          </label>
                           <label class="custom-control custom-checkbox">
                          <input name="facing[]"  type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="north_west" <?php if (in_array('north_west', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label"> North-West
                             </div>
                          </label>
                          <label class="custom-control custom-checkbox">
                          <input name="facing[]" type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="north_east" <?php if (in_array('north_east', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label"> North-East
                             </div>
                          </label>
                           <label class="custom-control custom-checkbox">
                          <input name="facing[]"  type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="south_west" <?php if (in_array('south_west', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label">South-West 
                             </div>
                          </label>
                          <label class="custom-control custom-checkbox">
                          <input name="facing[]" type="checkbox" onclick="this.form.submit()" class="custom-control-input" value="south_east" <?php if (in_array('south_east', $this->session->userdata('facing'))){echo"checked";} ?>>
                          <div class="custom-control-label"> South-East
                             </div>
                          </label>



                          
                        </div>
                        <!-- card-body.// --> 
                      </div>
                    </article>
                    <!-- filter-group .// -->
                  </form>
                   <!-- filter-group .// -->
                  <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_7" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Gated</h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('gated')){echo"show";}?>" id="collapse_7" style="">
                         <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="gated"  value="clear" onclick="this.form.submit()">
                            <label class="form-check-label" for="gated<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          
                           <div class="form-check_info">
                            <input name="gated" <?php if($this->session->userdata('gated')=='1'){echo "checked";} ?> class="form-check-input" type="radio"  id="gated" onclick="this.form.submit()"  value="1">
                            <label class="form-check-label" for="gated"> &nbsp;&nbsp;Yes</label>
                          </div>
                           <div class="form-check_info">
                            <input name="gated" <?php if($this->session->userdata('gated')=='2'){echo "checked";} ?> class="form-check-input" type="radio"  id="gated" onclick="this.form.submit()"  value="2">
                            <label class="form-check-label" for="gated"> &nbsp;&nbsp;No </label>
                          </div>
                         <!--  <div class="form-check_info">
                            <input name="gated" <?php if($this->session->userdata('gated')=='3'){echo "checked";} ?> class="form-check-input" type="radio"  id="gated" onclick="this.form.submit()"  value="3">
                            <label class="form-check-label" for="gated"> &nbsp;&nbsp;Both</label>
                          </div> -->
                           
                        
                        </div>
                        <!-- card-body.// --> 
                      </div>
                    </article>
                  </form>
                     <!-- filter-group .// -->
                   <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_6" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Corner</h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('corner')){echo"show";}?>" id="collapse_6" style="">
                         <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="corner"  value="clear" onclick="this.form.submit()">
                            <label class="form-check-label" for="corner<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          
                           <div class="form-check_info">
                            <input name="corner" <?php if($this->session->userdata('corner')=='1'){echo "checked";} ?> class="form-check-input" type="radio"  id="corner" onclick="this.form.submit()"  value="1">
                            <label class="form-check-label" for="corner"> &nbsp;&nbsp;Yes</label>
                          </div>
                           <div class="form-check_info">
                            <input name="corner" <?php if($this->session->userdata('corner')=='2'){echo "checked";} ?> class="form-check-input" type="radio"  id="corner" onclick="this.form.submit()"  value="2">
                            <label class="form-check-label" for="corner"> &nbsp;&nbsp;No </label>
                          </div>
                          <!-- <div class="form-check_info">
                            <input name="corner" <?php if($this->session->userdata('corner')=='3'){echo "checked";} ?> class="form-check-input" type="radio"  id="corner" onclick="this.form.submit()"  value="3">
                            <label class="form-check-label" for="corner"> &nbsp;&nbsp;Both</label>
                          </div> -->
                           
                        
                        </div>
                        <!-- card-body.// --> 
                      </div>
                    </article>
                  </form>
                  <!-- filter-group .// -->
                    
                  <!-- filter-group .// -->
                    <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Bedrooms </h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('bedroom')){echo"show";}?>" id="collapse_2" style="">
                         <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="bedroom"  value="clear" onclick="this.form.submit()">
                            <label class="form-check-label" for="bedroom<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          
                          <!--  <div class="form-check_info">
                            <input name="bedroom" <?php if($this->session->userdata('bedroom')=='1'){echo "checked";} ?> class="form-check-input" type="radio"  id="bedroom" onclick="this.form.submit()"  value="1">
                            <label class="form-check-label" for="bedroom"> &nbsp;&nbsp;1</label>
                          </div> -->
                           <div class="form-check_info">
                            <input name="bedroom" <?php if($this->session->userdata('bedroom')=='2'){echo "checked";} ?> class="form-check-input" type="radio"  id="bedroom" onclick="this.form.submit()"  value="2">
                            <label class="form-check-label" for="bedroom"> &nbsp;&nbsp;Below 2 </label>
                          </div>
                          <div class="form-check_info">
                            <input name="bedroom" <?php if($this->session->userdata('bedroom')=='3'){echo "checked";} ?> class="form-check-input" type="radio"  id="bedroom" onclick="this.form.submit()"  value="3">
                            <label class="form-check-label" for="bedroom"> &nbsp;&nbsp;Below 3</label>
                          </div>
                           <div class="form-check_info">
                            <input name="bedroom" <?php if($this->session->userdata('bedroom')=='4'){echo "checked";} ?> class="form-check-input" type="radio"  id="bedroom" onclick="this.form.submit()"  value="4">
                            <label class="form-check-label" for="bedroom"> &nbsp;&nbsp;Below 4</label>
                          </div>
                          <div class="form-check_info">
                            <input name="bedroom" <?php if($this->session->userdata('bedroom')=='5'){echo "checked";} ?> class="form-check-input" type="radio"  id="bedroom" onclick="this.form.submit()"  value="5">
                            <label class="form-check-label" for="bedroom"> &nbsp;&nbsp;Below 5</label>
                          </div>
                        
                        </div>
                        <!-- card-body.// --> 
                      </div>
                    </article>
                  </form>
                  <!-- filter-group .// -->
                  
               
                  
                  <!-- filter-group .// -->
                   <form method="post" action="<?=base_url('search/refineby_search');?>">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class=""> <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Need Agents</h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('agent_assistent')){echo"show";}?>" id="collapse_4" style="">
                         <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="agent_assistent"  value="clear" onclick="this.form.submit()">
                            <label class="form-check-label" for="agent_assistent<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          
                           <div class="form-check_info">
                            <input name="agent_assistent" <?php if($this->session->userdata('agent_assistent')=='1'){echo "checked";} ?> class="form-check-input" type="radio"  id="agent_assistent" onclick="this.form.submit()"  value="1">
                            <label class="form-check-label" for="agent_assistent"> &nbsp;&nbsp;Yes</label>
                          </div>
                           <div class="form-check_info">
                            <input name="agent_assistent" <?php if($this->session->userdata('agent_assistent')=='2'){echo "checked";} ?> class="form-check-input" type="radio"  id="agent_assistent" onclick="this.form.submit()"  value="2">
                            <label class="form-check-label" for="agent_assistent"> &nbsp;&nbsp;No </label>
                          </div>
                         <!--  <div class="form-check_info">
                            <input name="agent_assistent" <?php if($this->session->userdata('agent_assistent')=='3'){echo "checked";} ?> class="form-check-input" type="radio"  id="agent_assistent" onclick="this.form.submit()"  value="3">
                            <label class="form-check-label" for="agent_assistent"> &nbsp;&nbsp;Both</label>
                          </div> -->
                           
                        
                        </div>
                        <!-- card-body.// --> 
                      </div>
                    </article>
                  </form>
                  <!-- filter-group .// -->
                  
                   
                  
                  <!-- filter-group .// --> 
                </div>
                <!-- card.// --> 
              </div>
              <div class="card_refine">
                <h3>SORT BY</h3>
                <div class="card">
                  <form method="post" action="<?=base_url();?>search/sortby_search">
                    <article class="filter-group">
                      <header class="card-header"> <a href="#" data-toggle="collapse" data-target="#collapse_01" aria-expanded="true" > <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title">Choose</h6>
                        </a> </header>
                      <div class="filter-content collapse <?php if($this->session->userdata('sort_by_session')){echo"show";}?> " id="collapse_01" >
                        <div class="form-check">
                          <div class="form-check_info">
                            <input class="form-check-input" type="radio" name="sort_by"  value="" onclick="this.form.submit()"> 
                            <label class="form-check-label" for="exampleprovider<?php echo $count; ?>"> &nbsp;&nbsp;Clear </label>
                          </div>
                          
                           <div class="form-check_info">
                            <input name="sort_by" <?php if($this->session->userdata('sort_by_session')=='price'){echo "checked";} ?> class="form-check-input" type="radio"  id="sort_by" onclick="this.form.submit()"  value="price">
                            <label class="form-check-label" for="sort_by"> &nbsp;&nbsp;Price</label>
                          </div>
                           <div class="form-check_info">
                            <input name="sort_by" <?php if($this->session->userdata('sort_by_session')=='post_date'){echo "checked";} ?> class="form-check-input" type="radio"  id="sort_by" onclick="this.form.submit()"  value="post_date">
                            <label class="form-check-label" for="sort_by"> &nbsp;&nbsp;Posting date</label>
                          </div>
                          <div class="form-check_info">
                            <input name="sort_by" <?php if($this->session->userdata('sort_by_session')=='distance'){echo "checked";} ?> class="form-check-input" type="radio"  id="sort_by" onclick="this.form.submit()"  value="distance">
                            <label class="form-check-label" for="sort_by"> &nbsp;&nbsp;Distance</label>
                          </div>
                          
                        
                        </div>
                      </div>
                    </article>
                  </form>
                  
                  <!-- filter-group .// --> 
                  
                  <!-- filter-group .// --> 
                </div>
                <!-- card.// --> 
              </div>
            
          
          <?php }?>
        </div>
        
        <div class="col-lg-7">
          <div class="fixed_search_area">
            <div class="search_area_bg">
              <aside class="aside_area">
                <div class="aside_innerarea">
                  <div class="aside_box">
                     <form method="post" action="<?=base_url();?>search/result_view">
                    <div style="padding: 10px 5px;">
                      <label class="tm_container" >All
                        <input type="radio" <?php if($this->session->userdata('result_view')==''){echo "checked";} ?> name="result_view" value="" onclick="this.form.submit()">
                        <span class="checkmark"></span> </label>
                      <?php if($this->session->userdata('front_sess')['userid']){?> <?php }?>
                      <label class="tm_container">My Favourites
                        <input type="radio" name="result_view" value="my_fav" <?php if($this->session->userdata('result_view')=='my_fav'){echo "checked";} ?> onclick="this.form.submit()">
                        <span class="checkmark"></span>  </label>
                      <label class="tm_container">My Viewed
                        <input type="radio" name="result_view" value="my_view" <?php if($this->session->userdata('result_view')=='my_view'){echo "checked";} ?> onclick="this.form.submit()">
                        <span class="checkmark"></span> </label>
                      <label class="tm_container">Others Favourite
                        <input type="radio" name="result_view" value="other_fav" <?php if($this->session->userdata('result_view')=='other_fav'){echo "checked";} ?> onclick="this.form.submit()">
                        <span class="checkmark"></span> </label>
                     
                    </div>
                  </form>
                    <?php if($this->session->userdata('result_view')==''){?>
                    <form method="post" action="<?php echo base_url(); ?>search/main_search">
                      <div class="row search_area">
                        <div class="col-md-4 text-center btn_drp_area">
                          <div class="form-group">
                            <select name="property_for" class="form-control_btn1 select2 form-control input-sm"  id="property_for">
                              <option value="">Property for</option>
                              <option <?php if($this->session->userdata('property_for')=='rent'){echo"selected";}?> value="<?=base64_encode('rent');?>">Rent</option>
                                <option <?php if($this->session->userdata('property_for')=='sale'){echo"selected";}?> value="<?=base64_encode('sale');?>">Sale</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4 text-center btn_drp_area ">
                          <div class="form-group">
                            <select name="property_type" class="form-control_btn1 select2 form-control input-sm"  id="property_type">
                              <option value="">Property type</option>
                              <option <?php if($this->session->userdata('property_type')=='plot'){echo"selected";}?> value="<?=base64_encode('plot');?>">Plot</option>
                             <option  <?php if($this->session->userdata('property_type')=='apartment_flat'){echo"selected";}?> value="<?=base64_encode('apartment_flat');?>">Apartment/Flat</option>
                             <option  <?php if($this->session->userdata('property_type')=='house_villa'){echo"selected";}?> value="<?=base64_encode('house_villa');?>">House/Villa</option>
                             <option  <?php if($this->session->userdata('property_type')=='farm_agriculture'){echo"selected";}?> value="<?=base64_encode('farm_agriculture');?>">Farm/Agriculture land</option>
                             <option  <?php if($this->session->userdata('property_type')=='commercial'){echo"selected";}?> value="<?=base64_encode('commercial');?>">Commercial space</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4 text-center btn_drp_area ">
                          <div class="form-group">
                            <select name="property_category" class="form-control_btn1 select2 form-control input-sm"  id="property_category">
                              <option  value="">Property category</option>
                              <option  <?php if($this->session->userdata('property_category')=='individual'){echo"selected";}?> value="<?=base64_encode('individual');?>">Individual</option>
                              <option  <?php if($this->session->userdata('property_category')=='project'){echo"selected";}?> value="<?=base64_encode('project');?>">Project</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row row search_area">
                        <div class="col-md-4">
                          <div class="form-group">
                            <select name="location_type" class="form-control_btn1 select2 form-control input-sm"  id="location_type">
                              <option value="current">Current Location</option>
                              <option <?php if($this->session->userdata('location_type')=='address_saved'){echo"selected";}?> value="<?='address_saved';?>">Address Saved</option>
                              <option <?php if($this->session->userdata('location_type')=='lat_long'){echo"selected";}?> value="<?='lat_long';?>">Enter Lat Long</option>
                              <option <?php if($this->session->userdata('location_type')=='loc_pincode'){echo"selected";}?> value="<?='loc_pincode';?>">Enter Pincode</option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="col-md-4 address_saved" style=" display: <?php if($this->session->userdata('location_type')=='address_saved'){echo"";}else{echo"none";}?>;">
                          <div class="form-group">
                            <select name="address_list" class="form-control_btn1 select2 form-control input-sm"  id="address_list">
                              <option value="">Address list</option>
                              <?php
                              foreach ($address_list as $key => $value) {?>           
                                 <option <?php if($this->session->userdata('address_list')==$value->slt_id){echo"selected";}?> value="<?=$value->slt_id;?>"><?=$value->slt_location;?></option>                  
                             <?php  }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3 enter_latlong" style="display: <?php if($this->session->userdata('location_type')=='lat_long'){echo"";}else{echo"none";}?>;">
                          <div class="form-group">
                            <input type="text" name="latitude" class="form-control form-control_btn1 "  id="latitude" placeholder="Enter latitude" value="<?=$this->session->userdata('latitude');?>">
                             
                          </div>
                        </div>
                        <div class="col-md-3 enter_latlong" style="display: <?php if($this->session->userdata('location_type')=='lat_long'){echo"";}else{echo"none";}?>;">
                          <div class="form-group">
                             <input type="text" name="longitude" class="form-control input-sm"  id="longitude" placeholder="Enter longitude " value="<?=$this->session->userdata('longitude');?>">
                          </div>
                        </div>
                        <div class="col-md-4 enter_pincode" style="display: <?php if($this->session->userdata('location_type')=='loc_pincode'){echo"";}else{echo"none";}?>;">
                          <div class="form-group">
                           <input type="text" name="pincode" class="form-control numeric_input"  id="pincode" placeholder="Enter pincode " value="<?=$this->session->userdata('pincode');?>" maxlength="6">
                          </div>
                        </div>
                        <div class="col-md-2 text-center">
                          <button type="submit" class="search_btn_down" style="width: auto !important;">SEARCH</button>
                        </div>
                        <div class="col-md-4 text-center">
                          <label style="line-height: 2">Search Valid  till : <?=date('d-m-Y',strtotime($user_data[0]->search_validity));?></label>
                        </div>
                        <div class="col-md-8 text-center">
                          <label style="line-height: 2"><a target="_blank" href="<?=base_url('payment');?>" >Go to PAYMENT page to extend search validity</a> </label>
                        </div>
                      </div> 
                    </form>
                    <?php }else{?>
                    <form>
                      <div class="row search_area">
                        <div class="col-md-6">
                          <div class="box">
                            <input type="text" name="title" id="looking_for" class="form-search" placeholder="Search Word Bar">
                          </div>
                        </div>
                      </div>
                    </form>
                    <?php }?>
                  </div>
                </div>
              </aside>
            </div>
          </div>
          <?php 
                  $i=0;
                  foreach ($product as  $value) { 
                  $i++;
                    ?>
         
          <aside class="aside_area">
            <div class="row product_add_area">
              <div class="col-md-3">
                <?php
                    if($user_data[0]->search_validity>=date('Y-m-d')){

                    ?>
                <a href="/adsview/dataview?ads=<?=base64_encode($value->ppt_id);?>">
                <img src="<?php echo base_url('uploads/module_file/').$value->ppt_main_img; ?>">
               </a>
             <?php }else{?>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#extendsearch">
                <img src="<?php echo base_url('uploads/module_file/').$value->ppt_main_img; ?>">
               </a>
               <div class="modal fade" id="extendsearch" role="dialog">
                    <div class="modal-dialog"> 
                      <!-- Modal content-->
                      <div class="modal-content modal-content_read">
                        <div class="container model_read_more text-center">
                          <p class="" style="color: #fff">Extend your Search Validity in PAYMENT Page</p>
                        </div>
                        <div class="modal-footer modal-footer_read"> <a style="color:#ffffff;" href="<?=base_url('payment')?>" target="_blank" class="btn btn-default extendsearchcls"  ><i class="fa fa-arrow-right" aria-hidden="true"></i> Payment page</a>
                          <button type="button" class="btn btn_mlode_close_read fl-right" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
           <?php }?>
              </div>
              <div class="col-md-9 pr-2">
                <div class="row">
                  <div class="col-md-12">
                    <?php
                    if($user_data[0]->search_validity>=date('Y-m-d')){

                    ?>
                    <ul class="shere_list_area">
                      <li>
                        <input type="hidden" value="<?=base_url();?>?product=<?php //echo $value->product_id; ?>" id="p<?php //echo $i; ?>" name="">
                        <?php 
$ip = $this->input->ip_address();

?>
                        <button class="copy_link" onclick="copyToClipboard('#p<?php echo $i; ?>','<?php echo $value->ppt_id; ?>')">Copy Link</button>
                        
                       
                      </li>
                      
                      <!-- <li><a href="https://api.whatsapp.com/send?text=<?php echo urlencode($value->seller_link); ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li> -->
                      <?php

$count=0;

?>
                      <li><a href="https://api.whatsapp.com/send?text=<?=base_url();?>?product=<?php echo $value->ppt_id; ?>" target="_blank" onclick="social_share_count('<?php //echo $value->product_id; ?>')"><i style="color:#424344;" class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                      
                      
                      <!-- <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($value->seller_link); ?>&t=<?php echo $value->product; ?>" target="_blank"  ><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li> -->
                      
                      <?php

$count=0;

?>
                      <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?=base_url();?>?product=<?php echo $value->ppt_id; ?>" target="_blank" onclick="social_share_count1('<?php //echo $value->product_id; ?>')" ><i style="color:#424344;" class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                     
                      
                      
                      <!--                                  <li><a title="Add to wishlist" href="javascript:void(0)" onclick="add_wish('<?php //echo $value->product_id; ?>');">
                                    
                                   
                                 </li> -->
                      <?php
                                       $count = 0;
                                       if($this->session->userdata('front_sess')['userid']==$value->fv_userid){
                                       ?>
                      <li><a style="color: #e53935; cursor: pointer;" title="Delete wishlist" onclick="add_wish('<?php echo $value->ppt_id; ?>');"> <i class="fa fa-heart" aria-hidden="true"></i> </a> </li>
                      <?php }else{ ?>
                        <li><a title="Add to wishlist" href="javascript:void(0)" onclick="add_wish('<?php echo $value->ppt_id; ?>');"> <i class="fa fa-heart-o" aria-hidden="true"></i> </a> </li>
                      <?php } ?>

                      
                     


 <?php if($this->session->userdata('check_guest')==1){ ?>  
 <li><a title="You have to register" href="#" > <i class="fa fa-comment" aria-hidden="true"></i> </a> </li>                   
                      
<?php }else{ ?>
 <li title="Comment about Error
                                    "><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-comment" aria-hidden="true"></i></a></li>

<?php } ?>



                     
                    </ul>
                  <?php }?>
                  </div>
                </div>
                <div class="row pmore">
                  <div class="col-md-12 pr-1">
                    <p><?php
                    $chrcount=strlen($value->ppt_title);
                     
                     if($chrcount>65){ echo substr($value->ppt_title, 0, 65);?>
                     
                      ...<a style="color:red;" href="#" data-toggle="modal" data-target="#myModaltitle">read more</a>
                    <?php }else{
                      echo $value->ppt_title;
                     }?>
                    </p>
                  </div>
                 <div class="modal fade" id="myModaltitle" role="dialog">
                    <div class="modal-dialog"> 
                      <!-- Modal content-->
                      <div class="modal-content modal-content_read">
                        <div class="container model_read_more text-center">
                          <p class="" style="color: #fff"><?php echo $value->ppt_title; ?></p>
                        </div>
                        <div class="modal-footer modal-footer_read"> <!-- <a style="color:#ffffff;" href="<?php echo $value->ppt_title; ?>" target="_blank" class="btn btn-default" ><i class="fa fa-arrow-right" aria-hidden="true"></i> Product Link</a> -->
                          <button type="button" class="btn btn_mlode_close_read fl-right" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row parea">
                    <div class="col-md-12 pr-1">
                      <table class="as shadow" border="1">
                        <tr class="look">
                          <td><strong>Type</strong><br>
                           <?php echo str_replace('_', ' ', $value->ppt_property_type); ?>
                            </td>
                          <td>


                            <strong>Property For</strong><br>
                            <?php echo $value->ppt_property_for; ?>
                           </td>

                          <td><strong>Category</strong><br>
                            <?php echo $value->ppt_property_category; ?>
                           </td>
                          <td><strong>Posting Date</strong><br>
                            <?php echo $value->ppt_createdAt; ?>
                            <!-- <p><?php echo $value->ppt_createdAt; ?></p> --></td>
                          <!-- <td><strong>Posting Date</strong><br> -->
                            <?php //echo $value->posting_date; ?>
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --><!-- </td> -->
                        </tr>
                        <tr>
                          <td><strong>Distance </strong><br>
                          
                                         
                                      <?php

                                 $dis=round($value->distance,2);

                                 if($dis>1){

                                  echo $dis." km";

                                 }else{

                                  echo ($dis*1000)." m";

                                 }

                                 ?> </td>
                          <td><strong>Posted By</strong><br>
                            <?php
                                             echo ucfirst($value->user_type);
                                             
                                             ?> 
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                          <td><strong>Facing </strong><br>
                            <?php echo $value->ppt_facing; ?>
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                          <td><strong>Price</strong><br>
                            <?php echo $value->ppt_total_price; ?>
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                         <!--  <td><strong>Details</strong><br>
                           
                            <a href="<?php //echo $value->seller_product_link; ?>"
   onclick="window.open(this.href,'targetWindow',
                                   `toolbar=no,
                                    location=no,
                                    status=no,
                                    menubar=no,
                                    scrollbars=yes,
                                    resizable=yes,
                                    width=SomeSize,
                                    height=SomeSize`);
 return false;"><i class="fa fa-eye" aria-hidden="true"></i></a> -->

                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --><!-- </td> -->
                        </tr>
                        <tr class="look">
                          <td><strong>Gated</strong><br>
                            <?php echo $value->ppt_gated==1?'Yes':'No'; ?>
                            </td>
                          <td><strong>Corner</strong><br>
                           <?php echo $value->ppt_corner==1?'Yes':'No'; ?>
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                          <td><strong>Views</strong><br>
                            1
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                          <td><strong>Fav Count</strong><br>
                            
                          2
                          
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                         <!--  <td><strong>Reviews</strong><br>
                            1 -->
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --><!-- </td> -->
                        </tr>
                        <tr class="look">
                          <td><strong>Bedrooms</strong><br>
                            <?php echo $value->ppt_bedroom_count; ?>
                            </td>
                          <td><strong>Available From</strong><br>
                           <?php echo $value->ppt_available_from; ?>
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                          <td><strong>Agent Assistance</strong><br>
                             <?php echo $value->ppt_broker_need==1?'Yes':'No'; ?>
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                          <td><strong>Pincode</strong><br>
                            
                         <?php echo $value->ppt_pincode; ?>
                          
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --></td>
                         <!--  <td><strong>Reviews</strong><br>
                            1 -->
                            <!-- <p>It is a long established fact that a reader will be distracted by the readable content.</p> --><!-- </td> -->
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </aside>
          <?php }  ?>
          <br>
          <br>
          <br>
          <div class="pagination"> <?php echo $page_link; ?> </div>
        </div>
        <div class="col-lg-3">
          
           
                      <table class="as1 shadow cusTable" border="1">
                        <tr class="look">
                          <th>Distance
                          
                            </th>
                          <th>Agent Id
                            
                           </th>

                          <th>Property Count
                          
                           </th>
                          
                           
                        </tr>
                         <?php 
                  $i=0;
                  foreach ($agent_list as  $value) { 
                  $i++;
                    ?>
                        <tr>
        <td> <?php

                                 $dis=round($value->distance,2);

                                 if($dis>1){

                                  echo $dis." km";

                                 }else{

                                  echo ($dis*1000)." m";

                                 }

                                 ?></td>
        
        <td><a href="<?=base_url();?>search/user_details?user=<?=base64_encode($value->id);?>" title="Click here to view details" target="_blank"> <?php echo $value->id; ?> </a></td>
        <td><?php echo $value->agent_ppt_tag_cnt; ?></td>
      </tr>
<?php }?>
                      </table>
                   


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
                  <div class="star-rating"> <span class="fa fa-star-o" data-rating="1"></span> <span class="fa fa-star-o" data-rating="2"></span> <span class="fa fa-star-o" data-rating="3"></span> <span class="fa fa-star-o" data-rating="4"></span> <span class="fa fa-star-o" data-rating="5"></span>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script type="text/javascript">
   $(document).ready(function(){
$('.extendsearchcls').click(function() {
    $('#extendsearch').modal('hide');
});
$('#location_type').change(function(){
var location_type= $('#location_type').val();

if(location_type=='address_saved' ){ 
$('.address_saved').show();
$('.enter_latlong').hide();
$('.enter_pincode').hide();
$('#latitude').val('');
$('#longitude').val('');
$('#pincode').val('');
}else if(location_type=='lat_long'){
  $('.enter_latlong').show();
$('.address_saved').hide();
$('.enter_pincode').hide();
$('#pincode').val('');
$('#address_list').val('');
}else if(location_type=='loc_pincode'){
  $('.enter_pincode').show();
$('.address_saved').hide();
$('.enter_latlong').hide();
$('#latitude').val('');
$('#longitude').val('');

$('#address_list').val('');
}else if(location_type=='current'){
  $('.enter_pincode').hide();
  $('.enter_latlong').hide();
$('.address_saved').hide();
$('#latitude').val('');
$('#longitude').val('');
$('#pincode').val('');
$('#address_list').val('');
 if ("geolocation" in navigator){
       navigator.geolocation.getCurrentPosition(function(position){ 
           var lat=position.coords.latitude;
   var long=position.coords.longitude;
   //console.log(long);
   $.ajax({
                   type:"post",
                   url:'<?=base_url();?>search/get_current_loc',
                   data:{location_type:location_type,lat:lat,long:long},
                   cache:false,
                  //dataType: 'json',
                  success:function(response){
          //$('#locationTextField').val(response);
      //console.log(position);
             }
   
             });
         });
     }else { 
    alert("Geolocation is not supported by this browser.");
   }
}else{
  $('.enter_pincode').hide();
  $('.enter_latlong').hide();
$('.address_saved').hide();
$('#latitude').val('');
$('#longitude').val('');
$('#pincode').val('');
$('#address_list').val('');
}

});

   $("#looking_for").on("keyup", function() {
  //console.log('1');
    var value = $(this).val().toLowerCase();
    $(".product_add_area").filter(function() {
     
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
         
         $.post( settings.data_url, {'page': settings.start_page,'module':<?php if($module){echo $module;}else{echo"'not'";}?>,'sub_module':<?php if($sub_module){echo $sub_module;}else{echo"'not'";}?>,'looking_for':<?php if($looking_for){echo "'".$looking_for."'";}else{echo"'not'";}?>}, function(data){ //jQuery Ajax post
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
   
   
   
   function add_cart(id,name,price,image){
   
     var product_id        = id;
   
     var product_name      = name;
   
     var product_price     = price;
   
     var product_img       = image;
   
     var quantity          = 1;
   
   
   
        $.ajax({
       url:"<?php echo base_url(); ?>search/add_variable",
       method:"POST",
       data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity,product_img:product_img},
       success:function(data)
       {
           //alert(data);
           //console.log(data);
           //alert("Data added in cart");
        //     window.location.reload();
        // swal("Okay!", "Add to cart Successfully", "success");
        // $('.cart_item').html(data);

         console.log(data);
           var html=data.trim();
           
           $(".add_wish").css({'background': '#c12b51','border-color': '#c12b51','color': '#fff'});
        swal("Okay!", "Add to cart Successfully", "success").then(function(){
    location.reload();
});
        
   
   
   
   
       
       }
      });
   
     }
   
   
   function add_wish(product){
    
   
     if('<?php echo $this->session->userdata('front_sess')['userid']; ?>'){
     //var product_id = product;
     var val=product;
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>search/post_favourite',
                    data:{fv_adsid:val},
                    cache:false,
                    success:function(response){
                        //alert(1);
                       // console.log(response);
                         var html=response.trim();
                        if(html=='success'){
                             
                         swal("Okay!", "Added successfully", "success");
                          $('.favourite').addClass("btn_orange");
                          location.reload();
                     }else if(html=='fail'){
                         swal("Sorry!", "Failed to add", "error");
                     }else if(html=='del'){
                             
                         swal("Okay!", "Removed successfully", "success");
                          $('.favourite').removeClass("btn_orange");
                          location.reload();
                     }else{
                        swal("Sorry!", "Something went wrong", "error");
                     }

                      
                            }
                });
   
   }else{
      window.location.href = "<?=base_url();?>login";
   
           }
   }

function copyToClipboard(element,pid) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).val()).select();
  document.execCommand("copy");
  $temp.remove();

  //alert(pid);

 // window.location.href = "<?=base_url();?>share/copyLink/"+pid;
}


function social_share_count(pid){

   alert(pid);

   $.post( "<?=base_url();?>share/shareCount",{pid:pid}, function( data ) {
  $( ".result" ).html( data );
});

}

function social_share_count1(pid){

   

   $.post( "<?=base_url();?>share/shareCount1",{pid:pid}, function( data ) {
  $( ".result" ).html( data );
});

}



   
</script>
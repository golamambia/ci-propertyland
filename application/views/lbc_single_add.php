
    <?php
    //echo $cat_id=$catlist[0]->id; exit();
    $this->load->view('user_page_banner');
    ?>

<style type="text/css">
    .map_area iframe{width: 100%;height: 300px;}
</style>

        <div class="container">
            <div class="inner_banner_contant pt-0">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$category_title;?></li>
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
                            <h3><?=$result[0]->title; ?></h3>


<!-------------edit form ----------------->                                  
                                    
<?php $cat_id=$catlist[0]->id ;

if($cat_id==15){
 require_once('single_LOCALBUSINESS.php');
}elseif($cat_id==5){
 require_once('single_SHARED_ACCOMMODATION_FOR_RENT.php');
}elseif($cat_id==4){
 require_once('single_FEED_REQUEST.php');
}elseif($cat_id==11){
 require_once('single_EVENTS.php');
}elseif($cat_id==13){
 require_once('single_GOOD_TO_KNOW.php');
}elseif($cat_id==17){
 require_once('single_WHOLE_ACCOMMODATION_FOR_RENT.php');
}elseif($cat_id==18){
 require_once('single_JOBS_SITES_LISTING.php');
}elseif($cat_id==19){
 require_once('single_JOB.php');
}elseif($cat_id==20){
 require_once('single_JOB SEEKER.php');
}elseif($cat_id==21){
 require_once('single_COACHING.php');
}elseif($cat_id==22){
 require_once('single_FOOD_BOX.php');
}elseif($cat_id==23){
 require_once('single_OTHERS.php');
}elseif($cat_id==24){
 require_once('single_HELP_THROUGH_TRAVEL.php');
}

?>

<!-------------edit form end ----------------->



                        </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            //alert(1);
            $('#country').bind("change", function() { 
            //$('#country').change(function(){
                //alert(1);
                $('#city').find('option').not(':first').remove();
                var country=$('#country').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>lbcontacts/get_state',
                    cache:false,
                    dataType: 'json',
                    data:{country:country},
                    success:function(response){
                        //console.log(response);
                       
            $('#state').find('option').not(':first').remove();


         // Add options
         $.each(response,function(index,data){
           $('#state').append('<option value="'+data['sid']+'">'+data['state_name']+'</option>');
         });
                    
                }

                });

            });



            $('#state').bind("change", function() { 
            //$('#country').change(function(){
                //alert(1);
                $('#city').find('option').not(':first').remove();
                var state=$('#state').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>lbcontacts/get_city',
                    cache:false,
                    dataType: 'json',
                    data:{state:state},
                    success:function(response){
                        //console.log(response);
                       
                     // Add options
         $.each(response,function(index,data){
           $('#city').append('<option value="'+data['cid']+'">'+data['name']+'</option>');
         });
                    
                }

                });

            });




        });

        //$.get("https://api.ipdata.co?api-key=test", function(response) {
  //$("#ip").html("IP: " + response.ip);
  //$("#city").val(response.city);
  //$("#response").html(JSON.stringify(response, null, 4));
//}, "jsonp");
    </script>
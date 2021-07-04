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
                 <h3>Processed Payments History</h3>



                 <div class="dashboard_mainboby">
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
                                 <!-- <th data-type="numeric">#</th> -->
                                
                                
                                 <th>Payment Type</th>
                                 <th>Payment For</th>
                                  <th>Post ID</th>
                                 <th>Days</th>
                                 <th>Price</th>
                                 <th>Date</th>
                              </tr>
                           </thead>
                           <tbody>
                           
                            <?php
                            $i=0;
                           
                            $total_cart=0;
                            foreach($cart_list as $result){
                              //echo"<pre>";
                              //print_r($result);
                              $total_cart +=$result->amount;
                             
                              $i++;
                              ?>

                              <tr>
                                 <!-- <td class="add-img-selector">
                                    <?=$i;?>
                                 </td> -->
                                 
                                 
                                 <td class="price-td">
                                 <?=$result->payment_type_text;?>
                                 </td>
                                 <td class="price-td">
                                    <?=$result->payment_text;?>
                                 </td>
                                 <td class="ads-details-td">
                                    <h4><a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->ppt_id);?>"><?=$result->ppt_title;?></a></h4>
                                   
                                 </td>
                                  <td class="price-td">
                                 <?=$result->days_valid;?>
                                 </td>
                                 <td class="price-td">
                                  <?php 
                                 
                                 echo $result->amount;
                                  
                                  ?>
                                 </td>
                                 <td class="action-td">
                                <?=$result->payment_date;?>
                                  
                                 </td>
                              </tr>
                              
                             <?php } 
                             //  print_r($this->session->userdata('demo'));
                             // echo $this->session->userdata('demo');
                             //  foreach ($payment_id as $key => $value) {
                             //   echo $value.'<br>';
                             //  }
                              ?>
                             
                              
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
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var SITEURL = "<?php echo base_url() ?>";
$('body').on('click', '.buy_now', function(e){
var totalAmount = <?=$total_cart*100;?>;
var product_id =  <?php echo json_encode($payment_id); ?>;
var options = {
"key": "rzp_test_YjcKLF3ndUVIlt",
"amount": totalAmount, // 2000 paise = INR 20
"name": "PROPERTY HANDSHAKE",
"description": "Payment",
"image": "https://www.sharingmakesmehappy.com/uploads/logo/logo1.png",
"handler": function (response){
  //console.log(response);
  if (typeof response.razorpay_payment_id == 'undefined' ||  response.razorpay_payment_id < 1) {
  window.location.href = SITEURL ;
}
$.ajax({
url: SITEURL + 'payment/razorPaySuccess',
type: 'post',
dataType: 'json',
data: {
razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
}, 
success: function (msg) {
  //console.log(msg);
  if(msg.status){
window.location.href = SITEURL + 'payment/RazorThankYou';
  }else{
    window.location.href = SITEURL ;
  }

},
error: function(response) {
                console.log(response);
            }
});
},
"theme": {
"color": "#528FF0"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
</script>

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e){ 
            

$("#payment_type_id").on('change',function(e){
                e.preventDefault();
                $('#price_id').children('option:not(:first)').remove();
                 var payment_type_id=$("#payment_type_id").val();
                 $("#tag_day").val('');
                 $("#tag_price").val('');
                                
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>payment/getPriceList',
                    data:{payment_type_id:payment_type_id},
                    //contentType: false,
                     dataType : 'json',
                    cache: false,
                   
                    success:function(response){
                        //console.log(response);
                        var html=response;
                        if(html.status=='success'){
                          var len = html.list.length;
                             var select = document.getElementById("price_id");
                var options = [];
                  var option = document.createElement('option');
                     
                           for (var i = 0; i < len; ++i)
            {
                //var data = '<option value="' + escapeHTML(i) +'">" + escapeHTML(i) + "</option>';
                option.text = response.list[i].payment_text;
                option.value = response.list[i].price_id;
                options.push(option.outerHTML);
            }

            select.insertAdjacentHTML('beforeEnd', options.join('\n'));

                     }
                          //$('#quote_form').css("opacity","");
                        //$(".sub").removeAttr("disabled");
                    }
                });
                

            });

          $("#price_id").on('change',function(e){
                e.preventDefault();
                
                 var price_id=$("#price_id").val();
                                
                $.ajax({
                    method:'post',
                    url:'<?=base_url();?>payment/getPriceData',
                    data:{price_id:price_id},
                    //contentType: false,
                     dataType : 'json',
                    cache: false,
                   
                    success:function(response){
                        //console.log(response);
                       
                        if(response.status=='success'){
                         $("#tag_day").val(response.day);
                 $("#tag_price").val(response.amount);

                     }else{
                      $("#tag_day").val(response.day);
                 $("#tag_price").val(response.amount);
                     }
                         
                    }
                });
                

            });



 });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php if($this->session->flashdata('success')){?>

                            <script>
                                swal({
                                    title: "Done",
                                    text: "<?php echo $this->session->flashdata('success'); ?>",
                                    //timer: 5000,
                                    icon: "success",
                                    button: "ok",
                                    type: 'success'

                                });
                            </script>

     <?php } ?>

        <?php if($this->session->flashdata('error')){ ?>
        
        <script>
        swal({
        title: "Error",
        text: "<?php echo $this->session->flashdata('error'); ?>",
        //timer: 5000,
        icon: "error",
        button: "ok",
        type: 'error'
        
        });
        </script>
        
        <?php } ?>

      
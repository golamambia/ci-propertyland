<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60e03d36d6e7610a49a968c6/1f9luu80e';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<!-- footer css Start -->
  <footer class="footer p-6 pb-0">
     <div class="container">
       <div class="row">
       <div class="col-lg-3">
          <div class="footer_wizget">
             <h3>Get In Touch</h3>
             <p>Local Browse.com <br>5147 Dummy Avenue Los Angeles,<br> CA 90045</p>
            <a class="co" href="tel:3232219137"><i class="fa fa-phone" aria-hidden="true"></i> T: 323.221.9137</a>
            <a class="co" href="mailto:ingo@localbrowse.com"><i class="fa fa-envelope" aria-hidden="true"></i> E: ingo@propertyhandshake.com</a>
          </div>
       </div>
       <div class="col-lg-6">
         <div class="row">
           <div class="col-lg-4">
             <div class="footer_wizget">
                <h3>Support & Help</h3>
                <ul>
                   <li><a href="#">Advertise us</a></li>
                   <li><a href="#">Review</a></li>
                   <li><a href="#">How it works</a></li>
                   <li><a href="#">Register</a></li>
                   <li><a href="#">Quick Enquiry</a></li>
                </ul>
             </div>
           </div>
           <div class="col-lg-4">
             <div class="footer_wizget">
                <h3>Links</h3>
                <ul>
                   <?php if($this->session->userdata('log_check')!=1){?>
                                        <li><a href="<?php echo base_url();?>login">Login</a></li>
                                        <li><a href="<?php echo base_url();?>register">Register</a></li>
                                    <?php }?>
                   <li><a href="#">About Us</a></li>
                   <li><a href="<?php echo base_url(); ?>about/terms">Terms & Conditions</a></li>
                   <li><a href="<?php echo base_url(); ?>about/policy">Privacy Policy</a></li>
                </ul>
             </div>
           </div>
           <div class="col-lg-4">
             <div class="footer_wizget">
                <h3>CATEGORIES</h3>
                <ul>
                   <li><a href="#">Local Service</a></li>
                   <li><a href="#">Job Training</a></li>
                   <li><a href="#">Rental</a></li>
                   <li><a href="#">Events</a></li>
                   <li><a href="#">Vehicles</a></li>
                </ul>
             </div>
           </div>
         </div>
       </div>
       <div class="col-lg-3">
         <div class="footer_wizget">
         <a href="#" class="btn btn-outline-light mt-3">Need Help? Contact us</a>
            <ul class="icons mt-3">
                <li><a href="#"><span class="round"><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                <li><a href="#"><span class="round"><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
                <li><a href="#"><span class="round"><i class="fa fa-google-plus" aria-hidden="true"></i></span></a></li>
                <li><a href="#"><span class="round"><i class="fa fa-youtube" aria-hidden="true"></i></span></a></li>
             </ul>
         </div>
       </div>
       </div>
     </div>
     <div class="footer_bottom clearfix">
       <div class="container clearfix">
         <div class="pull-left">
           <p>Copyright © 2021, Property Handshake</p>
         </div>
         <div class="pull-right">
           <p>Powered by <a target="_blank" href="<?=base_url();?>">Property Handshake</a></p>
         </div>
       </div>
     </div>  
  </footer>
<!-- footer css stop -->


    <!-- quick enquery modal start -->
    <div class="modal fade" id="myModal1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Quick Enquiry</h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="zmdi zmdi-close-circle-o"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="contriner">
                        <div class="row row-8">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email ID" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone No." />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Subject</option>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- quick enquery modal stop -->
    
   
    
   

    <!-- <script src="<?php echo base_url();?>assets_front/js/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>assets_front/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets_front/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
   
    
    <script src="<?php echo base_url();?>assets_front/js/jquery.extra.js"></script>
   
    
    
    
	
    
    <script src="<?php echo base_url();?>assets_front/js/wow.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
    
    
    
    <script>
    new WOW().init();
    </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'></script> 
 <script src="https://www.jqueryscript.net/demo/cropzee-image-cropper/cropzee.js"></script>
 <script>
            function init() {
                var input = document.getElementById('locationTextField');
                var autocomplete = new google.maps.places.Autocomplete(input);
                var input2 = document.getElementById('address');
                var autocomplete2 = new google.maps.places.Autocomplete(input2);
            //     google.maps.event.addListener(autocomplete, 'place_changed', function () {
            //     var place = autocomplete.getPlace();
            //     //document.getElementById('city2').value = place.name;
            //     //document.getElementById('cityLat').value = place.geometry.location.lat();
            //     //document.getElementById('cityLng').value = place.geometry.location.lng();
            //    // console.log( place.name+place.geometry.location.lat());
            // });
            }
 
            google.maps.event.addDomListener(window, 'load', init);
        </script>
<script id="rendered-js">
      $(document).ready(function () {

  $('a.btn-gallery').on('click', function (event) {
    event.preventDefault();

    var gallery = $(this).attr('href');

    $(gallery).magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery: {
        enabled: true } }).

    magnificPopup('open');
  });

});
      //# sourceURL=pen.js
    </script>
    
    <script id="rendered-js">
      function format(item, state) {
  if (!item.id) {
    return item.text;
  }
  var countryUrl = "https://lipis.github.io/flag-icon-css/flags/4x3/";
  var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
  var url = state ? stateUrl : countryUrl;
  var img = $("<img>", {
    class: "img-flag",
    width: 26,
    src: url + item.element.value.toLowerCase() + ".svg" });

  var span = $("<span>", {
    text: " " + item.text });

  span.prepend(img);
  return span;
}

$(document).ready(function () {
    $('#example').DataTable();
  $("#countries").select2({
    templateResult: function (item) {
      return format(item, false);
    } });

  $("#us-states").select2({
    templateResult: function (item) {
      return format(item, true);
    } });
  $('.numeric_input').keydown(function(event) {
return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )


      
    });

});
      //# sourceURL=pen.js
    </script>
    <script>
        $(document).ready(function() {
            //$('#know_tlb_other').hide();
            $('#know_tlb').change(function(){
                //alert(1);
                var val=$('#know_tlb').val();
                if(val=='other'){
                    $('#know_tlb_other').show();
                    $('#know_tlb_other').prop("required", true);
                }else{
                    $('#know_tlb_other').val('');
                    $('#know_tlb_other').prop("required", false);
                    $('#know_tlb_other').hide();
                }

            });
            $('#multiple-checkboxes').multiselect({
                includeSelectAllOption: true,
            });
            $('#multiple-checkboxes2').multiselect({
                includeSelectAllOption: true,
            });

            $(".toggle-password").click(function() {
//alert(1);
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  var x = document.getElementById("confirm_password");
  //alert(input.attr("type"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
     x.type = "text";
  } else {
    input.attr("type", "password");
    x.type = "password";
  }
});

            

        });

    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        function check_pass() {
            if(document.getElementById('password').value == '' || document.getElementById('confirm_password').value == ''){
                // document.getElementById('submit').disabled = true;
                document.getElementById('pass_msg').innerHTML = "Password and confirm password can't be blank ";
                document.getElementById("pass_msg").style.paddingBottom ="30px";
                document.getElementById("pass_msg").style.color ="red";
            }
            else if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
                document.getElementById('submit').disabled = false;
                document.getElementById('pass_msg').innerHTML = "Password and Confirm Password Match";
                document.getElementById("pass_msg").style.paddingBottom ="30px";
                document.getElementById("pass_msg").style.color ="green";
            
            } else {
                document.getElementById('submit').disabled = true;
                document.getElementById('pass_msg').innerHTML = "Password and Confirm Password not Match";
                document.getElementById("pass_msg").style.paddingBottom ="30px";
                document.getElementById("pass_msg").style.color ="red";
            }
        }
    </script>
    <!----------------------- For TinyMCE Script Start ------------------------>
        <script src="<?php echo base_url();?>tiny/tinymce/js/tinymce/tinymce.min.js"></script>

        <script type="text/javascript">
            tinymce.init({
                selector: "textarea.mceEditor",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste",
          "textcolor colorpicker"
                ],
                mode : "specific_textareas",
                toolbar: "insertfile undo redo | styleselect | bold underline italic | fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | mybutton",
                fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        height:200,
                setup: function(editor) {
                    editor.addButton('mybutton', {
                        text:"Upload Image",
                        class:"mce-ico mce-i-image",
                        icon: false,
                        onclick: function(e) {
                            console.log($(e.target));
                            if($(e.target).prop("tagName") == 'BUTTON'){
            console.log($(e.target).parent().parent().find('input').attr('id'));
                                if($(e.target).parent().parent().find('input').attr('id') != 'tinymce-uploader') {
                                    $(e.target).parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                }
                                $('#tinymce-uploader').trigger('click');
                                $('#tinymce-uploader').change(function(){
                                    var input, file, fr, img;
                                    if (typeof window.FileReader !== 'function') {
                                        write("The file API isn't supported on this browser yet.");
                                        return;
                                    }
                                    input = document.getElementById('tinymce-uploader');
                                    if (!input) {
                                        write("Um, couldn't find the imgfile element.");
                                    }else if (!input.files) {
                                        write("This browser doesn't seem to support the `files` property of file inputs.");
                                    }else if (!input.files[0]) {
                                        write("Please select a file before clicking 'Load'");
                                    }else {
                                        file = input.files[0];
                                        fr = new FileReader();
                                        fr.onload = createImage;
                                        fr.readAsDataURL(file);
                                    }
                                    function createImage() {
                                        img = new Image();
                                        img.src = fr.result;
                                        editor.insertContent('<img style="border:none;" src="'+img.src+'"/>');
                                    }
                                });
                            }
                            if($(e.target).prop("tagName") == 'DIV'){
                                if($(e.target).parent().find('input').attr('id') != 'tinymce-uploader') {
                                    console.log($(e.target).parent().find('input').attr('id'));                                
                                    $(e.target).parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                }
                                $('#tinymce-uploader').trigger('click');
                                $('#tinymce-uploader').change(function(){
                                    var input, file, fr, img;
                                    if (typeof window.FileReader !== 'function') {
                                        write("The file API isn't supported on this browser yet.");
                                        return;
                                    }
                                    input = document.getElementById('tinymce-uploader');
                                    if (!input) {
                                        write("Um, couldn't find the imgfile element.");
                                    }else if(!input.files) {
                                        write("This browser doesn't seem to support the `files` property of file inputs.");
                                    }else if(!input.files[0]) {
                                        write("Please select a file before clicking 'Load'");
                                    }else{
                                        file = input.files[0];
                                        fr = new FileReader();
                                        fr.onload = createImage;
                                        fr.readAsDataURL(file);
                                    }
                                    function createImage() {
                                        img = new Image();
                                        img.src = fr.result;
                                        editor.insertContent('<img style="border:none;" src="'+img.src+'"/>');
                                    }
                                });
                            }
                            if($(e.target).prop("tagName") == 'I'){
                                console.log($(e.target).parent().parent().parent().find('input').attr('id')); if($(e.target).parent().parent().parent().find('input').attr('id') != 'tinymce-uploader') {               
                                    $(e.target).parent().parent().parent().append('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                                }
                                $('#tinymce-uploader').trigger('click');
                                $('#tinymce-uploader').change(function(){
                                    var input, file, fr, img;
                                    if (typeof window.FileReader !== 'function') {
                                        write("The file API isn't supported on this browser yet.");
                                        return;
                                    }
                                    input = document.getElementById('tinymce-uploader');
                                    if (!input) {
                                        write("Um, couldn't find the imgfile element.");
                                    }else if (!input.files) {
                                        write("This browser doesn't seem to support the `files` property of file inputs.");
                                    }else if (!input.files[0]) {
                                        write("Please select a file before clicking 'Load'");
                                    }else {
                                        file = input.files[0];
                                        fr = new FileReader();
                                        fr.onload = createImage;
                                        fr.readAsDataURL(file);
                                    }
                                    function createImage() {
                                        img = new Image();
                                        img.src = fr.result;
                                         editor.insertContent('<img style="border:none;" src="'+img.src+'"/>');
                                    }
                                });
                            }
                        }
                    });
                }
            });
        </script>
    <script type="text/javascript">
        //quick enquery
        $(document).ready(function() {
            $("#quick_enquiry").click(function() {
                $("#myModal1").modal();
            });
        });
        
        // report error
        $(document).ready(function() {
            $("#report_error").click(function() {
                $("#myModal2").modal();
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
        // report Complaint
        $(document).ready(function() {
            $("#report_complaint").click(function() {
                $("#myModal3").modal();
            });
            $("#cropzee-input").cropzee({startSize: [85, 85, '%'],});
        });
        window.onload=getLocation;
  function getLocation() {
   
  if (navigator.geolocation) {
    //alert(1);
   navigator.geolocation.getCurrentPosition(showPosition);
  
  } else { 
   alert("Geolocation is not supported by this browser.");
  }
}
// $.get("https://api.ipdata.co?api-key=test", function(response) {
//       //console.log(response);
//       showPosition(response)

//       }, "jsonp");
function showPosition(position) {
 // alert(1);
//console.log(position);
   //console.log(position.coords.latitude);
  //alert(position.coords.latitude);
  //x.innerHTML = "Latitude: " + position.coords.latitude + 
  //"<br>Longitude: " + position.coords.longitude;
  //console.log(position.latitude);
  var lat=position.coords.latitude;
  var long=position.coords.longitude;
   $.ajax({
                    method:'post',
                    url:'<?=base_url();?>search/get_latlong',
                    data:{lat:lat,long:long},
                    
                    cache: false,
                    
                    success:function(response){
                        console.log(response);
                        <?php if($location==''){?>
                         $('#locationTextField').val(response);  
                         <?php }?>                      
                        
                    }
                });
}

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



$.ajax({url: "https://thelocalbrowse.com/search/delta", success: function(result){
    $("#div1").html(result);
  }});



}









    </script>


        <!----------------------- For TinyMCE Script End ------------------------>
       
</body>

</html>
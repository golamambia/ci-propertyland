</div>

<!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2021 <a class="text-bold-800 grey darken-2" href="<?=base_url();?>" target="_blank">PHP 			</a></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

     <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/jquery.raty.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->
    
<script src="<?php echo base_url();?>app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/jszip.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/tables/buttons.print.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="<?php echo base_url();?>app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>app-assets/js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/core/app.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
   <!--  <script src="<?php echo base_url();?>app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script> -->
    <script src="<?php echo base_url();?>app-assets/js/scripts/tables/datatables/datatable-styling.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/tables/datatables/datatable-advanced.min.js"></script>
    <!-- END: Page JS-->
 <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>app-assets/js/scripts/pages/app-contacts.min.js"></script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->

<script type="text/javascript">
    $(document).ready(function(){
        
$('.numeric_input').keydown(function(event) {
return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )


      
    });

// $('#example').DataTable( {
//     destroy: true
    
// } );

    });
</script>
<script type="text/javascript">
          $(document).ready(function(e){
            $(".toggle-password").click(function() {
//alert(1);
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
             $("#staff_email").keyup(function(){
                //alert(1);
    var mail=$("#staff_email").val();
        //email_check(mail);
        $.ajax({
type: "POST",
url: "<?php echo base_url();?>apanel/staff/get_staffemail",
data: 'email=' + mail,
cache: false,
success: function(html) {
//alert(html);
if(html>0){
$("#stf_malert").html('Email already exist!');
$("#sub").prop("disabled", true);
//return false;
}else{
    $("#stf_malert").html('');
    $("#sub").prop("disabled", false);
    //return true;
}

}
});


  });

//alert(1);

        


$(this1).on('submit', function(e){
            //alert(1);
        e.preventDefault();
       
 var id= e.target.id;
       var no = id.substr(id.length - 1);
       var nm=$('#cat'+no).val();
      if(id!='fupForm'){
       $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>apanel/event/category_edit/',
            data: {name: nm,id:no},
            
            success: function(msg1){
            var msg = msg1.trim();
                //$('.statusMsg').html('');
                
                    window.location.reload();
               }
               
        }); 
      }else{
        var category_name=$('#category_name').val();
$.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>apanel/event/category_post',
            data: {name: category_name},
             success: function(msg1){
            var msg = msg1.trim();
                //$('.statusMsg').html('');
                
                    window.location.reload();
               }
        });



      }
     // alert(hid);
        
    });


          });




function del_img(val,val2){
    //alert(1);
    $con=confirm("Are you to delete ?");
    if($con){
$.ajax({
type: "POST",
url: "<?php echo base_url();?>apanel/event/get_multiimage",
data: 'val=' + val+'&val2='+val2,
cache: false,
success: function(html) {
//alert(html);
$("#alert_rem").show();
$("#multi_img").html(html);

}
});
}

return false;
}


	//$("#example_tab").dataTable();
        $('#example_tab').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
	$("#example_tab2").DataTable({
		  "paging": true,
           "lengthChange": false,
           "searching": true,
           "ordering": false,
           "info": true,
           "autoWidth": true	
	});

      </script>
</html>

    <?php
    $this->load->view('user_page_banner');
    ?>
        <div class="container">
            <div class="inner_banner_contant pt-0">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                            <h3>Change Password <?php //echo $this->session->userdata('front_sess')['userid'] ?></h3>
                            <?php if($this->session->flashdata('error')){?>

                              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
                  </div>                           
                   <?php }elseif($this->session->flashdata('message')){?>

                         <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
                  </div>

                   <?php } ?>
                            <div class="dashboard_mainboby">
                                <!-- <h4 class="add_listing">Edit Profile</h4>
                                <p class="contain">All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p> -->
                                <div class="form_area mb-3">
                                    <form method="post" action="<?=base_url();?>setting/do_change_pass">
                                    <div class="row">
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                       
                        
                          <input type="password" name="new_password" id="password" required="required" class="form-control" placeholder="New Password">
                       
                      </div>
                                        </div>

                                        
                      <div class="col-lg-12">
                      <div class="form-group">
                        
                       
                          <input type="password" name="confirm_password" id="confirm_password" required="required" placeholder="Confirm Password" class="form-control">
                        
                      </div>
                                        
                        </div>

<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script> 

                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
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
    <!-- main_area css stop-->
    <script type="text/javascript">
        $(document).ready(function(){
            //alert(1);
            $('#cat_name').change(function(){
                //alert(1);
                var cat=$('#cat_name').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>Category/get_sub',
                    cache:false,
                    dataType: 'json',
                    data:{cat:cat},
                    success:function(response){
                        //console.log(response);
                       
            $('#subcat_name').find('option').not(':first').remove();

         // Add options
         $.each(response,function(index,data){
           $('#subcat_name').append('<option value="'+data['sid']+'">'+data['subname']+'</option>');
         });
                    
                }

                });

            });

        });
    </script>

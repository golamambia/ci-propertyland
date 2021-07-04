
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
                            <h3>Category</h3>
                            <?php if($this->session->flashdata('error')){?>

                              <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
                  </div>                           
                   <?php }?>
                            <div class="dashboard_mainboby">
                                <!-- <h4 class="add_listing">Edit Profile</h4>
                                <p class="contain">All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p> -->
                                <div class="form_area mb-3">
                                    <form method="post" action="<?=base_url();?>category/category">
                                    <div class="row">
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                           <label>Category</label>
                                           <select class="form-control" name="cat_name" id="cat_name" required>
                                            <option value="">--Select Category--</option>
                                            <?php 
                                             foreach ($category_list as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($value->id==$module){echo"selected";} ?> value="<?=$value->id;?>"><?=$value->name;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="error_msg"><?php echo form_error('cat_name'); ?></div>

                                        </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <div class="form-group">
                                           <label>Sub-category</label>
                                           <select class="form-control" name="subcat_name" id="subcat_name" >
                                            <option value="">--Select Sub-category--</option>
                                           <?php 
                                             foreach ($subcatlist as $key => $value) {
                                              //print_r($value)
                                             ?>
                                               <option <?php if($value->sid==$submodule){echo"selected";} ?> value="<?=$value->sid;?>"><?=$value->subname;?></option>
                                               <?php }?>
                                           </select>
                                           <div class="error_msg"><?php echo form_error('subcat_name'); ?></div>

                                        </div>
                                        </div> -->
                                        
                                      
                                        
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">Goto Ad Post</button>
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

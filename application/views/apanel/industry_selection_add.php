<div class="content-wrapper">

        <div class="content-header-left col-md-6 col-12 mb-2">

            <h3 class="content-header-title mb-0">Industry Selection Add</h3>

            <div class="row breadcrumbs-top">

              <div class="breadcrumb-wrapper col-12">

                <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="<?php echo base_url();?>apanel/home/">Dashboard</a>

                  </li>

                  <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a>

                  </li>

                </ol>

              </div>

            </div>

          </div>

        <div class="content-body">

          <section id="basic-form-layouts">

   

<div class="row match-height">

        <div class="col-md-10">

            <div class="card">

                

                <div class="card-content collapse show">

                    <div class="card-body">

                        

                        <?php if($this->session->flashdata('error')){?>

                        <div class="alert alert-danger alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>

</div>

<?php }?>

<?php if($this->session->flashdata('error_msg')){?>

                        <div class="alert alert-danger alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;"><?=$this->session->flashdata('error_msg');?></p>

</div>

<?php }?>

                        <?php if($this->session->flashdata('message')){?>

                        <div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>

</div>

<?php }?>



                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/staff/industry_selection_add_post">

                            <div class="form-body">

                                <h4 class="form-section"><i class="ft-calendar"></i>Industry Selection Info</h4>

                                

                                        <div class="form-group">

                                            <label for="eventInput2">Title</label>

                                            <input type="text" id="name" class="form-control" placeholder="Title" name="industry"  required>

                                        </div>

                                        

                                

                            </div>



                            <div class="form-actions">

                               <a href="<?php echo base_url();?>apanel/staff/industry_selection" class="btn btn-warning mr-1">

                                    <i class="ft-x"></i> Close

                                </a>

                                <button type="submit" class="btn btn-primary " id="sub">

                                    <i class="fa fa-check-square-o"></i> Create Now

                                </button>

                            </div>

                        </form> 



                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



        </div>

      </div>



      <script type="text/javascript">
        $(document).ready(function(){
            //alert(1);
            $('#country').bind("change", function() { 
            
                var country=$('#country').val();
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>apanel/staff/get_state',
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

            $('#user_type').bind("change", function() { 
            
                var user_type=$('#user_type').val();
                if(user_type=='support_staff'){

                  $('.manager_name').show();
                  $("#manager_name").attr("required", true);
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>apanel/staff/get_manager',
                    cache:false,
                    dataType: 'json',
                    data:{user_type:user_type},
                    success:function(response){
                        //console.log(response);
                       
            $('#manager_name').find('option').not(':first').remove();

         // Add options
         $.each(response,function(index,data){
           $('#manager_name').append('<option value="'+data['id']+'">'+data['name']+'</option>');
         });
                    
                }

                });
              }else{
                $('.manager_name').hide();
                $("#manager_name").attr("required", false);
              }

            });


        });
    </script>
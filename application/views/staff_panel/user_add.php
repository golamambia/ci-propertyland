<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Registration</h3>
            
          </div>
          
        </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">User Registration</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <!-- <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        
                        
                        <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/user/user_add_post">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-body">
                                      

                                        <div class="form-group">
                                            <label for="eventInput2">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="name" name="name"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="email" name="email"  required>
                                            <p id="malert" style="color: red;"></p>
                                            <span id="error_msg" style="color:#e53935; "></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput3">Phone</label>
                                            <input type="text" id="phone" class="form-control" placeholder="Phone" name="phone" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput3">Status</label>
                                           <select class="form-control" name="status" required>
                                            <option value="">--Select Status--</option>
                                               <option  value="Active">Active</option>
                                               <option  value="Inactive">Inactive</option>
                                           </select>
                                        </div>

                                       

                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a href="<?php echo base_url();?>apanel/user/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <button type="submit" class="btn btn-primary sub" id="sub">
                                    <i class="fa fa-check-square-o"></i> Save Now
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
       $('#email').keyup(function(){
                //alert(1);
                var email = $('#email').val();
                $.ajax({
                  type:"post",
                  url:'<?=base_url();?>register/GetEmail',
                  data:{email:email},
                  cache:false,
                  success:function(response){
                    console.log(response);
                    var html=response.trim();
                    if(html>0){
                      $('#error_msg').html('Email alredy exist!');
                      $('.sub').prop('disabled',true);
                    }else{
                      $('#error_msg').html('');
                      $('.sub').prop('disabled',false);
                    }

                  }
                });

            });
      });
    </script>

      
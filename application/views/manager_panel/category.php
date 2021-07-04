
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Category</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <a href="#" class="btn btn-primary mr-1" data-toggle="modal" data-target="#AddContactModal">
                                    <i class="ft-plus"></i> Add Category
                                </a></h4>


                                 <div class="modal fade" id="AddContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
             aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <section class="contact-form">
                    <form  enctype="multipart/form-data" method="post" action="<?php echo base_url();?>apanel/category/category_post" class="contact-input">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <fieldset class="form-group col-12">
                          <input type="text" id="category_name" class="contact-name form-control" placeholder="Name" name="name" required>
                        </fieldset>
                        <fieldset class="form-group col-12">
                          <input type="file" id="profile_pic" class="contact-name form-control"  name="profile_pic" required>
                        </fieldset>
                        
                      </div>
                      <div class="modal-footer">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                          <!-- <input type="submit" class="btn btn-info submitBtn"> -->
                          <button type="submit"  class="btn btn-info  submitBtn" ><i
                             class="fa fa-paper-plane-o d-block d-lg-none"></i> <span class="d-none d-lg-block">Add New</span></button>
                        </fieldset>
                      </div>
                    </form>
                  </section>
                </div>
              </div>
            </div>


              
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>

        </div>
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
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            <!-- <p class="card-text">&nbsp;</p> -->
            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Icon</th>
                               
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
               
               <?php 
               foreach ($datatable as $key => $value) {
                //print_r($value)
               ?>
                 <tr>
                  <td><?=$value->id;?></td>
                  <td><?=$value->name;?></td>
                  <td><img src="<?=base_url();?>/icon/<?=$value->icon_name;?>" style="width: 50px; height: 50px;"></td>
                 
                  <td class="float-centre">

                <a data-toggle="modal" data-target="#AddContactModal_<?=$value->id;?>"><span class="badge bg-primary" title="Click here for edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</span></a>
                <a href="<?php echo base_url();?>apanel/category/cat_delete/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><span class="badge badge-danger" title="Click here for delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></a>
            

                   </td>
                 
                </tr>


                <div class="modal fade" id="AddContactModal_<?=$value->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
             aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <section class="contact-form">
                    <form  class="contact-input" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>apanel/category/category_edit/<?=$value->id;?>">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel_<?=$value->id;?>">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- <input type="hidden" id="hid<?=$value->id;?>"  value="<?=$value->id;?>"> -->
                        <fieldset class="form-group col-12">
                          <input type="text" id="cat<?=$value->id;?>" class="contact-name form-control" placeholder="Name" name="name" value="<?=$value->name;?>" required>
                        </fieldset>
                        <fieldset class="form-group col-12">
                          <input type="file" id="profile_pic" class="contact-name form-control"  name="profile_pic" <?php if($value->icon_name==''){echo"required";}?>>
                        </fieldset>
                        <fieldset class="form-group col-12">
                          
                          <img src="<?=base_url();?>/icon/<?=$value->icon_name;?>" style="width: 50px; height: 50px;">
                        </fieldset>
                        
                      </div>
                      <div class="modal-footer">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                          <!-- <input type="submit" class="btn btn-info submitBtn"> -->
                          <button type="submit"  class="btn btn-info  submitBtn_<?=$value->id;?>" ><i
                             class="fa fa-paper-plane-o d-block d-lg-none"></i> <span class="d-none d-lg-block">Update Now</span></button>
                        </fieldset>
                      </div>
                    </form>
                  </section>
                </div>
              </div>
            </div>



                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Icon</th>
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
              </tfoot>        
            </table>        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        </div>
      </div>

<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Ads User List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">



              
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
                 <th data-type="numeric">#</th>
                                 <th>Name</th>
                                     <th>New Message</th>                            
                                 <th></th>
                </tr>
              </thead>
              <tbody>
               
               <?php
                            $i=0;
                            foreach($user as  $value){
                              //echo"<pre>";
                              //print_r($result);
 $sender_id=$value->id;                           
$contchat=$query = $this->db->query("SELECT * FROM chat WHERE sender_id='$sender_id' AND sender_type='user'")->num_rows();
if($contchat!=0){
                              $i++;
                              ?>

                              <tr class="dview<?=$i;?>">
                                 <td class="add-img-selector">
                                    <?=$i;?>
                                 </td>
                                 <td><?=$value->name;?></td>
                                
                                 <td>
                                   
 <?php
 $contchat_new=$query = $this->db->query("SELECT * FROM chat WHERE sender_id='$sender_id' AND sender_type='user' AND view=0")->num_rows();
echo $contchat_new;
 ?>                                  
                                 </td>
                                
                                 <td class="action-td">
                                  <a href="<?php echo base_url(); ?>staff_panel/support/chat/?chat_id=<?php echo $value->id; ?>" class="view_btn"  title="Click to view ad"><i class="fview fa fa-eye"  aria-hidden="true"></i></a></td>

                 
                </tr>

                              
              <?php } }?>
                
              </tbody>
                      
            </table>

                    
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        </div>
      </div>

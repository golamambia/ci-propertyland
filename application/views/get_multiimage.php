 <div id="multi_img">
<div class="row">  
                    <?php 

               foreach ($multiimage as $key => $row_rec) {

                //print_r($value)

               ?>

<div class="col-md-4">

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec->id;?>,'<?=$row_rec->lbcontact_id;?>')">Remove</span><img src="<?=base_url();?>uploads/module_file/<?php echo $row_rec->multi_image;?>" style="height: 100px;"/></div>
</div>


         <?php } ?>

         </div>
                </div>
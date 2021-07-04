 <div id="multi_img">
                    <?php 
               foreach ($multiimage as $key => $row_rec) {
                //print_r($value)
               ?>

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec->id;?>,'<?=$row_rec->event_id;?>')">Remove</span><img src="<?=base_url();?>uploads/<?PHP echo $row_rec->image;?>" height="60"/></div>

         <?php } ?>
                </div>
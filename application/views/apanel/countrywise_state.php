<select class="contact-name form-control" name="state_id" required>
                            <option value="">Select State</option>
                            <?php 
               foreach ($state as $key => $value) {
                //print_r($value)
               ?>
               <option value="<?=$value->sid;?>"><?=$value->state_name;?></option>
             <?php }?>

                          </select>
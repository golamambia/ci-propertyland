 <?php
                   
                      $i=0;
                      
                    foreach ($search_data as $key => $result) {
                      $i++;
                      ?>
                        <div class="catagori_slider">
                          <div class="topmore_cetagoribox clearfix">
                            <figure>
                              <a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->lbcontactId);?>">
                              <div class="topmore_cetagorithumble">                                
                              <img  src="<?php echo base_url(); ?>module_file/<?=$result->upload_file;?>" alt="cetagori_thum6" title="">                               
                              </div>
                              </a>
                            </figure>
                            <div class="body_text">
                               <h4><a href="<?=base_url();?>adsview/dataview?ads=<?=base64_encode($result->lbcontactId);?>"><?=$result->title;?></a></h4>
                              <!--  <p><strong>Express Avenue Mall, Santa Monica</strong></p> -->
                               <p><i class="fa fa-map-marker" aria-hidden="true"></i> <strong><?=$result->address;?></strong></p>
                               <ul>
                                 <!-- <li><a href="javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i> </a></li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i></a></li> -->
                                 <li><a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true"></i><?=date('d-m-Y',strtotime($result->entry_date));?></a></li>
                                 <li><a href="javascript:void(0)"><i class="fa fa-road" aria-hidden="true"></i><?php
                                 $dis=round($result->distance,2);
                                 if($dis>1){
                                  echo $dis." km";
                                 }else{
                                  echo ($dis*1000)." m";
                                 }
                                 ?></a></li>
                               </ul>
                               <ul class="button_area">
                                 <li>
                                   <?php if($this->session->userdata('log_check')!=1){?>
                                    <a href="javascript:void(0)" onclick="log_alert()" class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i>review</a>

                                    <?php }else{ if($this->session->userdata('front_sess')['userid']!=$result->user_id){?>
                                  <a href="javascript:void(0)" onclick="review_model('<?=base64_encode($result->lbcontactId);?>')" class="btn btn-outline-success"><i class="fa fa-star-o" aria-hidden="true"></i>Review</a>
                                  <?php }else{?>
            <a href="javascript:void(0)" onclick="own_post()" class="btn btn-outline-success"><i class="fa fa-star-o" aria-hidden="true"></i>Review</a>

                                  <?php }}?>

                                </li>
                                 <li><a href="tel:<?=$result->phone;?>" class="btn btn-outline-success"><i class="zmdi zmdi-phone"></i>call now</a></li>
                                 <li>
                                   <?php if($this->session->userdata('log_check')!=1){?>
                                    <a href="javascript:void(0)" onclick="log_alert()" class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i>quotes</a>

                                    <?php }else{ if($this->session->userdata('front_sess')['userid']!=$result->user_id){?>
                                  <a href="javascript:void(0)" onclick="quote_model('<?=base64_encode($result->lbcontactId);?>')"  class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i> get a quotes</a>
                                  <?php }else{?>
            <a href="javascript:void(0)" onclick="own_post()" class="btn btn-outline-success"><i class="fa fa-quote-left" aria-hidden="true"></i> get a quotes</a>

                                  <?php }}?>

                                </li>
                                 <li>
                                  <?php if($this->session->userdata('log_check')!=1){?>
                         <a href="javascript:void(0)" onclick="log_alert()" class="btn btn-outline-success"><i class="fa fa-heart-o" aria-hidden="true"></i>Favourite</a>
                         <?php }else{ if($this->session->userdata('front_sess')['userid']!=$result->user_id){?>
                                  <a href="javascript:void(0)" onclick="post_favourite('<?=base64_encode($result->lbcontactId);?>','<?=$i;?>')" class="fav_cls<?=$i;?> btn btn-outline-success <?php if(favCheck($result->lbcontactId)){echo"fav_act";}?>"><i class="fa fa-heart-o" aria-hidden="true"></i>Favourite </a>
                                  <?php }else{?>
                                    <a href="javascript:void(0)" onclick="own_post()" class="btn btn-outline-success"><i class="fa fa-heart-o" aria-hidden="true"></i>Favourite </a>
                                   <?php }}?>
                                </li>
                               </ul>
                              
                               <div class="reting"><?=avgReview($result->lbcontactId);?><sup><i class="fa fa-star" aria-hidden="true"></i></sup></div>
                            </div>
                           
                         </div>
                      </div>
                      
                      <?php }?>
                       
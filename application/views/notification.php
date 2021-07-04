<style type="text/css">
.dataTables_length{ display: none; }
</style>
<h3>Notifications(<span class="noteno"><?=countNotice();?></span>)</h3>

                                <div class="aside_body">

                                    <ul class="listing">
                                        <?php
                                        $rs=getNotification(10);

                                        foreach($rs as $notice){
                                        ?>
                                        <li>

                                            <a href="<?=base_url();?>noticeboard">

                                                <!-- <div class="list_icon"><img src="<?=base_url();?>assets_front/images/cetagori_thum.jpg" alt=""></div> -->

                                                <h5>

                                                    <?php 

                                                    $type=$notice->push_from;
                                                    if($type=='admin'){
                                                        echo"From TheLocalBrowse Team";
                                                    }else if($type=='staff'){
                                                        echo"From TheLocalBrowse Team";
                                                    }else if($type=='customer'){
                                                        echo"From customer";
                                                    }else{
                                                        echo"From TheLocalBrowse Team";
                                                    }
                                                    ?>
                                                

                                            </h5>

                                                <p><?=$notice->notice_title;?></p>



                                            </a>

                                        </li>
                                    <?php }?>
                                       
                                    </ul>

                                </div>
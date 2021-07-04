
    <!-- banner css Start -->
    <div class="banner_area text-center" style="background-image:url(<?=base_url();?>assets_front/images/bannerimg.jpg);">
        <div class="container">
            <div class="inner_banner_contant pt-0">
                <h2>Dashboard</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                            <h3>Manage My Profile</h3>
                            <div class="dashboard_mainboby">
                                <h4 class="add_listing">Profile</h4>
                                <p class="contain">All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>: <?=$user_info[0]->name;?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Email</td>
                                            <td>: <?=$user_info[0]->email;?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>: <?=$user_info[0]->phone;?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of birth</td>
                                            <td>: <?php echo date('d M Y',strtotime($user_info[0]->dob));?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>: <?=$user_info[0]->address;?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>: <?=$user_info[0]->status;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                <a href="<?=base_url();?>profile/update" class="btn btn-primary">EDIT MY PROFILE</a>
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
    <!-- main_area css stop -->
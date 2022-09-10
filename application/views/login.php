<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>




    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Login</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Login</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec login page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Log In</h2>
                        <h2 class="ec-title">Log In</h2>
                        <!-- <p class="sub-title mb-3">Best place to buy and sell digital products</p> -->
                    </div>
                </div>
                <div class="ec-login-wrapper">
                    <div class="ec-login-container">
                        <div class="ec-login-form">
                            <p class="text-danger">
                                <?php
                                if ($this->session->has_userdata('msg')) {
                                    echo $this->session->userdata('msg');
                                    $this->session->unset_userdata('msg');
                                }
                                ?>
                                <?php
                                echo $this->session->userdata('loginError');
                                $this->session->unset_userdata('loginError');
                                ?>
                            </p>
                            <form action="" method="post">
                                <span class="ec-login-wrap">
                                    <label>Registered Number*</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Your Phone Number:">
                                </span>
                                <span class="ec-login-wrap">
                                    <label>OTP*</label>
                                    <input type="text" class="form-control  d-none" name="otp" placeholder="OTP">
                                </span>
                                <!-- <span class="ec-login-wrap ec-login-fp">
                                    <label><a href="#">Forgot Password?</a></label>
                                </span> -->
                                <span class="ec-login-wrap ec-login-btn text-center">
                                    <!-- <button class="btn btn-primary"  type="submit">Login</button> -->
                                    <button class="btn btn-primary"  type="button" id="getotp">Login</button>
                                    <br />
                                    <hr><br />
                                    <a href="<?= base_url(); ?>index/register" class="text text-secondary">Have no Login ? Register Now</a>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>
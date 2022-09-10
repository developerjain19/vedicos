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
                            <h2 class="ec-breadcrumb-title">Phone verification</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Phone verification</li>
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
                        <h2 class="ec-bg-title">Phone verification</h2>
                        <h2 class="ec-title">Phone verification</h2>
                        <p class="sub-title mb-3">Enter OTP sent to your mobile no.</p>
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
                            <form action="" method="post" id="otpver">
                                <span class="ec-login-wrap">
                                    <label>Enter OTP sent to your contact no. <?= $this->session->userdata['login_user_contact'] ?></label>
                                    <input type="text" class="form-control" name="otp" id="otpval"  placeholder="******">
                                    <span id="otpmsg"></span>
                                     
                                </span>
                                <span class="ec-login-wrap ec-login-btn text-center">
                                    <button class="btn btn-primary" type="button" id="otp">Submit OTP</button>
                                    <br />
                                    <hr><br /> 
                                    <button type="button" id="resend" class="resendbtn text text-secondary" data-contact="<?= $this->session->userdata['login_user_contact'] ?>">Resend OTP</button>
                                    <span id="resendmsg"></span>
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
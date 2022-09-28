<!-- Footer Start -->
<footer class="ec-footer section-space-mt mt-0">
    <div class="footer-container">

        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo"><a href="#"><img src="<?= base_url(); ?>assets/img/vedicos-light.png" alt=""><img class="dark-footer-logo" src="<?= base_url(); ?>assets/img/vedicos (3).png" alt="Site Logo" style="display: none;" /></a></div>
                            <h4 class="ec-footer-heading">Contact us</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">Address: <?= $contactdetails[0]['address'] ?></li>
                                    <li class="ec-footer-link"><span>Call Us: </span><a href="tel:<?= $contactdetails[0]['f_contact'] ?>"><?= $contactdetails[0]['f_contact'] ?></a></li>
                                    <li class="ec-footer-link"><span>Email: </span><a href="mailto:<?= $contactdetails[0]['f_email'] ?>"><?= $contactdetails[0]['f_email'] ?></a></li>
                                    <li class="ec-footer-link"><span>Email: </span><a href="mailto:<?= $contactdetails[0]['s_email'] ?>"><?= $contactdetails[0]['s_email'] ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Information</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/about">About us</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/contact">Contact us</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/#ourteam">Our team</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/disclaimer">Disclaimer</a></li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Account</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <?php
                                    if ($this->session->has_userdata('login_user_id')) {
                                    ?>
                                        <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/profile">My account</a></li>

                                    <?php
                                    } else {
                                    ?>
                                        <li class="ec-footer-link">
                                            <p id="loginhmbtn">My Account </p>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/orders">Track your Order </a></li>
                                    <!--<li class="ec-footer-link"><a href="<?= base_url('index'); ?>/wishlist">Wish List</a></li>-->
                                    <!-- <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/consultation">My consult</a></li> -->
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/cart_checkout">My cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Quick Link</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/returnPolicy">Return policy </a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/refundPolicy">Cancellation & refund policy </a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/terms_condition">Term & condition</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/privacy_policy">Privacy Policy</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/faq">FAQ</a></li>
                                    <li class="ec-footer-link"><a href="<?= base_url('index'); ?>/product">All products</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">About Vedicos</h4>
                            <div class="ec-footer-links">
                                <p>At Vedicos, we're committed to supporting every single person who wants to be a better version of themselves - because we firmly believe Ayurveda can change everyone,s Life. As you move ahead in your journey of #Being Better</p>
                            </div>
                            <!--<div class="ec-subscribe-form">-->
                            <!--    <form id="ec-newsletter-form" name="ec-newsletter-form" method="post" action="#">-->
                            <!--        <div id="ec_news_signup" class="ec-form">-->
                            <!--            <input class="ec-email bg-white" type="email" required="" placeholder="Enter your email here..." name="ec-email" value="" />-->
                            <!--            <button id="ec-news-btn" class="button btn-primary" type="submit" name="subscribe" value=""><i class="ecicon eci-paper-plane-o" aria-hidden="true"></i></button>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 row ec-footer-service mt-4">
                        <br> <br>
                        <hr>
                        <div class="ec-footer-widget col-sm-1 col-3">
                            <img src="<?= base_url(); ?>assets/img/5.JPG" alt=" ">

                        </div>
                        <div class="ec-footer-widget col-sm-1 col-3">
                            <img src="<?= base_url(); ?>assets/img/6.JPG" alt=" ">

                        </div>
                        <div class="ec-footer-widget col-sm-2 col-4">
                            <img src="<?= base_url(); ?>assets/img/fssai.png" alt=" ">

                        </div>
                        <div class="ec-footer-widget col-sm-10">
                            <p><b>Disclaimer</b>:The information contained on Vedicos is provided for informational purposes only and is not meant to substitute for the advice provided by your doctor or other healthcare professional. Information and statements regarding products, supplements, programs etc listed on Vedicos have not been evaluated by the Food and Drug Administration or any government authority and are not intended to diagnose, treat, cure, or prevent any disease. </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer social Start -->
                    <div class="col text-left footer-bottom-left">
                        <div class="footer-bottom-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="<?= $contactdetails[0]['facebook'] ?>"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="<?= $contactdetails[0]['twitter'] ?>"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="<?= $contactdetails[0]['instagram'] ?>"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="<?= $contactdetails[0]['linkedin'] ?>"><i class="ecicon eci-linkedin"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-youtube" href="<?= $contactdetails[0]['youtube'] ?>"><i class="ecicon eci-youtube"></i></a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- Footer social End -->
                    <!-- Footer Copyright Start -->
                    <div class="col text-center footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy">Copyright © 2021-2022 <a class="site-name text-upper" href="#">Vedicos<span>.</span></a>. All Rights Reserved</div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                    <!-- Footer payment -->
                    <div class="col footer-bottom-right">
                        <div class="footer-bottom-payment d-flex justify-content-end">
                            <div class="payment-link">
                                <img src="<?= base_url(); ?>assets/images/icons/payment.png" alt="">
                            </div>

                        </div>
                    </div>
                    <!-- Footer payment -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->





<!-- Footer navigation panel for responsive display -->
<!--<div class="ec-nav-toolbar">-->
<!--    <div class="container">-->
<!--        <div class="ec-nav-panel">-->
<!--            <div class="ec-nav-panel-icons">-->
<!--                <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img src="<?= base_url(); ?>assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" /></a>-->
<!--            </div>-->
<!--            <div class="ec-nav-panel-icons">-->
<!--                <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img src="<?= base_url(); ?>assets/images/icons/cart.svg" class="svg_img header_svg" alt="icon" /><span class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>-->
<!--            </div>-->
<!--            <div class="ec-nav-panel-icons">-->
<!--                <a href="#" class="ec-header-btn"><img src="<?= base_url(); ?>assets/images/icons/home.svg" class="svg_img header_svg" alt="icon" /></a>-->
<!--            </div>-->
<!--            <div class="ec-nav-panel-icons">-->
<!--                <a href="" class="ec-header-btn"><img src="<?= base_url(); ?>assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="icon" /><span class="ec-cart-noti">4</span></a>-->
<!--            </div>-->
<!--            <div class="ec-nav-panel-icons">-->
<!--                <a href="" class="ec-header-btn"><img src="<?= base_url(); ?>assets/images/icons/user.svg" class="svg_img header_svg" alt="icon" /></a>-->
<!--            </div>-->

<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Footer navigation panel for responsive display end -->

<!-- Recent Purchase Popup  -->

<!-- Recent Purchase Popup end -->

<!-- Cart Floating Button -->
<div class="ec-cart-float">
    <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
        <div class="header-icon"><img src="<?= base_url(); ?>assets/images/icons/cart.svg" class="svg_img header_svg" alt="cart" />
        </div>
        <span class="ec-cart-count cart-count-lable">3</span>
    </a>
</div>
<!-- Cart Floating Button end -->

<!-- Whatsapp -->
<div class="ec-style ec-right-bottom">
    <!-- Start Floating Panel Container -->
    <div class="ec-panel">
        <!-- Panel Header -->
        <div class="ec-header">
            <strong>Need Help?</strong>
            <p>Chat with us on WhatsApp</p>
        </div>
        <!-- Panel Content -->
        <div class="ec-body">
            <ul>
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="+919873557903" data-message="Hii">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="<?= base_url(); ?>assets/images/whatsapp/profile_01.jpg" class="ec-user-img" alt="Profile image">
                                <span class="ec-status-icon"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Vedicos </span>
                                <p>Available</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
            </ul>
        </div>
    </div>
    <!--/ End Floating Panel Container -->
    <!-- Start Right Floating Button-->
    <div class="ec-right-bottom">
        <div class="ec-box">
            <div class="ec-button rotateBackward">
                <img class="whatsapp" src="<?= base_url(); ?>assets/images/common/whatsapp.png" alt="whatsapp icon">
            </div>
        </div>
    </div>
    <!--/ End Right Floating Button-->
</div>
<!-- Whatsapp end -->

<div id="ec-popnews-bg"></div>
<div id="ec-popnews-box">
    <?php
    if ($this->session->has_userdata('checkout')) {
    } else {
    ?>
        <div id="ec-popnews-close" style="z-index:9999"><i class="ecicon eci-close"></i></div>
    <?php
    }
    ?>
    <div class="row p-0 m-0">
        <div class="col-md-5 disp-no-767 p-0 m-0">
            <img src="<?= base_url(); ?>assets/img/heart-curve-live-thread.jpg" alt="newsletter" style="height: 100%;width: auto;object-fit: cover;">
        </div>
        <div class="col-md-7   p-4">
            <div id="ec-popnews-box-content ">
                <div class="ec-tab-wrapper ec-tab-wrapper-1">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item ">
                                    <a class="nav-link <?php
                                                        if ($this->session->has_userdata('regmsg')) {
                                                        } else {
                                                            echo 'active';
                                                        }
                                                        ?>" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details" role="tablist" id="logi">Login</a>
                                </li>
                                <li class="nav-item  ">
                                    <a class="nav-link  <?php
                                                        if ($this->session->has_userdata('regmsg')) {
                                                            echo 'active';
                                                        } else {
                                                        }
                                                        ?>" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info" role="tablist" id="regist">Register Now</a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content " style="height:400px;">
                            <div id="ec-spt-nav-details" class="tab-pane   fade <?php
                                                                                if ($this->session->has_userdata('regmsg')) {
                                                                                } else {
                                                                                    echo 'show active';
                                                                                }
                                                                                // if ($this->session->has_userdata('loginmsg')) {

                                                                                //     echo 'show active';
                                                                                // }
                                                                                ?>">
                                <div class="ec-single-pro-tab-desc">
                                    <p class="text-danger">
                                        <?php
                                        if ($this->session->has_userdata('loginmsg')) {
                                            echo $this->session->userdata('loginmsg');
                                            $this->session->unset_userdata('loginmsg');
                                        }
                                        ?>
                                        <?php
                                        echo $this->session->userdata('checkout');
                                        // $this->session->unset_userdata('loginError');
                                        ?>
                                    </p>
                                    <!-- <form action="<?= base_url('Index/login') ?>" method="post"> -->
                                    <span class="ec-login-wrap">
                                        <b>Enter Contact No. </b>
                                        <p id="otploginmsg" class="text-danger"></p>
                                        <input type="tel" class="form-control" id="logincontact" required name="contact" placeholder="Enter Phone Number:" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </span>
                                    <span class="ec-login-wrap " id="otpf" style="display:none">
                                        <!-- <label>OTP*</label> -->
                                        <input type="tel" class="form-control" name="otp" id="userotp" required placeholder="Enter OTP">
                                    </span>

                                    <span class="ec-login-wrap ec-login-btn text-center ">
                                        <button class="btn st_btn_register" type="button" id="submitlogin" style="display: none; padding: 4px 0; border-radius: 4px;">Login</button>
                                        <a class="st_btn" type="button" id="getotp" style="padding: 4px 0; border-radius: 4px">Get otp</a>
                                        <br />
                                        <hr><br />
                                        <!-- <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info" role="tablist">Have no Login ? Register Now</a> -->
                                    </span>
                                    <!-- </form> -->
                                    <span class="ec-login-wrap ec-login-fp">
                                        <label><span id="loginresend" class="loginresendbtn badge badge-warning btnwidth st_btn_resend" style="display: none; padding: 4px 0; border-radius: 4px; line-height: 22px;">Resend OTP</span>
                                            <span id="loginresendmsg"></span></label>
                                    </span>
                                </div>
                            </div>
                            <div id="ec-spt-nav-info" class="tab-pane fade <?php
                                                                            if ($this->session->has_userdata('regmsg')) {
                                                                                echo 'show active';
                                                                            } else {
                                                                            }
                                                                            ?>">
                                <div class="ec-single-pro-tab-moreinfo">
                                    <p class="text-danger">
                                        <?php
                                        if ($this->session->has_userdata('regmsg')) {
                                            echo $this->session->userdata('regmsg');
                                        }
                                        ?>

                                    </p>
                                    <form action="<?= base_url('Index/register') ?>" method="post">
                                        <!-- <span class="ec-register-wrap "> -->
                                        <!-- <label>First Name*</label> -->
                                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Your Name:" required>
                                        <!-- </span>
                                        <span class="ec-register-wrap">
                                            <label>Email</label> -->
                                        <input type="email" class="form-control" name="emailid" placeholder="Your Email:" value=" ">
                                        <!-- </span>
                                        <span class="ec-register-wrap ">
                                            <label>Phone Number*</label> -->
                                        <input type="tel" class="form-control" name="contact" placeholder="Your Contact:" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                        <!-- </span> -->
                                        <!-- <span class="ec-register-wrap d-none">
                                            <label>Password*</label>
                                            <input type="hidden" class="form-control" name="password" value="<?= rand(50000, 1000) ?>">
                                        </span>
                                        <span class="ec-register-wrap d-none">
                                            <label>Any Referal ??</label>
                                            <input type="text" class="form-control" name="referal_id">
                                            <input type="hidden" class="form-control" name="my_ref_code" id="my_ref_code" required>
                                        </span> -->
                                        <span class="ec-register-wrap ec-register-btn">
                                            <button class="st_btn_register" type="submit" style="padding: 4px 0; border-radius: 3px; font-weight: 400;">Register</button>
                                        </span>
                                    </form>
                                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center;margin-bottom:20px;">
                                        <span style="font-size: 20px; background-color: white; padding: 0 10px;">
                                            OR
                                        </span>
                                    </div>
                                    <a href="<?= base_url('Index/register_as_doctor') ?>" class="s_btn doctor_btn" style="color: white; border-radius: 5px; line-height: 36px">
                                        <!--<img src="<?= base_url(); ?>assets/img/steth.png" style="width:30px; " alt=""> -->
                                        Join as Doctors
                                    </a><br><br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
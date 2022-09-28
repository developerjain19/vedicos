<!-- Header start  -->
<header class="ec-header">
    <!--Ec Header Top Start -->
    <div class="header-top" style="background-color: #336799;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top social Start -->
                <div class="col text-left header-top-left d-none d-lg-block">
                    <div class="header-top-social">
                        <span class="social-text text-upper">Follow us on:</span>
                        <ul class="mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook"  href="<?= $contactdetails[0]['facebook'] ?>" ><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-twitter"  href="<?= $contactdetails[0]['twitter'] ?>" ><i class="ecicon eci-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-instagram"  href="<?= $contactdetails[0]['instagram'] ?>" ><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-linkedin"  href="<?= $contactdetails[0]['linkedin'] ?>" ><i class="ecicon eci-linkedin"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-youtube"  href="<?= $contactdetails[0]['youtube'] ?>" ><i class="ecicon eci-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top social End -->
                <!-- Header Top Message Start -->
                <div class="col text-center header-top-center">
                    <div class="header-top-message text-upper" style="color:white;">
                      <span style="font-size:14px"><b>Free Shipping This Week Order Over - <?= $rate[0]['impline'] ?> INR </b></span>
                    </div>
                </div>
                <!-- Header Top Message End -->
                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-lan-curr d-flex justify-content-end">
                        <!-- Currency Start -->
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown"></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#"> </a></li>

                            </ul>
                        </div>
                        <!-- Currency End -->
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown"></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#"></a></li>
                            </ul>
                        </div>
                        <!-- Language End -->

                    </div>
                </div>
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col d-lg-none " style="background-color: #336799;position:fixed;margin:-10px;padding:10px;z-index:9999">
                    <br>
                    <div class="ec-header-bottons">
                        <!-- <div class="ec-header-user dropdown">-->
                        <!--    <button class="dropdown-toggle" data-bs-toggle="dropdown">-->
                        <!--        <img src="<?= base_url(); ?>assets/img/search.png" class="svg_img header_svg" alt="Vedicos" />-->
                        <!--    </button>-->
                        <!--    <ul class="dropdown-menu dropdown-menu-right" style="width:220px;">-->
                        <!--        <li><div class="header-search">-->
                        <!--    <form class="ec-btn-group-form" action="<?= base_url('index/product') ?>" method="post">-->
                        <!--        <input class="form-control" placeholder="Enter Your Product Name..." type="text" name="searchbox">-->
                        <!--        <button class="submit" type="submit"><img src="<?= base_url(); ?>assets/img/search.png" class="svg_img header_svg" alt="Vedicos" /></button>-->
                        <!--    </form>-->
                        <!--</div></li>-->
                             
                        <!--    </ul>-->
                        <!--</div>-->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="<?= base_url(); ?>assets/img/support.png" class="svg_img header_svg" alt="Vedicos" />
                                <!-- Customer support -->
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item"  href="<?= base_url('Index'); ?>/contact">Contact Us</a></li>
                                <li><a class="dropdown-item" href="https://wa.me/+918708530143?text=I'm%20interested%20" >Chat with us</a></li>
                                <li><a class="dropdown-item"  href="<?= base_url('Index'); ?>/faq">FAQ</a></li>
                                <li><a class="dropdown-item"  href="<?= base_url('Index'); ?>/returnPolicy">Return Policy</a></li>
                            </ul>
                        </div>
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="<?= base_url() ?>assets/img/<?= (($this->session->userdata('login_user_type') == '1') ? 'crown.jpg' : 'user.png') ?>" class="svg_img header_svg" alt="Vedicos" />
                                <!-- My Account & order -->
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <?php
                                if ($this->session->has_userdata('login_user_id')) {
                                ?>
                                    <li><a class="dropdown-item"  href="<?= base_url('index'); ?>/profile">My account</a></li>
                                    <li><a class="dropdown-item"  href="<?= base_url('index'); ?>/orders">Orders</a></li>
                                    
                                    <!-- <li><a class="dropdown-item" href="#">My consultation</a></li> -->
                                    <li><a class="dropdown-item"  href="<?= base_url('index'); ?>/logout">logout</a></li>
                                <?php
                                } else {
                                ?>
                                    <li>
                                        <p class="dropdown-item" id="loginhmbtn">Login </p>
                                    </li>
                                    <li>
                                        <p class="dropdown-item" id="loginhmbtnreg">Sign Up</p>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Header User End -->

                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle-cart ec-side-toggle">
                            <div class="header-icon"><img src="<?= base_url(); ?>assets/img/cart.png" class="svg_img header_svg" alt="Vedicos" /></div>
                            <span class="ec-header-count cart-count-lable" id="totalitem"><?= $this->cart->total_items(); ?></span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header menu Start -->
                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <img src="<?= base_url(); ?>assets/img/menu.png" class="svg_img header_svg mr-4" alt="icon" />
                            <img src="<?= base_url(); ?>assets/img/vedicos-light.png" alt="Site Logo" style="height:35px;" />
                        </a>
                        <!-- <div class="header-logo ">-->
                        <!--    <a  href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/img/vedicos (3).png" alt="Site Logo" /><img class="dark-logo" src="<?= base_url(); ?>assets/img/vedicos (3).png" alt="Site Logo" style="display: none;" /></a>-->
                        <!--</div>-->
                        <!-- Header menu End -->
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center">
                        <div class="header-logo ">
                            <a  href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/img/vedicos (3).png" alt="Site Logo" /><img class="dark-logo" src="<?= base_url(); ?>assets/img/vedicos (3).png" alt="Site Logo" style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->

                    <!-- Ec Header Search Start -->
                    <div class="align-self-center">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="<?= base_url('index/product') ?>" >
                                <input class="form-control" placeholder="Enter Your Product Name..." type="text" name="searchbox">
                                <button class="submit" type="submit"><img src="<?= base_url(); ?>assets/img/search.png" class="svg_img header_svg" alt="Vedicos" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->

                    <!-- Ec Header Button Start -->
                    <div class="align-self-center">
                        <div class="ec-header-bottons">

                            <!-- Header User Start -->

                            <!-- Header User End -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <img src="<?= base_url(); ?>assets/img/support.png" class="svg_img header_svg" alt="Vedicos" />
                                    <!-- Customer support -->
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item"  href="<?= base_url('Index'); ?>/contact">Contact Us</a></li>
                                    <li><a class="dropdown-item" href="https://wa.me/+918708530143?text=I'm%20interested%20">Chat with us</a></li>
                                    <li><a class="dropdown-item"  href="<?= base_url('Index'); ?>/faq">FAQ</a></li>
                                    <li><a class="dropdown-item"  href="<?= base_url('Index'); ?>/returnPolicy">Return Policy</a></li>
                                </ul>
                            </div>
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <img src="<?= base_url() ?>assets/img/<?= (($this->session->userdata('login_user_type') == '1') ? 'crown.jpg' : 'user.png') ?>" class="svg_img header_svg" alt="Vedicos" />
                                    <!-- My Account & order -->
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <?php
                                    if ($this->session->has_userdata('login_user_id')) {
                                    ?>
                                        <li><a class="dropdown-item"  href="<?= base_url('index'); ?>/profile">My account</a></li>
                                        <li><a class="dropdown-item"  href="<?= base_url('index'); ?>/orders">Orders</a></li>
                                       
                                        <!-- <li><a class="dropdown-item" href="#">My consultation</a></li> -->
                                        <li><a class="dropdown-item"  href="<?= base_url('index'); ?>/logout">logout</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                            <p class="dropdown-item" id="loginhmbtn">Login </p>
                                        </li>
                                        <li>
                                            <p class="dropdown-item" id="loginhmbtnreg">Sign Up</p>
                                        </li>
                                    <?php
                                    }
                                    ?>


                                </ul>
                            </div>

                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><img src="<?= base_url(); ?>assets/img/cart.png" class="svg_img header_svg" alt="Vedicos" /></div>
                                <span class="ec-header-count cart-count-lable" id="totalitems"><?= $this->cart->total_items(); ?></span>
                            </a>
                            <!-- Header Cart End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Button End -->
    <!-- Header responsive Bottom  Start -->
    <div class="ec-header-bottom d-none">
        <div class="container position-relative">
            <div class="row ">

                <!-- Ec Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a  href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/img/vedicos (3).png" alt="Site Logo" /> </a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col">
                    <div class="header-search">
                        <form class="ec-btn-group-form" action="<?= base_url('index/product') ?>">
                            <input class="form-control" placeholder="Enter Your Product Name..." type="text" name="searchbox">
                            <button class="submit" type="submit"><img src="<?= base_url(); ?>assets/img/search.png" class="svg_img header_svg" alt="icon" /></button>
                        </form>
                    </div>
                </div>
                <!-- Ec Header Search End -->
            </div>
        </div>
    </div>
    <!-- Header responsive Bottom  End -->
    <!-- EC Main Menu Start -->
    <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav" style="background-color: #336799;">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="ec-main-menu">
                        <ul>
                            <li><a  href="<?= base_url(); ?>">Home</a></li>
                            <li><a  href="<?= base_url('index'); ?>/about">About Us</a></li>

                            <!-- <li class="dropdown"><a href="javascript:void(0)">Products</a>
                            <ul class="sub-menu">
                                <li><a href="#">Medicine</a></li>
                                <li><a href="#">Medical Equipments</a></li>

                            </ul>
                            </li> -->
                            <li><a  href="<?= base_url('index'); ?>/product">Products</a></li>
                            <li><a  href="<?= base_url('index'); ?>/deals">Deals</a></li>
                            <li><a  href="<?= base_url('index'); ?>/blogs">Blogs</a></li>
                            <li><a  href="<?= base_url('index'); ?>/videos">Videos</a></li>

                            <li><a  href="<?= base_url('index'); ?>/contact">Contact Us</a></li>
                            <!-- <li><a  href="<?= base_url('index'); ?>/consultation">Vedicos Consult</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Main Menu End -->
    <!-- Vedicos Mobile Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li><a  href="<?= base_url(); ?>">Home</a></li>
                    <li><a  href="<?= base_url('index'); ?>/about">About Us</a></li>

                    <!-- <li class="dropdown"><a href="javascript:void(0)">Products</a>
                            <ul class="sub-menu">
                                <li><a href="#">Medicine</a></li>
                                <li><a href="#">Medical Equipments</a></li>

                            </ul>
                            </li> -->
                    <li><a  href="<?= base_url('index'); ?>/product">Products</a></li>
                    <li><a  href="<?= base_url('index'); ?>/deals">Deals</a></li>
                    <li><a  href="<?= base_url('index'); ?>/blogs">Blogs</a></li>
                    <li><a  href="<?= base_url('index'); ?>/videos">Videos</a></li>

                    <li><a  href="<?= base_url('index'); ?>/contact">Contact Us</a></li>
                    <!-- <li><a  href="<?= base_url('index'); ?>/consultation">Vedicos Consult</a></li> -->
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <!-- <div class="header-top-lan-curr">
                     
                    <div class="header-top-lan dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Italiano</a></li>
                        </ul>
                    </div>
                     
                    <div class="header-top-curr dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">USD INR </a></li>
                            <li><a class="dropdown-item" href="#">EUR €</a></li>
                        </ul>
                    </div>
                     
                </div> -->
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
    <!-- Vedicos mobile Menu End -->
</header>
<!-- Header End  -->

<!-- Vedicos Cart Start -->
<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart" style="z-index: 99999;">
    <div class="ec-cart-inner" id="cart">

    </div>
</div>
<!-- Vedicos Cart End -->
<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet" />-->
<style>
    .hmwid {
        width: 60%;
    }

    .hmhig {
        height: 250px;
    }

    .dela {
        border-radius: 20px;
        height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .offerban {
        width: 100%;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    @media only screen and (max-width: 600px) {
        .hmwid {
            width: 90%;
        }

        .hmhig {
            height: 250px;
        }

        .hmimg {
            max-width: 70%;
        }

        .dela {
            height: 130px;
        }

        .offerban {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .bannerfgh {
            margin-top: 20px;
        }
    }
</style>

<body>

    <?php include('includes/menu.php'); ?>

    <!-- Main Slider Start -->
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb bannerfgh">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                <?php $i = 0;
                foreach ($banner as $banners) { ?>
                    <div class="ec-slide-item swiper-slide  ec-slide-<?= $i ?>">

                        <img src="<?= base_url('uploads/banner/' . $banners['b_img']) ?>" class="img-reponsive hmbanner" />

                    </div>
                <?php $i++;
                } ?>
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>


    </div>
    <!-- Main Slider End -->
    <!--  category Section Start -->
    <section class="section ec-category-section ec-category-wrapper-1  ">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Products</h2>
                        <h2 class="ec-title">Our Products</h2>
                        
                        <p class="sub-title ">Browse The Collection of Top Products</p>
                    </div>
                </div>
                <!--<div class="col-3 text-center">-->
                <!--    <div class="section-title">-->
                <!--         <a href="<?= base_url('index'); ?>/product"><button class="btn btn-primary">Veiw all products</button></a>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="row margin-minus-tb-15 text-center">

                <?php foreach ($products as $row) { ?>
                    <div class="ec_cat_content col-md-3 col-6" style="margin: 0 auto;">
                        <div class="ec_cat_inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 shadow p-2">
                                <div class="ec-product-inner ">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>" class=" ">
                                                <img class=" resp" src="<?= base_url() ?>uploads/products/<?= $row['img1'] ?>" alt="Product" />
                                                <!--<img class="hover-image resp" src="<?= base_url() ?>uploads/products/<?= $row['img2'] ?>" alt="Product" /> -->
                                            </a>
                                            <?= (($row['offer'] == '1') ? '<span class="percentage">' . $row['offer_per'] . '% Off</span>' : '') ?>

                                            <!-- <div class="ec-pro-actions"> 
                                                    <button class="btn btn-primary addCart add-to-cart" data-id="<?= $row['product_id'] ?>">
                                                    <img src="<?= base_url(); ?>assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" /> Add To Cart
                                                </button> 
                                                <a class="ec-btn-group wishlist" title="Wishlist">
                                                    <img src="<?= base_url(); ?>assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" />
                                            </a> 
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="ec-pro-title"><a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>"><?= $row['pro_name'] ?></a></h5>

                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="ec-pro-rating"> <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i>
                                        </div>
                                        </a>
                                        <div class="row">
                                            <div class="col-md-8  text-left">
                                                <span class="ec-price" style="display:block"> <span class="new-price">&#8377; <?= $row['price'] ?></span> <span class="old-price"> <?= $row['old_price'] ?></span>
                                                </span>
                                            </div>

                                            <div class="col-md-4  text-center">
                                                <?php
                                                if ($row['outofstock'] == '0') {
                                                ?>
                                                    <span class="badge badge-primary w-100 addCart p-1  " data-id="<?= $row['product_id'] ?>">
                                                        <img src="<?= base_url(); ?>assets/img/cart2.png" class="svg_img pro_svg" alt="" /> Add </span>
                                                    </span>
                                                <?php
                                                } else {
                                                ?>

                                                    <img src="<?= base_url(); ?>assets/img/outofstock.png" class="svg_img pro_svg" alt="" />

                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <!-- <a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>" ><span class="badge badge-primary mb-1">View details</span></a> -->


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class=" text-center w-100 mt-4">
                <a href="<?= base_url('index'); ?>/product"><button class="st_btn_view" style="border-radius: 3px; padding 4px 0;">Veiw all products</button></a>
            </div>
            <br><br>

        </div>
    </section>
    <section class="section ec-category-section ec-category-wrapper-1 section-space-p ec-test-section " style="background-image: url('<?= base_url() ?>assets/img/blue.png');background-size:auto 100%">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our deals and combo offer</h2>
                        <h2 class="ec-title">Our deals and combo offer</h2>
                        <p class="sub-title  ">Browse our deals and combo offer</p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-t-15">
                <?php
                $i = 1;
                if (!empty($promocode)) {
                    foreach ($promocode as $row) {
                ?>
                        <div class="col-md-4 col-6">
                            <a href="<?= base_url('index'); ?>/promocode_details/<?php echo $row['pid']; ?>">
                            <div class="ec-card-grid-space">
                                <div class="ec-card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(uploads/promocode/<?= $row['img'] ?>); background-position: center;">
                                    <div class="ec-num"><?php echo $i; ?></div>
                                    <h1><?php echo $row['title']; ?></h1>
                                    <p><?php echo $row['description']; ?>
                                    </p>
                                    <!-- <div class="ec-date">7 jul 2021-2022</div> -->
                                    <div class="ec-tags">
                                        <input type="hidden" value="<?php echo $row['title']; ?>" id="myInput<?php echo $i; ?>">
                                        <!-- <button class="ec-tag" onclick="myFunction()" data-id="<?php echo $i; ?>">Copy Code</button> -->
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                <?php
                        $i++;
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <!-- Ec Instagram Start -->


    <?php $i = 0;
    foreach ($offerbanner as $banners) { ?>

        <img src="<?= base_url('uploads/offerbanner/' . $banners['timage']) ?>" alt="" class="offerban" />
    <?php } ?>
    <section class="section ec-category-section ec-test-section ec-category-wrapper-1 section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">All Featured Products</h2>
                        <h2 class="ec-title">All Featured Products</h2>
                        <p class="sub-title">Browse The Featured Products</p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-tb-15">
                <?php foreach ($featured as $row) { ?>
                    <div class="ec_cat_content col-md-3 col-6">

                        <div class="ec_cat_inner bg-white">
                            <div class="col-lg-12 col-md-12 col-sm-12 shadow p-2">
                                <div class="ec-product-inner ">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>" class=" ">
                                                <img class=" resp" src="<?= base_url() ?>uploads/products/<?= $row['img1'] ?>" alt="Product" />
                                                <!--<img class="hover-image resp" src="<?= base_url() ?>uploads/products/<?= $row['img2'] ?>" alt="Product" /> -->
                                            </a>
                                            <?= (($row['offer'] == '1') ? '<span class="percentage">' . $row['offer_per'] . '% Off</span>' : '') ?>

                                            <!-- <div class="ec-pro-actions"> 
                                                    <button class="btn btn-primary addCart add-to-cart" data-id="<?= $row['product_id'] ?>">
                                                    <img src="<?= base_url(); ?>assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" /> Add To Cart
                                                </button> 
                                                <a class="ec-btn-group wishlist" title="Wishlist">
                                                    <img src="<?= base_url(); ?>assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" />
                                            </a> 
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                    <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="ec-pro-title"><a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>"><?= $row['pro_name'] ?></a></h5>

                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="ec-pro-rating"> <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star"></i>
                                        </div>
                                        </a>
                                        <div class="row">
                                            <div class="col-md-8  text-left">
                                                <span class="ec-price" style="display:block"> <span class="new-price">&#8377; <?= $row['price'] ?></span> <span class="old-price"> <?= $row['old_price'] ?></span>
                                                </span>
                                            </div>

                                            <div class="col-md-4  text-center">
                                                <?php
                                                if ($row['outofstock'] == '0') {
                                                ?>
                                                    <span class="badge badge-primary addCart p-1  " data-id="<?= $row['product_id'] ?>">
                                                        <img src="<?= base_url(); ?>assets/img/cart2.png" class="svg_img pro_svg" alt="" /> Add </span>
                                                    </span>
                                                <?php
                                                } else {
                                                ?>

                                                    <img src="<?= base_url(); ?>assets/img/outofstock.png" class="svg_img pro_svg" alt="" />

                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <!-- <a href="<?= base_url() ?>index/product_details/<?= $row['product_id'] ?>" ><span class="badge badge-primary mb-1">View details</span></a> -->


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class=" text-center w-100 mt-4">
            <a href="<?= base_url('index'); ?>/product"><button class="st_btn_view" style="border-radius: 3px; padding 4px 0;">Veiw all products</button></a>

        </div>
    </section>



    <!-- ec Banner Section Start -->
    <!--<section class="ec-banner section section-space-p">-->
    <!--    <h2 class="d-none">Banner</h2>-->
    <!--    <div class="container">-->

    <!--        <div class="ec-banner-inner">-->

    <!--            <div class="ec-banner-block ec-banner-block-2">-->
    <!--                <div class="row">-->

    <!--                    <div class="banner-block col-lg-12 col-md-12" data-animation="slideInLeft">-->
    <!--                        <div class="bnr-overlay">-->
    <!--                            <img src="<?= base_url(); ?>assets/img/banner1.jpeg" alt="" />-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- ec Banner Section End -->
    <section class="section ec-instagram-section module section-space-p" id="ourteam">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Team</h2>
                        <h2 class="ec-title">Our Team</h2>
                        <p class="sub-title">We are  Team Vedicos</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ec-insta-wrapper">
            <div class="ec-insta-outer">
                <div class="container" data-animation="fadeIn">
                    <div class="insta-auto">
                        <!-- instagram item -->
                        <?php foreach ($team as $row) { ?>
                            <div class="ec-insta-item">
                                <div class=" text-center bg-white shadow p-1 m-1 hmhig">
                                    <a href="<?= base_url('index'); ?>/team_details/<?= $row['tid'] ?>" >
                                        <img src="<?= base_url('uploads/ourteam/' . $row['timage']); ?>" alt="Vedicos Team" style="height:178px; width:299px; object-position: center top;object-fit:cover;">
                                    </a>
                                    <h6><?= $row['tname'] ?></h6>
                                    <p><?= $row['tdesignation'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ec testmonial Start -->
    <section class="section ec-test-section section-space-ptb-100 section-space-m" style="background-image: url('<?= base_url() ?>assets/img/blue.png');background-size:auto 100%">
        <div class="container hmwid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title mb-0">
                        <h2 class="ec-bg-title">Testimonial</h2>
                        <h2 class="ec-title">Client Review</h2>
                        <p class="sub-title mb-3">What  client says about us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">

                        <?php foreach ($testimonials as $row) { ?>
                            <li class="ec-test-item">
                                <img src="<?= base_url(); ?>assets/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                                <div class="ec-test-inner">
                                    <div class="ec-test-img"><img alt="testimonial" title="testimonial" src="<?php echo base_url();  ?><?php echo (($row['image'] == '')? 'assets/images/testimonial/1.jpg':'uploads/testimonial/'.$row['image']); ?>" /></div>
                                    <div class="ec-test-content">
                                        <div class="ec-test-desc"><?= $row['testimonial'] ?></div>
                                        <div class="ec-test-name"><?= $row['name'] ?></div>
                                        <!-- <div class="ec-test-designation">General Manager</div> -->
                                        <div class="ec-test-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?= base_url(); ?>assets/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom" alt="" />
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ec testmonial end -->
    <!-- Ec Instagram Start -->
    <section class="section ec-instagram-section module section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Instagram Feed</h2>
                        <h2 class="ec-title">Instagram Feed</h2>
                        <p class="sub-title">Share your story with us</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ec-insta-wrapper">
            <div class="ec-insta-outer">
                <div class="container" data-animation="fadeIn">
                    <div class="insta-auto">
                        <!-- instagram item -->
                        <?php
                        $i = 1;
                        if (!empty($instagram)) {
                            foreach ($instagram as $row) {
                        ?>
                                <div class="ec-insta-item">
                                    <div class="ec-insta-inner ">
                                        <a href="#" ><img src="<?php echo base_url() . 'uploads/instagram/' . $row['timage']; ?>" alt="insta" class="inimg"></a>
                                    </div>
                                </div>
                        <?php
                                $i++;
                            }
                        }
                        ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ec Instagram End -->

    <!-- Services Section Start -->
    <section class="section ec-services-section section-space-p ec-test-section">
        <h2 class="d-none">How it works</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content mb-3  col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/1.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Free Shipping</h2>
                            <p>Free Shipping , Order Over - <?= $rate[0]['impline'] ?> INR</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content  mb-3 col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/2.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>24X7 Support</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content mb-3 col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/3.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>7 Days Return</h2>
                            <p>Simply return it within 7 days </p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content mb-3 col-6  col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="<?= base_url(); ?>assets/img/4.JPG" class="svg_img hmimg" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Payment Secure</h2>
                            <p>100% Secure transactions through trusted payment gateways.</p>
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
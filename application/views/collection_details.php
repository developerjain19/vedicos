<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>

    <?php $row = $details; ?>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title"> Products Details</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Products Details</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Sart Single product -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">

                <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img single-pro-img-no-sidebar">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <?php

                                            if ($row->img1 != '') {
                                            ?>
                                                <div class="single-slide ">
                                                    <img class="img-responsive pimg" src="<?= base_url(); ?>uploads/products/<?= $row->img1; ?>" alt="<?= $row->pro_name; ?>">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($row->img2 != '') {
                                            ?>
                                                <div class="single-slide ">
                                                    <img class="img-responsive pimg" src="<?= base_url(); ?>uploads/products/<?= $row->img2; ?>" alt="<?= $row->pro_name; ?>">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($products_image) {
                                                foreach ($products_image as $img) {
                                            ?>
                                                    <div class="single-slide ">
                                                        <img class="img-responsive pimg" src="<?= base_url(); ?>uploads/products/<?= $img['pi_name']; ?>" alt="<?= $row->pro_name; ?>">
                                                    </div>

                                            <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if ($row->url != '') {
                                            ?>
                                                <div class="single-slide ">
                                                    <iframe src="https://www.youtube.com/embed/<?= $row->url ?>" width="100%" height="400px"></iframe>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                        <div class="single-nav-thumb">
                                            <?php
                                            if ($row->img1 != '') {
                                            ?>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="<?= base_url(); ?>uploads/products/<?= $row->img1; ?>" alt="<?= $row->pro_name; ?>" class="pimg">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($row->img2 != '') {
                                            ?>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="<?= base_url(); ?>uploads/products/<?= $row->img2; ?>" alt="<?= $row->pro_name; ?>" class="pimg">
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($products_image) {
                                                foreach ($products_image as $img) {
                                            ?>
                                                    <div class="single-slide">
                                                        <img class="img-responsive" src="<?= base_url(); ?>uploads/products/<?= $img['pi_name']; ?>" alt="<?= $row->pro_name; ?>" class="pimg">
                                                    </div>

                                            <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            if ($row->url != '') {
                                            ?>
                                                <div class="single-slide ">
                                                    <img class="img-responsive" src="<?= base_url(); ?>assets/img/video.jpg" alt="<?= $row->pro_name; ?>">
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title"> <?= $row->pro_name; ?> </h5>
                                        <div class="ec-single-rating-wrap">
                                            <div class="ec-single-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                            </div>

                                        </div>
                                        <!-- <div class="ec-single-desc"><?= $row->description; ?></div> -->


                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <?php
                                                if ($row->old_price != '') {
                                                ?>

                                                    <span class="old-price"><strike>Rs. <?= $row->old_price; ?></strike></span>
                                                <?php
                                                }
                                                ?>


                                                <span class="new-price">Rs. <?= $row->price; ?></span>
                                            </div>



                                        </div>
                                        <p> <?= $row->description; ?></p>

                                        <div class="ec-single-qty">


                                            <?php
                                            if ($row->outofstock == '0') {
                                            ?>
                                                <div class="ec-single-cart ">
                                                    <button class="st_btn_register addCart" style="background-color: #FFD814 !important; color: black !important; padding: 4px 0; border-radius: 3px; width: 106px !important;" data-id="<?= $row->product_id ?>">Add To Cart</button>
                                                    <span id="carttext<?= $row->product_id ?>"></span>
                                                </div>
                                                <div class="ec-single-cart ">
                                                    <button class="st_btn_register buynow" style="background-color:#FFA41C !important; color:black !important; padding: 4px 0; border-radius: 3px; margin-left: 10px;" data-id="<?= $row->product_id ?>"> Buy now</button>

                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <img src="<?= base_url(); ?>assets/img/outofstock.png" class="svg_img pro_svg" alt="" />
                                            <?php
                                            }
                                            ?>
                                            <div class="ec-single-wishlist">
                                                <!--<span class="badge badge-danger wishlist p-1 " title="Wishlist">-->
                                                <!--        <img src="<?= base_url(); ?>assets/img/heart.png" style="height:30px;" />-->
                                                <!--    </span>-->
                                                <!-- <a class="ec-btn-group  wishlist"    data-id="<?= $row->product_id ?>" title="Wishlist"><img src="<?= base_url(); ?>assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" /></a> -->
                                                <!-- <span id="wishtext<?= $row->product_id ?>"></span> -->
                                            </div>

                                        </div>

                                        <?php
                                        if ($this->session->has_userdata('login_user_id')) {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <button class="st_btn_register" style="    background-color: #ff9bcf !important; padding: 4px 0; width: 125px !important; border-radius: 3px" id="afflink" data-id="<?= $row->product_id ?>" data-title="Get <?= $row->pro_name ?> with vedicos" data-userid="<?= $this->session->userdata('login_user_id') ?>">Get affiliate link</button>
                                                </div>
                                                <div class="col-md-12" id="urlcmsgcopy" style="display:none">
                                                    <input type="text" id="urlmsg" readonly style="padding:10px;border:1px solid grey;" />
                                                    <button class="badge badge-warning m-2" onclick="myFunction()">Copy Link</button>
                                                    <span id="cm"></span>
                                                    <span id="social"></span>
                                                    <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=&t=<TITLE>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"  title="Share on Facebook"><img src="<?= base_url('assets/img/') . 'facebook.png' ?>" style="width: 35px;" class="m-2 p-1 shadow"/></a>
                                                    
                                                    <a href="whatsapp://send?text=" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"  title="Share on whatsapp"><img src="<?= base_url('assets/img/') . 'whatsapp.png' ?>" style="width: 35px;" class="m-2 p-1 shadow"/></a>
                                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=&t=<TITLE>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"  title="Share on Linkedin"><img src="<?= base_url('assets/img/') . 'linkedin.png' ?>" style="width: 35px;" class="m-2 p-1 shadow"/></a> -->
                                                </div>
                                            </div>
                                        <?php

                                        }
                                        ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <div class="ec-single-pro-tab">
                        <div class="ec-single-pro-tab-wrapper">
                            <!-- <div class="ec-single-pro-tab-nav">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                    </li>
                                     
                                     <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review" role="tablist">Reviews</a>
                                    </li>  
                                </ul>
                            </div> -->
                            <div class="tab-content  ec-single-pro-tab-content">
                                <div id="ec-spt-nav-details" class="tab-pane fade show active">

                                    <div class="row">
                                        <h6>Product Review</h6>
                                        <div class="ec-t-review-wrapper">
                                            <?php
                                            $i = 1;
                                            if (!empty($product_reveiw)) {
                                                foreach ($product_reveiw as $rowreview) {
                                                    $product = getRowById('products', 'product_id', $rowreview['user_id'])[0];

                                            ?>
                                                    <div class="ec-t-review-item shadow p-3">
                                                        <div class="ec-t-review-avtar">
                                                            <?php if ($rowreview['image'] != '') { ?>

                                                                <img class="img-responsive" src="<?= base_url(); ?>uploads/review/<?= $rowreview['image'] ?>" alt="<?= $rowreview['name'] ?>" height="100px">

                                                            <?php
                                                            } else { ?>
                                                                <img class="img-responsive" src="<?= base_url(); ?>uploads/products/<?= $row->img1; ?>" alt="<?= $row->pro_name; ?>" height="100px">

                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="ec-t-review-content">
                                                            <div class="ec-t-review-top">
                                                                <div class="ec-t-review-name"><?php echo $rowreview['name']; ?> - </div>
                                                                <div class="ec-t-review-rating">
                                                                    


                                                                    <?php
                                                                    switch ($rowreview['rating']) {
                                                                        case "1":
                                                                    ?>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star-o"></i>
                                                                            <i class="ecicon eci-star-o "></i>
                                                                            <i class="ecicon eci-star-o"></i>
                                                                            <i class="ecicon eci-star-o"></i>
                                                                        <?php
                                                                            break;
                                                                        case "2":
                                                                        ?>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star-o "></i>
                                                                            <i class="ecicon eci-star-o"></i>
                                                                            <i class="ecicon eci-star-o"></i>
                                                                        <?php
                                                                            break;
                                                                        case "3":
                                                                        ?>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star-o"></i>
                                                                            <i class="ecicon eci-star-o"></i>
                                                                        <?php
                                                                            break;
                                                                        case "4":
                                                                        ?>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star-o"></i> <?php
                                                                                                                break;
                                                                                                            case "5":
                                                                                                                ?>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i> <?php
                                                                                                                    break;
                                                                                                                default:
                                                                                                                    ?>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i> <?php
                                                                                                            }
                                                                                                                    ?>




                                                                  
                                                                </div>

                                                            </div>
                                                            <div class="ec-t-review-bottom">
                                                                <p><?php echo $rowreview['message']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                    $i++;
                                                }
                                            } else {
                                                // echo  'No contact query exists';
                                            }
                                            ?>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Single product -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>
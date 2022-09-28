<?php
foreach ($all_data as $row) {
   
?>

 <div class="ec_cat_content col-md-4 col-6" style="margin: 0 auto;">
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
<?php
}
?>
<?php
$checkoutuser = getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));
$rp = (int)$checkoutuser[0]['total_ref'] - (int)$checkoutuser[0]['total_used_ref'];
?>
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
                            <h2 class="ec-breadcrumb-title">Checkout</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Checkout</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec checkout page -->
    <form action="<?= base_url('index/checkoutpay') ?>" method="POST">
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-checkout-leftside col-lg-8 col-md-12 ">
                        <!-- checkout content Start -->
                        <div class="ec-checkout-content">
                            <div class="ec-checkout-inner">

                                <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                                    <div class="ec-checkout-block ec-check-bill">
                                        <h3 class="ec-checkout-title">Billing Details</h3>
                                        <div class="ec-bl-block-content">
                                            <div class="ec-check-subtitle">Checkout Options</div>
                                            <input class="form-check-input" type="hidden" name="totalamount" id="totalamount" value="<?php echo $this->cart->total(); ?>">
                                            <input class="form-check-input" type="hidden" name="grand_total" id="grand_total" value="<?php echo $this->cart->total(); ?>">
                                            <input class="form-check-input shipping_charge_cost" type="hidden" name="shipping_charges" id="shipping_charges" value="">
                                            <input class="form-check-input" type="hidden" name="courier_id" id="courier_id" value="">
                                            <input class="form-check-input" type="hidden" name="weight" id="weight" value="1">
                                            <input class="form-check-input" type="hidden" name="user_id" value="<?= $this->session->userdata('login_user_id') ?>">
                                            
                                            <div class="ec-check-bill-form row">
                                                <div class="col-md-12">
                                                    <label>Full name <span class="text-info" style="font-size:10px;">Required  </span></label>
                                                    <input type="text" class="form-control" name="name" placeholder="Name:" value="<?= $login[0]['fullname'] ?>" required>
                                                    
                                                </div>
                                                <div class="col-md-6 ">
                                                    <label>Email ID <span class="text-info" style="font-size:10px;">Required  </span></label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email:" value="<?= $login[0]['emailid'] ?>" required>
                                                    
                                                </div>
                                                <div class="col-md-6 ">
                                                    <label>Contact No. <span class="text-info" style="font-size:10px;">Required  </span></label>
                                                    <input type="text" class="form-control" name="number" placeholder="Phone No:" value="<?= $login[0]['contact'] ?>" required>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Address <span class="text-info" style="font-size:10px;">Required  </span></label>
                                                    <input type="text" class="form-control" name="address" placeholder="Address*" value="<?= $old_checkout['address'] ?>" required>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Pincode <span class="text-info" style="font-size:10px;">Required  </span></label>
                                                    <input type="text" class="form-control" name="pincode" placeholder="Pincode*" minlenght="6" maxlength="6" id="pincode" value="<?= $old_checkout['pincode'] ?>" required>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <label>City <span class="text-info" style="font-size:10px;">Required  </span></label>
                                                    <input type="text" class="form-control" name="city" placeholder="City*" value="<?= $old_checkout['city'] ?>" required>
                                                    
                                                </div>
                                                <div class="col-md-6 ">
                                                    <label>State <span class="text-info" style="font-size:10px;">Required  </span></label>

                                                    <select class="form-control" name="state" required>
                                                        <option value="">Select state </option>
                                                        <?php
                                                        if ($state_list) {
                                                            foreach ($state_list as $state) {
                                                        ?>
                                                                <option value="<?= $state['state'] ?>"><?= $state['state'] ?></option>
                                                        <?php

                                                            }
                                                        }
                                                        ?>

                                                        <option value="Others">Other </option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-md-6 ">
                                                    <label>Country <span class="text-info" style="font-size:10px;">Required  </span></label>
                                                    <select class="form-control" name="country" required>
                                                        <option value="India">India</option>
                                                        <option value="Others">Other </option>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-md-12"><br>
                                                    <label>Any Notes</label>
                                                    <textarea id="your-notes" rows="4" class="form-control" name="notes" placeholder="Other Notes (Optional)"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-checkout-rightside col-lg-4 col-md-12">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Product List</h3>
                                </div>
                                <div id="cart3">
                                </div>
                            </div>
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Summary</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-summary">
                                        <!--<div>-->
                                        <!--    <span class="text-left">Total</span>-->
                                        <!--    <span class="text-right" id="totalpricehm"></span>-->
                                        <!--</div>-->
                                        <!--<div>-->
                                        <!--    <span class="text-left">Delivery Charges</span>-->
                                        <!--    <span class="text-right">Free Delivery</span>-->
                                        <!--</div>-->
                                        <div>
                                            <span class="text-left">Coupon Discount</span>
                                            <span class="text-right"><a class="ec-checkout-coupan">Apply Coupon</a></span>
                                        </div>
                                        <div class="ec-checkout-coupan-content">

                                            <input class="ec-coupan" type="text" placeholder="Enter Your Coupon Code" name="promocode" id="promocode" value="">
                                            <input class="ec-coupan" type="hidden" placeholder="Enter Your Coupon Code" name="promocode_amt" id="promocode_amt" value="">
                                            <p class="ec-coupan-btn badge badge-primary m-2" id="promo">Apply</p>
                                            <p id="promomsg" class="text-green"></p>
                                        </div>
                                        <div class="ec-checkout-summary-total">
                                            <span class="text-left">Total Amount (after coupon)</span>
                                            <span class="text-right">Rs. <span id="cartprice"><?php echo $this->cart->format_number($this->cart->total()); ?></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar Summary Block -->

                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Affiliate Point</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-del ">
                                        <div class="ec-del-desc"> </div>
                                        <span>

                                            <span class="ec-del-opt-head">Your total Affiliate point : <?= $rp ?></span>
                                            <?php
                                            $point = 0;
                                            $minimumpv = 0;
                                            if ($checkoutuser[0]['user_type'] == '0') {
                                                $referal_per = $this->CommonModal->getRowById('referal_per', 'id', '1');
                                                if ($rp >= $referal_per[0]['minimum_point']) {
                                                    $point = (int)$this->cart->total() * ($referal_per[0]['minimum_value'] / 100);
                                                }
                                                $minimumpv = $referal_per[0]['minimum_point'];
                                            } elseif ($checkoutuser[0]['user_type'] == '1') {
                                                $referal_per = $this->CommonModal->getRowById('referal_per', 'id', '2');
                                                if ($rp >= $referal_per[0]['minimum_point']) {
                                                    $point = (int)$this->cart->total() * ($referal_per[0]['minimum_value'] / 100);
                                                }
                                                $minimumpv = $referal_per[0]['minimum_point'];
                                            } else {
                                            }
                                            // echo $referal_per[0]['minimum_point'] .' '.$rp.' '.$minimumpv;
                                            ?>

                                            <input type="hidden" style="width:20px;height:20px;" name="referalpoint" id="referalpoint" value="<?= $point ?>" />
                                            <input type="checkbox" style="width:20px;height:20px;" name="referalpointcheck" id="referalpointcheck" value="0" data-point="<?= $point ?>" <?= (($rp >= $minimumpv) ? (((int)$point > (int)$rp) ? 'disabled' : '') : 'disabled') ?>> Use <?= $point ?> Points
                                            <span class="text-info" style="font-size:10px;"> <?= ($rp >= $minimumpv) ? '' : 'Minimum Points required is ' . $referal_per[0]['minimum_point'] . ' to use points ' ?> </span>
                                            <input type="hidden" class="form-control" id="totalreferalpoint" name="totalreferalpoint" value="<?= $rp ?>">
                                            <span id="pointmsg"></span>
                                        </span>
                                        <div class="ec-checkout-del ec-checkout-summary">
                                            <div class="ec-checkout-summary-total">
                                                <span class="text-left">Shipping Charges </span>
                                                <span class="text-right shipping_charge">  </span>
                                            </div>
                                        </div>
                                        <div class="ec-checkout-del ec-checkout-summary">
                                            <div class="ec-checkout-summary-total">
                                                <span class="text-left">Grand Total </span>
                                                <span class="text-right">Rs. <span id="cartgrandprice"><?php echo $this->cart->format_number($this->cart->total()); ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <!-- Sidebar Summary Block -->

                            <!-- Sidebar Payment Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Payment Method</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-pay">
                                        <div class="ec-pay-desc">Please select the preferred payment method to use on this
                                            order.</div>
                                        <!-- <form action="#"> -->
                                        <span class="ec-pay-option">
                                            <span>
                                                <input type="radio" id="pay1" name="payment_type" value="0" style="height: 20px;width:20px;" />
                                                <label for="pay1">Cash On Delivery</label>
                                            </span> 
                                            <span>
                                                <input type="radio" id="pay2" name="payment_type" value="1" checked style="height: 20px;width:20px;" />
                                                <label for="pay2">Pay Online</label>
                                            </span>
                                        </span>
                                        <!-- <span class="ec-pay-commemt">
                                            <span class="ec-pay-opt-head">Add Comments About Your Order</span>
                                            <textarea name="your-commemt" placeholder="Comments"></textarea>
                                        </span>
                                        <span class="ec-pay-agree"><input type="checkbox" value=""><a href="#">I have
                                                read and agree to the <span>Terms & Conditions</span></a><span class="checked"></span></span> -->
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Payment Block -->
                        </div>
                    </div>
                    <div class="ec-checkout-rightside col-lg-12 col-md-12">
                        <span class="ec-check-order-btn">
                            <button type="submit" class="btn btn-primary" id="placeorder" >Place Order </button>
                            <p>Note: Please fill all details</p>
                        </span>
                        <span id="placeorder_msg"></span>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>
    <script>
        $(document).on('click', '#promo', function() {
            promo();
        }); 
        $(document).on('click', '#referalpointcheck', function() { 
            load_checkoutbar();
        });
    </script>

</body>

</html>
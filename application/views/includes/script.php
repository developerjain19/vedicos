 <!-- Vendor JS -->
 <script src="<?= base_url(); ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/popper.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/modernizr-3.11.2.min.js"></script>

 <!--Plugins JS-->
 <script src="<?= base_url(); ?>assets/js/plugins/swiper-bundle.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/countdownTimer.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/scrollup.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/jquery.zoom.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/slick.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/infiniteslidev2.js"></script>
 <script src="<?= base_url(); ?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
 <script src="<?= base_url(); ?>assets/js/plugins/jquery.sticky-sidebar.js"></script>

 <!-- Main Js -->
 <script src="<?= base_url(); ?>assets/js/vendor/index.js"></script>
 <script src="<?= base_url(); ?>assets/js/main.js"></script>
 <script>
     $(document).ready(function() {

         var limit = 12;
         var offset = 0;
         var catid = $('#catid').val();
         var subcatid = $('#subcatid').val();
         load_product();
         loadproduct();
         $('#category').change(function() {
             var category = $(this).val();
             window.location = "<?= base_url('Index/collection/') ?>" + category;
         });
         $(document).on('click', '.removeCarthm', function() {
             var pid = $(this).data('id');
             //  console.log(pid);
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/delete_item') ?>",
                 data: {
                     pid: pid
                 },
                 success: function(response) {
                     load_product();
                     alert('Item removed');
                 }
             });
         });
         $(document).on('click', '.addCart', function() {
             var pid = $(this).data('id');
             //  console.log(pid+'gh');
             var affiliate = <?= ((isset($affiliate)) ? $affiliate : '0') ?>;
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/addToCart') ?>",
                 data: {
                     pid: pid,
                     affiliate: affiliate
                 },
                 success: function(response) {

                     load_product();
                     $('#carttext' + pid).text('Added to cart');
                     setTimeout(function() {
                         $('#carttext' + pid).text('');
                     }, 3000);
                     alert('Item added to cart');
                     $(".ec-side-toggle-cart").click();
                     //  $("#ec-popnews-box").fadeIn();
                     //  window.location = "<?= base_url('Index/cart_list') ?>";
                 }
             });
         });

         $(document).on('click', '.buynow', function() {
             var pid = $(this).data('id');
             //  console.log(pid+'gh');
             var affiliate = <?= ((isset($affiliate)) ? $affiliate : '0') ?>;
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/addToCart') ?>",
                 data: {
                     pid: pid,
                     affiliate: affiliate
                 },
                 success: function(response) {


                     window.location = "<?= base_url('Index/cart_list') ?>";
                 }
             });
         });
         $(document).on('click', '.ec_qtybtn', function() {
             var rowid = $(this).data('rowid');
             var type = $(this).data('type');
             var qty = $('#qty' + type + rowid).val();

             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/update_qty') ?>",
                 data: {
                     rowid: rowid,
                     qty: qty
                 },
                 success: function(response) {
                     //  console.log(response);
                     load_product();
                 }
             });
             $.ajax({
                 url: '<?= base_url("Index/cartweight") ?>',
                 method: 'POST',
                 success: function(response) {
                     $('#weight').val(response);

                 }
             });
         });
         $(document).on('click', '.wishlist', function() {

             var pid = $(this).data('id');
             <?php
                if (!$this->session->has_userdata('login_user_id')) {
                ?>
                 loginpop();
             <?php
                } else {
                ?>
                 $.ajax({
                     method: "POST",
                     url: "<?= base_url('Index/addTowishlist') ?>",
                     data: {
                         pid: pid
                     },
                     success: function(response) {
                         if (response == '1') {
                             $('#wishtext').text('Added to wishlist');
                             //  setTimeout(function() {
                             //      $('#wishtext').text('');
                             //  }, 3000);
                             alert('Item added to wishlist');
                         } else {
                             alert('Server error...');
                         }
                         load_product();

                     }
                 });
             <?php
                } ?>

         });
         $(document).on('click', '.removewish', function() {

             var pid = $(this).data('id');
             //  console.log(pid);
             <?php
                if (!$this->session->has_userdata('login_user_id')) {
                ?>
                 window.location = "<?= base_url('Index/login') ?>";
             <?php
                } else {
                ?>
                 $.ajax({
                     method: "POST",
                     url: "<?= base_url('Index/removewishlist') ?>",
                     data: {
                         pid: pid
                     },
                     success: function(response) {

                         window.location = "<?= base_url('Index/wishlist') ?>";
                     }
                 });
             <?php
                } ?>

         });
         $('#loadmore').click(function() {
             loadproduct();

         });
         $('#otp').click(function() {
             var vid = $('#otpval').val();
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/checkotp') ?>",
                 data: {
                     vid: vid
                 },
                 success: function(response) {
                     //   console.log(response);
                     if (response == '1') {

                         window.location = "<?= base_url('index') ?>";
                     } else {
                         $('#otpmsg').text('Enter valid OTP');
                     }
                 }
             });
         });
         $('#resend').click(function() {
             var vid = $(this).data('contact');
             $('#resend').prop('disabled', true);
             $('#resend').css('color', 'white');

             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/resendotp') ?>",
                 data: {
                     vid: vid
                 },
                 success: function(response) {
                     if (response == '1') {
                         //  $('#otpver').submit();
                     } else {
                         //  $('#otpmsg').text('Enter valid OTP');
                     }
                 }
             });
             var countdown = 20;
             var refreshId = setInterval(function() {
                 if (countdown > 1) {
                     $('#resendmsg').text('Resend in ' + countdown + ' sec');
                     countdown--;
                 } else {
                     $('#resendmsg').text('');
                     clearInterval(refreshId);
                 }
             }, 1000);
             setTimeout(function() {
                 $('#resend').prop('disabled', false);
                 $('#resend').css('color', 'grey');

             }, 20000);
         });
         $('#loginresend').click(function() {
             var vid = $('#logincontact').val();
             $('#loginresend').hide();

             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/loginresendotp') ?>",
                 data: {
                     vid: vid
                 },
                 success: function(response) {
                     //  console.log(response);
                     if (response == '1') {
                         //  $('#otpver').submit();
                     } else {
                         //  $('#otpmsg').text('Enter valid OTP');
                     }
                 }
             });

             var countdowng = 20;
             var refreshId = setInterval(function() {
                 if (countdowng > 1) {
                     $('#loginresendmsg').text('Resend in ' + countdowng + ' sec');
                     countdowng--;
                 } else {
                     $('#loginresendmsg').text('');
                     clearInterval(refreshId);
                 }
             }, 1000);
             setTimeout(function() {
                 $('#loginresend').show();
             }, 20000);
         });
         $(document).on('click', '#loginhmbtn', function() {
             $("#ec-popnews-bg").fadeIn();
             $("#ec-popnews-box").fadeIn();
         });
         $(document).on('click', '#withdraw', function() {
             $("#request").show();

         });
         $(document).on('click', '#withdrawrequest', function() {
             $("#withdrawrequest").attr('disabled', 'disabled');

             var points = $('#pointswithdraw').val();
             var upiid = $('#upiid').val();


             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/withdrawrequest') ?>",
                 data: {
                     points: points,
                     upiid: upiid
                 },
                 success: function(response) {
                     //  console.log(response);
                     alert('Request Made');
                     $('#withdrawrequest').removeAttr("disabled");
                     window.location = "<?= base_url('Index/profile') ?>";
                 }
             });
         });
         $(document).on('click', '#loginhmbtnreg', function() {
             $("#ec-popnews-bg").fadeIn();
             $("#ec-popnews-box").fadeIn();
             $("#ec-spt-nav-info").addClass('active');
             $("#ec-spt-nav-details").removeClass('active');
             $("#regist").addClass('active');
             $("#logi").removeClass('active');

         });
         $('#getotp').click(function() {
             var logincontact = $('#logincontact').val();
             //  console.log(logincontact);
             $('#loginresendmsg').text('');
             if (logincontact == '') {
                 $('#otploginmsg').text('Contact no required');
             } else {
                 $.ajax({
                     method: "POST",
                     url: "<?= base_url('Index/sendotponlogin') ?>",
                     data: {
                         logincontact: logincontact
                     },
                     beforeSend: function() {
                         $("#getotp").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").prop("disabled", true);
                     },
                     success: function(response) {
                         console.log(response);

                         if (response == '0') {
                             $('#otploginmsg').text('Invalid OTP');
                         } else if (response == '1') {
                             $('#otpf').show();
                             $('#getotp').hide();
                             $('#submitlogin').show();
                             var countdownh = 20;
                             var refreshId = setInterval(function() {
                                 if (countdownh > 1) {
                                     $('#loginresendmsg').text('Resend in ' + countdownh + ' sec');
                                     countdownh--;
                                 } else {
                                     $('#loginresendmsg').text('');
                                     $('#loginresend').show();

                                     clearInterval(refreshId);
                                 }
                             }, 1000);
                         } else {
                             $('#otploginmsg').text('Please register with us to continue');
                         }
                         $("#getotp").text("Get OTP").attr('disabled', false);
                     }
                 });

             }
         });
         $('#submitlogin').click(function() {
             var logincontact = $('#logincontact').val();
             var userotp = $('#userotp').val();
             if (logincontact == '') {
                 $('#otploginmsg').text('Contact no required');
             } else {
                 if (userotp == '') {
                     $('#otploginmsg').text('OTP required');
                 } else {
                     $.ajax({
                         method: "POST",
                         url: "<?= base_url('Index/login') ?>",
                         data: {
                             contact: logincontact,
                             otp: userotp
                         },
                         beforeSend: function() {
                             $("#submitlogin").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                         },
                         success: function(response) {
                             //  console.log(response);
                             if (response == '0') {
                                 window.location = "<?= base_url('Index/') ?>";
                             } else if (response == '1') {
                                 $('#otploginmsg').text('Invalid OTP');

                             } else if (response == '4') {

                                 $('#otploginmsg').text('Your account is pending for approval. Please contat us for more details');

                             } else if (response == '2') {


                                 $('#otploginmsg').text('Please register with us to continue');
                             } else if (response == '5') {
                                 window.location = "<?= base_url('Index/cart_checkout') ?>";

                             } else {

                             }
                             $("#submitlogin").text("").html("Login").attr('disabled', false);
                         }
                     });
                 }
             }

         });
         <?php
            if ($this->session->has_userdata('regmsg')) {
            ?> loginpop();
         <?php
                $this->session->unset_userdata('regmsg');
            } elseif ($this->session->has_userdata('loginmsg')) {
            ?> loginpop();
         <?php
                $this->session->unset_userdata('loginmsg');
            } else {
            }
            if ($this->session->has_userdata('checkout')) {
            ?> loginpop();
         <?php
                $this->session->unset_userdata('checkout');
            }
            ?>
         $(document).on('click', '#afflink', function() {
             var did = $(this).data('id');
             var duserid = $(this).data('userid');
             var base_url = '<?= base_url() ?>';
             var url = '<?= base_url() . 'Index/affiliate_share/' ?>';
             var title = $(this).data('title');
             $.ajax({
                 method: "POST",
                 url: "<?= base_url('Index/affilate_link') ?>",
                 data: {
                     product_id: did,
                     user_id: duserid
                 },
                 beforeSend: function() {
                     $("#afflink").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                 },
                 success: function(response) {
                     aff = url + response;
                     $('#urlcmsgcopy').show();
                     $('#urlmsg').val(aff);
                     var social = '<a href="https://www.facebook.com/sharer/sharer.php?u=' + aff + '&t=' + title + '" onclick="javascript:window.open(this.href, \'\', \'menubar=no, toolbar=no, resizable=yes, scrollbars=yes, height=300, width=600 \');return false;"  title="Share on Facebook"><img src="' + base_url + 'assets/img/facebook.png" style="width: 35px;" class="m-2 p-1 shadow"/></a><a href="whatsapp://send?text=' + aff + '" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\'); return false;"  title="Share on whatsapp" > <img src="' + base_url + 'assets/img/whatsapp.png" style="width: 35px;" class="m-2 p-1 shadow" /> </a> <a href="https://www.linkedin.com/shareArticle?mini=true&url=' + aff + '&t=' + title + '" onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;"  title="Share on Linkedin" > <img src="' + base_url + 'assets/img/linkedin.png" style="width: 35px;" class="m-2 p-1 shadow" /> </a>';
                     //  console.log(social);
                     $('#social').html(social);
                     $("#afflink").text("").html("Affiliate Link").attr('disabled', false);
                 }
             });



         });
         var countdownv = 20;
         $('#resend').hide();
         var refreshId = setInterval(function() {
             if (countdownv > 1) {
                 $('#resendmsg').text('Resend in ' + countdownv + ' sec');
                 countdownv--;
             } else {
                 $('#resendmsg').text('');
                 clearInterval(refreshId);
             }
         }, 1000);
         setTimeout(function() {
             $('#resend').show();
         }, 20000);
     });

     function myFunction() {

         var copyText = document.getElementById("urlmsg");


         copyText.select();
         copyText.setSelectionRange(0, 99999);


         navigator.clipboard.writeText(copyText.value);

         $('#cm').text('Link Copied    ');
     }

     function load_checkoutbar() {
         var referalpoint = $('#referalpointcheck').data('point');
         if ($('#referalpointcheck').is(":checked")) {
             //  console.log(referalpoint);
             var tamt = $('#totalamount').val();

             var totalreferalpoint = parseInt($('#totalreferalpoint').val());
             var promocode_amt = $('#promocode_amt').val();

             if (referalpoint > totalreferalpoint) {
                 $('#pointmsg').text('Cant use more than available point');
                 $('#referalpoint').val(0);
             } else {
                 if (promocode_amt == '') {
                     var sc = $('#shipping_charges').val();
                     $('#cartgrandprice').text((parseInt(tamt) - parseInt(referalpoint) + parseFloat(sc)).toFixed(2));


                     $('#grand_total').val((parseInt(tamt) - parseInt(referalpoint) + parseFloat(sc)).toFixed(2));
                 } else {
                     //  console.log(parseInt(tamt) - (parseInt(promocode_amt) + parseInt(referalpoint)))
                     var sc = $('#shipping_charges').val();
                     $('#cartgrandprice').text((parseInt(tamt) - (parseInt(promocode_amt) + parseInt(referalpoint)) + parseFloat(sc)).toFixed(2));


                     $('#grand_total').val((parseInt(tamt) - (parseInt(promocode_amt) + parseInt(referalpoint)) + parseFloat(sc)).toFixed(2));
                 }
             }
         } else {
             var tamt = $('#totalamount').val();
             var promocode_amt = $('#promocode_amt').val();
             if (promocode_amt == '') {
                 //  console.log(parseInt(tamt));
                 var sc = $('#shipping_charges').val();
                 $('#cartgrandprice').text((parseInt(tamt) + parseFloat(sc)).toFixed(2));


                 $('#grand_total').val((parseInt(tamt) + parseFloat(sc)).toFixed(2));
             } else {
                 var sc = $('#shipping_charges').val();
                 $('#cartgrandprice').text((parseInt(tamt) - parseInt(promocode_amt) + parseFloat(sc)).toFixed(2));


                 $('#grand_total').val((parseInt(tamt) - parseInt(promocode_amt) + parseFloat(sc)).toFixed(2));

             }

         }
     }

     function promo() {
         var promocode = $('#promocode').val();
         $.ajax({
             method: "POST",
             url: "<?= base_url('Index/checkPromo') ?>",
             data: {
                 promocode: promocode
             },
             success: function(response) {
                 // console.log(response);
                 if (response == 'false') {
                     $('#promomsg').text('Promo code not valid');
                     $('#promocode_amt').val('0');
                     var tamt = $('#totalamount').val();
                     var referalpoint = $('#referalpoint').val();

                     $('#cartprice').text(tamt);
                     if ($('#referalpointcheck').is(":checked")) {
                         var sc = $('#shipping_charges').val();
                         $('#cartgrandprice').text(((parseInt(tamt) - parseInt(referalpoint)) + parseFloat(sc)).toFixed(2));


                         $('#grand_total').val(((parseInt(tamt) - parseInt(referalpoint)) + parseFloat(sc)).toFixed(2));
                     } else {
                         var sc = $('#shipping_charges').val();
                         $('#cartgrandprice').text(((parseInt(tamt)) + parseFloat(sc)).toFixed(2));


                         $('#grand_total').val(((parseInt(tamt)) + parseFloat(sc)).toFixed(2));
                     }

                 } else {
                     var obj = JSON.parse(response);
                     //  console.log(obj[0]['deduction']);

                     $('#promocode_amt').val(obj[0]['deduction']);
                     var tamt = $('#totalamount').val();
                     var referalpoint = $('#referalpoint').val();
                     $('#promomsg').html('<span class="text-success"><b>Applied !Promo code Offer amount - Rs. ' + obj[0]['deduction'] + '</b></span>');
                     $('#cartprice').text((tamt - obj[0]['deduction']));
                     //  console.log((parseInt(tamt) - (parseInt(obj[0]['deduction']) + parseInt(referalpoint))));
                     var sc = $('#shipping_charges').val();
                     $('#cartgrandprice').text(((parseInt(tamt) - (parseInt(obj[0]['deduction']) + parseInt(referalpoint))) + parseFloat(sc)).toFixed(2));


                     $('#grand_total').val(((parseInt(tamt) - (parseInt(obj[0]['deduction']) + parseInt(referalpoint))) + parseFloat(sc)).toFixed(2));
                 }
             }
         });
     }

     function load_product() {
         $.ajax({
             url: '<?= base_url("Index/fetch_data") ?>',
             method: 'POST',
             success: function(response) {
                 $('#cart').html(response);

             }
         });
         $.ajax({
             url: '<?= base_url("Index/cartAjax") ?>',
             method: 'POST',
             success: function(response) {
                 //   $('#cart').html(response);
                 $('#cart2').html(response);

             }
         });
         $.ajax({
             url: '<?= base_url("Index/cartAjax2") ?>',
             method: 'POST',
             success: function(response) {
                 $('#cart3').html(response);

             }
         });
         $.ajax({
             url: '<?= base_url("Index/cartweight") ?>',
             method: 'POST',
             success: function(response) {
                 // console.log(response);
                 $('#weight').val(response);

             }
         });

         $.ajax({
             url: '<?= base_url("Index/fetch_totalitems") ?>',
             method: 'POST',
             success: function(response) {
                 $('#totalitem').text(response);
                 $('#totalitems').text(response);
             }
         });
         $.ajax({
             url: '<?= base_url("Index/fetch_totalamount") ?>',
             method: 'POST',
             success: function(response) {
                 $('#totalamount').val(response);
                 $('#totalpricehm').text('Rs. ' + response);
             }
         });
         load_checkoutbar();
         promo();
     }

     function loginpop() {
         $("#ec-popnews-bg").fadeIn();
         $("#ec-popnews-box").fadeIn();
         //  $("#reg").click();
     }
     var limit = 12;
     var offset = 0;

     function loadproduct() {

         var catid = $('#catid').val();
         var subcatid = $('#subcatid').val();
         var url = "<?= base_url() ?>";
         $.ajax({
             method: "POST",
             dataType: "json",
             url: "<?= base_url('Index/getProduct') ?>",
             data: {
                 catid: catid,
                 subcatid: subcatid,
                 limit: limit,
                 offset: offset
             },
             success: function(response) {
                 //  console.log(response)
                 if (response == false) {
                     $('#loadmore').hide();
                 }
                 $.each(response, function(index, jsonObject) {
                     if (!jsonObject) {

                     } else {
                         var offer = '';
                         if (jsonObject['offer'] == '1') {
                             offer = '<span class="percentage">' + jsonObject['offer_per'] + '% Off</span>';
                         }
                         $('#productData').append('<div class="col-lg-4 col-md-6 col-6 mb-6 pro-gl-content "> <div class="ec-product-inner shadow p-2"> <div class="ec-pro-image-outer"><div class="ec-pro-image"><a href="' + url + 'index/product_details/' + jsonObject['product_id'] + '" class=" "><img class=" resp" src="' + url + 'uploads/products/' + jsonObject['img1'] + '" alt="Product" />  </a>  ' + offer + ' </div></div><div class="ec-pro-content"><div class="row"><div class="col-md-8"><h5 class="ec-pro-title"><a href="' + url + 'index/product_details/' + jsonObject['product_id'] + '">' + jsonObject['pro_name'] + '</a></h5></div><div class="col-md-4"></div></div><div class="ec-pro-rating"> <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i><i class="ecicon eci-star fill"></i> <i class="ecicon eci-star fill"></i></div><div class="row"><div class="col-md-8  text-left"><span class="ec-price" style="display:block">  <span class="new-price">&#8377; ' + jsonObject['price'] + '</span> <span class="old-price"> ' + jsonObject['old_price'] + '</span></span></div><div class="col-md-4  text-center">' + ((jsonObject['outofstock'] == '0') ? '<span class="badge badge-primary w-100 addCart p-1  " data-id="' + jsonObject['product_id'] + '"><img src="' + url + 'assets/img/cart2.png" class="svg_img pro_svg" alt="" /> Add </span>' : '<img src="<?= base_url(); ?>assets/img/outofstock.png" class="svg_img pro_svg" alt="" />') + '</span></div></div></div></div></div>');
                     }

                 });

             }

         });
         offset += 12;

     }
     $(document).on('click', '#ec-popnews-closem', function() {
         //  $("#ec-popnews-closem").click(function() {
         $("#ec-popnews-bg").fadeOut();
         $("#ec-popnews-box").fadeOut();
         // console.log('clod')

     });

     function ship_char(pincode, weight, totalamt, minshipamt) {
        //  console.log(totalamt);
        //  console.log(minshipamt);
         $.ajax({
             method: "POST",
             dataType: "json",
             url: "<?= base_url('Ajax/getShipping') ?>",
             data: {
                 pincode: pincode,
                 weight: weight
             },
             success: function(response) {
                 if (response == '') {
                     $("#shipping_charges").val('0');
                    // $("#placeorder").attr('disabled',true);
                     $(".shipping_charge").html('Enter Valid Pincode');
                     $("#courier_id").val();

                     $("#placeorder_msg").text('Pincode not allowed');
                 } else {
                     // get minimum amount
                     // check total amt > minimum amt
                     // add class strike shipping price
                     // text show free delivery
                     // add field in form - free_delivery in checkout table
                     // assign 1 for free delivery
                     // else 


                     if (totalamt >= minshipamt) {
                         $(".shipping_charge").html('Rs. ' + response.rate);
                         $(".shipping_charge").addClass("strike");
                         $(".shipping_msg").html('Free Delivery');
                         $("#placeorder").attr('disabled', false);
                     } else {
                         $(".shipping_charge").html('Rs. ' + response.rate);
                         $("#courier_id").val(response.courier_id);
                         $("#shipping_charges").val(response.rate);
                         $("#placeorder").attr('disabled', false);
                         $("#placeorder_msg").text('');
                     }
                 }
                 load_checkoutbar();
                 promo();
             }

         });
     }
     shipp();
     //  ship_char();
     $('#pincode').keyup(function() {
         shipp();
     });
     $(".shipping_charge_cost").val('0');
     $(".shipping_charge").html('Enter Pincode');
     $("#placeorder").attr('disabled', true);

     function shipp() {
         var pincode = $("#pincode").val();
         var weight = $("#weight").val();
         var totalamt = $('#totalamount').val();
         var minshipamt = $('#minshipamt').val();



         if (pincode.length == 6) {
             var df = ship_char(pincode, weight, totalamt, minshipamt);
         } else {
             $(".shipping_charge_cost").val('0');
             $(".shipping_charge").html('Enter Valid Pincode');
         }
     }
 </script>
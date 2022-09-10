<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body style="background:url('<?= base_url(); ?>assets/img/flower.jpg');background-size:cover;">

    <?php include('includes/menu.php'); ?>

    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Register</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Register</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ec-page-content section-space-p" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Join as Doctor</h2>
                        <h2 class="ec-title">Join as Doctor</h2>
                         <!--<p class="sub-title mb-3"><input id="doctor" type="hidden" value="yes" /> </p> -->
                    </div>
                </div>
                <div class="ec-register-wrapper">
                    <div class="row">
                        <!--<div class="ec-register-form col-md-6 ">-->
                        <!--    <div class=" mr-5">-->
                        <!--<img src="<?= base_url(); ?>assets/img/heart-curve-live-thread.jpg" class="hmimae"  alt="newsletter" style="height: 100%;width: auto;object-fit: cover;">-->
                        <!--</div>-->
                        <!--</div>-->
                        <div class="ec-register-form col-md-12 bg-white p-3">
                            <form action="<?= base_url('index/register_as_doctor') ?>" method="post" class="row" enctype="multipart/form-data">
                                <span class="col-md-6 form-group">
                                    <label>DOCTORS NAME </label>
                                    <input type="text" class="form-control" name="fullname" placeholder="Your Name:" required>
                                    <input type="hidden" class="form-control" name="premium" placeholder="Your Name:" required value="1">
                                    <input type="hidden" class="form-control" name="user_type"   required value="1">
                                    <input type="hidden" class="form-control" name="user_status"   required value="1">
                                </span>
                                  <span class="col-md-6 form-group">
                                    <label>PHONE NO</label>
                                    <input type="number" class="form-control" name="contact" placeholder="Your Contact:" required>
                                </span>
                               
                                <span class="col-md-6 form-group">
                                    <label>PHOTO</label>
                                    <input type="file" class="form-control" name="image" >

                                </span>
                                 <span class="col-md-6 form-group">
                                    <label>EMAIL ADDRESS</label>
                                    <input type="email" class="form-control" name="emailid" value="">
                                </span>
                                  <span class="col-md-6 form-group">
                                    <label>IDENTITY PROOF </label>
                                    <select name="identity" class="form-control" required>
                                        <option value=""> Select IDENTITY PROOF</option>
                                        <option value="AADHAR"> AADHAR CARD</option>
                                        <option value="DRIVING"> DRIVING LICENCE</option>
                                        <option value="VOTING"> VOTING CARD</option>
                                        <option value="PAN"> PAN CARD </option>
                                        <option value="ANY"> ANY ONE</option>
                                    </select> 
                                </span>
                                
                                   <span class="col-md-6 form-group">
                                    <label>UPLOAD IDENTITY PROOF</label>
                                    <input type="file" class="form-control" name="identitydoc" required>

                                </span>
                             
                                
                                <span class="col-md-6 form-group">
                                    <label>DEGREE </label> 
                                    <select name="degree" class="form-control b-1" required>
                                        <option value=""> Select degree</option>
                                        <option value="BAMS"> BAMS</option>
                                        <option value="BHMS"> BHMS</option>
                                        <option value="BDS"> BDS</option>
                                        <option value="MBBS"> MBBS</option>
                                        <option value="PHD"> PHD</option>
                                        <option value="OTHERS"> OTHERS</option>
                                    </select>
                                </span>
                                 <span class="col-md-6 form-group">
                                    <label>UPLOAD DEGREE</label>
                                    <input type="file" class="form-control" name="degreedoc" required >

                                </span>
                              
                             
                                <span class="col-md-6 form-group">
                                    <label>WORKING EXPERIENCE</label>
                                    <select name="workexp" class="form-control" required >
                                        <option value=""> Select WORKING EXPERIENCE</option>
                                        <option value="FRESHER"> FRESHER  </option>
                                        <option value="0-3 YEARS"> 0-3 YEARS  </option>
                                        <option value="3-5 YEARS"> 3-5 YEARS  </option>
                                        <option value="MORE THAN 5 YEARS"> MORE THAN 5 YEARS   </option>
                                         
                                    </select> 

                                </span>
                                <span class="col-md-6 form-group">
                                    <label>CURRENT PLACE OF WORK</label>
                                    <input type="text" class="form-control" name="workplace">
                                    <span>(Optional)</span>
                                </span>

                                <span class="ec-register-wrap ec-register-btn">
                                    <button class="btn btn-primary" type="submit" style="border-radius:30px;">Register</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>
    <script>
        $('#fullname').keyup(function() {
            var code = $(this).val();
            var final = code.replace(/[^a-zA-Z 0-9]+/g, '');
            $('#my_ref_code').val(final.substring(0, 3));
        });
    </script>

</body>

</html>
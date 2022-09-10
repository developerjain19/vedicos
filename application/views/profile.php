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
                            <h2 class="ec-breadcrumb-title">Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Profile</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product-details-area ptb-100">
        <div class="container">
            <!-- <b>Your referal Code is : VED<?= $profiledata[0][0]['my_ref_code'] ?><?= $profiledata[0][0]['reg_id'] ?> </b><br>
            <b>Your total referal Point : <span id="refpoint"></span> </b> -->
            <div class="text-danger text-center"><b><?php
                                                    if ($this->session->has_userdata('msg')) {
                                                        echo $this->session->userdata('msg');
                                                        $this->session->unset_userdata('msg');
                                                    }
                                                    ?></b><br></div>
            <div class="bottom">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">



                    <li class="nav-item" role="presentation">
                        <a style="border:1px blue solid; margin:1px;" class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Your profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a style="border:1px blue solid; margin:1px;" class="nav-link  " id="pills-history-tab" data-bs-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="true">Wallet History</a>
                    </li>
                    <!--<li class="nav-item" role="presentation">-->
                    <!--    <a style="border:1px blue solid; margin:1px;" class="nav-link  " id="pills-point-tab" data-bs-toggle="pill" href="#pills-point" role="tab" aria-controls="pills-point" aria-selected="true">Earned Affiliate Points</a>-->
                    <!--</li>-->
                    <!--<li class="nav-item" role="presentation">-->
                    <!--    <a style="border:1px blue solid; margin:1px;" class="nav-link  " id="pills-used-tab" data-bs-toggle="pill" href="#pills-used" role="tab" aria-controls="pills-used" aria-selected="false">Used Affiliates Point</a>-->
                    <!--</li>-->

                </ul>

                <div class="tab-content p-3 shadow m-2" id="pills-tabContent ">
                    <div class="tab-pane fade" id="pills-point" role="tabpanel" aria-labelledby="pills-point-tab">
                        <div class="bottom-description ">
                            <h3>Your Affiliate Points</h3>
                            <div class="row mt-3 p-2" style="border-top: 2px solid grey;">
                                <div class="col-md-12 ">

                                    <table class="table">
                                        <tr>
                                            <td>Date</td>
                                            <td>Product</td>
                                            <td>Affiliate Point Earned</td>
                                        </tr>
                                        <?php
                                        $rp = 0;
                                        if (!empty($pointDetails)) {
                                            foreach ($pointDetails as $row) {
                                                // $checkout = getRowById('checkout', 'id', $row['pur_id']);
                                                $product = getRowById('products', 'product_id', $row['product_id']);
                                        ?>

                                                <tr>
                                                    <td><?= convertDatedmy($row['create_date']); ?></td>
                                                    <td><?= $product[0]['pro_name'] ?></td>
                                                    <td><?= $row['ref_amt'] ?></td>
                                                </tr>
                                        <?php
                                                $rp += $row['ref_amt'];
                                            }
                                        } else {
                                            echo ' <tr>
                                <td colspan="3">No Order History Found </td>
                                
                            </tr>';
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade  show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="bottom-description">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <h4>Your Profile</h4>
                                <?php
                                if ($this->session->has_userdata('profilemsg')) {
                                    echo $this->session->userdata('profilemsg');
                                    $this->session->unset_userdata('profilemsg');
                                }
                                ?>
                                <div class="row">
                                    <div class="form-group col-md-4 ">
                                        <input type="text" class="form-control profileelement" name="fullname" placeholder="Your Name:" value="<?php echo $profiledata[0]['fullname'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <input type="email" class="form-control profileelement" name="emailid" placeholder="Your Email:" value="<?php echo $profiledata[0]['emailid'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <input type="number" class="form-control profileelement" name="contact" placeholder="Your Contact:" value="<?php echo $profiledata[0]['contact'] ?>" readonly>
                                    </div>
                                    <?php
                                    if (($this->session->has_userdata('login_user_type')) == '1') {
                                    ?>
                                        <div class="form-group col-md-4 ">

                                            <select name="degree" class="form-control b-1 profileelement" required>
                                                <option value=""> Select degree</option>
                                                <option value="BAMS" <?= (($profiledata[0]['degree'] == 'BAMS') ? 'selected' : 'disabled') ?>> BAMS</option>
                                                <option value="BHMS" <?= (($profiledata[0]['degree'] == 'BHMS') ? 'selected' : 'disabled') ?>> BHMS</option>
                                                <option value="BDS" <?= (($profiledata[0]['degree'] == 'BDS') ? 'selected' : 'disabled') ?>> BDS</option>
                                                <option value="MBBS" <?= (($profiledata[0]['degree'] == 'MBBS') ? 'selected' : 'disabled') ?>> MBBS</option>
                                                <option value="PHD" <?= (($profiledata[0]['degree'] == 'PHD') ? 'selected' : 'disabled') ?>> PHD</option>
                                                <option value="OTHERS" <?= (($profiledata[0]['degree'] == 'OTHERS') ? 'selected' : 'disabled') ?>> OTHERS</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 ">

                                            <select name="identity" class="form-control" required>
                                                <option value=""> Select IDENTITY PROOF</option>
                                                <option value="AADHAR" <?= (($profiledata[0]['identity'] == 'AADHAR') ? 'selected' : 'disabled') ?>> AADHAR CARD</option>
                                                <option value="DRIVING" <?= (($profiledata[0]['identity'] == 'DRIVING') ? 'selected' : 'disabled') ?>> DRIVING LICENCE</option>
                                                <option value="VOTING" <?= (($profiledata[0]['identity'] == 'VOTING') ? 'selected' : 'disabled') ?>> VOTING CARD</option>
                                                <option value="PAN" <?= (($profiledata[0]['identity'] == 'PAN') ? 'selected' : 'disabled') ?>> PAN CARD </option>
                                                <option value="ANY" <?= (($profiledata[0]['identity'] == 'ANY') ? 'selected' : 'disabled') ?>> ANY ONE</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 ">

                                            <select name="workexp" class="form-control profileelement" required>
                                                <option value=""> Select WORKING EXPERIENCE</option>
                                                <option value="FRESHER" <?= (($profiledata[0]['workexp']) ? 'selected' : 'disabled') ?>> FRESHER </option>
                                                <option value="0-3 YEARS" <?= (($profiledata[0]['workexp']) ? 'selected' : 'disabled') ?>> 0-3 YEARS </option>
                                                <option value="3-5 YEARS" <?= (($profiledata[0]['workexp']) ? 'selected' : 'disabled') ?>> 3-5 YEARS </option>
                                                <option value="MORE THAN 5 YEARS" <?= (($profiledata[0]['workexp']) ? 'selected' : 'disabled') ?>> MORE THAN 5 YEARS </option>

                                            </select>

                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <input type="text" class="form-control profileelement" name="workplace" placeholder="workplace" value="<?= $profiledata[0]['workplace'] ?>" required readonly>

                                        </div>
                                        <div class="form-group col-md-12 ">


                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <!-- <input type="file" class="form-control profileelement" name="profile" placeholder=" "  > -->
                                            <!-- <input type="hidden" name="profile_temp" value="<?= $profiledata[0]['profile'] ?>"  > -->

                                            <a href="<?= (('uploads/user/' . $profiledata[0]['identitydoc']  != '') ? base_url('uploads/user/' . $profiledata[0]['profile']) : '#')  ?>" class="badge badge-success">

                                                <?= (('uploads/user/' . $profiledata[0]['profile']  != '') ? 'View profile' : 'Profile File not found')  ?></a></p>
                                        </div>

                                        <div class="form-group col-md-4 ">
                                            <!-- <input type="file" class="form-control profileelement" name="degreedoc" placeholder=" "  > -->
                                            <!-- <input type="hidden" name="degreedoc_temp" value="<?= $profiledata[0]['degreedoc'] ?>"  > -->

                                            <a href="<?= (('uploads/user/' . $profiledata[0]['identitydoc']  != '') ?  base_url('uploads/user/' . $profiledata[0]['degreedoc']) : '#')  ?>" class="badge badge-success"><?= (('uploads/user/' . $profiledata[0]['degreedoc']  != '') ? 'View Degree Document' : 'Degree not found')  ?>
                                            </a></p>
                                        </div>
                                        <div class="form-group col-md-4 ">
                                            <!-- <input type="file" class="form-control profileelement" name="identitydoc" placeholder=" "  > -->
                                            <!-- <input type="hidden" name="identitydoc_temp" value="<?= $profiledata[0]['identitydoc'] ?>"  > -->
                                            <a href="<?= (('uploads/user/' . $profiledata[0]['identitydoc']  != '') ?  base_url('uploads/user/' . $profiledata[0]['identitydoc']) : '#')  ?>" class="badge badge-success">
                                                <?= (('uploads/user/' . $profiledata[0]['identitydoc']  != '') ? 'View Identity Proof ' : '  Identity Proof  not found')  ?></a></p>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-12  text-right">
                                        <button type="submit" class="btn btn-primary ediprobtn mb-5">
                                            Update Profile
                                        </button>
                                        <!-- <a id="editprofile" data-id="0" class="badge badge-danger text-white">Edit Profile</a> -->
                                    </div>
                                    <div class="form-group col-md-12   mb-4 p-5">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-used" role="tabpanel" aria-labelledby="pills-used-tab">
                        <div class="bottom-description ">
                            <h3>Used Affiliate Points</h3>
                            <div class="row mt-3 p-2" style="border-top: 2px solid grey;">
                                <div class="col-md-12 ">

                                    <table class="table">
                                        <tr>
                                            <td>Date</td>
                                            <td>Total amount</td>

                                            <td>Affiliate Point Used</td>
                                        </tr>
                                        <?php
                                        $rpused = 0;
                                        if (!empty($orderDetails)) {
                                            foreach ($orderDetails as $row) {
                                                // $checkout = getRowById('checkout', 'id', $row['pur_id']);
                                                // $product = getRowById('products', 'product_id', $row['product_id']);
                                        ?>

                                                <tr>
                                                    <td><?= convertDatedmy($row['create_date']); ?></td>

                                                    <td>Rs. <?= $row['grand_total'] ?></td>
                                                    <td><?= $row['referalpoint'] ?> Points</td>
                                                </tr>



                                        <?php
                                                $rpused += $row['referalpoint'];
                                            }
                                        } else {
                                            echo ' <tr>
                                <td colspan="3">No Order History Found </td>
                                
                            </tr>';
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                        <div class="bottom-description "><br>
                            <h3>Wallet History</h3>
                            <div class="row mt-3 p-2" style="border-top: 2px solid grey;">
                                <div class="col-md-12 ">
                                    <?php
                                    $wra = 0;
                                    $withdraw = getRowByMoreId('affiliate_withdraw', array('user_id' => $this->session->userdata('login_user_id'), 'request_status' => '1'));

                                    foreach ($withdraw as $wr) {
                                        $wra +=  $wr['points'];
                                    }
                                    ?>
                                    <p>Earned Points : <?= $rp ?></p>
                                    <p>Used Points : <?= $rpused ?></p>
                                    <p>Withdrawn Points : <?= $wra ?></p>
                                    <p>Remaining Points : <?php $remain =  ((int)$rp - (int)$rpused) - $wra;
                                                            echo $remain; ?></p>
                                    <?php

                                    if ($this->session->userdata('login_user_type') == '1') {
                                        $walletminimum = getRowById('referal_per', 'id', 2);
                                    } else {
                                        $walletminimum = getRowById('referal_per', 'id', 1);
                                    }
                                    if ($walletminimum[0]['minimum_point'] < $remain) {
                                    ?>
                                        <span class="badge badge-warning" id="withdraw">Withdraw Wallet point</span>
                                    <?php
                                    } else {
                                        echo '<span class="badge badge-primary" >Minimum limit to withdraw money is ' . $walletminimum[0]['minimum_point'] . '</span>';
                                    }

                                    ?>
                                    <form action="" method="POST">
                                        <div class="row   p-3" id="request" style="display: none;">
                                            <div class="col-md-12 mb-3 shadow p-3" style="width: 200px;"> <label>Points to withdraw</label>
                                                <input name="points" id="pointswithdraw" value="<?= $remain ?>" class="form-control mb-3" />
                                                <input name="upiid" id="upiid" class="form-control mb-3" placeholder="UPI ID" />
                                                <span class="btn btn-primary" id="withdrawrequest"> Request now </span>
                                                </ </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="bottom-description "><br>
                                <h3>Your Affiliate Points</h3>
                                <div class="row mt-3 p-2" style="border-top: 2px solid grey;">
                                    <div class="col-md-12 ">

                                        <table class="table">
                                            <tr>
                                                <td>Date</td>
                                                <td>Product</td>
                                                <td>Affiliate Point Earned</td>
                                            </tr>
                                            <?php
                                            $rp = 0;
                                            if (!empty($pointDetails)) {
                                                foreach ($pointDetails as $row) {
                                                    // $checkout = getRowById('checkout', 'id', $row['pur_id']);
                                                    $product = getRowById('products', 'product_id', $row['product_id']);
                                            ?>

                                                    <tr>
                                                        <td><?= convertDatedmy($row['create_date']); ?></td>
                                                        <td><?= $product[0]['pro_name'] ?></td>
                                                        <td><?= $row['ref_amt'] ?></td>
                                                    </tr>
                                            <?php
                                                    $rp += $row['ref_amt'];
                                                }
                                            } else {
                                                echo ' <tr>
                                <td colspan="3">No Order History Found </td>
                                
                            </tr>';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="bottom-description "><br>
                                <h3>Used Affiliate Points</h3>
                                <div class="row mt-3 p-2" style="border-top: 2px solid grey;">
                                    <div class="col-md-12 ">

                                        <table class="table">
                                            <tr>
                                                <td>Date</td>
                                                <td>Total amount</td>

                                                <td>Affiliate Point Used</td>
                                            </tr>
                                            <?php
                                            $rpused = 0;
                                            if (!empty($orderDetails)) {
                                                foreach ($orderDetails as $row) {
                                                    // $checkout = getRowById('checkout', 'id', $row['pur_id']);
                                                    // $product = getRowById('products', 'product_id', $row['product_id']);
                                            ?>

                                                    <tr>
                                                        <td><?= convertDatedmy($row['create_date']); ?></td>

                                                        <td>Rs. <?= $row['grand_total'] ?></td>
                                                        <td><?= $row['referalpoint'] ?> Points</td>
                                                    </tr>



                                            <?php
                                                    $rpused += $row['referalpoint'];
                                                }
                                            } else {
                                                echo ' <tr>
                                <td colspan="3">No Order History Found </td>
                                
                            </tr>';
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>
    <script>
        $('#refpoint').text(<?= $rp ?>);
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <?php $this->load->view('admin/template/header'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php $this->load->view('admin/template/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h4 class="page-title"> <?= $title ?> </h4>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <h4>User Details </h4>
                                <div class="col-12">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>S No</th> -->
                                                <th>fullname</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Total Affiliate Point</th>
                                                <!-- <th>Total point Used</th> -->
                                                <!-- <th>Remaining Point</th> -->
                                                <!-- <th>Total referal user</th> -->
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($registeredUser)) {
                                            foreach ($registeredUser as $row) {

                                                $referalCount = getNumRows('user_registration', array('referal_id' => 'VED' . $row['my_ref_code'] . $row['reg_id']));

                                                // print_r($referalCount);

                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <!-- <td><?php echo $i; ?></td> -->
                                                        <td><?php echo $row['fullname']; ?></td>
                                                        <td><?php echo $row['emailid']; ?></td>
                                                        <td><?php echo $row['contact']; ?></td>
                                                        <td><?php echo $row['total_ref']; ?></td>
                                                        <!-- <td><?php echo $row['total_used_ref']; ?></td>
                                                        <td><?php echo ($row['total_ref'] - $row['total_used_ref']); ?></td>
                                                        <td><?php echo $referalCount; ?></td> -->
                                                    </tr>
                                                </tbody>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>

                                <div class="col-md-12 mt-4" style="border-top: 2px solid grey;">
                                    <h4>Wallet History</h4>
                                </div>
                                <div class="col-md-12 ">
                                    <?php
                                    $wra = 0;
                                    $withdraw = getRowByMoreId('affiliate_withdraw', array('user_id' => $registeredUser[0]['reg_id'], 'request_status' => '1'));

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

                                    if ($registeredUser[0]['user_type'] == '1') {
                                        $walletminimum = getRowById('referal_per', 'id', 2);
                                    } else {
                                        $walletminimum = getRowById('referal_per', 'id', 1);
                                    }
                                    if ($walletminimum[0]['minimum_point'] < $remain) {
                                    ?>

                                    <?php
                                    } else {
                                    }
                                    ?>
                                </div>

                                <div class="col-md-12 mt-4" style="border-top: 2px solid grey;">
                                    <h4>Your Affiliate Points</h4>
                                </div>
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
                                            // echo '<tr> <td colspan="3">No Order History Found </td> </tr>';
                                        }
                                        ?>
                                    </table>
                                </div>

                                <div class="col-md-12 mt-4" style="border-top: 2px solid grey;">
                                    <h4>Used Affiliate Points</h4>
                                </div>
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
                                            // echo ' <tr>  <td colspan="3">No Order History Found </td> </tr>';
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php $this->load->view('admin/template/footer'); ?>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
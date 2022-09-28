<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <?php $this->load->view('admin/template/header'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <?php $this->load->view('admin/template/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="content-wrapper">
                        <div class="page-header mt-3">
                            <h3 class="page-title"> <?= $title ?> </h3>
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>
                             <?php
                        if ($checkout[0]['shipment_id'] != '0' && $checkout[0]['awb_code'] == '') {

                        ?>
                        Note : Order is Saved in Shiprocket.You have to manually select courier from your Shiprocket panel.
                            <!--<a href="<?= base_url('admin_dashboard/courier/' . $checkout[0]['id']) ?>" class="bn btn-danger p-1 m-1">Select courier</a>-->
                        <?php

                        }
                        ?>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="page-title">Initiate Shipping Form</h3><br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="">Package Length (in cm)</label>
                                                <input class="form-control" required="" type="text" name="length" value="<?= $checkout[0]['length'] ?>"/>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="">Package Height (in cm)</label>
                                                <input class="form-control" required="" type="text" name="height" value="<?= $checkout[0]['height'] ?>"/>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="">Package Breadth (in cm)</label>
                                                <input class="form-control" required="" type="text" name="breadth" value="<?= $checkout[0]['breadth'] ?>"/>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="">Package Weight (in kg)</label>
                                                <input class="form-control" required="" type="text" name="weight" value="<?= $checkout[0]['weight'] ?>" />
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="">Any remark</label>
                                                <textarea class="form-control" name="notes"></textarea>
                                            </div>
                                            <button type="submit" class="btn  btn-light">Submit</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-header mt-3">
                            <h3 class="page-title">Order overview</h3>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>S No</th>
                                                    <th>Name</th>
                                                    <th>Contact </th>
                                                    <th>Email </th>
                                                    <th>Address</th>
                                                    <th>Payment Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($checkout)) {
                                                    foreach ($checkout as $row) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td><?php echo $row['number']; ?></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo $row['address']; ?>, <?php echo $row['city']; ?> , <?php echo $row['state']; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['payment_type'] == '1') {
                                                                    echo 'Online Payment<br>';
                                                                    echo 'Payment ID - ' . $row['razorpay_payment_id'] . '<br>';
                                                                } else {
                                                                    echo 'COD';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-header mt-3">
                            <h3 class="page-title">Promocode details</h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Promocode </th>
                                                    <th>Promocode amt </th>
                                                    <th>Total</th>
                                                    <th>Shipping charges</th>
                                                     <th>Used Referal Point</th>
                                                    <th>Grand Total </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row['promocode']; ?></td>
                                                    <td><?php echo $row['promocode_amt']; ?></td>
                                                    <td>Rs. <?php echo $row['totalamount']; ?> /-</td>
                                                    <td>Rs. <?php echo $row['shipping_charges']; ?> /-</td>
                                                     <td> <?php if($row['referalpoint'] != '') { echo $row['referalpoint']; } else
                                                {
                                                echo 'No Points';
                                                }?> </td>
                                                    <td>Rs. <?php echo $row['grand_total']; ?> /-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-header mt-3">
                            <h3 class="page-title">Any notes</h3>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Any notes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (!empty($checkout)) {
                                                    foreach ($checkout as $row) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $row['notes']; ?></td>
                                                        </tr>
                                                <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-header mt-3">
                            <h3 class="page-title">Product list </h3>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>S No</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Price </th>
                                                    <th>Quantity</th>
                                                    <th>Total Amount</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $i = 1;
                                            $ship_product = array();
                                            if (!empty($checkoutProduct)) {
                                                foreach ($checkoutProduct as $row) {
                                            ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><img src="<?php echo base_url('uploads/products/' . $row['product_img']); ?>" /></td>
                                                            <td><?php echo $row['product_name']; ?></td>
                                                            <td>Rs. <?php echo $row['product_price']; ?> /-</td>
                                                            <td><?php echo $row['product_quantity']; ?></td>
                                                            <td>Rs. <?php echo $row['total_pro_amt']; ?> /-</td>
                                                        </tr>
                                                    </tbody>
                                            <?php
                                                    $i++;
                                                    $prod = array(
                                                        "name" => $row['product_name'],
                                                        "sku" => $row['product_id'],
                                                        "units" => (int)$row['product_quantity'],
                                                        "selling_price" => (int)$row['total_pro_amt'],
                                                        "discount" => "",
                                                        "tax" => "",
                                                        "hsn" => ""
                                                    );
                                                    array_push($ship_product, $prod);
                                                }
                                            }
                                            ?>
                                        </table>
                                        <input type="hidden" name="ship_product" value="<?php print_r($ship_product); ?>" />
                                        <!-- <input type="hidden" name="weight" value="1" /> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
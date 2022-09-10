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

                <div class="content-wrapper">
                    <div class="page-header mt-3">
                        <h3 class="page-title">
                            <?= $title ?> </h3>
                        <?php
                        if ($this->session->has_userdata('msg')) {
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg');
                        }
                        ?>
                        <!-- </div>
                    <div class="row">
                        <div class="col-md-6"> -->
                        <span class="btn btn-<?= (($checkout[0]['status'] == 0) ? 'info' : (($checkout[0]['status'] == 1) ? 'warning' : (($checkout[0]['status'] == 2) ? 'danger' : (($checkout[0]['status'] == 3) ? 'success' : (($checkout[0]['status'] == '4') ? 'warning' : (($checkout[0]['status'] == '5') ? 'info' : (($checkout[0]['status'] == '6') ? 'info' : (($checkout[0]['status'] == '7') ? 'secondary' : (($checkout[0]['status'] == '8') ? 'warning' : (($checkout[0]['status'] == '9') ? 'warning' : '')))))))))) ?>" data-toggle="modal" data-target="#exampleModal<?= $checkout[0]['id'] ?>">

                            <?php echo (($checkout[0]['status'] == '0') ? 'New order' : (($checkout[0]['status'] == '1') ? 'On process' : (($checkout[0]['status'] == '2') ? 'Cancel requested' : (($checkout[0]['status'] == '3') ? 'Order delivered' : (($checkout[0]['status'] == '4') ? 'Cancelled and refunded' : (($checkout[0]['status'] == '5') ? 'Shipment' : (($checkout[0]['status'] == '6') ? 'On the way' : (($checkout[0]['status'] == '7') ? 'Order Cancelled' : (($checkout[0]['status'] == '8') ? 'Request for return' : (($checkout[0]['status'] == '9') ? 'Order return initiated' : 'as')))))))))); ?>

                        </span>
                        <?php
                        if ($checkout[0]['status'] == 2) {

                        ?>
                            <a href="<?= base_url(
                                            'admin_dashboard/cancelorder/' . $checkout[0]['order_id'] . '/' . $checkout[0]['awb_code']
                                        ) ?>" class="bn btn-danger p-1 m-1"> Cancel this order</a>
                        <?php

                        }
                        ?>
                        <!-- </div>
                        <div class="col-md-6"> -->
                        <?php
                        if ($checkout[0]['status'] == 8) {

                        ?>
                            <a href="<?= base_url('admin_dashboard/returnorder/' . $checkout[0]['id']) ?>" class="bn btn-danger p-1 m-1">Return order</a>
                        <?php

                        }
                        ?>
                        <!-- </div> -->
                    </div>
                    <div class="page-header mt-3">
                        <h3 class="page-title"> Shipping Details</h3>
                        <?php
                        if ($checkout[0]['status'] == 0 || $checkout[0]['status'] == 1 || $checkout[0]['status'] == 5) {
                            if ($checkout[0]['awb_code'] != '') {
                        ?>
                                <a href="<?= ('https://vedicos.shiprocket.co/tracking/' . $checkout[0]['awb_code']) ?>" target="_blank" class="bn btn-info p-1 m-1"> Track Order</a>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label class="">Package Length : </label><br />
                                            <?= $checkout[0]['length'] ?> cm.
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label class="">Package Height : </label><br />
                                            <?= $checkout[0]['height'] ?> cm.
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label class="">Package Breadth : </label><br />
                                            <?= $checkout[0]['breadth'] ?> cm.
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="">Package Weight : </label><br />
                                            <?= $checkout[0]['weight'] ?> Kg.
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label class="">Order id</label><br />
                                            <?= $checkout[0]['order_id'] ?>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="">Shipment id</label><br />
                                            <?= $checkout[0]['shipment_id'] ?>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="">AWB no.</label><br />
                                            <?= $checkout[0]['awb_code'] ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="">Any remark</label>
                                            <?= $checkout[0]['notes'] ?>
                                        </div>

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

                                                <th>total</th>
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

                                                        <td>Rs. <?php echo $row['totalamount']; ?> /-</td>


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
                                                <th>Grand Total </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['promocode']; ?></td>
                                                <td><?php echo $row['promocode_amt']; ?></td>
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
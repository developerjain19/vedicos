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
                        <h3 class="page-title"> <?= $title ?> </h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-responsive w-100">
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
                                    <table class="table table-responsive w-100">
                                        <thead>
                                            <tr>
                                                <th>Promocode </th>
                                                <th>Promocode amt </th>
                                                <th>Total</th>
                                                <th>Shipping charges</th>
                                                <th>Grand Total </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['promocode']; ?></td>
                                                <td><?php echo $row['promocode_amt']; ?></td>
                                                <td>Rs. <?php echo $row['totalamount']; ?> /-</td>
                                                <td>Rs. <?php echo $row['shipping_charges']; ?> /-</td>
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
                                    <table class="table table-responsive w-100">
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





                                    <table class="table table-responsive w-100">
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
                                        if (!empty($checkoutProduct)) {
                                            foreach ($checkoutProduct as $row) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><img src="<?php echo base_url('uploads/products/'.$row['product_img']); ?>" /></td>
                                                        <td><?php echo $row['product_name']; ?></td>
                                                        <td>Rs. <?php echo $row['product_price']; ?> /-</td>
                                                        <td><?php echo $row['product_quantity']; ?></td>
                                                        <td>Rs. <?php echo $row['total_pro_amt']; ?> /-</td>
                                                    </tr>
                                                </tbody>
                                        <?php
                                                $i++;
                                            }
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
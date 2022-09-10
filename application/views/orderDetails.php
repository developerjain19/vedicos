<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>
 <style>
/*     table * {*/
/*  display: contents;*/
/*}*/
/*table {*/
/*  display: flex;*/
/*  flex-direction:column;*/
/*}*/
/*th, td {*/
/*  display:block;*/
/*  text-align:center;*/
/*}*/
/*tr > *:nth-child(1) { order:1;}*/
/*tr > *:nth-child(2) { order:2;}*/
/*tr > *:nth-child(3) { order:3;}*/
/*tr > *:nth-child(4) { order:4;}*/
/*tr > *:nth-child(5) { order:5;}*/
/*tr > *:nth-child(6) { order:6;}*/
/*tr > *:nth-child(7) { order:7;}*/
/*tr > *:nth-child(8) { order:8;}*/

@media only screen and (max-width: 40em) {
    table * {
  display: contents;
}
table {
  display: flex;
  flex-direction:column;
}
th, td {
  display:block;
  text-align:center;
}
tr > *:nth-child(1) { order:1;}
tr > *:nth-child(2) { order:2;}
tr > *:nth-child(3) { order:3;}
tr > *:nth-child(4) { order:4;}
tr > *:nth-child(5) { order:5;}
tr > *:nth-child(6) { order:6;}
tr > *:nth-child(7) { order:7;}
tr > *:nth-child(8) { order:8;}
}
 </style>
<body>

    <?php include('includes/menu.php'); ?>

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Your order detail</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Your order detail</li>
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

            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Name</th>
                                                <th>Contact </th>
                                                <th>Email </th>
                                                <th>Address</th>
                                                <th>Payment Details</th>

                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($orderDetails)) {
                                                foreach ($orderDetails as $row) {
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
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Promocode </th>
                                                <th>Promocode amt </th>
                                                <th>Shipping Charges</th>
                                                <th>Grand Total </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['promocode']; ?></td>
                                                <td><?php echo $row['promocode_amt']; ?></td>
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
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Any notes</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            if (!empty($orderDetails)) {
                                                foreach ($orderDetails as $row) {
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





                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price </th>
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Add review</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($orderProductDetails)) {
                                            foreach ($orderProductDetails as $row) {
                                                // print_r($row);
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><img src="<?php echo base_url('uploads/products/'.$row['product_img']); ?>" style="width: 70px;"/></td>
                                                        <td><?php echo $row['product_name']; ?></td>
                                                        <td>Rs. <?php echo $row['product_price']; ?> /-</td>
                                                        <td><?php echo $row['product_quantity']; ?></td>
                                                        <td>Rs. <?php echo $row['total_pro_amt']; ?> /-</td>
                                                        <td><a href="<?= base_url() ?>index/product_review/<?= $row['product_id'] ?>" >Add review</a></td>
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
    </div>
 
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>
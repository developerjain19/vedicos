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
                    <div class="page-header">
                        <h3 class="page-title"> <?= $title ?> </h3>
                        <?php
                        if ($this->session->has_userdata('msg')) {
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg');
                        }
                        ?>

                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label>Search by status</label>
                                        <select name="orderstatus" class="form-control">
                                            <option value="0">New</option>
                                            <option value="1">Order Ready</option>
                                            <option value="5">Shipment Initaited</option>
                                            <option value="6">On The Way</option>
                                            <option value="3">Order delivered</option>
                                            <option value="8">Order Returned request</option>
                                            <option value="4">Order Returned</option>
                                            <option value="2">Order cancelled request</option>
                                            <option value="7">Order cancelled</option>
                                        </select>
                                    </div>
                                    <div class="col-6"><br><br>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>


                            <div class="row">
                                <div class="col-12">
                                    <table id="datatable" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Contact </th>
                                                <!-- <th>Address</th> -->
                                                <th>Grand total</th>
                                                <th>View details</th>
                                                <th>Ship Order</th>
                                                <th>Order Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($checkout)) {
                                            foreach ($checkout as $row) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td style="word-wrap: break-word;"> <?php echo  wordwrap(convertDatedmyhis($row['create_date']), 10, '<br>'); ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['number']; ?></td>
                                                        <!-- <td><?php echo wordwrap($row['address'], 20, '<br>'); ?></td> -->
                                                        <td> Rs. <?php echo $row['grand_total']; ?><br><span class="text-secondary">( <?php echo (($row['payment_type'] == '1') ? 'Online Payment' : 'COD'); ?> )</span></td>
                                                        <td><a href="<?php echo base_url() . 'admin_Dashboard/OrderPlacedDetails/' . $row['id']; ?>" class="btn btn-danger  "><i class="fas fa-eye"></i></a></td>
                                                        <td><?php
                                                            if ($row['awb_assign_status'] == 1) {
                                                            ?>
                                                                <a href="<?php echo base_url() . 'admin_Dashboard/shiporder_track/' . $row['id']; ?>" class="btn btn-danger  "> Shiprocket</a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?php echo base_url() . 'admin_Dashboard/shiporder/' . $row['id']; ?>" class="btn btn-danger  "> Shiprocket</a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Update status
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="<?= base_url('admin_Dashboard/statusupdate') ?>" method="POST">
                                                                            <div class="modal-body">
                                                                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                                                                <select name="status" class="form-control">
                                                                                    <option value="0">New</option>
                                                                                    <option value="1">Order Ready</option>
                                                                                    <option value="5">Shipment Initaited</option>
                                                                                    <option value="6">On The Way</option>
                                                                                    <option value="3">Order delivered</option>
                                                                                    <option value="4">Order Returned</option>
                                                                                    <option value="7">Confirm Cancel Order</option>
                                                                                    <option value="9">Order Return Initiated</option>
                                                                                </select>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="btn btn-<?= (($row['status'] == 0) ? 'info' : (($row['status'] == 1) ? 'warning' : (($row['status'] == 2) ? 'danger' : (($row['status'] == 3) ? 'success' : (($row['status'] == '4') ? 'warning' : (($row['status'] == '5') ? 'info' : (($row['status'] == '6') ? 'info' : (($row['status'] == '7') ? 'secondary' : (($row['status'] == '8') ? 'warning' :(($row['status'] == '9') ? 'warning' : '')))))))))) ?>" data-toggle="modal" data-target="#exampleModal<?= $row['id'] ?>">

                                                                <?php echo (($row['status'] == '0') ? 'New order' : (($row['status'] == '1') ? 'On process' : (($row['status'] == '2') ? 'Cancel requested' : (($row['status'] == '3') ? 'Order delivered' : (($row['status'] == '4') ? 'Cancelled and refunded' : (($row['status'] == '5') ? 'Shipment' : (($row['status'] == '6') ? 'On the way' : (($row['status'] == '7') ? 'Order Cancelled' : (($row['status'] == '8') ? 'Request for return' :(($row['status'] == '9') ? 'Order return initiated' : '')))))))))); ?>

                                                            </button>

                                                        </td>


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
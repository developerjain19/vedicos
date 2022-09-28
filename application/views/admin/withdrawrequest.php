<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div class="container-scroller">



        <?php $this->load->view('admin/template/header'); ?>

        <div class="container-fluid page-body-wrapper">
             <?php $this->load->view('admin/template/sidebar'); ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> <?= $title ?> </h3>

                    </div>
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-12">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>User</th>
                                                <th>Points</th>
                                                <th>Receipt </th>
                                                <th>UPI Id </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($affiliate_withdraw)) {
                                            foreach ($affiliate_withdraw as $row) {
                                                $userrow = getRowById('user_registration', 'reg_id', $row['user_id'])[0];

                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $userrow['fullname']; ?>
                                                            <br>Contact -  <?php echo $userrow['contact']; ?>
                                                        </td>
                                                        <td><?php echo $row['points']; ?> </td>
                                                        <td><?php echo (($row['payment'] == '')? '':'<a href="'.base_url('uploads/withdrawrequest/'.$row['payment']).'">View Receipt</a>'); ?> </td>
                                                        <td><?php echo $row['upiid']; ?> </td>
                                                        <td>
                                                            <?php
                                                            if ($row['request_status'] == '0') {
                                                            ?>
                                                                <span data-id="<?= $row['id']; ?>" class="btn btn-success accept">Accept</span>
                                                                <span data-id="<?= $row['id']; ?>" class="btn btn-danger decline">Decline</span>
                                                                <div id="requestfile<?= $row['id']; ?>" style="display: none;">
                                                                    <form action="<?= base_url('admin_Dashboard/acceptrequest') ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="row form-group m-3 p-3" style="border:1px solid grey;">
                                                                            <div class="col-md-12">
                                                                                <label>Select withdraw receipt -</label><br>
                                                                                <input type="file" name="image" class="form-control" />
                                                                                <input type="hidden" name="id" value="<?= $row['id']; ?>" class="form-control" />
                                                                            </div>
                                                                            
                                                                            <div class="col-md-12"><br>
                                                                                <input type="submit" value="upload & accept" class="btn btn-primary" />
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            <?php
                                                            } elseif ($row['request_status'] == '1') {
                                                            ?>
                                                                <span class="btn btn-success  ">Accepted</span>
                                                            <?php
                                                            } elseif ($row['request_status'] == '2') {
                                                            ?>
                                                                <span class="btn btn-danger  ">Declined</span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                        <?php
                                                $i++;
                                            }
                                        } else {
                                            // echo  'No contact query exists';
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
    <script>
        $("body").on("click", ".delete", function() {
            var id = $(this).data('id');
            if (confirm("Are you sure to delete it ??")) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin_Dashboard/deleteblog') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data deleted');
                        window.location = '<?= base_url('admin_Dashboard/bloglist') ?>';
                    }
                });
            }
        });
    </script>
</body>

</html>
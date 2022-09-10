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
                    </div>
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-12">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>fullname</th> 
                                                 
                                                
                                                <?php if($tag == 'unblocked'){ ?>
                                                <th>View orders</th>
                                                <th>Usertype</th>
                                                <th>Affiliate Info</th>
                                                 
                                                 <?php } ?>
                                                <?php if($tag == 'blocked'){ ?>
                                                 <th>Approve User</th>
                                                  <?php } ?>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($registeredUser)) {
                                            foreach ($registeredUser as $row) {
                                                $orderCount = getNumRows('checkout',array('user_id'=>$row['reg_id']));
                                                $referalCount = getNumRows('affliate_purchase',array('user_id'=>$row['reg_id']));
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?= (($row['user_type'] == '1')? '<img src="'.base_url().'assets/img/doctor.png" style="width:25px;height:25px" />':'') ?><?php echo $row['fullname']; ?><br>Contact - <?php echo $row['contact']; ?></td>
                                                        <td></td>
                                                        <!-- <td><?php echo $row['password']; ?></td> -->
                                                         <?php if($tag == 'unblocked'){ ?>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/orderPlaced/' . $row['reg_id']; ?>" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> (<?= $orderCount ?>)</a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/updateUsertype/' . $row['reg_id']; ?>/<?= (($row['premium'] == '0')? '1':'0') ?>" class="btn btn-danger"><?= (($row['premium'] == '0')? 'Normal':'Premium') ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/referalInfo/' . $row['reg_id']; ?>/<?= 'VED'.$row['my_ref_code'].$row['reg_id'] ?>" class="btn btn-danger"><?= $referalCount ?> purchase</a>
                                                        </td>
                                                         <?php } ?>
                                                        <?php if($tag == 'blocked'){
                                                            ?>
                                                            <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/approveuser/' . $row['reg_id']; ?>" class="btn btn-warning">Approve user</a>
                                                        </td>
                                                        <?php } ?>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/viewuserdetails/' . $row['reg_id']; ?>" class="btn btn-danger"><i class="fas fa-eye"></i></a>
                                                            <span data-id="<?= $row['reg_id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></span>
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
    <script>
        $("body").on("click", ".delete", function() {
            var id = $(this).data('id');
            if (confirm("Are you sure to delete it ??")) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin_Dashboard/blockuser') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data deleted');
                        window.location = '<?= base_url('admin_Dashboard/'.$page) ?>';
                    }
                });
            }
        });
    </script>
</body>

</html>
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
                                                <th>Date</th>
                                                <th>Name</th>
                                                 
                                                <th>Message</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if(!empty($contact) ){
                                        foreach ($contact as $row) {
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo convertDatedmyhis($row['create_date']); ?></td> 
                                                    <td><?php echo $row['name']; ?><br>Email - <?php echo $row['email']; ?><br>Phone - <?php echo $row['phone']; ?></td> 
                                                    <td><?php echo wordwrap($row['message'],50,'<br>'); ?></td> 
                                                    <td>
                                                    <span data-id="<?= $row['cid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></span>
                                                        <!-- <a href="<?php echo base_url() . 'admin_Dashboard/deletecontact/' . $row['cid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a> -->
                                                    </td>

                                                </tr>
                                            </tbody>
                                        <?php
                                            $i++;
                                        }
                                    }else{
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
                    url: "<?= base_url('admin_Dashboard/deletecontact') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data deleted');
                        window.location = '<?=  base_url('admin_Dashboard/contact_query')  ?>';
                    }
                });
            }
        });
    </script>
</body>

</html>
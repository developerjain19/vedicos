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
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <a href="<?= base_url('admin_Dashboard/add_privacypolicy'); ?>"><button class="btn btn-dark">Add <?= $title ?></button></a>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-12">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Particulars</th> 
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($privacypolicy)) {
                                            foreach ($privacypolicy as $row) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo wordwrap(substr(strip_tags($row['particulars']),0,150),60,'<br>'); ?>....</td>
                                                        
                                                        <td>
                                                            <!-- <a href="<?php echo base_url() . 'admin_Dashboard/deleteprivacypolicy/' . $row['ppid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a> -->
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/editprivacypolicy/' . $row['ppid']; ?>" class="btn btn-danger  "><i class="fas fa-pencil"></i></a>
                                                            <span data-id="<?= $row['ppid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></span>
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
                    url: "<?= base_url('admin_Dashboard/deleteprivacypolicy') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data deleted');
                        window.location = '<?= base_url('admin_Dashboard/privacyPolicy') ?>';
                    }
                });
            }
        });
    </script>
</body>

</html>
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
                                <a href="<?= base_url('admin_Dashboard/add_videos'); ?>"><button class="btn btn-dark">Add <?= $title ?></button></a>
                            </ol>
                        </nav>
                    </div>
                     
                    <div class="row mt-3">
                        <div class="col-md-12    ">
                            <div class="card">

                                <div class="card-body">
                                    <h4> Videos list</h4>
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Banner</th>
                                                <th>Video</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        foreach ($videos as $row) {
                                            $rows = getRowById('video_cat','id',$row['v_category']);
                                            
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo wordwrap($row['v_title'] , 50, '<br>'); ?></td>
                                                    <td><?php echo $rows[0]['name']; ?> Video</td>
                                                    <td><img src="<?= base_url() ?>uploads/videos/<?= $row['v_banner'] ?>" width="100px" /></td>
                                                    <td><a href="<?php echo $row['v_url']; ?>" target="_blank"> Play</a></td>
                                                    <td>
                                                        <!-- <a href="<?php echo base_url() . 'admin_Dashboard/deletevideo/' . $row['vid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a> -->
                                                        <span data-id="<?= $row['vid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></span>
                                                        &nbsp;

                                                        <a href="<?php echo base_url() . 'admin_Dashboard/editvideo/' . $row['vid']; ?>" class="btn btn-danger  "><i class="fas fa-pencil"></i></a>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        <?php
                                            $i++;
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
                    url: "<?= base_url('admin_Dashboard/deletevideo') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data deleted');
                        window.location = '<?= base_url('admin_Dashboard/videos') ?>';
                    }
                });
            }
        });
    </script>
</body>

</html>
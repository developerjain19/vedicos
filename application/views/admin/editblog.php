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
                        <!-- <a href="<?= base_url('admin_Dashboard'); ?>/view_products"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a> -->
                        <h3 class="page-title">Edit Blog</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <?php foreach ($blogs as $row) {
                                        // print_r($row);
                                    ?>
                                        <form action="<?php echo base_url() . 'admin_Dashboard/editblogdetails/' . $row['bid'] ?>" method="post" enctype="multipart/form-data" id="updatedata">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="">
                                                        <!-- <input class="form-control" type="hidden" name="id" value="<?= $row['bid']; ?>"> -->
                                                        <div class="form-group">
                                                            <label class="">Blogs Title</label>
                                                            <input class="form-control" type="text" name="b_title" value="<?= $row['b_title']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">Blogs Cover Image</label>
                                                            <input class="form-control" type="file" name="image" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">Blogs Particulars</label>
                                                            <textarea cols="80" id="editor1" name="b_content" rows="10"><?= $row['b_content']; ?></textarea>
                                                        </div>
                                                        <span class="btn btn-light edit">Update</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial:partials/_footer.html -->
                        <?php $this->load->view('admin/template/footer'); ?>
                        <!-- partial -->
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $('#category_id').change(function() {
            var category_id = $('#category_id').val();
            console.log(category_id);
            $.ajax({
                method: "POST",
                url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
                data: {
                    category_id: category_id
                },
                success: function(response) {
                    $('#sub_category_id').html(response);
                }
            });
        });
        
    </script>
</body>

</html>
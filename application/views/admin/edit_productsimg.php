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
                        <a href="<?= base_url('admin_Dashboard/view_products'); ?>"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a>
                        <h3 class="page-title">Add Products Image</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12  ">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class=""> Upload Image </label>
                                                        <div class="pos-relative">
                                                            <input class="form-control pd-r-80" required="" type="file" name="img">
                                                        </div>
                                                    </div>
                                                    <button name="submit" class="btn  btn-light">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        foreach ($productimg as $img) {
                                        ?>
                                            <div class="col-md-3 col-lg-3 col-xl-3 p-1">
                                                <img src="<?= base_url('uploads/products/') . $img['pi_name'] ?>" style="width: 100%;" class="shadow" />
                                                <a href="<?php echo base_url() . 'admin_Dashboard/deleteproductimg/' . $img['pi_id'].'/'.$img['product_id'] ; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
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
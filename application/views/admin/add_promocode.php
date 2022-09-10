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
                        <a href="<?= base_url('admin_Dashboard/view_promocode'); ?>"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a>
                        <h3 class="page-title"><?= $title ?> </h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12    ">
                            <div class="card">
                                <div class="card-body">

                                    <form action="<?php echo base_url('admin_Dashboard/addpromocode') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label class="">Promocode</label>
                                                        <input class="form-control" required="" type="text" name="title" required placeholder="SAVE100">
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label class="">Amount Deduction</label>
                                                        <input class="form-control" required="" type="text" name="deduction" required placeholder="200">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="">Description</label>

                                                        <textarea class="form-control "  required="" name="description" placeholder="Short description here"></textarea>

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="">Terms of promocode</label>

                                                        <textarea class="form-control " id="editor1" required="" name="terms"placeholder="Brief description here"></textarea>

                                                    </div>

                                                    <button type="submit" class="btn btn-light">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
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
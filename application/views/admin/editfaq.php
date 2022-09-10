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
                        <a href="<?= base_url('admin_Dashboard/faq'); ?>"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a>
                        <h3 class="page-title"><?= $title ?> </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12    ">
                            <div class="card">
                                <div class="card-body">

                                    <form action="" method="post" enctype="multipart/form-data" id="updatedata">
                                        <div class="row">

                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class="">FAQ Title</label>
                                                        <input class="form-control" required="" type="text" name="f_title" value="<?= $faq[0]['f_title']; ?>" />
                                                    </div> 
                                                    <div class="form-group">
                                                        <label class="">FAQ Particulars</label>
                                                        <textarea class="form-control" required=""  name="f_description" required><?= $faq[0]['f_description']; ?></textarea>
                                                    </div> 
                                                    <span class="btn btn-light edit">Update</span>
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
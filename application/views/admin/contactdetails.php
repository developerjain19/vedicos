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
                        <!-- <a href="<?= base_url('admin'); ?>/view_products"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a> -->
                        <h3 class="page-title"><?= $title ?></h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <?php foreach ($contactdetails as $row) {
                                    ?>

                                        <form action="<?php echo base_url() . 'admin_Dashboard/editcontactdetils' ?>" method="post" enctype="multipart/form-data" id="updatedata">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">

                                                        <div class="form-group col-md-3">
                                                            <label class="">First Contact</label>
                                                            <input class="form-control" type="text" name="f_contact" value="<?= $row['f_contact'] ?>">
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label class="">Second Contact</label>
                                                            <input class="form-control" type="text" name="s_contact" value="<?= $row['s_contact'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="">First Email</label>
                                                            <input class="form-control" type="text" name="f_email" value="<?= $row['f_email'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="">Second Email</label>
                                                            <input class="form-control" type="text" name="s_email" value="<?= $row['s_email'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="">Address</label>
                                                            <input class="form-control" type="text" name="address" value="<?= $row['address'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="">Facebook link</label>
                                                            <input class="form-control" type="text" name="facebook" value="<?= $row['facebook'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="">Twitter link</label>
                                                            <input class="form-control" type="text" name="twitter" value="<?= $row['twitter'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="">Instagram link</label>
                                                            <input class="form-control" type="text" name="instagram" value="<?= $row['instagram'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="">LinkedIn link</label>
                                                            <input class="form-control" type="text" name="linkedin" value="<?= $row['linkedin'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="">Youtube link</label>
                                                            <input class="form-control" type="text" name="youtube" value="<?= $row['youtube'] ?>">
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
     
</body>

</html>
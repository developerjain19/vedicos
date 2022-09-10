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
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <a href="<?= base_url('admin_Dashboard/add_category'); ?>"><button class="btn btn-dark">Add <?= $title ?></button></a>
                            </ol>
                        </nav> -->
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="row">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="title" class="form-control" value="<?= $title_data ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="row">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                                        <div class="col-md-10">
                                                            <textarea name="description" id="editor1"  style="width: 100%"><?= $description ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id="save" class="btn btn-primary w-md">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
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
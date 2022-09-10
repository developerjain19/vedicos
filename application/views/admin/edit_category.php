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
                        <a href="<?= base_url('admin'); ?>/view_products"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a>
                        <h3 class="page-title"><?= $title ?></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>/view_category">View category</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <?php foreach ($categoryInfo as $row) {
                                    ?>

                                        <form action="<?php echo base_url() . 'admin_Dashboard/editcategory' ?>" method="post" enctype="multipart/form-data" id="updatedata">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="">
                                                        <input class="form-control" type="hidden" name="id" value="<?= $row->category_id; ?>">


                                                        <div class="form-group">
                                                            <label class="">Category Name</label>
                                                            <input class="form-control" type="text" name="cat_name" value="<?= $row->cat_name; ?>">
                                                        </div>



                                                        <img src="<?php echo base_url();
                                                                    ?>uploads/category/<?php echo $row->image ?>" width="130px" />

                                                        <div class="form-group">
                                                            <label class=""> Image</label>
                                                            <div class="pos-relative">
                                                                <input class="form-control pd-r-80" type="file" name="image">
                                                            </div>
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
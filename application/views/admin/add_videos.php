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
                        <div class="col-md-12    ">
                            <div class="card">

                                <div class="card-body">
                                    <h4>Add Videos</h4>
                                    <form action="<?php echo base_url('admin_Dashboard/addvideos') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="">Videos title</label>

                                                <select class="form-control" name="v_category">
                                                    <?php
                                                    foreach ($video_cat as $cat) {
                                                    ?>
                                                        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?> Video</option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="">Videos title</label>
                                                <input class="form-control" required="" type="text" name="v_title" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="">Videos url</label>
                                                <div class="pos-relative">
                                                    <input class="form-control pd-r-80" required="" type="url" name="v_url">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="">Videos Banner</label>
                                                <div class="pos-relative">
                                                    <input class="form-control pd-r-80" required="" type="file" name="v_banner">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="">Videos Description</label>
                                                <div class="pos-relative">
                                                    <textarea class="form-control pd-r-80" id="editor1" name="v_discription"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class=""><br></label>
                                                <div class="pos-relative">
                                                    <button type="submit" class="btn  btn-light">Submit</button>
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
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div class="container-scroller">

        <?php $this->load->view('admin/template/header'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php $this->load->view('admin/template/sidebar'); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12    ">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if ($this->session->has_userdata('msg')) {
                                        echo $this->session->userdata('msg');
                                        $this->session->unset_userdata('msg');
                                    }
                                    ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label class="">Shipping Amount</label>
                                                        <input class="form-control" required="" type="text" name="minamt" value="<?= $shipping[0]['minamt'] ?>" />
                                                    </div>

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


                <?php $this->load->view('admin/template/footer'); ?>
                <!-- partial -->
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
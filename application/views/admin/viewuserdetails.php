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
                    </div>
                    <div class="card mb-2">
                        <div class="card-body">


                            <div class="row">
                                <?php
                                foreach ($registeredUser as $user) {
                                    // print_r($user);
                                ?>
                                    <div class="col-4">
                                        <p class="text-dark text-uppercase"><b>fullname - </b><?= $user['fullname'] ?></p>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-dark text-uppercase"><b>emailid - </b><?= $user['emailid'] ?></p>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-dark text-uppercase"><b>contact - </b><?= $user['contact'] ?></p>
                                    </div>
                                    
                                    <?php
                                    // echo $user['user_type'];
                                    if ($user['user_type'] == '1') {
                                    ?>
                                        <div class="col-4">
                                            <p class="text-dark text-uppercase"><b>degree - </b><?= $user['degree'] ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-dark text-uppercase"><b>identity - </b><?= $user['identity'] ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-dark text-uppercase"><b>profile - </b><a href="<?= ((file_exists(('./uploads/user/'.$user['profile'])))? base_url().'uploads/user/'.$user['profile']:'#')  ?>" class="badge badge-success" target="_blank">View profile</a></p>
                                        </div>
                                        
                                        <div class="col-4">
                                            
                                            <p class="text-dark text-uppercase"><b>degreedoc - </b><a href="<?= ((file_exists(('./uploads/user/'.$user['degreedoc'])))? base_url().'uploads/user/'.$user['degreedoc']:'#')  ?>" class="badge badge-success" target="_blank" >View Degree Document</a></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-dark text-uppercase"><b>identitydoc - </b><a href="<?= ((file_exists(('./uploads/user/'.$user['identitydoc'])))? base_url().'uploads/user/'.$user['identitydoc']:'#')  ?>" class="badge badge-success" target="_blank" >View Identity Proof   </a></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-dark text-uppercase"><b>workexp - </b><?= $user['workexp'] ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-dark text-uppercase"><b>workplace - </b><?= $user['workplace'] ?></p>
                                        </div>
                                <?php
                                    }
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
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
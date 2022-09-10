<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>

<body>

    <?php include('includes/menu.php'); ?>

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title"> <?= $videos[0]['v_title'] ?></h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Videos Details</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Sart Single product -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-8 col-md-8">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <?php
                                $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $videos[0]['v_url']);
                        
                                ?>
                            <iframe width="100%" height="500" src="<?= $url ?>" allowfullscreen="0">
                                </iframe>
                                <!-- <img src="<?= base_url('uploads/blog/') ?><?php echo $videos[0]['b_image']; ?>" /> -->
                            </div>
                            <?php echo $videos[0]['v_discription']; ?>
                        </div>
                    </div>
                </div>
                <div class="ec-pro-rightside ec-common-rightside col-lg-4 col-md-4 pt-5">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <h4>Recommended Videos -</h4>
                            <div class="row">
                                <?php
                                foreach ($allvideos_list as $row) {
                                ?>
                                    <div class="col-lg-12 col-md-12 col-6 mb-2">
                                        <a href="<?= base_url(); ?>index/video_detail/<?= $row['vid']; ?>">
                                            <div class="ec-cat-bnr shadow row m-1 p-1">
                                                <div class="col-lg-3 col-md-3  ">
                                                    <img src="<?= base_url('') ?><?= (($row['v_banner'] == '')? 'uploads/default.jpg':'uploads/videos/'.$row['v_banner'])  ?>" style="width:100%;height:60px;object-fit:cover;" />
                                                </div>
                                                <div class="col-lg-9 col-md-9  ">
                                                    <div class="text-center p-2 ">

                                                        <h6 class="text-uppercase"> <?= $row['v_title'] ?></h6>

                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>
    <!-- End Single product -->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>
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
                            <h2 class="ec-breadcrumb-title"> <?= $blogs[0]['b_title'] ?></h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Blogs Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
   <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-8 col-md-8">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">

                                <img src="<?= base_url() ?><?= (($blogs[0]['b_image'] == '')? 'uploads/default.jpg':'uploads/blog/'.$blogs[0]['b_image'])  ?>" class="bimage" />
                            </div><br>
                            <?php echo $blogs[0]['b_content']; ?>
                        </div>
                    </div>
                </div>
                <div class="ec-pro-rightside ec-common-rightside col-lg-4 col-md-4">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <h4>Other Blogs -</h4>
                            <div class="row">
                                <?php
                                foreach ($blogs_list as $row) {
                                ?>
                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <a href="<?= base_url(); ?>index/blog_details/<?= $row['bid']; ?>">
                                            <div class="ec-cat-bnr shadow row m-1 p-1">
                                                <div class="col-lg-3 col-md-3  ">
                                                    <img src="<?= base_url() ?><?= (($row['b_image'] == '')? 'uploads/default.jpg':'uploads/blog/'.$row['b_image'])  ?>" style="width:100%;height:60px;object-fit:cover;" />
                                                </div>
                                                <div class="col-lg-9 col-md-9  ">
                                                    <div class="text-center p-3 ">
                                                        <h6 class="text-uppercase"> <?= $row['b_title'] ?></h6>
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
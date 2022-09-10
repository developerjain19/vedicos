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
                            <h2 class="ec-breadcrumb-title">Blogs section</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Videos section</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <section class="ec-bnr-detail margin-bottom-30 section-space-pt">
        <div class="ec-page-detail">
            <div class="container">
                <div class="ec-main-heading d-none">
                    <h2>Shop <span>Detail</span></h2>
                </div>
                <div class="row">
                    <?php
                    foreach ($blogs as $row) {
                    ?>
                        <div class="col-lg-4 col-md-12">
                            <a href="<?= base_url(); ?>index/blog_details/<?= $row['bid']; ?>" >
                            <div class="ec-cat-bnr shadow">
                                <img src="<?= base_url() ?><?= (($row['b_image'] == '')? 'uploads/default.jpg':'uploads/blog/'.$row['b_image'])  ?>" style="width:100%;height:200px;object-fit:cover;" />
                                <div class="text-center">
                                <br>
                                    <h6 class="text-uppercase"> <?= $row['b_title'] ?></h6><br>
                                    <!--<a href="<?= base_url(); ?>index/blog_details/<?= $row['bid']; ?>" class="btn  btn-primary">Read blog</a>-->
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
    </section>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>
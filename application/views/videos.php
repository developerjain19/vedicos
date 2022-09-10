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
                            <h2 class="ec-breadcrumb-title">Videos section</h2>
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
                    foreach ($videos as $row) {
                        // $url = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $row['v_url']);
                        $rows = getRowById('video_cat', 'id', $row['v_category']);
                    ?>
                        <div class="col-lg-4 col-md-12 mb-4">
                            <a href="<?= base_url('Index'); ?>/video_detail/<?= $row['vid'] ?>">
                                <div class="ec-cat-bnr shadow">
                                    <!-- <iframe width="100%" height="300" src="<?= $url ?>">
                                </iframe> -->
                                    <img src="<?= base_url() ?><?= (($row['v_banner'] == '')? 'uploads/default.jpg':'uploads/videos/'.$row['v_banner'])  ?>" style="object-fit: cover;width: 100%;height: 250px;" />
                                    <div class="text-center p-2 ">
                                        <h6 class="text-uppercase"> <?= $row['v_title'] ?></h6>
                                        <i><?php echo $rows[0]['name']; ?> Video</i>
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
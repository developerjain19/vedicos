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
                            <h2 class="ec-breadcrumb-title">Our deals  and Promocode</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Our deals  and Promocode</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->
    <section class="section ec-category-section ec-category-wrapper-1 section-space-p ec-test-section " style="background-image: url('<?= base_url() ?>assets/img/blue.png');background-size:auto 100%">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our deals and combo offer</h2>
                        <h2 class="ec-title">Our deals and combo offer</h2>
                        <p class="sub-title  ">Browse our deals and combo offer</p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-t-15">
                <?php
                $i = 1;
                if (!empty($promocode)) {
                    foreach ($promocode as $row) {
                ?>
                        <div class="col-md-4 col-6">
                            <a href="<?= base_url('index'); ?>/promocode_details/<?php echo $row['pid']; ?>">
                            <div class="ec-card-grid-space">
                                <div class="ec-card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(<?= base_url() ?>uploads/promocode/<?= $row['img'] ?>); background-position: center;">
                                    <div class="ec-num"><?php echo $i; ?></div>
                                    <h1><?php echo $row['title']; ?></h1>
                                    <p><?php echo $row['description']; ?>
                                    </p>
                                    <!-- <div class="ec-date">7 jul 2021-2022</div> -->
                                    <div class="ec-tags">
                                        <input type="hidden" value="<?php echo $row['title']; ?>" id="myInput<?php echo $i; ?>">
                                        <!-- <button class="ec-tag" onclick="myFunction()" data-id="<?php echo $i; ?>">Copy Code</button> -->
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!--<section class="ec-card-blog section-space-p">-->
    <img src="https://www.vedicos.in/assets/img/slider1.jpg" style="width:100%" alt="">
<!--</section>-->
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>
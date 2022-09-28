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
                            <h2 class="ec-breadcrumb-title">Products</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="ec-breadcrumb-item active">Products</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end --> 

    <!-- Ec Shop page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">


                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="sec-fw el-prod">
                            <div class="row" id="filter_data">
                            </div>
                        </div>
                        <input type="hidden" value="<?= $search ?>" id="search" />


                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div id="shop_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1>View Products By</h1>
                        </div>
                        <div class="ec-sidebar-wrap">
                              <div class="ec-sidebar-block">

                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Sub Categories:</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <?php if (!empty($subcategory)) {
                                            foreach ($subcategory as $row) {
                                                $count = getNumRows('products', array('subcategory_id' => $row['sub_category_id']));
                                        ?>
                                                <li>
                                                    <div class="ec-sidebar-block-item">
                                                        <input type="checkbox" class="common_selector subcategory" value="<?php echo $row['sub_category_id']; ?>" <?= (($row['sub_category_id'] == $subcateid) ? 'Checked' : '')  ?>> <?= $row['subcat_name']; ?> <span> (<?= $count ?>)</span>
                                                    </div>
                                                </li>

                                        <?php }
                                        } ?>


                                    </ul>
                                </div>
                            </div>
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Category</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul>
                                        <?php if (!empty($sidecategory)) {
                                            foreach ($sidecategory as $row) {
                                                $count = getNumRows('products', array('category_id' => $row['category_id'])); ?>
                                                <li>
                                                    <div class="ec-sidebar-block-item">
                                                        <input type="checkbox" class="common_selector category" value="<?php echo $row['category_id']; ?>" <?= (($row['category_id'] == $cateid) ? 'Checked' : '')  ?>> <?= $row['cat_name']; ?><span>(<?= $count ?>)</span>
                                                    </div>
                                                </li>
                                        <?php }
                                        } ?>

                                    </ul>
                                </div>
                            </div>
                         
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>



<script>
    $(document).ready(function() {

        filter_data();

        function filter_data() {
            $('#filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
          
            var search = $('#search').val();

            var category = get_filter('category');
            var subcategory = get_filter('subcategory');



            $.ajax({
                url: "<?= base_url('Index/filterData') ?>",
                method: "POST",
                data: {
                    category: category,
                    subcategory: subcategory,
                    search: search
                   

                },
                success: function(data) {
                    console.log(data);
                    $('#filter_data').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function() {
            filter_data();
        });
      

        $('#get_subcategory').change(function() {
            var get_subcategory = $('#get_subcategory').val();
            // console.log(get_subcategory);
            filter_data();
        });



    });
</script>
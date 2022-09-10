<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body class="sidebar-fixed">
    <div class="container-scroller">

        <?php $this->load->view('admin/template/header'); ?>
        <div class="container-fluid page-body-wrapper">
           <?php $this->load->view('admin/template/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Products on offer</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <a href="<?= base_url('admin_Dashboard/add_products'); ?>"><button class="btn btn-dark">Add Product</button></a>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <span id="salemsg"></span>
                                    <span id="featuredmsg"></span>
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Category Name</th>
                                                <!-- <th>Sub Category Name</th> -->
                                                <th>Product Name</th>
                                                <!-- <th>On sale</th> -->
                                                <th>Featured </th>
                                                <!-- <th>Product Image</th> -->
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
if( $products != ''){
                                        foreach ($products as $row) {
                                            $catt = getRowById('category', 'category_id', $row['category_id']);
                                            $cat = getRowById('sub_category', 'sub_category_id', $row['subcategory_id']);
                                            $imgcount = getNumRows('products_image', array('product_id' => $row['product_id']));
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $catt[0]['cat_name']; ?><br>subcategory - <?php echo (($row['subcategory_id'] != 0) ? $cat[0]['subcat_name'] : ''); ?></td>
                                                    <td><?php echo $row['pro_name']; ?></td>
                                                    <!-- <td> -->
                                                    <!-- <img src="<?php echo base_url();  ?>uploads/products/<?php echo $row['img1']; ?>" style="width: 50px;height: 50px;" /> -->
                                                    <!-- </td> -->

                                                    <td class="d-none">
                                                        
                                                        <select name="sale" class="form-control" id="sale" data-id="<?= $row['product_id'] ?>" >
                                                            <option value="1" <?= (($row['sale'] == '1')? 'selected':'') ?>>Yes</option>
                                                            <option value="0" <?= (($row['sale'] == '0')? 'selected':'') ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td> 
                                                        <select name="featured" class="form-control" id="featured"  data-id="<?= $row['product_id'] ?>">
                                                        <option value="1" <?= (($row['featured'] == '1')? 'selected':'') ?>>Yes</option>
                                                            <option value="0" <?= (($row['featured'] == '0')? 'selected':'') ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td  class="d-none">
                                                        <a href="<?php echo base_url() . 'admin_Dashboard/edit_productsimg/' . $row['product_id']; ?>" class="btn btn-danger edit"><i class="fa fa-file-image"></i> (<?= $imgcount ?>)</a>
                                                    </td>
                                                    <td>


                                                        <a href="<?php echo base_url() . 'admin_Dashboard/edit_products/' . $row['product_id']; ?>" class="btn btn-danger edit"><i class="fas fa-pencil-alt"></i></a>

                                                        <a href="<?php echo base_url() . 'admin_Dashboard/deleteproducts/' . $row['product_id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>

                                                        <a href="<?php echo base_url() . 'admin_Dashboard/disable/' . $row['product_id'] . '/products/' . (($row['status'] == 1) ? '0' : '1'); ?>" class="btn btn-danger delete"><?php if ($row['status'] == 0) { ?><i class="fas fa-eye"></i><?php } else { ?> <i class="fas fa-eye-slash"></i><?php } ?></a>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        <?php
                                            $i++;
                                        }
}
                                        ?>
                                    </table>
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
    <script>
        $('#sale').change(function() {
            var sale = $('#sale').val();
            var pid = $(this).data('id');
            // console.log(df);
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin_Dashboard/productOnSale') ?>",
                data: {
                    sale: sale,
                    pid:pid
                },
                success: function(response) {
                    $('#featuredmsg').html('');
                    $('#salemsg').html('Product is on Sale Now');
                }
            });
        });
        $('#featured').change(function() {
            var featured = $('#featured').val();
            var pid = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin_Dashboard/featuredProduct') ?>",
                data: {
                    featured: featured,
                    pid:pid
                },
                success: function(response) {
                    $('#salemsg').html('');
                    $('#featuredmsg').html('Product is featured Now');
                }
            });
        });
    </script>
</body>

</html>
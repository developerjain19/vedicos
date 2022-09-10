<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>
<style>
    .bhm {
        white-space: nowrap;
        width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        border: none;
        display: inline-block;
        border-radius: none;
    }
</style>

<body class="sidebar-fixed">
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
                        <h3 class="page-title"> Products </h3>
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
                                     
                                    <span id="salemsg" class="text-danger"></span>
                                    <span id="featuredmsg" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    if ($this->session->has_userdata('msg')) {
                                        echo $this->session->userdata('msg');
                                        $this->session->unset_userdata('msg');
                                    }
                                    ?>
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Category Name</th>
                                                <th>Product Name</th>
                                                 <th> Out of Stock</th>
                                                <th>Featured </th>
                                               
                                                <th>Gallery</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if ($products != '') {

                                            foreach ($products as $row) {
                                                $catt = getRowById('category', 'category_id', $row['category_id']);
                                                $cat = getRowById('sub_category', 'sub_category_id', $row['subcategory_id']);
                                                $imgcount = getNumRows('products_image', array('product_id' => $row['product_id']));
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>

                                                        <td><?php echo $catt[0]['cat_name']; ?><br>subcategory - <?php echo (($row['subcategory_id'] != 0) ? $cat[0]['subcat_name'] : ''); ?></td>

                                                        <td title="<?php echo $row['pro_name']; ?>"><span class="bhm"><?php echo $row['pro_name']; ?></span></td>
                                                        <!-- <td> -->
                                                        <!-- <img src="<?php echo base_url();  ?>uploads/products/<?php echo $row['img1']; ?>" style="width: 50px;height: 50px;" /> -->
                                                        <!-- </td> -->

                                                        <td class="d-none">

                                                            <select name="sale" class="form-control sale" id="sale<?= $row['product_id'] ?>" data-id="<?= $row['product_id'] ?>">
                                                                <option value="1" <?= (($row['sale'] == '1') ? 'selected' : '') ?>>Yes</option>
                                                                <option value="0" <?= (($row['sale'] == '0') ? 'selected' : '') ?>>No</option>
                                                            </select>
                                                        </td>
                                                        <td>

                                                            <select name="outofstock" class="form-control outofstock" id="outofstock<?= $row['product_id'] ?>" data-id="<?= $row['product_id'] ?>">
                                                                <option value="1" <?= (($row['outofstock'] == '1') ? 'selected' : '') ?>>Yes</option>
                                                                <option value="0" <?= (($row['outofstock'] == '0') ? 'selected' : '') ?>>No</option>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <select name="featured" class="form-control featured" id="featured<?= $row['product_id'] ?>" data-id="<?= $row['product_id'] ?>">
                                                                <option value="1" <?= (($row['featured'] == '1') ? 'selected' : '') ?>>Yes</option>
                                                                <option value="0" <?= (($row['featured'] == '0') ? 'selected' : '') ?>>No</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/edit_productsimg/' . $row['product_id']; ?>" class="btn btn-danger edit"><i class="fa fa-file-image"></i> (<?= $imgcount ?>)</a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() . 'admin_Dashboard/edit_products/' . $row['product_id']; ?>" class="btn btn-danger  "><i class="fas fa-pencil-alt"></i></a>
                                                            <span data-id="<?= $row['product_id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></span>
                                                            <!-- <a href="<?php echo base_url() . 'admin_Dashboard/deleteproducts/' . $row['product_id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a> -->

                                                        </td>


                                                    </tr>
                                                    <!-- <a href="<?php echo base_url() . 'admin_Dashboard/disable/' . $row['product_id'] . '/products/' . (($row['status'] == 1) ? '0' : '1'); ?>" class="btn btn-danger delete"><?php if ($row['status'] == 0) { ?><i class="fas fa-eye"></i><?php } else { ?> <i class="fas fa-eye-slash"></i><?php } ?></a> -->

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
<script>
    $('.outofstock').change(function() {
        var pid = $(this).data('id');
        var outofstock = $('#outofstock' + pid).val();

        // console.log(df);
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin_Dashboard/productoutofstock') ?>",
            data: {
                outofstock: outofstock,
                pid: pid
            },
            success: function(response) {
                console.log(response);
                $('#featuredmsg').html('');
                $('#salemsg').html('Product is out of stock');
            }
        });
    });
    $('.featured').change(function() {
        var pid = $(this).data('id');
        var featured = $('#featured' + pid).val();


        // alert(featured);

        $.ajax({
            method: "POST",
            url: "<?= base_url('admin_Dashboard/featuredProduct') ?>",
            data: {
                featured: featured,
                pid: pid
            },
            success: function(response) {
                console.log(response);
                $('#salemsg').html('');
                $('#featuredmsg').html('Product is featured Now');


            }
        });
    });
</script>
<script>
    $("body").on("click", ".delete", function() {
        var id = $(this).data('id');
        if (confirm("Are you sure to delete it ??")) {
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin_Dashboard/deleteproducts') ?>",
                data: {
                    id: id
                },
                success: function(response) {
                    alert('Data deleted');
                    window.location = '<?= (($page == 'offer') ? base_url('admin_Dashboard/view_offerproducts') : base_url('admin_Dashboard/view_products')) ?>';
                }
            });
        }
    });
</script>
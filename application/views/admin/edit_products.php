<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div class="container-scroller">

        <?php $this->load->view('admin/template/header'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php $this->load->view('admin/template/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="page-header">
                        <a href="<?= base_url('admin_Dashboard'); ?>/view_products"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a>
                        <h3 class="page-title">Edit Products</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <?php foreach ($productInfo as $row) {
                                        //  print_r($row);
                                    ?>

                                        <form action="<?php echo base_url() . 'admin_Dashboard/editproductdetails' ?>" method="post" enctype="multipart/form-data" id="updatedata">
                                            <div class="row">

                                                <div class="col-md-12 col-lg-12 col-xl-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label class="">Is product on offer ?</label><br>
                                                            <input type="radio" value="0" name="offer" <?= (($row['offer'] == '0') ? 'checked' : ''); ?>> No <br>
                                                            <input type="radio" value="1" name="offer" <?= (($row['offer'] == '1') ? 'checked' : ''); ?>> Yes
                                                        </div>
                                                        <div class="form-group col-md-4" id="offer_per">
                                                            <label class="">Offer percentage (if product is on offer)</label>

                                                            <input class="form-control" required="" type="text" name="offer_per" value="<?= $row['offer_per']; ?>">
                                                        </div>
                                                        <input class="form-control" type="hidden" name="id" value="<?= $row['product_id']; ?>">
                                                        <div class="form-group  col-md-4">
                                                            <label class="">Product Category Name</label>
                                                            <select class="form-control" name="category_id" id="category_id">
                                                                <option>Select Product Category</option>
                                                                <?php foreach ($category as $rows) {
                                                                ?>
                                                                    <option value="<?= $rows['category_id']; ?>" <?= (($rows['category_id'] == $row['category_id']) ? 'selected' : '') ?>><?= $rows['cat_name']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-md-4">
                                                            <label class="">Product Sub Category Name</label>
                                                            <select class="form-control" name="subcategory_id" id="sub_category_id">
                                                                <?php
                                                                $subcat = getRowById('sub_category', 'sub_category_id', $row['subcategory_id']);
                                                                ?>
                                                                <option value="<?= $subcat[0]['sub_category_id']; ?>"><?= $subcat[0]['subcat_name']; ?></option>

                                                            </select>
                                                        </div>

                                                        <div class="form-group  col-md-4">
                                                            <label class="">Product Name</label>
                                                            <input class="form-control" type="text" name="pro_name" value="<?= $row['pro_name']; ?>">
                                                        </div>

                                                        <div class="form-group  col-md-4">
                                                            <label class="">Product Price</label>
                                                            <input class="form-control" type="text" name="price" value="<?= $row['price']; ?>">
                                                        </div>

                                                        <div class="form-group  col-md-4">
                                                            <label class="">Product Old Price (will be displayed , when product is on sale)</label>
                                                            <input class="form-control" type="text" name="old_price" value="<?= $row['old_price']; ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="">Product Weight (in KG)</label>
                                                            <input class="form-control" required="" type="text" placeholder="0.5" name="weight" value="<?= $row['weight']; ?>">
                                                        </div>
                                                        <div class="form-group  col-md-12">
                                                            <label class="">Product Description</label>
                                                            <textarea cols="80" id="editor1" name="description" rows="10"><?= $row['description']; ?></textarea>
                                                        </div>

                                                        <div class="form-group  col-md-6">
                                                            <label class=""> Upload new Image 1</label>
                                                            <div class="pos-relative">
                                                                <input class="form-control pd-r-80" type="file" name="img1">
                                                            </div>
                                                        </div>


                                                        <div class="form-group   col-md-6">
                                                            <label class="">Upload new Image 2</label>
                                                            <div class="pos-relative">
                                                                <input class="form-control pd-r-80" type="file" name="img2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group  col-md-6">
                                                            <label class=""> Image 1</label>
                                                            <div class="pos-relative">
                                                                <img src="<?= base_url() ?>uploads/products/<?= $row['img1']; ?>" style="width:200px" />
                                                            </div>
                                                        </div>


                                                        <div class="form-group   col-md-6">
                                                            <label class=""> Image 2</label>
                                                            <div class="pos-relative">
                                                                <img src="<?= base_url() ?>uploads/products/<?= $row['img2']; ?>" style="width:200px" />
                                                            </div>
                                                        </div>

                                                        <span class="btn btn-light edit">Update</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial:partials/_footer.html -->
                        <?php $this->load->view('admin/template/footer'); ?>
                        <!-- partial -->
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php $this->load->view('admin/template/footer_link'); ?>
    <script>
        $('#category_id').change(function() {
            var category_id = $('#category_id').val();
            console.log(category_id);
            $.ajax({
                method: "POST",
                url: '<?= base_url('admin_Dashboard/get_subcategory') ?>',
                data: {
                    category_id: category_id
                },
                success: function(response) {
                    $('#sub_category_id').html(response);
                }
            });
        });
    </script>
</body>

</html>
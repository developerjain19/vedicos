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
                        <a href="<?= base_url('admin_Dashboard/view_products'); ?>"><button class="btn btn-dark"><i class="fas fa-long-arrow-left"></i></button></a>
                        <h3 class="page-title">Add Products</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <form action="<?php echo base_url() . 'admin_Dashboard/addproducts' ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="">Is product on offer ?</label><br>
                                                        <input type="radio" value="0" name="offer" class="offerbtn" checked=""> No <br>
                                                        <input type="radio" value="1" name="offer" class="offerbtn"> Yes
                                                    </div>
                                                    <div class="form-group col-md-4" id="offer_per" style="display:none">
                                                        <label class="">Offer percentage (if product is on offer)</label>

                                                        <input class="form-control" type="text" name="offer_per">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Category Name</label>
                                                        <select class="form-control" name="category_id" id="category_id">
                                                            <option>Select Product Category</option>
                                                            <?php foreach ($category as $row) {
                                                            ?>
                                                                <option value="<?= $row['category_id']; ?>"><?= $row['cat_name']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Sub Category Name</label>
                                                        <select class="form-control" name="subcategory_id" id="sub_category_id">
                                                            <option>Select Product Category</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Name</label>
                                                        <input class="form-control" required="" type="text" name="pro_name">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Price</label>
                                                        <input class="form-control" type="text" name="price">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Old Price </label>
                                                        <input class="form-control" type="text" name="old_price">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Weight (in KG)</label>
                                                        <input class="form-control" required="" type="text" placeholder="0.5" value="0.5" name="weight">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="">Product Description</label>
                                                        <textarea cols="80" id="editor1" name="description" rows="10"></textarea>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class=""> Image 1</label>
                                                        <div class="pos-relative">
                                                            <input class="form-control pd-r-80" required="" type="file" name="img1">
                                                        </div>
                                                    </div>


                                                    <div class="form-group col-md-6">
                                                        <label class=""> Image 2</label>
                                                        <div class="pos-relative">
                                                            <input class="form-control pd-r-80" type="file" name="img2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class=""> Video</label>
                                                        <div class="pos-relative">
                                                            <input class="form-control pd-r-80" type="url" name="url">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group col-md-4">
                                                        <label class="">Product Lenght(in cm)</label>
                                                        <input class="form-control" required="" type="text" value="0.5" name="lenght">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Breadth(in cm)</label>
                                                        <input class="form-control" required="" type="text" value="0.5" name="breadth">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="">Product Height(in cm)</label>
                                                        <input class="form-control" required="" type="text" value="0.5" name="height">
                                                    </div> -->

                                                    <div class="form-group col-md-12">
                                                        <button type="submit" class="btn  btn-light">Submit</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
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
        $('input[name="offer"]').change(function() {
            var offer = $('input[name="offer"]:checked').val();
            console.log(offer);
            if (offer == 1) {
                $('#offer_per').show();
            } else {
                $('#offer_per').hide();
            }
        });

        offer_per
    </script>
</body>

</html>
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
                        <h3 class="page-title"> <?= $title ?> </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <a href="<?= base_url('admin_Dashboard/add_subcategory'); ?>"><button class="btn btn-dark">Add <?= $title ?></button></a>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-12">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Category Name</th>
                                                <th>Sub Category Name</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                                <!--<th>Enable/ disable</th>-->
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        foreach ($category as $row) {
                                            $cat = getRowById('category','category_id',$row['cat_id']);
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo ((empty($cat[0]['cat_name']))? 'deleted':$cat[0]['cat_name']); ?></td>
                                                    <td><?php echo $row['subcat_name']; ?></td>
                                                    <td>
                                                        <img src="<?php echo base_url();
                                                                    ?>uploads/subcategory/<?php echo $row['image']; ?>" style="width: 50px;height: 50px;" />
                                                    </td>

                                                    <td>
                                                        <a href="<?php echo base_url() . 'admin_Dashboard/edit_subcategory/' . $row['sub_category_id']; ?>" class="btn btn-danger  "><i class="fas fa-pencil-alt"></i></a>
                                                        <span data-id="<?= $row['sub_category_id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></span>
                                                        <!-- <a href="<?php echo base_url() . 'admin_Dashboard/deletesubcategory/' . $row['sub_category_id']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a> -->
 </td>

                                                    <!--<td>-->
                                                    <!--    <a href="<?php echo base_url() . 'admin_Dashboard/disable/' . $row['sub_category_id'].'/sub_category/'.(($row['status'] == 1)? '0':'1'); ?>" class="btn btn-danger delete"><?php if($row['status'] == 0){ ?><i class="fas fa-eye"></i><?php }else{?> <i class="fas fa-eye-slash"></i><?php } ?></a>-->
                                                    <!--</td>-->

                                                </tr>
                                            </tbody>
                                        <?php
                                            $i++;
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
        $("body").on("click", ".delete", function() {
            var id = $(this).data('id');
            if (confirm("Are you sure to delete it ??")) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin_Dashboard/deletesubcategory') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data deleted');
                        window.location = '<?= base_url('admin_Dashboard/view_subcategory') ?>';
                    }
                });
            }
        });
    </script>
</body>

</html>
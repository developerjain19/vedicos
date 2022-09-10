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
                         
                        <h3 class="page-title"><?= $title ?> </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12   mb-3 ">
                            <p class="text-success"><?php
                            if ($this->session->has_userdata('msg')) {
                             echo $this->session->userdata('msg');
                             $this->session->unset_userdata('msg');
                            }
                            ?></p>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                             
                                            
                                            <div class="form-group col-md-3">
                                                <label class="">  Name</label>
                                                <input class="form-control" required="" type="text" name="name" />
                                            </div>
                                             <div class="form-group col-md-3">
                                                        <label class=""> Image 1</label>
                                                       
                                                            <input class="form-control pd-r-80" required="" type="file" name="img1">
                                                        
                                                    </div>
                                            <div class="form-group col-md-6">
                                                <label class="">  Testimonial</label>
                                                <input class="form-control" required="" type="text" name="testimonial" />
                                            </div>
                                            <button type="submit" class="btn  btn-light">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Particulars</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 1;
                                        if (!empty($testimonials)) {
                                            foreach ($testimonials as $row) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td> 
                                                        <td>
                                                            <?php echo wordwrap($row['name'], 120, '<br>'); ?><br>
                                                        </td>
  <td> 
                                                         <img src="<?php echo base_url();  ?>uploads/testimonial/<?php echo $row['image']; ?>" style="width: 50px;height: 50px;" /> 
                                                         </td> 
                                                        <td>
                                                            <?php echo wordwrap($row['testimonial'], 120, '<br>'); ?>
                                                        </td>

                                                        <td>
                                                            <!-- <a href="<?php echo base_url() . 'admin_Dashboard/deletetestimonials/' . $row['tid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a> -->
                                                            <span data-id="<?= $row['tid']; ?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></span>
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
        $("body").on("click", ".delete", function() {
            var id = $(this).data('id');
            if (confirm("Are you sure to delete it ??")) {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin_Dashboard/deletetestimonials') ?>",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert('Data deleted');
                        window.location = '<?= base_url('admin_Dashboard/testimonials') ?>';
                    }
                });
            }
        });
    </script>
</body>

</html>
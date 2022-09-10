<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/template/header_link',$title); ?>

<body class="sidebar-fixed">
  <div class="container-scroller">
    <?php $this->load->view('admin/template/header'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php $this->load->view('admin/template/sidebar'); ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Product count</h5>
                   
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $category ?></h3>
                  <p class="mt-0 mb-2">Main Category</p>
                  <hr>
                   
                  
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $products ?></h3>
                  <p class="mt-0 mb-2">Product</p>

                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">  Visitors count</h5>

                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $user_registration ?></h3>
                  <p class="mt-0 mb-2">Registered Users</p>
                  <hr>
                  
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $contact_query ?></h3>
                  <p class="mt-0 mb-2">Contact Query</p>
                   
                </div>
              </div>
            </div>
            <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Order count</h5>
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $new ?></h3>
                  <p class="mt-0 mb-2">New Order</p>
                  <hr>
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $working ?></h3>
                  <p class="mt-0 mb-2">On-working order</p>
                    
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Order count</h5>
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $cancelled ?></h3>
                  <p class="mt-0 mb-2">Cancelled Order</p>
                  <hr>
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?= $completed ?></h3>
                  <p class="mt-0 mb-2">Completed order</p>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12 grid-margin stretch-card">
            <?php
if ($this->session->has_userdata('msg')) {
 echo $this->session->userdata('msg');
 $this->session->unset_userdata('msg');
}
?>
</div>
            <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Update Normal User Affiliate  %</h5>
                  <form action="<?= base_url() ?>admin_Dashboard/refupdate" method="POST" class="form-group">
                  <input type="text" class="form-control" name="percen" value="<?= $normal[0]['percen'] ?>"/><br>
                  <input type="hidden" class="form-control" name="id" value="1"/> 
                  <input type="submit" class="btn btn-primary" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Update premium User Affiliate %</h5>
                  <form action="<?= base_url() ?>admin_Dashboard/refupdate" method="POST" class="form-group">
                  <input type="text" class="form-control" name="percen" value="<?= $premium[0]['percen'] ?>"/><br>
                  <input type="hidden" class="form-control" name="id" value="2"/> 
                  <input type="submit" class="btn btn-primary" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Amount in menu</h5>
                  <form action="<?= base_url() ?>admin_Dashboard/lineupdate" method="POST" class="form-group">
                  <input type="text" class="form-control" name="impline" value="<?= $line[0]['impline'] ?>"/><br> 
                  <input type="submit" class="btn btn-primary" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12 grid-margin stretch-card"> Set cart minimum amount available for points discount in percentage </div>
            <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Update Normal User - Cart percentage  </h5>
                  <form action="<?= base_url() ?>admin_Dashboard/minimum_valueupdate" method="POST" class="form-group">
                  <input type="text" class="form-control" name="minimum_value" value="<?= $normal[0]['minimum_value'] ?>"/><br>
                  <input type="hidden" class="form-control" name="id" value="1"/> 
                  <input type="submit" class="btn btn-primary" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Update premium User - Cart percentage </h5>
                  <form action="<?= base_url() ?>admin_Dashboard/minimum_valueupdate" method="POST" class="form-group">
                  <input type="text" class="form-control" name="minimum_value" value="<?= $premium[0]['minimum_value'] ?>"/><br>
                  <input type="hidden" class="form-control" name="id" value="2"/> 
                  <input type="submit" class="btn btn-primary" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12 grid-margin stretch-card"> Set User minimum point for using the points</div>
            <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Update Normal User - minimum point validation </h5>
                  <form action="<?= base_url() ?>admin_Dashboard/minimum_pointupdate" method="POST" class="form-group">
                  <input type="text" class="form-control" name="minimum_point" value="<?= $normal[0]['minimum_point'] ?>"/><br>
                  <input type="hidden" class="form-control" name="id" value="1"/> 
                  <input type="submit" class="btn btn-primary" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-5 text-dark font-weight-normal">Update premium User - minimum point validation </h5>
                  <form action="<?= base_url() ?>admin_Dashboard/minimum_pointupdate" method="POST" class="form-group">
                  <input type="text" class="form-control" name="minimum_point" value="<?= $premium[0]['minimum_point'] ?>"/><br>
                  <input type="hidden" class="form-control" name="id" value="2"/> 
                  <input type="submit" class="btn btn-primary" value="Update"/>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <?php $this->load->view('admin/template/footer'); ?>
      </div>
    </div>
  </div>
  <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>
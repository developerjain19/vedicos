<!DOCTYPE html>
<html lang="zxx">

<?php include('includes/header.php'); ?>
<style>
    .hmwid{
        width:60%;
    }
    @media only screen and (max-width: 600px) {
  .hmwid{
        width:90%;
    }
}
</style>
<body>

    <?php include('includes/menu.php'); ?>

     
     <section class="section ec-instagram-section module section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Team Member</h2>
                        <h2 class="ec-title">Our Team Member</h2>
                        <p class="sub-title">Meet Vedicos Team Members</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ec-insta-wrapper">
            <div class="ec-insta-outer">
                <div class="container" data-animation="fadeIn">
                    
                         
                        <?php foreach ($team as $row) { ?>
                            
                                <div class="row">
                                <div class="col-md-4 text-center bg-white">
                                     <img src="<?= base_url('uploads/ourteam/' . $row['timage']); ?>" alt="Vedicos Team" style="width:100%"></a>
                                   
                                </div>
                                <div class="col-md-8 ">
                                     <h4><?= $row['tname'] ?></h4>
                                    <p><?= $row['tdesignation'] ?></p>
                                     <p><?= $row['tprofile'] ?></p>
                              </div>
                        <?php } ?>
                   
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/script.php'); ?>

</body>

</html>
<?php
$user_session = $this->session->userdata('sms_admin');
if (!isset($user_session) && empty($user_session)) {
    redirect(base_url('admin'));
}
?>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo  p-1" href="<?php echo base_url('admin'); ?>"><img src="<?= base_url(); ?>assets/images/logo.png" alt="logo" style="background-color: white;"/></a>
        <a class="navbar-brand brand-logo-mini p-1" href="<?php echo base_url('admin'); ?>"><img src="<?= base_url(); ?>assets/images/logo.png" alt="logo" style="background-color: white;"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="<?= base_url(); ?>assets/admin/images/faces-clipart/pic-1.png" alt="image" >
                    </div>
                    <div class="nav-profile-text">Admin
                        <!-- <p class="mb-1 text-black">Vedisco</p> -->
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">

                    <div class="p-2">
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="<?php echo base_url() . 'admin/logout'; ?>">
                            <span>Log Out</span>
                            <i class="mdi mdi-logout ml-1"></i>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
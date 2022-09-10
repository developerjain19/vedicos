<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!--<li class="nav-item nav-category">Main</li>-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Category-layouts" aria-expanded="false" aria-controls="Category-layouts">
                <span class="icon-bg"> <i class="mdi mdi-apps menu-icon"></i> </span>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Category-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/view_category'); ?>">Main Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/view_subcategory'); ?>">Sub Category</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Products-layouts" aria-expanded="false" aria-controls="Products-layouts">
                <span class="icon-bg"> <i class="mdi mdi-apps menu-icon"></i> </span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Products-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/add_products'); ?>">Add New Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/view_products'); ?>">All Products</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/view_offerproducts'); ?>">Products on Offer</a></li>
                </ul>
            </div>
        </li>

         
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/contact_query'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Contact Query</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/promocode'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Promocode</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/orderPlaced'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Order Placed</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#User-layouts" aria-expanded="false" aria-controls="User-layouts">
                <span class="icon-bg"> <i class="mdi mdi-apps menu-icon"></i> </span>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="User-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/registeredUser'); ?>">Registered User</a></li>
                    
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/registeredPremiumUser'); ?>">Premium User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/blockedUser'); ?>">Pending User</a></li>
                </ul>
            </div>
        </li>
         
        <!--<li class="nav-item">-->
        <!--    <a class="nav-link" href="<?= base_url('admin_Dashboard/privacyPolicy'); ?>">-->
        <!--        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>-->
        <!--        <span class="menu-title">Privacy policy</span>-->
        <!--    </a>-->
        <!--</li>-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/faq'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">FAQ</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#videos-layouts" aria-expanded="false" aria-controls="videos-layouts">
                <span class="icon-bg"> <i class="mdi mdi-apps menu-icon"></i> </span>
                <span class="menu-title">Videos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="videos-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/add_videos'); ?>">Add Videos  </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/videos'); ?>">Videos  </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/ourteam'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Our Team</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/view_products'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Delivery Charges</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/contactdetails'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Contact Details /<br> Social links</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/banner'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Home Banner</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/insta'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Instagram </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/testimonials'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Client Review</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Blogs-layouts" aria-expanded="false" aria-controls="Blogs-layouts">
                <span class="icon-bg"> <i class="mdi mdi-apps menu-icon"></i> </span>
                <span class="menu-title">Blogs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Blogs-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/addblogs'); ?>">Add Blogs</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin_Dashboard/bloglist'); ?>">Blogs list</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="<?php echo base_url('admin_Dashboard/withdrawrequest'); ?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Withdraw Request</span></a>
            </div>
        </li>
        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                <a href="<?php echo base_url('admin_Dashboard/productreview'); ?>" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Product Review</span></a>
            </div>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin_Dashboard/addOnData'); ?>">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Website data</span>
            </a>
        </li>
    </ul>
</nav>
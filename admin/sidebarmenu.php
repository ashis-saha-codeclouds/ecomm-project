<aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <!-- <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span> -->
                                <img id="image" src="../images/ecomm-logo.png" alt="" width="80px" height="60px"/>
                                <!-- <h2>Dashboard</h2> -->
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="dashboard.php" <?php if(basename($_SERVER['PHP_SELF']) == "dashboard.php") echo 'class="active"'; ?>><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Manage Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="products.php" <?php if(basename($_SERVER['PHP_SELF']) == "products.php") echo 'class="active"'; ?>>All Products</a>
                                </li>
                                <li>
                                    <a href="add-product.php" <?php if(basename($_SERVER['PHP_SELF']) == "add-product.php") echo 'class="active"'; ?>>Add Products</a>
                                </li>
                                <li>
                                    <a href="add-category.php" <?php if(basename($_SERVER['PHP_SELF']) == "add-category.php") echo 'class="active"'; ?>>Category</a>
                                </li>
                               
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cart-plus fa-fw"></i> Manage Order<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="orders.php" <?php if(basename($_SERVER['PHP_SELF']) == "orders.php") echo 'class="active"'; ?>>All Orders</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Manage Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="users.php" <?php if(basename($_SERVER['PHP_SELF']) == "users.php") echo 'class="active"'; ?>>All Users</a>
                                </li>
                                <!-- <li>
                                    <a href="add-users.php">Add Users</a>
                                </li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-photo-o"></i> Manage Banner<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="banner.php" <?php if(basename($_SERVER['PHP_SELF']) == "banner.php") echo 'class="active"'; ?>>Banners</a>
                                </li>
                                <!-- <li>
                                    <a href="edit-banner.php" <?php if(basename($_SERVER['PHP_SELF']) == "edit-banner.php") echo 'class="active"'; ?>>Banners</a>
                                </li> -->
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Admin Profile<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="admin-profile.php" <?php if(basename($_SERVER['PHP_SELF']) == "admin-profile.php") echo 'class="active"'; ?>>Update Profile</a>
                                </li>
                                <li>
                                    <a href="change-password.php" <?php if(basename($_SERVER['PHP_SELF']) == "change-password.php") echo 'class="active"'; ?>>Update Password</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="site-settings.php" <?php if(basename($_SERVER['PHP_SELF']) == "site-settings.php") echo 'class="active"'; ?>><i class="fa fa-gear fa-fw"></i> Site Settings</a>
                        </li>
                        <li>
                            <a href="logout.php" <?php if(basename($_SERVER['PHP_SELF']) == "logout.php") echo 'class="active"'; ?>><i class="fa fa-power-off fa-fw"></i> Log Out</a>
                        </li>
                    </ul>
                </div>
            </aside>
            
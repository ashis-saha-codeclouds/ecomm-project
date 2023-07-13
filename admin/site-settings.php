<?php include "header.php"; ?>
<body>
        <div id="wrapper">
            <!-- Start of the Navigation -->
            <?php include "navbar.php" ?>
            <!-- End of the Navigation -->

            <!-- Start of the Navbar Sidebar -->
            <?php include "sidebarmenu.php" ?>
            <!-- End of the Navbar Sidebar -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Site Settings</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-8">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Update Site Info
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <form role="form" id="sitesettings" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Site Name</label>
                                                    <input class="form-control" name="site_name" id="site_name" placeholder="" value="<?php echo $sesnData['site_name']?>" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Title</label>
                                                    <input class="form-control" name="site_title" id="site_title" placeholder="" value="<?php echo $sesnData['site_title']?> " type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Description</label>
                                                    <input class="form-control" name="site_desc" id="site_desc" placeholder="" value="<?php echo $sesnData['site_desc']?>" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Address</label>
                                                    <textarea class="form-control" name="site_address" id="site_address"><?php echo $sesnData['site_desc']?></textarea>
                                                </div>  
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                                    <label>Site Logo</label>
                                                    <input class="form-control" name="site_logo" id="site_logo" type="file">
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Email</label>
                                                    <input class="form-control" name="site_email" id="site_email" placeholder="" value="<?php echo $sesnData['site_email']?> " type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Contact No</label>
                                                    <input class="form-control" name="site_contact" id="site_contact" placeholder="" value="<?php echo $sesnData['site_contact']?> " type="text">
                                                </div>
                                                
                                    </div>
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary"> Update </button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

      <!-- jQuery -->
 <script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

<!-- Custom JavaScript -->
<script src="js/custom/custom.js"></script>

    </body>

</html>
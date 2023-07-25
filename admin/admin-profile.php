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
                            <h1 class="page-header">Admin Profile</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Update Profile
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-lg-6">
                                            <form role="form" id="adminProfile" method="post" action="">
                                            <div class="form-group">
                                                    <label>Name *</label>
                                                    <input class="form-control" required name="name" id="name" placeholder="" value="<?php echo $sesnData[0]['name']?>" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input class="form-control" required name="email" id="email" placeholder="" value="<?php echo $sesnData[0]['email_id']?> " type="text">
                                                    <input type="hidden" name="role" value="<?php echo $sesnData[0]['admin_id'] ?>" >
                                                </div>
                                                <button type="submit" class="btn btn-primary"> Submit </button>
                                            </form>
                                    </div>
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
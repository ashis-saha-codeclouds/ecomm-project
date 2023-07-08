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
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Update Site Settings
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-lg-6">
                                            <form role="form">
                                            <div class="form-group">
                                                    <label>Enter Old Password</label>
                                                    <input class="form-control" name="oldPassword" id="oldPassword" placeholder="XXXXXX" type="password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter New Password</label>
                                                    <input class="form-control" name="newPassword" id="newPassword" placeholder="XXXXXX" type="password">
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

    </body>

</html>
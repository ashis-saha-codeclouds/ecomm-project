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
                            <h1 class="page-header">Edit Category</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                Edit Category
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-lg-6">
                                            <form role="form" id="adminProfile" method="post">
                                            <div class="form-group">
                                                    <label>Category Name *</label>
                                                    <input class="form-control" required name="cat_name" id="cat_name" placeholder="Category Name" value="" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status *</label>
                                                    <select class="form-control" name="cat_status" id="cat_status" required>
                                                        <option value="1">Active</option>
                                                        <option value="2">In Active</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary"> Update </button>
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
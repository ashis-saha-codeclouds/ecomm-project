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
                            <h1 class="page-header">Add New Banner</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                Add New Banner
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-lg-8">
                                            <form role="form" id="siteBanner" name="siteBanner" method="post">
                                            <div class="form-group">
                                                    <label>Banner Name *</label>
                                                    <input class="form-control" required name="banner_name" id="banner_name" placeholder="Category Name" value="" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Banner Image</label>
                                                    <input class="form-control" name="banner_logo" id="banner_logo" type="file">
                                                    <input class="form-control" name="site_logo_current" id="site_logo_current" value="<?php echo $site_logo; ?>" type="hidden">
                                                    <div style="margin: 2px;"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status *</label>
                                                    <select class="form-control" name="banner_status" id="cat_status" required>
                                                        <option value="1">Active</option>
                                                        <option value="2">In Active</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary"> Submit </button>
                                            </form>
                                    </div>
                                    
                                    </div>
                                </div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Banners
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Banner Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Mark</td>
                                                    <td>Active</td>
                                                    <td><i class="fa fa-remove"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tark</td>
                                                    <td>In Active</td>
                                                    <td><i class="fa fa-remove"></i></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
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
<script src="js/custom/banner.js"></script>

    </body>

</html>
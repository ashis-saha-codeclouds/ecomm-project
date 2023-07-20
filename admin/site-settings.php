<?php include "header.php"; ?>
<?php 
$db=new BuildQuery();
$db->_selectData("options","*",null);
$resData=$db->_getTheResdata();
if($resData>0){
    $site_name=$resData['site_name'];
    $site_title=$resData['site_title'];
    $site_desc=$resData['site_desc'];
    $site_logo=$resData['site_logo'];
    $site_address=$resData['site_address'];
    $site_contact=$resData['site_contact'];
    $site_email=$resData['site_email'];
}
?>
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
                                    <form role="form" id="siteSettings" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Site Name*</label>
                                                    <input class="form-control" name="site_name" id="site_name" value="<?php echo $site_name; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Title*</label>
                                                    <input class="form-control" name="site_title" id="site_title" value="<?php echo $site_title; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Description*</label>
                                                    <input class="form-control" name="site_desc" id="site_desc" value="<?php echo $site_desc; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Address*</label>
                                                    <textarea class="form-control" name="site_address" id="site_address" required><?php echo $site_address; ?></textarea>
                                                </div>  
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                                    <label>Site Logo</label>
                                                    <input class="form-control" name="site_logo" id="site_logo" type="file">
                                                    <input class="form-control" name="site_logo_current" id="site_logo_current" value="<?php echo $site_logo; ?>" type="hidden">
                                                    <div style="margin: 2px;"><img id="image" src="../images/<?php echo $site_logo; ?>" alt="" width="100px"/></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Email*</label>
                                                    <input class="form-control" name="site_email" id="site_email" value="<?php echo $site_email; ?>" type="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Contact No*</label>
                                                    <input class="form-control" name="site_contact" id="site_contact" value="<?php echo $site_contact; ?>" type="text" required>
                                                </div>
                                                
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="hidden" name="optn" value="1">
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

<script src="js/jquery.validate.min.js"></script>

<!-- Custom JavaScript -->
<script src="js/custom/custom.js"></script>

    </body>

</html>
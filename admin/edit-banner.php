<?php include "header.php"; 

require_once("helper/banner.php"); 
// $resObj=new Banner();
// $bannerres=$resObj->__getTheBanners();
// $bannerRes=json_decode($bannerres,true);
// echo $bannerRes['error'];
// echo '<pre>';
// print_r($bannerRes);
// die();

if(isset($_REQUEST['banner_id']) && !empty($_REQUEST['banner_id'])){
    $bannerObj=new Banner();
    $bannerFres=$bannerObj->__getTheBannerById($_REQUEST['banner_id']);
    $bannerFres=json_decode($bannerFres,true);
    $bannerData=$bannerFres[0];
    //echo $catRes['error'];
    // echo '<pre>';
    // print_r($bannerData);
    // die();
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
                                                <form role="form" id="editTheBanner" name="editTheBanner" method="post" enctype="multipart/form-data" action="">
                                                    <div class="form-group">
                                                        <label>Banner Title *</label>
                                                        <input class="form-control" required name="banner_title" id="banner_title" placeholder="Banner Title" value="<?php echo $bannerData['banner_title']; ?>" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload Banner Image</label>
                                                        <input class="form-control" name="banner_image" id="banner_image" type="file" required>
                                                        <input class="form-control" name="site_logo_current" id="site_logo_current" value="<?php echo $bannerData['banner_image']; ?>" type="hidden">
                                                        <div style="margin: 2px;"><img id="image" src="../images/banner/<?php echo $bannerData['banner_image']; ?>" alt="" width="80px" height="80px"/></div>   
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status *</label>
                                                        <select class="form-control" name="banner_status" id="banner_status" required>
                                                            <option value="1" <?php if($bannerData['banner_status']=="1") echo 'selected="selected"';?>>Publish</option>
                                                            <option value="0" <?php if($bannerData['banner_status']=="0") echo 'selected="selected"';?>>In Active</option>
                                                        </select>
                                                    </div>
                                                    <?php if(!empty($_REQUEST['banner_id']) && ($_REQUEST['action']=='edit')){ ?>
                                                    <input type="hidden" name="banrid" value="<?php echo $bannerData['banner_id']; ?>"/>
                                                     <?php } ?>
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

<script src="js/jquery.validate.min.js"></script>

<!-- Custom JavaScript -->
<script src="js/custom/banner.js"></script>


    </body>

</html>
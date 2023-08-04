<?php include "header.php"; 

require_once("helper/banner.php"); 
$resObj=new Banner();
$bannerres=$resObj->__getTheBanners();
$bannerRes=json_decode($bannerres,true);
// echo $bannerRes['error'];
// echo '<pre>';
// print_r($bannerRes);
// die();

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
                                            <form role="form" id="siteBanner" name="siteBanner" method="post" enctype="multipart/form-data" action="">
                                                <div class="form-group">
                                                    <label>Banner Title *</label>
                                                    <input class="form-control" required name="banner_title" id="banner_title" placeholder="Banner Title" value="" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Banner Image</label>
                                                    <input class="form-control" name="banner_image" id="banner_image" type="file" required>
                                                    <!-- <input class="form-control" name="banner_image_current" id="banner_image_current" value="" type="hidden"> -->
                                                    <div style="margin: 2px;"></div>    
                                                </div>
                                                <div class="form-group">
                                                    <label>Status *</label>
                                                    <select class="form-control" name="banner_status" id="banner_status" required>
                                                        <option value="1">Publish</option>
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
                                    <?php
                                        if((count($bannerRes)>0) && $bannerRes['error']!==false){ ?>
                                        <table class="table table-striped table-bordered table-hover" id="all-product-banner-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Banner Name</th>
                                                    <th>Banner Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($bannerRes as $resRow) {
                                                    $bannerStatus=($resRow['banner_status']==1)?'Active':'In Active';
                                                    ?>
                                                <tr>
                                                        <td>#<?php echo $resRow['banner_id'] ?></td>
                                                        <td><?php echo $resRow['banner_title'] ?></td>
                                                        <td><img id="image" src="../images/banner/<?php echo $resRow['banner_image']; ?>" alt="" width="80px" height="80px"/></td>
                                                        <td><?php echo $bannerStatus; ?></td>  
                                                        <td>
                                                            <a class="banner_cat" href="edit-banner.php?banner_id=<?php echo $resRow['banner_id']?>&action=edit"><i class="fa fa-edit"></i></a>
                                                            <a class="del_banner" href="javascript:void(0)" data-id="<?php echo $resRow['banner_id']?>"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php } else{ ?>
                                            <div> No Banners Found!</div>
                                            <?php } ?>
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

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<script src="js/jquery.validate.min.js"></script>

<!-- Custom JavaScript -->
<script src="js/custom/banner.js"></script>

<script>
            $(document).ready(function () {
                $('#all-product-banner-table').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>
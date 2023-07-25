<?php include "header.php"; ?>
<?php
require_once("helper/category.php"); 
$resObj=new Category();
$catres=$resObj->__getAllTheProductCategory();
$catRes=json_decode($catres,true);
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
                            <h1 class="page-header">Add New Category</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-6">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                Add New Category
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-lg-8">
                                            <form role="form" id="productCategory" name="productCategory" method="post" action="">
                                            <div class="form-group">
                                                    <label>Category Name *</label>
                                                    <input class="form-control" required name="cat_name" id="cat_name" placeholder="Category Name" value="" type="text">
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
                                    All Categories
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php
                                        if(count($catRes)>0){ ?>
                                        <table class="table table-striped table-bordered table-hover" id="all-product-cat-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($catRes as $resRow) {
                                                    $catStatus=($resRow['cat_status'])?'Active':'In Active';
                                                    ?>
                                                <tr>
                                                    <td><?php echo $resRow['cat_id'] ?></td>
                                                    <td><?php echo $resRow['cat_title'] ?></td>
                                                    <td><?php echo $catStatus; ?></td>
                                                    <td><a class="del_cat" href="javascript:void(0)" data-id="<?php echo $resRow['cat_id'] ?>"><i class="fa fa-remove"></i></a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php }else{ ?>
                                        <div class="not-found">!!! No Category Available !!!</div>
                                    <?php    }  ?>
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
<script src="js/custom/category.js"></script>

<script>
            $(document).ready(function () {
                $('#all-product-cat-table').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>
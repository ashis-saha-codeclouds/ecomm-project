<?php include "header.php"; ?>
<?php
require_once("helper/product.php");
$prodObj= new Product();
$prodCat=$prodObj->__getTheProductCategory();
$prodCat=json_decode($prodCat,true);
//echo "<pre>";
//print_r($prodCat);
//echo $prodCat[1]['cat_id'];
//die();
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
                            <h1 class="page-header">Add Product</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Product Details
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <form role="form" id="product" method="post" enctype="multipart/form-data" action="">
                                    <div class="col-lg-8">
                                            <div class="form-group">
                                                    <label>Product Name*</label>
                                                    <input class="form-control" name="product_title" id="product_title" value="" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product SKU*</label>
                                                    <input class="form-control" name="product_sku" id="product_sku" value="" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Price($)*</label>
                                                    <input class="form-control" name="product_price" id="product_price" value="" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Description*</label>
                                                    <textarea class="form-control" name="product_desc" id="product_desc" rows="8" tabindex="1" spellcheck="false" required></textarea>
                                                </div>  
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-group">
                                                    <label>Product Category*</label>
                                                    <select class="form-control" name="product_cat" id="product_cat" required>
                                                        <option value="">Select Category</option>
                                                        <?php foreach($prodCat as $prodCategory ) {?>
                                                        <option value="<?php echo $prodCategory['cat_id'] ?>"><?php echo $prodCategory['cat_title'] ?></option>    
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Banner Image</label>
                                                    <input class="form-control" name="product_image" id="product_image" type="file" required>
                                                    <!-- <input class="form-control" name="banner_image_current" id="banner_image_current" value="" type="hidden"> -->
                                                    <div style="margin: 2px;"></div>    
                                                </div>
                                                <div class="form-group">
                                                    <label>Is Featured Product*</label>
                                                    <select class="form-control" name="featured_product" id="featured_product" required>
                                                        <option value="0">No</option>    
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Status*</label>
                                                    <select class="form-control" name="product_status" id="product_status" required>
                                                        <option value="1">Publish</option>
                                                        <option value="2">Draft</option>
                                                        <option value="3">In Active</option>
                                                    </select>
                                                </div>      
                                    </div>
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary"> Add Product </button>
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
<script src="js/custom/product.js"></script>

    </body>

</html>
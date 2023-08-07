<?php include "header.php"; ?>
<?php
require_once("helper/product.php");
//$prodObj= new Product();
// $prodCat=$prodObj->__getTheProductCategory();
// $prodCat=json_decode($prodCat,true);
//echo "<pre>";
//print_r($prodCat);
//echo $prodCat[1]['cat_id'];
//die();

if(isset($_REQUEST['product_id']) && !empty($_REQUEST['product_id'])){
    $prodsObj= new Product();
    $productFres=$prodsObj->__getTheProductById($_REQUEST['product_id']);
    $prodCat=$prodsObj->__getTheProductCategory();
    $productData=json_decode($productFres,true);
    $productData=$productData[0];   
    $prodCat=json_decode($prodCat,true);
    // echo "<pre>";
    // print_r($productData);
    // echo "<pre>";
    // print_r($prodCat);
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
                            <h1 class="page-header">Edit Product</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Product Details
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <form role="form" id="productEdit" method="post" enctype="multipart/form-data" action="">
                                    <div class="col-lg-8">
                                            <div class="form-group">
                                                    <label>Product Name*</label>
                                                    <input class="form-control" name="product_title" id="product_title" value="<?php echo $productData['product_title']; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product SKU*</label>
                                                    <input class="form-control" name="product_sku" id="product_sku" value="<?php echo $productData['product_sku']; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Price($)*</label>
                                                    <input class="form-control" name="product_price" id="product_price" value="<?php echo $productData['product_price']; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Description*</label>
                                                    <textarea class="form-control" name="product_desc" id="product_desc" rows="8" tabindex="1" spellcheck="false" required><?php echo $productData['product_description']; ?></textarea>
                                                </div>  
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-group">
                                                    <label>Product Category*</label>
                                                    <select class="form-control" name="product_cat" id="product_cat" required>
                                                        <option value="">Select Category</option>
                                                        <?php foreach($prodCat as $prodCategory ) {?>
                                                        <option value="<?php echo $prodCategory['cat_id'] ?>" <?php if($productData['category_id']==$prodCategory['cat_id']) echo 'selected="selected"'; ?>"><?php echo $prodCategory['cat_title'] ?></option>    
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Upload Product Image*</label>
                                                    <input class="form-control" name="product_image" id="product_image" type="file">
                                                    <input class="form-control" name="product_image_current" id="product_image_current" value="<?php echo $productData['product_image']; ?>" type="hidden">
                                                    <div style="margin: 2px;"><img id="image" src="../images/product/<?php echo $productData['product_image']; ?>" alt="" width="80px" height="80px"/></div>   
                                                </div>
                                                <div class="form-group">
                                                    <label>Is Featured Product*</label>
                                                    <select class="form-control" name="featured_product" id="featured_product" required>
                                                        <option value="1" <?php if($productData['is_featured']=="1") echo 'selected="selected"';?>>Yes</option>
                                                        <option value="2" <?php if($productData['is_featured']=="2") echo 'selected="selected"';?>>No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Status*</label>
                                                    <select class="form-control" name="product_status" id="product_status" required>
                                                        <option value="1" <?php if($productData['product_status']=="1") echo 'selected="selected"';?>>Publish</option>
                                                        <option value="2" <?php if($productData['product_status']=="2") echo 'selected="selected"';?>>Draft</option>
                                                        <option value="3" <?php if($productData['product_status']=="3") echo 'selected="selected"';?>>In Active</option>
                                                    </select>
                                                </div>      
                                    </div>
                                    <div class="col-lg-12">
                                    <?php if(!empty($_REQUEST['product_id']) && ($_REQUEST['action']=='edit')){ ?>
                                        <input type="hidden" name="prdctid" value="<?php echo $productData['product_id']; ?>"/>
                                    <?php } ?>    
                                    <button type="submit" class="btn btn-primary"> Update Product </button>
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
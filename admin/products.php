<?php include "header.php"; 

require_once("helper/product.php"); 
$resObj=new Product();
$products=$resObj->__getAllTheProducts();
$products=json_decode($products,true);
//echo $bannerRes['error'];
    // echo '<pre>';
    // print_r($products);
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
                            <h1 class="page-header">All Products</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    All Products
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php if(count($products)>0 && $products['error']!==false){ ?>
                                        <table class="table table-striped table-bordered table-hover" id="all-product-table">
                                            <thead>
                                                <tr>
                                                    <th>Product ID</th>
                                                    <th>Product Title</th>
                                                    <th>Produc SKU</th>
                                                    <th>Product Category</th>
                                                    <th>Product Price</th>
                                                    <th>Product Image</th>
                                                    <th>Is Featured Product?</th>
                                                    <th>Product Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($products as $product ) {
                                                    if($product['product_status']==1){
                                                        $productStatus='Publish';
                                                    }elseif($product['product_status']==2){
                                                        $productStatus='Draft';
                                                    }else{
                                                        $productStatus='In Active';
                                                    }
                                                    
                                                    $isFeaturedProduct=($product['is_featured']==1)?'Yes':'No';
                                                    ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $product['product_id']?></td>
                                                    <td><?php echo $product['product_title']?></td>
                                                    <td><?php echo $product['product_sku']?></td>
                                                    <td class="center"><?php echo $product['cat_title']?></td>
                                                    <td class="center"><?php echo $product['product_price']?></td>
                                                    <td class="center"><img id="image" src="../images/product/<?php echo $product['product_image']; ?>" alt="" width="80px" height="80px"/></td>
                                                    <td><?php echo $isFeaturedProduct ?></td>
                                                    <td class="center"><?php echo $productStatus ?></td>
                                                    <td>
                                                            <a class="product" href="edit-product.php?product_id=<?php echo $product['product_id']?>&action=edit"><i class="fa fa-edit"></i></a>
                                                            <a class="del_product" href="javascript:void(0)" data-id="<?php echo $product['product_id']?>"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php } else { ?>
                                            <div> No Products Found!</div>
                                            <?php } ?>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
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

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<script src="js/jquery.validate.min.js"></script>

<!-- Custom JavaScript -->
<script src="js/custom/product.js"></script>

<script>
            $(document).ready(function () {
                $('#all-product-table').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>
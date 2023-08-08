<?php include "header.php"; 

require_once("helper/user.php"); 
$resObj=new User();
$users=$resObj->__getAllTheUsers();
$users=json_decode($users,true);
//echo $bannerRes['error'];
    // echo '<pre>';
    // print_r($users);
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
                            <h1 class="page-header">All Users</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    All Users
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php if(count($users)>0 && $users['error']!==false){ ?>
                                        <table class="table table-striped table-bordered table-hover" id="all-product-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($users as $user ) {
                                                    if($user['user_status']=='Y'){
                                                        $userStatus='Active';
                                                    }else{
                                                        $userStatus='In Active';
                                                    }
                                                    ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $user['user_id']?></td>
                                                    <td><?php echo $user['user_fname'].' '. $user['user_lname']?></td>
                                                    <td><?php echo $user['email']?></td>
                                                    <td class="center"><?php echo $user['mobile']?></td>
                                                    <td class="center"><?php echo $user['address'] . "</br>" .  $user['city'] ?></td>
                                                    <td class="center"><?php echo $userStatus ?></td>
                                                    <td>
                                                            <a class="product" href="edit-user.php?user_id=<?php echo $user['user_id']?>&action=edit"><i class="fa fa-edit"></i></a>
                                                            <a class="del_user" href="javascript:void(0)" data-id="<?php echo $user['user_id']?>"><i class="fa fa-trash"></i></a>
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
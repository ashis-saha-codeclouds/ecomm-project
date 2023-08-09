<?php include "header.php"; ?>
<?php
require_once("helper/user.php");

if(isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])){
    $userObj= new User();
    $userFres=$userObj->__getTheUserById($_REQUEST['user_id']);
    // $prodCat=$userObj->__getTheProductCategory();
    $userData=json_decode($userFres,true);
    $userData=$userData[0];   
    // echo "<pre>";
    // print_r($userData);
    // echo "<pre>";
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
                            <h1 class="page-header">Edit User Data</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row" id="msgrow">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit User
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <form role="form" id="userEdit" method="post" enctype="multipart/form-data" action="">
                                    <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>User First Name*</label>
                                                    <input class="form-control" name="user_fname" id="user_fname" value="<?php echo $userData['user_fname']; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>User Last Name*</label>
                                                    <input class="form-control" name="user_lname" id="user_lname" value="<?php echo $userData['user_lname']; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email*</label>
                                                    <input class="form-control" name="email" id="email" value="<?php echo $userData['email']; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile*</label>
                                                    <input class="form-control" name="mobile" id="mobile" value="<?php echo $userData['mobile']; ?>" type="text" required>
                                                </div>
                                                 
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>City*</label>
                                                    <input class="form-control" name="city" id="city" value="<?php echo $userData['city']; ?>" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address*</label>
                                                    <textarea class="form-control" name="address" id="address" rows="4" tabindex="1" spellcheck="false" required><?php echo $userData['address']; ?></textarea>
                                                </div> 
                                               
                                                <div class="form-group">
                                                    <label>User Status*</label>
                                                    <select class="form-control" name="user_status" id="user_status" required>
                                                        <option value="Y" <?php if($userData['user_status']=="Y") echo 'selected="selected"';?>>Active</option>
                                                        <option value="N" <?php if($userData['user_status']=="N") echo 'selected="selected"';?>>In Active</option>
                                                    </select>
                                                </div>      
                                    </div>
                                    <div class="col-lg-12">
                                    <?php if(!empty($_REQUEST['user_id']) && ($_REQUEST['action']=='edit')){ ?>
                                        <input type="hidden" name="userid" value="<?php echo $userData['user_id']; ?>"/>
                                    <?php } ?>    
                                    <button type="submit" class="btn btn-primary"> Update User </button>
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
<script src="js/custom/user.js"></script>

    </body>

</html>
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
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- Start of the Dashboard Icons Row -->
                    <?php include("dashboard-icon-rows.php"); ?>
                    <!-- End of the Dashboard Icons Row -->

                    <!-- Start of the Dashboard Area Bar Chart Row -->
                    <?php include("dashboard-area-bar-chart.php"); ?>
                    <!-- End of the Dashboard Area Bar Chart Row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

       <?php include('footer.php') ?>

    </body>

</html>
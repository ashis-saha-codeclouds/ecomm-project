<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin | Admin Panel</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Admin Dashboard</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!-- <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li> -->
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="index.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
            </nav>

            <aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i>Manage Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="morris.html">All Products</a>
                                </li>
                                <li>
                                    <a href="flot.html">Add Products</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cart-plus fa-fw"></i> Manage Order<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">All Orders</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Manage Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="morris.html">All Users</a>
                                </li>
                                <li>
                                    <a href="morris.html">Add Users</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-gear fa-fw"></i> Site Settings</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-power-off fa-fw"></i> Log Out</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- /.sidebar -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">26</div>
                                            <div>New Comments!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">12</div>
                                            <div>New Tasks!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">124</div>
                                            <div>New Orders!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-support fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">13</div>
                                            <div>Support Tickets!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div id="morris-area-chart"></div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>3326</td>
                                                            <td>10/21/2013</td>
                                                            <td>3:29 PM</td>
                                                            <td>$321.33</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3325</td>
                                                            <td>10/21/2013</td>
                                                            <td>3:20 PM</td>
                                                            <td>$234.34</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3324</td>
                                                            <td>10/21/2013</td>
                                                            <td>3:03 PM</td>
                                                            <td>$724.17</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3323</td>
                                                            <td>10/21/2013</td>
                                                            <td>3:00 PM</td>
                                                            <td>$23.71</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3322</td>
                                                            <td>10/21/2013</td>
                                                            <td>2:49 PM</td>
                                                            <td>$8345.23</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3321</td>
                                                            <td>10/21/2013</td>
                                                            <td>2:23 PM</td>
                                                            <td>$245.12</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3320</td>
                                                            <td>10/21/2013</td>
                                                            <td>2:15 PM</td>
                                                            <td>$5663.54</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3319</td>
                                                            <td>10/21/2013</td>
                                                            <td>2:13 PM</td>
                                                            <td>$943.45</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-4">
                                            <div id="morris-bar-chart"></div>
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="morris-donut-chart"></div>
                                    <!-- <a href="#" class="btn btn-default btn-block">View Details</a> -->
                                </div>
                            </div>
                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            
                            <!-- /.panel -->
                        </div>
                        
                    </div>
                    <!-- /.row -->
                    

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

        <!-- Morris Charts JavaScript -->
        <script src="js/raphael.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>

</html>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || Asbab - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <?php include("header-menu.php"); ?>
        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
             <!-- Start Cart Panel -->
             <?php include("cart-panel.php"); ?>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
       
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <div class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Login</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" id="user-email">
                                                            </div>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" id="user-pass">
                                                            </div>
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                                <a href="#">LogIn</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
                                                        <form action="#">
                                                            <h5 class="checkout-method__title">Register</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Name</label>
                                                                <input type="email" id="user-email">
                                                            </div>
															<div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" id="user-email">
                                                            </div>
															
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" id="user-pass">
                                                            </div>
                                                            <div class="dark-btn">
                                                                <a href="#">Register</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__title">
                                        Address Information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="First name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Street Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Apartment/Block/House (optional)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="City/State">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Post code/ zip">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="email" placeholder="Email address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Phone number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="accordion__title">
                                        payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                <a href="#"><i class="zmdi zmdi-long-arrow-right"></i>Check/ Money Order</a>
                                            </div>
                                            <div class="single-method">
                                                <a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Credit Card</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="images/cart/1.png" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#">Santa fe jacket for men</a>
                                        <span class="price">$128</span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="images/cart/2.png" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#">Santa fe jacket for men</a>
                                        <span class="price">$128</span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price">$909.00</span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$9.00</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price">$918.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        <?php include("footer.php"); ?>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>
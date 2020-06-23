<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/frontend/images/logo/favicon-warma-blue.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/frontend/images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/plugins.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/style.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/custom.css">
</head>

<body>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?= $header; ?>

        <!-- Content -->
        <?= $content; ?>

        <!-- Footer -->
        <?= $footer; ?>

        <!-- Quickview Modal -->
        <div class="quickmodal">
            <div class="body-overlay"></div>
            <button class="quickmodal-close"><i class="ion ion-ios-close"></i></button>
            <div class="quickmodal-inside">
                <div class="container">
                    <div class="pdetails">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pdetails-images">
                                    <div class="pdetails-largeimages">
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-1.jpg" alt="product image">
                                        </div>
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-2.jpg" alt="product image">
                                        </div>
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-3.jpg" alt="product image">
                                        </div>
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-4.jpg" alt="product image">
                                        </div>
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-1.jpg" alt="product image">
                                        </div>
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-2.jpg" alt="product image">
                                        </div>
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-3.jpg" alt="product image">
                                        </div>
                                        <div class="pdetails-singleimage">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/lg/product-image-4.jpg" alt="product image">
                                        </div>
                                    </div>

                                    <div class="pdetails-thumbs">
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-1.jpg" alt="product thumb">
                                        </div>
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-2.jpg" alt="product thumb">
                                        </div>
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-3.jpg" alt="product thumb">
                                        </div>
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-4.jpg" alt="product thumb">
                                        </div>
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-1.jpg" alt="product thumb">
                                        </div>
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-2.jpg" alt="product thumb">
                                        </div>
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-3.jpg" alt="product thumb">
                                        </div>
                                        <div class="pdetails-singlethumb">
                                            <img src="<?= base_url(); ?>assets/frontend/images/product/thumbnail/product-image-4.jpg" alt="product thumb">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pdetails-content">

                                    <div class="rattingbox">
                                        <span class="active"><i class="ion ion-ios-star"></i></span>
                                        <span class="active"><i class="ion ion-ios-star"></i></span>
                                        <span class="active"><i class="ion ion-ios-star"></i></span>
                                        <span class="active"><i class="ion ion-ios-star"></i></span>
                                        <span class="active"><i class="ion ion-ios-star"></i></span>
                                    </div>
                                    <h3>SonicFuel Wireless Over-Ear Headphones</h3>
                                    <div class="pdetails-pricebox">
                                        <del class="oldprice">$35.90</del>
                                        <span class="price">$34.11</span>
                                        <span class="badge">Save 5%</span>
                                    </div>
                                    <p>The ATH-S700BT offers clear, full-bodied audio reproduction with Bluetooth®
                                        wireless operation. The headphones are equipped with a mic, and music and
                                        volume controls, allowing you to easily answer calls..</p>
                                    <div class="pdetails-quantity">
                                        <div class="quantity-select">
                                            <input type="text" value="1">
                                            <div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
                                            <div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
                                        </div>
                                        <a href="shop-rightsidebar.html" class="ho-button">
                                            <i class="lnr lnr-cart"></i>
                                            <span>Add to cart</span>
                                        </a>
                                    </div>
                                    <div class="pdetails-color">
                                        <span>Color :</span>
                                        <ul>
                                            <li class="red"><span></span></li>
                                            <li class="green checked"><span></span></li>
                                            <li class="blue"><span></span></li>
                                            <li class="black"><span></span></li>
                                        </ul>
                                    </div>
                                    <div class="pdetails-size">
                                        <span>Size :</span>
                                        <ul>
                                            <li class="checked"><span>S</span></li>
                                            <li><span>M</span></li>
                                            <li><span>L</span></li>
                                            <li><span>XL</span></li>
                                            <li><span>XXL</span></li>
                                        </ul>
                                    </div>
                                    <div class="pdetails-categories">
                                        <span>Categories :</span>
                                        <ul>
                                            <li><a href="shop-rightsidebar.html">Accessories</a></li>
                                            <li><a href="shop-rightsidebar.html">Kids</a></li>
                                            <li><a href="shop-rightsidebar.html">Women</a></li>
                                        </ul>
                                    </div>
                                    <div class="pdetails-tags">
                                        <span>Tags :</span>
                                        <ul>
                                            <li><a href="shop-rightsidebar.html">Electronic</a></li>
                                            <li><a href="shop-rightsidebar.html">Television</a></li>
                                        </ul>
                                    </div>
                                    <div class="pdetails-socialshare">
                                        <span>Share :</span>
                                        <ul>
                                            <li><a href="#"><i class="ion ion-logo-facebook"></i></a></li>
                                            <li><a href="#"><i class="ion ion-logo-twitter"></i></a></li>
                                            <li><a href="#"><i class="ion ion-logo-googleplus"></i></a></li>
                                            <li><a href="#"><i class="ion ion-logo-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Js Files -->
    <script src="<?= base_url(); ?>assets/frontend/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/main.js"></script>

    <!-- Sweet Alert Js -->
    <script src="<?= base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert/script_sweetalert.js"></script>

</body>

</html>
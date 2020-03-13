<!-- Other cart -->
<!--file:///F:/wamp64/www/boighorbookshtml/boighorbookshtml/boighor/cart.html-->

<?php

require_once "../includes/database.php";
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//TODO: Get hotel id from cookies
$hotel_id = 1;


// Creating associative array of carton id and size
$query = "SELECT * FROM carton";
$result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
//$cartons = array();


//while ($row = mysqli_fetch_array($result)) {
//    $cartons[$row["carton_ID"]] = $row["size"];
//    echo $cartons[$row["carton_ID"]];
//}


$query = "SELECT * FROM cart, product WHERE cart.hotel_ID = $hotel_id AND cart.product_ID = product.product_id";

$result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UdaipurWineStore - Cart</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <!-- Google font (font-family: 'Poppins', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="css/style.css">


    <!--	CART Box-->
    <link rel="stylesheet" href="css/style_cart.css">


    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">

    <style type="text/css">

        th {
            color: #2794c6;
        }


    </style>


</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- Wrapper -->
<div id="wrapper" class="wrapper">


    <!-- Page Conttent -->
    <main class="page-content">

        <!-- Shopping Cart Area -->
        <div class="wishlist-page-area section-padding-lg bg-white">
            <div class="container">

                <!-- Cart Products -->
                <div class="cart-table table-responsive" id="test2">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="cart-column-image" scope="col">IMAGE</th>
                            <th class="cart-column-productname" scope="col">PRODUCT</th>
                            <th class="cart-column-price" scope="col">PRICE</th>
                            <th class="cart-column-quantity" scope="col">QUANTITY</th>
                            <!--                            <th class="cart-column-addtocart" scope="col">ADD TO CART</th>-->
                            <th class="cart-column-remove" scope="col">REMOVE</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php


                        while ($row = mysqli_fetch_array($result)) {

                            $product_id = $row["product_id"];
                            $name = $row['product_name'];
                            $price = $row["product_price"];
                            $qty = $row["quantity"];
                            $ml = $row["product_ML"];
                            // TODO: change to pc id
                            $pc = $row["carton_type"];
                            if ($pc != null) {
                                $query = "SELECT size FROM carton, product_carton WHERE product_carton.pc_ID = $pc AND product_carton.carton_ID = carton.carton_ID";
                                $result2 = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                                $row2 = mysqli_fetch_array($result2);
                                $size = $row2["size"];
                            }

                            echo "<tr><td>";
                            echo "<a href=\"product-details-right-sidebar.html\" class=\"product-image\">
                                    <img src=\"img/product/small-size/product-image-1.jpg\" alt=\"product image\">
                                </a>";
                            echo "</td><td>";

                            echo "<a href=\"product-details-right-sidebar.html\" class=\"product-title\">$name</a>";
                            echo "<br> $ml";

                            if ($pc != null) {
//                                $size = $cartons[$carton];
                                echo "<span style='font-size: 15px'><br> Carton of $size</span>";
                            }

                            echo "</td>
                                    <td style='font-size: 130%'>₹$price</td>";
                            echo "<td>
                                <div class=\"quantity-select\" id='test'>
                                    <input type=\"text\" value=\"$qty\" name='$product_id'>
                                </div>
                            </td>";
                            echo "<td>
                                <button class=\"remove-product\" name='$product_id' onclick='removeProduct($product_id)'><i class=\"ti ti-close\"></i></button>
                            </td>
                        </tr>";


                        }


                        ?>

                        <!--                                                                        First-->
                        <!--                        <tr>-->
                        <!--                            <td>-->
                        <!--                                <a href="product-details-right-sidebar.html" class="product-image">-->
                        <!--                                    <img src="img/product/small-size/product-image-1.jpg" alt="product image">-->
                        <!--                                </a>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <a href="product-details-right-sidebar.html" class="product-title">Daaru 1</a>-->
                        <!--                                <br>-->
                        <!--                                sass-->
                        <!--                                <br>-->
                        <!--                                sass-->
                        <!--                            </td>-->
                        <!--                            <td>₹2500.00</td>-->
                        <!--                            <td>-->
                        <!--                                <div class="quantity-select">-->
                        <!--                                    <input type="text" value="10">-->
                        <!--                                </div>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <a href="#" class="sf-button sf-button-sm">-->
                        <!--                                    <span>ADD TO CART</span>-->
                        <!--                                </a>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <button class="remove-product"><i class="ti ti-close"></i></button>-->
                        <!--                            </td>-->
                        <!--                        </tr>-->
                        <!-- // First-->
                        <!---->
                        <!--                        <tr>-->
                        <!--                            <td>-->
                        <!--                                <a href="product-details-right-sidebar.html" class="product-image">-->
                        <!--                                    <img src="img/product/small-size/product-image-2.jpg" alt="product image">-->
                        <!--                                </a>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <a href="product-details-right-sidebar.html" class="product-title">Daaru 2</a>-->
                        <!--                            </td>-->
                        <!--                            <td>₹15000.00</td>-->
                        <!--                            <td>-->
                        <!--                                <div class="quantity-select">-->
                        <!--                                    <input type="text" value="1">-->
                        <!--                                </div>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <a href="#" class="sf-button sf-button-sm">-->
                        <!--                                    <span>ADD TO CART</span>-->
                        <!--                                </a>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <button class="remove-product"><i class="ti ti-close"></i></button>-->
                        <!--                            </td>-->
                        <!--                        </tr>-->
                        <!---->
                        <!--                        <tr>-->
                        <!--                            <td>-->
                        <!--                                <a href="product-details-right-sidebar.html" class="product-image">-->
                        <!--                                    <img src="img/product/small-size/product-image-3.jpg" alt="product image">-->
                        <!--                                </a>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <a href="product-details-right-sidebar.html" class="product-title">Daaru 3</a>-->
                        <!--                            </td>-->
                        <!--                            <td>₹7500.00</td>-->
                        <!--                            <td>-->
                        <!--                                <div class="quantity-select">-->
                        <!--                                    <input type="text" value="1">-->
                        <!--                                </div>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <a href="#" class="sf-button sf-button-sm">-->
                        <!--                                    <span>ADD TO CART</span>-->
                        <!--                                </a>-->
                        <!--                            </td>-->
                        <!--                            <td>-->
                        <!--                                <button class="remove-product"><i class="ti ti-close"></i></button>-->
                        <!--                            </td>-->
                        <!--                        </tr>-->
                        </tbody>
                    </table>
                </div>
                <!--// Cart Products -->


                <!--			Cart box		-->
                <div>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                            <li><a href="#">Coupon Code</a></li>
                            <li><a href="#">Apply Code</a></li>
                            <li><a href="#" onclick="updateCart()">Update Cart</a></li>
                            <li><a href="#">Check Out</a></li>
                        </ul>
                    </div>


                    <div style="overflow: hidden">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="cartbox__total__area">
                                <div class="cartbox-total d-flex justify-content-between">
                                    <ul class="cart__total__list">
                                        <li>Cart total</li>
                                        <li>Sub Total</li>
                                    </ul>
                                    <ul class="cart__total__tk">
                                        <li>$70</li>
                                        <li>$70</li>
                                    </ul>
                                </div>
                                <div class="cart__total__amount">
                                    <span>Grand Total</span>
                                    <span>$140</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!--// Cart box -->


                <!-- Similliar Products -->
                <div class="similliar-products section-padding-top-lg">
                    <h4 class="small-title">SIMILLIAR PRODUCTS</h4>
                    <div class="row products-slider-active slider-navigation-1 products-wrapper">

                        <!-- Single product -->
                        <div class="col-12">
                            <div class="product-item">
                                <div class="product-item-topside">
                                    <div class="product-item-images">
                                        <img src="img/product/thumbnail-size/product-image-11.jpg" alt="product image">
                                        <img src="img/product/thumbnail-size/product-image-15.jpg" alt="product image">
                                    </div>
                                    <ul class="product-item-actions">
                                        <li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a>
                                        </li>
                                        <li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
                                        <li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a>
                                        </li>
                                        <li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-item-bottomside">
                                    <div class="ratting-box">
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                    </div>
                                    <h6><a href="product-details.html">Full Body Shapewear</a></h6>
                                    <span class="pricebox">$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!--// Single product -->

                        <!-- Single product -->
                        <div class="col-12">
                            <div class="product-item">
                                <div class="product-item-topside">
                                    <div class="product-item-images">
                                        <img src="img/product/thumbnail-size/product-image-12.jpg" alt="product image">
                                        <img src="img/product/thumbnail-size/product-image-16.jpg" alt="product image">
                                    </div>
                                    <ul class="product-item-actions">
                                        <li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a>
                                        </li>
                                        <li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
                                        <li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a>
                                        </li>
                                        <li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-item-bottomside">
                                    <div class="ratting-box">
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                    </div>
                                    <h6><a href="product-details.html">Full Body Shapewear</a></h6>
                                    <span class="pricebox">$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!--// Single product -->

                        <!-- Single product -->
                        <div class="col-12">
                            <div class="product-item">
                                <div class="product-item-topside">
                                    <div class="product-item-images">
                                        <img src="img/product/thumbnail-size/product-image-1.jpg" alt="product image">
                                        <img src="img/product/thumbnail-size/product-image-5.jpg" alt="product image">
                                    </div>
                                    <ul class="product-item-actions">
                                        <li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a>
                                        </li>
                                        <li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
                                        <li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a>
                                        </li>
                                        <li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a>
                                        </li>
                                    </ul>
                                    <span class="product-item-badge">New</span>
                                </div>
                                <div class="product-item-bottomside">
                                    <div class="ratting-box">
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                    </div>
                                    <h6><a href="product-details.html">Full Body Shapewear</a></h6>
                                    <span class="pricebox">$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!--// Single product -->

                        <!-- Single product -->
                        <div class="col-12">
                            <div class="product-item">
                                <div class="product-item-topside">
                                    <div class="product-item-images">
                                        <img src="img/product/thumbnail-size/product-image-2.jpg" alt="product image">
                                        <img src="img/product/thumbnail-size/product-image-6.jpg" alt="product image">
                                    </div>
                                    <ul class="product-item-actions">
                                        <li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a>
                                        </li>
                                        <li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
                                        <li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a>
                                        </li>
                                        <li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a>
                                        </li>
                                    </ul>
                                    <span class="product-item-badge">New</span>
                                </div>
                                <div class="product-item-bottomside">
                                    <div class="ratting-box">
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                    </div>
                                    <h6><a href="product-details.html">Full Body Shapewear</a></h6>
                                    <span class="pricebox">$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!--// Single product -->

                        <!-- Single product -->
                        <div class="col-12">
                            <div class="product-item">
                                <div class="product-item-topside">
                                    <div class="product-item-images">
                                        <img src="img/product/thumbnail-size/product-image-3.jpg" alt="product image">
                                        <img src="img/product/thumbnail-size/product-image-7.jpg" alt="product image">
                                    </div>
                                    <ul class="product-item-actions">
                                        <li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a>
                                        </li>
                                        <li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
                                        <li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a>
                                        </li>
                                        <li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-item-bottomside">
                                    <div class="ratting-box">
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                    </div>
                                    <h6><a href="product-details.html">Full Body Shapewear</a></h6>
                                    <span class="pricebox">$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!--// Single product -->

                        <!-- Single product -->
                        <div class="col-12">
                            <div class="product-item">
                                <div class="product-item-topside">
                                    <div class="product-item-images">
                                        <img src="img/product/thumbnail-size/product-image-4.jpg" alt="product image">
                                        <img src="img/product/thumbnail-size/product-image-8.jpg" alt="product image">
                                    </div>
                                    <ul class="product-item-actions">
                                        <li class="trigger-add-to-cart"><a href="#"><i class="ti ti-shopping-cart"></i></a>
                                        </li>
                                        <li class="quick-view-trigger"><a href="#"><i class="ti ti-eye"></i></a></li>
                                        <li class="trigger-add-to-compare"><a href="#"><i class="ti ti-reload"></i></a>
                                        </li>
                                        <li class="trigger-add-to-wishlist"><a href="#"><i class="ti ti-heart"></i></a>
                                        </li>
                                    </ul>
                                    <span class="product-item-badge">Sale</span>
                                </div>
                                <div class="product-item-bottomside">
                                    <div class="ratting-box">
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span class="active"><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                        <span><i class="ti ti-star"></i></span>
                                    </div>
                                    <h6><a href="product-details.html">Full Body Shapewear</a></h6>
                                    <span class="pricebox">$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!--// Single product -->

                    </div>
                </div>
                <!--// Similliar Products -->

            </div>
        </div>
        <!--// Shopping Cart Area -->

    </main>
    <!--// Page Conttent -->

    <!-- Footer Area -->
    <footer class="footer-area">

        <!-- Footer Newsletter Area -->
        <div class="footer-newsletter section-padding-sm cr-border cr-border-top">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter-content">
                            <span class="newsletter-content-icon"><i class="ti ti-comment"></i></span>
                            <h3>NEWSLETTER</h3>
                            <p>Be the first to know about the latest fashion and get exclusive offers</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form id="mc-form" class="newsletter-form">
                            <input type="email" name="newsletter-email" id="mc-email" placeholder="Email address...">
                            <button type="submit" class="sf-button" id="mc-submit">
                                <span>SUBSCRIBE NOW</span>
                            </button>
                        </form>
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Footer Newsletter Area -->

        <!-- Footer Top Area -->
        <div class="footer-top-area bg-grey section-padding-lg">
            <div class="container">
                <div class="row footer-widgets">

                    <!-- Single Widget -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-about">
                            <a href="index.html" class="footer-logo">
                                <img src="img/logo/logo-theme.png" alt="slimfit">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consemi cteta dipisi cing elit, sed do eiusmod tempor
                                incididunt ut labor.</p>
                            <ul class="footer-social-icons">
                                <li><a href="#"><i class="ti ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti ti-google"></i></a></li>
                                <li><a href="#"><i class="ti ti-pinterest"></i></a></li>
                                <li><a href="#"><i class="ti ti-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--// Single Widget -->

                    <!-- Single Widget -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-links footer-widget-links-1">
                            <h6 class="footer-widget-title">MY ACCOUNT</h6>
                            <ul>
                                <li><a href="#">Track Your Order</a></li>
                                <li><a href="#">Return Polcy</a></li>
                                <li><a href="#">Warranty</a></li>
                                <li><a href="#">Payments</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--// Single Widget -->

                    <!-- Single Widget -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-links footer-widget-links-2">
                            <h6 class="footer-widget-title">SHOP GUIDE</h6>
                            <ul>
                                <li><a href="#">Hot Sale</a></li>
                                <li><a href="#">Best Sellar</a></li>
                                <li><a href="#">Suppliers</a></li>
                                <li><a href="#">Our Store</a></li>
                                <li><a href="#">Deal of The Day</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--// Single Widget -->

                    <!-- Single Widget -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-contact">
                            <h6 class="footer-widget-title">CONTACT INFO</h6>
                            <ul>
                                <li><i class="ti ti-home"></i>Lusmod tempor incididunt wesbvn</li>
                                <li><i class="ti ti-comment"></i>Lorem ipsum dolor sit amet</li>
                                <li><i class="ti ti-mobile"></i><a href="tel:+256987654321">(256) 987 654 321</a></li>
                                <li><i class="ti ti-timer"></i>8.00 am-6.00 pm</li>
                            </ul>
                        </div>
                    </div>
                    <!--// Single Widget -->

                </div>
            </div>
        </div>
        <!--// Footer Top Area -->

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area bg-dark">
            <div class="container">
                <div class="footer-copyright-area">
                    <p>Copyright © 2018 <a href="#">SLIMFIT</a>. All Right Reserved.</p>
                    <img src="img/icons/payment.png" alt="payment icon">
                </div>
            </div>
        </div>
        <!--// Footer Bottom Area -->

    </footer>
    <!--// Footer Area -->

    <!-- Quick View Modal -->
    <div class="quick-view-modal">
        <span class="body-overlay"></span>
        <div class="quick-view-modal-inner">
            <div class="container">

                <!-- Product Details Inner -->
                <div class="row product-details">

                    <!-- Product Details Left -->
                    <div class="col-lg-5">
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-2">
                                <a href="img/product/large-size/product-image-1.jpg">
                                    <img src="img/product/thumbnail-size/product-image-1.jpg" alt="product image">
                                </a>
                                <a href="img/product/large-size/product-image-2.jpg">
                                    <img src="img/product/thumbnail-size/product-image-2.jpg" alt="product image">
                                </a>
                                <a href="img/product/large-size/product-image-3.jpg">
                                    <img src="img/product/thumbnail-size/product-image-3.jpg" alt="product image">
                                </a>
                                <a href="img/product/large-size/product-image-4.jpg">
                                    <img src="img/product/thumbnail-size/product-image-4.jpg" alt="product image">
                                </a>
                            </div>
                            <div class="product-details-thumbs slider-navigation-2">
                                <img src="img/product/small-size/product-image-1.jpg" alt="product image thumb">
                                <img src="img/product/small-size/product-image-2.jpg" alt="product image thumb">
                                <img src="img/product/small-size/product-image-3.jpg" alt="product image thumb">
                                <img src="img/product/small-size/product-image-4.jpg" alt="product image thumb">
                            </div>
                        </div>
                    </div>
                    <!--// Product Details Left -->

                    <!-- Product Details Right -->
                    <div class="col-lg-7">
                        <div class="product-details-right">
                            <h5 class="product-title">Full Body Shapewear</h5>

                            <div class="ratting-stock-availbility">
                                <div class="ratting-box">
                                    <span class="active"><i class="ti ti-star"></i></span>
                                    <span class="active"><i class="ti ti-star"></i></span>
                                    <span class="active"><i class="ti ti-star"></i></span>
                                    <span class="active"><i class="ti ti-star"></i></span>
                                    <span><i class="ti ti-star"></i></span>
                                </div>
                                <span class="stock-available">In stock</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                                justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                                nulla. adipiscing cursus eu, suscipit id nulla.</p>

                            <span class="pricebox"><del>$60.00</del> $50.00</span>

                            <div class="product-details-quantity">
                                <div class="quantity-select">
                                    <input type="text" value="1">
                                </div>
                                <a href="#" class="sf-button sf-button-sm">
                                    <span>ADD TO CART</span>
                                </a>
                            </div>

                            <div class="product-details-color">
                                <span>Color :</span>
                                <ul>
                                    <li class="red"><span></span></li>
                                    <li class="green checked"><span></span></li>
                                    <li class="blue"><span></span></li>
                                    <li class="purple"><span></span></li>
                                </ul>
                            </div>

                            <div class="product-details-size">
                                <span>Size :</span>
                                <ul>
                                    <li class="checked"><span>S</span></li>
                                    <li><span>M</span></li>
                                    <li><span>L</span></li>
                                    <li><span>XL</span></li>
                                    <li><span>XXL</span></li>
                                </ul>
                            </div>

                            <div class="product-details-categories">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="shop.html">Accessories</a></li>
                                    <li><a href="shop.html">Kids</a></li>
                                    <li><a href="shop.html">Women</a></li>
                                </ul>
                            </div>

                            <div class="product-details-tags">
                                <span>Tags :</span>
                                <ul>
                                    <li><a href="shop.html">Electronic</a></li>
                                    <li><a href="shop.html">Television</a></li>
                                </ul>
                            </div>

                            <div class="product-details-socialshare">
                                <span>Share :</span>
                                <ul>
                                    <li><a href="#"><i class="ti ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti ti-twitter"></i></a></li>
                                    <li><a href="#"><i class="ti ti-google"></i></a></li>
                                    <li><a href="#"><i class="ti ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--// Product Details Right -->

                </div>
                <!--// Product Details Inner -->

            </div>
            <button class="close-quickview-modal"><i class="ti ti-close"></i></button>
        </div>
    </div>
    <!--// Quick View Modal -->

</div>
<!--// Wrapper -->


<!-- Js Files -->
<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="js/vendor/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>


<script>


    function removeProduct(i) {

        $.ajax({
            url: "cart_ajax_remove_product.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {product_id: i},
            success: function (result) {
                if (!result.error) {
                    // alert(result);
                    // alert("Success");
                    location.reload();

                } else {
                    alert("Failed");
                    // alert(result.error);
                }
            }

        });





    }
    function updateCart() {

        // var i = $("#test2  input").val();
        // var panel= $("#test2");
        // var inputs = panel.find("input");
        // alert(inputs.val());

        var allVal = '';

        var employees = {
            accounting: []
        };

        // employees.accounting.push({
        //
        // })

        var i = $("#test2  input").each(function () {

            // alert($(this).attr())
            // allVal += '&' + $(this).attr('name') + '=' + $(this).val();
            // var temp = $(this).attr('name');

            employees.accounting.push({

                "id": $(this).attr('name'),
                "value": $(this).val()
            })

        });

        // alert(allVal);
        // alert(employees.accounting[0].value);

        // alert(JSON.stringify(employees.accounting));

        /*
        * Sending json array of product id and new value(quantity) using ajax
        * */

        $.ajax({
            url: "cart_ajax.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {data1: JSON.stringify(employees.accounting)},
            success: function (result) {
                if (!result.error) {
                    // alert(result);
                    alert("qwe");
                } else {
                    alert("zxc");
                    // alert(result.error);
                }
            }

        });


    }


    $(document).ready(function () {


    });


</script>


</body>

</html>
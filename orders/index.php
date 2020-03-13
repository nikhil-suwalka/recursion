<?php
require_once "../includes/database.php";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//TODO: Get hotel id from cookies
$hotel_id = 1;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders Page</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link rel='stylesheet'
          href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container-fluid px-0 bg-black">
    <div class="container px-0">
        <nav class="tanga-header navbar navbar-toggleable-sm justify-content-center">
            <div class="navbar-collapse text-center">
                <a class="navbar-brand mr-4" href="#">
                    <img src="https://dealqueue.tanganetwork.com/images/logo-506c0d3ed2d6fe57bd44a49118fd1939.png"
                         width="" height="30" alt="">
                </a>
            </div>
        </nav>
    </div>
</div>
<div class="container mt-3 mt-md-5">
    <h2 class="text-charcoal hidden-sm-down">Your Orders</h2>
    <h5 class="text-charcoal hidden-md-up">Your Orders</h5>
    <div class="row">


        <?php


        // TODO: generate better order id using uniqid() finction

        $query = "SELECT * FROM transaction, hotel WHERE transaction.hotel_id = 1 AND hotel.hotel_id = 1 ";
        $result1 = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at


        //        Per order loop
        while ($row1 = mysqli_fetch_array($result1)) {

            $hotel_name = $row1["hotel_name"];
            $trans_id = $row1["transaction_id"];
            $datetime = $row1["datetime"];


            ?>


            <div class="col-12">
                <div class="list-group mb-5">
                    <div class="list-group-item p-3 bg-snow" style="position: relative;">
                        <div class="row w-100 no-gutters">
                            <div class="col-6 col-md">
                                <h6 class="text-charcoal mb-0 w-100">Order Number</h6>
                                <a href="" class="text-pebble mb-0 w-100 mb-2 mb-md-0">#<?= $trans_id ?></a>
                            </div>
                            <div class="col-6 col-md">
                                <h6 class="text-charcoal mb-0 w-100">Date</h6>
                                <p class="text-pebble mb-0 w-100 mb-2 mb-md-0"><?= $datetime ?></p>
                            </div>

                            <!--                            For total Price-->
                            <?php

                            $query2 = "SELECT * FROM orders, product, company WHERE  orders.transaction_id = $trans_id AND product.product_id = orders.product_ID AND product.company_id = company.company_id";
                            $result = $mysqli->query($query2) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                            $total_price = 0;
                            while ($row = mysqli_fetch_array($result)) {

                                $price = $row["product_price"];
                                $qty = $row["quantity"];
                                $ml = $row["product_ML"];
                                $pc = $row["carton_type"];
                                if ($pc != null) {
                                    $query = "SELECT carton_price, size FROM carton, product_carton WHERE product_carton.pc_ID = $pc AND product_carton.carton_ID = carton.carton_ID";
                                    $result2 = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                                    $row2 = mysqli_fetch_array($result2);
                                    $size = $row2["size"];

                                    // Carton price
                                    $price = $row2["carton_price"];

                                }
                                $total_price += ($price * $qty);


                            }
                            ?>


                            <div class="col-6 col-md">
                                <h6 class="text-charcoal mb-0 w-100">Total</h6>
                                <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">₹<?= $total_price ?></p>
                            </div>
                            <div class="col-6 col-md">
                                <h6 class="text-charcoal mb-0 w-100">Shipped To</h6>
                                <p class="text-pebble mb-0 w-100 mb-2 mb-md-0"><?= $hotel_name ?></p>
                            </div>
                            <!--                        <div class="col-12 col-md-3">-->
                            <!--                            <a href="" class="btn btn-primary w-100">View Order</a>-->
                            <!--                        </div>-->
                        </div>

                    </div>
                    <div class="list-group-item p-3 bg-white">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-9 pr-0 pr-md-3">
                                <div class="alert p-2 alert-success w-100 mb-0">
                                    <h6 class="text-green mb-0"><b>Shipped</b></h6>
                                    <p class="text-green hidden-sm-down mb-0">Est. delivery between Aug 5 – Aug 9th,
                                        2017</p>
                                </div>
                            </div>

                            <?php

                            $query2 = "SELECT * FROM orders, product, company WHERE  orders.transaction_id = $trans_id AND product.product_id = orders.product_ID AND product.company_id = company.company_id";
                            $result = $mysqli->query($query2) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                            $total_price = 0;
                            //                        items per order
                            while ($row = mysqli_fetch_array($result)) {
//        echo $row["order_id"] . "---" . $row["product_name"] . "<br>";
                                $order_id = $row["order_id"];
                                $product_id = $row["product_id"];
                                $product_category = $row["product_category"];
                                $name = $row['product_name'];
                                $price = $row["product_price"];
                                $qty = $row["quantity"];
                                $ml = $row["product_ML"];
                                $pc = $row["carton_type"];

                                $company_name = $row["company_name"];


                                if ($pc != null) {
                                    $query = "SELECT carton_price, size FROM carton, product_carton WHERE product_carton.pc_ID = $pc AND product_carton.carton_ID = carton.carton_ID";
                                    $result2 = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                                    $row2 = mysqli_fetch_array($result2);
                                    $size = $row2["size"];

                                    // Carton price
                                    $price = $row2["carton_price"];

                                }
                                $total_price += ($price * $qty);

                                ?>

                                <div class="row no-gutters mt-3">

                                    <div class="col-3 col-md-2">
                                        <img class="img-fluid pr-3"
                                             src="../images2/<?= $product_category . "/" . $product_category . $product_id . ".jpg" ?>"
                                             alt="" style="height: 100px; width: 60px;">
                                    </div>

                                    <div class="col-12 col-md-8 pr-0 pr-md-3">
                                        <h6 class="text-charcoal mb-2 mb-md-1">
                                            <a href="" class="text-charcoal"> <?= $company_name ?></a>
                                        </h6>
                                        <h6 class="text-charcoal mb-2 mb-md-1">
                                            <a href="" class="text-charcoal"> <?= $name ?></a>
                                        </h6>

                                        <?php
                                        if ($pc != null) {
                                            echo "<span style='font-size: 15px; font-style: italic; color: #636860' > Carton of <b> $size</b></span>";
                                        }
                                        ?>

                                        <ul class="list-unstyled text-pebble mb-2 small">
                                            <li class="">
                                                <b>Quantity:</b> <?= $qty ?>
                                            </li>
                                            <li class="">
                                                <b>Size:</b> <?= $ml ?>
                                            </li>
                                        </ul>
                                        <h6 class="text-charcoal text-left mb-0 mb-md-2"><b><?= "₹" . $price ?></b></h6>
                                    </div>
                                    <div class="col-12 col-md-2 hidden-sm-down" style="visibility: hidden">
                                        <a href="" class="btn btn-secondary w-100 mb-2">Buy It Againddddddddddd</a>
                                        <a href="" class="btn btn-secondary w-100">Request a Returnqqqqqq</a>
                                    </div>
                                </div>

                                <?php


                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            //            echo "tran changed";

        }

        ?>


        <!--        ORDER START -->
        <!--        TODO: CONVERT TO PHP-->
        <div class="col-12">
            <div class="list-group mb-5">
                <div class="list-group-item p-3 bg-snow" style="position: relative;">
                    <div class="row w-100 no-gutters">
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Order Number</h6>
                            <a href="" class="text-pebble mb-0 w-100 mb-2 mb-md-0">#A915AFLE4FO</a>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Date</h6>
                            <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">Aug 5th, 2017</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Total</h6>
                            <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">$19.54</p>
                        </div>
                        <div class="col-6 col-md">
                            <h6 class="text-charcoal mb-0 w-100">Shipped To</h6>
                            <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">Late M. Night</p>
                        </div>
                        <!--                        <div class="col-12 col-md-3">-->
                        <!--                            <a href="" class="btn btn-primary w-100">View Order</a>-->
                        <!--                        </div>-->
                    </div>

                </div>
                <div class="list-group-item p-3 bg-white">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-9 pr-0 pr-md-3">
                            <div class="alert p-2 alert-success w-100 mb-0">
                                <h6 class="text-green mb-0"><b>Shipped</b></h6>
                                <p class="text-green hidden-sm-down mb-0">Est. delivery between Aug 5 –
                                    Aug 9th,
                                    2017</p>
                            </div>
                        </div>
                        <!--                        <div class="col-12 col-md-3">-->
                        <!--                            <a href="" class="btn btn-secondary w-100 mb-2">Track Shipment</a>-->
                        <!--                        </div>-->
                        <div class="row no-gutters mt-3">
                            <div class="col-3 col-md-1">
                                <img class="img-fluid pr-3"
                                     src="../images2/103/1031.jpg"
                                     alt="" style="height: 100px;">
                            </div>
                            <div class="col-9 col-md-8 pr-0 pr-md-3">
                                <h6 class="text-charcoal mb-2 mb-md-1">
                                    <a href="" class="text-charcoal">1 x URGE Basics iPhone 6/iPhone 6
                                        Plus
                                        Magnetic
                                        Wallet Case</a>
                                </h6>
                                <ul class="list-unstyled text-pebble mb-2 small">
                                    <li class="">
                                        <b>Color:</b> Red
                                    </li>
                                    <li class="">
                                        <b>Size:</b> L
                                    </li>
                                </ul>
                                <h6 class="text-charcoal text-left mb-0 mb-md-2"><b>$19.54</b></h6>
                            </div>
                            <div class="col-12 col-md-3 hidden-sm-down">
                                <a href="" class="btn btn-secondary w-100 mb-2">Buy It Again</a>
                                <a href="" class="btn btn-secondary w-100">Request a Return</a>
                            </div>
                        </div>
                        <div class="row no-gutters mt-3">
                            <div class="col-3 col-md-1">
                                <img class="img-fluid pr-3"
                                     src="../images2/104/1043.jpg"
                                     alt="" style="height: 100px;">
                            </div>
                            <div class="col-9 col-md-8 pr-0 pr-md-3">
                                <h6 class="text-charcoal mb-2 mb-md-1">
                                    <a href="" class="text-charcoal">1 x URGE Basics iPhone 6/iPhone 6
                                        Plus
                                        Magnetic
                                        Wallet Case</a>
                                </h6>
                                <ul class="list-unstyled text-pebble mb-2 small">
                                    <li class="">
                                        <b>Color:</b> Red
                                    </li>
                                    <li class="">
                                        <b>Size:</b> L
                                    </li>
                                </ul>
                                <h6 class="text-charcoal text-left mb-0 mb-md-2"><b>$19.54</b></h6>
                            </div>
                            <div class="col-12 col-md-3 hidden-sm-down">
                                <a href="" class="btn btn-secondary w-100 mb-2">Buy It Again</a>
                                <a href="" class="btn btn-secondary w-100">Request a Return</a>
                            </div>
                        </div>
                        <div class="row no-gutters mt-3">
                            <div class="col-3 col-md-1">
                                <img class="img-fluid pr-3"
                                     src="../images2/103/1032.jpg"
                                     alt="" style="height: 100px;">
                            </div>
                            <div class="col-9 col-md-8 pr-0 pr-md-3">
                                <h6 class="text-charcoal mb-2 mb-md-1">
                                    <a href="" class="text-charcoal">1 x URGE Basics iPhone 6/iPhone 6
                                        Plus
                                        Magnetic
                                        Wallet Case</a>
                                </h6>
                                <ul class="list-unstyled text-pebble mb-2 small">
                                    <li class="">
                                        <b>Color:</b> Red
                                    </li>
                                    <li class="">
                                        <b>Size:</b> L
                                    </li>
                                </ul>
                                <h6 class="text-charcoal text-left mb-0 mb-md-2"><b>$19.54</b></h6>
                            </div>
                            <div class="col-12 col-md-3 hidden-sm-down">
                                <a href="" class="btn btn-secondary w-100 mb-2">Buy It Again</a>
                                <a href="" class="btn btn-secondary w-100">Request a Return</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ORDER OVER-->


        <div class="col-12 col-md-4">
            <div class="pt-5 pt-md-0">
                <div class="list-group mb-3">
                    <div class="list-group-item p-3 bg-snow">
                        <h6 class="mb-0">Order Summary</h6>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-6 text-pebble">
                                Subtotal
                            </div>
                            <div class="col-6 text-right text-charcoal">
                                $54.97
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-6 text-pebble">
                                Sales Tax
                            </div>
                            <div class="col-6 text-right text-charcoal">
                                $4.30
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-6 text-pebble">
                                Shipping
                            </div>
                            <div class="col-6 text-right text-charcoal">
                                FREE
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-white">
                        <div class="row w-100 no-gutters">
                            <div class="col-8 text-pebble">
                                Gift certificate
                            </div>
                            <div class="col-4 text-right text-red text-charcoal">
                                -$5.55
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item py-2 px-3 bg-snow">
                        <div class="row w-100 no-gutters">
                            <div class="col-8 text-charcoal">
                                <b>Total</b>
                            </div>
                            <div class="col-4 text-right text-green">
                                <b>$53.65</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="p-3 hidden-md-up"></div>
<div class="mobile-nav hidden-md-up">
    <a href="">
        <i class="fa fa-home"></i>
        Deals
    </a>
    <a class="" href="">
        <i class="fa fa-th-large"></i>
        Categories
    </a>
    <a href="">
        <i class="fa fa-search"></i>
        Search
    </a>
    <a href="" class="active">
        <i class="fa fa-shopping-cart"></i>
        Cart
    </a>
    <a class="" href="">
        <i class="fa fa-user"></i>
        Account
    </a>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script>

</body>
</html>
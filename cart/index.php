<!-- Other cart -->
<!--file:///F:/wamp64/www/boighorbookshtml/boighorbookshtml/boighor/cart.html-->

<?php

require_once "includes/database.php";
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//TODO: Get hotel id from cookies
$hotel_id = 1;

// Get cookie
//$cookie_name = "";
//$products_array = json_decode($_COOKIE[$cookie_name]);

$products_array = array();
$a = array();
array_push($a, "1");
array_push($a, "prod1");
array_push($a, 100);
array_push($a, 1);

array_push($products_array, $a);
$a = array();
array_push($a, "2");
array_push($a, "prod2");
array_push($a, 200);
array_push($a, 1);

array_push($products_array, $a);
print_r($products_array);
echo json_encode($products_array);

// Creating associative array of carton id and size
//$query = "SELECT * FROM carton";
//$result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
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


<!-- Wrapper -->
<div id="wrapper" class="wrapper">


    <!-- Page Conttent -->
    <main class="page-content">

        <!-- Shopping Cart Area -->
        <div class="wishlist-page-area section-padding-lg bg-white">
            <div class="container">

                <!-- Cart Products -->
                <div class="cart-table table-responsive" id="test2">

                    <h5 style="text-align: center;" id="table_message"></h5>
                    <!--                    --><?php //print_r($products_array)?>
                    <table class="table table-bordered table-hover">
                        <thead>

                        <tr>
                            <th class="cart-column-productname" scope="col">PRODUCT</th>
                            <th class="cart-column-price" scope="col">PRICE</th>
                            <th class="cart-column-quantity" scope="col">QUANTITY</th>
                            <!--                            <th class="cart-column-addtocart" scope="col">ADD TO CART</th>-->
                            <th class="cart-column-remove" scope="col">REMOVE</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        $total_price = 0;
                        $json_array = json_encode($products_array);
                        for ($i = 0; $i < sizeof($products_array); $i++) {


                            echo "<tr><td>";
                            echo $products_array[$i][1];
                            echo "</td>";
                            echo "<td>₹";
                            echo $products_array[$i][2];
                            echo "</td>";
                            $qty = $products_array[$i][3];
                            $id = $products_array[$i][0];

                            echo "<td>
                                <div class=\"quantity-select\" id='test'>
                                    <input type=\"text\" value=\"$qty\" name='$id'>
                                </div>
                            </td>";


                            echo $products_array[$i][3];
                            echo "</td><td>
                                <button class=\"remove-product\" name='id' onclick='removeProduct($id, $json_array)'><i class=\"ti ti-close\"></i></button>
                            </td>
                        </tr>";
                            $total_price += ($products_array[$i][2] * $qty);


                        }


//                        $total_price = 0;
                        while ($row = mysqli_fetch_array($result)) {

                            $product_id = $row["product_id"];
                            $product_category = $row["product_category"];
                            $name = $row['product_name'];
                            $price = $row["product_price"];
                            $qty = $row["quantity"];
                            $ml = $row["product_ML"];
                            // TODO: change to pc id
                            $pc = $row["carton_type"];
//                            $carton_price = $row["carton_price"];
//                            echo "<h1>$carton_price</h1>";
                            if ($pc != null) {
                                $query = "SELECT carton_price, size FROM carton, product_carton WHERE product_carton.pc_ID = $pc AND product_carton.carton_ID = carton.carton_ID";
                                $result2 = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
                                $row2 = mysqli_fetch_array($result2);
                                $size = $row2["size"];

                                // Carton price
                                $price = $row2["carton_price"];

//                                $carton_price = $row2["carton_price"];


                            }
//                            $total_price += ($price * $qty);


                            echo "<tr><td>";


                            echo "<a href=\"product-details-right-sidebar.html\" class=\"product-title\">$name</a>";
                            echo "<br> $ml";

                            if ($pc != null) {
//                                $size = $cartons[$carton];
                                echo "<span style='font-size: 15px'><br> Carton of $size</span>";
                            }

                            echo "</td>
                                    <td style='font-size: 130%; font-style: oblique; '>₹" . number_format($price) . "</td>";
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

                        </tbody>
                    </table>
                </div>
                <!--// Cart Products -->


                <!--			Cart box		-->
                <div>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                            <li><a href="#" onclick="updateCart()">Update Cart</a></li>
                            <li><a href="#">Check Out</a></li>
                            <li><a href="#">Clear cart</a></li>

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
                                    <span>₹ <?= number_format($total_price) ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!--// Cart box -->


            </div>
        </div>
        <!--// Shopping Cart Area -->

    </main>
    <!--// Page Conttent -->


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


    function removeProduct(i, jsonarray) {

        $.ajax({
            url: "cart_ajax_remove_product.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {to_remove: i, json_array: jsonarray},
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

    function checkOut() {

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

            url: "cart_ajax_update_cart.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            data: {data1: JSON.stringify(employees.accounting)},
            success: function (result) {
                if (!result.error) {
                    // alert(result);
                    alert("qwe");
                    location.reload();
                } else {
                    alert("zxc");

                    // alert(result.error);
                }
            }

        });

        location.reload();
        $("#table_message").text("Table Updated");
        alert("Table Updated");


    }


    $(document).ready(function () {


    });


</script>


</body>

</html>
<?php
require_once "../includes/database.php";
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


// TODO: Get from cookies
$hotel_id = 1;

// TODO: generate better order id using uniqid() finction

$query = "SELECT * FROM transaction, hotel WHERE transaction.hotel_id = 1 AND hotel.hotel_id = 1 ";
$result1 = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at

while ($row1 = mysqli_fetch_array($result1)) {

    $hotel_name = $row1["hotel_name"];
    echo $hotel_name . "<br>";
    $trans_id = $row1["transaction_id"];
    echo $trans_id . "<br><br>";

    $query2 = "SELECT * FROM orders, product WHERE  orders.transaction_id = $trans_id AND product.product_id = orders.product_ID";
    $result = $mysqli->query($query2) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at
    $total_price = 0;

    while ($row = mysqli_fetch_array($result)) {
        echo $row["order_id"] . "---" . $row["product_name"] . "<br>";
        $product_id = $row["product_id"];
        $product_category = $row["product_category"];
        $name = $row['product_name'];
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
        if ($pc != null) {
            echo "<span style='font-size: 15px'><br> Carton of $size</span>";
        }

    }


    echo "tran changed";

}

// TODO: get carton from product_carton if orders.carton != null
<!DOCTYPE html>
<html>
<head>
    <?php
    if (!isset($_SESSION["user_type"]))
        session_start();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shop</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<?php
if (!isset($_SESSION["user_type"]))
    include("header_nav.php");
else if ($_SESSION["user_type"] == 1)
    include("header_nav_user.php");
else if ($_SESSION["user_type"] == 2)
    include("header_nav_emp.php");
else if ($_SESSION["user_type"] == 3)
    include("header_nav_owner.php");
?>
</head>
<body style="background-color: white">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recursion";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT * from orders where user_id=$user_id";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $order_id = $row["order_id"];
        echo "<div style='margin:12%'>";
        echo "<center><table style='color: black;width: 500px;' class='table'>";
        echo "<tr style='background-color: #1b1e21;color: white'>
                    <td>Order ID</td>
                    <td>Status</td>
                    <td>Timestamp</td>
                </tr>";
        echo '
                <tr>
                    <td>' . $row["order_id"] . '</td>
                    <td>' . ($row["status"] == 0 ? "Pending" : "Successful") . '</td>
                    <td>' . $row["timestamp"] . '</td>
                </tr>';
//            $innersql = "SELECT * from order_product where order_id=".$row["order_id"];
        echo "<tr>
                        <td>Product Name</td>
                        <td>Product Price</td>
                        <td>Quantity</td>
                    </tr>
                ";
        $sql2 = "SELECT * from product,order_product,orders where order_product.product_id=product.product_id AND order_product.order_id=$order_id AND orders.user_id=$user_id GROUP BY product.product_id";
        $innerresult = $conn->query($sql2);
        $total = 0;
        while ($innerrow = $innerresult->fetch_assoc()) {

            $productid = $innerrow["product_id"];
            echo '<tr>
                        <td>' . $innerrow["product_name"] . '</td>
                        <td>' . $innerrow["product_price"] . '</td>
                        <td>' . $innerrow["quantity"] . '</td>
                    </tr>
                ';
            $total += $innerrow["product_price"] * $innerrow["quantity"];
        }
        echo "<tr style='background-color: #cccc1e;color: black'><td>Total: $total</td></tr>";
        echo "<table/><center><hr></div>";
    }

}


?></body>
</html>

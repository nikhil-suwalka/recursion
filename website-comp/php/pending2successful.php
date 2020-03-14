<?php
if ($_GET) {
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
        $sql = "UPDATE orders SET status=1 where order_id=".$_GET["order_id"];
        $result = $conn->query($sql);
    }
}
?>
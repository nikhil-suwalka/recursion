<?php
if($_GET) {
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
        $cat_id = mysqli_real_escape_string($conn, $_GET['cat_id']);
        $store_id = mysqli_real_escape_string($conn, $_GET['store_id']);
        $sql = "SELECT type_name,type_id from product_type where store_id='$store_id' and category_id='$cat_id'";
//        $sql = "SELECT * from product_type";
        $result = $conn->query($sql);
        if(!$result){
            die("error: " . mysqli_error($mysqli));
        }
        $data = array();
        while($row = $result->fetch_assoc()){
            array_push($data,$row["type_name"].",".$row["type_id"]);
        }
        echo json_encode($data);
    }
    $conn->close();
}
?>
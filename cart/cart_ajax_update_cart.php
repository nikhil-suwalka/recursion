<?php

require_once "../includes/database.php";
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


// TODO: Get from cookies
$hotel_id = 1;


$data = $_POST["data1"];
//$data = "[{\"id\":\"1\",\"value\":\"61\"},{\"id\":\"2\",\"value\":\"62\"},{\"id\":\"3\",\"value\":\"63\"},{\"id\":\"4\",\"value\":\"64\"}]";

$someArray = json_decode($data, true);

//print_r($data);

print_r($someArray);
//print_r($someArray[0]["id"]);

//echo sizeof($someArray);

for ($i = 0; $i < sizeof($someArray); $i++) {

    $qty = $someArray[$i]["value"];
    $product_id = $someArray[$i]["id"];

    $query = "UPDATE cart SET quantity = $qty WHERE hotel_ID = $hotel_id AND product_ID = $product_id";
    $result = $mysqli->query($query) or die(json_encode($mysqli->error . " " . __LINE__)); //__LINE__ shows the line no. we are getting the error at


}

echo json_encode(1);

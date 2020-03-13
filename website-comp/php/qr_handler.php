<?php
if (!isset($_SESSION))
    session_start();
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
        $prod_id = mysqli_real_escape_string($conn, $_GET['prod_id']);
        $sql = "SELECT * from product where product_id='$prod_id'";
        $result = $conn->query($sql);
        if (!$result) {
            die("error: " . mysqli_error($mysqli));
        }
        $result = $result->fetch_assoc();
        $cart = array();
        $cookie_name = "";
        if (isset($_SESSION["user_name"]))
            $cookie_name = $_SESSION["user_name"];
        else
            $cookie_name = "GUEST";
        $found = False;
        if (isset($_COOKIE[$cookie_name])) {
            $cart = json_decode($_COOKIE[$cookie_name], true);

            for ($i=0;$i<sizeof($cart);$i+=1){
                if($cart[$i][0]==$prod_id){
                    $found = True;
                    break;
                }
            }

        }
        if(!$found){
            $product = array();
            array_push($product, $result["product_id"]);
            array_push($product, $result["product_name"]);
            array_push($product, $result["product_price"]);
            array_push($product, 1);
            array_push($cart, $product);
            $cart = json_encode($cart);
            $cookie_cart = $cart;
//         $_COOKIE[$cookie_name] = $cookie_cart;
            setcookie($cookie_name, $cookie_cart, time() + (86400 * 30), "/");
        }
        echo 1;
    }
    $conn->close();
}

?>

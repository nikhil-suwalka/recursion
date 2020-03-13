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
}else{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password =sha1( mysqli_real_escape_string($conn,$_POST['password']));
    $pno = mysqli_real_escape_string($conn,$_POST['pno']);
    $f_name = mysqli_real_escape_string($conn,$_POST['f_name']);
    $add = mysqli_real_escape_string($conn,$_POST['add']);

    $sql = "SELECT * from users where 'user_email'='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo 0;
    }else{
        //user_address
        //user_email
        //user_id
        //user_mobile_number
        //user_name
        //user_password
        //user_type
        $sql = "INSERT INTO users (user_address,user_email,user_mobile_number,user_name,user_password,user_type) VALUES('$add','$email','$pno','$f_name','$add',1)";
        $conn->query($sql);
        echo 1;
    }
}



$conn->close();



?>
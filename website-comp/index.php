<!DOCTYPE html>
<html>
<?php
if(!isset($_SESSION["user_type"]))
    session_start();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shop</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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

</head>

<body id="page-top">
<?php
if(!isset($_SESSION["user_type"]))
    include("header_nav.php");
else if($_SESSION["user_type"]==1)
    include("header_nav_user.php");
else if($_SESSION["user_type"]==2)
    include("header_nav_emp.php");
else if($_SESSION["user_type"]==3)
    include("header_nav_owner.php");
?>
<?php
function checkDevice() {
// checkDevice() : checks if user device is phone, tablet, or desktop
// RETURNS 0 for desktop, 1 for mobile, 2 for tablets

    if (is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"))) {
        return is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "tablet")) ? 2 : 1 ;
    } else {
        return 0;
    }
}

$deviceType = checkDevice();
if ($deviceType!=0) {
    include("bg.php");
} else {
    include("QR.php");
}
?>

<div class="map-clean" id="alert">

</div>
<footer style="position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;">
    <div class="container text-center">
        <p>Copyright ©&nbsp;Store 2020</p>
    </div>
</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="assets/js/grayscale.js"></script>
</body>

</html>
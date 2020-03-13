<!DOCTYPE html>
<html>

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
    <script src="js/validate_register.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            submit1();
        });
    </script>
</head>

<body id="page-top">
<?php
include("header_nav.php");
?>
<div class="map-clean"></div>
<div class="register-photo" style="background-color: rgb(0,0,0);">
    <div class="form-container">
        <div class="image-holder"
             style="background-color: #000000; background-image: url(&quot;data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236d6b70' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E&quot;);"></div>
        <form method="post" style="background-color: rgb(44,44,44);height: 600px;" id="reg_form">
        <h2 class="text-center" style="color: rgb(255,255,255);">Register</h2>
        <div class="form-group"><input class="form-control" type="email" id="email" placeholder="Email" required=""
                                       onblur="fun()"></div>
        <div id="emailval"></div>
        <div class="form-group"><input onblur="fun2()" class="form-control" type="password" id="password"
                                       placeholder="Password" minlength="8" required=""></div>
        <div id="passval"></div>
        <div class="form-group"><input onblur="fun300()" class="form-control" type="password" id="password-repeat"
                                       placeholder="Password (repeat)" required="" minlength="8"></div>
        <div id="passval2"></div>
        <div class="form-group"><input onblur="fun81()" class="form-control" type="number" id="pno"
                                       placeholder="Phone no" required="" minlength="10" maxlength="10"></div>
        <div id="pnoval"></div>
        <div class="form-group"><input class="form-control" type="text" id="f_name" placeholder="Full name"></div>
        <div id="f_name_val"></div>
        <div class="form-group"><input class="form-control" type="text" id="add" placeholder="Address"></div>
        <div id="addval"></div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" id="submit">Sign Up</button>
        </div>
        <a class="already" href="login.php  ">You already have an account? Login here.</a></form>
        <div id="result"></div>
    </div>
</div>
<footer>
    <div class="container text-center">
        <p>Copyright ©&nbsp;Brand 2020</p>
    </div>
</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="assets/js/grayscale.js"></script>
</body>
<script>
    $('#reg_form').submit(function () {
        $.ajax({
            type: "POST",
            url: "php/register_db_logic.php",
            data: {
                email: "email",
                password: "password",
                pno: "pno",
                f_name: "f_name",
                add: "add"
            },
            success: function (data) {
                if(data){
                    document.getElementById("result").innerHTML = "Account created successfully!";
                }else{
                    document.getElementById("result").innerHTML = "Email ID already exists!";
                }
            }
        });
    });
</script>
</html>
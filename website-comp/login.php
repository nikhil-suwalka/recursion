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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/validate.js"></script>
    <script>
        $(document).ready(function() {
            submit1();
        });
    </script>
</head>

<body id="page-top">
    <?php
    include("header_nav.php");
    ?>
    <div class="login-dark" style="background-image: url(&quot;assets/img/intro-bg.jpg&quot;);height: 700px;">
        <form method="post" style="background-color: rgb(38,40,41);">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color: #fafafa;"></i></div>
            <div class="form-group"><input class="form-control" type="email" id="email" placeholder="Email" inputmode="email" onblur="fun()"><div id="emailval"></div></div>

            <div class="form-group"><input class="form-control" type="password" id="password" placeholder="Password" onblur="fun2()"><div id="passval"></div></div>

            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="login" style="background-color: rgb(180,180,180);">Log In</button></div>
        </form>
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
    $(document).ready(function(){
        $(".emailval").hide();
        $(".passval").hide();
    });
</script>
</html>
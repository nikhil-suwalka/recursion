<!DOCTYPE html>
<?php
if(!isset($_SESSION))
    session_start();

$msg = "";
if($_POST) {
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
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = sha1(mysqli_real_escape_string($conn, $_POST['password']));


        $sql = "SELECT * from users where user_email='$email'";
        $result = $conn->query($sql);
        $msg = "";
        if ($result->num_rows == 0) {
            $msg = "No user exists with provided Email ID.";
        } else {
            //user_address
            //user_email
            //user_id
            //user_mobile_number
            //user_name
            //user_password
            //user_type
            $sql = "SELECT * from users where user_email='$email' and user_password='$password'";
            $result = $conn->query($sql);
            if ($result->num_rows ==0) {
                $msg = "Incorrect Email or Password.";
                session_destroy();
            }else{
                $msg = "Logged In!";
                $result = $result->fetch_assoc();
                $_SESSION["user_id"]=$result["user_id"];
                $_SESSION["user_email"]=$result["user_email"];
                $_SESSION["user_type"]=$result["user_type"];
                $_SESSION["user_name"]=$result["user_name"];
                header("Location: index.php");
            }
        }

    }
    $conn->close();
}
?>
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
    <div class="login-dark" style="background-image: url(&quot;assets/img/intro-bg.jpg&quot;);height: 700px;">
        <form method="post" style="background-color: rgb(38,40,41);" action="login.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="color: #fafafa;"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" id="email" placeholder="Email" inputmode="email" onblur=""><div id="emailval"></div></div>

            <div class="form-group"><input class="form-control" type="password" name="password" id="password" placeholder="Password"><div id="passval"></div></div>
            <div id="result" style="color: red"><?php echo $msg; ?></div>
            <div class="form-group"><input class="btn btn-primary btn-block" type="submit" id="login" style="background-color: rgb(180,180,180);" value="Log In"></div>
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

</html>
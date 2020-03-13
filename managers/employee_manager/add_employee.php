<?php include('includes/database.php'); ?>
<?php

//TODO: get from cookies

$store_id = $_GET['store_id'];


function getNextIncrement($table)
{
    global $mysqli, $sql_db_name;
    $next_increment = 1;
    $table = mysqli_escape_string($mysqli, $table);
    $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recursion' AND TABLE_NAME = '$table'";
    $results = $mysqli->query($sql);
    while ($row = $results->fetch_assoc()) {
        $next_increment = $row['AUTO_INCREMENT'];
    }
    return $next_increment;
}

if ($_POST) { //to check if form is submitted
    $name = mysqli_real_escape_string($mysqli, $_POST["user_name"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["user_email"]);
    $number = mysqli_real_escape_string($mysqli, $_POST["user_number"]);
    $address = mysqli_real_escape_string($mysqli, $_POST["user_address"]);
    $password= sha1(mysqli_real_escape_string($mysqli, $_POST["user_password"]));
    $query = "INSERT INTO users (user_name, user_mobile_number, user_email, user_address, user_password, user_type)
              VALUES ('$name', '$number', '$email', '$address','$password', 2)";

    //Run query
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    $increament= getNextIncrement('users')-1;


    $query = "INSERT INTO employee_store (user_id,store_id)
              VALUES ('$increament','$store_id')";

    //
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $msg = "Employee Added";
    header("Location: index.php?msg=" . urlencode($msg) ."&store_id=". $store_id); //?msg to show some message in index
    exit;

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>EManager | Add Employee</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

<body>

<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="add_customer.php">Add Employee</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Employee Manager</h3>
    </header>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Add Employees</h2>

                <form method="post" action="add_employee.php?store_id=<?=$store_id?>">
                    <div class="form-group">
                        <label>Name of Employee</label>
                        <input name="user_name" type="text" class="form-control" placeholder="Enter First Name">
                    </div>


                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="user_email" type="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input name="user_number" type="number" class="form-control" placeholder="Enter Number">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="user_address" type="text" class="form-control" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="user_password" type="password" class="form-control" placeholder="Enter Password">
                    </div>

                    <input type="submit" class="btn btn-default" value="Add Employee"/>
                </form>


            </div>

        </div>

    </main>

    <footer class="footer">
        <p><center>&copy; Store 2020</center></p>
    </footer>

</div> <!-- /container -->
</body>
</html>

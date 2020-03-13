<?php include('includes/database.php'); ?>
<?php

//TODO: get from cookies
$userid = 2;
if ($_POST) { //to check if form is submitted
    $name = mysqli_real_escape_string($mysqli, $_POST["store_name"]);
    $location = mysqli_real_escape_string($mysqli, $_POST["location"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $number = mysqli_real_escape_string($mysqli, $_POST["contact_number"]);


    $query = "INSERT INTO store (store_name, store_location, store_contact_number, store_email, user_id)
              VALUES ('$name', '$location', '$number', '$email', $userid)";

    //Run query

    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $msg = "Store Added";
    header("Location: index.php?msg=" . urlencode($msg) . ""); //?msg to show some message in index
    exit;

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Add Customer</title>

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
                    <a class="nav-link active" href="add_customer.php">Add Customer</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Store Manager</h3>
    </header>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Add Stores</h2>

                <form method="post" action="add_store.php">
                    <div class="form-group">
                        <label>Name of the Store</label>
                        <input name="store_name" type="text" class="form-control" placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                        <label>Store location</label>
                        <input name="location" type="text" class="form-control" placeholder="Enter Last Name">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input name="contact_number" type="password" class="form-control" placeholder="Enter Password">
                    </div>


                    <input type="submit" class="btn btn-default" value="Add Customer"/>
                </form>


            </div>

        </div>

    </main>

    <footer class="footer">
        <p>&copy; Company 2017</p>
    </footer>

</div> <!-- /container -->
</body>
</html>

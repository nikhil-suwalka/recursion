<?php include('includes/database.php'); ?>
<?php

//TODO: get from cookies
$userid = 2;

$category_id = $_GET['category_id'];
$store_id = $_GET['store_id'];
if ($_POST) { //to check if form is submitted
    $name = mysqli_real_escape_string($mysqli, $_POST["type_name"]);
    $loc = mysqli_real_escape_string($mysqli, $_POST["type_loc"]);
    $query = "INSERT INTO product_type (type_name,location, category_id, store_id)
              VALUES ('$name', '$loc', $category_id, $store_id)";

    //Run query

    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $msg = "Sub-category Added";
    header("Location: index.php?msg=" . urlencode($msg) . "&category_id=" . $_GET['category_id'] . "&store_id=" . $_GET['store_id']); //?msg to show some message in index
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

                <form method="post">
                    <div class="form-group">
                        <label>Name of the Sub-category</label>
                        <input name="type_name" type="text" class="form-control" placeholder="Enter Sub-category Name">
                    </div>

                    <div class="form-group">
                        <label>Location of the Sub-category in the store</label>
                        <input name="type_loc" type="text" class="form-control" placeholder="Format: A[aisle no]_S[shelf no]">
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

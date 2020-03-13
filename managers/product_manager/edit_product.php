<?php include('includes/database.php'); ?>
<?php
//Assign get variable
$store_id = $_GET['id'];


//TODO: get user id form session
$userid = 2;

//Create customer select query


//Create the select query
$query = "SELECT * 
          FROM store
          WHERE store.user_id = $userid and store.store_id = $store_id";

$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);
$numrows = $result->num_rows;

if ($numrows > 0) {
    if ($result = $mysqli->query($query)) {
        //Fetch object array
        while ($row = $result->fetch_assoc()) {
            $name = $row['store_name'];
            $store_location = $row['store_location'];
            $store_contact_number = $row['store_contact_number'];
            $store_email = $row['store_email'];

        }
        //Free Result set
        $result->close();


    }
}

?>


<?php


if ($_POST) { //to check if form is submitted
//Assign get variable
    $id = $_GET['id']; //get user id form url

    $name = mysqli_real_escape_string($mysqli, $_POST["store_name"]);
    $location = mysqli_real_escape_string($mysqli, $_POST["location"]);
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $number = md5(mysqli_real_escape_string($mysqli, $_POST["contact_number"])); // md5  -to encrypt the password


    //Create customer update
    $query = "UPDATE store
              SET
              store_name = '$name',
              store_location = '$store_location',
              store_email = '$store_email',
              store_contact_number = '$store_contact_number'
              WHERE store_id=$store_id";

    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    $msg = "Store details updated";
    header("Location:index.php?msg=" . urlencode($msg) . "");
    exit;


}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Edit Customer</title>

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
        <h3 class="text-muted">Store CManager</h3>
    </header>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Edit Customers </h2>


                <form method="post" action="edit_store.php?id=<?php echo $store_id; ?>">

                    <?php if ($numrows > 0) {


                        ?>
                        <div class="form-group">
                            <label>Name of the Store</label>
                            <input name="store_name" type="text" class="form-control" value="<?php echo $name ?>"
                                   placeholder="Enter First Name">
                        </div>


                        <div class="form-group">
                            <label>Store location</label>
                            <input name="location" type="text" class="form-control"
                                   value="<?php echo $store_location ?>"
                                   placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input name="email" type="email" class="form-control" value="<?php echo $store_email ?>"
                                   placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input name="contact_number" type="password" class="form-control"
                                   value="<?php echo $store_contact_number ?>" placeholder="Enter Password">
                        </div>

                        <input type="submit" class="btn btn-default" value="Update Customer"/>


                        <?php
                    } else echo "<span style='color: red;'>Invalid Page</span>";

                    ?>
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

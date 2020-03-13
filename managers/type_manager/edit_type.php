<?php include('includes/database.php'); ?>
<?php
//Assign get variable
$store_id = $_GET['store_id'];
$type_id = $_GET['type_id'];
$category_id = $_GET['category_id'];
//TODO: get user id form session
$userid = 2;

//Create customer select query


//Create the select query
$query = "SELECT * 
          FROM product_type
          WHERE product_type.type_id = $type_id and product_type.store_id = $store_id";

$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);
$numrows = $result->num_rows;

if ($numrows > 0) {
    if ($result = $mysqli->query($query)) {
        //Fetch object array
        while ($row = $result->fetch_assoc()) {
            $name = $row['type_name'];
            $loc = $row['location'];

        }
        //Free Result set
        $result->close();


    }
}

?>


<?php


if ($_POST) { //to check if form is submitted
//Assign get variable

    $name = mysqli_real_escape_string($mysqli, $_POST["type_name"]);
    $loc = mysqli_real_escape_string($mysqli, $_POST["type_loc"]);

    //Create customer update
    $query = "UPDATE product_type
              SET
              type_name = '$name',
              location = '$loc'
              WHERE type_id= $type_id";

    echo "<br>$query<br>";
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    $msg = "Store details updated";
    header("Location:index.php?msg=" . urlencode($msg) . "&category_id=" . $_GET['category_id'] . "&store_id=" . $_GET['store_id']);
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
                    <a class="nav-link active" href="add_type.php?category_id">Add Customer</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
    </header>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Edit Customers </h2>


                <form method="post"
                      action="edit_type.php?category_id=<?= $category_id ?>&store_id=<?= $store_id ?>&type_id=<?= $type_id ?>">

                    <?php if ($numrows > 0) {


                        ?>
                        <div class="form-group">
                            <label>Name of the Sub-category</label>
                            <input name="type_name" type="text" class="form-control" value="<?php echo $name ?>"
                                   placeholder="Enter Sub-category Name">
                        </div>
                        <div class="form-group">
                            <label>Location of the Sub-category in the store</label>
                            <input name="type_loc" type="text" class="form-control"
                                   placeholder="Format: A[aisle no]_S[shelf no]" value="<?php echo $loc ?>">
                        </div>


                        <input type="submit" class="btn btn-default" value="Update Sub-category"/>


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

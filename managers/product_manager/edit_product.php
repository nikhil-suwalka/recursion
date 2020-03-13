<?php include('includes/database.php'); ?>
<?php
//Assign get variable


//TODO: get user id form session
$userid = 2;
$type_id = $_GET['type_id'];
$store_id = $_GET['store_id'];
$product_id = $_GET['product_id'];
//Create customer select query


//Create the select query
$query = "SELECT * 
          FROM product
          WHERE product.product_id = $product_id";

$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);
$numrows = $result->num_rows;

if ($numrows > 0) {
    if ($result = $mysqli->query($query)) {
        //Fetch object array
        while ($row = $result->fetch_assoc()) {
            $name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_brand = $row['product_brand'];
            $product_stock = $row['product_stock'];
            $product_details = $row['details'];

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

    $name = mysqli_real_escape_string($mysqli, $_POST["product_name"]);
    $price = mysqli_real_escape_string($mysqli, $_POST["product_price"]);
    $brand = mysqli_real_escape_string($mysqli, $_POST["product_brand"]);
    $stock = mysqli_real_escape_string($mysqli, $_POST["product_stock"]);
    $details = mysqli_real_escape_string($mysqli, $_POST["product_details"]);


    //Create customer update
    $query = "UPDATE product
              SET
              product_name = '$name',
              product_price = $price,
              product_brand = '$brand',
              product_stock = '$stock',
              details = '$details'
              WHERE product_id=$product_id";

    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    $msg = "Product details updated";
    header("Location: index.php?msg=" . urlencode($msg) . "&type_id=" . $type_id . "&store_id=". $store_id); //?msg to show some message in index
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


                <form method="post" action="edit_product.php?store_id=<?=$_GET['store_id']?>&type_id=<?=$_GET['type_id']?>&product_id=<?=$_GET['product_id']?>">

                    <?php if ($numrows > 0) {


                        ?>
                        <div class="form-group">
                            <label>Name of the product</label>
                            <input name="product_name" type="text" class="form-control" value="<?php echo $name ?>"
                                   placeholder="Enter First Name">
                        </div>


                        <div class="form-group">
                            <label>Product price</label>
                            <input name="product_price" type="text" class="form-control"
                                   value="<?php echo $product_price ?>"
                                   placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label>Product brand</label>
                            <input name="product_brand" type="text" class="form-control" value="<?php echo $product_brand ?>"
                                   placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Product stock</label>
                            <input name="product_stock" type="number" class="form-control"
                                   value="<?php echo $product_stock ?>" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Product details</label>
                            <input name="product_details" type="text" class="form-control"
                                   value="<?php echo $product_details ?>" placeholder="Enter Password">
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

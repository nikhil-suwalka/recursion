<?php include('includes/database.php'); ?>
<?php

//TODO: get from cookies
$userid = 2;
$type_id = $_GET['type_id'];
$store_id = $_GET['store_id'];
if ($_POST) { //to check if form is submitted
    $name = mysqli_real_escape_string($mysqli, $_POST["product_name"]);
    $price = mysqli_real_escape_string($mysqli, $_POST["product_price"]);
    $brand = mysqli_real_escape_string($mysqli, $_POST["product_brand"]);
    $stock = mysqli_real_escape_string($mysqli, $_POST["product_stock"]);
    $details = mysqli_real_escape_string($mysqli, $_POST["product_details"]);

    $query = "INSERT INTO product (product_name, product_price, product_brand, product_stock, details, type_id, store_id)
              VALUES ('$name', $price, '$brand', $stock, '$details', $type_id, $store_id)";

    //Run query

    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $msg = "Product Added";
    header("Location: index.php?msg=" . urlencode($msg) . "&type_id=" . $type_id . "&store_id=". $store_id); //?msg to show some message in index
    exit;

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>PManager | Add Product</title>

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
                    <a class="nav-link active" href="add_product.php">Add Product</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Product Manager</h3>
    </header>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Add Product</h2>


                <form method="post" action="add_product.php?store_id=<?=$_GET['store_id']?>&type_id=<?=$_GET['type_id']?>">
                    <div class="form-group">
                        <label>Name of the product</label>
                        <input name="product_name" type="text" class="form-control" placeholder="Enter Product Name">
                    </div>

                    <div class="form-group">
                        <label>Product price</label>
                        <input name="product_price" type="text" class="form-control" placeholder="Enter Price">
                    </div>

                    <div class="form-group">
                        <label>Product brand</label>
                        <input name="product_brand" type="text" class="form-control" placeholder="Enter Product Brand">
                    </div>
                    <div class="form-group">
                        <label>Product stock</label>
                        <input name="product_stock" type="number" class="form-control" placeholder="Enter Product Stock">
                    </div>
                    <div class="form-group">
                        <label>Product details</label>
                        <input name="product_details" type="text" class="form-control" placeholder="Enter Product Details">
                    </div>

                    <input type="submit" class="btn btn-default" value="Add Product"/>
                </form>


            </div>

        </div>

    </main>

    <footer class="footer">
        <div class="container text-center">
            <p>Copyright ©&nbsp;Store 2020</p>
        </div>
    </footer>

</div> <!-- /container -->
</body>
</html>

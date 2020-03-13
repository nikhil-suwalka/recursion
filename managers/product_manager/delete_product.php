<?php include('includes/database.php'); ?>
<?php


//TODO: get user id form session
$userid = 2;
$type_id = $_GET['type_id'];
$store_id = $_GET['store_id'];
$product_id = $_GET['product_id'];

$query = "SELECT product_name FROM product WHERE product_id = $product_id";

$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $product_name = $row["product_name"];
    }
}

if (isset($_POST['Yes'])) {

    $query = "DELETE FROM product WHERE product_id = $product_id";
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $msg = "Product Removed";
    header("Location: index.php?msg=" . urlencode($msg) . "&type_id=" . $type_id . "&store_id=" . $store_id); //?msg to show some message in index
    exit;

}


if (isset($_POST['No'])) {

    $msg = "Product Not Removed";
    header("Location: index.php?msg=" . urlencode($msg) . "&type_id=" . $type_id . "&store_id=" . $store_id); //?msg to show some message in index
    exit;

}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Remove Customer</title>

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
                    <a class="nav-link " href="add_store.php">Add Store</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
    </header>


    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Remove Customer </h2>

                <form method="post"
                      action="delete_product.php?store_id=<?= $_GET['store_id'] ?>&type_id=<?= $_GET['type_id'] ?>&product_id=<?= $_GET['product_id'] ?>">


                    <br><br>

                    <h3> Do you want to remove <?php echo $product_name ?>  </h3>
                    <input type="submit" name="Yes" value="Yes" class="btn-success">
                    <input type="submit" name="No" value="No" class="btn-link">
                </form>

            </div>
        </div>

    </main>
</div>
</body>

</html>

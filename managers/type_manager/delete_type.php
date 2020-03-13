<?php include('includes/database.php'); ?>
<?php


$store_id = $_GET['store_id'];
$category_id = $_GET['category_id'];
$type_id = $_GET['type_id'];
//TODO: get user id form session
$userid = 2;

$query = "SELECT type_name FROM product_type WHERE type_id = $type_id";

$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $type_name = $row["type_name"];
    }
}

if (isset($_POST['Yes'])) {

    $query = "DELETE FROM product_type WHERE type_id = $type_id";
    echo $query;
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $msg = "Sub-category Removed";
    header("Location:index.php?msg=" . urlencode($msg) . "&category_id=". $_GET['category_id'] . "&store_id=". $_GET['store_id']);
    exit;

}


if (isset($_POST['No'])) {

    $msg = "Sub-category not Removed";
    header("Location:index.php?msg=" . urlencode($msg) . "");
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

                <form method="post" action="delete_type.php?type_id=<?php echo $type_id;?>&category_id=<?=$category_id?>&store_id=<?=$store_id?>">


                    <br><br>

                    <h3> Do you want to remove <?php echo $type_name ?>  </h3>
                    <form action="delete_type.php" method="post">
                        <input type="submit" name="Yes" value="Yes" class="btn-success">
                        <input type="submit" name="No" value="No" class="btn-link">
                    </form>

            </div>
        </div>

    </main>
</div>
</body>

</html>

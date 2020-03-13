
<?php include('includes/database.php'); ?>
<?php


$store_id = $_GET['id'];
//TODO: get user id form session
$userid = 2;


$query = "SELECT store_name, store_location FROM store WHERE store_id = '$store_id' and user_id = $userid";

$result = $mysqli->query($query) or die ($mysqli->error." ".__LINE__);
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $store_name = $row["store_name"];
        $store_location = $row["store_location"];
    }
}

if (isset($_POST['Yes'])){

    $query = "DELETE FROM store WHERE store_id = $store_id AND user_id = $userid";
    $mysqli ->query($query) or die($mysqli->error. " ".__LINE__);


    $msg = "Store Removed";
    header("Location:index.php?msg=".urlencode($msg)."");
    exit;

}


if (isset($_POST['No'])){

    $msg = "Store Not Removed";
    header("Location:index.php?msg=".urlencode($msg)."");
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

                <form method="post" action="delete_store.php?id=<?php echo $store_id; ?>">


        <br><br>

        <h3> Do you want to remove <?php echo $store_name . " located at " . $store_location ?>  </h3>
                    <form action="delete_store.php" method="post">
                    <input type="submit" name="Yes" value="Yes" class="btn-success" >
                    <input type="submit" name="No" value="No" class="btn-link" >
                    </form>

            </div>
        </div>

    </main>
</div>
</body>

</html>

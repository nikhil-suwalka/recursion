<?php include('includes/database.php'); ?>
<?php

$user_id = 13;//TODO:get user_id from session



$store_id = $_GET['store_id'];

$query = "SELECT user_name FROM users WHERE user_id = $user_id";
$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $user_name = $row["user_name"];
    }
}

if (isset($_POST['Yes'])) {

    $query = "DELETE FROM users WHERE user_id = $user_id ";
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);


    $query = "DELETE FROM employee_store WHERE user_id = $user_id ";
    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    $msg = "Employee Removed";
    header("Location:index.php?msg=" . urlencode($msg) . "&store_id=" . $store_id);
    exit;

}


if (isset($_POST['No'])) {

    $msg = "Employee Not Removed";
    header("Location:index.php?msg=" . urlencode($msg) . "&store_id=" . $store_id);
    exit;

}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>EManager | Remove Employee</title>

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
                    <a class="nav-link " href="add_employee.php">Add Employee</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Employee Manager</h3>
    </header>


    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Remove Employee </h2>

                <form method="post" action="delete_employee.php?store_id=<?php echo $store_id; ?>">


                    <br><br>

                    <h3> Do you want to remove <?php echo $user_name; ?>  </h3>
                    <form action="delete_employee.php" method="post">
                        <input type="submit" name="Yes" value="Yes" class="btn-success">
                        <input type="submit" name="No" value="No" class="btn-link">
                    </form>

            </div>
        </div>

    </main>
    <footer class="footer">
        <div class="container text-center">
            <p>Copyright ©&nbsp;Store 2020</p>
        </div>
    </footer>
</div>
</body>

</html>

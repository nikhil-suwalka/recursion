<?php include('includes/database.php'); ?>
<?php
//Assign get variable
$user_id = $_GET['id'];
$store_id=$_GET['store_id'];

//TODO: get user id form session


//Create customer select query


//Create the select query
$query = "SELECT * 
          FROM users
          WHERE users.user_id = $user_id ";
echo $user_id;
$result = $mysqli->query($query) or die ($mysqli->error . " " . __LINE__);
$numrows = $result->num_rows;

if ($numrows > 0) {
    if ($result = $mysqli->query($query)) {
        //Fetch object array
        while ($row = $result->fetch_assoc()) {
            $user_name = $row['user_name'];
            $user_mobile_number = $row['user_mobile_number'];
            $user_email = $row['user_email'];
            $user_address = $row['user_address'];
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

    $user_name = mysqli_real_escape_string($mysqli, $_POST["user_name"]);
    $user_mobile_number = mysqli_real_escape_string($mysqli, $_POST["user_mobile_number"]);
    $user_email = mysqli_real_escape_string($mysqli, $_POST["user_email"]);
    $user_address = mysqli_real_escape_string($mysqli, $_POST["user_address"]); // md5  -to encrypt the password


    //Create customer update
    $query = "UPDATE users
              SET
              user_name = '$user_name',
              user_mobile_number = '$user_mobile_number',
              user_email = '$user_email',
              user_address = '$user_address'
              WHERE user_id=$user_id";

    $mysqli->query($query) or die($mysqli->error . " " . __LINE__);

    $msg = "Store details updated";
    header("Location:index.php?msg=" . urlencode($msg) ."&store_id=". $store_id);
    exit;


}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>EManager | Update Employees</title>

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
                    <a class="nav-link active" href="add_customer.php">Add Employee</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Employee CManager</h3>
    </header>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <h2>Update Employees </h2>


                <form method="post" action="edit_employee.php?id=<?=$user_id?>&store_id=<?=$store_id?>">

                    <?php if ($numrows > 0) {


                        ?>
                        <div class="form-group">
                            <label>Name of Employee</label>
                            <input name="user_name" type="text" class="form-control" value="<?php echo $user_name ?>"
                                   placeholder="Enter First Name">
                        </div>


                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input name="user_mobile_number" type="number" class="form-control"
                                   value="<?php echo $user_mobile_number ?>"
                                   placeholder="Enter Mobile Number">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input name="user_email" type="email" class="form-control" value="<?php echo $user_email ?>"
                                   placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label> Address</label>
                            <input name="user_address" type="text" class="form-control"
                                   value="<?php echo $user_address ?>" placeholder="Enter Address">
                        </div>

                        <input type="submit" class="btn btn-default" value="Update Employee"/>


                        <?php
                    } else echo "<span style='color: red;'>Invalid Page</span>";

                    ?>
                </form>


            </div>

        </div>

    </main>

    <footer class="footer">
        <p><center>&copy; Store 2020</center></p>
    </footer>

</div> <!-- /container -->
</body>
</html>

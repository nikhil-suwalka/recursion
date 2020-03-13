<?php include('includes/database.php'); ?>
<?php

//TODO: get from session
$userid = 2;

//Create the select query
$query = "SELECT 
              store.store_id,
              store.store_name,
              store.store_location,
              store.store_contact_number,
              store.store_email
              FROM recursion.store
              WHERE store.user_id = $userid";

//Get result
$result = $mysqli->query($query) or die($mysqli->error . " " . __LINE__); //__LINE__ shows the line no. we are getting the error at

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>CManager | Dashboard</title>
    <style type="text/css">


        .msg {
            padding: 3px;
            background: #f4f4f4;
            color: green;
            font-size: 16px;
        }

    </style>
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
                    <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_store.php">Add Customer</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">Store CManager</h3>
    </header>

    <main role="main">


        <div class="row marketing">
            <div class="col-lg-12">
                <?php
                if (isset($_GET["msg"]))
                    echo "<div class = msg>" . $_GET["msg"] . "</div>";
                ?>
                <h2> Stores </h2>

                    <?php

                    //Check if at least 1 row is found
                    $finalResult = array();
                    if ($result->num_rows > 0) {

                        ?>

                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact no.</th>
                        <th></th>
                        <th></th>
                    </tr><?php

                        //Loop through results
                        //while ($row = $result->fetch_assoc()){
                        // OR
                        //while ($row = mysqli_fetch_assoc($result)){
                        // OR
                        while ($row = mysqli_fetch_array($result)) {
                            //Display customer info
                            $output = "<tr>";
                            $output .= "<td>" . $row["store_name"] . "</td>";
                            $output .= "<td>" . $row["store_email"] . "</td>";
                            $output .= "<td>" . $row["store_location"] .  "</td>";
                            $output .= "<td>" . $row["store_contact_number"] . "</td>";
                            $output .= "<td><a href='edit_store.php?id=" . $row['store_id'] . "' class='btn btn-primary btn-sm'>Edit </a></td>";
                            $output .= "<td><a href='delete_store.php?id=" . $row['store_id'] . "' class='btn btn-primary btn-sm'>Remove </a></td>";

                            $output .= "</tr>";


                            /*
                           echo '<tr>
                           <td>'.$row["first_name"].' '.$row["last_name"]. ' </td>
                           <td>'.$row["email"].'</td>
                           <td>'.$row["address"]. ' '. $row["city"]. ' '.$row["state"].'</td>
                           <td><a href=\"edit_customer.php?id="'.$row["id"].'class="btn btn - primary btn - sm\">Edit </a></td>
                           </tr>

                           ';

                            */


                            //Echo output
                            echo $output;

                        }

                    } else
                        echo "<span style='color:red;'>No stores found!!</span>";

                    ?>

                </table>
            </div>


        </div>

    </main>

    <footer class="footer">
        <p>&copy; Company 2017</p>
    </footer>

</div> <!-- /container -->
</body>
</html>

<html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <style>
            body{
                background-color: white;
            }
            #myInput {
                background-position: 10px 12px; /* Position the search icon */
                background-repeat: no-repeat; /* Do not repeat the icon image */
                width: 100%; /* Full-width */
                font-size: 16px; /* Increase font-size */
                padding: 12px 20px 12px 40px; /* Add some padding */
                border: 1px solid #ddd; /* Add a grey border */
                margin-bottom: 12px; /* Add some space below the input */
            }

            #product_list {
                /* Remove default list styling */
                list-style-type: none;
                padding: 0;
                margin: 0;
                overflow: auto;
                height: 500px;
            }

            #product_list li a {
                border: 1px solid #ddd; /* Add a border to all links */
                margin-top: -1px; /* Prevent double borders */
                background-color: #f6f6f6; /* Grey background color */
                padding: 12px; /* Add some padding */
                text-decoration: none; /* Remove default text underline */
                font-size: 18px; /* Increase the font-size */
                color: black; /* Add a black text color */
                display: block; /* Make it into a block element to fill the whole list */
            }

            #product_list li a:hover:not(.header) {
                background-color: #eee; /* Add a hover effect to all links, except for headers */
            }

            #table{
                margin-left: 120%;
            }
            #table tr{
                text-align: center;
            }
        </style>
        <script>
            function myFunction() {
                // Declare variables
                var input, filter, ul, li, a, i, txtValue;
                input = document.getElementById('myInput');
                filter = input.value.toUpperCase();
                ul = document.getElementById("product_list");
                li = ul.getElementsByTagName('li');

                // Loop through all list items, and hide those who don't match the search query
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("a")[0];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
        </script>

    </head>

    <body>
    <div style="max-width: 300px" class="">
        <table class="table" id="table">
            <tr>
                <td><input type="text" style="width: 300px" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                    <div id="product_list">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "recursion";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } else {
                            $sql = "SELECT * from product";
                            $result = $conn->query($sql);
                            if (!$result) {
                                die("error: " . mysqli_error($mysqli));
                            }
                            if($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    $funcCall = 'qrcode_generate($row["product_id"])';
                                    echo '<li><a onclick="qrcode_generate('.$row["product_id"].')">' . $row["product_name"] . '</a></li>';
                                }
                            }
                        }
                        $conn->close();
                        ?>
                    </div></td>
                <td><img id="qr" src="" alt=""></td>
            </tr>
        </table>


    </div>
    <script>
        function qrcode_generate(id){
            document.getElementById("qr").src = "https://api.qrserver.com/v1/create-qr-code?size=300x300&data=http://localhost/recursion/website-comp/php/qr_handler.php?prod_id="+id;
        }
    </script>
    </body>

</html>




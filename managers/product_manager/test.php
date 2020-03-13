<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    </head>
    <body>
    <form id="f" method="GET">
        <input id="cat_id" name="cat_id" type="text">
        <input id="store_id" name="store_id" type="text">
        <input id="test" type="submit">
    </form>



    </body>
    <script>
        $("#test").click(function(){
            var cat_id = document.getElementById("cat_id").value;
            var store_id = document.getElementById("store_id").value;
            $.ajax({
                url: 'getAllType_JSON.php',
                type: 'GET',
                data: {
                    cat_id: cat_id,
                    store_id: store_id
                },
                success:function(result){
                    alert(result);
                }
            });
        });
    </script>
</html>

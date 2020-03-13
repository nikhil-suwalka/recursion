<?php

$to_remove = $_POST['to_remove'];
$json_array = json_decode($_POST['json_array']);


for ($i=0; $i<sizeof($json_array); $i++){
    if($json_array[$i][0] == $to_remove) {
        unset($json_array[$i]);
        break;
    }
}

//TODO: set cookie
echo json_encode($json_array);
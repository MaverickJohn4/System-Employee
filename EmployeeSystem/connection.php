<?php

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "employee database";
$conn = "";

$conn = mysqli_connect(
    $db_server,
    $db_user,
    $db_password,
    $db_name
);
    if($conn) {
        echo "connected to database";
}   else {
        echo "failed to connect to database";
} 

?>
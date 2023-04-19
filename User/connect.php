<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'website tmđt';

// Mở kết nối
$conn = mysqli_connect($server, $username, $password, $database);
if($conn){mysqli_set_charset($conn, "utf8");}else{
    echo "can't connect database";
}

?>
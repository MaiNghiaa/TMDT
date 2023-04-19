<?php 
session_start();
@include 'connect.php';
if (isset($_SESSION["loged"])) {
    echo $_SESSION["username"];
} else {
}

?>
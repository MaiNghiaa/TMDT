<?php

ob_start();
session_start();
include_once 'connect.php';
if(isset($_POST['id'])){
    echo "helu";
}
?>
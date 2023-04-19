<?php 
require_once 'connect.php';
// lấy du lieu id can xoa

$getid = $_GET['sid'];


$xoa_sql = "DELETE FROM `payment_methods` WHERE `payment_methods`.`id` = $getid";
mysqli_query($conn, $xoa_sql);
// echo "xóa thành công"

header("location:thanh_toan.php");
?>
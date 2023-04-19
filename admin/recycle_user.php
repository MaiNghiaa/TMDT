<?php 

// lấy du lieu id can xoa

$getid = $_GET['sid'];
// echo $getid;
require_once 'connect.php';

$xoa_sql = "DELETE FROM khach_hang WHERE id_guest=$getid";
mysqli_query($conn, $xoa_sql);
// echo "xóa thành công"

header("location:Customer_user.php");
?>
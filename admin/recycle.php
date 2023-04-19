<?php 

// lấy du lieu id can xoa

$getid = $_GET['sid'];
// echo $getid;
require_once 'connect.php';

$xoa_sql = "DELETE FROM san_pham WHERE id_product=$getid";
mysqli_query($conn, $xoa_sql);
// echo "xóa thành công"

header("location:products.php");
?>
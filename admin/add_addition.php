<!-- Sản phẩm ở phần addition trong homepage -->

<?php
require_once 'connect.php';
// lấy du lieu id can them

$getid = $_GET['sid'];

// kết nối CSDL

// lấy thông tin về
$update_addition = "INSERT INTO san_pham_moi SELECT * FROM san_pham WHERE id_product=$getid";
mysqli_query($conn, $update_addition);
    echo "<script> 
        alert('Successfully Added');
        document.location.href = 'New_product.php';
    </script>"

?>

<?php

@include 'connect.php';

$sql = "SELECT * FROM `danh mục` WHERE 1";
$danhmuc = mysqli_query($conn, $sql);
if (isset($_POST['submit'])) {
    if (isset($_POST['product_type'])) {
        $Product = $_POST['Product'];
        $product_type = $_POST['product_type'];
        $Description = $_POST['description'];
        $Price = $_POST['price'];
        $id = $_POST['sid'];

        // $photo = $_POST['photo'];
        $Status = $_POST['Status'];
        if ($_FILES["image"]["error"] === 4) {
            echo
            "<script> alert('Image doesn't exist')</script>";
        } else {
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtention = ['jpg', 'jpeg', 'png'];
            $imageExtention = explode('.', $fileName);
            $imageExtention = strtolower(end($imageExtention));
            if (!in_array($imageExtention, $validImageExtention)) {
                echo "<script> alert('Invalid image extention')</script>";
            } else if ($fileSize > 1000000) {
                echo "<script> alert('Image size is tu big')</script>";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtention;

                move_uploaded_file($tmpName, 'upload/' . $newImageName);
                $updatequery = "UPDATE `san_pham` SET Product='$Product', description='$Description', price='$Price', Image='$newImageName', id_product_type='$product_type' WHERE id_product=$id";
                // echo $updatequery;
                mysqli_query($conn, $updatequery);
                echo "<script> 
                alert('Successfully Edited');
                document.location.href = 'products.php';
                </script>";
                
            }
        }
    }
}
?>
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
                $query = "INSERT INTO `san_pham` (`id_product`, `Product`, `description`, `price`, `Image`, `Status`, `id_product_type`) VALUES (NULL, '$Product', '$Description', '$Price', '$Status', '$newImageName', '$product_type')";
                mysqli_query($conn, $query);
                echo "<script> 
                alert('Successfully Added');
                document.location.href = 'products.php';
                </script>";
                
            }
        }
    }
}
?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
    <title></title>
</head>

<body>
    <style>
        .form-group {
            margin: 2rem 0;
        }
    </style>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <?php require_once 'sidebar.php' ?>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <?php require_once 'header.php'; ?>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Product">Tên sản phẩm</label>
                        <input type="text" name="Product" class="form-control" id="Product" placeholder="Nhập sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Giá">
                    </div>
                    <div class="form-group">
                        <label for="photo">Images</label>
                        <input type="file" name="image" class="form-control-file" id="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Status" id="Still" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            còn hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Status" id="desist" value="2">
                        <label class="form-check-label" for="desist">
                            Hết hàng
                        </label>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Danh mục</label>
                        <select id="inputState" name="product_type" class="form-control">
                            <option selected>-- lựa chọn danh mục -- </option>
                            <?php foreach ($danhmuc as $type) { ?>
                                <option value="<?php echo $type['id_product_type'] ?>"><?php echo $type['product_type'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>



        <!--end switcher-->
        <!-- Bootstrap JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <!--app JS-->
        <script src="assets/js/app.js"></script>
</body>

</html>
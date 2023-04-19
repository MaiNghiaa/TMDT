<?php

@include 'connect.php';
if (isset($_POST['submit'])) {
        $Payment_methods = $_POST['Payment_methods'];
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

                move_uploaded_file($tmpName, 'upload/Img(Payment)/' . $newImageName);
                $query = "INSERT INTO `payment_methods` (`id`, `Payment_methods`, `Image`) VALUES (NULL, '$Payment_methods', '$newImageName')";
                mysqli_query($conn, $query);
                echo "<script> 
                alert('Successfully Added');
                document.location.href = 'thanh_toan.php';
                </script>";
                
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
                        <label for="Payment_methods">Payment_methods</label>
                        <input type="text" name="Payment_methods" class="form-control" id="Payment_methods">
                    </div>
                    <div class="form-group">
                        <label for="photo">Images</label>
                        <input type="file" name="image" class="form-control-file" id="image">
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
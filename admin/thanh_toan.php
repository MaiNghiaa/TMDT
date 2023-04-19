<?php
session_start();
require_once 'connect.php';
$thanh_toan = mysqli_query($conn, "SELECT * FROM payment_methods");

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
    <!--favicon-->
    <link rel="shortcut icon" href="./assets/images/Logo.png" type="image/x-icon">
    <title>Hack = không lỗ đít</title>
</head>

<body>
    <style>
        .product-img-2 {
            width: 80px;
            height: 80px;
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
                <!-- add new product -->
                <div class="card" style="padding-top: 2rem">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-5 radius-30" placeholder="Search"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                            </div>
                            <div class="ms-auto"><a href="them_Payment.php" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>New Payment</a></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>id</th>
                                        <th>Payment_method</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;

                                    ?>
                                    <?php foreach ($thanh_toan as $row) : ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-0 font-14"><?php echo $i++; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $row["Payment_methods"] ?></td>
                                            <td><img src="upload/Img(Payment)/<?php echo $row['Image'] ?>" class="product-img-2" alt="product img" width="300px" style="width:80px, height:80px"></td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="xoa_payment.php?sid=<?php echo $row['id'] ?>" class="ms-3" onclick="return confirm('Bạn có muốn xóa Phương thức này ?')"><i class='bx bxs-trash'></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>
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
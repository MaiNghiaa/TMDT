<?php
$getid = $_GET['sid'];
require_once 'connect.php';
$query = mysqli_query($conn, "SELECT * FROM admin");
if (isset($_POST['submit'])) {
    $Full_name = $_POST['Full_name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $query = "UPDATE `admin` (`id`, `Full_name`, `Email`, `Phone`, `Address`) VALUES (NULL, '$Full_name', '$Email', '$Phone', '$Address') WHERE id_product=$getid";
    mysqli_query($conn, $query);
    echo "<script> 
                alert('Successfully Added');
                document.location.href = 'profile.php';
                </script>";
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
    <!--favicon-->
    <link rel="shortcut icon" href="./assets/images/Logo.png" type="image/x-icon">
    <title>Hack = không lỗ đít</title>
</head>

<body>
    <div class="col-lg-8">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="sid" value="<?php echo $getid; ?>">
            <?php foreach ($query as $row) : ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="Full_name" class="form-control" value="<?php echo $row["Full_name"]; ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="Email" class="form-control" value="<?php echo $row["Email"]; ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="Phone" class="form-control" value="<?php echo $row["Phone"]; ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="Address" class="form-control" value="<?php echo $row["Address"]; ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    <?php endforeach; ?>
        </form>
    </div>
</body>
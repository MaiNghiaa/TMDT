<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title></title>
</head>
<?php 
@include 'connect.php';

session_start();
if (isset($_POST['submit'])) {
	$password = ($_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM admin WHERE password= '$password'");
  
	// $stmt = mysqli_prepare($conn, $select);
	// mysqli_stmt_bind_param($stmt, $username, $password);
	// mysqli_stmt_execute($stmt);
	// $result = mysqli_stmt_get_result($stmt);
	$count = mysqli_num_rows($result);
	if ($count == 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			$_SESSION["full_name"] = $row["full_name"];
			$_SESSION["username"] = $row["username"];
			$_SESSION["password"] = $row["password"];
			$_SESSION["phone"] = $row["phone"];
			$_SESSION["email"] = $row["email"];
			break;
		}
	  $_SESSION["loged"] = true;
	  header('location:index.php');
	  setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
	} else {
	  // Đăng nhập thất bại
	  header('location:login.php');
	  setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
	}
  }

//   hàm lấy ngày hiện tại
$date = getdate();
?>

<body class="bg-lock-screen">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
				<div class="card-body p-md-5 text-center">
					<h5 class="text-white"><?php echo($date['weekday'].", ".$date['mday'].", ".$date['mon'].", ".$date['year']) ?></h5>
					<div class="">
						<img src="assets/images/icons/user.png" class="mt-5" width="120" alt="" />
					</div>
					<p class="mt-2 text-white"><?php
                if (isset($_SESSION["loged"])) {
                    echo $_SESSION["username"];
                }
                ?></p>
					<div class="mb-3 mt-3">
						<input type="password" name="password" class="form-control" placeholder="Password" />
					</div>
					<div class="d-grid">
						<button type="button" name="submit" class="btn btn-white"><a href="index.php"></a> Login</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>
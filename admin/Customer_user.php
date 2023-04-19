<?php
session_start();

@include('location:connect.php');

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
				<div class="card-body">
					<div class="row align-items-center">
					</div>
				</div>

				<div class="card" style="padding-top: 2rem">
					<div class="table-responsive">
						<table class="table mb-0">
							<thead class="table-light">
								<tr>
									<th>id</th>
                                    <th>id_guest</th>
									<th>Full_name</th>
									<th>Username</th>
									<th>Phone</th>
									<th>Bill order</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$rows = mysqli_query($conn, "SELECT * FROM khach_hang ORDER BY id_guest DESC");
								?>
								<?php foreach ($rows as $row) : ?>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="ms-2">
													<h6 class="mb-0 font-14"><?php echo $i++; ?></h6>
												</div>
											</div>
										</td>
                                        <td>
											<div class="d-flex align-items-center">
												<div class="ms-2">
													<h6 class="mb-0 font-14"><?php echo $row['id_guest']; ?></h6>
												</div>
											</div>
										</td>
										<td><?php echo $row["full_name"] ?></td>
										<td><?php echo $row['username'] ?></td>
										<td><?php echo $row['phone'] ?></td>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row["birthday"] ?></td>
                                        <td><?php echo $row["Address"] ?></td>
										<td>
											<div class="d-flex order-actions">
												<a href="recycle_user.php?sid=<?php echo $row["id_guest"] ?>" class="ms-3" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')"><i class='bx bxs-trash'></i></a>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--end row-->


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
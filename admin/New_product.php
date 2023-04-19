<?php
session_start();
require 'connect.php';
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
					<div class="table-responsive">
						<table class="table mb-0">
							<thead class="table-light">
								<tr>
									<th>id</th>
									<th>Product</th>
									<th>Image</th>
									<th>Product_type</th>
									<th>price</th>
									<th>description</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$rows = mysqli_query($conn, "SELECT * FROM san_pham_moi ORDER BY id_product DESC");
								?>
								<?php foreach ($rows as $row) : ?>
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
										<td><?php echo $row["Product"] ?></td>
										<td><img src="upload/<?php echo $row['Image'] ?>" class="product-img-2" alt="product img" width="100px"></td>
										<td><?php echo $row['id_product_type'] ?></td>
										<td><?php echo $row["price"] ?></td>
										<td><?php echo $row["description"] ?></td>
										<td>
											<div class="d-flex order-actions">
												<a href="edit.php?sid=<?php echo $row["id_product"] ?>" class=""><i class='bx bxs-edit'></i></a>
												<a href="recycle.php?sid=<?php echo $row["id_product"] ?>" class="ms-3" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')"><i class='bx bxs-trash'></i></a>
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
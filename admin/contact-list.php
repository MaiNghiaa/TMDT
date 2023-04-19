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
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Applications</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Contact List</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Light Contact List</h6>
				<hr />
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
					<div class="col-2 card">
						<div class="card radius-15">
							<div class="card-body text-center">
								<div class="p-4 border radius-15">
									<img src="assets/images/avatars/nghia.jpg" width="110" height="110" class="rounded-circle shadow" alt="">
									<h5 class="mb-0 mt-5">Trung Nghĩa</h5>
									<p class="mb-3">Back-end</p>
									<div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;" class="list-inline-item bg-facebook text-white border-0"><i class="bx bxl-facebook"></i></a>
										<a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i class="bx bxl-twitter"></i></a>
										<a href="javascript:;" class="list-inline-item bg-google text-white border-0"><i class="bx bxl-google"></i></a>
										<a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i class="bx bxl-linkedin"></i></a>
									</div>
									<div class="d-grid"> <a href="#" class="btn btn-outline-primary radius-15">Contact Me</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-2 card">
						<div class="card radius-15">
							<div class="card-body text-center">
								<div class="p-4 border radius-15">
									<img src="assets/images/avatars/ducngu.jpg" width="110" height="110" class="rounded-circle shadow" alt="">
									<h5 class="mb-0 mt-5">Anh Đức</h5>
									<p class="mb-3">Front end</p>
									<div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;" class="list-inline-item bg-facebook text-white border-0"><i class="bx bxl-facebook"></i></a>
										<a href="javascript:;" class="list-inline-item bg-twitter text-white border-0"><i class="bx bxl-twitter"></i></a>
										<a href="javascript:;" class="list-inline-item bg-google text-white border-0"><i class="bx bxl-google"></i></a>
										<a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0"><i class="bx bxl-linkedin"></i></a>
									</div>
									<div class="d-grid"> <a href="#" class="btn btn-outline-primary radius-15">Contact Me</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->

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
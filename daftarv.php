<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM list_voucher ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LevelUp - Contact</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
	<link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>
	<!--================ Start Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<a class="navbar-brand logo_h" href="index.php">LevelUp</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php
					session_start();
					if (isset($_SESSION['email'])) { ?>
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto mr-auto">
								<li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
								<li class="nav-item active"><a class="nav-link" href="daftarv.php">Produk</a></li>
							</ul>
							<ul class="nav-shop">
								<li class="nav-item"><a class="button button-header" href="logout.php">Logout</a></li>
							</ul>
						<?php
					} else {
						?>
							<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
								<ul class="nav navbar-nav menu_nav ml-auto mr-auto">
									<li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
									<li class="nav-item active"><a class="nav-link" href="daftarv.php">Produk</a></li>
								</ul>
								<ul class="nav-shop">
									<li class="nav-item"><a class="button button-header" href="login.php">Login</a></li>
									<li class="nav-item"><a class="button button-header" href="register.php">Register</a></li>
								</ul>

							<?php
						}
							?>
							</div>
						</div>
						<!-- Header-btn -->

				</div>
		</div>
		</nav>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->
	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="contact">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Daftar Voucher</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Daftar Voucher</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ end banner area ================= -->
	<!-- Start Filter Bar -->
	<div class="filter-bar d-flex flex-wrap align-items-center">
		<!-- Start Filter Bar -->
		<div class="sorting">
			<div class="input-group filter-bar-search ">
				<form method="get" action="">
					<input type="text" name="cari" placeholder="Cari Game!">
				</form>
			</div>
		</div>
	</div>
	</div>
	<!-- End Filter Bar -->
	<div class="container">
		<div class="row">
			<?php
			if (isset($_GET['cari'])) {
				$result = mysqli_query($mysqli, "SELECT * FROM list_voucher where namagame LIKE '%" .
					$_GET['cari'] . "%'");
			}
			while ($voucher = mysqli_fetch_array($result)) {
				echo '<div class="col-md-6 col-lg-4 col-xl-3">';
				echo '<div class="card text-center card-product">';
				echo '<div class="card-product__img">';
				echo '<img class="card-img" src="' . $voucher['foto'] . '" alt="">';
				echo '<ul class="card-product__imgOverlay">';
				echo '<span>' . $voucher['deskripsi'] . '</span>';
				echo '</ul>';
				echo '</div>';
				echo '<div class="card-body">';
				echo '<p>' . $voucher['namagame'] . '</p>';
				echo '<h4 class="card-product__title"><a href="single-product.php?id=' . $voucher['id'] . '">' . $voucher['namavoucher'] . '</a></h4>';
				echo '<p class="card-product__price">Rp.' . $voucher['hargavoucher'] . '</p>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			?>
			<!-- batas -->
		</div>
	</div>
	<script src="vendors/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="vendors/skrollr.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/nice-select/jquery.nice-select.min.js"></script>
	<script src="vendors/jquery.form.js"></script>
	<script src="vendors/jquery.validate.min.js"></script>
	<script src="vendors/contact.js"></script>
	<script src="vendors/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/mail-script.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
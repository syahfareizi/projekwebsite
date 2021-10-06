<?php
include_once("config.php");
$grafik = mysqli_query($mysqli, "SELECT tanggal , COUNT(id) as total FROM `transaksi` GROUP BY tanggal ORDER BY tanggal");
$grafik_full = array();
while ($row = mysqli_fetch_array($grafik)) {
	$grafik_full[] = array("x" => strtotime($row['tanggal']) * 1000, "y" => $row['total']);
}

// print_r($grafik_full);

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
								<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
							</ul>
							<ul class="nav-shop">
								<li class="nav-item"><a class="button button-header" href="logout.php">Logout</a></li>
							</ul>
						<?php
					} else {
						?>
							<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
								<ul class="nav navbar-nav menu_nav ml-auto mr-auto">
									<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
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
					<h1>Admin</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Admin</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ end banner area ================= -->
	<!-- Membuat area untuk menampilkan grafik -->
	<div class="section-header text-center section-margin calc-10px"> </div>
	<div id="garis" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<!-- Script untuk membuat grafik garis -->
	<script type="text/javascript">
		Highcharts.chart('garis', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'spline'
			},
			credits: {
				enabled: false
			},
			title: {
				text: 'Grafik Total Pembelian'
			},

			subtitle: {
				text: 'LevelUp'
			},

			yAxis: {
				title: {
					text: 'Total Pembelian (Voucher)'
				}
			},

			xAxis: {
				type: 'datetime',
				dateTimeLabelFormats: { // don't display the dummy year
					month: '%e. %b',
					year: '%b'
				},
				title: {
					text: 'Tanggal'
				}
			},

			plotOptions: {
				spline: {
					dataLabels: {
						enabled: true,
						style: {
							fontSize: '10px',
							fontWeight: 'normal'
						},
						format: '{point.y:.0f}'
					},
					marker: {
						enabled: false
					},
					enableMouseTracking: true
				}
			},

			series: [{
				name: 'Total Pembelian (Voucher)',
				color: '#5b9bd5',
				data: <?php echo "[";
						foreach ($grafik_full as $key => $value) {
							echo "[";
							$i = 0;
							foreach ($value as $key => $value2) {
								if ($i == count($value) - 1) {
									echo $value2;
								} else {
									echo $value2 . ",";
								}
								$i = $i + 1;
							}

							echo "],";
						}
						echo "]"; ?>
			}],

		});
	</script>
	<!-- ================ contact section start ================= -->
	<div class="project_section_2 layout_padding">
	<div class="section-header text-center section-margin calc-10px">
		<div class="container">
			<div class="row ">
				<div class="col-lg-12 col-sm-6">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-sm-6">
							<div class="box_main active">
								<h2 class="accounting_text">Tabel Pemesanan</h2>
								<table border="2" class="ml-4">
									<tr>
										<th>ID</th>
										<th>Voucher ID</th>
										<th>Nama</th>
										<th>Nomer HP</th>
										<th>Nickname</th>
										<th>ID Nickname</th>
										<th>Tanggal</th>
										<th>Status</th>
										<th>Aksi</th>

									</tr>
									<?php
									include 'config.php';
									$data = mysqli_query($mysqli, "select * from transaksi");
									while ($d = mysqli_fetch_array($data)) {
									?>
										<tr>
											<td><?php echo $d['id']; ?></td>
											<td><?php echo $d['jenisvoucher']; ?></td>
											<td><?php echo $d['nama']; ?></td>
											<td><?php echo $d['nomerhp']; ?></td>
											<td><?php echo $d['nickname']; ?></td>
											<td><?php echo $d['idnickname']; ?></td>
											<td><?php echo $d['tanggal']; ?></td>
											<td><?php echo $d['status']; ?></td>

											<td>
												<a href="update.php?id=<?php echo $d['id']; ?>">Konfirmasi</a>
												<a href="hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
											</td>
										</tr>
									<?php
									}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ================ contact section end ================= -->







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
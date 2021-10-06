<?php
// Display selected user data based on id
// Getting id from url
include_once("config.php");

$id = $_GET['id'];

// Fetech donasi data based on id
$list_voucher = mysqli_query($mysqli, "SELECT * FROM list_voucher WHERE id=$id");

while ($voucher = mysqli_fetch_array($list_voucher)) {
    $voucher_id = $voucher['id'];
}
// Check If form submitted, insert form data into users table.
// Variabel

$title = $description = $target_funding = $target_end =  "";
$titleErr = $descriptionErr = $target_fundingErr = $target_endErr = $imageErr = "";
						// Validasi Input -->
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) {
        $titleErr = "Nama tidak boleh kosong";
    } else {
        $title = test_input($_POST["nama"]);
    }

    if (empty($_POST["nomerhp"])) {
        $descriptionErr = "Nomer tidak boleh kosong";
    } else {
        $description = test_input($_POST["nomerhp"]);
    }

    if (empty($_POST["nickname"])) {
        $target_fundingErr = "Nickname In-Game tidak boleh kosong";
    } else {
        $target_funding = test_input($_POST["nickname"]);
    }

    if (empty($_POST["idnickname"])) {
        $target_endErr = "Nomer ID in-Game Berakhir tidak boleh kosong";
    } else {
        $target_end = test_input($_POST["idnickname"]);
    }
    }

    if (!empty($_POST["nama"]) & !empty($_POST["nomerhp"]) & !empty($_POST["nickname"]) & !empty($_POST["idnickname"])) {
        // Create database connection using config file
        include_once("config.php");
        // Insert galang dana data into table
        $result = mysqli_query($mysqli, "INSERT INTO transaksi (nama,jenisvoucher,nomerhp,nickname,idnickname) VALUES ('$title','$id','$description','$target_funding','$target_end')");
        header("Location: report.php");
    } else { }


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LevelUp - Product Details</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
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
              <li class="nav-item"><a class="nav-link" href="daftarv.php">Produk</a></li>
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
              <li class="nav-item"><a class="nav-link" href="daftarv.php">Produk</a></li>

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
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Details</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


  <!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
			
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
					<?php
                        include_once("config.php");

                        $id = $_GET['id'];

                        // Fetech donasi data based on id
                        $result = mysqli_query($mysqli, "SELECT * FROM list_voucher WHERE id=$id");

                        while ($voucher_id = mysqli_fetch_array($result)) {
						
							echo'<div class="single-prd-item">';
							echo'<img class="img-fluid" src="'.$voucher_id['foto'].'" alt="">';
							echo'</div>';	
                        }
                        ?>

					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
					<?php
                        include_once("config.php");

                        $id = $_GET['id'];

                        // Fetech donasi data based on id
                        $result = mysqli_query($mysqli, "SELECT * FROM list_voucher WHERE id=$id");

                        while ($voucher_id = mysqli_fetch_array($result)) {
						echo '<p>'.$voucher_id['namagame'].'</p>';
						echo '<h3>'.$voucher_id['namavoucher'].'</h3>';
						echo '<h2>Rp.'.$voucher_id['hargavoucher'].'</h2>';
						echo '<p>'.$voucher_id['deskripsi'].'</p> ';
                        }
						?>

				<form class="row contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $_GET['id'] ?>" method="post" name="form1">
                <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nama Lengkap'" id="nama" name="nama">
                    <!-- <span class="placeholder" data-placeholder="Username or Email"></span> -->
                </div>
                <span> <?php echo $titleErr; ?></span>
				<div class="col-md-12 form-group p_star">
                    <input type="number" class="form-control" placeholder="Nomer HP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nomer HP'" id="nomerhp" name="nomerhp">
                    <!-- <span class="placeholder" data-placeholder="Password"></span> -->
				</div>
				<span> <?php echo $descriptionErr; ?></span>
				<div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control" placeholder="Nickname in-Game" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nickname in-Game'" id="nickname" name="nickname">
                    <!-- <span class="placeholder" data-placeholder="Username or Email"></span> -->
                </div>
				<span> <?php echo $target_fundingErr; ?></span>
				<div class="col-md-12 form-group p_star">
                    <input type="number" class="form-control" placeholder="Nomer ID in-Game" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nomer ID in-Game'" id="idnickname" name="idnickname">
                    <!-- <span class="placeholder" data-placeholder="Password"></span> -->
                </div>
				<span> <?php echo $target_endErr; ?></span>
				<div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="button button-login">Beli</button>
                </div>
            </form>
							<!-- batas -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
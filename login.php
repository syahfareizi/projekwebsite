<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = md5($_POST["password"]);

    include_once 'config.php';

    // Query search user
    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE (email='$email') AND (password='$password')");
 
    // Cek data 
    $rowCheck = mysqli_num_rows($result);

    if ($rowCheck > 0) {
        while ($row = mysqli_fetch_array($result)) {

            // Start session
            session_start();
            $_SESSION['email'] = $row['email'];

            // Redirect 
            header('Location: index.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php">LevelUp</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="daftarv.php">Produk</a></li>
            </ul>
            <ul class ="nav-shop">
              <li class="nav-item"><a class="button button-header" href="login.php">Login</a></li>
              <li class="nav-item"><a class="button button-header" href="register.php">Register</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->  
<body>
    <div class="container mt-100">
        <div class="row justify-content-center">
            <div class="col-6">
            <div class="section-header text-center section-margin calc-10px">
                    <h2>Login Page</h2>
                </div>
<?php
?>
                <form method="POST" action="login.php">
                    <div class="form-group" data-animation="fadeInLeft" data-delay=".8s">
                        <div class="input-group mb-3">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Isi email.." required="required">
                        </div>
                    </div>

                    <div class="form-group" data-animation="fadeInLeft" data-delay=".8s">
                        <div class="input-group mb-3">
                            <input class="form-control" name="password" id="password" type="password" placeholder="Isi password.." required="required">
                        </div>
                    </div>
                    <div class="border-top-0 d-flex justify-content-center" data-animation="fadeInLeft" data-delay=".8s">
                        <button class="w-100 btn hero-btn mb-10" type="submit" name="Submit" value="Add">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>
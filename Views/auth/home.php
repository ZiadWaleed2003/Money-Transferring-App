<?php
    if(isset($_SESSION['user'])){
        header("Location: '../views/user/index.php'");
    }

    if(isset($_SESSION['admin'])){
        header("Location: '../views/admin/index.php'");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>ElZowZat & Bassel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link
      href="../assets/lib/owlcarousel/assets/owl.carousel.min.css"
      rel="stylesheet"
    />
    <link
      href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
      rel="stylesheet"
    />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/Iconstylefav.css" rel="stylesheet" />
  </head>

  <body>
    <style>
      .merriweather-bold {
        font-family: "Merriweather", serif;
        font-weight: 700;
        font-style: normal;
      }

      .merriweather-black {
        font-family: "Merriweather", serif;
        font-weight: 900;
        font-style: normal;
      }
    </style>
    <div
      class="container-fluid position-relative d-flex p-0"
      style="
        width: 100vw;
        height: 100vh;
        background-repeat: no-repeat;
        background-image: url(../assets/img/home.png);
        background-size: cover;
        background-position: center;
      "
    >
      <div class="d-flex flex-column justify-content-center ps-5">
        <div class="d-flex flex-column justify-content-center align-items-baseline col-8 ps-5">
          <div class="row">
            <p class="display-4 text-white merriweather-black">ELZowzat & Bassel</p>
            <p class="h6 text-white merriweather-bold text-capitalize text-center">welcome to the world of Money</p>
          </div>
          <div class="d-flex align-items-center justify-content-center align pt-5 m-auto" style="filter: drop-shadow(0px 8px 8px rgba(0, 0, 0, 0.3));">
            <a href="signin.php">

              <button type="button" class="btn btn-lg btn-primary m-2 ps-5 pe-5">&nbsp;Log-in&nbsp;</button>
            </a>
            <a href="signup.php">

              <button type="button" class="btn btn-lg btn-light m-2 ps-5 pe-5 text-white">&nbsp;Sign-up&nbsp;</button>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/chart/chart.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->

    <script src="../assets/js/main.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    if(isset($_SESSION['status']) && $_SESSION['status'] == 'login'){
        
    }
    else{
        header("Location:../login/login.php?pesan=belumlogin");
    }

?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Buat Proyek</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="https://a.kickstarter.com/favicon.ico">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  <style>
    .btn-theme {
        border: none;
        background-color: #5369f8;
        color: #fff;
        box-shadow: 0 0 5px #5369f8;
        width: 7vw;
        padding: 0.6rem;
        border-radius: 0.4rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .btn-theme:hover {
        box-shadow: 0 0 10px #5369f8, 0 0 20px #5369f8, 0 0 20px;
    }

    .bg-theme{
        border: none;
        background-color: #5369f8;
        color: gold;
        box-shadow: 0 0 5px #5369f8;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .bg-theme:hover{
        box-shadow: 0 0 10px #5369f8, 0 0 20px #5369f8, 0 0 20px;
    }

  </style>


  <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Kick Starter<span>.</span></h1>
      </a>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="about.html">Arts</a></li> 
          <li><a href="about.html">Comics & Illustration</a></li>
          <li><a href="services.html">Design & Tech</a></li>
          <li><a href="projects.html">Film</a></li>
          <li><a href="blog.html">Food & Craft</a></li>
          <li><a href="contact.html">Games</a></li>
        </ul> 
      </nav>
      <!-- .navbar -->
      <?php
        if(isset($_SESSION["status"]) && $_SESSION["status"] == "login") {
        ?>
          <nav id="navbar" class="navbar">
              <ul>
                <li><a href="../login/logout.php"><?=$_SESSION['username']?></a></a></li> 
              </ul> 
          </nav>
        <?php
        }
        
        else
        {
      ?>

          <nav id="navbar" class="navbar">
              <ul>
                <li><a href="login/login.php">Login</a></li> 
              </ul> 
          </nav>

      <?php
        }
      ?>


    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('https://ksr-ugc.imgix.net/assets/042/813/393/76039c99f91bd8a8ee73ad2866fa2748_original.gif?ixlib=rb-4.1.0&w=680&fit=max&v=1698166732&gif-q=50&q=92&s=80c6eabc8fb7a82ac4d5aabc0d93d8af');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2 class="text-center" >Edit Profile</h2>

      </div>
    </div><!-- End Breadcrumbs -->

    <?php
    include '../koneksi/cn.php';
    $user = $_SESSION['username'];
    $query = mysqli_query($cn, "SELECT * FROM user WHERE user = '$user'");
        $dataprof = mysqli_fetch_array($query);
        $user = $dataprof['user'];
        $pass = $dataprof['pass'];
        $ppic = $dataprof['ppic'];
        ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #d8d8d8;">
      <div class="container" data-aos="fade-up" data-aos-delay="100">


        <div class="row mt-5">
          <div class="col-lg-12">

            <form action="../profile/prosesprofil.php" method="post" class="bg-light rounded-4 shadow p-5">
              <div class="row gy-2 ">

                <h1>Kick Starter<span style="color: #5369f8;">.</span></h1>
                <hr>

                <?php
                  if(isset($_GET['pesan']) && $_GET['pesan'] == 'sudahterdaftar'){
                    ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Username Sudah Terdaftar!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php
                  }
                ?>

                <div class="col-lg form-group col-lg mb-3">
                  <label for="name" class="ms-1">Username</label>
                  <input required type="text" name="user" class="form-control" value="<?=$dataprof['user'];?>">
                </div>
            </div>

            <div class="row gy-2 ">
                <div class="col-lg form-group col-lg mb-3">
                  <label for="name" class="ms-1">Password</label>
                  <input required type="text" name="pass" class="form-control" value="<?=$dataprof['pass'];?>">
                </div>
            </div>

            <div class="row gy-2 ">
                <div class="col-lg form-group col-lg mb-3">
                  <label for="name" class="ms-1">Link Profile Picture</label>
                  <input required type="text" name="ppic" class="form-control" value="<?=$dataprof['ppic'];?>">
                </div>
            </div>

            <div class="text-center"><button class="btn-theme">Submit</button></div>

              </div>

              
            </form>

          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="background-image:url(https://ksr-ugc.imgix.net/assets/042/800/468/1aa992d02800a495ca008b1131e47e3b_original.gif?ixlib=rb-4.1.0&w=680&fit=max&v=1698090350&gif-q=50&q=92&s=d020565ad984f197528a0598d8f85dd7);">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-10 col-md-6">
            <div class="footer-info">
              <h3>Kick Starter</h3>
              <p>
                Web Developer :<br><br>
                <strong>Leon</strong> 123220015<br>
                <strong>Abrar</strong> 123220191<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
              <li><a href="#">Ipsam</a></li>
              <li><a href="#">Laudantium dolorum</a></li>
              <li><a href="#">Dinera</a></li>
              <li><a href="#">Trodelas</a></li>
              <li><a href="#">Flexo</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Kick Starter</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
      </div>
    </div>

  </footer>
  <!-- End Footer -->


  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>

    function tampilkanForm(){
        const checkBox = document.getElementById('checkbox-reward');
        const reward = document.getElementById('reward-form');
        
        if (checkBox.checked == true){
            reward.style.display = "block";
        } else {
            reward.style.display = "none";
        }
    }

  </script>

</body>

</html>
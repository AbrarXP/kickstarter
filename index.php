<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kick Starter</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://a.kickstarter.com/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/custom.css">

  <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php
    session_start();

    if(isset($_SESSION['username'])){
      include 'koneksi/cn.php';
      $user = $_SESSION['username'];
      $profile = mysqli_query($cn, "SELECT ppic FROM user WHERE user = '$user'");
      $linkpp = mysqli_fetch_array($profile);
    }
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center">
          <h1>Kick Starter<span>.</span></h1>
        </a>


        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="#testimonials">Donatur</a></li>
            <li><a href="#">Buat Proyek</a></li>
            <li><a href="#projects">Project</a></li>
          </ul> 
        </nav>

        <!-- .Profile atau login -->
        <?php
          include 'koneksi/cn.php';
            if(isset($_SESSION["status"]) && $_SESSION["status"] == "login") {
            ?>
              <nav id="navbar" class="navbar">
                  <ul>
                    <li>
                      <a href="profile/profile.php">
                        <img class="image-fluid" src="<?=$linkpp['ppic']?>" alt="" style="width: 4vw; border-radius: 200px;">
                      </a>
                    </li> 
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

         <!-- end of Profile atau login -->

    </div>
  </header>
<!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
  <?php
    if(isset($_GET['pesan']) && $_GET['pesan'] == 'projectdenganreward'){
      ?>
        <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
        position:absolute; top:15%; left: 10%; z-index:1000;
        background: rgba(0,210,0,0.3);">
          <strong class="text-light">Project & reward anda berhasil ditambahkan !</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
    }
    else if(isset($_GET['pesan']) && $_GET['pesan'] == 'projektanpareward'){
      ?>
        <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
        position:absolute; top:15%; left: 10%; z-index:1000;
        background: rgba(0,210,0,0.3);">
          <strong class="text-light">Project anda berhasil ditambahkan !</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
    }
    else if(isset($_GET['pesan']) && $_GET['pesan'] == 'terhapus'){
      ?>
        <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
        position:absolute; top:15%; left: 10%; z-index:1000;
        background: rgba(255,0,0,0.3);">
          <strong class="text-light">Project anda berhasil di hapus !</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
    }
    else if(isset($_GET['pesan']) && $_GET['pesan'] == 'login'){
      ?>
        <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
        position:absolute; top:15%; left: 10%; z-index:1000;
        background: rgba(0,210,0,0.3);">
          <strong class="text-light">Berhasil Login !</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
    }
    else if(isset($_GET['pesan']) && $_GET['pesan'] == 'logout'){
      ?>
        <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
        position:absolute; top:15%; left: 10%; z-index:1000;
        background: rgba(0,210,0,0.3);">
          <strong class="text-light">Berhasil Log Out !</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
    }
    else if(isset($_GET['pesan']) && $_GET['pesan'] == 'register'){
      ?>
        <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
        position:absolute; top:15%; left: 10%; z-index:1000;
        background: rgba(0,210,0,0.3);">
          <strong class="text-light">Berhasil Register, Selamat Datang Pengguna Baru !</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
    }
  ?>

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Hidupkan <br><span>Proyek Kreatif mu !</span></h2>
            <p data-aos="fade-up">Kickstarter adalah platform crowdfunding yang memungkinkan pencipta proyek mendanai ide kreatif mereka dengan mendapatkan dukungan keuangan dari banyak orang.</p>
            <a data-aos="fade-up" data-aos-delay="200" href="proyek/buatproyek.php" class="btn-get-started">Buat Proyek Anda !</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(https://i.kickstarter.com/assets/045/460/081/bb5d99ba33b5a249ba8017258be0d08b_original.gif?fit=scale-down&origin=ugc&q=92&width=680&sig=YRQmvlvrkZVZ90pGh8hz1pT3dc2bmDpaNx9HgsF8w%2FY%3D)">
      </div>
      <div class="carousel-item" style="background-image: url(https://v2.kickstarter.com/1725601984-Q2Pf7WpvOZCR7G0aA2wp5IRQscC5dYY%2BfVEsdMd60kw%3D/projects/4746978/video-1311908-h264_high.mp4)"></div>
      <div class="carousel-item" style="background-image: url(https://i.kickstarter.com/assets/046/307/122/b64cdca9b8b6f997cae4ccc713be89f9_original.gif?fit=scale-down&origin=ugc&q=92&width=680&sig=mLA2cH4YJawQqVwmmegY0hfhtHJcEjWOzyeh0dX%2BHP8%3D)"></div>
      <div class="carousel-item" style="background-image: url(https://ksr-ugc.imgix.net/assets/042/544/261/2b9aa7f066e4de8e26345d6429a6a569_original.png?ixlib=rb-4.1.0&w=680&fit=max&v=1696360739&gif-q=50&lossless=true&s=9ecc4456981c57140a7ee16935f49d7f)"></div>
      <div class="carousel-item" style="background-image: url(https://ksr-ugc.imgix.net/assets/042/813/393/76039c99f91bd8a8ee73ad2866fa2748_original.gif?ixlib=rb-4.1.0&w=680&fit=max&v=1698166732&gif-q=50&q=92&s=80c6eabc8fb7a82ac4d5aabc0d93d8af)"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">
  

   <!-- ======= Riwayat Donasi Section ======= -->
  <?php
      // Ambil Data Donatur terbaru
      $riwayatdonasi = mysqli_query($cn,"SELECT * FROM riwayat_donasi ORDER BY id_donasi DESC");
      $cekriwayatdonasi = mysqli_num_rows($riwayatdonasi);
  ?>

    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Donasi seperti mereka !</h2>
          <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia
            reprehenderit sunt deleniti</p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">

            <!-- Riwayat Donasi -->
            <?php
              if($cekriwayatdonasi > 0){
                while($data = mysqli_fetch_array($riwayatdonasi)){

                  $idproject = $data['id_project'];
                  $dataproyek = mysqli_query($cn, "SELECT * FROM project WHERE id_project = '$idproject'");
                  $hasilproyek = mysqli_fetch_array($dataproyek);

                  $pdonatur = $data['donatur'];
                  $ppmentah = mysqli_query($cn,"SELECT ppic FROM user where user = '$pdonatur'");
                  $ppdonatur = mysqli_fetch_array($ppmentah);

                  if(isset($hasilproyek)){
                ?>
                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="<?=$ppdonatur['ppic']?>" class="testimonial-img" alt="">
                        <h3><?=$data['donatur'];?></h3>
                        <h4>Donatur</h4>
                        <div class="stars">
                          <i>Rp. <?=number_format($data['nominal'],0)?></i>
                        </div>
                        <hr>
                        <p>Kepada project</p>
                        <div class="project m-auto p-3 ">
                          <div class="w-100 d-flex justify-content-center" style="height:20vh;">
                            <img src="<?=$hasilproyek['gambar1']?>" alt="" style="height:20vh; width:15vw;" class="rounded-3">
                          </div>
                          <h3 class="fw-bold  text-center w-100">
                            <?=$hasilproyek['nama_project'];?>
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End User Donation item -->
                <?php
                  }
                }
              }
              else{
                echo '<h1 class=" mx-auto">Tidak ada donatur..</h1>';
              }
            ?>
            <!-- End of riwayat donasi -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    <!-- End Riwayat Donasi Section -->


    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Banyak Proyek Kreatif</h2>
          <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto
            accusamus fugit aut qui distinctio</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
          data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-Film">Film</li>
            <li data-filter=".filter-Art">Art</li>
            <li data-filter=".filter-Music">Music</li>
            <li data-filter=".filter-Games">Games</li>
          </ul><!-- End Projects Filters -->

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php
            $dataproyek = mysqli_query($cn, "SELECT * FROM project");
            while($row = mysqli_fetch_array($dataproyek)) {
              $id = $row['id_project'];
              $judul = $row['nama_project'];
              $gambar = $row['gambar1'];
              $kategori = $row['kategori'];
          ?>

            <div class="col-lg-4 col-md-6 portfolio-item filter-<?=$kategori?>" style="height:34vh; ;">
              <div class="portfolio-content h-100">
                <img src="<?=$gambar?>" class="img-fluid rounded-3" alt="" style="object-fit:cover; width: 100%; height:100%; overflow:hidden;">
                <div class="portfolio-info">
                  <h4><?=$kategori?></h4>
                  <p><?=$judul?></p>
                  <a href="<?=$gambar?>" title="<?=$judul?>"
                    data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="proyek/project-details.php?id=<?=$id?>" title="More Details" class="details-link"><i class="bi bi-currency-dollar"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->


            <?php 
              }
            ?>

          </div><!-- End Projects Container -->

        </div>

      </div>
    </section><!-- End Our Projects Section -->


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

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
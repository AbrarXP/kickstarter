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

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://a.kickstarter.com/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
            <li><a href="#riwayatdonasi">Riwayat Donasi</a></li>
            <li><a href="#">Buat Proyek</a></li>
            <li><a href="#projects">Your Project</a></li>
          </ul> 
        </nav>
      <!-- .navbar -->
      <?php
        if(isset($_SESSION["status"]) && $_SESSION["status"] == "login") {
        ?>
          <nav id="navbar" class="navbar">
              <ul>
                <li><a href="../login/logout.php">Logout</a></a></li> 
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

  <?php
            include '../koneksi/cn.php';

            $user = $_SESSION['username'];
            $query = mysqli_query($cn, "SELECT * FROM user WHERE user = '$user'");
            $dataprofil = mysqli_fetch_array($query);
            $ppic = $dataprofil['ppic'];
    ?>









  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('https://ksr-ugc.imgix.net/assets/042/813/393/76039c99f91bd8a8ee73ad2866fa2748_original.gif?ixlib=rb-4.1.0&w=680&fit=max&v=1698166732&gif-q=50&q=92&s=80c6eabc8fb7a82ac4d5aabc0d93d8af');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2 class="text-center" >Profil Anda</h2>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #d8d8d8;">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

      <?php
        if(isset($_GET['pesan']) && $_GET['pesan'] == 'berhasiledit'){
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Proses Edit Berhasil !</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
        }
      ?>
        <div class="row mt-5">
          <div class="col-lg-12">

            <div class="bg-light rounded-4 shadow p-5">
              <div class="row gy-2 ">

                <h1>Kick Starter<span style="color: #5369f8;">.</span></h1>
                <hr>

    <section id="team" class="team">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
            <div class="member-img">
              <img src="<?=$ppic?>" class="img-fluid" alt="avatar">
            </div>
            <div class="member-info text-center">
            <h3>
                <?php
                    $user = $_SESSION['username'];
                    echo "$user";
                ?>
              </h3>
              <a href="../profile/editprofile.php">Edit Profile</a> 
            </div>
          </div>
        </div>

    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Proyek Anda</h2>
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
        // Ga ngantuk kah
        // lg di cafe -le
        // pen balik -le
        // anjir ada namanya dong emang dipake siapa aja 
        // aowkaowko
                $dataproyek = mysqli_query($cn,"SELECT * FROM project where user = '$user'");
                  while($row = mysqli_fetch_array($dataproyek)) {
                 
                  $id = $row['id_project'];
                  $nama_project = $row['nama_project'];
                  $kategori = $row['kategori'];
                  $deskripsi = $row['deskripsi'];
                  $target_donasi = $row['target_donasi'];
                  $gambar1 = $row['gambar1'];
                  $gambar2 = $row['gambar2'];
                  $gambar3 = $row['gambar3'];
                  $gambar4 = $row['gambar4'];
                  $dkpanjang = $row['dkpanjang'];
            ?>


            <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $row['kategori']; ?>" style="height:34vh; ;">
              <div class="portfolio-content h-100">
                <img src="<?=$gambar1?>" class="img-fluid rounded-3" alt="" style="object-fit:cover; width: 100%; height:100%; overflow:hidden;">
                <div class="portfolio-info">
                  <h4><?php echo $row['kategori']; ?></h4>
                  <p><?php echo $row['nama_project']; ?></p>
                  <a href="<?=$gambar1?>" title="<?php echo $row['nama_project']; ?>"
                    data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="../proyek/project-details.php?id=<?=$id?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
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

  <!-- Riwayat Donasi -->
  <div id="riwayatdonasi" class="section-header">
    <h2>Riwayat Donasi</h2>
  </div>
  <?php
      // Ambil Data Donatur terbaru
      $user = $_SESSION['username'];
      $mydonasi = mysqli_query($cn,"SELECT * FROM riwayat_donasi WHERE donatur = '$user' ORDER BY id_donasi DESC");
      $cekjml = mysqli_num_rows($mydonasi);
    ?>
      <div class="row border p-3 mb-5" style="height: 40vh; ">

      <div class="slides-2 swiper">
        <div class="swiper-wrapper">

  <?php
    if($cekjml > 0){
      while($data = mysqli_fetch_array($mydonasi)){
        
  ?>
    <div class="swiper-slide border rounded-3 p-3">
      <div class="testimonial-wrap">
        <div class="testimonial-item">
            <div class="row w-100 ms-1 p-0 kolom universal ini mah">
              <div class="col-lg-13 ">

                <div class="row">
                  <div class="col-9 ">
                    <h3 class="mb-0"><?=$data['donatur'];?></h3>
                    <i>Donasi sebesar</i>
                  </div>
                  <div class="col-3  p-0">
                    <i stlye="font-size:0.9rem;">Baru saja</i>
                  </div>
                </div>

                <div class="row mt-5">
                  <h1>
                    <i>Rp. <?=number_format($data['nominal'],0)?></i>
                  </h1>
                </div>
                <?php
                $id_project = $data['id_project'];
                $query = mysqli_query($cn, "SELECT * FROM project WHERE id_project = '$id_project'");
                $dataproyek = mysqli_fetch_array($query);

                if(isset($dataproyek)){
                ?>
                <h5 class="mb-0"><?=$dataproyek['nama_project'];?></h5>
              </div>        
            </div>
        </div>
      </div>
    </div>

    <?php
         }
        }
      }
      else{
        echo '<h1 class=" mx-auto">Tidak pernah donasi</h1>';
      }
    ?>
  </div>
 </div>
</div>
<!-- End of Riwayat Donasi -->

 <!-- Reward -->
 <div id="reward" class="section-header">
    <h2>Reward</h2>
  </div>
   <?php
      $donasireward = mysqli_query($cn,"SELECT * FROM donasi_reward where user = '$user'");
        while($data = mysqli_fetch_array($donasireward)){
        $id_reward = $data['id_reward'];
    ?>
            <div class="row  justify-content-center p-0 overflow-hidden gx-5">
    <?php
         $cekreward = mysqli_query($cn,"SELECT * FROM reward where id_reward = '$id_reward'");
         $cek = mysqli_num_rows($cekreward);
         if($cek > 0){
           while($datareward = mysqli_fetch_array($cekreward)){;
             $id_reward = $datareward['id_reward'];
             $id_project = $datareward['id_project'];
             $reward_img = $datareward['reward_img'];
             $judul_reward = $datareward['judul_reward'];
             $deskripsi_reward = $datareward['deskripsi_reward'];
            ?>
          

        <div class="row justify-content-center gy-4">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg">
                  <img src="<?=$reward_img?>" class="img-fluid rounded-3">
                  </div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title"><?=$judul_reward?></h4>
                    <p><?=$deskripsi_reward?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php 
            }
          }
        }
      ?>
             


      </section>
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

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>
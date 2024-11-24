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

        <h2 class="text-center" >Proyek Anda</h2>
        <p class ="text-light" >Beri tahu kami lebih banyak tentang proyek anda !</p>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #d8d8d8;">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item  bg-light d-flex flex-column justify-content-center align-items-center rounded-4 shadow">
            <i class="bi bi-people"></i>
              <h3>
                <?php
                    $user = $_SESSION['username'];
                    echo "Hello $user";
                ?>
              </h3>
              <p>Butuh Bantuan ?</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item bg-light d-flex flex-column justify-content-center align-items-center rounded-4 shadow">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>barudakupn@gmail.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item bg-light d-flex flex-column justify-content-center align-items-center rounded-4 shadow">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+62 8282 8282 828</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row mt-5">
          <div class="col-lg-12">

            <form action="prosesinputproyek.php" method="post" class="bg-light rounded-4 shadow p-5">
              <div class="row gy-2 ">

                <h1>Kick Starter<span style="color: #5369f8;">.</span></h1>
                <p>Beri tahu kami lebih rinci tentang project mu ! </p>
                <hr>

                <div class="col-lg form-group col-lg mb-3">
                  <label for="name" class="ms-1">Judul Proyek</label>
                  <input type="text" name="judul" class="form-control rounded-2" id="name" placeholder="Judul Proyek" required>
                </div>

              </div>

              <div class="form-group col-lg mb-3">
                <label  class="ms-1">Kategori Proyek</label>
                <select name="kategori" class="form-select" required placeholder="Pilih Kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="Film">Film</option>
                    <option value="Art">Art</option>
                    <option value="Music">Music</option>
                    <option value="Games">Games</option>
                </select>
              </div>
            
              <div class="input-group col-lg mb-3">
                <label  class="input-group-text" for="uang"><i class="text-success">Rp</i></label>
                <input id="uang" type="text" class="form-control" name="targetdonasi"  placeholder="Target Donasi" required>
              </div>
              <p class="text-muted" >Target donasi yang ingin anda capai dalam project funding ini.</p>

              <div class="form-group col-lg rounded-4 mb-4">
                <label  class="ms-1">Deskripsi Singkat Proyek</label>
                <textarea class="form-control rounded-2" name="deskripsi" rows="5" placeholder="Deskripsi Proyek" required></textarea>
              </div>

              <div class="form-group col-lg rounded-4 mb-4">
                <label  class="ms-1">Deskripsi panjang Proyek</label>
                <textarea class="form-control rounded-2" name="deskripsi2" rows="5" placeholder="Deskripsi Proyek" required></textarea>
              </div>
              
              <div class="col-lg form-group col-lg mb-2">
                  <label for="name" class="ms-1">Gambar Heading untuk proyek anda</label>
                  <input type="url" name="gambar1" class="form-control rounded-2" id="name" placeholder="Link Gambar Anda" required>
              </div>

              <div class="col-lg form-group col-lg mb-3">
                  <label for="name" class="ms-1">Preview 1 proyek</label>
                  <input type="url" name="gambar2" class="form-control rounded-2" id="name" placeholder="Link Gambar Anda" required>
              </div>

              <div class="col-lg form-group col-lg mb-3">
                  <label for="name" class="ms-1">Preview 2 proyek</label>
                  <input type="url" name="gambar3" class="form-control rounded-2" id="name" placeholder="Link Gambar Anda" required>
              </div>

              <div class="col-lg form-group col-lg mb-5">
                  <label for="name" class="ms-1">Preview 3 proyek</label>
                  <input type="url" name="gambar4" class="form-control rounded-2" id="name" placeholder="Link Gambar Anda" required>
              </div>
              
              <div class="btn-group gap-2" role="group" aria-label="Basic checkbox toggle button group">
                <input  name = "rewardCb" onclick = "tampilkanForm()" id="checkbox-reward" type="checkbox" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary rounded-2" for="checkbox-reward"><i class="bi bi-gift text-warning"></i></label>
                <p> Berikan reward kepada para donatur ?</p>
              </div>

              <div id="reward-form" class="col-lg form-group col-lg mt-3" style="display:none;">

              <h4 class="text-center mt-5 text-primary" >Reward Form</h4>
              <hr>

                <div class="mb-3">
                    <label for="name" class="ms-1">Link gambar reward</label>
                    <input type="text" name="reward_img" class="form-control rounded-2" id="name" placeholder="Link gambar reward">
                </div>
                  
                <div class="mb-3">
                    <label for="name" class="ms-1">Donasi Minimal</label>
                    <input type="text" name="jml_min_donasi" class="form-control rounded-2" id="name" placeholder="Minimal donasi untuk mendapatkan reward" >
                </div>

                <div class="mb-3" >
                    <label for="name" class="ms-1">Judul Reward</label>
                    <input type="text" name="judul_reward" class="form-control rounded-2" id="name" placeholder="Apa reward yang diberikan" >
                </div class="mb-3">

                <div>
                    <label for="deskripsi" class="ms-1">Deskripsi Reward</label>
                    <textarea placeholder= "Jelaskan reward anda" class ="form-control rounded-2" name="deskripsi_reward" id="" cols="30" rows="10"></textarea>
                </div>


              </div>

              <div class="text-center"><button class="btn-theme">Submit</button></div>
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
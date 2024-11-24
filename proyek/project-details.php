<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  if(isset($_SESSION['username'])){
    include '../koneksi/cn.php';
    $user = $_SESSION['username'];
    $profile = mysqli_query($cn, "SELECT ppic FROM user WHERE user = '$user'");
    $linkpp = mysqli_fetch_array($profile);
  }
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Proyek</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="https://a.kickstarter.com/favicon.ico">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/detail.css">


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
                    <li>
                      <a href="../profile/profile.php">
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
    </div>
  </header><!-- End Header -->
      
    <!-- ======= Breadcrumbs ======= -->
    
    <?php
    include '../koneksi/cn.php';
    if(isset($_GET['id'])){

        $id_project = $_GET['id'];
        // Ambil gambar untuk highlight
        $query = mysqli_query($cn, "SELECT * FROM project WHERE id_project = '$id_project'");
        $dataproyek = mysqli_fetch_array($query);
        $gambar1 = $dataproyek['gambar1'];
        $gambar2 = $dataproyek['gambar2'];
        $gambar3 = $dataproyek['gambar3'];
        $gambar4 = $dataproyek['gambar4'];
        $kategori = $dataproyek['kategori'];
        $creator = $dataproyek['user'];

        // Menghitung berapa persen progress donasi sudah terkumpul
        $donasiterkumpul = $dataproyek['donasi_terkumpul'];
        $progresdonasi = ($dataproyek['donasi_terkumpul'] / $dataproyek['target_donasi']) * 100;

        // Menggunakan session username sebagai data donatur yg nantinya akan di kirim ke proses donasi
        if(isset($_SESSION['username'])){
          $donatur = $_SESSION['username'];
        }
        
        // Format angka menjadi 3 angka per titik
        $formatdonasi = number_format((float)$dataproyek['donasi_terkumpul'], 0) ;
        $formattarget = number_format((float)$dataproyek['target_donasi'],0);


        // Ambil data reward kalo ada
        $cekreward = mysqli_query($cn,"SELECT * FROM reward where id_project = '$id_project'");
        $cek = mysqli_num_rows($cekreward);
        echo "<script>console.log($cek);</script>";
        if($cek > 0){
          $datareward = mysqli_fetch_array($cekreward);
          $id_reward = $datareward['id_reward'];
          $id_project = $datareward['id_project'];
          $jml_min_donasi = $datareward['jml_min_donasi'];
          $reward_img = $datareward['reward_img'];
          $judul_reward = $datareward['judul_reward'];
          $deskripsi_reward = $datareward['deskripsi_reward'];
        }
    }
    ?>

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?=$gambar1?>');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2 class="text-center" ><?php echo $dataproyek['nama_project']; ?></h2>
        <p class ="text-light" ><?php echo $dataproyek['deskripsi']; ?></p>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Projet Details Section ======= -->
    
    <section id="project-details" class="project-details">
    <?php
        if(isset($_GET['pesan']) && $_GET['pesan'] == 'berhasildonasi'){
          ?>
            <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
            position:absolute; top:15%; left: 10%; z-index:1000;
            background: rgba(11,128,0,0.6);">
              <strong class="text-light">Donasi Berhasil !</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
        }
        if(isset($_GET['reward']) && $_GET['reward'] == 'ditambahkan'){
          ?>
            <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
            position:absolute; top:25%; left: 10%; z-index:1000;
            background: rgba(11,128,0,0.6);">
              <strong class="text-light">Kamu mendapatkan reward, cek di <span><a class="text-light text-decoration-underline" href="../profile/profile.php#reward">Profile !</a></span></strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
        }
      ?>

<?php
        if(isset($_GET['pesan']) && $_GET['pesan'] == 'berhasileditproject'){
          ?>
            <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
            position:absolute; top:15%; left: 10%; z-index:1000;
            background: rgba(11,128,0,0.6);">
              <strong class="text-light">Berhasil Edit Project !</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
        }
        if(isset($_GET['pesan']) && $_GET['pesan'] == 'berhasileditreward'){
          ?>
             <div class="alert border border-light alert-dismissible fade show" role="alert" style="width: 80vw;
              position:absolute; top:15%; left: 10%; z-index:1000;
              background: rgba(11,128,0,0.6);">
              <strong class="text-light">Berhasil Edit Reward !</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
          }
          ?>
      
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="position-relative h-100">
          <div id="img-c" class="slides-1 portfolio-details-slider swiper" style=" height: 80vh;">
            <div class="swiper-wrapper align-items-center ">

              <div class="swiper-slide" style="background-color: transparent; border:none;">
                <img class ="rounded-4" src="<?=$gambar2?>" alt="gb1" style="aspect-ratio: 16/9;object-fit: cover; height:inherit;">
              </div>

              <div class="swiper-slide overflow-hidden" style="background-color: transparent; border:none;">
                <img class ="rounded-4" src="<?=$gambar3?>" alt="gb3" style="aspect-ratio: 16/9; object-fit: cover; height:inherit;">
              </div>

              <div class="swiper-slide overflow-hidden" style="background-color: transparent; border:none;">
                <img class ="rounded-4" src="<?=$gambar4?>" alt="gb4" style="aspect-ratio: 16/9;object-fit: cover; height:inherit;">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        
        <!-- Heading -->
        <div class="heading text-center mt-5">
          <a href="#img-c">
            <span class="h1 fw-bold"><?php echo $dataproyek['nama_project']; ?></span>
          </a>
          <p class="text-success mb-5">By <?=$creator?></p>
        </div>
        <!-- End of heading -->
        
        <hr class="mb-5">
        
        <!-- Container Judul dan Deskripsi -->
        <div class="row justify-content-between gy-4 mt-4">

        
          <div class="col-lg-8">
            <!-- Progress bar -->
            <div class="portfolio-description">

              <!-- Progress bar -->
              <p class="text-end text-success fw-bold">Target : <span style="text-spacing: 0px;">Rp <?=$formattarget;?></span></p>
              <div class=" row justify-content-center" style="width:103%">
                <div class="row">
                  <div class="progress p-0 rounded-2 mb-3">
                      <div class="progress-bar rounded-2 " style="width: <?=$progresdonasi?>%; background: #3162DE;"></div>
                  </div>
                </div>
              </div>
              <h5 class="progressbar-title text-primary text-center mb-3">Donasi terkumpul Rp <span style="text-spacing: 0px;"><?=$formatdonasi?></span></h5>

              <!-- End progress bar -->
              <hr>
              <p class="p-4" style="text-align: justify; text-indent: 3em;">
                <?php echo $dataproyek['dkpanjang']; ?>
              </p>
            </div>
            <!-- End Progress bar -->


            <!-- Riwayat Donasi -->

            <?php
              $dquery = mysqli_query($cn,"SELECT * FROM riwayat_donasi WHERE id_project = '$id_project'");
              $cekriwayat = mysqli_num_rows($dquery);

            ?>
            <div class="row p-3 mb-5 mt-5 border rounded-3" style="height: 40vh; ">

              <div class="slides-2 swiper  p-2">
                <div class="swiper-wrapper">

                <?php
                if($cekriwayat > 0){

                  while($datadonatur = mysqli_fetch_array($dquery)){
                ?>

                  <div class="swiper-slide  rounded-3 p-3 border">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">

                          <div class="row w-100 ms-1  p-0 kolom universal ini mah">
                            <div class="col-lg-13 ">

                              <div class="row">
                                <div class="col-9 ">
                                  <h3 class="mb-0"><?=$datadonatur['donatur']?></h3>
                                  <i>Donasi sebesar</i>
                                </div>
                                <div class="col-3 p-0">
                                  <i stlye="font-size:0.9rem;">Baru saja</i>
                                </div>
                              </div>

                              <div class="row mt-5">
                                <h3>
                                  <i class="text-success">Rp <?=number_format($datadonatur['nominal']);?></i>
                                </h3>
                              </div>


                            </div>
                          </div>

                      </div>
                    </div>
                  </div>

                <?php
                  }
                }
                else{
                  echo "<h1 class='mx-auto mt-5'>Belum ada donatur :(</h1>";
                }
                ?>

                </div>
              </div>

            </div>
            <!-- End of Riwayat Donasi -->

            <!-- Reward  Section-->

            <div class="row border overflow-hidden p-5 rounded-4" style="display:<?php if($cek > 0){echo "block;";}else{echo "none;";}?>">
            <div class="heading-reward">
              <h4 class="fw-bold text-center text-dark" >Reward Menanti Mu !</h4>
              <hr>
              <div class="row  justify-content-center p-0 overflow-hidden gx-5">

                <div class="row ">
                  <div class="col-lg-10 ratio ratio-4x3">
                    <img src="<?=$reward_img?>" alt="reward_img" class="rounded-3">
                  </div>
                  <div class="col-lg-10 overflow-hidden">
                    <div class="deskripsi p-3">
                      <div class="row judul-deskripsi-reward mb-4 mt-5">
                          <h5 class=" text-dark"><?=$judul_reward?></h5>
                          <span>Minimal Donasi <span class="text-success">Rp <?=number_format($jml_min_donasi,0);?></span></span>
                      </div>
                      <p class="text-justify overflow-hidden">
                        <?=$deskripsi_reward?>
                      </p>
                    </div>
                  </div>
                </div>



                <div class="row" style="display:
                <?php
                if(isset($_SESSION['username']) && $_SESSION['username'] == $creator){
                  echo "block;";
                }
                else{
                  echo "none;";
                }
                ?>
                ">
                  <div class="mt-5">

                    <h5 class="text-center">Edit Reward <i style="font-size:0.9rem;" class="bi bi-pencil"></i></h5>
                    <form action="prosesedit.php" method="POST">
                      <input type="hidden" name="edit" value="reward">
                      <input type="hidden" name="id_reward" value ="<?=$id_reward?>">
                      <input type="hidden" name="id_project" value ="<?=$id_project?>">
                      <div class="mb-3">
                          <label>Tampilan Reward</label>
                          <input required type="url" name="reward_img" class="form-control" value="<?=$reward_img;?>">
                      </div>

                      <div class="mb-3">
                          <label>Jumlah Minimal Donasi</label>
                          <input required type="text" name="jml_min_donasi" class="form-control" value="<?=$jml_min_donasi;?>">
                      </div>

                      <div class="mb-3">
                          <label>Judul Project</label>
                          <input required type="text" name="judul_reward" class="form-control" value="<?=$judul_reward;?>">
                      </div>

                      <div class="mb-3">
                          <label>Deskripsi Reward</label>
                          <textarea class="form-control" name="deskripsi_reward" id="" cols="30" rows="10"><?=$deskripsi_reward?></textarea>
                      </div>

                      <button class="btn btn-outline-primary" type="submit">Save Change</button>

                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
          </div>
        
          <!-- Edit Form atau donasi-->
          <?php
            if(isset($_SESSION['username']) && $creator === $_SESSION['username']){
              ?>
                <div class="col-lg-3 shadow p-5 rounded-4">
                  <div class="portfolio-info">
                    <div class="heading mb-4">
                      <h3 class="text-center"> Project Setting 
                        <i class="bi bi-pencil" style="font-size:1.1rem;"></i>
                      </h3>
                    </div>
                    <div class="bodyform">
                      <form action="prosesedit.php" method="POST">
                        <div class="mb-3">
                          <label>Judul Project</label>
                          <input type="hidden" name="edit" value ="project">
                          <input type="hidden" name="id" value="<?=$dataproyek['id_project']?>">
                          <input required type="text" name="nama_project" class="form-control" value="<?=$dataproyek['nama_project'];?>">
                        </div>

                        <div class="mb-3">
                          <label>Kategori</label>
                          <select name="kategori" class="form-select" required placeholder="Pilih Kategori">
                            <option value="">Pilih Kategori</option>
                            <option value="Film">Film</option>
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Games">Games</option>
                          </select>
                        </div>

                        <label >Target Donasi</label>
                        <div class="input-group col-lg mb-3 p-0">
                          <label  class="input-group-text" for="uang"><i class="text-success">Rp</i></label>
                          <input id="uang" type="text" class="form-control" name="target_donasi" value="<?=$dataproyek['target_donasi'];?>" placeholder="Target Donasi" required>
                        </div>

                        <hr class="mt-5">

                        <div class="mb-3">
                          <label>Gambar Heading</label>
                          <input required type="text" name="gambar1" class="form-control" value="<?=$dataproyek['gambar1'];?>">
                        </div>

                        <div class="mb-3">
                          <label>Preview Project 1</label>
                          <input required type="text" name="gambar2" class="form-control" value="<?=$dataproyek['gambar2'];?>">
                        </div>

                        <div class="mb-3">
                          <label>Preview Project 2</label>
                          <input required type="text" name="gambar3" class="form-control" value="<?=$dataproyek['gambar3'];?>">
                        </div>
                        
                        <div class="mb-3">
                          <label>Preview Project 3</label>
                          <input required type="text" name="gambar4" class="form-control" value="<?=$dataproyek['gambar4'];?>">
                        </div>

                        <hr class="mt-5">

                        <div class="mb-3">
                          <label>Deskripsi Singkat</label>
                          <textarea required class="form-control" name="deskripsi_singkat" cols="30" rows="10"><?=$dataproyek['deskripsi'];?></textarea>
                        </div>

                        <div class="mb-3">
                          <label>Deskripsi Panjang</label>
                          <textarea required class="form-control" name="deskripsi_panjang" cols="30" rows="10"><?=$dataproyek['dkpanjang'];?></textarea>
                        </div>

                        <div class="button d-flex justify-content-center gap-4">
                          <button class="btn btn-outline-primary">Save Change</button>
                        </div>
                      </form>
                      <form action="proseshapus.php" method="POST" class="d-flex justify-content-center mt-2">
                        <input type="hidden" name="creator" value="<?=$creator?>">
                        <input type="hidden" name="id_project" value="<?=$id_project?>">
                        <button class="btn btn-outline-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              <?php
            }
            else{
              ?>
                <div class="col-lg-3 shadow p-5 rounded-4 bg-light" style="height: 50vh;">
                  <div class="portfolio-info">
                    <form action="../donasi/prosesdonasi.php" method="POST">
                      <h3 class="mb-5">Donasi Project Ini</h3>
                      <ul>
                        <li>
                          <span>Nominal</span>
                          <div class="input-group">
                            <span class="input-group-text text-primary">Rp</span>
                            <input type="hidden" name="donatur" value="<?=$donatur?>">
                            <input type="hidden" name="id" value="<?=$id_project?>">
                            <input type="text" class="form-control" name="nominal">
                          </div>
                        </li>
                        <hr>
                        <button type="submit" class="mt-4 btn-visit align-self-center" style="border: none;">Donasi</button>
                      </ul>
                    </form>
                  </div>
                </div>
            <?php
            }
          ?>


        </div>
        <!-- End Container Judul dan Deskripsi -->

      </div>
    </section><!-- End Projet Details Section -->

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
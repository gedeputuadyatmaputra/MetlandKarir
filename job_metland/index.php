<?php 
  require_once 'session_check.php';
  require_once 'koneksi.php';

  $sql = "SELECT * FROM tb_infojob";
  $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Metland Job</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/metland_nbg.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/metland_nbg.png" alt="logo metland"> -->
        <h1 class="sitename">METLAND KARIR</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home<br></a></li>
          <li><a href="about.php">About</a></li>
          <!-- <li><a href="lowongan.php">Lamaran</a></li> -->
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="btn-getstarted" href="login.php">Admin</a> -->

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

    <div class="hero-img" data-aos="fade-in">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/bg_metlan.png" class="img-fluid w-100" style="height: 750px;" alt="Metland">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/metland/metlandcileungsi.jpg" class="img-fluid w-100" style="height: 750px;" alt="Metland">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/metland/mhotelcirebon.jpg" class="img-fluid w-100" style="height: 750px;" alt="Metland">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/metland/mmenteng.jpg" class="img-fluid w-100" style="height: 750px;" alt="Metland">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    </section><!-- /Hero Section -->

    <div class="container text-center mt-4">
        <div class="row gy-4">
            <div class="col-lg-12 d-flex flex-column justify-content-center">
                <h1><b>METLAND KARIR</b></h1>
                <p><b>Website Metland Karir, segera melamar pekerjaan disini sekarang!</b></p>
            </div>
        </div>
    </div>

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4" >
          <h2><b>Lowongan</b></h2>

          <?php while ($job = mysqli_fetch_assoc($result)): ?>
          <section id="management-trainee" class="management-trainee section">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-lg-6">
                          <?php if ($job['gambar']): ?>
                              <img src="data:image/jpeg;base64 <?php echo base64_encode ($job['gambar']); ?>" alt="<?php echo $job['posisi']; ?>" class="img-fluid">
                          <?php else: ?>
                              <img src="assets/img/default-image.jpg" alt="Default Image" class="img-fluid"> <!-- Gambar default jika tidak ada -->
                          <?php endif; ?>
                      </div>
                      <div class="col-lg-6">
                          <p><?php echo $job['deskripsi']; ?></p>
                          <a href="pendaftaran.php?jenis_card=<?php echo $job['posisi']?>" class="btn btn-dark">Daftar</a>
                      </div>
                  </div>
              </div>
          </section>
          <?php endwhile; ?>
          <!-- End Service Item -->

          <section id="management-trainee" class="management-trainee section">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                  <img src="assets/img/e_kerja.jpg" alt="Management Trainee" class="img-fluid">
                </div>
                <div class="col-lg-6 order-lg-1">
                  <h2>Management Trainee</h2>
                  <p>PT Metropolitan Land Tbk membuka kesempatan bagi Management Trainee (MT) dalam rekayasa untuk mencari sumber daya manusia yang berkualitas sebagai tulang punggung perusahaan. Program ini bertujuan untuk memperoleh dan memelihara ketersediaan tenaga profesional yang terampil. Perekrutan MT dilakukan melalui identifikasi siswa berbakat dengan mencari di universitas terkemuka melalui hari-hari karir.</p>
                  <a href="forms/mtjob.php?Management Trainee" class="btn btn-dark">Daftar</a>
                </div>
              </div>
            </div>
          </section>

          <section id="management-trainee" class="management-trainee section">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <img src="assets/img/e_freshgrad.jpg" alt="Management Trainee" class="img-fluid">
                </div>
                <div class="col-lg-6">
                  <h2>Fresh Graduate</h2>
                  <p>Langkah awal bagi talenta muda yang ingin mengembangkan karir untuk mengisi beberapa posisi di masing - masing proyek unit P.T. Metropolitan Land Tbk.</p>
                  <a href="forms/fgjob.php?Fresh Graduate" class="btn btn-dark">Daftar</a>
                </div>
              </div>
            </div>
          </section>

          <section id="management-trainee" class="management-trainee section">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                  <img src="assets/img/pro_gmbr.jpg" alt="Management Trainee" class="img-fluid">
                </div>
                <div class="col-lg-6 order-lg-1">
                  <h2>Profesional</h2>
                  <p>PT Metropolitan Land Tbk membuka lowongan profesional dengan pengalaman di bidang tertentu dan ingin mengembangkan talenta untuk memberikan nilai kehidupan yang lebih baik.</p>
                  <a href="forms/profesional_job.php?Profesional" class="btn btn-dark">Daftar</a>
                </div>
              </div>
            </div>
          </section>

          <section id="management-trainee" class="management-trainee section">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <img src="assets/img/intern_demo.jpg" alt="Management Trainee" class="img-fluid">
                </div>
                <div class="col-lg-6">
                  <h2>Internship</h2>
                  <p>PT Metropolitan Land Tbk membuka kesempatan bagi yang magang (Internship) dalam mengetahui ruang lingkup kerja di PT Metropolitan Land Tbk.</p>
                  <a href="forms/intern.php?Internship" class="btn btn-dark">Daftar</a>
                </div>
              </div>
            </div>
          </section>
        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/bg_metlan.png" class="img-fluid mt-5" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content order-last  order-lg-first" data-aos="fade-up" data-aos-delay="100">
            <h3>About Us</h3>
            <p>
              Pada tahun 1970, tujuh pengusaha profesional Indonesia: Ir. Ismail Sofyan, Ir. Budi Brasali, Drs Budiman Kusika, H. Subagdja Prawata, Ir. Soekrisman, Ir. H.Secakusuma dan Ir. Ciputra sebagai pemimpin, bekerja sama membentuk sebuah perusahaan PT Metropolitan Development (MD). Ketujuh pendiri ini memiliki visi yang sama akan masa depan.
            </p>
            <br> 
            <p>
              Berjalannya waktu MD berkembang sangat pesat di berbagai bidang dan menjadi pemain yang aktif dalam dinamika pertumbuhan ibukota Indonesia pada saat itu. MD telah melahirkan banyak perusahaan besar pada masa kini, salah satunya adalah PT Metropolitan Land Tbk (Metland). Cikal bakal Metland merupakan bagian dari kisah sukses MD.
            </p>
            <br>
            <p>
              Berjalannya waktu MD berkembang sangat pesat di berbagai bidang dan menjadi pemain yang aktif dalam dinamika pertumbuhan ibukota Indonesia pada saat itu. MD telah melahirkan banyak perusahaan besar pada masa kini, salah satunya adalah PT Metropolitan Land Tbk (Metland). Cikal bakal Metland merupakan bagian dari kisah sukses MD.
            </p>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Metland Karir</span>
          </a>
          <p>Metland Karir, memudahkan anda dalam mendaftar di PT Metropolitan Landk Tbk. </p>
          <div class="social-links d-flex mt-4">
            <a href="https://x.com/Metland_id"><i class="bi bi-twitter-x"></i></a>
            <a href="https://web.facebook.com/MetlandID?locale=id_ID"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/metland_id/"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/company/metropolitanland/"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Contact Us</h4>
                <h5>M Gold Tower, Lantai 15</h5>
                <p>JI. Letkol M. Moeffreni Moe'min Pekayon Jaya, Bekasi Selatan.Bekasi 17148 - Indonesia</p>
            <p class="mt-4"><strong>Call Center :</strong> <span>0807-1-260000</span></p>
            <h4>Fax</h4>
            <p>(62-21) 2808 5555</p>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Metland Karir</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
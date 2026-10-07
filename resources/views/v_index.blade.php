<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - TheEvent Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('TheEvent')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('TheEvent')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('TheEvent')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('TheEvent')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('TheEvent')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('TheEvent')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('TheEvent')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('TheEvent')}}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{asset('TheEvent')}}/assets/img/logo.png" alt="">
        <!-- Uncomment the line below if you also wish to use an text logo -->
        <!-- <h1 class="sitename">TheEvent</h1>  -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#Jenis Layanan">Jenis Layanan</a></li>
          <li><a href="#galeri">Galeri</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn d-none d-sm-block" href="/register">Registrasi</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="home" class="hero section dark-background">

      <img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri3.jpg" alt="" data-aos="fade-in" class="">

      <div class="container d-flex flex-column align-items-center text-center mt-auto">
        <h2 data-aos="fade-up" data-aos-delay="100" class="">KESENIAN TRADISIONAL<br><span>CAHAYA</span> GUMILANG</h2>
        <div data-aos="fade-up" data-aos-delay="300" class="">
        </div>
      </div>

      <div class="about-info mt-auto position-relative">

        <div class="container position-relative" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-6">
              <h2>About The Event</h2>
              <p>Cahaya Gemilang adalah jasa seni tradisional yang menawarkan jasa seni tradisional seperti Tari Jaipong, Siraman, dan Galura untuk acara spesial. Situs ini memudahkan dalam pemesanan dan akses informasi layanan.</p>
            </div>
            <div class="col-lg-3">
              <h3>Where</h3>
              <p>Dusun Garung RT 023 RW 008 Desa Koranji, Kecamatan Purwadadi, Kabupaten Subang, Jawa Barat.</p>
            </div>
            <div class="col-lg-3">
              <h3>When</h3>
              <p>Sabtu - Minggu</p>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Speakers Section -->

      <!-- Section Title -->


   <!-- /Speakers Section -->

    <!-- Schedule Section -->
    <!-- /Schedule Section -->

    <!-- Venue Section -->

    <!-- Hotels Section -->
    <section id="Jenis Layanan" class="hotels section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Jenis Layanan</h2>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            <!-- First Row: Lengser and Jaipong -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100">
                    <div class="card-img">
                        <img src="{{asset('TheEvent')}}/assets/img/layanan1.jpg" alt="" class="img-fluid">
                    </div>
                    <h3><a href="#" class="stretched-link">Lengser</a></h3>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p>Lengser adalah pertunjukan seni tradisional Jawa yang melibatkan tarian, musik, dan dialog.</p>
                </div>
            </div><!-- End Card Item -->

            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100">
                    <div class="card-img">
                        <img src="{{asset('TheEvent')}}/assets/img/layanan2.jpg" alt="" class="img-fluid">
                    </div>
                    <h3><a href="#" class="stretched-link">Jaipong</a></h3>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p>Jaipong adalah jenis tarian tradisional asal Jawa Barat yang menggabungkan gerakan tari, musik, dan seni pertunjukan.</p>
                </div>
            </div><!-- End Card Item -->
        </div>

        <div class="row gy-4">
            <!-- Second Row: Siraman and another image -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100">
                    <div class="card-img">
                        <img src="{{asset('TheEvent')}}/assets/img/layanan3.jpg" alt="" class="img-fluid">
                    </div>
                    <h3><a href="#" class="stretched-link">Organ Tunggal</a></h3>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p>Hiburan Organ Tunggal adalah sebuah bentuk pertunjukan musik yang menggunakan alat musik organ sebagai instrumen utama</p>
                </div>
            </div><!-- End Card Item -->

            <!-- Placeholder for another image or content -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="card h-100">
                    <div class="card-img">
                        <img src="{{asset('TheEvent')}}/assets/img/layanan4.jpeg" alt="" class="img-fluid">
                    </div>
                    <h3><a href="#" class="stretched-link">Siraman</a></h3>
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p>Siraman adalah ritual adat Jawa menjelang pernikahan yang bertujuan untuk menyucikan calon pengantin secara simbolis, baik jasmani maupun rohani, sebagai persiapan memasuki kehidupan pernikahan.</p>
                </div>
            </div><!-- End Card Item -->
        </div>
    </div>


    </section><!-- /Hotels Section -->

    <!-- Gallery Section -->
    <section id="galeri" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Galeri</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 5,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri1.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri2.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri3.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri4.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri5.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri6.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri7.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri8.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri8.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri9.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri9.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri10.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri10.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/event-gallery/galeri11.jpg"><img src="{{asset('TheEvent')}}/assets/img/event-gallery/galeri11.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Sponsors Section -->
    <!-- /Sponsors Section -->

    <!-- Faq Section --><!-- /Faq Section -->

    <!-- Buy Tickets Section -->
    <!-- /Buy Tickets Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>Dusun Garung RT 023 RW 008 Desa Koranji, Kecamatan Purwadadi, Kabupaten Subang, Jawa Barat.</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+62 822-1533-6924</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-instagram"></i>
              <h3>Follow Us on Instagram</h3>
              <p><a href="https://instagram.com/cahaya_gumilang_muda" target="_blank">@cahaya_gumilang_muda</a></p>
            </div>
          </div><!-- End Info Item -->


        </div>

        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5447990853236!2d107.65712607430211!3d-6.4524324630914505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69154413da8b8f%3A0xeba74d0fd5ff62ac!2sDusun%20Garung!5e0!3m2!1sid!2sid!4v1730643982285!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div><!-- End Google Maps -->

          <!-- End Contact Form -->

       <!-- /Contact Section -->


  <footer id="footer" class="footer dark-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">TheEvent</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Subang, Purwadadi</p>
              <p>Dusun Garung RT 03 RW 008 Desa Koranji</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+62 822-1533-6924</span></p>
              <p><strong>Instagram :</strong> <a href="https://www.instagram.com/cahaya_gumilang_muda?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">@cahaya_gumilang_muda</a></p>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#home">Home</a></li>
              <li><a href="#Jenis Layanan">Jenis Layanan</a></li>
              <li><a href="#galeri">Galeri</a></li>
              <li><a href="#contact">Kontak</a></li>
            </ul>
          </div>


        </div>
      </div>
    </div>

    <div class="copyright text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div>
            © Copyright <strong><span>POLSUB</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
          </div>
        </div>

      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('TheEvent')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('TheEvent')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('TheEvent')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('TheEvent')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('TheEvent')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{asset('TheEvent')}}/assets/js/main.js"></script>

</body>

</html>

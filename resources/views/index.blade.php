<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PPDB</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template_web/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template_web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template_web/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template_web/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template_web/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template_web/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template_web/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template_web/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template_web/assets/css/style.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.css') }}">

  <!-- =======================================================
  * Template Name: FlexStart - v1.1.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('sweet::alert')
@if (Session::has('keluar'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: 'Mohon tunggu sampai 1/24 jam, Admin akan memverifikasi NISN anda!'
    })
</script>
@endif
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <span>PPDB</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/') }}">Beranda</a></li>

          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="{{ url('sejarah') }}">Sejarah</a></li>
              <li><a class="nav-link scrollto" href="{{ url('visimisi') }}">Visi & Misi</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ url('guru') }}">Guru</a></li>

          <li><a class="getstarted scrollto" target="_blank" href="{{ route('register') }}">Daftar PPDB</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat datang!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Aplikasi Pendaftaran Peserta Didik Baru</h2>
          <h2 data-aos="fade-up" data-aos-delay="400">SMP Harapan Bersama Tegal</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="{{ route('login') }}" target="_blank" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Masuk</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('template_web/assets/img/hero-img.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    @include('kontak')

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template_web/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('template_web/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template_web/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('template_web/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template_web/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('template_web/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template_web/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template_web/assets/js/main.js') }}"></script>

</body>

</html>
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

    <!-- =======================================================
  * Template Name: FlexStart - v1.1.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

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

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li>Detail Guru</li>
                </ol>
                <h2>Guru SMP Harapan Bersama Tegal</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">


                    <div class="col-lg-12">
                        <div class="portfolio-info">
                            <h3>Detail Guru</h3>
                            <div class="col-md-12 row">
                                <div class="col-md-4">
                                    <img style="max-width: 500px; height: 300px;" src="{{ asset('imagesguru/'. $guru->foto) }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-8">
                                    <ul>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Nama</strong></div>
                                                <div class="col-md-8">: {{ $guru->nama }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>NIP</strong></div>
                                                <div class="col-md-8">: {{ $guru->nip }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>NUPTK</strong></div>
                                                <div class="col-md-8">: {{ $guru->nuptk }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Tahun Masuk</strong></div>
                                                <div class="col-md-8">: {{ $guru->tahun_masuk }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Pendidikan</strong></div>
                                                <div class="col-md-8">: {{ $guru->pendidikan }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Tempat, Tanggal Lahir</strong></div>
                                                <div class="col-md-8">: {{ $guru->tempat_lahir }},
                                                    <?php
                                                    $date = date_create($guru->tanggal_lahir);
                                                    echo date_format($date, "d F Y");
                                                    ?></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Jenis Kelamin</strong></div>
                                                <div class="col-md-8">: {{ $guru->jk }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Agama</strong></div>
                                                <div class="col-md-8">: {{ $guru->agama }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>No Ponsel</strong></div>
                                                <div class="col-md-8">: +{{ $guru->no_hp }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Email</strong></div>
                                                <div class="col-md-8">: {{ $guru->email }}</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-md-12 row">
                                                <div class="col-md-4"><strong>Alamat</strong></div>
                                                <div class="col-md-8">: {{ $guru->alamat }}</div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

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
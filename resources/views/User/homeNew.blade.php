<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KELMAS - Keluhan Masyarakat</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.svg') }}" rel="icon">
    <link href="{{ asset('assetsHomeNew/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assetsHomeNew/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsHomeNew/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsHomeNew/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsHomeNew/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsHomeNew/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsHomeNew/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsHomeNew/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                {{-- <img src="assets/img/logo.png" alt="KELMAS"> --}}
                <span>KELMAS</span>
            </a>

            <!-- ======= Navbar ======= -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#services">Proses Lapor</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('pekat.formRegister') }}">Daftar</a></li>
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
                    <h1 data-aos="fade-up">Layanan Pengaduan Masyarakat</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('pekat.lapor') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Lapor Sekarang</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/landing-ilustrator.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>About</h3>
                            <h2>Apa Itu Pengaduan Masyarakat ?</h2>
                            <p>
                                Pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. 
                                Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. 
                                Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya. 
                                Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. 
                                Tujuannya, masyarakat memiliki satu saluran pengaduan secara Nasional.
                            </p>
                            {{-- <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('images/about-us.jpg') }}" class="img-fluid" alt="Tentang PEKAT">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Tata Cata Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Proses Lapor</h2>
                    <p>Proses Lapor Pengaduan Masyarakat</p>
                </header>

                <div class="col-lg-12 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row gy-4">
                            
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="service-box blue">
                                    <i class="ri-edit-fill icon"></i>
                                    <h3>Tulis Laporan</h3>
                                    <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                                </div>
                            </div>

                            
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="service-box orange">
                                    <i class="ri-survey-line icon"></i>
                                    <h3>Tindak Lanjut</h3>
                                    <p>Instansi akan menindaklanjuti dan membalas laporan Anda</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="service-box green">
                                    <i class="ri-check-double-line icon"></i>
                                    <h3>Selesai</h3>
                                    <p>Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Tata Cara Section-->

        <!-- ======= Counts Section ======= -->
        {{-- <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-12 col-md-12">
                        <div class="d-block count-box">
                            <div class="text-center">
                                <span data-purecounter-start="0" data-purecounter-end="232"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section> --}}
        <!-- End Counts Section -->

        <!-- ======= Clients Section ======= -->
        {{-- <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Clients</h2>
                    <p>Temporibus omnis officia</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section> --}}
        <!-- End Clients Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="d-block count-box">
                            {{-- <i class="bi bi-emoji-smile align-item-center"></i> --}}
                            <div class="text-center h4">
                                <h4>JUMLAH LAPORAN</h4>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $pengaduan }}" data-purecounter-duration="1" class="purecounter fs-1"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-7 col-md-12 footer-info">
                        <a href="/" class="logo d-flex align-items-center">
                            <img src="assets/img/logo.png" alt="">
                            <span>KELMAS</span>
                        </a>
                        <p>Aplikasi pengaduan masyarakat online yang siap membantu Anda kapanpun dan dimanapun.</p>
                        {{-- <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div> --}}
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Lainnya</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Tutorial Video</a></li>
                            {{-- <li><i class="bi bi-chevron-right"></i> <a href="#">Ketentuan Layanan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li> --}}
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Hubungi Kami</h4>
                        <p>
                            Jl Siwalanpanji <br>
                            Sidoarjo, Buduran<br>
                            Jawa Timur <br><br>
                            <strong>Phone:</strong> +62 895 3503 53300<br>
                            <strong>Email:</strong> kelmas@pengaduan.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Adrian</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                KELMAS - Keluhan Masyarakat</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="{{ asset('assetsHomeNew/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assetsHomeNew/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assetsHomeNew/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetsHomeNew/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assetsHomeNew/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assetsHomeNew/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assetsHomeNew/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assetsHomeNew/js/main.js') }}"></script>

</body>

</html>
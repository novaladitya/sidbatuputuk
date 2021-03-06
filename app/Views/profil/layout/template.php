<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Desaku Desamu</title>
    <meta content="Sistem Informasi Desa" name="description">
    <meta content="Website Desa" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>/assets/img/logo.png" rel="icon">
    <link href="<?= base_url(); ?>/assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/assets/profil/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <!-- <h1><a href="#"><span>Desa</span> Batu Putuk</a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/"><img src="<?= base_url(); ?>/assets/img/logo.png" width="160px" alt="Desaku Desamu" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="<?= $halaman == 'beranda' ? 'active' : '' ?>" href="/">Beranda</a></li>
                    <li><a class="<?= $halaman == 'blog' ? 'active' : '' ?>" href="/blog">Blog</a></li>
                    <li><a class="<?= $halaman == 'belanja' ? 'active' : '' ?>" href="/belanja">Belanja</a></li>
                    <?php if ($halaman == 'beranda') : ?>
                        <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    <?php endif; ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- ======= /Header ======= -->

    <!-- ======= MainContent ======= -->
    <?= $this->renderSection('content'); ?>
    <!-- ======= /MainContent ======= -->

    <!-- ======= Footer ======= -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h2>Desa <span>Batu Putuk</span></h2>
                                </div>

                                <p>Selengkapnya tentang wisata dan kontak kelurahan Batu Putuk dapat di lihat pada menu Kontak dan Blog. Ingat jangan lupa selalu menerapkan protokol kesehatan!</p>
                                <!-- <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href=""><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="bi bi-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="bi bi-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="bi bi-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>informasi</h4>
                                <p>
                                    <?= $kontak[0]['alamat'] . ', ' . $kontak[0]['provinsi']; ?>
                                </p>
                                <div class="footer-contacts">
                                    <p><span>Telepon:</span> <?= $kontak[0]['nomor_telepon']; ?></p>
                                    <p><span>Email:</span> <?= $kontak[0]['email']; ?></p>
                                    <p><span>Jam Kerja:</span> <?= $kontak[0]['jam_kerja']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <iframe src=" https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d819.3802493557132!2d105.2227560258653!3d-5.436477278062212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da08fa6c72ed%3A0x2f6f543e49748291!2sBumi%20Kedaton%20Zoo!5e0!3m2!1sid!2sid!4v1631545451275!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <!-- <div class="col-md-4">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Instagram</h4>
                                <div class="flicker-img">
                                    <a href=""><img src="<?= base_url(); ?>/assets/img/portfolio/1.jpg" alt=""></a>
                                    <a href=""><img src="<?= base_url(); ?>/assets/img/portfolio/1.jpg" alt=""></a>
                                    <a href=""><img src="<?= base_url(); ?>/assets/img/portfolio/3.jpg" alt=""></a>
                                    <a href=""><img src="<?= base_url(); ?>/assets/img/portfolio/4.jpg" alt=""></a>
                                    <a href=""><img src="<?= base_url(); ?>/assets/img/portfolio/5.jpg" alt=""></a>
                                    <a href=""><img src="<?= base_url(); ?>/assets/img/portfolio/6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                Copyright &copy; 2021 <strong>Desa Batu Putuk</strong>.
                            </p>
                        </div>
                        <div class="credits">
                            Designed by NAA
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ======= /Footer ======= -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/appear/jquery.appear.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/knob/jquery.knob.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>/assets/profil/js/main.js"></script>

</body>

</html>
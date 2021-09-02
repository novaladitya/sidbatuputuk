<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Desaku Desamu</title>
    <meta content="Sistem Informasi Desa" name="description">
    <meta content="Website Desa" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>/assets/img/Logo.svg" rel="icon">
    <link href="<?= base_url(); ?>/assets/img/Logo.svg" rel="apple-touch-icon">

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
                <!-- <h1><a href="#"><span>Desaku</span> Desamu</a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/"><img src="<?= base_url(); ?>/assets/img/logo.svg" width="160px" alt="Desaku Desamu" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="<?= $halaman == 'beranda' ? 'active' : '' ?>" href="/">Beranda</a></li>
                    <li><a class="<?= $halaman == 'profil_desa' ? 'active' : '' ?>" href="/profil-desa">Profil Desa</a></li>
                    <li><a class="<?= $halaman == 'lembaga_masyarakat' ? 'active' : '' ?>" href="/lembaga-masyarakat">Lembaga Masyarakat</a></li>
                    <!-- <li class="dropdown"><a href=""><span>Profil Desa</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/post/sejarah-desa-seiket">Sejarah</a></li>
                            <li><a href="">Geografis</a></li>
                            <li><a href="">Arti Lambang</a></li>
                            <li><a href="">Data Penduduk</a></li>
                            <li class="dropdown"><a href="#"><span>Pemerintahan</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="">Visi Misi</a></li>
                                    <li><a href="">Struktur</a></li>
                                    <li><a href="">Program Desa</a></li>
                                    <li><a href="">Pencapaian Desa</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="dropdown"><a href=""><span>Lembaga Masyarakat</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="">BPD</a></li>
                            <li><a href="">Lembaga Pemasyarakatan</a></li>
                            <li><a href="">Lembaga Adat</a></li>
                            <li><a href="">Lembaga Desa</a></li>
                            <li><a href="">Bumdes</a></li>
                            <li><a href="">Karang Taruna</a></li>
                            <li><a href="">Linmas</a></li>
                            <li><a href="">PKK</a></li>
                            <li><a href="">Kelompok Tani</a></li>
                        </ul>
                    </li> -->
                    <li><a class="<?= $halaman == 'berita' ? 'active' : '' ?>" href="/berita">Berita</a></li>
                    <li><a class="" href="">Pelayanan</a></li>
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
                                    <h2><span>Desaku</span> Desamu</h2>
                                </div>

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
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
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                                Copyright &copy; 2021 <strong>Desaku Desamu</strong>.
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
<?= $this->extend('profil/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= hero Section ======= -->
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url(assets/img/beranda/carrousel/gambar1.svg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Desaku Desamu</h2>
              <p class="animate__animated animate__fadeInUp">Ayo Cari Tahu Tentang Desa Ini!</p>
              <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(assets/img/beranda/carrousel/gambar2.svg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Desaku Desamu</h2>
              <p class="animate__animated animate__fadeInUp">Ayo pilih pelayanan yang kamu butuhkan sekarang!</p>
              <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Pelayanan</a>
            </div>
          </div>
        </div>

        <?php foreach ($carrousel as $c) : ?>
          <div class="carousel-item" style="background-image: url(assets/img/beranda/carrousel/<?= $c['gambar']; ?>)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Desaku Desamu</h2>
                <p class="animate__animated animate__fadeInUp"><?= $c['judul']; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= About Section ======= -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Sejarah Singkat Desa</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                <img src="<?= base_url(); ?>/assets/img/beranda/profil.jpg">
              </a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <p class="fs-6">
                Lorem is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
              <a type="button" class="btn-selengkap right" href="/profil-desa">Selengkapnya <i class="bi bi-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div><!-- End About Section -->

  <!-- ======= Demografi Section ======= -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Geografis Desa</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <p class="fs-6">
                Lorem is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
              <a type="button" class="btn-selengkap left" href="/profil-desa">Selengkapnya <i class="bi bi-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                <img src="<?= base_url(); ?>/assets/img/beranda/demografi.jpg">
              </a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <!-- End col-->
      </div>
    </div>
  </div><!-- End Demografi Section -->

  <!-- ======= Data Section ======= -->
  <div class="our-skill-area fix hidden-sm" style='background:rgba(0, 0, 0, 0.8) url("<?= base_url(); ?>/assets/img/beranda/penduduk.jpg") no-repeat fixed
    center top/cover'>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <!-- section-heading end -->
        <div class="row">
          <?php foreach ($pekerjaan as $p) : ?>
            <!-- single-data start -->
            <div class="col-xs-12 col-sm-2 col-md-2 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="<?= $p['persentase']; ?>" data-linecap="round" data-width="150" data-bgcolor="#fff" data-fgcolor="#61CE70" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4"><?= $p['pekerjaan']; ?></h3>
                </div>
              </div>
            </div>
            <!-- single-data end -->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div><!-- End Data Section -->

  <!-- ======= Produk Section ======= -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Galeri dan Produk Desa</h2>
          </div>
        </div>
      </div>
      <div class="row awesome-project-content portfolio-container">
        <?php for ($i = 0; $i < (count($produk) >= 3 ? 3 : count($produk)); $i++) : ?>
          <!-- produk-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-barang">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?= base_url(); ?>/assets/img/beranda/belanja/<?= $produk[$i]['gambar']; ?>" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a href="/belanja">
                      <h4><?= $produk[$i]['nama']; ?></h4>
                      <span><?= $produk[$i]['penjual']; ?></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- produk-item end -->
        <?php endfor; ?>
      </div>
    </div>
  </div><!-- End Produk Section -->

  <!-- ======= Sambutan Section ======= -->
  <div id="testimonials" class="testimonials" style='background: url("<?= base_url(); ?>/assets/img/beranda/bg1.jpg") no-repeat'>
    <div class="container">

      <div class="testimonials-slider swiper-container">
        <div class="swiper-wrapper">

          <?php foreach ($sambutan as $s) : ?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/beranda/sambutan/<?= $s['foto']; ?>" class="testimonial-img">
                <h3><?= $s['nama']; ?></h3>
                <h4><?= $s['jabatan']; ?></h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?= $s['pesan']; ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End sambutan item -->
          <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </div><!-- End Sambutan Section -->

  <!-- ======= Blog Section ======= -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Kabar Terbaru Desa</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php $batas = count($daftar_post) >= 3 ? 2 : count($daftar_post) - 1; ?>
          <?php for ($i = 0; $i <= $batas; $i++) : ?>
            <!-- Start Right Blog-->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="/post/<?= $daftar_post[$i]['slug']; ?>">
                    <img src="<?= base_url(); ?>/assets/img/beranda/post/berita/<?= $daftar_post[$i]['sampul']; ?>" />
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="comments-type">
                    <i class="bi bi-person"></i>
                    <a>Admin</a>
                  </span>
                  <span class="date-type">
                    <i class="bi bi-calendar"></i><?= $daftar_post[$i]['updated_at']; ?>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="/post/<?= $daftar_post[$i]['slug']; ?>"><?= $daftar_post[$i]['judul']; ?></a>
                  </h4>
                  <?= substr($daftar_post[$i]['isi'], 0, 200) . '...'; ?>
                </div>
                <span>
                  <a href="/post/<?= $daftar_post[$i]['slug']; ?>" class="ready-btn">Selengkapnya</a>
                </span>
                <?php if ($i == $batas) : ?>
                  <div class="overlay-blog overlayFade">
                    <center>
                      <div class="project-dec">
                        <a href="/berita">
                          <br><br><br>
                          <h4>Lihat Kabar Lainnya</h4>
                          <h1><i class="bi bi-arrow-right-circle"></i></h1>
                        </a>
                      </div>
                    </center>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <!-- End Right Blog-->
          <?php endfor; ?>
        </div>
      </div>
    </div>
  </div><!-- End Blog Section -->

  <!-- ======= Layanan Section ======= -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Nikmati Kemudahan Layanan Desa Berbasis Daring!</h3>
            <a class="sus-btn" href="">Daftar Layanan</a>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Layanan Section -->

  <!-- ======= Contact Section ======= -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Kontak</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="bi bi-phone"></i>
                <p>
                  Telepon: <?= $kontak[0]['nomor_telepon']; ?><br>
                  <span><?= $kontak[0]['jam_kerja'] ?></span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="bi bi-envelope"></i>
                <p>
                  Email: <?= $kontak[0]['email']; ?><br>
                  <span>Web: <?= $kontak[0]['web']; ?></span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="bi bi-geo-alt"></i>
                <p>
                  Lokasi: <?= $kontak[0]['alamat']; ?><br>
                  <span><?= $kontak[0]['provinsi']; ?></span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>
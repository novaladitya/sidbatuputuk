<?= $this->extend('profil/layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

  <!-- ======= Blog Header ======= -->
  <?php
  switch ($halaman) {
    case 'profil_desa':
      $title = "Profil Desa";
      break;
    case 'lembaga_masyarakat':
      $title = "Lembaga Masyarakat";
      break;
    case 'berita':
      $title = "Berita Desa";
      break;
    case 'blog':
      $title = "Blog Desa";
  }
  ?>
  <div class="header-bg page-area" style="background-image: url(assets/img/beranda/belanja/berita.svg)">
    <div class="container position-relative">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2">
                <h1 class="title2"><?= $title; ?></h1>
              </div>
              <div class="layer3">
                <h2 class="title3">Desa Batu Putuk</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Blog Header -->

  <!-- ======= Blog Page ======= -->
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row">
        <!-- Start single blog -->
        <div class="col-md-9 col-sm-9 col-xs-12">
          <div class="row">
            <?php foreach ($daftar_post as $p) : ?>
              <!-- Start Post Blog -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog">
                  <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-5">
                      <div class="single-blog-img">
                        <a href="/post/<?= $p['slug']; ?>">
                          <?php switch ($p['kategori']):
                            case "Profil Desa": ?>
                              <img src="<?= base_url(); ?>/assets/img/beranda/post/profil/<?= $p['sampul']; ?>" />
                              <?php break ?>
                            <?php
                            case 'Lembaga Masyarakat': ?>
                              <img src="<?= base_url(); ?>/assets/img/beranda/post/lembagamasyarakat/<?= $p['sampul']; ?>" />
                              <?php break ?>
                            <?php
                            case 'Berita': ?>
                              <img src="<?= base_url(); ?>/assets/img/beranda/post/berita/<?= $p['sampul']; ?>" />
                          <?php endswitch ?>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                      <div class="blog-meta">
                        <span class="date-type">
                          <i class="bi bi-calendar"></i><?= $p['updated_at']; ?>
                        </span>
                      </div>
                      <div class="blog-text">
                        <h4>
                          <a href="/post/<?= $p['slug']; ?>"><?= $p['judul']; ?></a>
                        </h4>
                        <?= substr($p['isi'], 0, 100) . '...'; ?>
                      </div>
                      <span>
                        <a href="/post/<?= $p['slug']; ?>" class="ready-btn">Selengkapnya</a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Post blog -->
            <?php endforeach; ?>

            <!-- <div class="blog-pagination">
              <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link">&lt;</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">&gt;</a></li>
              </ul>
            </div> -->
          </div>
        </div>

        <!-- Start Right Blog -->
        <div class="col-lg-3 col-md-3 pt-5">
          <div class="page-head-blog">
            <div class="single-blog-page">
              <div class="left-blog">
                <h4>Kategori</h4>
                <ul>
                  <li>
                    <a class="<?= $halaman == 'profil_desa' ? 'active' : '' ?>" href="/profil-desa">Profil Desa</a>
                  </li>
                  <li>
                    <a class="<?= $halaman == 'lembaga_masyarakat' ? 'active' : '' ?>" href="/lembaga-masyarakat">Lembaga Masyarakat dan Tempat Wisata</a>
                  </li>
                  <li>
                    <a class="<?= $halaman == 'berita' ? 'active' : '' ?>" href="/berita">Berita Desa</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End Right Blog -->
      </div>
    </div>
  </div><!-- End Blog Page -->

</main><!-- End #main -->
<?= $this->endSection(); ?>
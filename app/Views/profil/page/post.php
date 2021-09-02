<?= $this->extend('profil/layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">
  <!-- ======= Blog Header ======= -->
  <div class="header-bg page-area">
    <div class="container position-relative">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2">
                <h1 class="title2">Desaku Desamu</h1>
              </div>
              <div class="layer3">
                <h2 class="title3"><?= $post->kategori; ?></h2>
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
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- single-blog start -->
              <article class="blog-post-wrapper">
                <div class="post-thumbnail">
                  <?php switch ($post->kategori):
                    case "Profil Desa": ?>
                      <img src="<?= base_url(); ?>/assets/img/beranda/post/profil/<?= $post->sampul; ?>" />
                      <?php break ?>
                    <?php
                    case 'Lembaga Masyarakat': ?>
                      <img src="<?= base_url(); ?>/assets/img/beranda/post/lembagamasyarakat/<?= $post->sampul; ?>" />
                      <?php break ?>
                    <?php
                    case 'Berita': ?>
                      <img src="<?= base_url(); ?>/assets/img/beranda/post/berita/<?= $post->sampul; ?>" />
                  <?php endswitch ?>
                </div>
                <div class="post-information">
                  <h2><?= $post->judul; ?></h2>
                  <div class="entry-meta">
                    <span class="author-meta"><i class="bi bi-person"></i>Admin</span>
                    <span><i class="bi bi-clock"></i><?= $post->updated_at; ?></span>
                    <span>
                      <i class="bi bi-tags"></i>
                      <a><?= $post->kategori; ?></a>
                    </span>
                  </div>
                  <div class="entry-content">
                    <p><?= $post->isi; ?></p>
                  </div>
                </div>
              </article>
              <div class="clear"></div>
              <!-- single-blog end -->
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4">
          <div class="page-head-blog">
            <div class="single-blog-page">
              <!-- recent start -->
              <div class="left-blog">
                <h4><?= $post->kategori; ?> Lainnya</h4>
                <div class="recent-post">
                  <?php for ($i = 0; $i < (count($daftar_post) >= 4 ? 4 : count($daftar_post)); $i++) : ?>
                    <!-- start single post -->
                    <div class="recent-single-post">
                      <div class="post-img">
                        <a href="/post/<?= $daftar_post[$i]['slug']; ?>">
                          <?php switch ($daftar_post[$i]['kategori']):
                            case "Profil Desa": ?>
                              <img src="<?= base_url(); ?>/assets/img/beranda/post/profil/<?= $daftar_post[$i]['sampul']; ?>" />
                              <?php break ?>
                            <?php
                            case 'Lembaga Masyarakat': ?>
                              <img src="<?= base_url(); ?>/assets/img/beranda/post/lembagamasyarakat/<?= $daftar_post[$i]['sampul']; ?>" />
                              <?php break ?>
                            <?php
                            case 'Berita': ?>
                              <img src="<?= base_url(); ?>/assets/img/beranda/post/berita/<?= $daftar_post[$i]['sampul']; ?>" />
                          <?php endswitch ?>
                        </a>
                      </div>
                      <div class="pst-content">
                        <p><a href="/post/<?= $daftar_post[$i]['slug']; ?>"><?= $daftar_post[$i]['judul']; ?></a></p>
                      </div>
                    </div>
                    <!-- End single post -->
                  <?php endfor; ?>
                </div>
              </div>
              <!-- recent end -->
            </div>
            <div class="single-blog-page">
              <div class="left-blog">
                <h4>Kategori</h4>
                <ul>
                  <li>
                    <a href="/profil-desa">Profil Desa</a>
                  </li>
                  <li>
                    <a href="/lembaga-masyarakat">Lembaga Masyarakat</a>
                  </li>
                  <li>
                    <a href="/berita">Berita Desa</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End left sidebar -->

      </div>
    </div>
  </div><!-- End Blog Page -->

</main><!-- End #main -->
<?= $this->endSection(); ?>
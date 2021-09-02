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
                                <h1 class="title2">Galeri dan Produk Desa</h1>
                            </div>
                            <div class="layer3">
                                <h2 class="title3">Desaku Desamu</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Blog Header -->


    <!-- ======= Produk Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row wesome-project-1 fix">
                <!-- Start Produk -page -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-barang">Barang</li>
                        <li data-filter=".filter-makanan">Makanan</li>
                        <li data-filter=".filter-tanaman">Tanaman</li>
                    </ul>
                </div>
            </div>

            <?php
            $data = [
                "gambar"  => "/assets/img/portfolio/1.jpg",
                "nama"    => "Alat Tulis",
                "penjual" => "Ibu Suyatri",
            ]
            ?>

            <div class="row awesome-project-content portfolio-container">
                <?php foreach ($produk as $p) : ?>
                    <!-- produk-item start -->
                    <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-barang">
                        <div class="single-awesome-project">
                            <div class="awesome-img">
                                <a><img src="<?= base_url() ?>/assets/img/beranda/belanja/<?= $p['gambar']; ?>" /></a>
                                <div class="add-actions text-center">
                                    <div class="project-dec">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#produkModal" data-bs-gambar="<?= $p['gambar'] ?>" data-bs-nama="<?= $p['nama'] ?>" data-bs-penjual="<?= $p['penjual'] ?>" data-bs-notelepon="<?= $p['notelepon'] ?>" data-bs-deskripsi='<?= $p['deskripsi'] ?>'>
                                            <h4><?= $p['nama']; ?></h4>
                                            <span><?= $p['penjual']; ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- produk-item end -->
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- End Produk Section -->

    <!-- ======= Daftar Section ======= -->
    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="suscribe-text text-center">
                        <h3>Ingin Berjualan di sini juga?</h3>
                        <a class="sus-btn" href="">Daftar Dagangan</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Daftar Section -->

    <!-- Modal -->
    <div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title w-100 text-center">Detail Produk</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img src="" id="gambar" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h4><b id="nama"></b></h4>
                            <span id="penjual"></span>
                            <br><br>
                            <div id="deskripsi"></div>
                            <br>
                            <div class="row align-items-center justify-content-center">
                                <div class="col-auto">
                                    <a href="" class="ready-btn" id="buttonWhatsapp"><i class="bi bi-whatsapp"></i>&nbsp; Hubungi</a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-telephone-fill"></i>&nbsp;&nbsp;<span id="notelepon"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


</main><!-- End #main -->
<script type="text/javascript">
    var produkModal = document.getElementById('produkModal')
    produkModal.addEventListener('show.bs.modal', function(event) {
        var a = event.relatedTarget

        var dataGambar = a.getAttribute('data-bs-gambar')
        var dataNama = a.getAttribute('data-bs-nama')
        var dataPenjual = a.getAttribute('data-bs-penjual')
        var dataDeskripsi = a.getAttribute('data-bs-deskripsi')
        var dataNotelepon = a.getAttribute('data-bs-notelepon')

        var modalBodyImage = produkModal.querySelector('#gambar')
        modalBodyImage.src = '<?= base_url() ?>/assets/img/beranda/belanja/' + dataGambar

        var modalBodyNama = produkModal.querySelector('#nama')
        modalBodyNama.textContent = dataNama

        var modalBodyPenjual = produkModal.querySelector('#penjual')
        modalBodyPenjual.textContent = 'Oleh ' + dataPenjual

        var modalBodyDeskripsi = produkModal.querySelector('#deskripsi')
        modalBodyDeskripsi.innerHTML = dataDeskripsi

        var modalBodyNotelepon = produkModal.querySelector('#notelepon')
        modalBodyNotelepon.textContent = dataNotelepon

        var buttonWhatsapp = produkModal.querySelector('#buttonWhatsapp')
        buttonWhatsapp.setAttribute('href', 'https://wa.me/62' + dataNotelepon.substring(1) +'?text=Saya%20tertarik%20dengan%20produknya%20' + dataPenjual + '%20yang%20dijual');
    })
</script>
<?= $this->endSection(); ?>
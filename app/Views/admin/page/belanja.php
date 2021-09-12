<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Konten: Belanja Produk Desa</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 col-md-3 mb-4 d-flex justify-content-center">
                <a type="button" class="card text-white bg-primary" href="#form" style="width: 100%">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="row text-center">
                            <div class="col-12 col-sm-12 col-md-12">
                                <i class="fas fa-plus-square fa-4x"></i>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <h3>Tambah Produk Desa</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php foreach ($produk as $p) : ?>
                <div class="col-12 col-md-3 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url() ?>/assets/img/beranda/belanja/<?= $p['gambar']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p['nama']; ?></h5>
                            <p class="card-text">Oleh <?= $p['penjual']; ?></p>
                            <div class="d-flex justify-content-end">
                                <a type="button" class="fas fa-pencil-alt fa-2x greyiconcolor" href="<?= base_url(); ?>/admin/edit-belanja/<?= $p['id']; ?>#form"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a type="button" class="fas fa-trash fa-2x rediconcolor" data-bs-toggle="modal" data-bs-target="#modal-sm" data-bs-id="<?= $p['id']; ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ======= ModalDelete ======= -->
        <div class="modal fade" id="modal-sm">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin menghapus Produk Desa?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                        <a type="button" class="btn btn-danger" id="btnDelete" href="#">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======= /ModalDelete ======== -->
    </div>
</section>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= isset($detailProduk) ? 'Edit Produk Desa' : 'Tambah Produk Desa'; ?></h1>
            </div>
        </div>
    </div>
</section>

<?php
session()->getFlashdata('error') ? $error = session()->getFlashdata('error') : null;
?>
<section class="content">
    <div class="container-fluid">
        <!-- ======= Tambah Post Berita Desa ======= -->
        <?php if (!isset($detailProduk)) : ?>
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Isi Data Produk Desa di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('AdminPage/insertProduk')); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="input-gambar">Gambar Produk</label>
                        <div class="input-group flex-wrap col-12 col-sm-12 col-lg-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= isset($error['gambar']) && $error['gambar'] !== '' ? 'is-invalid' : ''; ?>" id="input-gambar" name="gambar">
                                <label class="custom-file-label" for="input-gambar">Pilih Gambar Produk...</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['gambar'] : null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="input-nama">Nama Produk</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['nama']) && $error['nama'] !== ''  ? 'is-invalid' : ''; ?>" id="input-nama" placeholder="Tulis Nama Produk" value="<?= old('nama') ? old('nama') : ''; ?>" name="nama">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['nama'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="input-penjual">Nama Penjual</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['penjual']) && $error['penjual'] !== ''  ? 'is-invalid' : ''; ?>" id="input-penjual" placeholder="Tulis Nama Penjual" value="<?= old('penjual') ? old('penjual') : ''; ?>" name="penjual">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['penjual'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="input-notelepon">Nomor Telepon Penjual</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['notelepon']) && $error['notelepon'] !== ''  ? 'is-invalid' : ''; ?>" id="input-notelepon" placeholder="Tulis Nomor Telepon Penjual" value="<?= old('notelepon') ? old('notelepon') : ''; ?>" name="notelepon">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['notelepon'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="kategori">Kategori Produk</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="kategori" name="kategori">
                                    <option value="barang" selected>Pilih Kategori...</option>
                                    <option value="barang">Barang</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="tanaman">Tanaman</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textarea">Deskripsi Produk</label>
                        <textarea id="textarea" class="form-control" name="deskripsi"><?= old('deskripsi') ? old('deskripsi') : ''; ?></textarea>
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['deskripsi'] : null; ?>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        <?php endif; ?>
        <!-- ======= /Tambah Post Berita Desa ======= -->

        <!-- ======= Edit Post Berita Desa -->
        <?php if (isset($detailProduk)) : ?>
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Isi Data Produk Desa di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('AdminPage/updateProduk')); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= base_url() ?>/assets/img/beranda/belanja/<?= $detailProduk->gambar; ?>" class="gambar-tabel">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="input-gambar">Gambar Produk</label>
                            <div class="input-group flex-wrap col-12 col-sm-12 col-lg-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= isset($error['gambar']) && $error['gambar'] !== '' ? 'is-invalid' : ''; ?>" id="input-gambar" name="gambar">
                                    <label class="custom-file-label" for="input-gambar">Ubah Gambar Produk...</label>
                                </div>
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['gambar'] : null; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="input-nama">Nama Produk</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['nama']) && $error['nama'] !== ''  ? 'is-invalid' : ''; ?>" id="input-nama" placeholder="Ubah Nama Produk" value="<?= old('nama') ? old('nama') : $detailProduk->nama; ?>" name="nama">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['nama'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="input-penjual">Nama Penjual</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['penjual']) && $error['penjual'] !== ''  ? 'is-invalid' : ''; ?>" id="input-penjual" placeholder="Ubah Nama Penjual" value="<?= old('penjual') ? old('penjual') : $detailProduk->penjual; ?>" name="penjual">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['penjual'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="input-notelepon">Nomor Telepon Penjual</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['notelepon']) && $error['notelepon'] !== ''  ? 'is-invalid' : ''; ?>" id="input-notelepon" placeholder="Ubah Nomor Telepon Penjual" value="<?= old('notelepon') ? old('notelepon') : $detailProduk->notelepon; ?>" name="notelepon">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['notelepon'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="kategori">Kategori Produk</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="kategori" name="kategori">
                                    <option value="barang">Pilih Kategori...</option>
                                    <option value="barang" <?= $detailProduk->kategori == 'barang' ? 'selected' : ''; ?>>Barang</option>
                                    <option value="makanan" <?= $detailProduk->kategori == 'makanan' ? 'selected' : ''; ?>>Makanan</option>
                                    <option value="tanaman" <?= $detailProduk->kategori == 'tanaman' ? 'selected' : ''; ?>>Tanaman</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textarea">Deskripsi Produk</label>
                        <textarea id="textarea" class="form-control" name="deskripsi"><?= old('deskripsi') ? old('deskripsi') : $detailProduk->deskripsi; ?></textarea>
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['deskripsi'] : null; ?>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?= $detailProduk->id; ?>">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        <?php endif; ?>
        <!-- ======= /Edit Post Lembaga Masyarakat ======= -->
    </div>
</section>
<!-- ======= /MainContent ======= -->

<script type="text/javascript">
    var deleteModal = document.getElementById('modal-sm');
    var buttonDelete = document.querySelector('#btnDelete');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        var a = event.relatedTarget;
        var id = a.getAttribute('data-bs-id');

        var link = '<?= base_url() ?>/AdminPage/deleteProduk/' + id;
        buttonDelete.setAttribute('href', link);
    })
</script>
<?= $this->endSection(); ?>
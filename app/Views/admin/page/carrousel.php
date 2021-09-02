<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Konten: Carrousel</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent ======= -->
<section class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <!-- ======= DaftarCarrousel ======= -->
        <div class="row">
            <?php foreach ($carrousel as $c) : ?>
                <div class="col-12 col-md-6">
                    <div class="card bg-dark text-white">
                        <img src="<?= base_url() ?>/assets/img/beranda/carrousel/<?= $c['gambar']; ?>" alt="<?= $c['gambar']; ?>" class="card-img" style="filter: brightness(40%); height: 320px">
                        <div class="card-img-overlay d-flex">
                            <div class="align-self-center mx-auto">
                                <div class="row">
                                    <div class="col-12 col-md-12 d-flex">
                                        <h5 class="mx-auto"><?= $c['judul']; ?></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 d-flex">
                                        <div class="mx-auto">
                                            <a type="button" class="fas fa-pencil-alt fa-2x greyiconcolor" href="<?= base_url(); ?>/admin/edit-carrousel/<?= $c['id']; ?>#form"></a> &nbsp;&nbsp;&nbsp;
                                            <a type="button" class="fas fa-trash fa-2x rediconcolor" data-bs-toggle="modal" data-bs-target="#modal-sm" data-bs-id="<?= $c['id']; ?>"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- ======= /DaftarCarrousel ======= -->

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
                            <p>Yakin menghapus Carrousel?</p>
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

<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= isset($detailCarrousel) ? 'Edit Carrousel' : 'Tambah Carrousel'; ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<?php
session()->getFlashdata('error') ? $error = session()->getFlashdata('error') : null;
?>
<section class="content">
    <div class="container-fluid">
        <?php if (!isset($detailCarrousel)) : ?>
            <!-- ======= TambahCarrousel ======= -->
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Isi Data Carrousel di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('adminpage/insertcarrousel')); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="input-gambar">Gambar Carrousel</label>
                        <div class="input-group flex-wrap col-12 col-sm-12 col-lg-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= isset($error['gambar']) && $error['gambar'] !== '' ? 'is-invalid' : ''; ?>" id="input-gambar" name="gambar">
                                <label class="custom-file-label" for="input-gambar">Pilih Gambar...</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['gambar'] : null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input-judul">Judul Carrousel</label>
                        <div class="input-group flex-wrap">
                            <input type="text" class="form-control <?= isset($error['judul']) && $error['judul'] !== ''  ? 'is-invalid' : ''; ?>" id="input-judul" placeholder="Judul Carrousel" value="<?= old('judul') ? old('judul') : ''; ?>" name="judul">
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['judul'] : null; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- ======= /TambahCarrousel ======= -->
        <?php endif; ?>

        <?php if (isset($detailCarrousel)) : ?>
            <!-- ======= EditCarrousel ======= -->
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Ubah Data Carrousel di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('adminpage/updatecarrousel')); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= base_url() ?>/assets/img/beranda/carrousel/<?= $detailCarrousel->gambar; ?>" alt="<?= $detailCarrousel->gambar; ?>" class="gambar-tabel">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="input-gambar">Ubah Gambar Carrousel</label>
                            <div class="input-group flex-wrap">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= isset($error['gambar']) && $error['gambar'] !== '' ? 'is-invalid' : ''; ?>" id="input-gambar" name="gambar">
                                    <label class="custom-file-label" for="input-gambar">Ubah Gambar...</label>
                                </div>
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['gambar'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"><br></div>
                        <div class="form-group col-md-12">
                            <label for="input-judul">Ubah Judul Carrousel</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['judul']) && $error['judul'] !== ''  ? 'is-invalid' : ''; ?>" id="input-judul" placeholder="Judul Carrousel" value="<?= old('judul') ? old('judul') : $detailCarrousel->judul; ?>" name="judul">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['judul'] : null; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?= $detailCarrousel->id; ?>">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- ======= /EditCarrousel ======= -->
        <?php endif; ?>

    </div>
</section>
<!-- ======= /MainContent ======= -->

<script type="text/javascript">
    var deleteModal = document.getElementById('modal-sm');
    var buttonDelete = document.querySelector('#btnDelete');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        var a = event.relatedTarget;
        var id = a.getAttribute('data-bs-id');

        var link = '<?= base_url() ?>/adminpage/deletecarrousel/' + id;
        buttonDelete.setAttribute('href', link);
    })
</script>
<?= $this->endSection(); ?>
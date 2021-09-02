<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Konten: Sambutan</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent ======= -->
<!-- ======= DaftarSambutan ======= -->
<section class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 d-flex justify-content-center">
                <a type="button" class="card text-white bg-primary" href="#form" style="width: 100%">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="row text-center">
                            <div class="col-12 col-sm-12 col-md-12">
                                <i class="fas fa-plus-square fa-4x"></i>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <h3>Tambah Sambutan</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php foreach ($sambutan as $s) : ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-img-top text-center mt-3">
                            <img src="<?= base_url(); ?>/assets/img/beranda/sambutan/<?= $s['foto']; ?>" style="width: 150px; height: 150px">
                        </div>
                        <div class="card-body text-center">
                            <h5><?= $s['nama']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $s['jabatan']; ?></h6>
                            <p class="card-text"><?= $s['pesan']; ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a type="button" class="fas fa-pencil-alt fa-2x blackiconcolor" href="<?= base_url(); ?>/admin/edit-sambutan/<?= $s['id']; ?>#form"></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a type="button" class="fas fa-trash-alt fa-2x rediconcolor" data-bs-toggle="modal" data-bs-target="#modal-sm" data-bs-id="<?= $s['id']; ?>"></a>
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
                        <p>Yakin menghapus Sambutan?</p>
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
<!-- ======= /DaftarSambutan ======= -->

<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= isset($detailSambutan) ? 'Edit Sambutan' : 'Tambah Sambutan'; ?></h1>
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
        <?php if (!isset($detailSambutan)) : ?>
            <!-- ======= TambahCarrousel ======= -->
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Isi Data Sambutan di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('adminpage/insertsambutan')); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="input-gambar">Foto</label>
                        <div class="input-group flex-wrap col-12 col-sm-12 col-lg-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= isset($error['foto']) && $error['foto'] !== '' ? 'is-invalid' : ''; ?>" id="input-foto" name="foto">
                                <label class="custom-file-label" for="input-foto">Pilih Foto...</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['foto'] : null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="input-judul">Nama</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['nama']) && $error['nama'] !== ''  ? 'is-invalid' : ''; ?>" id="input-nama" placeholder="Nama Lengkap" value="<?= old('nama') ? old('nama') : ''; ?>" name="nama">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['nama'] : null; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="input-judul">Jabatan</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['jabatan']) && $error['jabatan'] !== ''  ? 'is-invalid' : ''; ?>" id="input-jabatan" placeholder="Jabatan" value="<?= old('jabatan') ? old('jabatan') : ''; ?>" name="jabatan">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['jabatan'] : null; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input-judul">Pesan</label>
                        <div class="input-group flex-wrap">
                            <input type="text" class="form-control <?= isset($error['pesan']) && $error['pesan'] !== ''  ? 'is-invalid' : ''; ?>" id="input-pesan" placeholder="Pesan Sambutan" value="<?= old('pesan') ? old('pesan') : ''; ?>" name="pesan">
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['pesan'] : null; ?>
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

        <?php if (isset($detailSambutan)) : ?>
            <!-- ======= EditCarrousel ======= -->
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Ubah Data Sambutan di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('adminpage/updatesambutan')); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= base_url() ?>/assets/img/beranda/sambutan/<?= $detailSambutan->foto; ?>" alt="<?= $detailSambutan->foto; ?>" class="gambar-tabel">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="input-gambar">Ubah Foto</label>
                            <div class="input-group flex-wrap">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= isset($error['foto']) && $error['foto'] !== '' ? 'is-invalid' : ''; ?>" id="input-foto" name="foto">
                                    <label class="custom-file-label" for="input-foto">Ubah Foto...</label>
                                </div>
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['foto'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"><br></div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="input-judul">Ubah Nama</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['nama']) && $error['nama'] !== ''  ? 'is-invalid' : ''; ?>" id="input-nama" placeholder="Ubah Nama Lengkap" value="<?= old('nama') ? old('nama') : $detailSambutan->nama; ?>" name="nama">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['nama'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-6">
                            <label for="input-judul">Ubah Jabatan</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['jabatan']) && $error['jabatan'] !== ''  ? 'is-invalid' : ''; ?>" id="input-jabatan" placeholder="Ubah Jabatan" value="<?= old('jabatan') ? old('jabatan') : $detailSambutan->jabatan; ?>" name="jabatan">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['jabatan'] : null; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-12 col-sm-12 col-lg-12">
                            <label for="input-judul">Ubah Pesan Sambutan</label>
                            <div class="input-group flex-wrap">
                                <input type="text" class="form-control <?= isset($error['pesan']) && $error['pesan'] !== ''  ? 'is-invalid' : ''; ?>" id="input-pesan" placeholder="Ubah Pesan Sambutan" value="<?= old('pesan') ? old('pesan') : $detailSambutan->pesan; ?>" name="pesan">
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['pesan'] : null; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?= $detailSambutan->id; ?>">
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

        var link = '<?= base_url() ?>/adminpage/deletesambutan/' + id;
        buttonDelete.setAttribute('href', link);
    })
</script>
<?= $this->endSection(); ?>
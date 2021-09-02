<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Konten: Berita Desa</h1>
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
            <div class="col-12 col-md-6 mb-4">
                <a type="button" class="card text-white bg-primary" href="#form" style="width: 100%">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="row text-center">
                            <div class="col-12 col-sm-12 col-md-12">
                                <i class="fas fa-plus-square fa-4x"></i>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <h3>Tambah Post Berita Desa</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php foreach ($post as $p) : ?>
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <img src="<?= base_url() ?>/assets/img/beranda/post/berita/<?= $p['sampul']; ?>" class="gambar-tabel">
                        </div>
                        <div class="col-12 col-md-7 d-flex">
                            <div class="align-self-center">
                                <div class="col-md-12">
                                    <h5><?= $p['judul']; ?></h5>
                                </div>
                                <div class="col-md-12">
                                    <p><?= $p['updated_at']; ?></p>
                                </div>
                                <div class="col-md-12 d-flex">
                                    <div class="mx-auto">
                                        <a type="button" class="fas fa-pencil-alt fa-2x greyiconcolor" href="<?= base_url(); ?>/admin/edit-berita/<?= $p['slug']; ?>#form"></a> &nbsp;&nbsp;&nbsp;
                                        <a type="button" class="fas fa-trash fa-2x rediconcolor" data-bs-toggle="modal" data-bs-target="#modal-sm" data-bs-id="<?= $p['slug']; ?>"></a>
                                    </div>
                                </div>
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
                        <p>Yakin menghapus Post Berita?</p>
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
                <h1><?= isset($detailPost) ? 'Edit Post Berita Desa' : 'Tambah Post Berita Desa'; ?></h1>
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
        <?php if (!isset($detailPost)) : ?>
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Isi Post Berita Desa di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('adminpage/insertberita')); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="input-simpul">Gambar Sampul Post</label>
                        <div class="input-group flex-wrap col-12 col-sm-12 col-lg-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= isset($error['sampul']) && $error['sampul'] !== '' ? 'is-invalid' : ''; ?>" id="input-sampul" name="sampul">
                                <label class="custom-file-label" for="input-sampul">Pilih Gambar Sampul...</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['sampul'] : null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="input-judul">Judul Post</label>
                        <div class="input-group flex-wrap">
                            <input type="text" class="form-control <?= isset($error['judul']) && $error['judul'] !== ''  ? 'is-invalid' : ''; ?>" id="input-judul" placeholder="Tulis Judul Post" value="<?= old('judul') ? old('judul') : ''; ?>" name="judul">
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['judul'] : null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textarea">Isi Post</label>
                        <textarea id="textarea" class="form-control" name="isi"><?= old('isi') ? old('isi') : ''; ?></textarea>
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['isi'] : null; ?>
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
        <?php if (isset($detailPost)) : ?>
            <div class="card card-<?= isset($error) ? 'danger' : 'primary'; ?>" id="form">
                <div class="card-header">
                    <h3 class="card-title"><?= isset($error) ? $error['header'] : 'Isi Post Berita Desa di Bawah'; ?></h3>
                </div>

                <?= form_open_multipart(base_url('adminpage/updateberita')); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= base_url() ?>/assets/img/beranda/post/berita/<?= $detailPost->sampul; ?>" class="gambar-tabel">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="input-simpul">Ubah Gambar Sampul Post</label>
                            <div class="input-group flex-wrap col-12 col-sm-12 col-lg-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= isset($error['sampul']) && $error['sampul'] !== '' ? 'is-invalid' : ''; ?>" id="input-sampul" name="sampul">
                                    <label class="custom-file-label" for="input-sampul">Pilih Gambar Sampul...</label>
                                </div>
                                <div class="invalid-feedback d-block">
                                    <?= isset($error) ? $error['sampul'] : null; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="input-judul">Ubah Judul Post</label>
                        <div class="input-group flex-wrap">
                            <input type="text" class="form-control <?= isset($error['judul']) && $error['judul'] !== ''  ? 'is-invalid' : ''; ?>" id="input-judul" placeholder="Tulis Judul Post" value="<?= old('judul') ? old('judul') : $detailPost->judul; ?>" name="judul">
                            <div class="invalid-feedback d-block">
                                <?= isset($error) ? $error['judul'] : null; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textarea">Ubah Isi Post</label>
                        <textarea id="textarea" class="form-control" name="isi"><?= old('isi') ? old('isi') : $detailPost->isi; ?></textarea>
                        <div class="invalid-feedback d-block">
                            <?= isset($error) ? $error['isi'] : null; ?>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?= $detailPost->id; ?>">
                <input type="hidden" name="slug" value="<?= $detailPost->slug; ?>">
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

        var link = '<?= base_url() ?>/adminpage/deleteberita/' + id;
        buttonDelete.setAttribute('href', link);
    })
</script>
<?= $this->endSection(); ?>
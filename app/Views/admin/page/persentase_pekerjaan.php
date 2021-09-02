<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Konten: Persentase Pekerjaan</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card card-<?= session()->getFlashdata('success') ? 'success' : 'primary'; ?>" id="form">
                    <div class="card-header">
                        <h3 class="card-title"><?= session()->getFlashdata('success') ? session()->getFlashdata('success') : 'Isi Data Pekerjaan di Bawah'; ?></h3>
                    </div>

                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-1 col-sm-1 col-md-1">
                                <h5>#</h5>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6">
                                <h5>Pekerjaan</h5>
                            </div>
                            <div class="col-5 col-sm-5 col-md-5">
                                <h5>Persentase</h5>
                            </div>
                        </div>

                        <form action="/adminpage/updatepersentasepekerjaan">
                            <?php $i = 1; ?>
                            <?php foreach ($pekerjaan as $p) : ?>
                                <div class="row">
                                    <div class="col-1 col-sm-1 col-md-1 text-center">
                                        <h5><?= $i++; ?></h5>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group flex-wrap">
                                                <input type="text" class="form-control" placeholder="Pekerjaan" value="<?= $p['pekerjaan']; ?>" name="pekerjaan[]" pattern="^[a-zA-Z\s]*$" title="Isikan nama pekerjaan dengan benar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-5 col-md-5">
                                        <div class="form-group">
                                            <div class="input-group flex-wrap">
                                                <input type="text" class="form-control" placeholder="Persentase" value="<?= $p['persentase']; ?>" name="persentase[]" pattern="^([1-9]?\d|100)$" title="Isikan dengan angka 0-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>
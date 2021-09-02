<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Header ======= -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Konten: Kontak</h1>
            </div>
        </div>
    </div>
</section>
<!-- ======= /Header ======= -->

<!-- ======= MainContent -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php
                session()->getFlashdata('error') ? $error = session()->getFlashdata('error') : null;
                ?>
                <div class="card card-<?= isset($error) ? 'danger' : (session()->getFlashdata('success') ? 'success' : 'primary'); ?>">
                    <div class="card-header">
                        <h3 class="card-title"><?= isset($error) ? $error['header'] : (session()->getFlashdata('success') ? session()->getFlashdata('success') : 'Isi Data Kontak di Bawah'); ?></h3>
                    </div>

                    <form action="/adminpage/updatekontak">
                        <div class="card-body">
                            <?php foreach ($kontak as $k) : ?>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nomor_telepon">Nomor Telepon</label>
                                            <div class="input-group flex-wrap">
                                                <input type="text" class="form-control <?= isset($error['nomor_telepon']) && $error['nomor_telepon'] !== ''  ? 'is-invalid' : ''; ?>" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="<?= old('nomor_telepon') ? old('nomor_telepon') : $k['nomor_telepon']; ?>">
                                                <div class="invalid-feedback d-block">
                                                    <?= isset($error) ? $error['nomor_telepon'] : null; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="jam_kerja">Jam Kerja</label>
                                            <div class="input-group flex-wrap">
                                                <input type="text" class="form-control <?= isset($error['jam_kerja']) && $error['jam_kerja'] !== ''  ? 'is-invalid' : ''; ?>" id="jam_kerja" name="jam_kerja" placeholder="contoh: Senin - Jumat (07.30 - 15.00)" value="<?= old('jam_kerja') ? old('jam_kerja') : $k['jam_kerja']; ?>">
                                                <div class="invalid-feedback d-block">
                                                    <?= isset($error) ? $error['jam_kerja'] : null; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group flex-wrap">
                                                <input type="text" class="form-control <?= isset($error['email']) && $error['email'] !== ''  ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Masukkan Alamat Email" value="<?= old('email') ? old('email') : $k['email']; ?>">
                                                <div class="invalid-feedback d-block">
                                                    <?= isset($error) ? $error['email'] : null; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="web">Web</label>
                                            <div class="input-group flex-wrap">
                                                <input type="text" class="form-control <?= isset($error['web']) && $error['web'] !== ''  ? 'is-invalid' : ''; ?>" id="web" name="web" placeholder="contoh: www.desakudesamu.id" value="<?= old('web') ? old('web') : $k['web']; ?>">
                                                <div class="invalid-feedback d-block">
                                                    <?= isset($error) ? $error['web'] : null; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <div class="input-gorup flex-wrap">
                                                <input type="text" class="form-control <?= isset($error['alamat']) && $error['alamat'] !== ''  ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="contoh: Jalan Padjajaran Nomor 10" value="<?= old('alamat') ? old('alamat') : $k['alamat']; ?>">
                                                <div class="invalid-feedback d-block">
                                                    <?= isset($error) ? $error['alamat'] : null; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <div class="input-group flex-wrap">
                                                <input type="text" class="form-control <?= isset($error['provinsi']) && $error['provinsi'] !== ''  ? 'is-invalid' : ''; ?>" id="provinsi" name="provinsi" placeholder="contoh: Lampung" value="<?= old('provinsi') ? old('provinsi') : $k['provinsi']; ?>">
                                                <div class="invalid-feedback d-block">
                                                    <?= isset($error) ? $error['provinsi'] : null; ?>
                                                </div>
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
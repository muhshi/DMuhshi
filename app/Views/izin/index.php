<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Izin|BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Form Pengajuan Izin</h1>
        <p>Form untuk mengajukan izin keluar kantor di hari kerja</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form Izin</h3>
            <div class="tile-body col-md-11">
                <?php $errors =  session()->getFlashdata('errors'); ?>

                <form action="<?= base_url('/izin/create'); ?>" method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input class="form-control" type="text" name="fullname" value="<?= user()->fullname; ?>" disabled>
                        <input class="form-control" type="text" name="user_id" value="<?= user()->id; ?>" hidden>
                        <input class="form-control" type="text" name="hari" value="<?= date("Y-m-d"); ?>" hidden>

                    </div>
                    <div class="form-group">
                        <label class="control-label">Keperluan</label>
                        <textarea class="form-control <?= isset($errors['keperluan']) ? 'is-invalid' : null; ?>" rows="4" name="keperluan" placeholder="Isikan keperluan mengajukan perizinan"><?= old('keperluan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= isset($errors['keperluan']) ? $errors['keperluan'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jam Pergi-Kembali</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                Pergi <input class="form-control <?= isset($errors['jam_pergi']) ? 'is-invalid' : null; ?>" value="<?= old('jam_pergi'); ?>" type="time" name="jam_pergi">
                                <div class="invalid-feedback">
                                    <?= isset($errors['jam_pergi']) ? $errors['jam_pergi'] : null; ?>
                                </div>
                            </label>

                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                Kembali <input class="form-control <?= isset($errors['jam_balik']) ? 'is-invalid' : null; ?>" value="<?= old('jam_balik'); ?>" type="time" name="jam_balik">
                                <div class="invalid-feedback">
                                    <?= isset($errors['jam_balik']) ? $errors['jam_balik'] : null; ?>
                                </div>
                            </label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Atas Izin</label>
                        <select class="form-control <?= isset($errors['atas_izin']) ? 'is-invalid' : null; ?>" name="atas_izin">
                            <option value="" hidden></option>
                            <?php foreach ($atasan as $atas) : ?>
                                <option value="<?= $atas->id; ?>" <?= old('atas_izin' == $atas->id) ? 'selected' : null; ?>>
                                    <?= $atas->nama_atasan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($errors['atas_izin']) ? $errors['atas_izin'] : null; ?>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?= base_url(); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
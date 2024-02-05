<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Laporan|BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Laporan Kinerja Harian</h1>
        <p>Form untuk mencatatn kinerja harian pehawai</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Laporan</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="tile">
            <h3 class="tile-title">Lapor</h3>
            <div class="tile-body col-md-11">
                <?php $errors =  session()->getFlashdata('errors'); ?>

                <form action="<?= base_url('/laporan/create'); ?>" method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="fullname">Nama</label>
                        <input class="form-control" type="text" id="fullname" name="fullname" value="<?= user()->fullname; ?>" disabled>
                        <input class="form-control" type="text" name="user_id" value="<?= user()->id; ?>" hidden>

                    </div>
                    <div class="form-group">
                        <label for="inputDate" id="tanggal">Tanggal</label>
                        <input class="form-control <?= isset($errors['tanggal']) ? 'is-invalid' : null; ?>" id="inputDate" type="text" name="tanggal" placeholder="Select Date" value="<?= date("Y-m-d"); ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['tanggal']) ? $errors['tanggal'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Pekerjaan</label>
                        <textarea class="form-control <?= isset($errors['pekerjaan']) ? 'is-invalid' : null; ?>" rows="4" name="pekerjaan" placeholder="Isikan Pekerjaan yang dilakukan hari ini"><?= old('pekerjaan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= isset($errors['pekerjaan']) ? $errors['pekerjaan'] : null; ?>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?= base_url(); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="col-md-8">
        <div class="tile">
            <h3 class="tile-title">Laporan Kinerja Harian</h3>
            <div class="tile-body col-md-12">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa-check"></i> Success!</h5>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Pekerjaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            <?php foreach ($laporan as $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->fullname; ?></td>
                                    <td><?= $value->tanggal; ?></td>
                                    <td><?= $value->pekerjaan; ?></td>
                                    <td>
                                        <form action="<?= base_url('laporan/delete/' . $value->id); ?>" method="post" class="d-inline" onsubmit=" return confirm('Yakin Hapus data?')">
                                            <?= csrf_field(); ?>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="tile-footer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
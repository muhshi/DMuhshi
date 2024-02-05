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
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Tambah Atasan</h3>
            <div class="tile-body col-md-11">
                <?php $errors =  session()->getFlashdata('errors'); ?>

                <form action="<?= base_url('/admin/up_atasan'); ?>" method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label class="control-label">Nama Atasan</label>
                        <input class="form-control" type="text" name="nama_atasan">
                        <div class="invalid-feedback">
                            <?= isset($errors['nama_atasan']) ? $errors['nama_atasan'] : null; ?>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="<?= base_url(); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">List Nama Atasan</h3>
            <div class="tile-body col-md-12">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa-check"></i> Success!</h5>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            <?php foreach ($atasan as $value) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->nama_atasan; ?></td>
                                    <td>
                                        <form action="<?= base_url('admin/delete_atasan/' . $value->id); ?>" method="post" class="d-inline" onsubmit=" return confirm('Yakin Hapus data?')">
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
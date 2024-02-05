<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Admin|BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Rekap Pengajuan Izin</h1>
        <p>Pencatatan rekap pengajuan izin</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Rekap Izin Keluar Kantor</h3>
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
                                <th>Keperluan</th>
                                <th>Tanggal</th>
                                <th>Jam Pergi</th>
                                <th>Jam Kembali</th>
                                <th>Pemberi Izin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($izin as $izin) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $izin->fullname; ?></td>
                                    <td><?= $izin->keperluan; ?></td>
                                    <td><?= $izin->hari; ?></td>
                                    <td> <?= $izin->jam_pergi; ?></td>
                                    <td>
                                        <?= $izin->jam_balik; ?>
                                    </td>
                                    <td> <?= $izin->nama_atasan; ?></td>
                                    <td>
                                        <?php if (in_groups('admin')) : ?>
                                            <a href="<?= base_url('izin/edit/' . $izin->id); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
                                            <form action="<?= base_url('izin/delete/' . $izin->id); ?>" method="post" class="d-inline" onsubmit=" return confirm('Yakin Hapus data?')">
                                                <?= csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        <?php endif; ?>
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
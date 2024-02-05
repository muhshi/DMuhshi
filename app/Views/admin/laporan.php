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

    <div class="col-md-11">
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
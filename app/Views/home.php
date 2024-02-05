<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Home|BPS Kabupaten Demak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Buku Pengunjung PST</h1>
        <p>Pencatatan pengunjung PST BPS Kabupaten Demak</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Vertical Form</h3>
            <div class="tile-body col-md-11">

            </div>
            <div class="tile-footer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
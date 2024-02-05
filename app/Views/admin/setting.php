<?= $this->extend('layout/master') ?>

<?= $this->section('title') ?>
<title>Admin|BPS Kabupaten Demak</title>
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
    <div class="col-md-3">
        <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Pengguna</h4>
                <p><b><?= count_data('users'); ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
                <h4>Atasan</h4>
                <p><b><?= count_data('atasan'); ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
                <h4>Izin Total</h4>
                <p><b><?= count_data('izin'); ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
                <h4>Stars</h4>
                <p><b>500</b></p>
            </div>
        </div>
    </div>
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
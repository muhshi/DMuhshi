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
            <h3 class="tile-title">Profil User</h3>
            <div class="tile-body col-md-12">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('/asset/img/' . user()->user_image); ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= user()->username; ?></h5>
                                <ul class="list-group list-group-flush">
                                    <?php if (user()->fullname) : ?>
                                        <li class="list-group-item"><?= user()->fullname; ?></li>
                                    <?php endif; ?>
                                    <li class="list-group-item"><?= user()->email; ?></li>
                                    <!-- <li class="list-group-item">
                                        <a href="<?= base_url('user/edit/' . user()->id); ?>" class="btn btn-info"> Edit Profil</a>
                                    </li> -->
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tile-footer">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
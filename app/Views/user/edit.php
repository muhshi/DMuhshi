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
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= base_url('user/update/' . $user->id); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input class="form-control" type="text" name="fullname" value="<?= $user->fullname; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input class="form-control" type="text" name="username" value="<?= $user->username; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control <?= isset($errors['email']) ? 'is-invalid' : null; ?>" name="email" type="email" value="<?= old('email', $user->email); ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto Profil</label>
                        <input class="form-control" type="file" name="user_image">
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?= base_url('user'); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
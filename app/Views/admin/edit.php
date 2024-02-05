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

                <form class=" login-form" action="<?= url_to('register') ?>" method="post" style="position: static;">
                    <?= csrf_field() ?>

                    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i><?= lang('Auth.register') ?></h3>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <div class="form-group">
                        <label class="control-label"><?= lang('Fullname') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" name="fullname" value="<?= old('fullname', $users->fullname); ?>" aria-describedby="fullnameHelp" placeholder="<?= lang('Fullname') ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['fullname']) ? $errors['fullname'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= old('email', $users->email); ?>" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                        <div class="invalid-feedback">
                            <?= isset($errors['email']) ? $errors['email'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= lang('Auth.username') ?></label>
                        <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username', $users->username); ?>" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        <div class="invalid-feedback">
                            <?= isset($errors['username']) ? $errors['username'] : null; ?>
                        </div>
                    </div>
                    <div class="form-group btn-container">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in fa-lg fa-fw"></i>Update</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
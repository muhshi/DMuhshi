<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('Public/asset/css/main.css'); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>BPS Demak</h1>
        </div>
        <div class="login-box">

            <form class=" login-form" action="<?= url_to('reset-password') ?>" method="post" style="position: static;">
                <?= csrf_field() ?>

                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i><?= lang('Auth.resetYourPassword') ?></h3>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.token') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.token') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.email') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.newPassword') ?></label>
                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.newPasswordRepeat') ?></label>
                    <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
                    <div class="invalid-feedback">
                        <?= session('errors.pass_confirm') ?>
                    </div>
                </div>

                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i><?= lang('Auth.resetPassword') ?></button>
                </div>

            </form>


        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url('Public/asset/js/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('Public/asset/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('Public/asset/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('Public/asset/js/main.js'); ?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url('Public/asset/js/plugins/pace.min.js'); ?>"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>
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

            <form class=" login-form" action="<?= url_to('register') ?>" method="post" style="position: static;">
                <?= csrf_field() ?>

                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i><?= lang('Auth.register') ?></h3>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="form-group">
                    <label class="control-label"><?= lang('Fullname') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" value="<?= old('fullname'); ?>" aria-describedby="fullnameHelp" placeholder="<?= lang('Fullname') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.fullname') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= old('email'); ?>" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    <div class="invalid-feedback">
                        <?= session('errors.email') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.username') ?></label>
                    <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username'); ?>" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.username') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.repeatPassword') ?></label>
                    <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    <div class="invalid-feedback">
                        <?= session('errors.pass_confirm') ?>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i><?= lang('Auth.register') ?></button>
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <span class="label-text"><?= lang('Auth.alreadyRegistered') ?></span>
                            </label>
                        </div>
                        <a href="<?= url_to('login') ?>"></a>
                        <p class="semibold-text mb-2"><a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                    </div>
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
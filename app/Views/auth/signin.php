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

            <form class="login-form" action="<?= url_to('login') ?>" method="post" style="position: static;">
                <?= csrf_field() ?>

                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i><?= lang('Auth.loginTitle') ?></h3>
                <?= view('Myth\Auth\Views\_message_block') ?>

                <?php if ($config->validFields === ['email']) : ?>
                    <div class="form-group">
                        <label class="control-label" for="login"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="form-group">
                        <label class="control-label" for="login"><?= lang('Auth.emailOrUsername') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label class="control-label" for="password"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>

                
                    <div class="form-group">
                        <div class="utility">
                        <?php if ($config->allowRemembering) : ?>
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>><span class="label-text"><?= lang('Auth.rememberMe') ?></span>
                                </label>
                            </div>
                        <?php endif; ?>
                            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                        </div>
                    </div>
                

                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i><?= lang('Auth.loginAction') ?></button>
                </div>
                <div class="form-group mt-2">
                    <?php if ($config->allowRegistration) : ?>
                        <p class="semibold-text mb-2">Butuh akun baru? <a href="<?= url_to('register') ?>">Register</a></p>
                    <?php endif; ?>
                </div>

            </form>
            <form class="forget-form" action="<?= url_to('forgot') ?>" method="post">
                <?= csrf_field() ?>
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label"><?= lang('Auth.emailAddress') ?></label>
                    <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" type="email" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.email') ?>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i><?= lang('Auth.sendInstructions') ?></button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
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
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>
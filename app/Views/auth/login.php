<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: 100vh;
            /* Full height for the section */
        }

        .form-label {
            margin-top: 10px;
            /* Space above the label */
        }
    </style>
</head>

<body>
    <section class="vh-100 h-custom">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-6 d-none d-md-flex">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="<?= url_to('login') ?>" method="post">
                        <?= csrf_field() ?>
                        <!-- <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div> -->

                        <!-- <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div> -->

                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <!-- Email input -->
                        <?php if ($config->validFields === ['email']): ?>
                            <div class="form-group mb-4">
                                <label class="form-label" for="login"><?= lang('Auth.email') ?></label>
                                <input type="email" id="login" class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" />
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form-group mb-4">
                                <label class="form-label" for="login">Email</label>
                                <input type="email" id="login" class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Input Email" />
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Password input -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" />
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <?php if ($config->allowRemembering): ?>
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" <?php if (old('remember')) : ?> checked <?php endif ?> />
                                    <label class="form-check-label" for="form2Example3">Remember me</label>
                                </div>
                            <?php endif; ?>
                            <?php if ($config->activeResetter): ?>
                                <a href="<?= url_to('forgot') ?>" class="text-body">Forgot password?</a>
                            <?php endif; ?>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"><?= lang('Auth.loginAction') ?></button>
                            <?php if ($config->allowRegistration) : ?>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?= url_to('register') ?>" class="link-danger">Register</a></p>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <div class="text-white mb-3 mb-md-0">Okvy Anggreani</div>
            <div>
                <a href="#!" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                <a href="#!" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="text-white me-4"><i class="fab fa-google"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </section>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            margin-top: 3px;
            /* Space above the label */
        }

        .form-control {
            height: 35px;
            /* Atur tinggi input di sini */
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
                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>
                        <h2 class="text-center mb-4"><?= lang('Auth.register') ?></h2>

                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <!-- Username -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username"><?= lang('Auth.username') ?></label>
                            <input type="text" id="username" class="form-control form-control-lg <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email"><?= lang('Auth.email') ?></label>
                            <input type="email" id="email" class="form-control form-control-lg <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" required />
                        </div>

                        <!-- repeat Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                            <input type="password" id="pass_confirm" name="pass_confirm" class="form-control form-control-lg <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" required />
                        </div>

                        <div class="form-group">
                            <label for="level">Register as</label>
                            <select class="form-control" name="level" id="level">
                                <option value="" disabled selected>Register as</option>
                                <option value="freelancer">Freelancer</option>
                                <option value="company">Company</option>
                            </select>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"><?= lang('Auth.register') ?></button>
                            <p class="small fw-bold mt-2 pt-1 mb-0"><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>" class="link-danger"><?= lang('Auth.signIn') ?></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
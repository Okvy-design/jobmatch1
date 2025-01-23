<!DOCTYPE html>
<html lang="en">

<head>

    <title>JobMatch</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon icon -->
    <!-- <link rel="icon" href="<?= base_url('/assets2/images/favicon.ico'); ?>" type="image/x-icon"> -->
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?= base_url('/assets2/fonts/fontawesome/css/fontawesome-all.min.css'); ?>">
    <!-- animation css -->
    <link rel="stylesheet" href="<?= base_url('/assets2/plugins/animation/css/animate.min.css'); ?>">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url('/assets2/css/style.css'); ?>">

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content container">
        <div class="card">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="card-body">
                        <h4 class="mb-3 f-w-400">Login Admin</h4>
                        <?php if (session()->getFlashdata('error')): ?>
                            <p class="text-danger"><?= session()->getFlashdata('error') ?></p>
                        <?php endif; ?>
                        <form action="/admin/login" method="post">
                            <?= csrf_field() ?>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="Input Email">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>

                            <div class="form-group text-left mt-2">
                                <div class="checkbox checkbox-primary d-inline">
                                    <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                    <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
                                </div>
                            </div>
                            <button class="btn btn-primary mb-4">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <img src="<?= base_url('/assets2/images/slider/img-slide-5.jpg'); ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?= base_url('/assets2/js/vendor-all.min.js'); ?>"></script>
<script src="<?= base_url('/assets2/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

</body>

</html>
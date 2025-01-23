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

<body class="">
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
        <div class="navbar-wrapper">
            <!-- start sidebar -->
            <?= $this->include('admin/template/sidebar'); ?>
            <!-- end sidebar -->
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <?= $this->include('admin/template/header'); ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="<?= base_url('/assets2/js/vendor-all.min.js'); ?>"></script>
    <script src="<?= base_url('/assets2/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('/assets2/js/pcoded.min.js'); ?>"></script>

</body>

</html>
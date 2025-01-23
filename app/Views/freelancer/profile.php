<?= $this->extend('freelancer/template/index'); ?>

<?= $this->section('content'); ?>
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Profile</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('freelancer/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('freelancer/profile'); ?>">My Profile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (session()->get('message')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->get('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- [ breadcrumb ] end -->
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <!-- [ sample-page ] start -->
                        <div class="col-sm-12">
                            <div class="card user-card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5>Profile</h5>
                                    <a href="<?= base_url('freelancer/profile/edit'); ?>" class="btn btn-sm btn-primary"><i class="feather icon-settings"></i> Edit Profile</a>
                                </div>

                                <div class="card-body  text-center">
                                    <?php if ($profile === null) : ?>
                                        <div class="usre-image">
                                            <img src="/assets2/images/grid1/set1/4.jpg" class="img-radius wid-100 m-auto" alt="User-Profile-Image">
                                        </div>
                                        <h6 class="f-w-600 m-t-25 m-b-10"><?= user()->username; ?></h6>
                                        <p><?= user()->email; ?></p>
                                        <div class="bg-c-blue counter-block m-t-10 p-20">
                                            <h3 class="text-white">Lengkapi profile Anda</h3>
                                        </div>
                                    <?php else: ?>
                                        <div class="usre-image">
                                            <img src="/assets2/freelancer/<?= $profile['foto']; ?>" class="img-radius wid-100 m-auto" alt="User-Profile-Image">
                                        </div>
                                        <h6 class="f-w-600 m-t-25 m-b-10"><?= user()->username; ?></h6>
                                        <?php $date = new DateTime($profile['tanggal_lahir']) ?>
                                        <p><?= user()->email; ?> <br> <?= $date->format('d F Y'); ?></p>
                                        <hr>
                                        <p class="m-t-15"><?= $profile['bio']; ?></p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Alamat</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $profile['alamat']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Telepon</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $profile['telepon']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Skills</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $profile['skills']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Portofolio</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $profile['portfolio']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Bank</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $profile['bank']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rekening</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $profile['rekening']; ?>" disabled>
                                        </div>
                                       
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- [ sample-page ] end -->
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
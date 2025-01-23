<?= $this->extend('company/template/index'); ?>

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
                                        <li class="breadcrumb-item">
                                            <a href="<?= base_url('company/profile'); ?>">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="<?= base_url('company/profile'); ?>">Company Profile</a>
                                        </li>
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
                                    <a href="<?= base_url('/company/profile/edit'); ?>" class="btn btn-sm btn-primary">
                                        <i class="feather icon-settings"></i> Edit Profile
                                    </a>
                                </div>

                                <div class="card-body text-center">
                                    <?php if ($company === null) : ?>
                                        <div class="usre-image">
                                            <img src="/assets2/images/grid1/set1/4.jpg" class="img-radius wid-100 m-auto" alt="User-Profile-Image">
                                        </div>
                                        <h6 class="f-w-600 m-t-25 m-b-10">-</h6>
                                        <div class="bg-c-blue counter-block m-t-10 p-20">
                                            <h3 class="text-white">Lengkapi profile Anda</h3>
                                        </div>
                                    <?php else: ?>
                                        <div class="usre-image">
                                            <img src="/assets2/company/<?= $company['logo']; ?>" class="img-radius wid-100 m-auto" alt="User-Profile-Image">
                                        </div>
                                        <h6 class="f-w-600 m-t-25 m-b-10"><?= $company['nama_perusahaan']; ?></h6>
                                        <?php $date = new DateTime($company['tanggal_berdiri']); ?>
                                        <p>Berdiri Sejak : <?= $date->format('d F Y'); ?></p>
                                        <hr>
                                        <p class="m-t-15"><?= $company['deskripsi']; ?></p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Telepon</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $company['telepon']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Website</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $company['website']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Bank</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $company['bank']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rekening</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $company['rekening']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Dompet</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $company['dompet']; ?>" disabled>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">No. Dompet</span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $company['no_dompet']; ?>" disabled>
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

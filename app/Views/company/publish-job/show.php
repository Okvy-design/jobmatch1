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
                                        <h5 class="m-b-10">Published Job</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/publish-job'); ?>">published job</a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/publish-job/show'); ?>">Detail job</a></li>
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
                                <div class="card-header">
                                    <h5>Detail Job</h5>
                                </div>
                                <div class="card-body  text-center">
                                    <div class="usre-image">
                                        <img src="/assets2/jobs/<?= $job['foto']; ?>" class="m-auto" alt="User-Profile-Image" style="width: 200px;">
                                    </div>
                                    <?php if ($job['status'] == 'open'): ?>
                                        <?php $bg = 'primary' ?>
                                    <?php elseif ($job['status'] == 'closed'): ?>
                                        <?php $bg = 'danger' ?>
                                    <?php endif; ?>
                                    <span class="badge badge-<?= $bg; ?> mt-3"><?= $job['status']; ?></span>
                                    <h5 class="mt-2">Total Applied : <?= count($total_apply); ?></h5>
                                    <a href="/company/job-apply/<?= $job['job_id']; ?>" class="btn btn-sm btn-primary">See Applier <i class="fas fa-eye ml-2 mr-0 mt-1"></i></a>
                                    <?php if ($job['status'] == 'open'): ?>
                                        <a href="/company/publish-job/close/<?= $job['job_id']; ?>" class="btn btn-sm btn-outline-danger">Close Job</a>
                                    <?php endif; ?>
                                    <hr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Job Title</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $job['title']; ?>" disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Deskripsi</span>
                                        </div>
                                        <textarea class="form-control" disabled><?= $job['description']; ?></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Persyaratan</span>
                                        </div>
                                        <textarea class="form-control" disabled><?= $job['requirements']; ?></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Budget</span>
                                        </div>
                                        <input type="text" class="form-control" value="Rp <?= number_format($job['budget'], 2, ',', '.'); ?>" disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Deadline</span>
                                        </div>
                                        <?php $date = new DateTime($job['deadline']); ?>
                                        <input type="text" class="form-control" value="<?= $date->format('d F Y'); ?>" disabled>
                                    </div>
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
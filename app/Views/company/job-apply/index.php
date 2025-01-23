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
                                        <h5 class="m-b-10">Job Applier</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/publish-job'); ?>">job Applier</a></li>
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
                    <?php if (session()->get('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->get('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- [ breadcrumb ] end -->
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <!-- [ sample-page ] start -->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5>List of Job Applier - <?= $job['title']; ?></h5>
                                        <span class="d-block m-t-5">Daftar pelamar kerja</span>
                                    </div>
                                </div>

                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Freelancer</th>
                                                    <th>Email</th>
                                                    <th>Kontribusi</th>
                                                    <th>Status</th>
                                                    <th>Applied at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($apps as $app): ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $app['username']; ?></td>
                                                        <td><?= $app['email']; ?></td>
                                                        <td><?= $app['proposal']; ?></td>
                                                        <?php if ($app['status'] == 'process') : ?>
                                                            <?php $bg = 'warning'; ?>
                                                        <?php elseif ($app['status'] == 'accepted') : ?>
                                                            <?php $bg = 'success'; ?>
                                                        <?php elseif ($app['status'] == 'rejected'): ?>
                                                            <?php $bg = 'danger'; ?>
                                                        <?php elseif ($app['status'] == 'finish'): ?>
                                                            <?php $bg = 'primary'; ?>
                                                        <?php endif; ?>
                                                        <td><span class="badge badge-<?= $bg ?>"><?= $app['status']; ?></span></td>
                                                        <?php $date = new DateTime($app['applied_at']); ?>
                                                        <td><?= $date->format('d F Y'); ?></td>
                                                        <td>
                                                        
                                                         <a href="<?= base_url('company/job-apply/' . $app['job_id'] . '/' . $app['id']); ?>" class="btn btn-primary btn-sm">Detail</a>


                                                                                                                  </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
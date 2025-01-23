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
                                        <h5 class="m-b-10">Applied Job</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('/freelancer/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('/freelancer/applied-job'); ?>">applied job</a></li>
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
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5>List of Applied Job</h5>
                                        <span class="d-block m-t-5">Daftar Job yang di apply</span>
                                    </div>
                                    <a href="<?= base_url('/cari-job'); ?>" class="btn btn-primary">Cari Job!</a>
                                </div>

                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Job Title</th>
                                                    <th>Company</th>
                                                    <th>Budget</th>
                                                    <th>deadline</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($applicants as $app) : ?>
                                                    <?php if ($app['status'] != 'finish') : ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $app['title']; ?></td>
                                                            <td><?= $app['nama_perusahaan']; ?></td>
                                                            <td>Rp <?= number_format($app['budget'], 2, ',', '.'); ?></td>
                                                            <?php $deadline = new DateTime($app['deadline']); ?>
                                                            <td><?= $deadline->format('d F Y'); ?></td>
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
                                                            <td>
                                                                 <a href="<?= base_url('freelancer/applied-job/detail/' . $app['id']); ?>" class="btn btn-sm btn-info">
                                                                    Detail
                                                                 </a>
                                                            </td>

                                                        </tr>
                                                    <?php endif; ?>
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
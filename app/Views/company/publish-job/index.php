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
                                        <h5>List of Published Job</h5>
                                        <span class="d-block m-t-5">Daftar Job yang dipublikasikan</span>
                                    </div>
                                    <a href="<?= base_url('company/publish-job/create'); ?>" class="btn btn-primary">Create New Job</a>
                                </div>

                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Job Title</th>
                                                    <th>budget</th>
                                                    <th>Duration</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($jobs as $job) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $job['title']; ?></td>
                                                        <td>Rp <?= number_format($job['budget'], 2, ',', '.'); ?></td>
                                                        <?php $created_at = new DateTime($job['created_at']); ?>
                                                        <?php $deadline = new DateTime($job['deadline']); ?>
                                                        <td><?= $created_at->format('d F Y'); ?> - <?= $deadline->format('d F Y'); ?></td>
                                                        <?php if ($job['status'] == 'open'): ?>
                                                            <?php $bg = 'primary' ?>
                                                        <?php elseif ($job['status'] == 'closed'): ?>
                                                            <?php $bg = 'danger' ?>
                                                        <?php endif; ?>
                                                        <td><span class="badge badge-<?= $bg; ?>"><?= $job['status']; ?></span></td>
                                                        <td>
                                                            <a href="/company/publish-job/show/<?= $job['job_id']; ?>" class="btn btn-sm btn-info">Detail</a>
                                                            <a href="/company/publish-job/edit/<?= $job['job_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                                            <a href="/company/publish-job/delete/<?= $job['job_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus?')">Delete</a>
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
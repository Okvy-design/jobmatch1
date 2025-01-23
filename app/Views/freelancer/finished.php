<?= $this->extend('freelancer/template/index'); ?>

<?= $this->section('content') ?>
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
                                        <h5 class="m-b-10">Finished Jobs</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="<?= base_url('/freelancer/profile'); ?>"><i class="feather icon-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="<?= base_url('/freelancer/finished-job'); ?>">Finished Jobs</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->

                    <!-- [ Flash Messages ] -->
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5>List of Finished Jobs</h5>
                                        <span class="d-block m-t-5">Daftar Pekerjaan yang Selesai</span>
                                    </div>
                                </div>
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Company</th>
                                                    <th>Budget</th>
                                                    <th>Deadline</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($jobs)) : ?>
                                                    <?php foreach ($jobs as $job) : ?>
                                                        <tr>
                                                            <td><?= esc($job['title']) ?></td>
                                                            <td><?= esc($job['company']) ?></td>
                                                            <td>Rp <?= number_format($job['budget'], 2, ',', '.'); ?></td>
                                                            <?php $deadline = new DateTime($job['deadline']); ?>
                                                            <td><?= $deadline->format('d F Y'); ?></td>
                                                            <td>
                                                                <form action="<?= base_url('appliedjob/upload/' . $job['applicant_id']) ?>" method="post" enctype="multipart/form-data">
                                                                    <?= csrf_field() ?>
                                                                    <input type="file" name="file" accept=".pdf,.doc,.docx,.jpg,.png" class="form-control mb-2" required>
                                                                    <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                                                </form>
                                                                <!-- Keterangan Berkas yang Diunggah -->
                                                                <?php if (!empty($job['dokumen'])) : ?>
                                                                    <p class="m-0">
                                                                        Berkas diunggah: 
                                                                        <a href="<?= base_url('assets2/berkas/' . esc($job['dokumen'])) ?>" target="_blank"><?= esc($job['dokumen']) ?></a>
                                                                    </p>
                                                                    <?php if (!empty($job['tanggal_upload'])) : ?>
                                                                        <p class="text-muted m-0">Tanggal Upload: <?= date('d F Y, H:i', strtotime($job['tanggal_upload'])) ?></p>
                                                                    <?php else : ?>
                                                                        <p class="text-muted m-0">Tanggal Upload: Tidak tersedia</p>
                                                                    <?php endif; ?>
                                                                <?php else : ?>
                                                                    <p class="m-0 text-danger">Berkas belum diunggah.</p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">No finished jobs available.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

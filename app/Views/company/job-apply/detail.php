<?= $this->extend('company/template/index'); ?>

<?= $this->section('content'); ?>
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Job Detail</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="<?= base_url('company/publish-job'); ?>"><i class="feather icon-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Job Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Project: <?= $applicant['job_title']; ?></h5>
                                </div>
                                <div class="card-body">
                                    <h6>Description:</h6>
                                    <p><?= $applicant['description']; ?></p>

                                    <h6>Budget:</h6>
                                    <p><?= $applicant['budget']; ?></p>

                                    <h6>Deadline:</h6>
                                    <p><?= $applicant['deadline']; ?></p>

                                    <h6>Freelancer Name:</h6>
                                    <p><?= $applicant['freelancer_name']; ?></p>

                                    <h6>Freelancer Email:</h6>
                                    <p><?= $applicant['freelancer_email']; ?></p>

                                    <h6>Uploaded Document:</h6>
                                    <?php if (!empty($applicant['dokumen'])): ?>
                                        <a href="<?= base_url('assets2/berkas/' . $applicant['dokumen']); ?>" target="_blank">Download Document</a>
                                    <?php else: ?>
                                        <p>No document uploaded.</p>
                                    <?php endif; ?>
                                    <h6>Action:</h6>
                                        <!-- Ganti tombol aksi Cetak dengan Tambah Transaksi -->
                                    <a href="<?= base_url('company/payment/create?job_id=' . $applicant['job_id']); ?>" class="btn btn-primary">Tambah Transaksi</a>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

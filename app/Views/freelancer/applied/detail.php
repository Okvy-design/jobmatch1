<?= $this->extend('freelancer/template/index'); ?>

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
                                        <h5 class="m-b-10">Detail Applied Job</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('/freelancer/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('/freelancer/applied-job'); ?>">Applied Job</a></li>
                                        <li class="breadcrumb-item">Detail</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Detail Job</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Job Title</th>
                                    <td><?= $app->title; ?></td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td><?= $app->nama_perusahaan; ?></td>
                                </tr>
                                <tr>
                                    <th>Budget</th>
                                    <td>Rp <?= number_format($app->budget, 2, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <th>Deadline</th>
                                    <td><?= (new DateTime($app->deadline))->format('d F Y'); ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="badge badge-info"><?= $app->status; ?></span></td>
                                </tr>
                                <tr>
                                    <th>Kontribusi</th>
                                    <td><?= $app->proposal; ?></td>
                                </tr>
                            </table>
                            <a href="<?= base_url('/freelancer/applied-job'); ?>" class="btn btn-secondary mt-3">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

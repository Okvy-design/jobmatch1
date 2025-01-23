<?= $this->extend('admin/template/index'); ?>

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
                                        <h5 class="m-b-10">Transactions</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/transaksi'); ?>">Transactions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- [ breadcrumb ] end -->
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5>List of Transactions</h5>
                                        <span class="d-block m-t-5">Daftar semua transaksi</span>
                                    </div>
                                </div>
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Kode Transaksi</th>
                                                    <th>Nama Project</th>
                                                    <th>Company</th>
                                                    <th>Email Freelance</th>
                                                    <th>Budget</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($transactions as $transaction) : ?>
                                                    <tr>
                                                        <td><?= $transaction['kd_transaksi']; ?></td>
                                                        <td><?= $transaction['project_name']; ?></td>
                                                        <td><?= $transaction['company_name']; ?></td>
                                                        <td><?= $transaction['freelancer_email']; ?></td>
                                                        <td><?= $transaction['budget']; ?></td>
                                                        <td><?= $transaction['status']; ?></td>
                                                        <td>
                                                            <?php if ($transaction['status'] == 'pending') : ?>
                                                                <a href="<?= base_url('admin/transaksi/updateStatus/' . $transaction['kd_transaksi']); ?>" class="btn btn-sm btn-success">Mark as Paid</a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
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
<?= $this->endSection(); ?>

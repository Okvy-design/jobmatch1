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
                                        <h5 class="m-b-10">Edit Transaction</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/payment'); ?>">Payment</a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/payment/edit/' . $transaction['kd_transaksi']); ?>">Edit Transaction</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <!-- [ sample-page ] start -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Transaction</h5>
                                </div>
                                <form action="<?= base_url('company/payment/update/' . $transaction['kd_transaksi']); ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="card-body">
                                        <?php if (session()->getFlashdata('errors')) : ?>
                                            <div class="alert alert-danger"><?= session()->getFlashdata('errors'); ?></div>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <label for="tanggal">Tanggal:</label>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $transaction['tanggal']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nota">Nota:</label>
                                            <input type="file" name="nota" id="nota" class="form-control">
                                            <small>File lama: <a href="<?= base_url('assets2/nota/' . $transaction['nota']); ?>" target="_blank"><?= $transaction['nota']; ?></a></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="metode_bayar">Metode Bayar:</label>
                                            <select name="metode_bayar" id="metode_bayar" class="form-control" required>
                                                <option value="bank_transfer" <?= $transaction['metode_bayar'] == 'bank_transfer' ? 'selected' : ''; ?>>Bank Transfer</option>
                                                <option value="e_wallet" <?= $transaction['metode_bayar'] == 'e_wallet' ? 'selected' : ''; ?>>E-Wallet</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
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

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
                                        <h5 class="m-b-10">Create Transaction</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/dashboard'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/payment'); ?>">Payment</a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/payment/create'); ?>">Create Transaction</a></li>
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
                                    <h5>Create Transaction</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('company/payment/store'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="job_id" value="<?= $_GET['job_id'] ?? ''; ?>">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal:</label>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="metode_bayar">Metode Bayar:</label>
                                            <select name="metode_bayar" id="metode_bayar" class="form-control" required>
                                                <option value="bank_transfer">Bank Transfer</option>
                                                <option value="e_wallet">E-Wallet</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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

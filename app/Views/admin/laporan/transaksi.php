<?= $this->extend('admin/template/index'); ?>
<?= $this->section('content'); ?>
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <h5>Laporan Transaksi</h5>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Transaksi</h5>
                            <form method="post" action="<?= base_url('/admin/laporan/transaksi/cetak'); ?>" target="_blank">
                                <button type="submit" class="btn btn-primary">Cetak Semua</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Project</th>
                                        <th>Company</th>
                                        <th>Email Freelance</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th>Pengirim</th>
                                        <th>Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($transactions)): ?>
                                        <?php foreach ($transactions as $transaction): ?>
                                            <tr>
                                                <td><?= esc($transaction['kd_transaksi']); ?></td>
                                                <td><?= esc($transaction['project_name']); ?></td>
                                                <td><?= esc($transaction['company_name']); ?></td>
                                                <td><?= esc($transaction['freelancer_email']); ?></td>
                                                <td><?= esc($transaction['tanggal']); ?></td>
                                                <td><?= number_format($transaction['budget'], 2, ',', '.'); ?></td>
                                                <td><?= esc($transaction['status']); ?></td>
                                                <td><?= esc($transaction['rekening_pengirim']); ?></td> <!-- Menampilkan rekening pengirim -->
                                                <td><?= esc($transaction['rekening_penerima']); ?></td> <!-- Menampilkan rekening penerima -->
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Data transaksi tidak tersedia.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

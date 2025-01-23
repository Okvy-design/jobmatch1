<?= $this->extend('admin/template/index'); ?>
<?= $this->section('content'); ?>
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <h5>Laporan Perusahaan</h5>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Perusahaan</h5>
                            <form method="post" action="<?= base_url('/admin/laporan/company/cetak'); ?>" target="_blank">
                                <button type="submit" class="btn btn-primary">Cetak Semua</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Berdiri</th>
                                        <th>Telepon</th>
                                        <th>Bank</th>
                                        <th>Rekening</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($companies as $company): ?>
                                        <tr>
                                            <td><?= esc($company['id']); ?></td>
                                            <td>
                                                <img src="<?= base_url('assets2/company/' . $company['logo']); ?>" alt="Logo" width="50">
                                            </td>
                                            <td><?= esc($company['nama_perusahaan']); ?></td>
                                            <td><?= esc($company['alamat']); ?></td>
                                            <td><?= esc($company['tanggal_berdiri']); ?></td>
                                            <td><?= esc($company['telepon']); ?></td>
                                            <td><?= esc($company['bank']); ?></td>
                                            <td><?= esc($company['rekening']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
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

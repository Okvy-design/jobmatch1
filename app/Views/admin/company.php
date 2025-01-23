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
                                        <h5 class="m-b-10">Companies</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Company Data</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <!-- <th>User ID</th> -->
                                                <th>Nama Perusahaan</th>
                                                <th>Logo</th>
                                                <th>Tanggal Berdiri</th>
                                                <th>Alamat</th>
                                                <th>Website</th>
                                                <th>Telepon</th>
                                                <!-- <th>Deskripsi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($companies) && is_array($companies)): ?>
                                                <?php foreach ($companies as $company): ?>
                                                    <tr>
                                                       
                                                        <td><?= esc($company['nama_perusahaan']); ?></td>
                                                        <td>
                                                            <?php if (!empty($company['logo'])): ?>
                                                                <img src="<?= base_url('assets2/company/' . $company['logo']); ?>" alt="Logo" width="50">
                                                            <?php else: ?>
                                                                <span class="text-muted">No Logo</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= esc($company['tanggal_berdiri']); ?></td>
                                                        <td><?= esc($company['alamat']); ?></td>
                                                        <td>
                                                            <a href="<?= esc($company['website']); ?>" target="_blank">
                                                                <?= esc($company['website']); ?>
                                                            </a>
                                                        </td>
                                                        <td><?= esc($company['telepon']); ?></td>
                                                        
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">No data available.</td>
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
    </div>
</div>
<?= $this->endSection(); ?>

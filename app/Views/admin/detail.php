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
                                        <h5 class="m-b-10">Detail Transaksi</h5>
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
                                    <h5>Detail Proyek</h5>
                                </div>
                                <div class="card-body">
                                    <?php 
                                    // Data dummy transaksi
                                    $transaksi = [
                                        'proyek' => 'Desain Logo',
                                        'deskripsi' => 'Pembuatan desain logo untuk perusahaan ABC Corp. Logo harus mencerminkan nilai modern dan inovatif.',
                                        'freelancer' => 'John Doe',
                                        'perusahaan' => 'ABC Corp',
                                        'total_bayar' => 'Rp 1.500.000',
                                        'dokumen' => [
                                            ['nama' => 'Brief_Desain.pdf', 'url' => '#'],
                                            ['nama' => 'Logo_Draft.jpg', 'url' => '#']
                                        ]
                                    ];
                                    ?>

                                    <div class="alert alert-info">
                                        <h6 class="font-weight-bold">Nama Proyek:</h6>
                                        <p><?= esc($transaksi['proyek']); ?></p>
                                    </div>

                                    <div class="alert alert-secondary">
                                        <h6 class="font-weight-bold">Deskripsi Proyek:</h6>
                                        <p><?= esc($transaksi['deskripsi']); ?></p>
                                    </div>

                                    <div class="alert alert-primary">
                                        <h6 class="font-weight-bold">Freelancer:</h6>
                                        <p><?= esc($transaksi['freelancer']); ?></p>
                                    </div>

                                    <div class="alert alert-success">
                                        <h6 class="font-weight-bold">Perusahaan:</h6>
                                        <p><?= esc($transaksi['perusahaan']); ?></p>
                                    </div>

                                    <div class="alert alert-warning">
                                        <h6 class="font-weight-bold">Budget:</h6>
                                        <p><?= esc($transaksi['total_bayar']); ?></p>
                                    </div>

                                    <div class="alert alert-dark">
                                        <h6 class="font-weight-bold">Dokumen:</h6>
                                        <ul>
                                            <?php if (!empty($transaksi['dokumen']) && is_array($transaksi['dokumen'])): ?>
                                                <?php foreach ($transaksi['dokumen'] as $dokumen): ?>
                                                    <li><a href="<?= esc($dokumen['url']); ?>" target="_blank"><?= esc($dokumen['nama']); ?></a></li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li>Dokumen tidak tersedia.</li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

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

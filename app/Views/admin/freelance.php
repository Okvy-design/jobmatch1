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
                                        <h5 class="m-b-10">Freelancers</h5>
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
                                    <h5>Freelancer Data</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>Foto</th>
                                                <th>Email</th>
                                                <th>Nama</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Skills</th>
                                                <th>Portfolio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($freelancers) && is_array($freelancers)): ?>
                                                <?php foreach ($freelancers as $freelancer): ?>
                                                    <tr>
                                                       
                                                        <td>
                                                            <?php if (!empty($freelancer['foto'])): ?>
                                                                <img src="<?= base_url('assets2/freelancer/' . $freelancer['foto']); ?>" alt="Foto" width="50">
                                                            <?php else: ?>
                                                                <span class="text-muted">No Foto</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= esc($freelancer['email']); ?></td>
                                                        <td><?= esc($freelancer['username']); ?></td>
                                                        <td><?= esc($freelancer['tanggal_lahir']); ?></td>
                                                        <td><?= esc($freelancer['alamat']); ?></td>
                                                        <td><?= esc($freelancer['telepon']); ?></td>
                                                        <td><?= esc($freelancer['skills']); ?></td>
                                                        <td><a href="<?= esc($freelancer['portfolio']); ?>" target="_blank">View</a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="10" class="text-center">No data available.</td>
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

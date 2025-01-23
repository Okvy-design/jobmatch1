<?= $this->extend('admin/template/index'); ?>
<?= $this->section('content'); ?>

<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <h5>Laporan Freelancer</h5>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Freelancer</h5>
                            <form method="post" action="<?= base_url('/admin/laporan/freelance/cetak'); ?>" target="_blank">
                                <button type="submit" class="btn btn-primary">Cetak Semua</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan table-responsive untuk scrollbar horizontal -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Skills</th>
                                            <th>Portfolio</th>
                                            <th>Bank</th>
                                            <th>Rekening</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($freelancers as $freelancer): ?>
                                            <tr>
                                                <td><?= esc($freelancer['id']); ?></td>
                                                <td>
                                                    <img src="<?= base_url('assets2/freelancer/' . $freelancer['foto']); ?>" alt="Foto" width="50" height="50">
                                                </td>
                                                <td><?= esc($freelancer['username']); ?></td>
                                                <td><?= esc($freelancer['email']); ?></td>
                                                <td><?= esc($freelancer['tanggal_lahir']); ?></td>
                                                <td><?= esc($freelancer['alamat']); ?></td>
                                                <td><?= esc($freelancer['telepon']); ?></td>
                                                <td><?= esc($freelancer['skills']); ?></td>
                                                <td><a href="<?= esc($freelancer['portfolio']); ?>" target="_blank">View</a></td>
                                                <td><?= esc($freelancer['bank']); ?></td>
                                                <td><?= esc($freelancer['rekening']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div> <!-- End of table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Pastikan tabel tidak melampaui batas */
    .table {
        table-layout: auto; /* Pastikan kolom bisa otomatis menyesuaikan konten */
        white-space: nowrap; /* Mencegah teks terpotong atau wrap di kolom */
    }

    .table img {
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        width: 50px;
        height: 50px;
        border-radius: 50%; /* Membuat gambar berbentuk lingkaran */
    }
</style>

<?= $this->endSection(); ?>

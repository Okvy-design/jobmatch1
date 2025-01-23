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
                                        <h5 class="m-b-10">Edit Profile</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/profile'); ?>">Company Profile</a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/profile/edit'); ?>">Edit Company Profile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="alert alert-danger" role="alert">
                        A simple danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                    </div> -->
                    <?php if (session()->get('errors')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php foreach (session()->get('errors') as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <!-- [ breadcrumb ] end -->
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <!-- [ sample-page ] start -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Profile</h5>
                                </div>
                                <div class="card-body">
                                    <?php if ($company === null) : ?>
                                        <form action="/company/profile/create" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama-perusahaan">Nama Perusahaan</label>
                                                        <input type="text" class="form-control" id="nama-perusahaan" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi">Deskripsi</label>
                                                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="telepon">Telepon</label>
                                                        <input type="tel" class="form-control" id="telepon" placeholder="Masukkan no. telepon" name="telepon" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal-berdiri">Tanggal Berdiri</label>
                                                        <input type="date" class="form-control" id="tanggal-berdiri" name="tanggal_berdiri" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan alamat website" name="website">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Logo</label>
                                                        <input type="file" class="form-control" name="logo" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <!-- Bank Field -->
                                                    <div class="form-group">
                                                        <label for="bank">Bank</label>
                                                        <select class="form-control" id="bank" name="bank" required>
                                                            <option value="BCA" <?= $company['bank'] == 'BCA' ? 'selected' : ''; ?>>BCA</option>
                                                            <option value="BNI" <?= $company['bank'] == 'BNI' ? 'selected' : ''; ?>>BNI</option>
                                                            <option value="BRI" <?= $company['bank'] == 'BRI' ? 'selected' : ''; ?>>BRI</option>
                                                            <option value="Mandiri" <?= $company['bank'] == 'Mandiri' ? 'selected' : ''; ?>>Mandiri</option>
                                                            <option value="Jateng" <?= $company['bank'] == 'Jateng' ? 'selected' : ''; ?>>Jateng</option>
                                                        </select>
                                                    </div>

                                                    <!-- Rekening Field -->
                                                    <div class="form-group">
                                                        <label for="rekening">Rekening</label>
                                                        <input type="text" class="form-control" id="rekening" name="rekening" value="<?= $company['no_rekening']; ?>" placeholder="Masukkan No. Rekening" required>
                                                    </div>

                                                    <!-- E-Wallet Field -->
                                                    <div class="form-group">
                                                        <label for="dompet">E-Wallet</label>
                                                        <select class="form-control" id="dompet" name="dompet" required>
                                                            <option value="Dana" <?= $company['dompet'] == 'Dana' ? 'selected' : ''; ?>>Dana</option>
                                                            <option value="Shopeepay" <?= $company['dompet'] == 'Shopeepay' ? 'selected' : ''; ?>>Shopeepay</option>
                                                            <option value="Ovo" <?= $company['dompet'] == 'Ovo' ? 'selected' : ''; ?>>Ovo</option>
                                                            <option value="Gopay" <?= $company['dompet'] == 'Gopay' ? 'selected' : ''; ?>>Gopay</option>
                                                        </select>
                                                    </div>

                                                    <!-- No Dompet Digital Field -->
                                                    <div class="form-group">
                                                        <label for="no_dompet">No Dompet Digital</label>
                                                        <input type="text" class="form-control" id="no_dompet" name="no_dompet" value="<?= $company['no_dompet']; ?>" placeholder="Masukkan No. Dompet Digital" required>
                                                    </div>
                                                </div>

                                                </div>
                                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <form action="/company/profile/update/<?= $company['id']; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama-perusahaan">Nama Perusahaan</label>
                                                        <input type="text" class="form-control" id="nama-perusahaan" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" value="<?= $company['nama_perusahaan']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi">Deskripsi</label>
                                                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required><?= $company['deskripsi']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= $company['alamat']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="telepon">Telepon</label>
                                                        <input type="tel" class="form-control" id="telepon" placeholder="Masukkan no. telepon" name="telepon" value="<?= $company['telepon']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal-berdiri">Tanggal Berdiri</label>
                                                        <input type="date" class="form-control" id="tanggal-berdiri" name="tanggal_berdiri" value="<?= $company['tanggal_berdiri']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" placeholder="Masukkan alamat website" name="website" value="<?= $company['website']; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                    <!-- Bank and Wallet Fields -->
                                                    <div class="form-group">
                                                        <label for="bank">Bank</label>
                                                        <select class="form-control" id="bank" name="bank" required>
                                                            <option value="">Pilih Bank</option>
                                                            <option value="BCA">BCA</option>
                                                            <option value="BNI">BNI</option>
                                                            <option value="BRI">BRI</option>
                                                            <option value="Mandiri">Mandiri</option>
                                                            <option value="Jateng">Jateng</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rekening">Rekening</label>
                                                        <input type="text" class="form-control" id="rekening" name="rekening" placeholder="Masukkan No. Rekening" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dompet">E-Wallet</label>
                                                        <select class="form-control" id="dompet" name="dompet" required>
                                                            <option value="">Pilih Dompet</option>
                                                            <option value="Dana">Dana</option>
                                                            <option value="Shopeepay">Shopeepay</option>
                                                            <option value="Ovo">Ovo</option>
                                                            <option value="Gopay">Gopay</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_dompet">No Dompet Digital</label>
                                                        <input type="text" class="form-control" id="no_dompet" name="no_dompet" placeholder="Masukkan No. Dompet Digital" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Logo</label><br>
                                                        <input type="hidden" name="logo_lama" value="<?= $company['logo']; ?>">
                                                        <img src="/assets2/company/<?= $company['logo']; ?>" alt="" width="90" class="mb-2">
                                                        <input type="file" class="form-control" name="logo">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary ml-3">Update</button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
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
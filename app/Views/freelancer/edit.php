<?= $this->extend('freelancer/template/index'); ?>

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
                                        <li class="breadcrumb-item"><a href="<?= base_url('freelancer/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('freelancer/profile'); ?>">My Profile</a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('freelancer/profile/edit'); ?>">Edit Profile</a></li>
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
                                    <?php if ($profile === null) : ?>
                                        <form action="/freelancer/profile/create" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bio">Biografi</label>
                                                        <textarea class="form-control" id="bio" rows="3" name="bio" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="skills">Skills</label>
                                                        <input type="text" class="form-control" id="skills" placeholder="php, javascript, laravel, ..." name="skills" required>
                                                    </div>
                                                  

                                                    <div class="form-group">
                                                        <label for="telepon">Telepon</label>
                                                        <input type="tel" class="form-control" id="telepon" placeholder="Masukkan no. telepon" name="telepon" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_lahir">Tanggal lahir</label>
                                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="portofolio">Portofolio</label>
                                                        <input type="text" class="form-control" id="portofolio" placeholder="Masukkan link portofolio" name="portofolio" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="portofolio">Bank</label>
                                                        <input type="text" class="form-control" id="bank" placeholder="Masukkan link portofolio" name="bank" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="portofolio">Rekening</label>
                                                        <input type="text" class="form-control" id="bank" placeholder="Masukkan link portofolio" name="rekening" required>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input type="file" class="form-control" name="foto" required>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <form action="/freelancer/profile/update/<?= $profile['id']; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bio">Biografi</label>
                                                        <textarea class="form-control" id="bio" rows="3" name="bio" required><?= old('bio') ? old('bio') : $profile['bio'] ?></textarea>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="skills">Skills</label>
                                                        <input type="text" class="form-control" id="skills" placeholder="php, javascript, laravel, ..." name="skills" value="<?= old('skills') ? old('skills') : $profile['skills'] ?>" required>
                                                    </div> -->
                                                    <div class="form-group">
                                                    <label for="skills">Skills</label>
                                                    <select class="form-control" id="skills" name="skills" required>
                                                        <option value="">Pilih Skill</option>
                                                        <option value="web developer" <?= $profile['skills'] === 'web developer' ? 'selected' : '' ?>>Web Developer</option>
                                                        <option value="software engineer" <?= $profile['skills'] === 'software engineer' ? 'selected' : '' ?>>Software Engineer</option>
                                                        <option value="database administrator" <?= $profile['skills'] === 'database administrator' ? 'selected' : '' ?>>Database Administrator</option>
                                                        <option value="data analyst" <?= $profile['skills'] === 'data analyst' ? 'selected' : '' ?>>Data Analyst</option>
                                                        <option value="product manager" <?= $profile['skills'] === 'product manager' ? 'selected' : '' ?>>Product Manager</option>
                                                        <option value="ux designer" <?= $profile['skills'] === 'ux designer' ? 'selected' : '' ?>>UX Designer</option>
                                                        <option value="mobile app developer" <?= $profile['skills'] === 'mobile app developer' ? 'selected' : '' ?>>Mobile App Developer</option>
                                                    </select>
                                                </div>

                                                    <div class="form-group">
                                                        <label for="telepon">Telepon</label>
                                                        <input type="tel" class="form-control" id="telepon" placeholder="Masukkan no. telepon" name="telepon" value="<?= old('telepon') ? old('telepon') : $profile['telepon'] ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_lahir">Tanggal lahir</label>
                                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ? old('tanggal_lahir') : $profile['tanggal_lahir'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= old('alamat') ? old('alamat') : $profile['alamat'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="portofolio">Portofolio</label>
                                                        <input type="text" class="form-control" id="portofolio" placeholder="Masukkan link portofolio" name="portofolio" value="<?= old('portofolio') ? old('portofolio') : $profile['portfolio'] ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank">Bank</label>
                                                        <select class="form-control" id="bank" name="bank" required>
                                                            <option value="BCA" <?= $profile['bank'] == 'BCA' ? 'selected' : ''; ?>>BCA</option>
                                                            <option value="BNI" <?= $profile['bank'] == 'BNI' ? 'selected' : ''; ?>>BNI</option>
                                                            <option value="BRI" <?= $profile['bank'] == 'BRI' ? 'selected' : ''; ?>>BRI</option>
                                                            <option value="Mandiri" <?= $profile['bank'] == 'Mandiri' ? 'selected' : ''; ?>>Mandiri</option>
                                                            <option value="Jateng" <?= $profile['bank'] == 'Jateng' ? 'selected' : ''; ?>>Jateng</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rekening">Rekening</label>
                                                        <input type="text" class="form-control" id="rekening" placeholder="Masukkan rekening" name="rekening" value="<?= old('rekening') ? old('rekening') : $profile['rekening'] ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Foto</label><br>
                                                        <img src="/assets2/freelancer/<?= $profile['foto']; ?>" alt="" style="width: 80;" class="mb-3">
                                                        <input type="hidden" name="fotoLama" value="<?= $profile['foto']; ?>">
                                                        <input type="file" class="form-control" name="foto">
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
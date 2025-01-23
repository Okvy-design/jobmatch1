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
                                        <h5 class="m-b-10">Published Job</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/profile'); ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/publish-job'); ?>">published job</a></li>
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/publish-job/create'); ?>">edit job</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <h5>Edit Job</h5>
                                </div>
                                <form action="/company/publish-job/update/<?= $job['job_id']; ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="judul">Judul Job</label>
                                            <input type="text" class="form-control" id="judul" placeholder="Input Judul" name="judul" value="<?= old('judul') ? old('judul') : $job['title'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required><?= old('deskripsi') ? old('deskripsi') : $job['description'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="persyaratan">Persyaratan</label>
                                            <textarea class="form-control" id="persyaratan" rows="3" name="persyaratan" required><?= old('persyaratan') ? old('persyaratan') : $job['requirements'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="budget">Budget</label>
                                            <input type="number" class="form-control" id="budget" placeholder="0" name="budget" value="<?= old('budget') ? old('budget') : $job['budget'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" class="form-control" id="deadline" name="deadline" value="<?= old('deadline') ? old('deadline') : $job['deadline'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label><br>
                                            <img src="/assets2/jobs/<?= $job['foto']; ?>" alt="" width="120" class="mb-3">
                                            <input type="hidden" name="foto_lama" value="<?= $job['foto']; ?>">
                                            <input type="file" class="form-control" id="foto" name="foto">
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
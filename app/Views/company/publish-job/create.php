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
                                        <li class="breadcrumb-item"><a href="<?= base_url('company/publish-job/create'); ?>">create job</a></li>
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
                                    <h5>Create Job</h5>
                                </div>
                                <form action="/company/publish-job/store" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="judul">Judul Job</label>
                                            <input type="text" class="form-control" id="judul" placeholder="Input Judul" name="judul" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="persyaratan">Persyaratan</label>
                                            <textarea class="form-control" id="persyaratan" rows="3" name="persyaratan" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="budget">Budget</label>
                                            <input type="number" class="form-control" id="budget" placeholder="0" name="budget" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" class="form-control" id="deadline" name="deadline" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
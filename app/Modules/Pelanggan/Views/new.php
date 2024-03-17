<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item active"><a href="#">Data Pelanggan</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title"><?= $title; ?></h4>
                </div>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="/pelanggan/create" enctype="multipart/form-data" method="POST">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : null ?>" name="nama" value="<?= old('nama'); ?>">
                                    <?php if ($validation->hasError('nama')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('nama') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    <?php if ($validation->hasError('jenis_kelamin')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('jenis_kelamin') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : null ?>" value="<?= old('alamat'); ?>"></textarea>
                                    <?php if ($validation->hasError('alamat')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('alamat') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="no_telepon">No Telepon</label>
                                    <input type="number" id="no_telepon" class="form-control <?= $validation->hasError('no_telepon') ? 'is-invalid' : null ?>" name="no_telepon" value="<?= old('no_telepon'); ?>">
                                    <?php if ($validation->hasError('no_telepon')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('no_telepon') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <div class="custom-file" name="foto">
                                        <input type="file" name="foto" class="custom-file-input <?= $validation->hasError('foto') ? 'is-invalid' : null ?>" id="foto">
                                        <label class="custom-file-label" name="foto" for="customFile">Choose file</label>
                                    </div>
                                    <?php if ($validation->hasError('foto')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('foto') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-2">
                                <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
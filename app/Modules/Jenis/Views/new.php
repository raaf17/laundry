<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item active"><a href="#">Data Jenis</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title"><?= $title; ?></h4>
                        </div>
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <form action="/jenis/create" method="POST">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="jenis_laundry">Jenis Laundry</label>
                                    <input type="text" id="jenis_laundry" class="form-control" name="jenis_laundry" value="<?= old('jenis_laundry'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_laundry'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lama_proses">Lama Proses</label>
                                    <input type="number" id="lama_proses" class="form-control" name="lama_proses" value="<?= old('lama_proses'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lama_proses'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tarif">Tarif</label>
                                    <input type="number" id="tarif" class="form-control" name="tarif" value="<?= old('tarif'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tarif'); ?>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <a href="/jenis" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
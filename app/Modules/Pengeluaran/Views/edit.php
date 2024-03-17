<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pengeluaran</a></div>
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
                            <form class="form" action="/pengeluaran/update/<?= $data_pengeluaran->id_pengeluaran; ?>" method="POST">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="tgl_pengeluaran">Tanggal Pengeluaran</label>
                                    <input type="text" id="tgl_pengeluaran" class="form-control datepicker" name="tgl_pengeluaran" value="<?= $data_pengeluaran->tgl_pengeluaran; ?>">
                                    <?php if ($validation->hasError('tgl_pengeluaran')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('tgl_pengeluaran') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="lama_proses">Catatan</label>
                                    <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control <?= $validation->hasError('catatan') ? 'is-invalid' : null ?>"><?= $data_pengeluaran->catatan; ?></textarea>
                                    <?php if ($validation->hasError('catatan')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('catatan') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="pengeluaran">Pengeluaran</label>
                                    <input type="number" id="pengeluaran" class="form-control <?= $validation->hasError('pengeluaran') ? 'is-invalid' : null ?>" name="pengeluaran" value="<?= $data_pengeluaran->pengeluaran; ?>">
                                    <?php if ($validation->hasError('pengeluaran')) : ?>
                                        <div class=" invalid-feedback">
                                            <?= $validation->hasError('pengeluaran') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <a href="/pengeluaran" class="btn btn-secondary">Kembali</a>
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
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pengeluaran</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>

        <!-- Alert Sukses -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Alert Gagal -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Error !</b>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?= $title; ?></h4>
                    <div class="card-header-action">
                        <a href="/pengeluaran/restore" class="btn btn-info">Restore All</a>
                        <form action="/pengeluaran/delete2" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus data?')">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button href="submit" class="btn btn-danger btn-sm">Delete All</button>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="table-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengeluaran</th>
                                <th>Catatan</th>
                                <th>Pengeluaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_pengeluaran as $data) : ?>
                                <tr>
                                    <td width="5%"><?= $no++; ?>.</td>
                                    <td><?= $data->tgl_pengeluaran; ?></td>
                                    <td><?= $data->catatan; ?></td>
                                    <td>Rp. <?= number_format($data->pengeluaran, 0, ',', '.'); ?></td>
                                    <td width="18%" class="text-center">
                                        <a href="/pengeluaran/restore/<?= $data->id_pengeluaran; ?>" class="btn btn-info btn-sm">Restore</a>
                                        <form action="/pengeluaran/delete2/<?= $data->id_pengeluaran; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin mau hapus data?')">
                                            <?= csrf_field(); ?>
                                            <button href="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer small text-muted p-0 px-4 py-3">Updated at <?php $zone = 3600 * +7;
                                                                                    $date = gmdate("l, d F Y H:i a", time() + $zone);
                                                                                    echo "$date"; ?>
                </div>
            </div>
        </div>
    </section>
</div>
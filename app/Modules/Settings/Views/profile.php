<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?= $data_user->nama; ?>!</h2>
            <p class="section-lead">
                Identitas Diri Anda.
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="/img/upload/<?= $data_user->foto; ?>" class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $data_user->nama; ?> <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> <?= $data_user->level; ?>
                                </div>
                            </div>
                            <?= $data_user->alamat; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Identitas Lengkap</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?= $data_user->username; ?>" readonly>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="<?= $data_user->nama; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="<?= $data_user->jenis_kelamin; ?>" readonly>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>No. Telepon</label>
                                    <input type="number" class="form-control" value="<?= $data_user->no_telepon; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Alamat</label>
                                    <textarea class="form-control" readonly><?= $data_user->alamat; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
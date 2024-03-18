<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <!-- Alert Sukses -->
    <?php if (session()->getFlashdata('message')) : ?>
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <?= session()->getFlashdata('message'); ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pelanggan</h4>
            </div>
            <div class="card-body">
              <?= countData('pelanggan'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>User</h4>
            </div>
            <div class="card-body">
              <?= countData('users'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-money-bill-transfer"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Transaksi</h4>
            </div>
            <div class="card-body">
              1,201
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-money-bills"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pengeluaran</h4>
            </div>
            <div class="card-body">
              <?= countData('pengeluaran'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5 col-md-6 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Aktivitas Login</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="<?= site_url('img/upload/' . userLogin()->foto) ?>" alt="avatar">
                <div class="media-body">
                  <div class="media-title"><b><?= userLogin()->username; ?></b></div>
                  <span class="">Nama Lengkap : <?= userLogin()->nama; ?></span><br>
                  <span class="">Jabatan : <?= userLogin()->level; ?></span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#"><?= $title; ?></a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title"><?= $title; ?></h2>
      <p class="section-lead">
        Pengaturan untuk akun anda.
      </p>
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-large-icons">
            <div class="card-icon bg-primary text-white">
              <i class="fas fa-cog"></i>
            </div>
            <div class="card-body">
              <h4>Profile</h4>
              <p>Lihat identitas diri anda disini.</p>
              <a href="<?= site_url('settings/profile') ?>" class="card-cta">Klik disini <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
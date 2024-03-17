<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
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
    <div class="section-body">
      <div class="card card-primary">
        <div class="card-header">
          <h4><?= $title; ?></h4>
          <div class="card-header-action">
            <a href="/pelanggan/new" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="/pelanggan/trash" class="btn btn-danger"><i class="fas fa-trash"></i> Trash</a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover table-striped table-bordered" id="table-1">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_pelanggan as $data) : ?>
                <tr>
                  <td width="5%"><?= $no++; ?>.</td>
                  <td><?= $data->nama; ?></td>
                  <td><?= $data->jenis_kelamin; ?></td>
                  <td><?= $data->alamat; ?></td>
                  <td><?= $data->no_telepon; ?></td>
                  <td class="text-center">
                    <img width="60px" src="<?= site_url('img/upload/' . $data->foto) ?>" alt="...">
                  </td>
                  <td width="12%" class="text-center">
                    <a href="pelanggan/edit/<?= $data->id_pelanggan; ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-square"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data->id_pelanggan; ?>')"><i class="fas fa-trash"></i></button>
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

<script>
  function hapus(id_pelanggan) {
    Swal.fire({
      title: "Hapus?",
      text: "Yakin Data Jenis akan dihapus?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus"
    }).then((result) => {
      $.ajax({
        type: 'POST',
        url: '<?= site_url('pelanggan/delete') ?>',
        data: {
          _method: 'delete',
          <?= csrf_token() ?>: "<?= csrf_hash() ?>",
          id_pelanggan: id_pelanggan
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            Swal.fire({
              title: "Terhapus!",
              text: response.success,
              icon: "success",
            }).then((result) => {
              if (result.value) {
                window.location.href = "<?= site_url('pelanggan') ?>"
              }
            })
          }
        }
      });
    });
  }
</script>
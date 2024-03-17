<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="<?= site_url('auth/authRegister') ?>" method="POST">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password">Username</label>
                                    <input id="password" type="text" class="form-control" name="password" autofocus>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password">Password</label>
                                    <input id="password" type="text" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text" class="form-control" name="nama" autofocus>
                                </div>
                                <div class="form-group col-6">
                                    <label for="gender" class="d-block">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="no_telepon" class="d-block">No. Telepon</label>
                                    <input id="no_telepon" type="number" class="form-control" name="no_telepon">
                                </div>
                                <div class="form-group col-6">
                                    <label for="foto" class="d-block">Foto</label>
                                    <input id="foto" type="file" class="form-control" name="foto">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
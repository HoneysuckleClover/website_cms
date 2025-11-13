<div class="content-wrapper">

  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Data Kategori</b> <small>kategori artikel</small></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 connectedSortable">

          <!-- Tombol kembali -->
          <a href="<?= base_url('dashboard/kategori'); ?>">
            <button class="btn btn-sm btn-success">Kembali</button>
          </a>
          <br><br>

          <!-- Card -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-th"></i> Kategori Artikel
                <small>Tambah Kategori Baru</small>
              </h3>
            </div><!-- /.card-header -->

            <div class="card-body">
              <form method="post" action="<?= base_url('dashboard/kategori_tambah_aksi'); ?>">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="kategori" class="form-control"
                    placeholder="Masukkan Nama Kategori..." required>
                  <?= form_error('kategori'); ?>
                </div>

                <div class="form-group">
                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                </div>
              </form>
            </div><!-- /.card-body -->
          </div><!-- /.card -->

        </div>
      </div>
    </div>
  </section><!-- /.content -->
</div>

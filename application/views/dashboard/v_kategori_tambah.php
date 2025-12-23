<div class="content-wrapper">

  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <b>Data Kategori</b>
            <small>Tambah Kategori</small>
          </h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 connectedSortable">

          <!-- Tombol kembali -->
          <a href="<?= base_url('dashboard/kategori'); ?>">
            <button class="btn btn-sm btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </button>
          </a>
          <br><br>

          <!-- Card -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-th"></i> Tambah Kategori Baru
              </h3>
            </div>

            <div class="card-body">
              <form method="post" action="<?= base_url('dashboard/kategori_tambah_aksi'); ?>">

                <!-- Nama Kategori -->
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text"
                         name="kategori_nama"
                         class="form-control"
                         placeholder="Masukkan Nama Kategori..."
                         required>
                  <?= form_error('kategori_nama'); ?>
                </div>

                <!-- Tipe Kategori -->
                <div class="form-group">
                  <label>Tipe Kategori</label>
                  <select name="kategori_tipe" class="form-control" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="artikel">Artikel</option>
                    <option value="portfolio">Portfolio</option>
                  </select>
                  <?= form_error('kategori_tipe'); ?>
                </div>

                <!-- Submit -->
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-save"></i> Simpan
                  </button>
                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>

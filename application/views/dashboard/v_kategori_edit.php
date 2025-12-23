<div class="content-wrapper">

  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <b>Data Kategori</b>
            <small>Edit Kategori</small>
          </h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 connectedSortable">

          <a href="<?= base_url('dashboard/kategori'); ?>">
            <button class="btn btn-sm btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </button>
          </a>
          <br><br>

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-th"></i> Update Kategori
              </h3>
            </div>

            <div class="card-body">
              <?php foreach ($kategori as $k) : ?>

              <form method="post" action="<?= base_url('dashboard/kategori_update'); ?>">

                <!-- ID -->
                <input type="hidden" name="kategori_id" value="<?= $k->kategori_id; ?>">

                <!-- Nama -->
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text"
                         name="kategori_nama"
                         class="form-control"
                         value="<?= $k->kategori_nama; ?>"
                         required>
                  <?= form_error('kategori_nama'); ?>
                </div>

                <!-- Tipe -->
                <div class="form-group">
                  <label>Tipe Kategori</label>
                  <select name="kategori_tipe" class="form-control" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="artikel"
                      <?= ($k->kategori_tipe == 'artikel') ? 'selected' : ''; ?>>
                      Artikel
                    </option>
                    <option value="portfolio"
                      <?= ($k->kategori_tipe == 'portfolio') ? 'selected' : ''; ?>>
                      Portfolio
                    </option>
                  </select>
                  <?= form_error('kategori_tipe'); ?>
                </div>

                <!-- Submit -->
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-save"></i> Update
                  </button>
                </div>

              </form>

              <?php endforeach; ?>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

</div>

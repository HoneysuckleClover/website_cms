<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Data Portofolio</b> <small>manajemen portofolio</small></h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <!-- Tombol Kembali -->
          <a href="<?php echo base_url('dashboard/portfolio'); ?>">
            <button class="btn btn-sm btn-success">Kembali</button>
          </a>
          <br><br>

          <!-- Card -->
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-briefcase"></i> Data Portofolio
                <small>Tambah Portofolio Baru</small>
              </h3>
            </div>

            <div class="card-body">
              <form method="post" action="<?php echo base_url('dashboard/portfolio_tambah_aksi'); ?>" enctype="multipart/form-data">
                <div class="row">

                  <!-- Kolom Kiri -->
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label>Judul Portofolio</label>
                      <input type="text" name="judul" class="form-control"
                             placeholder="Masukkan Judul Portofolio..."
                             value="<?php echo set_value('judul'); ?>">
                      <br>
                      <?php echo form_error('judul'); ?>
                    </div>

                    <div class="form-group">
                      <label>Deskripsi Portofolio</label>
                      <?php echo form_error('deskripsi'); ?>
                      <textarea class="form-control" name="deskripsi" id="summernote"><?php echo set_value('deskripsi'); ?></textarea>
                    </div>
                  </div>

                  <!-- Kolom Kanan -->
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control" name="kategori">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k): ?>
                          <option value="<?php echo $k->kategori_id; ?>"
                            <?php echo set_value('kategori') == $k->kategori_id ? "selected='selected'" : ""; ?>>
                            <?php echo $k->kategori_nama; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                      <br>
                      <?php echo form_error('kategori'); ?>
                    </div>

                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="gambar" class="form-control">
                      <br>
                      <?php
                        if (isset($gambar_error)) {
                          echo $gambar_error;
                        }
                        echo form_error('gambar');
                      ?>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="status" value="Draft" class="btn btn-sm btn-warning btn-block">
                      <input type="submit" name="status" value="Publish" class="btn btn-sm btn-success btn-block">
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
          <!-- /.card -->

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Data Artikel</b> <small>Manajemen Artikel</small></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo base_url('dashboard/artikel'); ?>">
          <button class="btn btn-sm btn-success">Kembali</button>
        </a>
        <br><br>

        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-file"></i> Data Artikel
              <small>Edit Artikel</small>
            </h3>
          </div><!-- /.card-header -->

          <div class="card-body">
            <?php foreach ($artikel as $a) { ?>
              <form method="post" action="<?php echo base_url('dashboard/artikel_update'); ?>" enctype="multipart/form-data">
                <div class="row">
                  <!-- Kolom Kiri -->
                  <div class="col-lg-9">
                    <div class="form-group">
                      <label>Judul Artikel</label>
                      <input type="hidden" name="id" value="<?php echo $a->artikel_id; ?>">
                      <input type="text" name="judul" class="form-control"
                             placeholder="Masukkan Judul Artikel..." 
                             value="<?php echo $a->artikel_judul; ?>">
                     <small class="text-danger"><?php echo form_error('judul'); ?></small> 
                    </div>

                    <div class="form-group">
                      <label>Konten Artikel</label>
                      <?php echo form_error('konten'); ?>
                      <textarea class="form-control" name="konten" id="summernote"><?php echo $a->artikel_konten; ?></textarea>
                      <small class="text-danger"><?php echo form_error('konten'); ?></small>
                    </div>
                  </div>

                  <!-- Kolom Kanan -->
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control" name="kategori">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k) { ?>
                          <option value="<?php echo $k->kategori_id; ?>"
                            <?php if ($a->artikel_kategori == $k->kategori_id) echo "selected='selected'"; ?> >
                            <?php echo $k->kategori_nama; ?>
                          </option>
                        <?php } ?>
                      </select>
                      <small class="text-danger"><?php echo form_error('kategori'); ?></small>
                    </div>

                    <!-- Gambar saat ini -->
                    <div class="form-group">
                      <label>Gambar Saat Ini</label><br>
                      <?php if (!empty($a->artikel_sampul) && file_exists(FCPATH.'gambar/artikel/'.$a->artikel_sampul)) { ?>
                        <img src="<?= base_url('gambar/artikel/'.$a->artikel_sampul); ?>" 
                             width="120" class="img-thumbnail mb-2">
                      <?php } else { ?>
                        <p><i>Tidak ada gambar</i></p>
                      <?php } ?>
                    </div>

                    <!-- Upload gambar baru -->
                    <div class="form-group">
                      <label>Ganti Gambar (Opsional)</label>
                      <input type="file" name="sampul" class="form-control">
                      <br>
                      <?php if (isset($gambar_error)) { echo $gambar_error; } ?>
                      <?php echo form_error('sampul'); ?>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="status" value="Draft" class="btn btn-sm btn-warning btn-block">
                      <input type="submit" name="status" value="Publish" class="btn btn-sm btn-success btn-block">
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </form>
            <?php } ?>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
    </div>
  </section><!-- /.content -->
</div>

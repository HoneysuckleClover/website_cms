<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <b>Portofolio</b>
                        <small class="text-muted">Edit Data Portofolio</small>
                    </h1>
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
                    <a href="<?= base_url('dashboard/portfolio'); ?>" class="btn btn-success btn-sm mb-3">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <!-- Card -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-briefcase"></i> Edit Portofolio
                            </h3>
                        </div>

                        <div class="card-body">

                            <form action="<?= base_url('dashboard/portfolio_update'); ?>" 
                                  method="post" 
                                  enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?= $portfolio->portfolio_id; ?>">

                                <div class="row">

                                    <!-- Kolom Kiri -->
                                    <div class="col-lg-9">

                                        <!-- Judul -->
                                        <div class="form-group">
                                            <label><b>Judul Portofolio</b></label>
                                            <input type="text"
                                                   name="judul"
                                                   class="form-control"
                                                   value="<?= htmlspecialchars($portfolio->portfolio_judul, ENT_QUOTES, 'UTF-8'); ?>"
                                                   required>
                                        </div>

                                        <!-- Deskripsi -->
                                        <div class="form-group">
                                            <label><b>Deskripsi</b></label>
                                            <textarea name="deskripsi"
                                                      class="form-control"
                                                      id="summernote"
                                                      rows="10"
                                                      required><?= htmlspecialchars($portfolio->portfolio_deskripsi, ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>

                                    </div>

                                    <!-- Kolom Kanan -->
                                    <div class="col-lg-3">

                                        <!-- Kategori -->
                                        <div class="form-group">
                                            <label><b>Kategori</b></label>
                                            <select name="kategori" class="form-control">
                                                <option value="">-- Pilih Kategori --</option>
                                                <?php foreach ($kategori as $k): ?>
                                                    <option value="<?= $k->kategori_id; ?>"
                                                        <?= ($portfolio->portfolio_kategori == $k->kategori_id) ? 'selected' : ''; ?>>
                                                        <?= $k->kategori_nama; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?= form_error('kategori'); ?></small>
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group">
                                            <label><b>Status</b></label>
                                            <select name="status" class="form-control">
                                                <option value="publish" <?= ($portfolio->portfolio_status == 'publish') ? 'selected' : ''; ?>>
                                                    Publish
                                                </option>
                                                <option value="draft" <?= ($portfolio->portfolio_status == 'draft') ? 'selected' : ''; ?>>
                                                    Draft
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Gambar Saat Ini -->
                                        <div class="form-group">
                                            <label><b>Gambar Saat Ini</b></label><br>
                                            <?php if (!empty($portfolio->portfolio_gambar) && file_exists(FCPATH . 'gambar/portfolio/' . $portfolio->portfolio_gambar)): ?>
                                                <img src="<?= base_url('gambar/portfolio/' . $portfolio->portfolio_gambar); ?>"
                                                     class="img-thumbnail mb-2"
                                                     width="120">
                                            <?php else: ?>
                                                <p><i>Tidak ada gambar</i></p>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Upload Gambar Baru -->
                                        <div class="form-group">
                                            <label><b>Ganti Gambar (Opsional)</b></label>
                                            <input type="file" name="gambar" class="form-control">
                                        </div>

                                        <!-- Tombol Update -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-block">
                                                <i class="fas fa-save"></i> Update
                                            </button>
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

</div>

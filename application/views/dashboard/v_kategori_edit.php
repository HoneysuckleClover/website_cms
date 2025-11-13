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

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 connectedSortable">

          <a href="<?= base_url('dashboard/kategori'); ?>">
            <button class="btn btn-sm btn-success">Kembali</button>
          </a>
          <br><br>

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-th"></i> Kategori Artikel 
                <small>Update Kategori</small>
              </h3>
            </div><!-- /.card-header -->

            <div class="card-body">
              <?php foreach ($kategori as $k) { ?>
                <form method="post" action="<?= base_url('dashboard/kategori_update'); ?>">
                  
                  <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="hidden" name="id" value="<?= $k->kategori_id; ?>">
                    <input type="text" name="kategori" class="form-control"
                      placeholder="Masukkan Nama Kategori..." 
                      value="<?= $k->kategori_nama; ?>" required>
                    <?= form_error('kategori'); ?>
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-sm btn-primary">
                  </div>

                </form>
              <?php } ?>
            </div><!-- /.card-body -->

          </div> <!-- /.card -->

        </div>
      </div>
    </div>
  </section><!-- /.content -->

</div>

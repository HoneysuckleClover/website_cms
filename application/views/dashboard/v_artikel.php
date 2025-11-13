<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><b>Data Artikel</b> <small>manajemen artikel</small></h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <!-- Tombol Tambah Artikel -->
            <div class="card-header">
              <a href="<?php echo base_url('dashboard/artikel_tambah'); ?>">
                <button class="btn btn-sm btn-success">
                  Buat Artikel Baru <i class="fas fa-plus"></i>
                </button>
              </a>
            </div>

            <!-- Tabel Artikel -->
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Tanggal</th>
                    <th>Judul Artikel</th>
                    <th>Penulis Artikel</th>
                    <th>Kategori Artikel</th>
                    <th width="10%">Gambar</th>
                    <th>Status</th>
                    <th width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach ($artikel as $a) { 
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo date('d/m/y H:i', strtotime($a->artikel_tanggal)); ?></td>
                    <td>
                      <?php echo $a->artikel_judul; ?><br>
                      <small class="text-muted"><?php echo base_url() . $a->artikel_slug; ?></small>
                    </td>
                    <td><?php echo $a->pengguna_nama; ?></td>
                    <td><?php echo $a->kategori_nama; ?></td>
                    <td>
                      <img width="100%" class="img-responsive" src="<?php echo base_url('gambar/artikel/' . $a->artikel_sampul); ?>">
                    </td>
                    <td>
                      <?php
                      if ($a->artikel_status == "publish") {
                        echo "<span class='badge badge-success'>Publish</span>";
                      } else {
                        echo "<span class='badge badge-danger'>Draft</span>";
                      }
                      ?>
                    </td>
                    <td>
                      <!-- Tombol Lihat -->
                      <a target="_blank" href="<?php echo base_url($a->artikel_slug); ?>">
                        <button class="btn btn-sm btn-success">
                          <i class="fa fa-eye"></i>
                        </button>
                      </a>
                      <!-- Tombol Edit -->
                      <a href="<?php echo base_url('dashboard/artikel_edit/' . $a->artikel_id); ?>">
                        <button class="btn btn-sm btn-warning">
                          <i class="nav-icon fas fa-edit"></i>
                        </button>
                      </a>
                      <!-- Tombol Hapus -->
                      <a href="<?php echo base_url('dashboard/artikel_hapus/' . $a->artikel_id); ?>" onclick="return confirm('Yakin Hapus Data Ini ?')">
                        <button class="btn btn-sm btn-danger">
                          <i class="nav-icon fas fa-trash"></i>
                        </button>
                      </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            
          </div><!-- /.card -->
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

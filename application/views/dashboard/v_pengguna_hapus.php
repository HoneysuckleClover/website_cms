<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <b>Data Pengguna</b>
                        <small>Pengguna website</small>
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

                    <a href="<?php echo base_url('dashboard/pengguna'); ?>">
                        <button class="btn btn-sm btn-success">Kembali</button>
                    </a>

                    <br><br>

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users"></i>
                                Pengguna Website
                                <small>konfirmasi hapus pengguna</small>
                            </h3>
                        </div>

                        <div class="card-body">

                            <p>
                                <b>Pengguna <?php echo $pengguna_hapus->pengguna_nama; ?></b> akan dihapus.
                                Dan semua artikel yang ditulis oleh
                                <b><?php echo $pengguna_hapus->pengguna_nama; ?></b> akan dipindahkan kepada:
                            </p>

                            <hr>

                            <form method="post" action="<?php echo base_url('dashboard/pengguna_hapus_aksi'); ?>">

                                <div class="form-group">
                                    <label>Nama Pengguna</label>

                                    <input type="hidden" name="pengguna_hapus" class="form-control"
                                           value="<?php echo $pengguna_hapus->pengguna_id; ?>">

                                    <select name="pengguna_tujuan" class="form-control" required>
                                        <option value="">--Pilih Pengguna Tujuan--</option>

                                        <?php foreach ($pengguna_lain as $pl) { ?>
                                            <option value="<?php echo $pl->pengguna_id; ?>">
                                                <?php echo $pl->pengguna_nama; ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit"
                                           value="Hapus Pengguna & Pindahkan Artikel"
                                           class="btn btn-block btn-primary">
                                </div>

                            </form>

                        </div><!-- /.card-body -->

                    </div><!-- /.card -->

                </div>

            </div>
        </div>
    </section>

</div>

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Pengguna</b> <small>Pengguna website</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
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
                                <i class="fas fa-users"></i> Pengguna Website 
                                <small>edit data pengguna</small>
                            </h3>
                        </div>

                        <div class="card-body">

                            <?php foreach ($pengguna as $p) { ?>

                                <form method="post" action="<?php echo base_url('dashboard/pengguna_update'); ?>">

                                    <input type="hidden" name="id" value="<?php echo $p->pengguna_id ?>">

                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="text" name="nama" class="form-control"
                                               placeholder="Masukan Nama pengguna..."
                                               value="<?php echo $p->pengguna_nama; ?>" required>
                                        <?php echo form_error('nama'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Email Pengguna</label>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Masukan Email pengguna..."
                                               value="<?php echo $p->pengguna_email; ?>" required>
                                        <?php echo form_error('email'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Username Pengguna</label>
                                        <input type="text" name="username" class="form-control"
                                               placeholder="Masukan Username..."
                                               value="<?php echo $p->pengguna_username; ?>" required>
                                        <?php echo form_error('username'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Password Pengguna</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Masukan Password baru (optional)">
                                        <small>Kosongkan jika tidak ingin merubah password.</small>
                                        <?php echo form_error('password'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Level Pengguna</label>
                                        <select class="form-control" name="level" required>
                                            <option value="">--Pilih Level--</option>
                                            <option value="admin" <?php echo ($p->pengguna_level == "admin") ? "selected" : ""; ?>>Admin</option>
                                            <option value="penulis" <?php echo ($p->pengguna_level == "penulis") ? "selected" : ""; ?>>Penulis</option>
                                        </select>
                                        <?php echo form_error('level'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Pengguna</label>
                                        <select class="form-control" name="status" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="1" <?php echo ($p->pengguna_status == "1") ? "selected" : ""; ?>>Aktif</option>
                                            <option value="0" <?php echo ($p->pengguna_status == "0") ? "selected" : ""; ?>>Tidak Aktif</option>
                                        </select>
                                        <?php echo form_error('status'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-block btn-primary">
                                    </div>

                                </form>

                            <?php } ?>

                        </div><!-- /.card-body -->
                    </div> <!-- /.card -->

                </div>

            </div>
        </div>
    </section>

</div>

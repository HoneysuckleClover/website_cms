<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <b>Dashboard</b>
                        <?php if ($this->session->userdata('level') == 'admin') : ?>
                            <small>Administrator</small>
                        <?php else : ?>
                            <small>Penulis</small>
                        <?php endif; ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- ========================= -->
                <!-- BOX ARTIKEL (SEMUA ROLE) -->
                <!-- ========================= -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $jumlah_artikel; ?></h3>
                            <p>Jumlah Artikel</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo base_url('dashboard/artikel'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- ========================= -->
                <!-- BOX KHUSUS ADMIN -->
                <!-- ========================= -->
                <?php if ($this->session->userdata('level') == 'admin') : ?>

                <!-- Box Kategori -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $jumlah_kategori; ?></h3>
                            <p>Jumlah Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url('dashboard/kategori'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Box Pengguna -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $jumlah_pengguna; ?></h3>
                            <p>Jumlah Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url('dashboard/pengguna'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Box Halaman -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $jumlah_halaman; ?></h3>
                            <p>Jumlah Halaman</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo base_url('dashboard/pages'); ?>" class="small-box-footer">
                            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <?php endif; ?>

            </div><!-- /.row -->

            <!-- ========================= -->
            <!-- CARD PROFIL (SEMUA ROLE) -->
            <!-- ========================= -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-home"></i> Informasi Akun
                            </h3>
                        </div>

                        <div class="card-body">
                            <h3>Selamat Datang 👋</h3>

                            <?php
                                $id_user = $this->session->userdata('id');
                                $user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id='$id_user'")->row();
                            ?>

                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">

                                    <tr>
                                        <th width="15%">Nama</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $user->pengguna_nama; ?></td>
                                    </tr>

                                    <tr>
                                        <th>Username</th>
                                        <th>:</th>
                                        <td><?php echo $this->session->userdata('username'); ?></td>
                                    </tr>

                                    <tr>
                                        <th>Hak Akses</th>
                                        <th>:</th>
                                        <td>
                                            <span class="badge badge-<?php echo ($this->session->userdata('level') == 'admin') ? 'danger' : 'info'; ?>">
                                                <?php echo ucfirst($this->session->userdata('level')); ?>
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        <td><span class="badge badge-success">Aktif</span></td>
                                    </tr>

                                </table>
                            </div>

                        </div><!-- /.card-body -->
                    </div>

                </section>
            </div>

        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

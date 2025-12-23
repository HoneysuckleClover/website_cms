<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Portofolio</b> <small>Kelola data portofolio</small></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Button Tambah -->
            <a href="<?= base_url('dashboard/portfolio_tambah'); ?>">
                <button class="btn btn-sm btn-success mb-3">
                    <i class="fas fa-plus"></i> Tambah Portofolio Baru
                </button>
            </a>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-briefcase"></i> Data Portofolio
                    </h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Judul Portofolio</th>
                                <th>Kategori</th>
                                <th width="10%">Gambar</th>
                                <th>Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($portfolio) && is_array($portfolio) && count($portfolio) > 0):
                            $no = 1;
                            foreach ($portfolio as $p):
                                $id     = isset($p->portfolio_id) ? $p->portfolio_id : '';
                                $judul  = isset($p->portfolio_judul) ? $p->portfolio_judul : '-';
                                $slug   = isset($p->portfolio_slug) ? $p->portfolio_slug : '';
                                $kat    = isset($p->kategori_nama) ? $p->kategori_nama : '-';
                                $gambar = isset($p->portfolio_gambar) ? $p->portfolio_gambar : '';
                                $status = isset($p->portfolio_status) ? $p->portfolio_status : 'draft';
                                $judul_html = htmlspecialchars($judul, ENT_QUOTES, 'UTF-8');
                                $kat_html   = htmlspecialchars($kat, ENT_QUOTES, 'UTF-8');
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?= $judul_html; ?>
                                    <br>
                                    <small class="text-muted"><?= base_url() . $slug; ?></small>
                                </td>
                                <td><?= $kat_html; ?></td>
                                <td>
                                    <?php if (!empty($gambar) && file_exists(FCPATH."gambar/portfolio/".$gambar)): ?>
                                        <img src="<?= base_url('gambar/portfolio/'.$gambar); ?>" alt="<?= $judul_html; ?>" style="width:100%; height:auto;">
                                    <?php elseif(!empty($gambar)): ?>
                                        <span class="text-warning">Gambar tidak ditemukan</span>
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada gambar</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (strtolower($status) === 'publish'): ?>
                                        <span class="badge badge-success">Publish</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a target="_blank" href="<?= base_url('portfolio/'.$p->portfolio_slug); ?>">
                                        <button class="btn btn-sm btn-success">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>

                                    <?php if ($id !== ''): ?>
                                        <a href="<?= base_url('dashboard/portfolio_edit/'.$id); ?>" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('dashboard/portfolio_hapus/'.$id); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada aksi</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data portofolio.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</div>

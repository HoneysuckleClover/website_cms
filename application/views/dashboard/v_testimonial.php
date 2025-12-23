<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <b>Testimonial</b>
                        <small>Kelola testimonial pengguna</small>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comments"></i> Data Testimonial
                    </h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama</th>
                                <th>Isi Testimonial</th>
                                <th width="12%">Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php if (!empty($testimonial)): ?>
                            <?php $no = 1; foreach ($testimonial as $t): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($t->testimonial_nama); ?></td>
                                    <td><?= nl2br(htmlspecialchars($t->testimonial_isi)); ?></td>
                                    <td>
                                        <?php if ($t->testimonial_status == 'pending'): ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Approved</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($t->testimonial_status == 'pending'): ?>
                                            <a href="<?= base_url('dashboard/testimonial_approve/'.$t->testimonial_id); ?>"
                                               class="btn btn-sm btn-success"
                                               title="Approve">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        <?php endif; ?>

                                        <a href="<?= base_url('dashboard/testimonial_hapus/'.$t->testimonial_id); ?>"
                                           onclick="return confirm('Yakin ingin menghapus testimonial ini?')"
                                           class="btn btn-sm btn-danger"
                                           title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    Belum ada testimonial masuk.
                                </td>
                            </tr>
                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</div>

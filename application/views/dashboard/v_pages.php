<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Halaman</b> <small>manajemen halaman website</small> </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url('dashboard/pages_tambah');?>">
                                <button class="btn btn-sm btn-success">
                                    Buat Halaman Baru <i class="fas fa-plus"></i>
                                </button>
                            </a>
                        </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Judul Halaman</th>
                                    <th>URL Slug</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($halaman as $h) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $h->halaman_judul;?></td>
                                    <td><?php echo base_url()."page/".$h->halaman_slug;?></td>
                                    <td>
                                        <a target="_blank" href="<?php echo base_url()."page/".$h->halaman_slug;?>">
                                            <button class="btn btn-sm btn-success "><i class="fa fa-eye"></i></button>
                                        </a>
                                        <a href="<?php echo base_url().'dashboard/pages_edit/'.$h->halaman_id;?>">
                                            <button class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                        </a>
                                        <a href="<?php echo base_url().'dashboard/pages_hapus/'.$h->halaman_id;?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="nav-icon fas fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

</div>
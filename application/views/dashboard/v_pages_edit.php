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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo base_url('dashboard/pages');?>"><button class="btn btn-sm btn-success">Kembali</button></a>
                <br><br>
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="nav-icon fas facopy"></i> Data Halaman <small> Edit Halaman Website</small>
                        </h3>
                    </div><!-- /.card-header -->
                <div class="card-body">
                    <?php
                    foreach ($halaman as $h) {
                    ?>
                    <form method="post" action="<?php echo base_url('dashboard/pages_update');?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Judul Halman</label>
                                    <input type="hidden" name="id" class="formcontrol" value="<?php echo $h->halaman_id?>">
                                    <input type="text" name="judul" class="formcontrol" placeholder="Masukan Judul Halaman . . ." value="<?php echo $h->halaman_judul;?>">
                                    <br>
                                    <?php echo form_error('judul');?>
                                </div>
                                <div class="form-group">
                                <label>Konten Halaman</label>

                                <?php echo form_error('konten');?>
                                <textarea class="formcontrol" name="konten" id="summernote">
                                    <?php echo $h->halaman_konten;?>
                                </textarea>
                            </div>
                        </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="submit" value="Publish" class="btn btn-sm btn-success btn-block">
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </form>
                    <?php
                        }
                    ?>
                </div><!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section><!-- /.content -->
</div>
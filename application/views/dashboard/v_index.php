
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
                <b>Dashboard</b>
                <small>Control Panel</small>
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
      <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fahome"></i> Dashboard</h3>
      </div><!-- /.card-header -->
      <div class="card-body">
        <?php
            $id_user = $this->session->userdata('id');
            $user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
        ?>
        Anda Berhasil Login <br>
        Anda login sebagai <?php echo $user->pengguna_nama; ?> <br>
            Id Pengguna : <?php echo $this->session->userdata('id') ?> <br>
            Username : <?php echo $this->session->userdata('username') ?><br>
            Level : <?php echo $this->session->userdata('level') ?><br>
                
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
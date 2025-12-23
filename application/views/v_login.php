<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/adminlte/plugins/fontawesome-free/css/all.min.css' ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/adminlte/dist/css/adminlte.min.css' ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
   <?php
   if (isset($_GET['alert'])) {
    if ($_GET['alert']=='gagal') {
        echo "
        <div class='alert alert-danger font-weight-bold text-center'>
         Maaf! Username & Password Salah.
        </div>
        ";
    } elseif ($_GET['alert']=="belum_login"){
        echo "
         <div class='alert alert-danger font-weight-bold text-center'>
           Anda Harus Login Terlebih Dulu!
         </div>
        ";
    } elseif($_GET['alert']=="logout"){
        echo "
         <div class='alert alert-danger font-weight-bold text-center'>
           Anda Telah Logout!
         </div>
        ";
    }
   }
   ?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="assets/index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url().'login/aksi' ?>" method="post">
        <div class="input-group mb-3">
          <input type="Username" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('username'); ?>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password'); ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>

            <p class="mb-0 text-center">
              <a href="<?= base_url('register') ?>">Daftar akun baru</a>
            </p>

          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url().'assets/adminlte/plugins/jquery/jquery.min.js' ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url().'assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/adminlte/dist/js/adminlte.min.js' ?>"></script>
</body>
</html>

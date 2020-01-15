<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?= base_url('assets/') ?>img/logo.png" />

  <title>Login Page Administrator</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>css/sb-admin-2.css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container" style="margin-top:120px;">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body pt-3 pb-3">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block pt-3 pb-3 pl-5">
                <img src="<?= base_url('assets/') ?>img/logo.png" class="d-block w-100" width="100%" height="100%">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <?php if($this->session->flashdata('pesan')) :?>
                      <?= $this->session->flashdata('pesan'); ?>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('gagal')) :?>
                      <?= $this->session->flashdata('gagal'); ?>
                    <?php endif; ?>
                    <h1 class="h4 text-gray-900 mb-4">Admin BPS Monitoring</h1>
                  </div>
                  <form class="user" method="post" action="<?= base_url('loginadmin'); ?>">
                  <?php //echo validation_errors(); ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                      <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                      <?php echo form_error('password'); ?>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">Login</button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>
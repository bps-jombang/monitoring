<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">



            <div id="content">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border border-primary" style="width: 18rem;">
                                <br>
                                <img src="<?= base_url('assets/') ?>img/man.png" class="card-img-top" alt="...">
                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title text-dark font-weight-bold">Tria M</h5>
                                    <p class="card-text text-dark font-weight-bold">Kasie IPDS</p>
                                    <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Edit Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <h3 class="font-weight-bold text-dark">Ganti Password</h3>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark" for="exampleInputPassword1">Password Lama</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark" for="exampleInputPassword1">Password Baru</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <a class="btn btn-primary btn-lg btn-block text-white" >Ganti Password</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
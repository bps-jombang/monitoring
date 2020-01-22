
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border border-primary" style="width: 18rem;">
                                <br>
                                <!-- <img src="<?= base_url('assets/') ?>img/man.png" alt="..." class="img-thumbnail"> -->
                                <img src="<?= base_url('assets/') ?>img/man.png" class="card-img-top" >
                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title text-dark font-weight-bold"><?= strtoupper($this->session->userdata('username')) ?></h5>
                                    <p class="card-text text-dark font-weight-bold"><span class="badge badge-primary"><?php if($this->session->userdata('id_role') == 1): ?>Superadmin
                                    <?php else : ?>Admin <?php endif;?></span></p>
                                    <a class="btn btn-primary btn-lg btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Edit Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                <form action="<?= base_url('Page/updatepass/'.$this->session->userdata('id_admin')) ?>" method="post">
                                    <h3 class="font-weight-bold text-dark">Ganti Password</h3>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark" for="exampleInputPassword1">Password Lama</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark" for="exampleInputPassword1">Password Baru</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block text-white" >Ganti Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            
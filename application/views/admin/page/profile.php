
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card border mb-5" style="width: 18rem;">
                                <br>
                                 <img src="<?= base_url('assets/') ?>img/man.png" class="card-img-top" >
                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title text-dark font-weight-bold"><?= strtoupper($this->session->userdata('username')) ?></h5>
                                    <p class="card-text text-dark font-weight-bold"><span class="badge badge-primary"><?php if($this->session->userdata('id_role') == 1): ?>Superadmin
                                    <?php else : ?>Admin <?php endif;?></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-1">
                            <div class="card">
                                <h5 class="card-header">Update Password</h5>
                                <div class="card-body">
                                    <form method="post" action="<?= base_url('update') ?>">
                                        <div class="form-group">
                                        <?= $this->session->flashdata('pesan'); ?>
                                            <label for="passlama">Password lama</label>
                                            <input type="password" class="form-control" name="passlama" id="passlama">
                                            <?= form_error('passlama', '<p class="text-danger pt-2" style="opacity: 0.8">*', '</p>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="passbaru">Password baru</label>
                                            <input type="password" class="form-control" name="passbaru" id="passbaru">
                                            <?= form_error('passbaru', '<p class="text-danger pt-2" style="opacity: 0.8">*', '</p>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="passkonfir">Password konfirmasi</label>
                                            <input type="password" class="form-control" name="passkonfir" id="passkonfir">
                                            <?= form_error('passkonfir', '<p class="text-danger pt-2" style="opacity: 0.8">*', '</p>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Update Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            
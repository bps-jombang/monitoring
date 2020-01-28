
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $menuform[0] ?>
          </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $menuform[8] ?></h6>
                </div>
                
                
                <div class="card-body">
                    <form action="<?= base_url('addadmin') ?>" method="post">
                  <?= $this->session->flashdata('usernamesama'); ?>
                
                        <div class="form-group">
                        <?= form_error('username','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="username">Username Admin</label>
                            <input type="text" class="form-control" name="username" id="username">
                            <p class="text-danger pt-2" style="opacity: 0.8">* username wajib huruf kecil (password seperti username)</p>
                        </div>
                        <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="check" id="check">
                          <label class="custom-control-label" for="check">Ceklis jika ingin menambah superadmin</label>
                        </div>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Simpan Data</button>
                          </div>
                    </form>
                </div>
              </div>

            </div>

            <!-- table results -->
            <div class="col-lg-6">
              <div class="table-responsive">
                <table id="dtablemitra" class="display table table-bordered"width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Username Admin</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($listadmin as $admin) : ?>
                    <?php if($admin['id_admin'] == $this->session->userdata('id_admin')) continue;?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($admin['username'])) ?>
                            <?php if($admin['id_role'] == 1) :?>
                            <span class="badge badge-primary float-right mt-1">Superadmin</span>
                            <?php endif;?></td>
                            <td class="text-center">
                            <a href="<?= base_url('editadmin/'.$admin['id_admin']) ?>"   
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $admin['id_admin']; ?>" class="btn btn-danger btn-sm tombol-hapus-admin"><i class="fas fa-trash"></i> Hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

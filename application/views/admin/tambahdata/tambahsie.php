
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $sidebar["Seksi"] ?>
          </div>
            
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $nama_form; ?></h6>
                </div>
                <div class="card-body">
                  <?php echo validation_errors(); ?>
                    <form action="<?= base_url('seksi') ?>" method="post">
                      <?php if($this->session->flashdata('pesan')) : ?>
                        <div class="form-group">
                          <?= $this->session->flashdata('pesan'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="nama_seksi">Nama Seksi</label>
                            <input type="text" class="form-control" name="nama_seksi" id="nama_seksi">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fas-send"></i>Simpan Data</button>
                          <button class="btn btn-md btn-default" type="reset" name="reset"><i class="fas fas-send"></i>Reset</button>
                        </div>
                    </form>
                </div>
              </div>

            </div>

            <!-- table results -->
            <div class="col-lg-5 offset-1">
                  <div class="table-responsive">
                      <table class="table table-condensed">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Seksi</th>
                                  <th colspan="2" class="text-center">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach($listseksi as $list) : ?>
                              <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $list['nama_seksi'] ?></td>
                                  <td class="text-center">
                                    <a href="<?= $list['id_seksi'] ?>" data-target="#editdata" data-toggle="modal" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                  </td>
                              </tr>
                            <?php endforeach;?>
                          </tbody>
                      </table>
                  </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

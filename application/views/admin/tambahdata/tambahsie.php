
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $sidebar["Seksi"] ?>
          </div>
            <?php if($this->session->flashdata('hapus')) :?>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-6">
                  <div class="pesan alert alert-success alert-dismissible fade show" id="pesan" role="alert">
                      Data <strong>Berhasil Dihapus!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                </div>
              </div>
            <?php elseif($this->session->flashdata('pesan')) : ?>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-6">
                  <div class="pesan alert alert-success alert-dismissible fade show" id="pesan" role="alert">
                      Data <strong>Berhasil Ditambahkan!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                </div>
              </div>
            <?php endif; ?>
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $nama_form; ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('seksi') ?>" method="post">
                        <div class="form-group">
                          <?= form_error('nama_seksi','<div class="alert alert-warning mt-3">','</div>'); ?>
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
                          <thead class=" testing-tabel">
                              <tr>
                                  <th class="text-center">No</th>
                                  <th class="text-center">Nama Seksi</th>
                                  <th colspan="2" class="text-center">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach($listseksi as $seksi) : ?>
                              <tr>
                                  <th scope="row" class="text-center"><?= $no++; ?></td>
                                  <td class="text-center"><?= $seksi['nama_seksi'] ?></td>
                                  <td class="text-center">
                                    <a href="<?= $seksi['id_seksi'] ?>" data-target="#editdata" data-toggle="modal" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('hapusdata/'.$seksi['id_seksi']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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

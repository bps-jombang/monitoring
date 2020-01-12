
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $sidebar["Kegiatan"] ?>
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
                    <form action="<?= base_url('kegiatan') ?>" method="post">
                        <?php if($this->session->flashdata('pesan')) : ?>
                        <div class="form-group">
                          <span class="alert alert-success">Data berhasil <?= $this->session->flashdata('pesan'); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="uraian_kegiatan">Uraian Kegiatan</label>
                            <input type="text" class="form-control" name="uraian_kegiatan" id="uraian_kegiatan">
                        </div>
                        <div class="form-group">
                            <label for="vol">Volume</label>
                            <input type="text" class="form-control" name="vol" id="vol">
                        </div>
                        <div class="form-group">
                            <label for="target_penyelesaian">Target Penyelesaian</label>
                            <select name="target_penyelesaian" class="form-control" id="target_penyelesaian">
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="April">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan">
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
                              <tr>
                                  <td>1</td>
                                  <td>Testing</td>
                                  <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

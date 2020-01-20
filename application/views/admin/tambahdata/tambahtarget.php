
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray"><?= $menuform[5] ?>
          </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-8">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $menuform[8] ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('targetuser') ?>" method="post">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="input_kegiatan">Pilih Kegiatan</label>
                            <select name="input_kegiatan" id="input_kegiatan" class="selectpicker form-control input_kegiatan" title="Cari Nama Kegiatan" data-live-search="true">
                              <?php foreach($listkegiatan as $kegiatan):?>
                                <option value="<?= $kegiatan['id_kegiatan'] ?>"><?= $kegiatan['uraian_kegiatan'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="input_user">Anggota</label>
                            <select id="input_user" name="input_user" class="selectpicker form-control" title="Cari Nama Anggota" data-live-search="true">
                              <?php foreach($listuser as $user):?>
                              <option value="<?= $user['id_user']; ?>"><?= $user['nama_user']; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-5">
                            <label for="input_target">Target</label>
                            <input type="text" class="form-control" name="input_target" id="input_target">
                            <?= form_error('input_target','<div class="alert alert-warning mt-3">','</div>'); ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Simpan Data</button>
                          <button class="btn btn-md btn-default resetyo" type="reset" name="reset"><i class="fas fa-sync-alt"></i> Reset</button>
                        </div>
                    </form>
                </div>
              </div>

            </div>
            <!-- table results
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
            </div> -->

          </div>

        </div>
        <!-- /.container-fluid -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray"><?= $menuform[5] ?>
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
                            <select id="input_user" name="input_user" data-show-subtext="true" class="selectpicker form-control" title="Cari Nama Anggota" data-live-search="true">
                              <?php foreach($userkec as $user):?>
                              <option value="<?= $user['id_user']; ?>" data-subtext="<?= $user['nama_kecamatan'] ?>"><?= $user['nama_user']; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-5">
                            <label for="target_user">Target</label>
                            <input type="text" class="form-control" name="target_user" id="target_user">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="input_pejabat">Pejabat</label>
                            <select id="input_pejabat" name="input_pejabat" data-show-subtext="true" class="selectpicker form-control"  title="Cari Nama Pejabat" data-live-search="true">
                              
                              <?php foreach($listpejabat as $pejabat):?>
                              <option value="<?= $pejabat['id_pejabat']; ?>" 
                              data-subtext="<?= $pejabat['nama_jabatan']; ?> <?= $pejabat['nama_seksi']; ?>"><?= $pejabat['nama_user']; ?> </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-5">
                            <label for="target_pejabat">Target</label>
                            <input type="text" class="form-control" name="target_pejabat" id="target_pejabat">
                          </div>
                        </div>
                          <p class="text-danger" style="opacity: 0.8">* pejabat & anggota <b>boleh tidak dipilih salah satu.<b></p>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Simpan Data</button>
                        </div>
                    </form>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

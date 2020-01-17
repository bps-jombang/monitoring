
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray"><?= $sidebar["Kegiatan"] ?>
          </div>
            
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-8">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $nama_form; ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('kegiatan') ?>" method="post">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="nama_kegiatan">Nama Kegiatan (Uraian Kegiatan)</label>
                            <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan">
                            <?= form_error('nama_kegiatan','<div class="alert alert-warning mt-3">','</div>'); ?>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="input_seksi">Seksi</label>
                            <select name="input_seksi" id="input_seksi" class="form-control">
                              <option selected>Pilih Seksi</option>
                              <?php foreach($listseksi as $seksi):?>
                              <option value="<?= $seksi['id_seksi']; ?>"><?= $seksi['nama_seksi']; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="input_vol">Volume</label>
                            <input type="text" class="form-control" name="input_vol" id="input_vol">
                            <?= form_error('input_vol','<div class="alert alert-warning mt-3">','</div>'); ?>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="input_satuan">Satuan</label>
                            <input type="text" class="form-control" name="input_satuan" id="input_satuan">
                            <?= form_error('input_satuan','<div class="alert alert-warning mt-3">','</div>'); ?>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="target_penyelesaian">Target Penyelesaian</label>
                            <select name="target_penyelesaian" class="form-control" id="target_penyelesaian">
                              <option selected>Pilih Bulan</option>
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
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Simpan Data</button>
                          <button class="btn btn-md btn-default" type="reset" name="reset"><i class="fas fa-sync-alt"></i> Reset</button>
                        </div>
                    </form>
                </div>
              </div>

            </div>

            <div class="col-lg-4">
              <?php if($this->session->flashdata('pesan')) : ?>
                <?= $this->session->flashdata('pesan');?>
              <?php endif; ?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

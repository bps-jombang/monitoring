
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
            <a href="<?= base_url('listkegiatan'); ?>" class="btn btn-default btn-md"><i class="fas fa-angle-left"></i> Back</a>Ubah Kegiatan</h1>
          </div>

          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('editkegiatan/'.$listkegiatan['id_kegiatan']) ?>" method="post">
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="nama_kegiatan">Nama Kegiatan (Uraian Kegiatan)</label>
                            <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="<?= $listkegiatan["uraian_kegiatan"];?>">
                            <?= form_error('nama_kegiatan','<div class="alert alert-warning mt-3">','</div>'); ?>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="input_seksi">Seksi</label>
                            <select name="input_seksi" id="input_seksi" class="form-control">
                              <option selected>Pilih Seksi</option>
                              <?php foreach($listseksi as $seksi):?>
                              <option value="<?= $seksi['id_seksi']; ?>" <?php if($seksi['id_seksi'] == $listkegiatan['id_seksi']) : echo 'selected';endif?>><?= $seksi['nama_seksi']; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="input_vol">Volume</label>
                            <input type="text" class="form-control" name="input_vol" id="input_vol" value="<?= $listkegiatan["vol"];?>">
                            <?= form_error('input_vol','<div class="alert alert-warning mt-3">','</div>'); ?>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="input_satuan">Satuan</label>
                            <input type="text" class="form-control" name="input_satuan" id="input_satuan" value="<?= $listkegiatan["satuan"];?>">
                            <?= form_error('input_satuan','<div class="alert alert-warning mt-3">','</div>'); ?>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="target_penyelesaian">Target Penyelesaian</label>
                            <select name="target_penyelesaian" class="form-control" id="target_penyelesaian">
                              <option>Pilih Bulan</option>
                              
                                <option value="Januari" <?php if($listkegiatan['target_penyelesaian'] == "Januari") : echo 'selected';endif;?>>Januari</option>
                                <option value="Februari"<?php if($listkegiatan['target_penyelesaian'] == "Februari") : echo 'selected';endif;?>>Februari</option>
                                <option value="Maret"<?php if($listkegiatan['target_penyelesaian'] == "Maret") : echo 'selected';endif;?>>Maret</option>
                                <option value="April"<?php if($listkegiatan['target_penyelesaian'] == "April") : echo 'selected';endif;?>>April</option>
                                <option value="April"<?php if($listkegiatan['target_penyelesaian'] == "Mei") : echo 'selected';endif;?>>Mei</option>
                                <option value="Juni"<?php if($listkegiatan['target_penyelesaian'] == "Juni") : echo 'selected';endif;?>>Juni</option>
                                <option value="Juli"<?php if($listkegiatan['target_penyelesaian'] == "Juli") : echo 'selected';endif;?>>Juli</option>
                                <option value="Agustus"<?php if($listkegiatan['target_penyelesaian'] == "Agustus") : echo 'selected';endif;?>>Agustus</option>
                                <option value="September"<?php if($listkegiatan['target_penyelesaian'] == "September") : echo 'selected';endif;?>>September</option>
                                <option value="Oktober"<?php if($listkegiatan['target_penyelesaian'] == "Oktober") : echo 'selected';endif;?>>Oktober</option>
                                <option value="November"<?php if($listkegiatan['target_penyelesaian'] == "November") : echo 'selected';endif;?>>November</option>
                                <option value="Desember" <?php if($listkegiatan['target_penyelesaian'] == "Desember") : echo 'selected';endif;?>>Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Simpan Data</button>
                          </div>
                    </form>
                </div>
              </div>

            </div>

            <!-- table results -->
            <div class="col-lg-5 offset-1">
              <div class="table-responsive">
                <table id="dtablemitra" class="display table table-bordered"width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Seksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($allkeg as $keg) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($keg['uraian_kegiatan'])) ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
        <!-- /.container-fluid -->

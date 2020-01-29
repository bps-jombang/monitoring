
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><a href="<?= base_url('pejabat'); ?>" class="btn btn-default btn-md text-grey"><i class="fas fa-arrow-left"></i> Kembali</a> Edit Pejabat
          </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('editpejabat/'.$listpejabat['id_pejabat']) ?>" method="post">
                        <div class="form-group">
                            <?= form_error('nama_pejabat','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_pejabat">Nama Pejabat</label>
                            <input type="text" class="form-control" name="nama_pejabat" id="nama_pejabat" value="<?= $listpejabat['nama_user'] ?>">
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="input_seksi">Seksi</label>
                            <select name="input_seksi" id="input_seksi" class="form-control">
                              <option value="0">Pilih Seksi</option>
                              <?php foreach($listseksi as $seksi):?>
                              <option value="<?= $seksi['id_seksi']; ?>"<?php if($seksi['id_seksi'] == $listpejabat['id_seksi']) : echo 'selected';endif?>><?= $seksi['nama_seksi']; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                            <div class="form-group col-md-6">
                                <label for="input_jabatan">Jabatan</label>
                              <select name="input_jabatan" id="input_jabatan" class="form-control">
                                <option value="0">Pilih Jabatan</option>
                                <?php foreach($listjabatan as $jabatan):?>
                                <option value="<?= $jabatan['id_jabatan']; ?>"<?php if($jabatan['id_jabatan'] == $listpejabat['id_jabatan']) : echo 'selected';endif?>><?= $jabatan['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          <?php if($this->session->flashdata('seksi')) : ?><p class="text-danger pt-2" style="opacity: 0.8">* seksi harus dipilih</p><?php endif;?>
                          <?php if($this->session->flashdata('jabatan')) : ?><p class="text-danger pt-2" style="opacity: 0.8">* jabatan harus dipilih</p><?php endif;?>
                          <?php if($this->session->flashdata('seksijabatan')) : ?><p class="text-danger pt-2" style="opacity: 0.8">* seksi & jabatan harus dipilih</p><?php endif;?>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Update Data</button>
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
                            <th>Nama Jabatan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($allpejabat as $pejabat) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($pejabat['nama_user'])) ?><?php foreach($listjabatan as $jabatan) :?>
                            <?php foreach($listseksi as $seksi) :?>
                        <?php if($seksi["id_seksi"] == $pejabat["id_seksi"] && $jabatan["id_jabatan"] == $pejabat["id_jabatan"]) :?>
                            <span class="badge badge-primary float-right mt-1"><?= $pejabat["nama_seksi"] ?></span>
                            <?php if($jabatan["id_jabatan"] == 1) :?>
                            <span class="badge badge-success float-right mt-1 mr-2"><?= $pejabat["nama_jabatan"] ?></span>
                            <?php else :?>
                            <span class="badge badge-default float-right mt-1 mr-2"><?= $pejabat["nama_jabatan"] ?></span>
                            <?php endif;?>
                        <?php endif;?>
                            <?php endforeach;?>
                                    <?php endforeach;?></td></td>
                            <td class="text-center">
                            <a href="<?= base_url('editpejabat/'.$pejabat['id_pejabat']) ?>"   
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $pejabat['id_pejabat']; ?>" class="btn btn-danger btn-sm tombol-hapus-pejabat"><i class="fas fa-trash"></i> Hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

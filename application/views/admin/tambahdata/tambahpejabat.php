
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $menuform[3] ?>
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
                    <form action="<?= base_url('pejabat') ?>" method="post">
                        <div class="form-group">
                        <?= form_error('nama_user','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_user">Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_user" id="nama_user">
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
                            <div class="form-group col-md-6">
                                <label for="input_jabatan">Jabatan</label>
                              <select name="input_jabatan" id="input_jabatan" class="form-control">
                                <option selected>Pilih Jabatan</option>
                                <?php foreach($listjabatan as $jabatan):?>
                                <option value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                              </select>
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
                            <th>Nama Anggota</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($listpejabat as $pejabat) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($pejabat['nama_user'])) ?>
                            <?php foreach($listjabatan as $jabatan) :?>
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
                                    <?php endforeach;?></td>
                            
                            <td class="text-center">
                            <a href="<?= base_url('user/edituser/'.$pejabat['id_pejabat']) ?>"   
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

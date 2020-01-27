
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $menuform[9] ?>
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
                    <form action="<?= base_url('user') ?>" method="post">
                        <div class="form-group">
                        <?= form_error('nama_user','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_user">Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_user" id="nama_user">
                        </div>
                        <div class="form-group">
                            <label for="input_kecamatan">Kecamatan</label>
                            <select name="input_kecamatan" id="input_kecamatan" class="selectpicker form-control" title="Cari Kecamatan" data-live-search="true">
                              <?php foreach($listkecamatan as $kecamatan):?>
                              <option value="<?= $kecamatan['id_kecamatan']; ?>"><?= $kecamatan['nama_kecamatan']; ?></option>
                              <?php endforeach; ?>
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
                    <?php $no=1; foreach($listuser as $user) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($user['nama_user'])) ?>
                            <td class="text-center">
                            <a href="<?= base_url('edituser/'.$user['id_user']) ?>"   
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $user['id_user']; ?>" class="btn btn-danger btn-sm tombol-hapus-user"><i class="fas fa-trash"></i> Hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

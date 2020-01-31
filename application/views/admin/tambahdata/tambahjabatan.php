
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $menuform[4] ?>
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
                    <form action="<?= base_url('jabatan') ?>" method="post">
                        <div class="form-group">
                            <?= form_error('nama_jabatan','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan">
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
                            <th>Nama Jabatan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($listjabatan as $jabatan) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($jabatan['nama_jabatan'])) ?>
                            <td class="text-center">
                            <a href="<?= base_url('editjabatan/'.$jabatan['id_jabatan']) ?>"   
                            class="btn btn-warning btn-sm btn-detail-jabatan" data-id="<?= $jabatan['id_jabatan']; ?>"
                            data-nama="<?= ucwords(strtolower($jabatan['nama_jabatan'])) ?>" data-target="#modalku" data-toggle="modal">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $jabatan['id_jabatan']; ?>" class="btn btn-danger btn-sm tombol-hapus-jabatan"><i class="fas fa-trash"></i> Hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->
        <div class="modal fade" style="margin-top:100px;" id="modalku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <form id="formupdatejabatan" action="" method="post">
                      <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" hidden>
                      <div class="form-group">
                        <label for="modal_namajabatan">Nama Jabatan</label>
                        <input type="text" class="form-control" name="modal_namajabatan" id="modal_namajabatan">
                      </div>
                      <button type="submit" class="btn btn-md btn-primary" id="btn-update"><i class="fas fa-sync-alt"></i> Update Data</button>
                      <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                  </form>
              </div>
            </div>
          </div>
        </div>


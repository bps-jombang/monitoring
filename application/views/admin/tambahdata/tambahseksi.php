
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $menuform[1] ?>
          </div>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6 col-12">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $menuform[8] ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('seksi') ?>" method="post">
                        <div class="form-group">
                          <?= form_error('nama_seksi','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_seksi">Nama Seksi</label>
                            <input type="text" class="form-control" name="nama_seksi" id="nama_seksi">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Simpan Data</button>
                          <button class="btn btn-md btn-default" type="reset" name="reset"><i class="fas fa-sync-alt"></i> Reset</button>
                        </div>
                    </form>
                </div>
              </div>

            </div>

            <!-- table results -->
            <div class="col-12 col-lg-6">
              <div class="table-responsive">
                <table id="dtablemitra" class="display table table-bordered"width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Seksi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($listseksi as $seksi) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $seksi['nama_seksi'] ?>
                            <td class="text-center">
                            <a href="<?= base_url('Admin/editseksi/'.$seksi['id_seksi']); ?>"   
                            class="btn btn-warning btn-sm modal-update-seksi" 
                            data-id="<?= $seksi['id_seksi']; ?>" 
                            data-seksi="<?= $seksi['nama_seksi']; ?>">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $seksi['id_seksi']; ?>" class="btn btn-danger btn-sm tombol-hapus-seksi"><i class="fas fa-trash"></i> Hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Edit Modal-->
        <div class="modal fade" style="margin-top:150px;" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Form Edit Seksi</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                      <input type="text" hidden class="form-control" name="id_seksi_edit" id="id_seksi_edit">
                      <label for="nama_seksi_edit">Nama Seksi</label>
                      <input type="text" class="form-control" name="nama_seksi_edit" id="nama_seksi_edit">
                    </div>
                    <button class="btn btn-primary" type="submit" id="btn_update"><i class="fas fa-sync-alt"></i> Update Data</a>
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                </form>
              </div>
              <!-- <div class="modal-footer">
              </div> -->
            </div>
          </div>
        </div>

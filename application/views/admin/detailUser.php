        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
            <a href="<?= base_url('listkegiatan'); ?>" class="btn btn-default btn-md"><i class="fas fa-angle-left"></i> Back</a>
                Kegiatan Detail User
          </div>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-3">
              <div class="card shadow mb-4">
              <div class="card-header py-3">
              <?php if($this->uri->segment(3) == "user") :  ?>
                    <?php foreach($userdetail as $user) : ?>
                    <h6 class="m-0 font-weight-bold"><?= $user['nama_user']; ?> <span class="badge badge-primary float-right px-2 py-1"><?= $user['nama_kecamatan']; ?></span></h6>
                    <?php endforeach; ?>
              <?php elseif($this->uri->segment(3) == "pejabat") : ?>
                    <?php foreach($pejabatdetail as $pejabat) : ?>
                    <h6 class="m-0 font-weight-bold"><?= $pejabat['nama_user']; ?> <span class="badge badge-primary float-right px-2 py-1"><?= $pejabat['nama_jabatan']; ?> <?= $pejabat['nama_seksi']; ?> </span></h6>
                    <?php endforeach; ?>
              <?php elseif($this->uri->segment(3) == "mitra") : ?>
                    <?php foreach($mitradetail as $mitra) : ?>
                    <h6 class="m-0 font-weight-bold"><?= $mitra['nama_mitra']; ?> </h6>
                    <?php endforeach; ?>
              <?php endif;?>
                  </div>
                <div class="card-body">
                    <img src="<?= base_url('assets/') ?>img/man.png" class="thumbnail w-100 h-50">
                </div>
              </div>

            </div>

            <!-- table results -->
            <div class="col-lg">
              <div class="table-responsive">
                <table id="dtablemitra" class="display table table-bordered"width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Nama Kegiatan</th>
                            <th>Target</th>
                            <th>Realisasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($kegiatandetail as $kegiatan) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($kegiatan['uraian_kegiatan'])) ?></td>
                            <td><?= $kegiatan['target'] ?></td>
                            <td><?= $kegiatan['realisasi']; ?></td>
                            <td class="text-center"><a href="#"
                            <?php if($this->uri->segment(3) == "user") : ?>
                              class="btn btn-warning btn-sm btn-detail-user"
                              data-usersid="<?= $kegiatan['id_user']; ?>" 
                            <?php elseif($this->uri->segment(3) == "pejabat") : ?>
                              class="btn btn-warning btn-sm btn-detail-pejabat"
                              data-usersid="<?= $kegiatan['id_pejabat']; ?>" 
                            <?php elseif($this->uri->segment(3) == "mitra") : ?>
                              class="btn btn-warning btn-sm btn-detail-mitra"
                              data-usersid="<?= $kegiatan['id_mitra']; ?>" 
                            <?php endif;?> 
                            data-id="<?= $kegiatan['id_kegiatan_detail']; ?>" 
                            data-realisasi="<?= $kegiatan['realisasi']; ?>" 
                            data-targetuser="<?= $kegiatan['target'] ?>" 
                            data-uraian="<?= ucwords(strtolower($kegiatan['uraian_kegiatan'])) ?>"
                            data-toggle="modal" data-target="#modalku">
                            <i class="fas fa-edit"></i> Edit</a> 
                            <a href="#" id="<?= $kegiatan['id_kegiatan_detail']; ?>" class="btn btn-danger btn-sm tombol-hapus-kegiatan-detail"><i class="fas fa-trash"></i> Hapus</a></td>
                        
                            </td>
                            </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        
        <div class="modal fade" style="margin-top:20px;" id="modalku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <form id="formupdate" action="" method="post">
                      <input type="text" class="form-control" name="idkegdet" id="idkegdet" hidden>

                      <?php if($this->uri->segment(3) == "user") : ?>
                      <input type="text" class="form-control" name="iduser" id="iduser" hidden> 

                      <?php elseif($this->uri->segment(3) == "pejabat") : ?>
                      <input type="text" class="form-control" name="idpejabat" id="idpejabat" hidden> 

                      <?php elseif($this->uri->segment(3) == "mitra") : ?>
                      <input type="text" class="form-control" name="idmitra" id="idmitra" hidden>
                      <?php endif;?> 

                      <div class="form-group">
                        <label for="uraian_kegiatan">Uraian Kegiatan</label>
                        <input type="text" class="form-control" name="uraian_kegiatan" id="uraian_kegiatan" disabled>
                      </div>
                      <div class="form-group">
                        <label for="target">Target</label>
                        <input type="number" class="form-control" name="target" id="target">
                      </div>
                      <div class="form-group">
                        <label for="realisasi">Realisasi</label>
                        <input type="number" class="form-control" name="realisasi" id="realisasi">
                      </div>
                      <button type="submit" class="btn btn-md btn-primary" id="btn-update"><i class="fas fa-sync-alt"></i> Update Data</button>
                      <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                  </form>
              </div>
            </div>
          </div>
        </div>

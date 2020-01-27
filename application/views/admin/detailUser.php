        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kegiatan Detail User
          </div>
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    
          <div class="row">

            <!-- form input data -->
            <div class="col-lg-3">
              <div class="card mb-4">
              <div class="card-header py-3">
              <?php foreach($userdetail as $user) : ?>
                  <h6 class="m-0 font-weight-bold"><?= $user['nama_user']; ?> <span class="badge badge-primary float-right px-2 py-1"><?= $user['nama_kecamatan']; ?></span></h6>
                  <?php endforeach; ?>
                </div>
                <div class="card-body">
                    <img src="<?= base_url('assets/') ?>img/man.png" class="thumbnail w-100 h-50">
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('listkegiatan'); ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
              </div>

            </div>

            <!-- table results -->
            <div class="col-lg-6">
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
                            <td><?= $kegiatan['realisasi'] ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/editadmin/'.$kegiatan['id_kegiatan_detail']) ?>"   
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $kegiatan['id_kegiatan_detail']; ?>" class="btn btn-danger btn-sm tombol-hapus-admin"><i class="fas fa-trash"></i> Hapus</a></td>
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

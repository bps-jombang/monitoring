
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $menuform[7] ?>
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
                    <form action="<?= base_url('mitra') ?>" method="post">
                        <div class="form-group">
                          <?= form_error('nama_mitra','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_mitra">Nama Mitra</label>
                            <input type="text" class="form-control" name="nama_mitra" id="nama_mitra">
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
                            <th>Nama Mitra</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($listmitra as $mitra) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($mitra['nama_mitra'])) ?></td>
                            <td class="text-center">
                            <a href="<?= base_url('Admin/editmitra/'.$mitra['id_mitra']); ?>"   
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $mitra['id_mitra']; ?>" class="btn btn-danger btn-sm tombol-hapus-mitra"><i class="fas fa-trash"></i> Hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


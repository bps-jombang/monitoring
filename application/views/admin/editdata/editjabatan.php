
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
                    <form action="<?= base_url('editjabatan/'.$listjabatan['id_jabatan']) ?>" method="post">
                        <div class="form-group">
                            <?= form_error('nama_jabatan','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_jabatan">Nama Pejabat</label>
                            <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" value="<?= $listjabatan['nama_jabatan'] ?>">
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
                    <?php $no=1; foreach($alljabatan as $jabatan) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $jabatan['nama_jabatan']; ?></td>
                            
                            <td class="text-center">
                            <a href="<?= base_url('editjabatan/'.$jabatan['id_jabatan']) ?>"   
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit</a>
                            <a href="#" id="<?= $jabatan['id_jabatan']; ?>" class="btn btn-danger btn-sm tombol-hapus-pejabat"><i class="fas fa-trash"></i> Hapus</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

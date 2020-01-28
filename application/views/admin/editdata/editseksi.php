
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><a href="<?= base_url('seksi'); ?>" class="btn btn-default btn-md text-grey"><i class="fas fa-arrow-left"></i> Kembali</a>Ubah Seksi</h1>
          </div>

          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('editseksi/'.$listseksi["id_seksi"]) ?>" method="post">
                        <input type="hidden" name="id" value="<?= $listseksi["id_seksi"];  ?>">
                        <div class="form-group">
                          <?= form_error('nama_seksi','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_seksi">Nama Seksi</label>
                            <input type="text" class="form-control" name="nama_seksi" id="nama_seksi" value="<?= $listseksi["nama_seksi"];  ?>">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Update Data</button>
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
                    <?php $no=1; foreach($allseksi as $seksi) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ucwords(strtolower($seksi['nama_seksi'])) ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
        <!-- /.container-fluid -->

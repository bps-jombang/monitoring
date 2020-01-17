
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ubah mitra</h1>
          </div>
          <?php if($this->session->flashdata('diubah')) : ?>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-6">
                <div class="pesan alert alert-success alert-dismissible fade show" id="pesan" role="alert">
                    Data <strong>Berhasil Diubah!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
              </div>
            </div>
          <?php endif; ?>

          <div class="row">

            <!-- form input data -->
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo "" ?></h6>
                </div>
                <div class="card-body">
                
                    <form action="<?= base_url('editmitra/'.$listmitra["id_mitra"]) ?>" method="post">
<?php 
                
                //foreach ($listmitra as $key ) : ?>
                <input type="hidden" name="id" value="<?= $listmitra["id_mitra"];  ?>">
                        <div class="form-group">
                          <?= form_error('nama_mitra','<div class="alert alert-warning mt-3">','</div>'); ?>
                            <label for="nama_mitra">Nama Mitra</label>
                            <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="<?= $listmitra["nama_mitra"];  ?>">
                        </div>
                <?php //endforeach; ?>
                        <div class="form-group">
                          <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fa-paper-plane"></i> Simpan Data</button>
                          <button class="btn btn-md btn-default" type="reset" name="reset"><i class="fas fa-sync-alt"></i> Reset</button>  
                        </div>
                    </form>
                </div>
              </div>

            </div>


        </div>
        <!-- /.container-fluid -->

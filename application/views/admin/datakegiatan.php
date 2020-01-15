
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Laporan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered display nowrap tabelku" id="dataTableku" width="100%" cellspacing="0">
                      <thead class="mytable">
                        <tr>
                        <th rowspan="2" class="text-center">nomor</th>
                        <th rowspan="2" class="text-center">uraian</th>
                        <th rowspan="2" class="text-center">seksi</th>
                        <th rowspan="2" class="text-center">vol</th>
                        <th rowspan="2" class="text-center">satuan</th>
                        <th rowspan="2" class="text-center">target penyelesaian</th>

                        <?php foreach($user as $d) :?>
                        
                          <th colspan="2" class="text-center"><?= $d['nomor_kecamatan']; ?> | <?= $d['nama_kecamatan'] ?><br>
                          <?php if($d['nama_user'] != NULL) : ?>
                          <p class="text-primary"><a href="<?= base_url('detailkegiatan/') ?><?= $d['id_user']; ?>" class="text-decoration-none"><?= $d['nama_user']; ?></a></p></th>
                          <?php elseif($d['nama_user'] == NULL) : ?>
                          <p class="text-danger"><?= "KOSONG"; ?></p></th>
                          <?php endif;?>
                        <?php endforeach; ?>
                          <th rowspan="2" class="text-center">Mitra</th>
                          <th rowspan="2" class="text-center">Jumlah</th>
                          <th rowspan="2" class="text-center">Keterangan</th>
                        </tr>
                          <tr>
                          <?php foreach($user as $d) :?>
                            <th class="target">T</th>
                            <th class="realisasi">R</th>
                          <?php endforeach; ?></tr>
                      </thead>
                      <tbody>
                      
                      <?php $no=1; foreach($orderuraian as $d) : ?>
                      <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $d['uraian_kegiatan'] ?></td>
                          <td><?= $d['id_seksi'] ?></td>
                          <td><?= $d['vol'] ?></td>
                          <td><?= $d['satuan'] ?></td>
                          <td><?= $d['target_penyelesaian'] ?></td>
                      
                            
                          <?php foreach($user as $ds) :?>
                          <td class="kuning">target</td>
                          <td><?= " - " //$d['realisasi'] ?></td>
                          <?php endforeach;?>
                          <?php $no=1;?>
                          <td><?= $no++; ?></td>
                          
                          <td>jmlh</td>
                          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, qui.</td>
                          
                      </tr>
                      <?php endforeach;?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

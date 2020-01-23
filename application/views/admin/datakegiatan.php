
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

                        <?php // panjang = mengikuti banyaknya user
                        foreach($listuser as $user) :?>
                          <th colspan="2" class="text-center"><?= $user['nomor_kecamatan']; ?> | <?= $user['nama_kecamatan'] ?><br>
                          <?php if($user['nama_user'] != NULL) : ?>
                          <p class="text-primary"><a href="<?= base_url('detailkegiatan/'.$user['id_user']); ?>" class="text-decoration-none"><?= $user['nama_user']; ?></a></p></th>
                          <?php elseif($user['nama_user'] == NULL) : ?>
                          <p class="text-danger"><?= "KOSONG"; ?></p></th>
                          <?php endif;?>
                        <?php endforeach; ?>
                        
                        <?php // panjang kesamping = mengikuti banyaknya pejabat
                        foreach($listpejabat as $pejabat) : ?>
                            <th colspan="2" class="text-center">
                            <?php if($pejabat["id_jabatan"] == 1) : ?>
                            <span class="badge badge-warning"><?= $pejabat['nama_jabatan']; ?></span><?php else : ?><span class="badge badge-info"><?= $pejabat['nama_jabatan']; ?></span> <?php endif;?> <?= $pejabat['nama_seksi'] ?><br><p class="text-primary"><a href="<?= base_url('detailkegiatan/'.$pejabat['id_pejabat']) ?>" class="text-decoration-none"><?= $pejabat['nama_user']; ?></a></p></th>
                        <?php endforeach;?>
                          <th colspan="2"class="text-center">Mitra</th>
                          <th colspan="2"class="text-center">Jumlah</th>
                          <th rowspan="2" class="text-center">Keterangan</th>
                        </tr>
                          <tr>
                          <?php // panjang menurun  target & realisasi = mengikuti banyaknya user
                          foreach($listuser as $user) :?>
                            <th class="target">T</th>
                            <th class="realisasi">R</th>
                          <?php endforeach; ?>
                          <?php // panjang menurun  target & realisasi = mengikuti banyaknya user
                          foreach($listpejabat as $pejabat) :?>
                            <th class="target">T</th>
                            <th class="realisasi">R</th>
                          <?php endforeach; ?>
                          <th>T</th>
                          <th>R</th>

                          <th>T</th>
                          <th>R</th>
                          </tr>
                      </thead>
                      
                      <tbody>
                      <!-- isi tabel -->
                      <?php $no=1; 
                      // tinggi tabel mengikuti banyaknya kegiatan
                      foreach($semuakegiatan as $kegiatan) : ?>
                      <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $kegiatan['uraian_kegiatan'] ?></td>
                          <td><?= $kegiatan['id_seksi'] ?></td>
                          <td><?= $kegiatan['vol'] ?></td>
                          <td><?= $kegiatan['satuan'] ?></td>
                          <td><?= $kegiatan['target_penyelesaian'] ?></td>
                      
                          <?php // panjang target & realisasi = mengikuti banyaknya user
                          foreach($listuser as $user) :?>
                            
                           
                           <?php 
                            $data = target_user($kegiatan['id_kegiatan'],$user['id_user'],0);
                            if($data == FALSE ) :?><td class="kuning"></td>
                            <?php else : ?>
                            <td class="kuning"><?= implode("",target_user($kegiatan['id_kegiatan'],$user['id_user'],0));?></td>
                            <?php endif;?>
                           
                           <?php 
                           $data = realisasi_user($kegiatan['id_kegiatan'],$user['id_user'],0);
                            if($data == FALSE ) :?><td></td>
                            <?php else : ?>
                            <td><?= implode("",realisasi_user($kegiatan['id_kegiatan'], $user['id_user'],0)); ?></td>
                            <?php endif;?>
                            
                          <?php endforeach;?>

                          <?php // target pejabat
                          foreach($listpejabat as $pejabat) :?>
                          <?php 
                          $data = target_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat']);
                          if($data == FALSE ) :?><td class="kuning"></td>
                            <?php else : ?>
                            <td class="kuning"><?= implode("",target_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'])); ?></td>
                            <?php endif;?>

                          <?php  // aman
                           $data = realisasi_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat']);
                            if($data == FALSE ) :?><td></td>
                            <?php else : ?>
                            <td><?= implode("",realisasi_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'])); ?></td>
                            <?php endif;?>
                            
                          <?php endforeach;?>
                          
                            <?php foreach($listmitra as $mitra) : ?>
                          
                          <td>t</td>
                          
                          <?php endforeach;?>
                          
                          <td><?= implode("",total_target($kegiatan['id_kegiatan'])); ?></td>
                          <td><?= implode("",total_realisasi($kegiatan['id_kegiatan'])); ?></td>
                          
                          <td>ket</td>
                      </tr>
                      <?php endforeach;?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

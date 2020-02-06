
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary float-left">DataTables Laporan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered display nowrap tabelku" id="dataTableTes" width="100%" cellspacing="0">
                      <thead class="mytable">
                        <tr>
                        <th  class="text-center">No</th>
                        <th  class="text-center">Uraian Kegiatan</th>
                        <th  class="text-center">Seksi</th>
                        <th  class="text-center">Vol</th>
                        <th  class="text-center">Satuan</th>
                        <th  class="text-center">Target</th>

                        <?php // panjang = mengikuti banyaknya user
                        foreach(json_decode($listuser,true) as $user) :?>
                          <th class="text-center"><?= $user['nama_kecamatan']; ?> | <?= $user['nama_user']; ?></th>
                        <?php endforeach; ?>
                        <?php // panjang kesamping = mengikuti banyaknya pejabat
                        foreach(json_decode($listpejabat,true) as $pejabat) : ?><th class="text-center"><?= $pejabat['nama_jabatan']; ?> <?= $pejabat['nama_seksi']; ?> <?= $pejabat['nama_user']; ?></th><?php endforeach;?>
                        <?php foreach(json_decode($listmitra,true) as $mitra) : ?><th  class="text-center"><?= $mitra['nama_mitra'] ?></th><?php endforeach;?>
                        <th class="text-center">Jumlah</th>
                          <th class="text-center">Keterangan</th>
                          </tr>
                        <!--  -->
                      </thead>
                      
                      <tbody>
                      <!-- isi tabel -->
                      <?php $no=1; 
                      // tinggi tabel mengikuti banyaknya kegiatan
                      foreach(json_decode($semuakegiatan,true) as $kegiatan) : ?>
                      <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $kegiatan['uraian_kegiatan'] ?></td>
                          <td><?= "0".$kegiatan['id_seksi'] ?> <?= $kegiatan['nama_seksi'] ?></td>
                          <td><?= $kegiatan['vol'] ?></td>
                          <td><?= $kegiatan['satuan'] ?></td>
                          <td><?= $kegiatan['target_penyelesaian'] ?></td>
                          
                          <?php // panjang = mengikuti banyaknya user
                          foreach(json_decode($listuser,true) as $user) :?>
                            <?php $target = target_user($kegiatan['id_kegiatan'],$user['id_user'],0,0); 
                            $real = realisasi_user($kegiatan['id_kegiatan'],$user['id_user'],0,0); ?>
                            <?php if($target > 0 && $real > 0) : ?>
                            <td>T <?= implode("",target_user($kegiatan['id_kegiatan'],$user['id_user'],0,0));?> | R <?= implode("",realisasi_user($kegiatan['id_kegiatan'],$user['id_user'],0,0)); ?></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif;?>
                          <?php endforeach; ?>
                          
                          <?php // panjang = mengikuti banyaknya user
                          foreach(json_decode($listpejabat,true) as $pejabat) :?>
                            <?php $target = target_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0); 
                            $real = realisasi_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0); ?>
                            <?php if($target > 0 && $real > 0) : ?>
                            <td>T <?= implode("",target_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0));?> | R <?= implode("",realisasi_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0)); ?></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif;?>
                          <?php endforeach; ?>

                          <?php // panjang = mengikuti banyaknya user
                          foreach(json_decode($listmitra,true) as $mitra) :?>
                            <?php $target = target_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra']); 
                            $real = realisasi_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra']); ?>
                            <?php if($target > 0 && $real > 0) : ?>
                            <td>T <?= implode("",target_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra']));?> | R <?= implode("",realisasi_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra'])); ?></td>
                            <?php else: ?>
                            <td></td>
                            <?php endif;?>
                          <?php endforeach; ?>

                        <td><?php $d= implode("",total_target($kegiatan['id_kegiatan'])); if($d>0) echo "$d | " ?><?= implode("",total_realisasi($kegiatan['id_kegiatan'])); ?></td>
                          <td><?= $kegiatan['keterangan'] ?></td>
                      </tr>
                      <?php endforeach;?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

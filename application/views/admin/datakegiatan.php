
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-md btn-primary float-right text-decoration-none tombol-hapus-semua"><i class="fas fa-trash"></i> Delete All Data Tabel</a>
              <h6 class="m-0 font-weight-bold text-primary float-left">DataTables Laporan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered display nowrap tabelku" id="dataTableKegiatan" width="100%" cellspacing="0">
                      <thead class="mytable">
                        <tr>
                        <th rowspan="2" class="text-center">nomor</th>
                        <th rowspan="2" class="text-center">uraian</th>
                        <th rowspan="2" class="text-center">seksi</th>
                        <th rowspan="2" class="text-center">vol</th>
                        <th rowspan="2" class="text-center">satuan</th>
                        <th rowspan="2" class="text-center">target penyelesaian</th>

                        <?php // panjang = mengikuti banyaknya user
                        foreach(json_decode($listuser,true) as $user) :?>
                          <th colspan="2" class="text-center"><?= $user['nomor_kecamatan']; ?> | <?= $user['nama_kecamatan']; ?><br>
                          <?php if($user['nama_user'] != NULL) : ?>
                          <p class="text-primary"><a href="<?= base_url('detailkegiatan/'.$user['id_user'].'/user'); ?>" class="text-decoration-none"><?= $user['nama_user']; ?></a></p></th>
                          <?php elseif($user['nama_user'] == NULL) : ?>
                          <p class="text-danger"><?= "KOSONG"; ?></p></th>
                          <?php endif;?>
                        <?php endforeach; ?>
                        <?php // panjang kesamping = mengikuti banyaknya pejabat
                        foreach(json_decode($listpejabat,true) as $pejabat) : ?>
                            <th colspan="2" class="text-center">
                            <?php if($pejabat["id_jabatan"] == 1) : ?>
                            <span class="badge badge-warning"><?= $pejabat['nama_jabatan']; ?></span><?php else : ?><span class="badge badge-info"><?= $pejabat['nama_jabatan']; ?></span> <?php endif;?> <?= $pejabat['nama_seksi']; ?><br><p class="text-primary"><a href="<?= base_url('detailkegiatan/'.$pejabat['id_pejabat'].'/pejabat'); ?>" class="text-decoration-none"><?= $pejabat['nama_user']; ?></a></p></th>
                        <?php endforeach;?>
                        <?php foreach(json_decode($listmitra,true) as $mitra):?>
                        <th colspan="2"class="text-center"><a href="<?= base_url('detailkegiatan/'.$mitra['id_mitra'].'/mitra'); ?>" class="text-decoration-none"><?= $mitra['nama_mitra']; ?></a></th>
                        <?php endforeach;?>
                          <th colspan="2"class="text-center">Jumlah</th>
                          <th rowspan="2" class="text-center">Keterangan</th>
                        </tr>
                        <tr>
                          <?php // panjang menurun  target & realisasi = mengikuti banyaknya user
                          foreach(json_decode($listuser,true) as $user) :?>
                            <th class="target">T</th>
                            <th class="realisasi">R</th>
                          <?php endforeach; ?>
                          <?php // panjang menurun  target & realisasi = mengikuti banyaknya user
                          foreach(json_decode($listpejabat,true) as $pejabat) :?>
                            <th class="target">T</th>
                            <th class="realisasi">R</th>
                          <?php endforeach; ?>
                          <?php foreach(json_decode($listmitra,true) as $mitra):?>
                            <th class="target">T</th>
                            <th class="realisasi">R</th>
                          <?php endforeach;?>

                          <th>T</th>
                          <th>R</th>
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
                          <td><?= $kegiatan['id_seksi'] ?></td>
                          <td><?= $kegiatan['vol'] ?></td>
                          <td><?= $kegiatan['satuan'] ?></td>
                          <td><?= $kegiatan['target_penyelesaian'] ?></td>
 
                          <?php // panjang target & realisasi = mengikuti banyaknya user
                          foreach(json_decode($listuser,true) as $user) :?>
                            
                           <?php 
                            $data = target_user($kegiatan['id_kegiatan'],$user['id_user'],0,0);
                            if($data == FALSE ) :?><td class="kuning"></td>
                            <?php else : ?>
                            <td class="kuning"><?= implode("",target_user($kegiatan['id_kegiatan'],$user['id_user'],0,0));?></td>
                            <?php endif;?>
                           
                           <?php 
                           $data = realisasi_user($kegiatan['id_kegiatan'],$user['id_user'],0,0);
                            if($data == FALSE ) :?><td></td>
                            <?php else : ?>
                            <td><?= implode("",realisasi_user($kegiatan['id_kegiatan'], $user['id_user'],0,0)); ?></td>
                            <?php endif;?>
                            
                          <?php endforeach;?>
                          <?php // target pejabat
                          foreach(json_decode($listpejabat,true) as $pejabat) :?>
                            <?php 
                              $data = target_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0);
                              if($data == FALSE ) :?><td class="kuning"></td>
                              <?php else : ?>
                              <td class="kuning"><?= implode("",target_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0)); ?></td>
                              <?php endif;?>

                            <?php  // aman
                              $data = realisasi_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0);
                              if($data == FALSE ) :?><td></td>
                              <?php else : ?>
                              <td><?= implode("",realisasi_user($kegiatan['id_kegiatan'],0,$pejabat['id_pejabat'],0)); ?></td>
                              <?php endif;?>
                            
                          <?php endforeach;?>

                          <?php // target mitra
                          foreach(json_decode($listmitra,true) as $mitra) :?>
                            <?php 
                              $data = target_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra']);
                              if($data == FALSE ) :?><td class="kuning"></td>
                              <?php else : ?>
                              <td class="kuning"><?= implode("",target_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra'])); ?></td>
                              <?php endif;?>

                            <?php  // aman
                              $data = realisasi_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra']);
                              if($data == FALSE ) :?><td></td>
                              <?php else : ?>
                              <td><?= implode("",realisasi_user($kegiatan['id_kegiatan'],0,0,$mitra['id_mitra'])); ?></td>
                              <?php endif;?>
                            
                          <?php endforeach;?>
                          
                          <td><?= implode("",total_target($kegiatan['id_kegiatan'])); ?></td>
                          <td><?= implode("",total_realisasi($kegiatan['id_kegiatan'])); ?></td>
                          
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


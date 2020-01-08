<table class="table table-bordered display nowrap tabelku" id="dataTableku" width="100%" cellspacing="0">
                                <thead class="mytable">
                                  <tr>
                                  <th rowspan="2" class="align-middle text-left">nomor</th>
                                  <th rowspan="2" class="align-middle text-center">uraian</th>
                                  <th rowspan="2" class="align-middle text-center">seksi</th>
                                  <th rowspan="2" class="align-middle text-center">vol</th>
                                  <th rowspan="2" class="align-middle text-center">satuan</th>
                                  <th rowspan="2" class="align-middle text-center">target penyelesaian</th>

                                  <?php foreach($user as $d) :?>
                                    <th colspan="2" class="text-center"><?= "nokec" ?> | <?= $d['id_kecamatan'] ?><br>
                                    <p class="text-primary"><?= $d['nama_user'] ?></p></th>
                                  <?php endforeach; ?>
                                    <th rowspan="2" class="align-middle text-center">jml</th>
                                  </tr>
                                    <tr>
                                    <?php 
                                    // foreach($list as $d) :?>
                                      <th class="target">T</th>
                                      <th class="realisasi">R</th>
                                    <?php 
                                  //endforeach; ?></tr>
                                </thead>
                                <tbody>
                                
                                <?php 
                                // $no=1; foreach($list as $ds) : ?>
                                <tr>
                                    <td><?php // $no++; ?></td>
                                    <td><?php // $ds['uraian_kegiatan'] ?></td>
                                    <td><?php // $ds['nama_seksi'] ?></td>
                                    <td><?php // $ds['vol'] ?></td>
                                    <td><?php // $ds['satuan'] ?></td>
                                    <td><?php // $ds['target_penyelesaian'] ?></td>
                                
                                      
                                    <?php 
                                    // foreach($list as $d) :?>
                                    <td class="kuning"><?php // $ds['target'] ?></td>
                                    <td><?php // $ds['realisasi'] ?></td>
                                    
                                    <?php 
                                  // endforeach;?>
                                    <td>40</td>
                                    
                                </tr>
                                <!-- <?php //endforeach;?> -->
                                </tbody>
                            </table>
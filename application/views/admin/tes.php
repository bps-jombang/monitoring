<table class="table table-bordered display nowrap tabelku" id="dataTableku" width="100%" cellspacing="0">
                                <thead class="mytable">
                                  <tr>
                                  <th rowspan="2" class="align-middle text-left">nomor</th>
                                  <th rowspan="2" class="align-middle text-center">uraian</th>
                                  <th rowspan="2" class="align-middle text-center">seksi</th>
                                  <th rowspan="2" class="align-middle text-center">vol</th>
                                  <th rowspan="2" class="align-middle text-center">satuan</th>
                                  <th rowspan="2" class="align-middle text-center">target penyelesaian</th>

                                  <?php foreach($distinct as $d) :?>
                                    <th colspan="2" class="text-center"><?= "nokec" ?> | <?php// $d['id_kecamatan'] ?><br>
                                    <p class="text-primary"><?= $d['id_user'] ?></p></th>
                                  <?php endforeach; ?>
                                    <th rowspan="2" class="align-middle text-center">jml</th>
                                  </tr>
                                    <tr>
                                    <?php foreach($list as $d) :?>
                                      <th class="target">T</th>
                                      <th class="realisasi">R</th>
                                    <?php endforeach; ?></tr>
                                </thead>
                                <tbody>
                                
                                <?php $no=1; foreach($list as $d) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['uraian_kegiatan'] ?></td>
                                    <td><?= $d['nama_seksi'] ?></td>
                                    <td><?= $d['vol'] ?></td>
                                    <td><?= $d['satuan'] ?></td>
                                    <td><?= $d['target_penyelesaian'] ?></td>
                                
                                      
                                    <?php //foreach($list as $d) :?>
                                    <td class="kuning"><?= $d['target'] ?></td>
                                    <td><?= $d['realisasi'] ?></td>
                                    
                                    <?php //endforeach;?>
                                    <!-- <td>40</td> -->
                                    
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
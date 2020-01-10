

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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

                        <?php foreach($sortuser as $d) :?>
                          <th colspan="2" class="text-center"><?= "nokec" ?> | <?= "nakec"//$d['nama_kecamatan'] ?><br>
                          <p class="text-primary"><?= $d['id_user'] ?></p></th>
                        <?php endforeach; ?>
                          <th rowspan="2" class="text-center">jml</th>
                        </tr>
                          <tr>
                          <?php foreach($sortuser as $d) :?>
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
                      
                            
                          <?php foreach($sortuser as $d) :?>
                          <td class="kuning"><?= " "//$d['target'] ?></td>
                          <td><?= " - " //$d['realisasi'] ?></td>
                          <?php endforeach;?>
                          <td>40</td>
                          
                      </tr>
                      <?php endforeach;?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th rowspan="2">Uraian</th>
                <th rowspan="2">Seksi</th>
                <th rowspan="2">Vol.</th>
                <th rowspan="2">Satuan</th>

                <?php foreach($semua_user as $user) { ?>
                <th colspan="2"><?php echo $user['nama_user']; ?></th>
                <!-- <tr>
                    <th>T</th>
                    <th>R</th>
                </tr> -->
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($semua_kegiatan as $kegiatan) { ?>
            <tr>
                <td><?php echo $kegiatan['uraian_kegiatan']; ?></td>
                <td><?php echo $kegiatan['nama_seksi']; ?></td>
                <td><?php echo $kegiatan['vol']; ?></td>
                <td><?php echo $kegiatan['satuan']; ?></td>

                <?php foreach($semua_user as $user) { ?>
                <td><?php echo "T: " . $this->model_admin->getTarget($kegiatan['id_kegiatan'], $user['id_user']); ?></td>
                <td><?php echo "R: " . $this->model_admin->getRealisasi($kegiatan['id_kegiatan'], $user['id_user']); ?></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
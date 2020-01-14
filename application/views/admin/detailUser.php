<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Karyawan</title>

    <style>
        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <h3 class="text-primary font-weight-bold">Detail Karyawan</h1>
                    <div class="card border border-primary" style="width: 18rem;">
                        <br>
                        <img src="<?= base_url('assets/') ?>img/man.png" class="card-img-top">
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title text-dark font-weight-bold text-center">Tria M</h5>
                            <p class="card-text text-dark font-weight-bold text-center">Kasie IPDS</p>

                        </div>
                    </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered text-center bg-primary text-light font-weight-bold">
                    <thead>
                        <tr>
                            <th scope="col">Target</th>
                            <th scope="col">Realisasi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>56</td>
                            <td>54</td>
                        </tr>
                    </tbody>
                </table>
                <br>

            </div>

            <div class="col-md-12">
                <table class="table table-bordered text-center bg-info text-light font-weight-bold">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Realisasi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>pengawasan update SAK sm I</td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td>pengawasan pencacahan SAK sm I</td>
                            <td><i class="fas fa-times"></i></td>
                        </tr>
                        <tr>
                            <td>pelatihan sakernas Sm 1</td>
                            <td><i class="fas fa-times"></i></td>
                        </tr>
                        <tr>
                            <td>Sampel Ubinan</td>
                            <td><i class="fas fa-check"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
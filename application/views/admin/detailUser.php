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
        <div class="center">
            <div class="card border border-primary" style="width: 18rem;">
                <br>
                <img src="<?= base_url('assets/') ?>img/man.png" class="card-img-top" alt="...">
                <hr>
                <div class="card-body">
                    <h5 class="card-title text-dark font-weight-bold">Tria M</h5>
                    <p class="card-text text-dark font-weight-bold">Kasie IPDS</p>

                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
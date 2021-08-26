<?php
require_once("./fungsi.php");
$fungsi = new Fungsi();
$database = $fungsi->database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="./../asset/styles/css/bootstrap.min.css">
    <script src="./../asset/styles/js/bootstrap.bundle.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="./index.php"><strong>KNN</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./predict.php">Prediksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./dataset.php">Dataset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./akurasi.php">Hitung Akurasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <?php
    $data = $database->query("SELECT * FROM testing_history WHERE token_testing = '" . $_COOKIE['history'] . "'");
    if ($data->num_rows  == 1) {
        $data = $data->fetch_assoc();
        $check['cek'] = 'success';
        $gejala = json_decode($data['gejala']);
    } else {
        $check['cek'] = 'error';
    }
    ?>

    <div class="container">
        <div class="pt-5">
            <!-- Jumbotron -->
            <?php if ($check['cek'] == 'error') : ?>
                <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
                    <div class="text-center text-muted">
                        <h1>Terjadi Kesalahan</h1>
                        Data tidak <strong>ditemukan</strong> atau terdapat <strong>kesalahan sistem</strong>
                    </div>
                </div>
            <?php else : ?>
                <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
                    <h3>Hasil Prediksi Kucing - <strong><?= $data['kucing'] ?></strong></h3>
                    <hr>
                    Menderita <h1><?= strtoupper($data['penyakit']) ?></h1>

                    <div class="card mt-4">
                        <div class="card-header">Gejala</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <tr>
                                            <th>Anorexsia</th>
                                            <td class="bg-light"><?= $gejala->anorexsia ?></td>

                                            <th>Dehidrasi</th>
                                            <td class="bg-light"><?= $gejala->dehidrasi ?></td>

                                            <th>Radang Telinga</th>
                                            <td class="bg-light"><?= $gejala->radangTelinga ?></td>

                                            <th>Telinga Keropeng</th>
                                            <td class="bg-light"><?= $gejala->telingaKeropeng ?></td>
                                        </tr>
                                        <tr>
                                            <th>Muntah</th>
                                            <td class="bg-light"><?= $gejala->muntah ?></td>

                                            <th>Demam</th>
                                            <td class="bg-light"><?= $gejala->demam ?></td>

                                            <th>Batuk</th>
                                            <td class="bg-light"><?= $gejala->batuk ?></td>

                                            <th>Pilek</th>
                                            <td class="bg-light"><?= $gejala->pilek ?></td>
                                        </tr>
                                        <tr>
                                            <th>Lemah</th>
                                            <td class="bg-light"><?= $gejala->lemah ?></td>

                                            <th>Diare</th>
                                            <td class="bg-light"><?= $gejala->diare ?></td>

                                            <th>Hidung Meler</th>
                                            <td class="bg-light"><?= $gejala->hidungMeler ?></td>

                                            <th>Bersin-bersin</th>
                                            <td class="bg-light"><?= $gejala->bersinBersin ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kurang Respon</th>
                                            <td class="bg-light"><?= $gejala->kurangRespon ?></td>

                                            <th>Hipersevalis</th>
                                            <td class="bg-light"><?= $gejala->hipersevalis ?></td>

                                            <th>Gatal</th>
                                            <td class="bg-light"><?= $gejala->gatal ?></td>

                                            <th>Mata Berair</th>
                                            <td class="bg-light"><?= $gejala->mataBerair ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Jumbotron end -->
        </div>
    </div>

</body>

</html>
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
                        <a class="nav-link active" href="./akurasi.php">Hitung Akurasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <?php
    require_once("./fungsi.php");
    $fungsi = new Fungsi();
    $dbdataset = $fungsi->database()->query("SELECT * FROM dataset");

    if (isset($_POST['akurasi'])) {
        unset($_POST['akurasi']);

        $res = $fungsi->getAkurasi($_POST);
    }
    ?>

    <div class="container">
        <div class="pt-5">
            <!-- Jumbotron -->
            <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
                <h3>Perhitungan Akurasi</h3>
                <small>Perhitungan ini mengacu pada <a href="./dataset.php">dataset</a>. Jumlah dataset diambil secara acak (datatesting) dan diprediksi untuk menghasilkan akurasi
                </small>
                <hr class="my-3">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="jmldatatesting" class="form-label">Jumlah data <strong>testing</strong></label>
                            <input type="number" name="dataTesting" value="0" min="0" max="249" id="jmldatatesting" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="k" class="form-label">Nilai <strong>K</strong></label>
                            <input type="number" name="k" value="3" min="1" max="250" id="k" class="form-control">
                        </div>
                    </div>
                    <label for="btnakurasi" class="form-label"></label>
                    <button type="submit" class="btn btn-primary" id="btnakurasi" name="akurasi">Hitung Akurasi</button>
                </form>
                <?php if (isset($res)) : ?>
                    <hr class="my-5">
                    <div class="table-responsive p-4 bg-white rounded-3 shadow-sm">
                        <table class="table">
                            <tr>
                                <th>Jumlah Dataset</th>
                                <td><?= $dbdataset->num_rows ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Data Testing</th>
                                <td><?= $res['dataTesting'] ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Data Train</th>
                                <td><?= $res['dataTrain'] ?></td>
                            </tr>
                            <tr>
                                <th>K</th>
                                <td><?= $res['k'] ?></td>
                            </tr>
                            <tr>
                                <th>Akurasi</th>
                                <th><?= number_format($res['score'], 3, ",", ".
                            ") ?></th>
                            </tr>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Jumbotron end -->
        </div>
    </div>
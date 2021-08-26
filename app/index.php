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

<body class="bg-light">
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
                        <a class="nav-link active" href="./index.php">Home</a>
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

    <div class="container">
        <div class="pt-5">
            <!-- Jumbotron -->
            <div class="p-5 mb-4 bg-secondary text-white rounded-3 shadow-sm">
                <div class="container-fluid py-5 text-center">
                    <h1 class="display-5 fw-bold">Prediksi Penyakit Kucing</h1>
                    <p class="fs-5">aplikasi untuk memprediksi penyakit kucing dengan menggunakan metode <strong>kasifikasi KNN</strong></p>
                </div>
            </div>
            <!-- Jumbotron end -->
        </div>
    </div>

</body>

</html>
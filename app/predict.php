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
                        <a class="nav-link active" href="./predict.php">Prediksi</a>
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

    <div class="container my-5">
        <div class="p-5 bg-light rounded-3 shadow-sm">
            <h1>Hitung Data Baru</h1>
            <p>Sesuaikan dengan <strong>gejala</strong> yang dialami !</p>
            <div class="dropdown-divider"></div>
            <form action="./aksi.php" method="post">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="namaanda" class="form-label">Nama Anda</label>
                        <input type="text" name="namaanda" id="namaanda" required class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="namaKucing" class="form-label">Nama Kucing</label>
                        <input type="text" name="namaKucing" id="namaKucing" required class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="valueK" class="form-label">Nilai <strong>K</strong></label>
                        <input type="number" name="k" id="valueK" value="3" min="0" max="250" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="anorexsia">Anorexsia</label><br>
                            <input type="radio" class="btn-check" name="anorexsia" required value="yes" id="anorexsia1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="anorexsia1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="anorexsia" value="no" id="anorexsia2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="anorexsia2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="muntah">Muntah</label><br>
                            <input type="radio" class="btn-check" name="muntah" required value="yes" id="muntah1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="muntah1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="muntah" value="no" id="muntah2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="muntah2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="lemah">Lemah</label><br>
                            <input type="radio" class="btn-check" name="lemah" required value="yes" id="lemah1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="lemah1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="lemah" value="no" id="lemah2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="lemah2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="kurang-respon">Kurang Respon</label><br>
                            <input type="radio" class="btn-check" name="kurangRespon" required value="yes" id="kurangRespon1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="kurangRespon1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="kurangRespon" value="no" id="kurangRespon2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="kurangRespon2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="dehidrasi">Dehidrasi</label><br>
                            <input type="radio" class="btn-check" name="dehidrasi" required value="yes" id="dehidrasi1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="dehidrasi1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="dehidrasi" value="no" id="dehidrasi2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="dehidrasi2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="demam">Demam</label><br>
                            <input type="radio" class="btn-check" name="demam" required value="yes" id="demam1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="demam1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="demam" value="no" id="demam2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="demam2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="diare">Diare</label><br>
                            <input type="radio" class="btn-check" name="diare" required value="yes" id="diare1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="diare1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="diare" value="no" id="diare2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="diare2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="hipersevalis">Hipersevalis</label><br>
                            <input type="radio" class="btn-check" name="hipersevalis" required value="yes" id="hipersevalis1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="hipersevalis1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="hipersevalis" required value="no" id="hipersevalis2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="hipersevalis2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="radang-telinga">Radang Telinga</label><br>
                            <input type="radio" class="btn-check" name="radangTelinga" required value="yes" id="radangTelinga1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="radangTelinga1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="radangTelinga" required value="no" id="radangTelinga2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="radangTelinga2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="batuk">Batuk</label><br>
                            <input type="radio" class="btn-check" name="batuk" required value="yes" id="batuk1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="batuk1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="batuk" value="no" id="batuk2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="batuk2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="hidung-meler">Hidung Meler</label><br>
                            <input type="radio" class="btn-check" name="hidungMeler" required value="yes" id="hidungMeler1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="hidungMeler1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="hidungMeler" value="no" id="hidungMeler2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="hidungMeler2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="gatal">Gatal</label><br>
                            <input type="radio" class="btn-check" name="gatal" required value="yes" id="gatal1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="gatal1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="gatal" value="no" id="gatal2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="gatal2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="telinga-keropeng">Telinga Keropeng</label><br>
                            <input type="radio" class="btn-check" name="telingaKeropeng" required value="yes" id="telingaKeropeng1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="telingaKeropeng1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="telingaKeropeng" value="no" id="telingaKeropeng2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="telingaKeropeng2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="pilek">Pilek</label><br>
                            <input type="radio" class="btn-check" name="pilek" required value="yes" id="pilek1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="pilek1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="pilek" value="no" id="pilek2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="pilek2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="bersin-bersin">Bersin-bersin</label><br>
                            <input type="radio" class="btn-check" name="bersinBersin" required value="yes" id="bersinBersin1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="bersinBersin1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="bersinBersin" value="no" id="bersinBersin2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="bersinBersin2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="mata-berair">Mata Berair</label><br>
                            <input type="radio" class="btn-check" name="mataBerair" required value="yes" id="mataBerair1" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="mataBerair1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z" />
                                </svg> Yes
                            </label>
                            <input type="radio" class="btn-check" name="mataBerair" value="no" id="mataBerair2" autocomplete="off">
                            <label class="btn btn-outline-primary radioku mb-2" for="mataBerair2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg> No
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="predict" class="btn btn-primary">Prediksi Data</button>
            </form>
        </div>
    </div>

</body>

</html>
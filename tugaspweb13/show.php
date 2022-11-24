<?php

include 'config/connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM tb_mahasiswa where id='$id'";
$mahasiswa = mysqli_query($conn, $query);
$hasil = mysqli_fetch_array($mahasiswa);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">STMIK IKMI CIREBON</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Daftar Mahasiswa</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <section class="py-5">
        <div class="container">

            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a href="index.php" class="btn btn-sm btn-danger mb-3">Kembali</a>
                    <div class="card p-3 border-0 shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/<?= $hasil['photo']; ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $hasil['nama']; ?></h3>
                                    <table>
                                        <tr>
                                            <td width="100">NIM</td>
                                            <td width="15">:</td>
                                            <td><?= $hasil['nim']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td><?= $hasil['kelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Prodi</td>
                                            <td>:</td>
                                            <td><?= $hasil['prodi']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php

include 'config/connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM tb_mahasiswa where id='$id'";
$mahasiswa = mysqli_query($conn, $query);
$hasil = mysqli_fetch_object($mahasiswa);
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
            <h1 class="text-center mb-4">Edit Data Mahasiswa</h1>

            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card p-3 border-0 shadow">
                        <form action="controller/edit.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $hasil->id ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $hasil->nama ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" required value="<?= $hasil->nim ?>">
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" required value="<?= $hasil->kelas ?>">
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" class="form-control" id="prodi" name="prodi" required value="<?= $hasil->prodi ?>">
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <div class="row align-items-end">
                                    <div class="col-md-4">
                                        <img src="img/<?= $hasil->photo ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <input class="form-control" type="file" id="photo" name="photo">
                            <small class="small text-danger">
                                *Kosongkan photo juka tidak diedit
                            </small>
                            <div class="d-flex gap-1 justify-content-end mt-5">
                                <a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
                                <button type="submit" name="edit" class="btn btn-sm btn-success">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
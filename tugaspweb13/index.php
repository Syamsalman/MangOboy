<?php

include 'config/connection.php';
$query = "SELECT * FROM tb_mahasiswa";
$mahasiswa = mysqli_query($conn, $query);
$no = 1;
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
            <h1 class="text-center mb-5">Daftar Mahasiswa STMIK IKMI CIREBON</h1>

            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <a href="" class="btn btn-sm btn-primary mb-3 shadow" data-bs-toggle="modal" data-bs-target="#modalTambahData">Tambah Mahasiswa</a>
                    <div class="card p-3 border-0 shadow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mahasiswa as $row) { ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td>
                                            <img src="img/<?= $row['photo']; ?>" width="30" alt="">
                                        </td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['nim']; ?></td>
                                        <td><?= $row['kelas']; ?></td>
                                        <td><?= $row['prodi']; ?></td>
                                        <td class="text-center">
                                            <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Lihat</a>
                                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                            <form action="controller/hapus.php" method="post" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <button type="submit" name="delete" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTambahDataLabel">Tambah Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controller/store.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nama" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="nama" name="kelas" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="nama" name="prodi" required>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control" type="file" id="photo" name="photo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn  btn-sm btn-primary" name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
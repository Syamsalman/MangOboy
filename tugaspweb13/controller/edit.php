<?php

include '../config/connection.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM tb_mahasiswa where id='$id'";
    $hasil = mysqli_query($conn, $query);
    $mahasiswa = mysqli_fetch_object($hasil);

    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $prodi = htmlspecialchars($_POST['prodi']);

    $photo = $_FILES['photo']['name'];
    $x = explode('.', $photo);
    $extensi = strtolower(end($x));
    $namaphoto = date('dmYHis') . $extensi;
    $file_tmp = $_FILES['photo']['tmp_name'];

    if ($photo) {
        move_uploaded_file($file_tmp, '../img/' . $namaphoto);
        $query = "UPDATE tb_mahasiswa SET nama='$nama', nim='$nim', kelas='$kelas', prodi='$prodi', photo='$namaphoto' where id='$id'";
    } else {
        $query = "UPDATE tb_mahasiswa SET nama='$nama', nim='$nim', kelas='$kelas', prodi='$prodi', photo='$mahasiswa->photo' where id='$id'";
    }
    mysqli_query($conn, $query);
    header('Location:../index.php');
}

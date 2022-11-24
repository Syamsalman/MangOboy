<?php

include '../config/connection.php';

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $photo = $_FILES['photo']['name'];
    $x = explode('.', $photo);
    $extensi = strtolower(end($x));
    $namaphoto = date('dmYHis') . '.' . $extensi;
    $file_tmp = $_FILES['photo']['tmp_name'];

    if ($photo) {
        move_uploaded_file($file_tmp, '../img/' . $namaphoto);
        $query = "INSERT INTO tb_mahasiswa (nama, nim, kelas, prodi, photo) VALUE ('$nama', '$nim', '$kelas', '$prodi', '$namaphoto')";
        $mahasiswa = mysqli_query($conn, $query);
        header('Location:../index.php');
    }
}

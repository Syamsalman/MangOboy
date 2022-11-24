<?php

include '../config/connection.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM tb_mahasiswa where id='$id'";
    mysqli_query($conn, $query);
    header('Location:../index.php');
}

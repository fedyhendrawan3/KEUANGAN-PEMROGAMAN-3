<?php
    include_once('koneksi.php');
    $id     = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:kategori.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
<?php
    include_once('koneksi.php');
    $id     = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM barang WHERE id_barang='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:barang.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
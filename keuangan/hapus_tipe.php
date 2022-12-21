<?php
    include_once('koneksi.php');
    $id           = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM tipe WHERE id_tipe='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:tipe.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
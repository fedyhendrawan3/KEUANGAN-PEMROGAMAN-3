<?php
    include_once('koneksi.php');
    $id           = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM level WHERE id_level='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:level.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
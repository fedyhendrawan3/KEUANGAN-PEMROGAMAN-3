<?php
    include_once('koneksi.php');
    $id           = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_transaksi='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:transaksi.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
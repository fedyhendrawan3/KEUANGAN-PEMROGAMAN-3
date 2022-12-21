<?php
    include_once('koneksi.php');
    $id     = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM diskon WHERE id_diskon='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:diskon.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
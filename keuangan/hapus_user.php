<?php
    include_once('koneksi.php');
    $id           = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:user.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
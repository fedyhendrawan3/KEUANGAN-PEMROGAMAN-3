<?php
    include_once('koneksi.php');
    $id           = $_GET['id'];
    $querydelete  = mysqli_query($koneksi,"DELETE FROM member WHERE id_member='$id' ");

    if($querydelete)
    {
        // mengalihkan halaman kembali
        header("location:member.php");
    }
    else
    {
        echo mysqli_error($koneksi);
    }

?>
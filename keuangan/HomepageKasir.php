<?php
session_start();
$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];
if (isset($username) AND isset($password) AND isset($level) and $nama_level){

echo '    <html>
        <head>
            <title>

            </title>
        </head>
        <body>
            <h1>INI HALAMAN KASIR </h1>
        </body>
    </html>
    ';
    include 'logout_button.php';
}
else
{
    header('Location: /keuangan/');
}

?>

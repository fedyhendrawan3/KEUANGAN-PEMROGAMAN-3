<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['level']); 
unset($_SESSION['nama_level']);

header('Location: index.php');

?>
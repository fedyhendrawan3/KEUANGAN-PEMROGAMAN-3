<?php
session_start();
$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

    if(isset($_SESSION['username']) && isset($_SESSION['level']))
    {

    }
    else
    {
        echo ("
            <script type='text/javascript'>
                alert('Anda harus login');document.location='index.php';
            </script>
        ");
    }

    include_once('navbar.php');
?>
	<html>
		<head>
			<title>CRUD - SEDERHANA</title>
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
			<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
			<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		</head>
		<body>
			<h2>MODULE TIPE</h2>
			<br/>
			<a href="tambah_tipe.php" class="btn btn-outline-primary" tabindex="-1" role="button">TAMBAH TIPE</a>
			<br/>
			<br/>
			<table border="1" class="table">
				<tr>
					<th>No</th>
					<th>Nama Tipe</th>
					<th>OPSI</th>
				</tr>
<?php
					include_once('koneksi.php');
					$no = 1;
					$query = mysqli_query($koneksi,"SELECT * FROM tipe");
					while($data = mysqli_fetch_array($query))
					{
?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $data["nama_tipe"] ?></td>
					<td>
						<a href="edit_kategori.php?id=<?php echo $data["id_tipe"] ?>">EDIT</a>
						<a href="hapus_kategori.php?id=<?php echo $data["id_tipe"] ?>">HAPUS</a>
					</td>
				</tr>
<?php
					}
?>
			</table>
		</body>
	</html>
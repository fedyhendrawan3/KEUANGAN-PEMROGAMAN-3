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
			<h2>MODULE BARANG</h2>
			<br/>
			<a href="tambah_barang.php" class="btn btn-outline-primary" tabindex="-1" role="button">TAMBAH BARANG</a>
			<br/>
			<br/>
			<table border="1" class="table">
				<tr>
					<th>No</th>
					<th>Nama Barang</th>
					<th>Kode Barang</th>
					<th>QTY</th>
					<th>Kategori</th>
					<th>OPSI</th>
				</tr>
<?php
					include_once('koneksi.php');
					$no = 1;
					$query = mysqli_query($koneksi," SELECT * FROM barang b LEFT JOIN kategori k on b.kategori_id = k.id_kategori");
					while($data = mysqli_fetch_array($query))
					{
?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $data['nama_barang'] ?></td>
					<td><?php echo $data['kode_barang'] ?></td>
					<td><?php echo $data['qty'] ?></td>
					<td><?php echo $data['nama_kategori'] ?></td>
					<td>
						<a href="edit_user.php?id= <?php echo $data['id_barang'] ?>">EDIT</a>
						<a href="hapus_user.php?id= <?php echo $data['id_barang'] ?>">HAPUS</a>
					</td>
				</tr>
<?php	
					}
?>
			</table>
		</body>
	</html>

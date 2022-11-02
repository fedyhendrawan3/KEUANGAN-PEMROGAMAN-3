<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - SEDERHANA</title>
	</head>

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$nama_tipe = $_POST['nama_tipe'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into tipe values('','$nama_tipe')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:tipe.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}
		
		
	?>
	<body>
		<h2>MODULE TIPE</h2>
		<br/>
		<a href="tipe.php">KEMBALI</a>
		<br/>
		<br/>
		<h3>TAMBAH DATA TIPE</h3>
		<form method="POST">
			<table>
				<tr>
					<td>Nama Tipe</td>
					<td><input type="text" name="nama_tipe"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
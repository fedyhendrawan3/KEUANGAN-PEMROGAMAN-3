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
			$nama_level = $_POST['nama_level'];
            $id_tipe = $_POST['id_tipe'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into level values('','$nama_level','$id_tipe')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:level.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}
		
        $querytipe = "SELECT * FROM tipe";
		$resulttipe = mysqli_query ($koneksi,$querytipe);
		
	?>
	<body>
		<h2>MODULE LEVEL</h2>
		<br/>
		<a href="level.php">KEMBALI</a>
		<br/>
		<br/>
		<h3>TAMBAH DATA LEVEL</h3>
		<form method="POST">
			<table>
				<tr>
					<td>Nama Level</td>
					<td><input type="text" name="nama_level"></td>
				</tr>
                <tr>
					<td>Tipe</td>
					<td>
						<select name="id_tipe">
							<option value="">-----Pilih-----</option>
							<?php
							while ($datatipe=mysqli_fetch_array($resulttipe))
							{
								echo "<option value=$datatipe[id_tipe]>$datatipe[nama_tipe]</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
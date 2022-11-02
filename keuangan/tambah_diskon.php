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
			$diskon = $_POST['diskon'];
            $id_level = $_POST['id_level'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into diskon values('','$diskon','$id_level')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:diskon.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}
		
        $querylevel = "SELECT * FROM level where id_tipe='2'";
		$resultlevel = mysqli_query ($koneksi,$querylevel);
		
	?>
	<body>
		<h2>MODULE DISKON</h2>
		<br/>
		<a href="diskon.php">KEMBALI</a>
		<br/>
		<!-- <br/> -->
		<!-- <h3>TAMBAH DATA DISKON</h3> -->
		<form method="POST">
			<table>
				<tr>
					<td>Diskon</td>
					<td><input type="number" name="diskon"></td>
				</tr>
                <tr>
					<td>Level</td>
					<td>
						<select name="id_level">
							<option value="">-----Pilih-----</option>
							<?php
							while ($datalevel=mysqli_fetch_array($resultlevel))
							{
								echo "<option value=$datalevel[id_level]>$datalevel[nama_level]</option>";
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
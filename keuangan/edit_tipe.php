<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - SEDERHANA</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</head>

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
            $id=$_POST['id'];
			$nama_tipe = $_POST['nama_tipe'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"UPDATE tipe set nama_tipe='$nama_tipe' WHERE id_tipe='$id' ");

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
		
		$id = $_GET['id'];

        $query_mysqli = mysqli_query($koneksi,"SELECT * FROM tipe WHERE  id_tipe='$id'")or die(mysqli_error());
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysqli)){
	?>
	<body>
		<br/>
		<br/>
		<div class="container">		
			<a href="tipe.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA TIPE</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nama_tipe">Nama Tipe</label>
					<div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_tipe'];?>">
						<input type="text" class="form-control" name="nama_tipe" value="<?php echo $data['nama_tipe'];?>">
					</div>
				</div>
				<input type="submit" name="save" class="btn btn-danger">
			</form>		
		</div>
	</body>
    <?php
        }
    ?>
</html>
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
			$nama_kategori = $_POST['nama_kategori'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama_kategori' where id_kategori='$id'");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:kategori.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}

        $id = $_GET['id'];

        $query_mysqli = mysqli_query($koneksi,"SELECT * FROM kategori WHERE  id_kategori ='$id'")or die(mysqli_error());
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysqli)){
		
		
	?>
	<body>
		<br/>
		<br/>
		<div class="container">		
			<a href="kategori.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA KATEGORI</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nama_kategori">Nama Kategori</label>
					<div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_kategori'];?>">
						<input type="text" class="form-control" name="nama_kategori" value="<?php echo $data['nama_kategori'];?>">
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
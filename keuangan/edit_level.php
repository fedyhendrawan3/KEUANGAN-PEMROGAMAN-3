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
			$nama_level = $_POST['nama_level'];
            $id_tipe = $_POST['id_tipe'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"UPDATE level SET nama_level='$nama_level', id_tipe='$id_tipe' where id_level='$id'");

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
		
        $id = $_GET['id'];

        $querytipe = "SELECT * FROM tipe";
		$resulttipe = mysqli_query ($koneksi,$querytipe);

        $query_mysqli = mysqli_query($koneksi,"SELECT * FROM level l LEFT JOIN tipe t on l.id_tipe = t.id_tipe  WHERE l.id_level ='$id'")or die(mysqli_error());
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysqli)){
		
	?>
	<body>
		<br/>
		<br/>
		<div class="container">		
			<a href="level.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA LEVEL</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nama_level">Nama Level</label>
					<div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_level'];?>">
						<input type="text" class="form-control" name="nama_level" value="<?php echo $data['nama_level'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="id_tipe">Tipe</label>
					<div class="col-sm-5">
						<select class="form-control" name="id_tipe" id="id_tipe">
                        <option value="<?php echo $data['id_tipe'];?>"><?php echo $data['nama_tipe'];?></option>
							<option value="">-----Pilih Tipe-----</option>
								<?php
									while ($datatipe=mysqli_fetch_array($resulttipe))
									{
										echo "<option value=$datatipe[id_tipe]>$datatipe[nama_tipe]</option>";
									}
								?>
						</select>
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
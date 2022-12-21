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
			$nama = $_POST['nama'];
			$password = md5($_POST['password']);
			$level = $_POST['level'];
			$status = $_POST['status'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"UPDATE user SET username='$nama', password='$password', level='$level', status='$status' where id_user='$id' ");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:user.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	
		$querylevel = "SELECT * FROM level
						LEFT JOIN tipe on level.id_tipe = tipe.id_tipe
						WHERE tipe.nama_tipe = 'Userlogin'
						";
		$resultlevel = mysqli_query ($koneksi,$querylevel);

        $id = $_GET['id'];

        $query_mysqli = mysqli_query($koneksi,"SELECT * FROM user u LEFT JOIN level l on l.id_level = u.level  WHERE u.id_user='$id'")or die(mysqli_error());
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysqli)){
	?>
	<body>
		<br/>
		<br/>
		<div class="container">		
			<a href="user.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA USER</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nama">Nama User</label>
					<div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_user'];?>">
						<input type="text" class="form-control" name="nama" value="<?php echo $data['username'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Password</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" name="password" value="<?php echo $data['password'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="level">Level</label>
					<div class="col-sm-5">
						<select class="form-control" name="level" id="level" value="<?php echo $data['nama_level'];?>">
                            <option value="<?php echo $data['id_level'];?>"><?php echo $data['nama_level'];?></option>
                            <option value="">-----Pilih Level-----</option>
								<?php
									while ($datalevel=mysqli_fetch_array($resultlevel))
									{
										echo "<option value=$datalevel[id_level]>$datalevel[nama_level]</option>";
									}
								?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="status" value="">Status</label>
					<div class="col-sm-5">
						<select class="form-control" name="status" id="status">
                            <option value="<?php echo $data['status'];?>"><?php echo $data['status'];?></option>
							<option value="">-----Pilih Status-----</option>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
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
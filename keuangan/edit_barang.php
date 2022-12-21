<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - SEDERHANA</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/jquery.js"></script>
	</head>

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
            $id=$_POST['id'];
			$nama_barang = $_POST['nama_barang'];
			$kode_barang = $_POST['kode_barang'];
			$qty 		 = $_POST['qty'];
			$kategori_id = $_POST['kategori_id'];
			// menginput data ke database
			$query=mysqli_query($koneksi,"UPDATE Barang SET nama_barang='$nama_barang', kode_barang='$kode_barang', qty='$qty', kategori_id='$kategori_id' where id_barang='$id' ");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:barang.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	
        
        
		$querykategori = "SELECT * FROM kategori";
		$resultkategori = mysqli_query ($koneksi,$querykategori); 
        
        $id = $_GET['id'];

        $query_mysqli = mysqli_query($koneksi,"SELECT * FROM barang b LEFT JOIN kategori k on k.id_kategori = b.kategori_id  WHERE  b.id_barang='$id'")or die(mysqli_error());
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysqli)){
	?>
	<body>
		<br/>
		<br/>
		<div class="container">		
			<a href="barang.php" class="btn btn-outline-primary" tabindex="-1" role="button">KEMBALI</a>
			<center><h1>TAMBAH DATA BARANG</h1></center>

			<form class="form-horizontal"  method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="nama_barang">Nama Barang</label>
					<div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_barang'];?>">
						<input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang'];?>">
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-2" for="kode_barang">Kode Barang</label>
					<div class="col-sm-5"> 
						<input type="text" class="form-control" name="kode_barang" value="<?php echo $data['kode_barang'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="qty">Qty Barang</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" name="qty" value="<?php echo $data['qty'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="kategori_id">Kategori Barang</label>
					<div class="col-sm-5">
						<select class="form-control" name="kategori_id" id="kategori_id">
                            <option value="<?php echo $data['kategori_id'];?>"><?php echo $data['nama_kategori'];?></option>
							<option value="">-----Pilih Kategori-----</option>
								<?php
									while ($datakategori=mysqli_fetch_array($resultkategori))
									{
										echo "<option value=$datakategori[id_kategori]>$datakategori[nama_kategori]</option>";
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
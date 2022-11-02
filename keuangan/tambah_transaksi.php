<!DOCTYPE html>
<html>
	<head>
		<title>CRUD - SEDERHANA</title>
		<script src="js/jquery.js"></script>
		
	</head>

	<?php
		// koneksi database
		include 'koneksi.php';
		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$tgl_transaksi = $_POST['tgl_transaksi'];
			$no_transaksi = $_POST['no_transaksi'];
			$jenis_transaksi = $_POST['jenis_transaksi'];
			$barang_id = $_POST['barang_id'];
			$diskon_member = $_POST['diskon_member'];
			$diskon_barang = $_POST['diskon_barang'];
			$total_pembelian = $_POST['total_pembelian'];
			$total_diskon = $_POST['total_diskon'];
			$jumlah_transaksi = $_POST['jumlah_transaksi'];
			$id_member = $_POST['id_member'];

			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into transaksi values('','$tgl_transaksi','$no_transaksi','$jenis_transaksi','$barang_id','$diskon_member','$diskon_barang','$total_pembelian','$total_diskon','$jumlah_transaksi','$id_member')");

			if($query)
			{
				// mengalihkan halaman kembali
				header("location:transaksi.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	

		$querybarang = "SELECT * FROM barang";
		$resultbarang = mysqli_query ($koneksi,$querybarang); 

		$querymember = "SELECT * FROM member
						LEFT JOIN level on level.id_level = member.id_level
						LEFT JOIN diskon on diskon.id_level = level.id_level;
						";
		$resultmember = mysqli_query ($koneksi,$querymember); 
	?>
	<body>
		<h2>MODULE TRANSAKSI</h2>
		<br/>
		<a href="transaksi.php">KEMBALI</a>
		<br/>
		<br/>
		<h3>TAMBAH DATA TRANSAKSI</h3>
		<form method="POST">
			<table>
				<tr>
					<td>Member</td>
					<td>
						<select name="id_member" id="id_member" onchange="DataMember()">
							<option value="">-----Pilih-----</option>
							<?php
							while ($datamember=mysqli_fetch_array($resultmember))
							{
								echo "<option value=$datamember[id_member]>$datamember[nama_member]</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tanggal Transaksi</td>
					<td><input type="date" name="tgl_transaksi"></td>
				</tr>
				<tr>
					<td>No. Transaksi</td>
					<td><input type="text" name="no_transaksi"></td>
				</tr>
				<tr>
					<td>Jenis Transaksi</td>
					<td>
						<select name="jenis_transaksi">
							<option value="">-----Pilih-----</option>
							<option value="TUNAI">TUNAI</option>
							<option value="CREDIT">CREDIT</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Barang</td>
					<td>
						<select name="barang_id">
							<option value="">-----Pilih-----</option>
							<?php
							while ($databarang=mysqli_fetch_array($resultbarang))
							{
								echo "<option value=$databarang[id_barang]>$databarang[nama_barang]</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Total Pembelian</td>
					<td><input type="number" name="total_pembelian" id='total_pembelian' onchange="TotalPembelian()"></td>
				</tr>
				<tr>
					<td>Diskon Member</td>
					<td><input type="number" name="diskon_member" id="diskon_member"></td>
					<td>%</td>
				</tr>
				<tr>
					<td>Diskon Barang</td>
					<td><input type="number" name="diskon_barang" id="diskon_barang"></td>
					<td>%</td>
				</tr>
				<tr>
					<td>Total Diskon</td>
					<td><input type="number" name="total_diskon" id='total_diskon'></td>
					<td>%</td>
				</tr>
				<tr>
					<td>Jumlah Transaksi</td>
					<td><input type="number" name="jumlah_transaksi" id='jumlah_transaksi'></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="save"></td>
				</tr>
			</table>
		</form>
		<script type='text/javascript'>
			function DataMember()
			{
				var id_member = document.getElementById("id_member").value;
				//alert(id_member);

				$.ajax
				({
					url : "ambilmember.php",
					method : "POST",
					data : {
						x : id_member 
					},
					dataType : "JSON",
					success : function(data){
						document.getElementById("diskon_member").value = data.Diskon;

						document.getElementById("diskon_member").setAttribute('readonly',true);
					}
				})
			}

			function TotalPembelian()
			{
				
				var total_pembelian = document.getElementById("total_pembelian").value;
				//alert(total_pembelian);

				if (total_pembelian > 100000) {
					var diskon_barang = document.getElementById("diskon_barang").value = 10;
				} else {
					var diskon_barang = document.getElementById("diskon_barang").value = 0;
				}

				var diskon_member = document.getElementById("diskon_member").value;

				var total_diskon = document.getElementById("total_diskon").value = (((parseInt(diskon_member) + parseInt(diskon_barang))/100)*total_pembelian);
				//alert(total_diskon);

				var jumlah_transaksi = document.getElementById("jumlah_transaksi").value = (total_pembelian - total_diskon) ;
				//alert(jumlah_transaksi);
			}
		</script>					
		
	</body>
</html>
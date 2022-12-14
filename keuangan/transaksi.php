<?php
session_start();
include_once('koneksi.php');
$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

    if(isset($_SESSION['username']) && isset($_SESSION['level']))
    {
		if(isset($_POST['search']))
		{
			$no = 1;
			$query = mysqli_query($koneksi," SELECT 
													t.tgl_transaksi,
													t.no_transaksi,
													t.jenis_transaksi,
													b.nama_barang,
													t.diskon_member,
													t.diskon_barang,
													t.total_pembelian,
													t.total_diskon,
													t.jumlah_transaksi,
													m.nama_member
												 FROM 
													transaksi t 
												LEFT JOIN 
													barang b on t.barang_id = b.id_barang 
												LEFT JOIN 
													member m on t.id_member = m.id_member 
												WHERE
													(t.no_transaksi like '%".$_POST['searchtransaksi']."%') 
													OR (b.nama_barang like '%".$_POST['searchtransaksi']."%') 
													OR (t.diskon_member like '%".$_POST['searchtransaksi']."%') 
													OR (t.diskon_barang like '%".$_POST['searchtransaksi']."%') 
													OR (t.total_pembelian like '%".$_POST['searchtransaksi']."%') 
													OR (t.total_diskon like '%".$_POST['searchtransaksi']."%') 
													OR (t.jumlah_transaksi like '%".$_POST['searchtransaksi']."%') 
													OR (m.nama_member like '%".$_POST['searchtransaksi']."%') ");
		}
		else
		{
			$no = 1;
			$query = mysqli_query($koneksi," SELECT 
													t.tgl_transaksi,
													t.no_transaksi,
													t.jenis_transaksi,
													b.nama_barang,
													t.diskon_member,
													t.diskon_barang,
													t.total_pembelian,
													t.total_diskon,
													t.jumlah_transaksi,
													m.nama_member
												FROM 
													transaksi t 
												LEFT JOIN 
													barang b on t.barang_id = b.id_barang 
												LEFT JOIN 
													member m on t.id_member = m.id_member 
												");
		}
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
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	</head>
	<body>
		<h2>MODULE TRANSAKSI</h2>
		</br>
			<form method="POST">
				<table>
					<tr>
						<td><input type="text" name="searchtransaksi" id="searchtransaksi"></td>
						<td><input type="submit" name="search" value="Search"></td>
					</tr>
				</table>
			</form>
			<a href="tambah_transaksi.php" class="btn btn-outline-primary" tabindex="-1" role="button">TAMBAH TRANSAKSI</a>
			<a href="view_report.php" class="btn btn-outline-primary" tabindex="-1" role="button">REPORT</a>
		<br/>
		<br/>
		<table border="1" class="table">
			<tr>
				<th>No</th>
				<th>Tanggal Transaksi</th>
				<th>No. Transaksi</th>
				<th>Jenis Transaksi</th>
				<th>Barang</th>
				<th>Diskon Member</th>
				<th>Diskon Barang</th>
				<th>Total Pembelian</th>
				<th>Total Diskon</th>
				<th>Jumlah Transaksi</th>
				<th>User</th>
				<th>OPSI</th>
			</tr>
			<?php
				while($fedy = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $fedy['tgl_transaksi']; ?></td>
				<td><?php echo $fedy['no_transaksi']; ?></td>
				<td><?php echo $fedy['jenis_transaksi']; ?></td>
				<td><?php echo $fedy['nama_barang']; ?></td>
				<td><?php echo $fedy['diskon_member']; ?></td>
				<td><?php echo $fedy['diskon_barang']; ?></td>
				<td><?php echo $fedy['total_pembelian']; ?></td>
				<td><?php echo $fedy['total_diskon']; ?></td>
				<td><?php echo $fedy['jumlah_transaksi']; ?></td>
				<td><?php echo $fedy['nama_member']; ?></td>
				<td>
					<a href="edit_transaksi.php?id=<?php echo $fedy['id']; ?>">EDIT</a>
					<a href="hapus_transaksi.php?id=<?php echo $fedy['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
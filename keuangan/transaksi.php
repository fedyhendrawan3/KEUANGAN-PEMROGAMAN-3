<?php
session_start();
$username   = $_SESSION['username'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

    if(isset($_SESSION['username']) && isset($_SESSION['level']))
    {
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
	</head>
	<body>
		<h2>MODULE TRANSAKSI</h2>
		<br/>
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
				include_once ('koneksi.php');
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM transaksi t LEFT JOIN barang b on t.barang_id = b.id_barang LEFT JOIN member m on t.id_member = m.id_member");
				while($data = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['tgl_transaksi']; ?></td>
				<td><?php echo $data['no_transaksi']; ?></td>
				<td><?php echo $data['jenis_transaksi']; ?></td>
				<td><?php echo $data['nama_barang']; ?></td>
				<td><?php echo $data['diskon_member']; ?></td>
				<td><?php echo $data['diskon_barang']; ?></td>
				<td><?php echo $data['total_pembelian']; ?></td>
				<td><?php echo $data['total_diskon']; ?></td>
				<td><?php echo $data['jumlah_transaksi']; ?></td>
				<td><?php echo $data['nama_member']; ?></td>
				<td>
					<a href="edit_transaksi.php?id=<?php echo $data['id']; ?>">EDIT</a>
					<a href="hapus_transaksi.php?id=<?php echo $data['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
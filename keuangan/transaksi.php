<html>
	<head>
		<title>CRUD - SEDERHANA</title>
	</head>
	<body>
		<h2>MODULE TRANSAKSI</h2>
		<br/>
		<a href="tambah_transaksi.php">+ TAMBAH TRANSAKSI</a>
		<br/>
		<a href="view_report.php">+ REPORT</a>
		<table border="1">
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
				include 'koneksi.php';
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM transaksi t LEFT JOIN barang b on t.barang_id = b.id_barang LEFT JOIN member m on t.member_id = m.id_member");
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
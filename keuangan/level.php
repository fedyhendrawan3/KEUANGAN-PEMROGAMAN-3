<html>
	<head>
		<title>CRUD - SEDERHANA</title>
	</head>
	<body>
		<h2>MODULE LEVEL</h2>
		<br/>
		<a href="tambah_level.php">+ TAMBAH LEVEL</a>
		<br/>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama Level</th>
                <th>Nama Tipe</th>
				<th>OPSI</th>
			</tr>
			<?php
				include 'koneksi.php';
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM level
                                                LEFT JOIN tipe on level.id_tipe = tipe.id_tipe
                                    ");
				while($data = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['nama_level']; ?></td>
                <td><?php echo $data['nama_tipe']; ?></td>
				<td>
					<a href="edit_kategori.php?id=<?php echo $data['id']; ?>">EDIT</a>
					<a href="hapus_kategori.php?id=<?php echo $data['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
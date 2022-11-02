<html>
	<head>
		<title>CRUD - SEDERHANA</title>
	</head>
	<body>
		<h2>MODULE DISKON</h2>
		<br/>
		<a href="tambah_diskon.php">+ TAMBAH DISKON</a>
		<br/>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Diskon</th>
                <th>Level</th>
				<th>OPSI</th>
			</tr>
			<?php
				include 'koneksi.php';
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM diskon
                                                LEFT JOIN level on level.id_level = diskon.id_level
                                    ");
				while($data = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['diskon']; ?></td>
                <td><?php echo $data['nama_level']; ?></td>
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
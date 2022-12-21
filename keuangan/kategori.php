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
			<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		</head>
		<body>
			<h2>MODULE KATEGORI</h2>
			<br/>
			<td>Search <input type="text" name="searchkategori" id="searchkategori"></td>
			<br/>
			<br/>
			<a href="tambah_kategori.php" class="btn btn-outline-primary" tabindex="-1" role="button">TAMBAH KATEGORI</a>
			<br/>
			<br/>
			<table border="1" class='table'>
				<tr>
					<th>No</th>
					<th>Nama Kategori</th>
					<th>OPSI</th>
				</tr>
				<?php
					include_once('koneksi.php');
					$no = 1;
					$query = mysqli_query($koneksi,"SELECT * FROM kategori");
					while($fedy = mysqli_fetch_array($query))
					{
				?>
				<tbody id="table-fedy">
				<tr>
					<td><?php echo $no++;?></td>
					<td><?php echo $fedy['nama_kategori']; ?></td>
					<td>
						<a href="edit_kategori.php?id=<?php echo $fedy['id_kategori']; ?>">EDIT</a>
						<a href="hapus_kategori.php?id=<?php echo $fedy['id_kategori']; ?>">HAPUS</a>
					</td>
				</tr>
				</tbody>
				<?php
					}
				?>
			</table>
		</body>
		<script type='text/javascript'>
		$(document).ready(function(){
			$("#searchkategori").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#table-fedy tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
		</script>
	</html>

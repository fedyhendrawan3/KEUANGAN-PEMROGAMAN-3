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
			<h2>MODULE USER</h2>
			<br/>
			<td>Search <input type="text" name="searchuser" id="searchuser"></td>
			<br/>
			<br/>
			<a href="tambah_user.php" class="btn btn-outline-primary" tabindex="-1" role="button">TAMBAH USER</a>
			<br/>
			<br/>
			<table border="1" class="table">
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Password</th>
					<th>Level</th>
					<th>Status</th>
					<th>OPSI</th>
				</tr>
<?php
					include_once('koneksi.php');
					$no = 1;
					$query = mysqli_query($koneksi,"SELECT * FROM user
													LEFT JOIN level on level.id_level = user.level 
										");
					while($fedy = mysqli_fetch_array($query))
					{
?>
				<tbody id="table-fedy">
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $fedy['username'] ?></td>
						<td><?php echo $fedy['password'] ?></td>
						<td><?php echo $fedy['nama_level'] ?></td>
						<td><?php echo $fedy['status'] ?></td>
						<td>
							<a href="edit_user.php?id=<?php echo $fedy['id_user'] ?>">EDIT</a>
							<a href="hapus_user.php?id=<?php echo $fedy['id_user'] ?>">HAPUS</a>
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
			$("#searchuser").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#table-fedy tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
		</script>
	</html>

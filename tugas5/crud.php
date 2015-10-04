<?php
	session_start();
	// jika sudah login, session username sudah diset
	if(isset($_SESSION['username'])){
		// penanda saja bahwa user sudah login
		$loggedIn = true;
	}
	else{
		$loggedIn = false;
		header("location: login-page.php");
	}
?>

<html>
<head>
	<title>HOME CRUD PHP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="main">
		<!-- membuat header -->
		<div class="header">
			<div class="header-title">
				CRUD PHP	
			</div>
			<div class="profile">
				<h2>Hello, <?php echo $_SESSION['username']; ?> ! <a href="doLogout.php"><input type="button" value="LOGOUT"></a></h2>
			</div>
		</div>

		<!-- membuat koneksi ke database rai_crud untuk menampilkan data buku-->
		<?php
			// connection attribute to db
			$host = "localhost";
			$db = "rai_crud";
			$usernameDB = "root";
			$passwordDB = "";

			// connect to db
			mysql_connect("$host", "$usernameDB", "$passwordDB") or die("failed to connect");
			mysql_select_db("$db") or die("failed to select database");
			// end of connection

			$sql = "select * from buku";
			$res = mysql_query($sql);
		?>

		<div class="crud-container">
			<!-- select all book, show in table -->
			<div class="insert-new">
				<a href="insert.php"><input type="button" value="INSERT BUKU"></a>
				<?php 
					// pesan yang akan ditampilkan setelah insert data buku
					if(isset($_SESSION['insertMessage'])){
						echo $_SESSION['insertMessage'];
					}
				?>
			</div>
			<!-- menampilkan data buku dalam tabel -->
			<div class="content">
				<table>
					<th>No.</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Aksi</th>
					<?php 
						if(mysql_num_rows($res) > 0){
							$no = 1;
							while ($row = mysql_fetch_assoc($res)) {
								echo "<tr>".
								"<td>".$no."</td>".
								"<td>".$row['judul']."</td>".
								"<td>".$row['pengarang']."</td>".
								"<td>".$row['penerbit']."</td>".
								"<td><a href='update.php?id=".$row['id']."'>Edit</a> <a href='doDelete.php?id=".$row['id']."'>Hapus</a></td>".
								"</tr>";
								$no++;
							}
						}
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
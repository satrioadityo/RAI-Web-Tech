<?php
	session_start();

	if(isset($_SESSION['username'])){
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
		<div class="header">
			<div class="header-title">
				CRUD PHP	
			</div>
			<div class="profile">
				<h2>Hello, <?php echo $_SESSION['username']; ?> ! <a href="doLogout.php"><input type="button" value="LOGOUT"></a></h2>
			</div>
		</div>

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

			$sql = "select * from buku where id = '".$_GET['id']."'";
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);

			$judul = $row['judul'];
			$pengarang = $row['pengarang'];
			$penerbit = $row['penerbit'];
		?>

		<div class="crud-container">
			<!-- tampilkan form -->
			<div class="container">
				<form action="doUpdate.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
					<div class="label-form">Judul</div><input type="text" name="judul" value="<?php echo $judul; ?>">
					<div class="label-form">Pengarang</div><input type="text" name="pengarang" value="<?php echo $pengarang; ?>">
					<div class="label-form">Penerbit</div><input type="text" name="penerbit" value="<?php echo $penerbit; ?>">
					<input type="submit" value="update">
				</form>	
			</div>
			
		</div>
	</div>
</body>
</html>
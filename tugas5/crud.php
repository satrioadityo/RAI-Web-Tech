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

			$sql = "select * from buku";
			$res = mysql_query($sql);

			
		?>

		<div class="crud-container">
			<!-- select all book, show in table -->
			<div class="content">
				<table>
					<th>No.</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Aksi</th>
					<?php 
						if(mysql_num_rows($res) > 0){
							while ($row = mysql_fetch_assoc($res)) {
					?>
					<tr>
						<td>
					<?php
							    print_r($row['id']);
				    ?></td>
				    <td>
					<?php
							    print_r($row['judul']);
				    ?></td>
				    <td>
					<?php
							    print_r($row['pengarang']);
				    ?></td>
				    <td>
					<?php
							    print_r($row['penerbit']);
				    ?></td>
				    <td>Edit Hapus</td>
				    <?php
							}
					?>
					<?php
						}
					?>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
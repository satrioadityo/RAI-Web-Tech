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
		<div class="crud-container">
			<!-- tampilkan form -->
			<div class="container">
				<form action="doInsert.php" method="POST">
					<div class="label-form">Judul</div><input type="text" name="judul">
					<div class="label-form">Pengarang</div><input type="text" name="pengarang">
					<div class="label-form">Penerbit</div><input type="text" name="penerbit">
					<input type="submit" value="Insert">
				</form>	
			</div>
			
		</div>
	</div>
</body>
</html>
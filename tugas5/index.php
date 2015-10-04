<?php
	session_start();
	// jika sudah login, session username sudah diset
	if(isset($_SESSION['username'])){
		// penanda saja bahwa user sudah login
		$loggedIn = true;
	}
	else{
		$loggedIn = false;
	}
?>

<html>
<head>
	<title>HOME CRUD PHP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="main">
		<div class="title">
			CRUD PHP
		</div>
		<!-- if not logged in, tampilkan link untuk login atau register -->
		<?php if(!$loggedIn) : ?>
		<a href="login-page.php">
			<div class="login-option">
				Login
			</div>
		</a>
		<a href="register-page.php">
			<div class="register-option">
				Register
			</div>
		</a>
		<?php
			// jika user pilih register, dan sudah register akan muncul pesan meminta login
			if(isset($_SESSION['registerMessage'])){
				echo $_SESSION['registerMessage'];
			}
		?>
		<?php else : ?>
			<!-- jika sudah login, tampilkan profile, link menuju crud dan link logout -->
		<div class="profile">
			<h2>Hello, <?php echo $_SESSION['username']; ?> !</h2>
			<a href="crud.php"><input type="button" value="CRUD"></a>
			<a href="doLogout.php"><input type="button" value="LOGOUT"></a>
		</div>
		
		<?php endif;?>
	</div>
</body>
</html>
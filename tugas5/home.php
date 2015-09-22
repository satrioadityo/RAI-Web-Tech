<?php
	session_start();

	if(isset($_SESSION['username'])){
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
		<!-- if not logged in -->
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
		<?php else : ?>
		<div class="profile">
			<h2>Hello, <?php echo $_SESSION['username']; ?></h2>
			<a href="doLogout.php">Logout</a>
		</div>
		
		<?php endif;?>
		<!-- if logged in show the data -->
		<!-- bla bla bla -->
	</div>
</body>
</html>
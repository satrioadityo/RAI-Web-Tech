<?php
	session_start();
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
		<a href="doLogout.php">Logout</a>
		<!-- if logged in show the data -->
		<!-- bla bla bla -->
	</div>
</body>
</html>
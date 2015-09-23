<?php
	session_start();

	if(isset($_SESSION['username'])){
		$loggedIn = true;
		header("location: crud.php");
	}
	else{
		$loggedIn = false;
	}
?>

<html>
<head>
	<title>REGISTER CRUD PHP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="main">
		<div class="title">
			Register
		</div>
		<div class="login-form-container">
			<form action="doInsert.php" method="POST">
			<div class="label-form">Username</div><input type="text" name="username">
			<div class="label-form">Password</div><input type="password" name="password">
			<input type="submit" value="register">
			</form>
		</div>
	</div>
</body>
</html>
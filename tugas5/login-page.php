<?php
	session_start();

	// jika user sudah login
	if(isset($_SESSION['username'])){
		$loggedIn = true;
		// redirect ke page crud
		header("location: crud.php");
	}
	else{
		$loggedIn = false;
	}
?>

<html>
<head>
	<title>LOGIN CRUD PHP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


	<div class="main">
		<div class="title">
			Login
		</div>
		<!-- menampilkan form login -->
		<div class="login-form-container">
			<form action="doLogin.php" method="POST">
			<div class="label-form">Username</div><input type="text" name="username">
			<div class="label-form">Password</div><input type="password" name="password">
			<input type="submit" value="login">
			</form>
		</div>
		<?php 
			if(isset($_SESSION['loginMessage'])){
				echo $_SESSION['loginMessage'];
			}
		?>
	</div>
</body>
</html>
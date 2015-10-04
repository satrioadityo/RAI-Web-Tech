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

	// get value from form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// check if user exist or not
	$sql = "select username, password from users where username='".$username."' and password='".$password."' limit 1";
	$result = mysql_query($sql);

	// jika user ada
	if(mysql_num_rows($result) == 1){
		// make session
		session_start();
		// tambahkan key ke session
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;

		// redirect to crud.php
		header("location: crud.php");
	}
	else{
		session_start();
		// pesan yang akan ditampilkan jika login gagal atau akun salah
		$_SESSION['loginMessage'] = "Invalid username or password, please try again !";
		header("location: login-page.php");
	}

?>
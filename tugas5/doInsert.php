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
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];

	$sql = "insert into buku values (null, '".$judul."', '".$pengarang."', '".$penerbit."')";
	$res = mysql_query($sql);

	if($res){
		session_start();
		$_SESSION['insertMessage'] = "Input data success";
		header("location: crud.php");
	}
	else{
		session_start();
		$_SESSION['insertMessage'] = "Failed to input";
		header("location: crud.php");
	}

?>
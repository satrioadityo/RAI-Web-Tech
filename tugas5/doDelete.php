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


	// query untuk menghapus data buku berdasarkan id
	$sql = "delete from buku where id = '".$_GET['id']."'";
	$res = mysql_query($sql);

	if($res){
		session_start();
		// pesan yang akan ditampilkan ketika delete berhasil
		$_SESSION['insertMessage'] = "Delete data success";
		header("location: crud.php");
	}
	else{
		session_start();
		$_SESSION['insertMessage'] = "Failed to Delete";
		header("location: crud.php");
	}

?>
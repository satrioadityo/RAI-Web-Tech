<?php 
	// connection attribute to db
	$host = "localhost";
	$db = "rai_chart";
	$usernameDB = "root";
	$passwordDB = "";

	// connect to db
	mysql_connect("$host", "$usernameDB", "$passwordDB") or die("failed to connect");
	mysql_select_db("$db") or die("failed to select database");

	// end of connection
?>
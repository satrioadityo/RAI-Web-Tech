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

	$sql = "insert into users values (null, '".$username."', '".$password."')";
	$res = mysql_query($sql);

	if($res){
		echo "Your registration is success!";
	}
	else{
		echo "Failed to register";
	}

?>
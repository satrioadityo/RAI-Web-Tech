<?php 
	// menghapus session untuk logout
	session_start();
	session_unset();
	session_destroy();
	
	header("location: index.php");
?>
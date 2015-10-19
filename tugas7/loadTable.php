<?php 
	// untuk membuat koneksi ke db
	include("koneksi.php");
	
	// query untuk mendapatkan data mahasiswa yang terakhir diinputkan user
	$data = "SELECT * FROM mahasiswa order by id desc limit 1";
	$res = mysql_query($data);

	$result = mysql_fetch_assoc($res);

	//data akan dikirimkan ke index.php dalam bentuk json
	echo json_encode($result);
?>
<?php 
	// untuk membuat koneksi ke db
	include("koneksi.php");

	$nama = $_POST['nama'];
	$jenisKelamin = $_POST['jenisKelamin'];
	$angkatan = $_POST['angkatan'];

	$sql_insert = "INSERT INTO mahasiswa values (null, '".$nama."', '".$jenisKelamin."', '".$angkatan."')";
	$res = mysql_query($sql_insert);
 ?>
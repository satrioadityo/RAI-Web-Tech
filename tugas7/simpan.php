<?php 
	// untuk membuat koneksi ke db
	include("koneksi.php");

	// get value dari input user
	$nama = $_POST['nm'];
	$jenisKelamin = $_POST['jnsklmn'];
	$angkatan = $_POST['angktn'];

	// query untuk insert ke database
	$sql_insert = "INSERT INTO mahasiswa values (null, '".$nama."', '".$jenisKelamin."', '".$angkatan."')";
	$res = mysql_query($sql_insert);
 ?>
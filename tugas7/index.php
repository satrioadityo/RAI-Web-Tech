<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ajax Chart Mahasiswa</title>

		<!-- Bootstrap CSS -->
		<link href="bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<?php 
			// untuk membuat koneksi ke db
			include("koneksi.php");
			
			// query untuk menampilkan seluruh data mahasiswa
			$data = "SELECT * FROM mahasiswa";
			$res = mysql_query($data);		
		?>

		<div class="container">
			<!-- judul/header -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="title">
						<h1 class="text-center">AJAX INSERT Data Mahasiswa</h1>
					</div>
				</div>
			</div>

			<!-- form dalam modal untuk mendapatkan input user -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>TAMBAH MAHASISWA</a>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">TAMBAH DATA MAHASISWA</h4>
								</div>
								<div class="modal-body">
									<form action="" method="POST" id="formMahasiswa">
										<div class="form-group">
											<label for="Nama">Nama</label>
											<input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
										</div>
										<div class="form-group">
											<label for="Jenis Kelamin">Jenis Kelamin</label>
											<select name="jenisKelamin" id="inputJenisKelamin" class="form-control">
												<option value="L">L</option>
												<option value="P">P</option>
											</select>
										</div>
										<div class="form-group">
											<label for="Angkatan">Angkatan</label>
											<input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Input Angkatan">
										</div>

										<button type="submit" class="btn btn-primary" id="buttonSimpan">SIMPAN</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- view data mahasiswa dalam table -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="view">
						<!-- table data -->
						<table class="table table-striped table-hover" id="table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Angkatan</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									// menampilkan detail data mahasiswa untuk angkatan yang dipilih
									if(mysql_num_rows($res) > 0){
										$no = 1;
										while ($row = mysql_fetch_assoc($res)) {
											echo "<tr>".
													"<td>".$no++."</td>".
													"<td>".$row['nama']."</td>".
													"<td>".$row['jenis_kelamin']."</td>".
													"<td>".$row['angkatan']."</td>".
												 "</tr>";
										}
									}	
									else{
										echo "no result";
									}
								 ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="bootstrap.min.js"></script>

		<!-- jquery function -->
		<script type="text/javascript">
			$('#formMahasiswa').submit(function(event) {
				/* disable normal submit */
				return false;
			});

			// submit dengan jquery and ajax
			$('#buttonSimpan').on('click', function(event) {
				event.preventDefault();
				// pakai ajax untuk mengirim input user
				$.ajax({
					url: 'simpan.php',
					type: 'POST',
					cache: false,
					data: {nm: nama.value, jnsklmn : $('#inputJenisKelamin').val(), angktn : angkatan.value}
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					alert("error inserting");
				})
				.success((function(){
					// kalau sudah berhasil insert, modal ditutup
					$('#modal-id').modal('hide');

					// reload table
					$.ajax({
						url: 'loadTable.php',
						success: (function(data){
							// json yang dikirim dari loadTable.php akan diparsing dulu
							var obj = $.parseJSON(data);

							// setelah diparsing data ditambahkan ke table
							var x = document.getElementById('table').rows.length;
						    var row = "<tr><td>"+x+"</td><td>"+obj.nama+"</td><td>"+obj.jenis_kelamin+"</td><td>"+obj.angkatan+"</td></tr>";
						    $('#table > tbody').append(row);
						})
					})
					.done(function() {
						console.log("success");
					})
					.fail(function() {
						console.log("error coeg");
					})
					.always(function() {
						console.log("complete");
					});
				}));
				
			});
		</script>
	</body>
</html>
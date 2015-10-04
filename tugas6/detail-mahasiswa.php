<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chart Mahasiswa</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="Chart.js"></script>

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
			
			// select distinct angkatan diurutkan, untuk memberi label pada chart
			$labels = "SELECT * FROM mahasiswa WHERE angkatan = '".$_GET['angkatan']."'";
			$res = mysql_query($labels);

			// if(mysql_num_rows($res) > 0){
			// 	while ($row = mysql_fetch_assoc($res)) {
			// 		echo $row['nama']." ".$row['jenis_kelamin']." ".$row['angkatan'];
			// 	}
			// }	
			// else{
			// 	echo "no result";
			// }		
		?>

		<div class="container">
			<!-- judul/header -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="title">
						<h1 class="text-center">Detail Data Mahasiswa</h1>
					</div>
				</div>
			</div>

			<!-- view data table -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="view">
						<!-- table data -->
						<table class="table table-striped table-hover">
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
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
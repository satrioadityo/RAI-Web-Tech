<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chart Mahasiswa</title>

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
			
			// select distinct angkatan diurutkan, untuk memberi label pada chart
			$labels = "SELECT DISTINCT angkatan FROM mahasiswa ORDER BY angkatan ASC";
			$res = mysql_query($labels);

			// array penampung data
			$labelChart = array();

			if(mysql_num_rows($res) > 0){
				while ($row = mysql_fetch_assoc($res)) {
					// masing2 angkatan push ke array untuk nanti dipindah ke javascript
					array_push($labelChart, $row['angkatan']);
					// label untuk chart sudah dapat
				}
			}

			// untuk masing2 label dalam labelChart, cari jumlah datanya
			// array penampung data
			$nData = array();
			foreach ($labelChart as $label) {
				// untuk setiap angkatan yg ada di db dicari jumlahnya
				$nLabel = "SELECT COUNT(angkatan) as angkatan FROM mahasiswa WHERE angkatan = '".$label."'";
				$res = mysql_query($nLabel);	

				if(mysql_num_rows($res) == 1){
					$row = mysql_fetch_assoc($res);
					// jumlah data setiap angkatan ditampung ke array untuk dipindah ke dataset js
					array_push($nData, $row['angkatan']);
					// jumlah data setiap angkatan sudah dapat
				}
			}
		?>

		<div class="container">
			<!-- judul/header -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="title">
						<h1 class="text-center">Chart Data Mahasiswa</h1>
					</div>
				</div>
			</div>

			<!-- view data chart-->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<div id="chartContainer" style="height: 400px;"></div>
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
									// untuk membuat koneksi ke db
									include("koneksi.php");
									
									// select distinct angkatan diurutkan, untuk memberi label pada chart
									$data = "SELECT * FROM mahasiswa";
									$res = mysql_query($data);
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

		<script type="text/javascript">
			// untuk menampilkan resume data mahasiswa dalam bentuk bar chart
			window.onload = function () {
			  var chart = new CanvasJS.Chart("chartContainer", {
			    title: {
			    	// set title null, karna sudah ada header
			    	text: ""
			    },
			    axisY: {
			    	// judul untuk sumbu Y
			    	title: "Jumlah"
			    },
			    axisX: {
			    	// judul untuk sumbu X
			    	title: "Angkatan"
			    },
			    data: [
				    {
				    	type: "column",
				    	// isikan link ke tooltip
				    	toolTipContent: "<a href = {name}> {label}</a><hr/>Jumlah mahasiswa: {y}",                

				    	// data untuk chart
				    	dataPoints: [
				      		<?php
				      			for ($i = 0; $i < count($labelChart); $i++) {
				      				echo "{ y : ".$nData[$i].", label : ".$labelChart[$i].", name: \"detail-mahasiswa.php?angkatan=".$labelChart[$i]."\" },";
				      			};

				      		?>
				    	]
				    } 	
			    ]
			  });

			  // menampilkan chart
			  chart.render();
			}
		</script>
		<script type="text/javascript" src="canvasjs.js"></script>

		<!-- jQuery -->
		<script src="jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="bootstrap.min.js"></script>
	</body>
</html>
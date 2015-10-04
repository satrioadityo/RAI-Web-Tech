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
		</div>

		<script type="text/javascript">
			window.onload = function () {
			  var chart = new CanvasJS.Chart("chartContainer", {
			    title: {
			      text: ""
			    },
			    axisY: {
			      title: "Jumlah"
			    },
			    axisX: {
			      title: "Angkatan"
			    },
			    data: [
				    {
				      type: "column",
				      toolTipContent: "<a href = {name}> {label}</a><hr/>Jumlah mahasiswa: {y}",                

				      dataPoints: [
			      		<?php 
			      			for ($i = 0; $i < count($labelChart); $i++) {
			      				echo "{ y : ".$nData[$i].", label : ".$labelChart[$i].", name: \"detail-mahasiswa.php?angkatan=".$labelChart[$i]."\" },";
			      			};

			      		 ?>
						// {  y: 84, label: "home", name: "/" }, ...
				      ]
				    } 	
			    ]
			  });

			  chart.render();
			}
		</script>
		<script type="text/javascript" src="canvasjs.js"></script>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
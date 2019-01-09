<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2017',  1000,      400],
          ['2018',  1170,      460],
          ['2019',  660,       1120],
          ['2020',  1030,      540]
        ]);

        var options = {
          title: 'Weekly Revenue',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2020',  1000,      400],
          ['2019',  1170,      460],
          ['2018',  660,       1120],
          ['2017',  1030,      540]
        ]);

        var options = {
          title: 'Weekly Orders',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart1'));

        chart.draw(data, options);
      }
    </script>
<?php include 'inc/navtrainer.php'; ?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Purchase food</h2>
						<!-- <p>You can order products from here</p> -->
					</div>
					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart" style="width: 550px; height: 300px"></div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart1" style="width: 550px; height: 300px"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

  <!--pi chart-->



  <!--end of pi chart-->


<?php include 'inc/footer.php' ?>

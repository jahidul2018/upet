<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php 
/*include 'inc/header.php';*/
 ?>

<!--nav start-->
<?php 
/*include 'inc/navshelter.php'; */
?>  

<!--nav end-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> upet Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">


      <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php include_once 'sidenev.php'; ?> 
    <!-- Page Content -->
   <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                         <?php
                                            $ordsqlr = "SELECT count(id) as 'id' FROM shelter";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                        
                                        <div>Number of shelter</div>
                                    </div>
                                </div>
                            </div>
                            <a href="viewshelter.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $ordsqlr = "SELECT count(id) as 'id' FROM orders where ivid like '%Shel%'";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                        <div>Number of booked!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="orders-shelter.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $ordsqlr = "SELECT count(id) as 'id' FROM orders where ivid like '%Shel%' and paymentid like '%pid%'";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                        <div>confirm Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="orders-shelter -paid-confirm.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $ordsqlr = "SELECT count(id) as 'id' FROM orders where ivid like '%Shel%' and paymentid like '%Not Paid%'";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                        <div>Panding Booking!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="orders-shelter -requested .php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
			  <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                shelter List
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
												<th> Shelter Name</th>
									            <th>Type</th>
									            <th>price</th>
									            <th>Duration</th>
									            <th>Locastion</th>
												<th>Photograph</th>
												<th> Operations </th>
                                            </tr>
                                        </thead>
                                        <tbody>
						                 <?php 	
											$sql = "SELECT * FROM shelter";
											$res = mysqli_query($connection, $sql); 
											while ($r = mysqli_fetch_assoc($res)) {
										?>
											<tr>
												<th scope="row"><?php echo $r['id']; ?></th>
												<td><?php echo $r['sheltername']; ?></td>
												
						            <td><?php echo $r['sheltertype']; ?></td>
						            <td><?php echo $r['price']; ?></td>
						            <td><?php echo $r['duration']; ?></td>
						            <td><?php echo $r['shelterlocation']; ?></td>
												<td><?php if($r['thumb']){ echo "Yes";}else{echo "No";} ?></td>
												<td><a href="editshelter.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure you want to Edit?');">Edit</a> | <a href="deletshelter.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
											</tr>
										<?php } ?>
                                          <!--   <tr class="even gradeC">
                                                <td>Trident</td>
                                                <td>Internet Explorer 5.0</td>
                                                <td>Win 95+</td>
                                                <td class="center">5</td>
                                                <td class="center">C</td>
                                            </tr>
                                           
                                            <tr class="gradeA">
                                                <td>Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td class="center">1.7</td>
                                                <td class="center">A</td>
                                            </tr>

                                            <tr class="gradeC">
                                                <td>Misc</td>
                                                <td>IE Mobile</td>
                                                <td>Windows Mobile 6</td>
                                                <td class="center">-</td>
                                                <td class="center">C</td>
                                            </tr>
                                            <tr class="gradeC">
                                                <td>Misc</td>
                                                <td>PSP browser</td>
                                                <td>PSP</td>
                                                <td class="center">-</td>
                                                <td class="center">C</td>
                                            </tr>
                                            <tr class="gradeU">
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td class="center">-</td>
                                                <td class="center">U</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>  
                


</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>


<!-- datatable -->
    <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="js/dataTables/jquery.dataTables.min.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
       <!--  end table-striped -->


	
<!-- <section id="content">
	<div class="content-blog">
		<div class="container">
			<table id="example" class="table table-striped table-bordered" >
				<thead>
					<tr>
						<th>#</th>
						<th> Shelter Name</th>
			            <th>Type</th>
			            <th>price</th>
			            <th>Duration</th>
			            <th>Locastion</th>
						<th>Photograph</th>
						<th> Operations </th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM shelter";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['sheltername']; ?></td>
						
            <td><?php echo $r['sheltertype']; ?></td>
            <td><?php echo $r['price']; ?></td>
            <td><?php echo $r['duration']; ?></td>
            <td><?php echo $r['shelterlocation']; ?></td>
						<td><?php if($r['thumb']){ echo "Yes";}else{echo "No";} ?></td>
						<td><a href="editshelter.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure you want to Edit?');">Edit</a> | <a href="deletshelter.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>

</section>

 -->
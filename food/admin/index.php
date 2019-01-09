<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php 
// include 'inc/header.php'; 
?>

<?php 
// include 'inc/navfinal.php'; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> upet Admin deshboard</title>

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
                                            $ordsqlr = "SELECT count(id) as 'id' FROM reviews ";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="reviews.php">
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
                                          $today = date('Y-m-d');
                                            

                                            $ordsqld = "SELECT count(id) as 'id' FROM orders WHERE DATE(timestamp) = CURDATE()";
                                            $ordresd = mysqli_query($connection, $ordsqld);
                                            while($ordrd = mysqli_fetch_assoc($ordresd)){
                                    
                                        ?>
                                        <div class="huge"><?php echo $ordrd['id']; ?> <?php } ?></div>
                                        <div>New order!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="todays-orders.php">
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
                    $ordsql = "SELECT count(id) as 'id' FROM orders ";
                    $ordres = mysqli_query($connection, $ordsql);
                    while($ordr = mysqli_fetch_assoc($ordres)){
                ?>
                                        <div class="huge"><?php echo $ordr['id']; ?> <?php } ?></div>
                                        <div>total Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="total-orders.php">
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
                    $ordsql = "SELECT sum(totalprice) as 't' FROM orders ";
                    $ordres = mysqli_query($connection, $ordsql);
                    while($ordr = mysqli_fetch_assoc($ordres)){
                ?>
                                        <div class="huge"><?php echo $ordr['t']; ?><?php } ?></div>
                                        <div>All Time sale</div>
                                    </div>
                                </div>
                            </div>
                            <a href="total-orders.php">
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
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $ordsqlr = "SELECT count(id) as 'id' FROM pets";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                       
                                        <div>Total list of pets</div>
                                    </div>
                                </div>
                            </div>
                            <a href="pet.php">
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
                                            $ordsql = "SELECT count(id) as 'id' FROM pets where adopt='1'";
                                            $ordres = mysqli_query($connection, $ordsql);
                                            while($ordr = mysqli_fetch_assoc($ordres)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordr['id']; ?> <?php } ?></div>
                                        
                                        <div>adopted!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
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
                                            $ordsqlr = "SELECT count(id) as 'id' FROM pets where adopt='0'";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                        
                                        <div>Not adopted</div> 
                                    </div>
                                </div>
                            </div>
                            <a href="#">
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
                                            $ordsqlr = "SELECT count(id) as 'id' FROM pets where adopt='3'";
                                            $ordresr = mysqli_query($connection, $ordsqlr);
                                            while($ordrr = mysqli_fetch_assoc($ordresr)){
                                        ?>
                            
                                        <div class="huge"><?php echo $ordrr['id']; ?> <?php } ?></div>
                                      
                                        <div>rescued list</div>
                                    </div>
                                </div>
                            </div>
                            <a href="pet-rescued-list.php">
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

                    
                    

					
					
						
							
				
					
						


</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>




	<!-- SHOP CONTENT -->
	



<?php
/* include 'inc/footer.php'*/
  ?>

<?php 
session_start();
unset($_SESSION['cart']);
require_once 'config/connect.php';
include 'inc/header.php'; ?>
<?php include 'inc/shelternav.php';

mysql_connect("localhost","root","");
mysql_select_db("ecomphp")
 ?>
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
    <script src="js/bootstrap.min.js"></script>
</head>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<!-- <h3>Purchase Food</h3> -->
						<p>Find a Shelter For Your pet from here</p>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div id="shop-mason" class="shop-mason-4col">

							<?php 
							 include 'database.php';
                       $pdo = Database::connect();
                          include("pagination/function.php");
                            $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                            $limit = 4; //if you want to dispaly 10 records per page then you have to change here
                            $startpoint = ($page * $limit) - $limit;
                            $statement = 'shelter ORDER BY id DESC'; //you have to pass your query over here//chanre the table1 name
                          	 	if(isset($_GET['id']) & !empty($_GET['id'])){
									$id = $_GET['id'];
									$statement .= " WHERE catid=$id";
								}
                          	 	
						 $res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}") or die(mysql_error());

							 while($row = mysql_fetch_assoc($res)){
							?>
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="admin/<?php echo $row['thumb']; ?>" class="img-responsive" width="250px" alt="">
											<div class="product-overlay">
												<span>
												<a href="sheltersingle.php?id=<?php echo $row['id']; ?>" class="fa fa-link"></a>
											<!-- 	<a href="addtocart.php?id=<?php echo $row['id']; ?>" class="fa fa-shopping-cart"></a> -->
												</span>					
											</div>
										</div>
										<div class="rating">
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
										</div>
										<h2 class="product-title"><a href="sheltersingle.php?id=<?php echo $row['id']; ?>"><?php echo $row['sheltername']; ?></a></h2>
										<div class="product-price">BDT  <?php echo $row['price']; ?>.00/-<span></span></div>
									</div>
								</div>
							<?php }

							Database::disconnect();

							 ?>

								
							</div>
						</div>
						<div class="clearfix"></div>
						<!-- Pagination -->
						<div class="page_nav">
							<!-- <a href=""><i class="fa fa-angle-left"></i></a>
							<a href="" class="active">1</a>
							<a href="">2</a>
							<a href="">3</a>
							<a class="no-active">...</a>
							<a href="">9</a>
							<a href=""><i class="fa fa-angle-right"></i></a>
 -->
							 <?php
								echo "<div id='pagingg' >";
								echo pagination($statement,$limit,$page);
								echo "</div>";
							?>

						</div> 
						<!-- End Pagination -->
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>

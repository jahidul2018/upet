<?php 
session_start();
unset($_SESSION['cart']);
require_once 'config/connect.php';
include 'inc/header.php'; ?>
<?php include 'inc/petnav.php'; ?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<!-- <h3>Purchase Food</h3> -->
						<p>Rescued pet List</p>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div id="shop-mason" class="shop-mason-4col">

							<?php 
								$sql = "SELECT * FROM pets";
									$sql .= " WHERE adopt=3 ";
								
								

								$res = mysqli_query($connection, $sql);
								while($r = mysqli_fetch_assoc($res)){
							?>
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="admin/<?php echo $r['thumb']; ?>" class="img-responsive" width="250px" alt="">
											<div class="product-overlay">
												<span>
												<a href="petsinglefoster.php?id=<?php echo $r['id']; ?>" class="fa fa-link"></a>
												<!-- <a href="petaddtocart.php?id=<?php echo $r['id']; ?>" class="fa fa-shopping-cart"></a> -->
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
										<h2 class="product-title"><a href="petsinglefoster.php?id=<?php echo $r['id']; ?>"><?php echo $r['petname']; ?></a></h2>
										<!-- <div class="product-price">$ <del><?php echo $r['price']; ?>.00/-</del><span></span></div> -->
									</div>
								</div>
							<?php } ?>

								
							</div>
						</div>
						<div class="clearfix"></div>
						<!-- Pagination -->
					<!-- 	<div class="page_nav">
							<a href=""><i class="fa fa-angle-left"></i></a>
							<a href="" class="active">1</a>
							<a href="">2</a>
							<a href="">3</a>
							<a class="no-active">...</a>
							<a href="">9</a>
							<a href=""><i class="fa fa-angle-right"></i></a>
						</div> -->
						<!-- End Pagination -->
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>

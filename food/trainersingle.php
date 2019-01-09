<?php 
ob_start();
session_start();

require_once 'config/connect.php';
	/*if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login2.php');
	}*/

include 'inc/header.php'; 
include 'inc/trainernav.php';
/*$db = mysqli_connect('localhost', 'root', '', 'ecomphp');*/
/*$email = $_SESSION['customer'];
$uid   = $_SESSION['customerid'];
$cart  = $_SESSION['cart'];
*/




if(isset($_GET['id']) & !empty($_GET['id'])){
	$id = $_GET['id'];
	$prodsql = "SELECT * FROM trainer WHERE id=$id";
	$prodres = mysqli_query($connection, $prodsql);
	$prodr = mysqli_fetch_assoc($prodres);
}else{
	header('location: index.php');
}

if(isset($_SESSION['customerid'])){

$uid = $_SESSION['customerid'];
}
if(isset($_POST) & !empty($_POST)){
	
	$review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);

	$revsql = "INSERT INTO reviews (pid, uid, review) VALUES ($id, $uid, '$review')";
	$revres = mysqli_query($connection, $revsql);
	if($revres){
		$smsg = "Review Submitted Successfully";
	}else{
		$fmsg = "Failed to Submit Review";
	}
}

?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<!-- <div class="page_header text-center">
						
						<p> Trainer Information</p>
					</div> -->

				
					<div class="col-md-10 col-md-offset-1">
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
			<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
					<div class="row">
						<div class="col-md-5">
							<div class="gal-wrap">
								<div id="gal-slider" class="flexslider">
									<ul class="slides">
										<li><img src="admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/></li>
									</ul>
								</div>
								<ul class="gal-nav">
									<li>
										<div>
											<img src="admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/>
										</div>
									</li>
								</ul>
								<div class="clearfix"></div>
							
							</div>
						</div>
						<div class="col-md-7 product-single">
							<h2 class="product-single-title no-margin"><em> Trainer Name: </em><?php echo $prodr['tname']; ?></h2>
							<div class="space10"></div>
							<div class="p-price"><em>Cost: </em>  <?php echo $prodr['price']; ?>.00/-</div>
							<p><?php echo $prodr['tdescription']; ?></p>
							<!--add pet details-->
								<p><strong><em> live in : </em><?php echo $prodr['tlocation']; ?></strong></p>
								<p><strong><em>Expert in : </em><?php echo $prodr['ttype']; ?></strong></p>
								<p><strong><em> Experinces Over: </em><?php echo $prodr['texperinces']; ?></strong></p>
							<!--End pet details-->
							<br>
							<form method="get" action="traineraddtocart.php">
							<div class="product-quantity">
								<span>For days</span> 
									<input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
									<!-- <?php $d=strtotime("tomorrow");  echo date("Y-m-d h:i:sa", $d)?> -->
									<input type="number" name="quant" placeholder="1" min="1" value="<?php echo $value['quantity']; ?>">
									

							</div>
							<div class="">
								<span>Start Date:</span> 
								<?php $date = date("Y-m-d", strtotime("+ 7 days"));?>
								<input type="date" name="date" min="<?php echo $date;?>" max="2021-12-31" required="" >
									

							</div> 
							<div class="space10"></div><br>
							<div class="shop-btn-wrap">
								<input type="submit" class="button btn-small" value="Hire Now"> <br>

								<!-- <a class="button btn-small" href="addtowishlist.php?id=<?php echo $prodr['id']; ?>">Add to Favorite</a> -->
							</div>
							</form>
							<br>
							
							<div class="product-meta">
								<span>Categories : 
								<?php 
								$prodcatsql = "SELECT * FROM trainer WHERE id={$prodr['id']}"; 
								$prodcatres = mysqli_query($connection, $prodcatsql);
								$prodcatr = mysqli_fetch_assoc($prodcatres);
								?>
								<a href="#"><?php echo $prodcatr['ttype']; ?></a></span><br>
							</div>
						</div>
					</div>
					<div class="clearfix space30"></div>
					<?php

					if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
								echo "<p>Please Login to see overview and review</p>";
								
						}else{
							include 'trainerreview.php';
						}

					?>
					
					<div class="space30"></div>
					<div class="related-products">
						<h4 class="heading">Recommendation</h4>
						<hr>
						<div class="row">
							<div id="shop-mason" class="shop-mason-3col">

							<?php
								$relsql = "SELECT * FROM trainer WHERE id != $id ORDER BY rand() LIMIT 3";
								$relres = mysqli_query($connection, $relsql);
								while($relr = mysqli_fetch_assoc($relres)){
							 ?>
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="admin/<?php echo $relr['thumb']; ?>" class="img-responsive" alt="">
											<div class="product-overlay">
												<span>
													<!--change the path-->
												<a href="trainersingle.php?id=<?php echo $relr['id']; ?>" class="fa fa-link"></a>
												<a href="#" class="fa fa-shopping-cart"></a>
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
										<h2 class="product-title"><a href="#"><?php echo $relr['tname']; ?></a></h2>
										<div class="product-price"><?php echo $relr['price']; ?>.00/-<span></span></div>
									</div>
								</div>
							<?php } ?>
							</div>
					
						</div>
					</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>

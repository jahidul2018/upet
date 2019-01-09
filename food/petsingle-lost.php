<?php 
ob_start();
session_start();

require_once 'config/connect.php';


include 'inc/header.php'; 






if(isset($_GET['id']) & !empty($_GET['id'])){
	$id = $_GET['id'];
	$prodsql = "SELECT * FROM pets WHERE id=$id";
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
					<div class="page_header text-center">
						
						<p> Pet Information</p>
					</div>

				
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
							<h2 class="product-single-title no-margin"><em>Name: </em><?php echo $prodr['petname']; ?></h2>
							<div class="space10"></div>
							<!-- <div class="p-price"><em>Cost: </em> $ <del><?php echo $prodr['price']; ?>.00/-</del></div> -->
							<p><?php echo $prodr['petdescription']; ?></p>
							<!--add pet details-->
								<p><strong><em>Gender : </em><?php echo $prodr['gender']; ?></strong></p>
								<p><strong><em>Age : </em><?php echo $prodr['age']; ?></strong></p>
								<p><strong><em>Trained : </em><?php echo $prodr['trained']; ?></strong></p>
							<!--End pet details-->
							<br>
							
							<br>
							
							<div class="product-meta">
								<span>Categories: 
								<?php 
								$prodcatsql = "SELECT * FROM pets WHERE id={$prodr['id']}"; 
								$prodcatres = mysqli_query($connection, $prodcatsql);
								$prodcatr = mysqli_fetch_assoc($prodcatres);
								?>
								<a href="#"><?php echo $prodcatr['petcategory']; ?></a></span><br>
							</div>
						</div>
					</div>
					<div class="clearfix space30"></div>
					<?php

					if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
								echo "<p>Please Login to see overview and review</p>";
								
						}else{
							include 'review.php';
						}

					?>
					
					<div class="space30"></div>
					
						
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>

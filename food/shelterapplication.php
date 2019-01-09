<?php 
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login2.php');
	}

include 'inc/header.php'; 
include 'inc/shelternav.php'; 
$uid = $_SESSION['customerid'];
$email = $_SESSION['customer'];
/*$cart = $_SESSION['cart'];*/

?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2></h2>
					</div>
					<div class="col-md-12">

			<h3>Recent Booking Application</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Booking No</th>
						<!-- <th>Booking Id</th> -->
						<th>Booking Date</th>
						<th>Booking Status</th>
						<th>Payment option</th>
						<!-- <th>cost</th> -->
						<th>View</th>
						<th>payment</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND ivid LIKE 'Shel%' ORDER BY id desc ";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<!-- <td>
							<?php echo $ordr['ivid']; ?>
						</td> -->
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<!-- <td>
							$ <?php echo $ordr['totalprice']; ?>.00/-
						</td> -->
						<td>
							<a href="shelterview-order.php?id=<?php echo $ordr['id']; ?>" target="_blank">Invoice</a>
							<?php if($ordr['orderstatus'] != 'Cancelled'){?>
							| <a href="shelter-cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a>
							<?php } ?>
						</td>
						<td>
							<?php if($ordr['paymentid'] != 'Not Paid'){?> <a href="pconfirmmassage.php" target="_blank">Payment Confirm</a>
							
							<?php }elseif ($ordr['orderstatus'] != 'Cancelled') {?> 
							<a href="bkash.php" >Bkash</a>||<a href="https://www.paypal.com/signin?country.x=US&locale.x=en_US" target="_blank">payple.com</a>
							<?php }else{?> cancelled <?php } ?>
						</td>
					</tr>
					
				<?php } ?>
				<?php  
						$ordsql = "SELECT sum(totalprice) as 't' FROM orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				 ?>
				 <tr><td colspan="7"></td></tr>
				<!--  <tr><td  colspan="7"> Grand Total:  <?php echo $ordr['t']; ?> $</td></tr><?php } ?> -->


				</tbody>
			</table>
<!-- 
			<table class="cart-table account-table table table-bordered">
				<thead><tr><th colspan="6">payment option</th></tr></thead>
				<tbody>
					
					 <tr><td colspan="6"> </td></tr>
						 <tr>
						 	<td colspan="3"> 
						 		<a href="bkash.php">Bkash</a>
						 	</td>
							 	<td colspan="3" >
							 		<a href="https://www.paypal.com/signin?country.x=US&locale.x=en_US">payple.com</a>
							 	</td> 
						 </tr>
				</tbody>
		</table> -->		

			<br>
				<br>
					<br>

						<!-- <div class="ma-address">
							<h3>My Addresses</h3>
								<p>The following addresses will be used on the checkout page by default.</p>

									<div class="row">
										<div class="col-md-6">
											<h4>My Address <a href="edit-address.php">Edit</a></h4>
											<?php
												$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
												$cres = mysqli_query($connection, $csql);
												if(mysqli_num_rows($cres) == 1){
													$cr = mysqli_fetch_assoc($cres);
													echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
													echo "<p>".$cr['address1'] ."</p>";
													echo "<p>".$cr['address2'] ."</p>";
													echo "<p>".$cr['city'] ."</p>";
													echo "<p>".$cr['state'] ."</p>";
													echo "<p>".$cr['country'] ."</p>";
													echo "<p>".$cr['company'] ."</p>";
													echo "<p>".$cr['zip'] ."</p>";
													echo "<p>".$cr['mobile'] ."</p>";
													echo "<p>".$cr['email'] ."</p>";
												}
											?>
										</div>

										<div class="col-md-6"></div>
									</div>

						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>
						



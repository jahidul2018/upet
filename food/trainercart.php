<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/trainernav.php'; 
$cart = $_SESSION['cart'];
?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2></h2>
						<p>Cart Information</p>


					</div>
					<div class="col-md-12">
						<table class="cart-table table table-bordered">
										<thead>
											<tr>
												<th>Drop </th>
												<th>Trainer</th>
												<th> Name</th>
												<th>Expert in </th>
												<th> per day</th>
												<th>Number of days</th>
												

												<th>Total Cost</th>
											</tr>
										</thead>
										<tbody>
											<?php
											//print_r($cart);
										$total = 0;
											foreach ($cart as $key => $value) {
												//echo $key . " : " . $value['quantity'] ."<br>";
												$cartsql = "SELECT * FROM trainer WHERE id=$key";
												$cartres = mysqli_query($connection, $cartsql);
												$cartr = mysqli_fetch_assoc($cartres);

											
										 ?>
										
											<tr>
												<td>
													<a class="remove" href="trainer-delcart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
												</td>
												<td>
													<a href="#"><img src="admin/<?php echo $cartr['thumb']; ?>" alt="" height="90" width="90"></a>					
												</td>
												<td>
													<a href="trainersingle.php?id=<?php echo $cartr['id']; ?>"><?php echo substr($cartr['tname'], 0 , 30); ?></a>					
												</td>
												<td>
													<div class="quantity"><?php echo $cartr['ttype']; ?></div>
												</td> 
												<td>
													<span class="amount"> <?php echo $cartr['price']; ?>.00/-</span>					
												</td>
												<td>
													<div class="quantity"><?php echo $value['quantity']; ?></div>
												</td> 
												
												<td>
													<span class="amount"> <?php echo ($cartr['price']*$value['quantity']); ?>.00/-</span>					
												</td>

											</tr>
										<?php 
										
											$total = $total + ($cartr['price']*$value['quantity']);
										} ?>
											<tr>
												<td colspan="7" class="actions">
													<div class="col-md-6">
													<!--	<div class="coupon">
															<label>Coupon:</label><br>
															<input placeholder="Coupon code" type="text"> <button type="submit">Apply</button>
														</div> -->
													</div>
													<div class="col-md-6">
														<div class="cart-btn button btn-lg">
															<!-- <button class="button btn-md" type="submit">Update Cart</button> -->
															<a href="trainercheckout.php" class="button btn-lg"> Book Now </a>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table><br>

			<a href="trainer.php"><center><h2>Update your cart</h2></center></a>
<br>		

		<!-- 
			<div class="cart_totals">
				<div class="col-md-8 push-md-6 no-padding">
					<h4 class="heading">Cart Totals</h4>
					<table class="table table-bordered col-md-8">
						<tbody>
							<tr>
								<th>Cart Subtotal</th>
								<td><span class="amount">$ <?php echo $total; ?>.00/-</span></td>
							</tr>
							<tr>
								<th>Shipping and Handling</th>
								<td>
									Free Shipping				
								</td>
							</tr>
							<tr>
								<th>Order Total</th>
								<td><strong><span class="amount">$ <?php echo $total; ?>.00/-</span></strong> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>	 -->
		

							
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>

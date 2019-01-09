<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/petnav.php'; 
if (isset($_SESSION['cart'])) {
$cart  = $_SESSION['cart'];}

?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center" >
						<h2>Adoption Application process</h2>
						<p>Get the best pet without any payment</p>


					</div>
					<div class="col-md-12">
						<table class="cart-table table table-bordered">
							<thead>
								<tr>
									<th>Drop Pet</th>
									<th>Image</th>
									<th>Pet Name</th>
									<th>Age</th><th>Gender</th>
									<!-- <th>Quantity</th> -->
									<!-- <th>Total Cost</th> -->

								</tr>
							</thead>
							<tbody>
								<?php
								//print_r($cart);
							$total = 0;
								foreach ($cart as $key => $value) {
									//echo $key . " : " . $value['quantity'] ."<br>";
									$cartsql = "SELECT * FROM pets WHERE id=$key";
									$cartres = mysqli_query($connection, $cartsql);
									$cartr = mysqli_fetch_assoc($cartres);

								
							 ?>
			
							<tr>
								<td>
									<a class="remove" href="petdelcart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
								</td>
								<td>
									<a href="#"><img src="admin/<?php echo $cartr['thumb']; ?>" alt="" height="90" width="90"></a>					
								</td>
								<td>
									<a href="petsingle.php?id=<?php echo $cartr['id']; ?>"><?php echo substr($cartr['petname'], 0 , 30); ?></a>					
								</td>
								<td>
									<span class="amount"> <?php echo $cartr['age']; ?></span>					
								</td>
								<<!-- td>
									<div class="quantity"><?php echo $value['quantity']; ?></div>
								</td> -->
								<<!-- td>
									<span class="amount">$ <?php echo ($cartr['price']*$value['quantity']); ?>.00/-</span>					
								</td> -->
								<td>
									<span class="amount"> <?php echo $cartr['gender']; ?></span>					
								</td>

							</tr>
						<?php 
						
							$total = $total + ($cartr['price']*$value['quantity']);
						} ?>
							<tr>
								<td colspan="6" class="actions">
									<div class="col-md-6">
									<!--	<div class="coupon">
											<label>Coupon:</label><br>
											<input placeholder="Coupon code" type="text"> <button type="submit">Apply</button>
										</div> -->
									</div>
									<div class="col-md-6">
										<div class="cart-btn button btn-lg">
											<!-- <button class="button btn-md" type="submit">Update Cart</button> -->
											<a href="petcheckout.php" class="button btn-lg"> Adoption Appliction </a>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>

			<a href="pet.php"><center><h2>Update your cart</h2></center></a>
<br>		


							
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>

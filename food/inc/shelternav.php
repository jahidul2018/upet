			<div class="menu-wrap">
				<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
					<li>
						<a href="http://localhost/upet/index.html">upet</a>
					</li>
					<li>
						<a href="shelter.php">Shelter</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
						
							<li><a href="">Dog</a></li>
							<li><a href="">Cat</a></li>
						
						</ul>
					</li>
					<li>
						<a href="myorder.php">MY Order</a>
					</li>
					<!-- <li>
						<a href="adopt/index.html">Adoption Application</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						
					</li> -->
					<li>
						<a href="#">My Account</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="http://localhost/upet/food/petapplication.php">Adopt Application</a></li>
							<li><a href="http://localhost/upet/food/shelterapplication.php">Shelter booking</a></li>
							<li><a href="http://localhost/upet/food/my-account.php">purchase Food</a></li>
							<li><a href="http://localhost/upet/food/edit-address.php">Update Address</a></li>
							<li><a href="http://localhost/upet/food/viewinfo.php"> My Address info</a></li>
							<li>
								<?php if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){?> <a href="login-myaccount.php" >LogIn</a>
									<?php }else{?> <a href="logout.php" target="_blank">Log Out</a> <?php } ?>

							</li>
						</ul>
					</li>
					
					
				</ul>

				
				<div class="header-xtra">
				<?php
				
					if(isset($_SESSION['cart'])){
						$cart = $_SESSION['cart'];
					

				//$cart = $_SESSION['cart']; 


				?>
					<div class="s-cart">
						<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em><?php
								echo count($cart); ?></em></div>

						<div class="cart-info">
							<small>You have <em class="highlight"><?php
								echo count($cart); ?> item(s)</em> in your shopping bag</small>
							<br>
							<br>
							<?php
								//print_r($cart);
								$total = 0;
								foreach ($cart as $key => $value) {
									//echo $key . " : " . $value['quantity'] ."<br>";
									$navcartsql = "SELECT * FROM shelter WHERE id=$key";
									$navcartres = mysqli_query($connection, $navcartsql);
									$navcartr = mysqli_fetch_assoc($navcartres);

								
							 ?>
							<div class="ci-item">
								<img src="admin/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
								<div class="ci-item-info">
									<h5><a href="sheltersingle.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['sheltername'], 0 , 20); ?></a></h5>
									<!-- <p><?php echo $value['quantity']; ?> x $ <?php echo $navcartr['price']; ?>.00/-</p> -->
									<div class="ci-edit">
										<!-- <a href="#" class="edit fa fa-edit"></a> -->
										<a href="shelter-delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
									</div>
								</div>
							</div>
							<?php 
							$total = $total + ($navcartr['price']*$value['quantity']);
							} 

							

						?>


							<div class="ci-total">Subtotal: $ <?php echo $total; ?>.00/-</div>
							<div class="cart-btn">
								<!--change in here-->
								<a href="sheltercart.php">View Bag</a>
								<a href="sheltercheckout.php">Checkout</a>
							</div>
						</div>
					</div>
					<!-- <div class="s-search">
						<div class="ss-ico"><i class="fa fa-search"></i></div>
						<div class="search-block">
							<div class="ssc-inner">
								<form>
									<input type="text" placeholder="Type Search text here...">
									<button type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
					</div> -->
				</div>
				<?php }?>
			</div>
		</div>
	</header>
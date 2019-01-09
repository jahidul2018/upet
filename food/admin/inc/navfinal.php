<div class="menu-wrap">
		<!-- 		<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
					<li>
						<a href="index2.php">Dashboard</a>
					</li>
					<li>
						<a href="#">Adoption</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						
					</li>
					<li>
						<a href="#">Shelter</a>
						
					</li>

					<li>
						<a href="#">Purchase Food</a>
						
					</li>
					<li>
						<a href="#"> Trainer</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="orders.php">View Orders</a></li>
						</ul>
					</li>
					<li>
						<a href="#">lost &amp; Found</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="orders.php">View Orders</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Customers</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="customers.php">View Customers</a></li>
							<li><a href="reviews.php">View Reviews</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Club</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="orders.php">View Orders</a></li>
						</ul>
					</li>
					<li>
						<a href="#">My Account</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="">Edit Profile</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			
			</div> -->
			<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
					<li>
						<a href="index.php">Dashboard</a>
					</li>
					<!-- <li>
						<a href="#">Features</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="adopt.php">ADOPT PET</a></li>
							<li><a href="Shelter.php">SHELTER</a></li>
							<li><a href="food.php">PURCHASE FOOD</a></li>
							<li><a href="trainer.php">TRAINER</a></li>
							<li><a href="lostandfound.php">LOST &AMP; FOUND</a></li>
							<li><a href="club.php"> CLUB</a></li>
						</ul>
					</li>
 -->			<li><a href="adopt.php">ADOPT PET</a></li>
			<li><a href="Shelter.php">SHELTER</a></li>
			<li><a href="food.php">PURCHASE FOOD</a></li>
			<li><a href="trainer.php">TRAINER</a></li>
			<li><a href="lostandfound.php">LOST &AMP; FOUND</a></li>
			<li><a href="club.php"> CLUB</a></li>
					
					<li>
						<a href="#">Customers</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="customers.php">View Customers</a></li>
							<li><a href="reviews.php">Reviews </a></li>
							<li><a href="subscribe.php">Subscribe </a></li>
							<li><a href="contact.php">FAQ </a></li>
						</ul>
					</li>
					<li>
						<a href="#">My Account</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="">Edit Profile</a></li>
							<li>
								<?php if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){?> <a href="login.php" >LogIn</a>
									<?php }else{?> <a href="logout.php" target="_blank">Log Out</a> <?php } ?>

							</li>
						</ul>
					</li>
				</ul>

		</div>
	</header>
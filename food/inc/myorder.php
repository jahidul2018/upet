			<div class="menu-wrap">
				<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
					<li>
						<a href="http://localhost/upet/index.html">upet</a>
					</li>
					
					<li><a href="pet0.php" class="" >Adopt Pet</a></li>
					<li><a href="shelter.php" class=""     >Shelter</a></li>
					<li><a href="indexpg1.php" class=""    >Purchase Food</a></li>
					<li><a href="trainer.php"  class=""    >Trainer</a></li>
					<li><a href="../club/lostandfoundpets.html"  class=""    >Lost&amp;Found</a></li>
					<li><a href="../club/club.html" class=""   >Club</a></li>

					<li>
						<a href="#">My Account</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="http://localhost/upet/food/petapplication.php">Adopt Application</a></li>
							<li><a href="http://localhost/upet/food/myorder.php">My Orders</a></li>
							<li><a href="http://localhost/upet/food/edit-address.php">Update Address</a></li>
							<li><a href="http://localhost/upet/food/viewinfo.php"> My Address info</a></li>
							<li>
								<?php if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){?> <a href="login-myaccount.php" target="_blank">LogIn</a>
									<?php }else{?> <a href="logout.php" target="_blank">Log Out</a> <?php } ?>

							</li>
						</ul>
					</li>
					
					
				</ul>

			</div>
		</div>
	</header>
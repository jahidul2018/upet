<?php
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}
include 'inc/header.php'; 

$uid = $_SESSION['customerid'];
/*$cart = $_SESSION['cart'];*/
?>

<div class="ma-address">
						<h3>My information </h3>
						<p>The following addresses will be used on the checkout page by default.</p>

			<div class="row">
				<div class="col-md-6">
								<center><h4> <a href="edit-address.php"><strong>Change My Address</strong></a></h4></center>
					<?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "Name: <p>".$cr['firstname'] ." ". $cr['lastname'] ."</p><br>";
							echo " Address: <p>".$cr['address1'] ."</p>";
							echo "<p>".$cr['address2'] ."</p> <br>";
							echo " City: <p>".$cr['city'] ."</p><br>";
							echo "<p>".$cr['state'] ."</p>";
							echo "country: <p>".$cr['country'] ."</p><br>";
							echo "<p>".$cr['company'] ."</p>";
							echo "Zip Code: <p>".$cr['zip'] ."</p> <br>";
							echo "contact NO: <p>".$cr['mobile'] ."</p> <br>";
							echo "your mail Address: <p>".$cr['email'] ."</p>";
						}
					?>
				</div>

				<div class="col-md-6">

				</div>
			</div>

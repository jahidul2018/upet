<! DOCTYPE HTML>

<?php
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login2.php');
	}
include 'inc/header.php'; 
include 'inc/nav.php'; 
$db = mysqli_connect('localhost', 'root', '', 'ecomphp');
$email = $_SESSION['customer'];
$uid   = $_SESSION['customerid'];

if (isset($_SESSION['cart'])) {
$cart  = $_SESSION['cart'];}

?>

<html>
<head>
	<title>Welcome</title>
	<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>

	<center>
		<div id="welcome">
			<h2>Welcome in upet !!!</h2>
				<p id="p1">An email has been sent in your email address.</p>
					<p id="p2">Check the email and follow the instructions to activate your account.</p>
						<p id="p3">If you don't find the email in Inbox, then check Spam folder.</p>
							<p id="p4">Click <a href="login2.php">here</a> to got to <em>Sign In</em> page.</p>
								<p id="p4">Click <a href="checkout.php">here</a> to got to <em>chackout</em> page.</p>

		<?php 
		    $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
			 	$result = mysqli_query($db, $user_check_query);
					$user = mysqli_fetch_assoc($result);

					  if ($user) { // if user exists

							    if ($user['email'] === $email) {
							      echo "MY Email ID :  " . $email." <br>";
							      echo "MY User Id : " . $uid;
						   }

					}


		 ?>
	
	</div></center>
<?php include 'inc/footer.php' ?>		

</body>
</html>
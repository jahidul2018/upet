<?php 
session_start();
	require_once 'config/connect.php'; 
	$db = mysqli_connect('localhost', 'root', '', 'ecomphp');

	if(isset($_POST) & !empty($_POST)){
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$password = $_POST['password'];

			/* $email = mysqli_real_escape_string($db, $_POST['email']);
			  	$password= md5(mysqli_real_escape_string($db, $_POST['password']));*/
					$sql = "SELECT * FROM users WHERE email='$email' and Active=1";
						$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
							$count = mysqli_num_rows($result);
								$r = mysqli_fetch_assoc($result);

								echo $r['email'];

	if($count == 1){
		if(password_verify($password, $r['password'])){
			//echo "User exits, create session";
			$_SESSION['customer'] = $email;
			$_SESSION['customerid'] = $r['id'];
			header("location: petcheckout.php");
		}else{
			//$fmsg = "Invalid Login Credentials";
			header("location: 202.php");
		}
	}else{
		header("location: 202.php");
	}
}
?>
<?php
	if(isset($_GET['activation_code']) & !empty($_GET['activation_code'])){
		echo $x= $_GET['activation_code'];

		$connection = mysqli_connect('localhost', 'root', '', 'ecomphp');
			if(!$connection){
				echo "Error: Unable to connect to MySQL." . PHP_EOL;
			    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}else{

				$query="UPDATE users SET Active=1,ActivityClearance='active' WHERE ActivationCode='$x'";
						$res=mysqli_query($connection, $query) or die(mysqli_error($connection));

					if ($res) {

						header('location: http://localhost/upet/index.html');
						
					}else{

						echo "account is not activited . contact with upet admin";
					}

			}

	}else{
		header('location: http://localhost/upet/404.php');
}
		
	
?> 
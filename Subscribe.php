<?php 

ob_start();
	session_start();
		require_once 'food/config/connect.php';
			include 'food/inc/header.php'; 



		$Email= "";
			
					$errors = array(); 

if (isset($_POST['submit'])) {
	 if (empty($Email)) { array_push($errors, "Email is required"); }
	 if(isset($_POST) & !empty($_POST)){
		if (isset($_POST ["Email"])) if ($_POST ["Email"] != "") { echo "Your form submission has an error.";  }
			
			$Email = mysqli_real_escape_string($connection, $_POST['Email']);
		
				


			$sql = "INSERT INTO subscribe ( Email) VALUES ('$Email')";
			$res = mysqli_query($connection, $sql);
			if($res){
				header('location: index.html');
			}else{
				$fmsg =  "Failed to submit";
				header('location: 404.php');
			}
		}
	}		


?>
<!--end php-->
<!--start php-->
<?php 

ob_start();
	session_start();
		require_once 'food/config/connect.php';
			include 'food/inc/header.php'; 


$name= "";
	$LastName= "";
		$Email= "";
			$phone= "";
				$Message= "";

					$errors = array(); 

if (isset($_POST['submit'])) {

	
	

	 if (empty($name)) { array_push($errors, "name is required"); }
	 if (empty($LastName)) { array_push($errors, "LastName is required"); }
	 if (empty($Email)) { array_push($errors, "Email is required"); }
	 if (empty($phone)) { array_push($errors, "phone is required"); }
	 if (empty($Message)) { array_push($errors, "Message is required"); }

	 if(isset($_POST) & !empty($_POST)){

			
		if (isset($_POST ["name"])) if ($_POST ["name"] != "") { echo "Your form submission has an error.";  }
			$name = mysqli_real_escape_string($connection, $_POST['name']);
			$LastName = mysqli_real_escape_string($connection, $_POST['LastName']);
			$Email = mysqli_real_escape_string($connection, $_POST['Email']);
			$phone = mysqli_real_escape_string($connection, $_POST['phone']);
			$Message = mysqli_real_escape_string($connection, $_POST['Message']);
				


			$sql = "INSERT INTO contact (name, LastName, Email, phone,Message) VALUES ('$name', '$LastName', '$Email', '$phone', '$Message')";
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
<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'ecomphp');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

			// first check the database to make sure 
		  // a user does not already exist with the same username and/or email
		  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
		  $result = mysqli_query($db, $user_check_query);
		  $user = mysqli_fetch_assoc($result);
		  
		  if ($user) { // if user exists
		    if ($user['username'] === $username) {
		      array_push($errors, "Username already exists");
		    }

		    if ($user['email'] === $email) {
		      array_push($errors, "email already exists");
		    }
		  }



		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
				$activation_code = md5($_POST['password'] + microtime());
/*
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
*/			

			//$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
				echo $sql = "INSERT INTO users (username,email, password, Active, ActivationCode) VALUES ($username,'$email', '$password' , 0, '$activation_code')";


				$result = mysqli_query($db, $sql) or die(' data are not INSERTED Error: '.mysqli_error($db));


				if(!$result){

						echo "Error : ".mysql_error();

				}
						
				else{
						require "../PHPMailer-master/PHPMailerAutoload.php";
						
						$mail = new PHPMailer;

						$mail->isSMTP();                               
						$mail->Host = 'smtp.gmail.com'; 
						$mail->SMTPAuth = true;                            
						$mail->Username = 'pc0015@diit.info'; 
						$mail->Password = 'diit123456';           
						$mail->SMTPSecure = 'tls';                           
						$mail->Port = 587;                             
						//$mail->SMTPDebug = 2;                             
						

						//$mail->addAddress('srabon.bilash@outlook.com', 'Srabon Chowdhury'); 
						$mail->addAddress($email); 
						$mail->isHTML(true);              

						$mail->Subject = 'Order report';
						$mail->Body    = '<h4>Hello '.$email.'...</h4><br/><br/>
										wellcome to <a href="http://localhost/upet/">www.upet.com</a>.<br/><brs
										Click the link below to activate your account.<br/><br/>
										<a href="http://localhost/upet/food/account_activation_mail.php?activation_code=' . $activation_code . '"> Active Account</a><br/>.<br/>';


						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						if(!$mail->send()) {
							
							echo 'Message could not be sent. <br/>';
							echo 'Mailer Error: ' . $mail->ErrorInfo;

							//$fmsg = "Invalid Login Credentials";
							header("location: register.php");
						} 
						else {
								//echo "User exits, create session";
								$_SESSION['customer'] = $email;
								$_SESSION['customerid'] = mysqli_insert_id($db);
								header("location: ../welcome.php");
						}
						
				}




		}

	}

	// ... 














	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
		
	}

?>


				

					
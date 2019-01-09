<?php 
ob_start();
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/nav2.php'; ?>
<!--End of php-->

<!--Start php-->
<?php 
	
	
	if(isset($_POST) & !empty($_POST)){

		//$email = mysqli_real_escape_string($connection, $_POST['email']);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		//activition code generat 
		$activation_code = md5($_POST['password'] + microtime());

		//$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		echo $sql = "INSERT INTO users (email, password, Active, ActivationCode) VALUES ('$email', '$password' , 0, '$activation_code')";



		$result = mysqli_query($connection, $sql) or die(' data are not INSERTED Error: '.mysqli_error($connection));
			$_SESSION['customer'] = $email;
				$_SESSION['customerid'] = mysqli_insert_id($connection);
					$_SESSION['success'] = "you are logged in";
						

		if(!$result){

				echo "Error : ".mysql_error();
			}
				
			else{
				require "PHPMailer-master/PHPMailerAutoload.php";
				
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
					header("location: login2.php?message=2");
					
				} 
				else {
						//echo "User exits, create session";
						$_SESSION['customer'] = $email;
						$_SESSION['customerid'] = mysqli_insert_id($connection);
						header("location: welcome.php");
					}
					
		}

		/*if($result){
		//echo "User exits, create session";
		$_SESSION['customer'] = $email;
		$_SESSION['customerid'] = mysqli_insert_id($connection);
		header("location: checkout.php");
		}else{
		//$fmsg = "Invalid Login Credentials";
		header("location: login2.php?message=2");
		}*/
	

	}
?>

<!--End php-->





<!--script-->

<script type="text/javascript">
	function validate(){
				
		//for Email
				
				var erremail = document.getElementById("errEmail1");
				var email = document.subscription.email;
				//var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9.]){1,}\.([A-Za-z]{2,4})$/;
				var reg2 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
				
				if(email.value === "")
				{
					erremail.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg2.test(email.value))
				{
					erremail.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
					err++;
				}
				
				else
				{
					erremail.innerHTML = " ";
				}
				
				//for password
				
				var errpass = document.getElementById("errPass");
				var pass = document.subscription.password;
				
				if(pass.value === "")
				{
					errpass.innerHTML = "This field is required";
					err++;
				}
				
				else if(pass.value.length < 8)
				{
					errpass.innerHTML = "Password must have at least 8 characters";
					err++;
				}
				
				else if( !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value) || !/[0-9]/.test(pass.value) || !/[!@#$%^&*~_]/.test(pass.value) )
				{
					errpass.innerHTML = "Must contain at least 1 uppercase letter, lowercase letter, number and special character";
					err++;
				}
				
				else
				{
					errpass.innerHTML = " ";
				}
				
				// for Re-enter Password
				
				var errRepass = document.getElementById("errRepass");
				var repass = document.subscription.reenter_password;
				
				if(repass.value === "")
				{
					errRepass.innerHTML = "This field is required";
					err++;
				}
				
				else if(repass.value !== pass.value)
				{
					errRepass.innerHTML = "Password didn't match";
					err++;
				}
				
				else
				{
					errRepass.innerHTML = " ";
				}
		
		
		console.log (err);
		
		if(err==0){
			console.log ( 'well done' );
			return true;
		}
		else{
			
			return false;
		}
			
	}			
		
		</script>

<!--End Script-->

<!--section start-->
<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<!--title-->
					<!-- <div class="page_header text-center">
						 <h2>Shop - Account</h2>
						<p>Tagline Here</p> 
					</div> -->
					<!-- End title-->
					<div class="col-md-12">
				<div class="row shop-login">
				<!--Login section-->	
				<!-- <div class="col-md-6">
					<div class="box-content">
						<h3 class="heading text-center">I'm a Returning Customer</h3>
						<div class="clearfix space40"></div>
						<?php if(isset($_GET['message'])){
								if($_GET['message'] == 1){
						 ?><div class="alert alert-danger" role="alert"> <?php echo "Invalid Login Credentials"; ?> </div>

						 <?php } }?>
						<form class="logregform" method="post" action="loginprocess.php">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail Address</label>
										<input type="email" name="email" value="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										 <a class="pull-right" href="#">(Lost Password?)</a> 
										<label>Password</label>
										<input type="password" name="password" value="" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<span class="remember-box checkbox">
									<label for="rememberme">
									<input type="checkbox" id="rememberme" name="rememberme">Remember Me
									</label>
									</span> 
								</div>
								<div class="col-md-6">
									<button type="submit" class="button btn-md pull-right">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div> -->

				<!--End of Login section-->
 				<div class="col-md-6">
					<div class="box-content">
						<h3 class="heading text-center">I'M New Here!</h3>
							<div class="clearfix space40"></div>
						<!-- <?php if(isset($_GET['message'])){ 
								if($_GET['message'] == 2){
							?><div class="alert alert-danger" role="alert"> <?php echo "Failed to Register"; ?> </div>
							<?php } } ?> -->
						<form class="logregform" method="post" action="" name="subscription">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail Address  &nbsp;</label> <span id="errEmail1" class="error"></span>
										<input type="email" name="email" class="form-control" maxlength="50">
										

									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label>Password</label> <span id="errPass" class="error"></span>
										<input type="password" name="password" maxlength="50"  class="form-control">
										
									</div>
									<div class="col-md-6">
										<label>Re-enter Password</label> <span id="errRepass" class="error"></span>
										<input type="password" name="reenter_password" maxlength="50" class="form-control">
										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="space20"></div>
									<button class="button btn-md pull-right" id="submit1" type="submit" name="submit" value="Submit" onclick=" return validate();">Register</button>
								</div>
							</div>
						</form>
					</div>
				</div> 
			</div>


							
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>

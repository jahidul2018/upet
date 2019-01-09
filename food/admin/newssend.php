<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php 

if(isset($_GET) & !empty($_GET)){
		$Email = $_GET['Email'];
	}else{
		header('location: subscribe.php');
	} 




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
																$mail->addAddress($Email); 
															$mail->isHTML(true);              

														$mail->Subject = 'www.upet.com';
													$mail->Body    = '<h4>Hello '.$Email.'...</h4><br/><br/><em>
														wellcome to <em><a href="http://localhost/upet/">www.upet.com</a>.<br/>
															 <br/><br/>Thank you for visiting from upet.com <br/>';


										$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

									if(!$mail->send()) {
												array_push($errors, "Message could not be sent.<br/>there is an error in connection".mysql_errno());
											//echo 'Mailer Error: ' . $mail->ErrorInfo;
										//$fmsg = "Invalid Login Credentials";
								} else {
								//echo "User exits, create session";
							
					header("location: subscribe.php");
				}
						
			



?>

	
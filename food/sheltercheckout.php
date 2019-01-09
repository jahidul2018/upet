<?php
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login2she.php');
	}
include 'inc/header.php'; 
include 'inc/shelternav.php'; 
$uid = $_SESSION['customerid'];
$email = $_SESSION['customer'];


if (isset($_SESSION['cart'])) {
$cart  = $_SESSION['cart'];}



/*$cart = $_SESSION['cart'];*/

if(isset($_POST) & !empty($_POST)){
	if($_POST['agree'] == true){
		$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
		$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
		$address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
		$address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
		$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		$zip = filter_var($_POST['zipcode'], FILTER_SANITIZE_NUMBER_INT);
		$she = filter_var($_POST['shelterdate'], FILTER_SANITIZE_NUMBER_INT);

		$ivid='Shel'.substr(strtoupper(md5(rand())),10,10);
		$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
		$res = mysqli_query($connection, $sql);
		$r = mysqli_fetch_assoc($res);
		$count = mysqli_num_rows($res);
		if($count == 1){
			//update data in usersmeta table
			$usql = "UPDATE usersmeta SET country='$country', firstname='$fname', lastname='$lname', address1='$address1', address2='$address2', city='$city', state='$state',  zip='$zip', company='$company', mobile='$phone' WHERE uid=$uid";
			$ures = mysqli_query($connection, $usql) or die(mysqli_error($connection));
			if($ures){

				$total = 0;
				foreach ($cart as $key => $value) {
				//echo $key . " : " . $value['quantity'] ."<br>";
				$ordsql = "SELECT * FROM shelter WHERE id=$key";
				$ordres = mysqli_query($connection, $ordsql);
				$ordr = mysqli_fetch_assoc($ordres);

				$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode, ivid) VALUES ('$uid', '$total', 'Booking Placed', '$payment','$ivid')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					//echo "Order inserted, insert order items <br>";
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM shelter WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$pid = $ordr['id'];
					$productprice = $ordr['price'];
					$quantity = $value['quantity'];


					$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity, she) VALUES ('$pid', '$orderid', '$productprice', '$quantity' ,'$she')";
					$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));

					//query for data that send to email .
				      $information="SELECT name, totalprice, thumb From shelter, orders, orderitems where orders.id=orderitems.orderid and orderitems.pid=shelter.id and orders.ivid='$ivid'";
				      $result = mysqli_query($db, $information);
				      $info = mysqli_fetch_assoc($result);

				      /*$name=$info['name'];
				      $quentity=$$info[''];*/
				      $price=$info['totalprice'];

				      //email start 
	  
						if(!$orditmres){

							echo "there is an error in connection: ".mysql_errno();
							
						}else{
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



		                  $mail->Subject = 'Order Report form upet';
		                  $mail->Body    = '<h4>Hello '.$email.'...</h4><br/><br/><em>
		                     <em>welcome to <a href="http://localhost/upet/">www.upet.com</a>.<br/><h3>
		                      your order is placed:<br><em>your Booking invoice id is : </em>
		                        '.$ivid.'</h3><br/>Please confirm your payment in 24 hours</br><em> </em>';


		                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		                  if(!$mail->send()) {
		                        array_push($errors, "Message could not be sent.<br/>there is an error in connection".mysql_errno());
		                      //echo 'Mailer Error: ' . $mail->ErrorInfo;
		                    //$fmsg = "Invalid Login Credentials";
		                    } else {
		                              //echo "User exits, create session";
		                            $_SESSION['customer'] = $email;
		                          $_SESSION['customerid'] = $uid;
		                          unset($_SESSION['cart']);
		                        header("location: complete-massage-shelter.php");
		                  }

						}//email end
					}
				}
				unset($_SESSION['cart']);
				header("location: complete-massage-shelter.php");
			}
		}else{
			//insert data in usersmeta table
			$isql = "INSERT INTO usersmeta (country, firstname, lastname, address1, address2, city, state, zip, company, mobile, uid) VALUES ('$country', '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$company', '$phone', '$uid')";
			$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
			if($ires){

				$total = 0;
				foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM shelter WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode, ivid) VALUES ('$uid', '$total', 'Booking Placed', '$payment', '$ivid')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					//echo "Order inserted, insert order items <br>";
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
						$ordsql = "SELECT * FROM shelter WHERE id=$key";
						$ordres = mysqli_query($connection, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity, she) VALUES ('$pid', '$orderid', '$productprice', '$quantity', '$she')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
						
						if(!$orditmres){

							echo "there is an error in connection: ".mysql_errno();
							
						}else{
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



			                  $mail->Subject = 'Order Report form upet';
			                  $mail->Body    = '<h4>Hello '.$email.'...</h4><br/><br/><em>
			                     <em>welcome to <a href="http://localhost/upet/">www.upet.com</a>.<br/><h3>
			                      your order is placed:<br><em>your Booking invoice id is : </em>
			                        '. $ivid . '</h3><br/><br/>Please confirm your payment in 24 hours</br><em> </em>';


			                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			                  if(!$mail->send()) {
			                        array_push($errors, "Message could not be sent.<br/>there is an error in connection".mysql_errno());
			                      //echo 'Mailer Error: ' . $mail->ErrorInfo;
			                    //$fmsg = "Invalid Login Credentials";
			                    } else {
			                              //echo "User exits, create session";
			                            $_SESSION['customer'] = $email;
			                          $_SESSION['customerid'] = $uid;
			                          unset($_SESSION['cart']);
			                        header("location: complete-massage-shelter.php");
			                  }

			                 
						}
						//email end
					 
					}
				}
				unset($_SESSION['cart']);
				header("location: complete-massage-shelter.php");
			}

		}
	
	}

}

$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
$res = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($res);
?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Shop - Checkout</h2>
						<p>Get the best food for your pet </p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
							<label class="">Country </label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD" selected >Bangladesh </option>
								<option value="BB">Barbados</option>
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input name="fname" class="form-control" placeholder="" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; } elseif(isset($fname)){ echo $fname; } ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input name="lname" class="form-control" placeholder="" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lname)){ echo $lname; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input name="company" class="form-control" placeholder="" value="<?php if(!empty($r['company'])){ echo $r['company']; }elseif(isset($company)){ echo $company; } ?>" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address1" class="form-control" placeholder="Street address" value="<?php if(!empty($r['address1'])){ echo $r['address1']; } elseif(isset($address1)){ echo $address1; } ?>" type="text">
							<div class="clearfix space20"></div>
							<input name="address2" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($r['address2'])){ echo $r['address2']; }elseif(isset($address2)){ echo $address2; } ?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>City </label>
									<input name="city" class="form-control" placeholder="City" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $city; } ?>" type="text">
								</div>
								<div class="col-md-4">
									<label>State</label>
									<input name="state" class="form-control" value="<?php if(!empty($r['state'])){ echo $r['state']; }elseif(isset($state)){ echo $state; } ?>" placeholder="State" type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input name="zipcode" class="form-control" placeholder="Postcode / Zip" value="<?php if(!empty($r['zip'])){ echo $r['zip']; }elseif(isset($zip)){ echo $zip; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input name="phone" class="form-control" id="billing_phone" placeholder="" value="<?php if(!empty($r['mobile'])){ echo $r['mobile']; }elseif(isset($phone)){ echo $phone; } ?>" type="text">


							<!--Change here -->
							<div class="row">
							
							<div class="space30"></div>
								<label class=""> pets type</label>
								<select name="own" class="form-control">
								
								<option value="Yes" selected >Dog</option>
								<option value="No">Cat</option>
								<option value="No">Others</option>

								</select>
								<div class="space30"></div>
								<label class="">Food habbit </label>
								<select name="care" class="form-control">
									
									<option value="MySelf" selected >Packet Food </option>
									<option value="Family">Row Food</option>
									<option value="Maid">Dry Food</option>
								</select>

								<div class="space30"></div>
								<label class="">What will you do with the pet if you have any plan to go abroad in future?</label>
								<select name="plan" class="form-control">
									
									<option value="Take " selected >Take Him/her With me</option>
									<option value="Give">Give Him/her up for adoption</option>
									<option value="Some one">Some one will take care of him</option>
								</select>		

								<div class="clearfix space20"></div>
								<div class="space30"></div>

								<div class="form-group">
							    <label for="productdescription"> Why do you want Shelter Your pet</label>
							    <textarea class="form-control" name="why" rows="3" required=""></textarea>
							  	</div>
							  	<div class="">
								<span>confirm Date for pick up you pet:</span> 
								<?php $date = date("Y-m-d", strtotime("+ 7 days"));?>
								<input type="date" class="form-control" id="billing_phone" name="shelterdate" min="<?php echo $date;?>" max="2020-12-01" required="" >
									

							</div>


							</div>
							<!--End change-->
						
					</div>
				</div>
				
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<table class="table table-bordered extra-padding">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount"> <?php echo $total; ?>.00/-</span></td>
					</tr>
					<tr>
						<th>  </th>
						<td>
										
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount"> <?php echo $total; ?>.00/-</span></strong> </td>
					</tr>
				</tbody>
			</table>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
<div class="payment-method">
	<div class="row">
		
	 <div class="col-md-4">
		<input name="payment" id="radio1" class="css-checkbox" type="radio" value="cash on delivery" disabled=""> <span>Cash</span>
		<div class="space20"></div>
		<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
	</div> 
	
	<div class="col-md-4">
		<input name="payment" id="radio2" class="css-checkbox" type="radio" checked  value="off line payment"><span> Bank/Bkash</span>
		<div class="space20"></div>
		<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
	</div>

	<div class="col-md-4">
		<input name="payment" id="radio3" class="css-checkbox" type="radio" value="paypal" <span> Paypal</span>
		<div class="space20"></div>
		<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
	</div>
		
	</div>
	<div class="space30"></div>
	
		<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true" checked ><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
	
	<div class="space30"></div>
	<input type="submit" class="button btn-lg" value="Order Now" onclick="return confirm('An Email has been Send to Your Mail');">
</div>
		</div>		
</form>		
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>

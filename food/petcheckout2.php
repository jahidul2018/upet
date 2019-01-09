<?php
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login2pet.php');

	}
/*
	elseif($_SESSION['customer']=true){

		$email = $_SESSION['customer'];

		$query="SELECT * FROM users WHERE email='$email' and Active=0";
			$res=mysqli_query($connection, $query) or die(mysqli_error($connection));

				if ($res) {

					header('location: http://localhost/upet/202.php');
						
				}
		}*/
include 'inc/header.php'; 
include 'inc/petnav.php'; 

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

		$ivid='Adid'.substr(strtoupper(md5(rand())),10,10);
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
				$ordsql = "SELECT * FROM pets WHERE id=$key";
				$ordres = mysqli_query($connection, $ordsql);
				$ordr = mysqli_fetch_assoc($ordres);

				$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode, ivid) VALUES ('$uid', '$total', 'Adoption Application Placed', 'Free Adoption','$ivid')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					//echo "Order inserted, insert order items <br>";
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM pets WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$pid = $ordr['id'];
					$productprice = $ordr['price'];
					$quantity = $value['quantity'];

					//update database for adopt

						$updatesql ="UPDATE pets SET adopt=1 WHERE pets.id=$pid";
						$update=mysqli_query($connection, $updatesql) or die(mysqli_error($connection));
						


					$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
					$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));

						

					//query for data that send to email .
				      $information="SELECT * From pets, orders, orderitems, usersmeta where  users.id=usersmeta.uid and orders.id=orderitems.orderid and orderitems.pid=pets.id and orders.ivid='$ivid' and users.id='$uid'";
				      $result = mysqli_query($db, $information);
				      $info = mysqli_fetch_assoc($result);

				      $name=$info['name'];
				      $quentity=$$info[''];
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



		                  $mail->Subject = 'Adoption Application Report->upet.com';
		                  $mail->Body    = '<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!------ Include the above in your HEAD tag ---------->

<style type="text/css">body {
    background: grey;
    margin-top: 120px;
    margin-bottom: 120px;
}</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <p><button onclick="myFunction()">Downlode Invoice</button>

<script>
function myFunction() {
    window.print();
}
</script> </p>
                            
                        </div>

                        <div class="col-md-6 text-right">
                        	
                            <p class="font-weight-bold mb-1">Invoice ID : '.$ivid.' </p>
                            <p class="text-muted"> Date &amp; Time :  '.$info['timestamp'].'</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">

                            <p class="font-weight-bold mb-4">Client Information</p>
                            	<p>My Address <a href="edit-address.php">Edit</a></p>

                            <?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p class='.'mb-1'.'>"'.$cr['firstname'] .'"  " '. $cr['lastname'] .'"</p>";
							echo "<p class='.'mb-1'.'>"'.$cr['address1'] .'" "'. $cr['address2'] .'" "'.$cr['city'] .'"</p>";
							echo "<p>"'.$cr['zip'] .'"</p>";
							echo "<p>"'.$cr['mobile'] .'"</p>";
							echo "<p>"'.$cr['email'] .'"</p>";
						}
					?>

                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Payment Details</p>

                            <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                            <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                            <p class="mb-1"><span class="text-muted">Payment Type: </span> Adoption is free</p>
                            <!-- <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p> -->
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Pet Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Pet Type</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Age</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Gender</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Adoption Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  

			
					<tr>
						<td>#</td>
						<td>
							'.$info['petname'].'
						</td>
						<td>
							'.$info['petcategory'].'
						</td> 
						 <td>
							'.$info['age'].'
						</td> 
						<td>
							'.$info['gender'].'
						</td>
						<td>
							 Adoption is free
						</td>
					</tr>
				<?php } ?>

					<tr><td colspan="6"></td></tr>
			
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Application Placed On</div>
                            <div class="h3 font-weight-light">'.$info['timestamp'].'</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Application Status</div>
                            <div class="h3 font-weight-light">'.$info['orderstatus'].'</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Adoption cost</div>
                            <div class="h3 font-weight-light">Adoption is free</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">© 2018 Copyright:
    Design by : <a class="text-light" href="https://about.me/jahid-al-mishuk" target="_blank" >Jahidul alam</a></div>

</div>';


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
		                        header("location: petapplication.php");

		                  }

						}//email end
					}
				}
				unset($_SESSION['cart']);
				header("location: petapplication.php");
			}
		}else{
			//insert data in usersmeta table
			$isql = "INSERT INTO usersmeta (country, firstname, lastname, address1, address2, city, state, zip, company, mobile, uid) VALUES ('$country', '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$company', '$phone', '$uid')";
			$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
			if($ires){

				$total = 0;
				foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM pets WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode, ivid) VALUES ('$uid', '$total', 'Order Placed', '$payment', '$ivid')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					//echo "Order inserted, insert order items <br>";
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
						$ordsql = "SELECT * FROM pets WHERE id=$key";
						$ordres = mysqli_query($connection, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						//update database for adopt
						$updatesql ="UPDATE pets SET adopt=1 WHERE pets.id=$pid";
						$update=mysqli_query($connection, $updatesql) or die(mysqli_error($connection));


						$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));



						

							//query for data that send to email .
					      $information="SELECT name, totalprice, thumb From pets, orders, orderitems where orders.id=orderitems.orderid and orderitems.pid=pets.id and orders.ivid='$ivid'";
					      $result = mysqli_query($db, $information);
					      $info = mysqli_fetch_assoc($result);

					      $name=$info['name'];
					      $quentity=$info['pquantity'];
					      $price=$info['totalprice'];

						
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



			                  $mail->Subject = 'Adoption Application Report->upet.com';
			                  $mail->Body    = '<h4>Hello '.$email.'...</h4><br/><br/><em>
		                     <em>welcome to <a href="http://localhost/upet/">www.upet.com</a>.<br/><h3>
		                      your Adoption Application is placed:<br><em>your Adoption Application id is : </em>
		                        '.$ivid.'</h3><br/><br><em>the pet will be deliver in 24-48 hours.<br>Thanks You</em>';


			                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			                  if(!$mail->send()) {
			                        array_push($errors, "Message could not be sent.<br/>there is an error in connection".mysql_errno());
			                      //echo 'Mailer Error: ' . $mail->ErrorInfo;
			                    //$fmsg = "Invalid Login Credentials";
			                    } else {
			                              //echo "User exits, create session";
			                            $_SESSION['customer'] = $email;
			                          $_SESSION['customerid'] = $uid;
			                        header("location: petapplication.php");
			                  }

			                 
						}
						//email end
					 
					}
				}
				unset($_SESSION['cart']);
				header("location: petapplication.php");
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
						<h3>Adoption Application process</h3>
						<p>. </p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Your Details</h3>
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
							<label>Full Name</label>
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

							<div class="clearfix space20"></div>

							<!--Change here -->
							<div class="row">
							
							<div class="space30"></div>
								<label class="">Do You Own pets </label>
								<select name="own" class="form-control">
								
								<option value="Yes" selected >Yes</option>
								<option value="No">No</option>

								</select>
								<div class="space30"></div>
								<label class="">Who will take care of the pet? </label>
								<select name="care" class="form-control">
									
									<option value="MySelf" selected >MySelf</option>
									<option value="Family">Family</option>
									<option value="Maid">Maid</option>
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
							    <label for="productdescription"> Why do you want Adopt a pet</label>
							    <textarea class="form-control" name="why" rows="3" required=""></textarea>
							  	</div>


							</div>
							<!--End change-->
						
					</div>
				</div>
				
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">pet Adoption Cost</h4>
			
			<table class="table table-bordered extra-padding">
				<tbody>
					<tr>
						<th>Pet Cost</th>
						<td><span class="amount">BDT : <?php echo $total; ?>.00/-</span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th> Total</th>
						<td><strong><span class="amount">BDT : <?php echo $total; ?>.00/-</span></strong> </td>
					</tr>
				</tbody>
			</table>
			
			<!-- <div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div> -->
			
				<div class="payment-method">
					<div class="row">
						
					<!-- <div class="col-md-4">
						<input name="payment" id="radio1" class="css-checkbox" type="radio" value="cash on delivery"> <span>Cash On Delivery</span>
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
					</div> -->
						
				</div>
	<div class="space30"></div>
	
		<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true" checked ><strong><span>I've Read And Accept  All The <a href="#">Terms &amp; Conditions</a></span></strong>
	
	<div class="space30"></div>
	<input type="submit" class="button btn-lg" value="Confirm Application">
</div>
		</div>		
</form>		
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>

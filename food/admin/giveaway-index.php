
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Welcome To upet </title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="../images/favicon.png">

	<!-- CSS -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../js/isotope/isotope.css">
	<link rel="stylesheet" href="../js/flexslider/flexslider.css">
	<link rel="stylesheet" href="../js/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="../js/owl-carousel/owl.theme.css">
	<link rel="stylesheet" href="../js/owl-carousel/owl.transitions.css">
	<link rel="stylesheet" href="../js/superfish/css/megafish.css" media="screen">
	<link rel="stylesheet" href="../js/superfish/css/superfish.css" media="screen">
	<link rel="stylesheet" href="../js/pikaday/pikaday.css">
	<link rel="stylesheet" href="../css/settings-panel.css">


	<link rel="stylesheet" href="../css/style.css">

<!-- 	<link rel="stylesheet" href="css/stylec.css"> -->


	<link rel="stylesheet" href="../css/light.css">
	<link rel="stylesheet" href="../css/responsive.css">

	<!-- JS Font Script -->
	<script src="http://use.edgefonts.net/bebas-neue.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Modernizer -->
	<script src="../js/modernizr.custom.js"></script>

</head>
<body class="multi-page">

<div id="wrapper" class="wrapper">
	<!-- HEADER -->
	<header id="header2">
	<div class="container">
<?php
	ob_start();
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: ../login-myaccount.php');
	}



$uid = $_SESSION['customerid'];
$email = $_SESSION['customer'];
/*$cart = $_SESSION['cart'];*/

if(isset($_POST) & !empty($_POST)){
	
		$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
		$address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
		$address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
		
		$zip = filter_var($_POST['zipcode'], FILTER_SANITIZE_NUMBER_INT);

		$prodname = mysqli_real_escape_string($connection, $_POST['petname']);
		$description = mysqli_real_escape_string($connection, $_POST['petdescription']);
		$category = mysqli_real_escape_string($connection, $_POST['petcategory']);
		$gender = mysqli_real_escape_string($connection, $_POST['gender']);
		$age = mysqli_real_escape_string($connection, $_POST['age']);
		$trained = mysqli_real_escape_string($connection, $_POST['trained']);

			if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['productimage']['name'];
			$size = $_FILES['productimage']['size'];
			$type = $_FILES['productimage']['type'];
			$tmp_name = $_FILES['productimage']['tmp_name'];

			$max_size = 10000000;
			$extension = substr($name, strpos($name, '.') + 1);

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
					$location = "uploads/";
					if(move_uploaded_file($tmp_name, $location.$name)){
						//$smsg = "Uploaded Successfully";
						echo $sql = "INSERT INTO pets (petname, petdescription, petcategory, gender,age, trained, adopt, thumb) VALUES ('$prodname', '$description', '$category', '$gender', '$age', '$trained', '0', '$location$name')"; 
						$res = mysqli_query($connection, $sql);
						if($res){
							//echo "Product Created";
							header('location: ../pet0.php');
						}else{
							$fmsg = "Failed to Create Pet";
						}
					}else{
						$fmsg = "Failed to Upload File";
					}
				}else{
					$fmsg = "Only JPG files are allowed and should be less that 1MB";
				}
			}else{
				$fmsg = "Please Select a File";
			}
		}else{

			$sql = "INSERT INTO pets (petname, petdescription, petcategory, gender,age, trained) VALUES ('$prodname', '$description', '$category', '$gender', '$age', '$trained')";
			$res = mysqli_query($connection, $sql);
			if($res){
				header('location: ../pet0.php');
			}else{
				$fmsg =  "Failed to Create Pet";
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
					<!-- <div class="page_header text-center">
						<h2>Shop - Checkout</h2>
						<p>Get the best kit for smooth shave</p>
					</div> -->
<div class="">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>

						
										
<form method="post" enctype="multipart/form-data">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">owner info</h3>

						<div class="space30"></div>
							
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
						<div class="space30"></div>
						 <div class="form-group">
				    <label for="Productname">Pet Name</label>
				    <input type="text" class="form-control" name="petname" id="Productname" placeholder="Pet Name" required="">
				  </div>
				  <div class="form-group">
				    <label for="productdescription"> Description</label>
				    <textarea class="form-control" name="petdescription" rows="3" required=""></textarea>
				  </div>

				  <div class="form-group">
				    <label for="productcategory">Pet Category</label>
				    <select class="form-control" id="productcategory" name="petcategory" required="">
					  <option value="">---SELECT CATEGORY---</option>
					  
						<option value="Cat"> Cat </option>
						<option value="Dog"> Dog </option>
						<option value="Birds"> Birds </option>
						<option value="Rabbits"> Rabbits </option>
						<option value="Horses"> Horses </option>
						<option value="Small animals"> Small animals </option>
						<option value="Raptiles"> Raptiles </option>
						<option value="Farm type animals"> Farm type animals </option>	
					</select>
				  </div>

				  <div class="form-group">
				    <label for="Productname">Gender</label>
				    <select class="form-control" id="productcategory" name="gender">
					  <option value="">---SELECT CATEGORY---</option>
					  	<option value="Any"> Any </option>
						<option value="Male" selected> Male </option>
						<option value="Female"> Female </option>
					</select>	
				  </div>
				  
				  <div class="form-group">
				    <label for="Productname">Age</label>
				    <select class="form-control" id="productcategory" name="age">
					  <option value="">---SELECT CATEGORY---</option>
					  
						<option value="Any" selected > Any </option>
						<option value="Puppy"> Puppy </option>
						<option value="Kitten"> Kitten </option>
						<option value="Young"> Young </option>
						<option value="Adoult"> Adoult </option>
						<option value="senior"> senior </option>
					</select>	
				  	</div>

					<div class="clearfix space30"></div>
					<h4 class="heading">Trained</h4>
					<div class="clearfix space20"></div>
					<div class="payment-method">
						<div class="row">
						
						<div class="col-md-4">
							<input name="trained" id="radio1" class="css-checkbox" type="radio" checked value="Yes"> <span>Yes</span>
							<!-- <div class="space20"></div> -->
							
						</div>
						
						<div class="col-md-4">
							<input name="trained" id="radio2" class="css-checkbox" type="radio"   value="No"><span> No</span>
							<div class="space20"></div>
							
						</div>
							
					</div>
					<div class="space30"></div>
					</div>

				 <!--  <div class="form-group">
				    <label for="productprice"> Price</label>
				    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
				  </div> -->

				  <div class="form-group">
				    <label for="productimage">Pet Image</label>
				    <input type="file" name="productimage" id="productimage" required="">
				    <p class="help-block">Only jpg are allowed.</p>
				  </div>

					<input type="submit" class="button btn-lg" value="Update Address">
					</div>
				</div>
				
			</div>
		
		</div>		
</form>		
		</div>
	</section>


	



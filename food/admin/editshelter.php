<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
	}else{
		header('location: viewshelter.php');
	}

if(isset($_POST) & !empty($_POST)){
		$sheltername = mysqli_real_escape_string($connection, $_POST['sheltername']);
		$discription = mysqli_real_escape_string($connection, $_POST['discription']);
		$sheltertype = mysqli_real_escape_string($connection, $_POST['sheltertype']);
		$price = mysqli_real_escape_string($connection, $_POST['price']);
		$duration = mysqli_real_escape_string($connection, $_POST['duration']);
		$shelterlocation = mysqli_real_escape_string($connection, $_POST['shelterlocation']);

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
					$filepath = $location.$name;
					if(move_uploaded_file($tmp_name, $filepath)){
						$smsg = "Uploaded Successfully";
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
			$filepath = $_POST['filepath'];
		}	

		$sql = "UPDATE shelter SET sheltername='$sheltername', discription='$discription', sheltertype='$sheltertype', price='$price', duration='$duration', shelterlocation='$shelterlocation', thumb='$filepath' WHERE id = $id";
		$res = mysqli_query($connection, $sql);
		if($res){
			$smsg = "Shelter  Updated";
		}else{
			$fmsg = "Failed to Update Shelter";
		}
	}
?>
<?php include 'inc/header.php'; ?>
<!--nav start-->
<?php include 'inc/navshelter.php'; ?>  
<!--nav end-->

<!--sectin start-->	

<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
		<!--data coolect-->
			<?php 	
				$sql = "SELECT * FROM shelter WHERE id=$id";
				$res = mysqli_query($connection, $sql); 
				$r = mysqli_fetch_assoc($res); 
			?>
			<!--end of query-->
			<!--Start form-->


			<form method="post" enctype="multipart/form-data">
				  <div class="form-group">
				  	<input type="hidden" name="filepath" value="<?php echo $r['thumb']; ?>">
				    <label for="Productname">Shelter Name</label>
				    <input type="text" class="form-control" name="sheltername" id="Productname" value="<?php echo $r['sheltername']; ?>">
				  </div>

				  <div class="form-group">
				    <label for="productdescription"> Description</label>
				    <textarea class="form-control" name="discription" rows="3"><?php echo $r['discription']; ?></textarea>
				  </div>

				  <div class="form-group">
				    <label for="productcategory">Shelter Type</label>
				    <select class="form-control" id="productcategory" name="sheltertype">
					   <option value="<?php echo $r['sheltertype']; ?>"> <?php echo $r['sheltertype']; ?> </option>
					  
						<option value="Cat"> Cat </option>
						<option value="Dog"> Dog </option>
						<option value="Dog and Cat"> Dog and Cat </option>	
						<option value="Birds"> Birds </option>
						<option value="Rabbits"> Rabbits </option>
						<option value="Horses"> Horses </option>
						<option value="Small animals"> Small animals </option>
						<option value="Raptiles"> Raptiles </option>
						<option value="Farm type animals"> Farm type animals </option>
						<option value="Any"> Any </option>		
					</select>
				  </div>

				  <div class="form-group">
				    <label for="productprice">shelter Price</label>
				    <input type="number" class="form-control" name="price" id="productprice"  min="1" value="<?php echo $r['price']; ?>" >
				  </div>

				  <div class="form-group">
				    <label for="Productname">Duration</label>
				    <select class="form-control" id="productcategory" name="duration">
					   <option value="<?php echo $r['duration']; ?>"> <?php echo $r['duration']; ?></option>
					  	<option value="A WEEK"> A Week </option>
						<option value="Two WEEK"> Two Week </option>
						<option value="THREE WEEK"> Three Week </option>
						<option value="Four WEEK"> Four Week </option>

						<option value="Less Than A Week"> Less than A Week </option>
					</select>	
				  </div>
				  
				  <div class="form-group">
				    <label for="Productname">Location</label>
				    <select class="form-control" id="productcategory" name="shelterlocation">
					   <option value="<?php echo $r['shelterlocation']; ?>"> <?php echo $r['shelterlocation']; ?></option>
					  
						<option value="Any"> Any </option>
						<option value="Dhaka"> Dhaka </option>
						<option value="Mahmudpur">Mahmudpur  </option>
						<option value="Narayanganj"> Narayanganj </option>
						<option value="Dhanmondi"> Dhanmondi </option>
						<option value="keraniganj"> keraniganj </option>
						<option value="lalmatia"> lalmatia </option>
						<option value="chattagram"> chattagram </option>
						<option value="shyamoli"> shyamoli </option>
						<option value="sylhet"> sylhet </option>
					</select>	
				  	</div>

					<div class="clearfix space30"></div>

				    <div class="form-group">
			    <label for="productimage">Product Image</label>
			    <?php if(isset($r['thumb']) & !empty($r['thumb'])){ ?>
			    <br>
			    	<img src="<?php echo $r['thumb'] ?>" widht="100px" height="100px">
			    	<a href="deleteshetlerimage.php?id=<?php echo $r['id']; ?>">Delete Image</a>
			    <?php }else{ ?>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			    <?php } ?>
			  </div> 
				  
				  <button type="submit" class="button btn-lg">Submit</button>

			</form>
			<!--End form-->
	
		</div>
	</div>

</section>
<!--saction end-->
<!--footer start-->
<?php include 'inc/footer.php' ?>
<!--footer end-->
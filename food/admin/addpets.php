<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_POST) & !empty($_POST)){
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
						echo $sql = "INSERT INTO pets (petname, petdescription, petcategory, gender,age, trained, thumb) VALUES ('$prodname', '$description', '$category', '$gender', '$age', '$trained', '$location$name')";
						$res = mysqli_query($connection, $sql);
						if($res){
							//echo "Product Created";
							header('location: pet.php');
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
				header('location: pet.php');
			}else{
				$fmsg =  "Failed to Create Pet";
			}
		}
	}
?>
<?php 
//include 'inc/header.php'; 
?>
<!-- <div class="menu-wrap">
        <div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
        <ul class="sf-menu">
          <li>
            <a href="index.php">Dashboard</a>
          </li>
         
          <li>
            <a href="#">Pet</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="pet.php">View Pet</a></li>
              <li><a href="addpets.php">Add Pet</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Adoption Request</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="orders.php">View Request</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Customers info</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="customers.php">View Customers</a></li>
              <li><a href="reviews.php">View Reviews</a></li>
            </ul>
          </li>
          <li>
            <a href="#">My Account</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="">Edit Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
    
      </div>
    </div>
  </header>
	 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">


      <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php include_once 'sidenev.php'; ?> 

    <!-- Page Content -->
   <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">

<section id="content">
	<div class="content-blog">
		<div class="">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>



			<form method="post" enctype="multipart/form-data">
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
                    <div class="form-group">
                <label for="productcategory">Rescued BY</label>
                <select class="form-control" id="productcategory" name="res">
                  <option value="">---SELECT CATEGORY---</option>
                  <?php     
                    $sql = "SELECT * FROM vollenterlist";
                    $res = mysqli_query($connection, $sql); 
                    while ($r = mysqli_fetch_assoc($res)) {
                ?>
                    <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                <?php } ?>
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
				  
				  <button type="submit" class="button btn-lg" onclick="return confirm('Are you sure you want to Submit?');">Submit</button>
			</form>
			<br/>
		</div>
	</div>

</section>
  </div>
                </div>
                <!-- /.row -->

               
   </div>
         
                                
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>  
                


</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>


<!-- datatable -->
	  <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="js/dataTables/jquery.dataTables.min.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
       <!--  end table-striped -->
<?php
 //include 'inc/footer.php';
  ?>

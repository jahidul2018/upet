<?php 
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}

/*include 'inc/header.php'; */
/*include 'inc/petnav.php'; */
$uid = $_SESSION['customerid'];
/*$cart = $_SESSION['cart'];*/
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->



<!-- Include the above in your HEAD tag -->

<style type="text/css">body {
    background: grey;
    margin-top: 220px;
    margin-bottom: 120px;
}</style>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <p data-toggle="tooltip" title=" DOWNLOAD! Save As PDF "><button onclick="myFunction()"> Invoice</button>
                            	<?php
									   /* require('phpToPDF.php');

									    //It is possible to include a file that outputs html and store it in a variable 
									    //using output buffering.
									    ob_start();
									    include('petview-order.php');
									    $my_html = ob_get_clean();

									    //Set Your Options -- we are saving the PDF as 'my_filename.pdf' to a 'my_pdfs' folder
									    $pdf_options = array(
									      "source_type" => 'html',
									      "source" => $my_html,
									      "action" => 'save',
									      "save_directory" => 'my_pdfs',
									      "file_name" => 'my_filename.pdf');

									    //Code to generate PDF file from options above
									    phptopdf($pdf_options);
									    // OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='pdf_invoice.pdf'>Download Your PDF</a>");*/
									?>

<script>
function myFunction() {

/*	$http({
    url: "",
    method: "GET",
    headers: {
        "Content-type": "application/pdf"
    },
    responseType: "arraybuffer"
}).success(function (data, status, headers, config) {
    var pdfFile = new Blob([data], {
        type: "application/pdf"
    });
    var pdfUrl = URL.createObjectURL(pdfFile);
    //window.open(pdfUrl);
    printJS(pdfUrl);
    //var printwWindow = $window.open(pdfUrl);
    //printwWindow.print();
}).error(function (data, status, headers, config) {
    alert("Sorry, something went wrong")
});*/
    window.print();
}
</script> </p>
                            
                        </div>

                        <div class="col-md-6 text-right">
                        	<?php 
                        	if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: my-account.php');
					}
                        		$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);
                        	?>
                            <p class="font-weight-bold mb-1">Invoice ID : <?php echo $ordr['ivid']; ?> </p>
                            <p class="text-muted"> Date &amp; Time : <?php echo $ordr['timestamp']; ?></p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">

                            <p class="font-weight-bold mb-4">Client Information</p>
                            	<!-- <p>My Address <a href="edit-address.php">Edit</a></p> -->

                            <?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p class='mb-1'> <span> Name: </span>".$cr['firstname'] ."  " . $cr['lastname'] ."</p>";
							echo "<p class='mb-1'> <span> Address: </span>".$cr['address1'] ." ". $cr['address2'] ." ".$cr['city'] ."</p>";
							echo "<p>".$cr['zip'] ."</p>";
							echo "<p> <span> Phone: </span>".$cr['mobile'] ."</p>";
							echo "<p> <span> Mail: </span>".$cr['email'] ."</p>";
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
                                        <!-- <th class="border-0 text-uppercase small font-weight-bold">ID</th> -->
                                        <th class="border-0 text-uppercase small font-weight-bold">Pet Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Pet Type</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Age</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Gender</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Adoption Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  

				<?php

					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: my-account.php');
					}
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$orditmsql = "SELECT * FROM orderitems o JOIN pets p WHERE o.orderid='$oid' AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?>
					<tr>
						<!-- <td>#</td> -->
						<td>
							<!-- <a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['petname'], 0, 25); ?></a> -->
							<?php echo substr($orditmr['petname'], 0, 25); ?>
						</td>
						<td>
							<?php echo $orditmr['petcategory']; ?> 
						</td> 
						 <td>
							  <?php echo $orditmr['age']; ?> 
						</td> 
						<td>
								<?php echo $orditmr['gender']; ?> 
						</td>
						<td>
							<!-- $ <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>.00/- --> Adoption is free
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
                            <div class="h3 font-weight-light"><?php echo $ordr['timestamp']; ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Application Status</div>
                            <div class="h3 font-weight-light"><?php echo $ordr['orderstatus']; ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Adoption cost</div>
                            <div class="h3 font-weight-light"><!-- $ <del><?php echo $ordr['totalprice']; ?>.00/-  </del> --> Adoption is free</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   <!--  <div class="text-light mt-5 mb-5 text-center small">upet© 2018 
    Design by  <a class="text-light" href="https://about.me/jahid-al-mishuk" target="_blank" >Jahidul alam</a></div>

</div> -->











	
	<!-- SHOP CONTENT -->
	<!-- <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h3>Application Information</h3>
					</div>
					<div class="col-md-12">

			<h3>Recent Adopt</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Pet Name</th>
						<th>Pet Type</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Total Cost</th>
						
					</tr>
				</thead>
				<tbody> -->
<!-- 
				<?php

					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: my-account.php');
					}
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$orditmsql = "SELECT * FROM orderitems o JOIN pets p WHERE o.orderid='$oid' AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?> -->
					<!-- <tr>
						<td>
							<a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['petname'], 0, 25); ?></a>
						</td>
						<td>
							<?php echo $orditmr['petcategory']; ?> 
						</td> 
						 <td>
							  <?php echo $orditmr['age']; ?> 
						</td> 
						<td>
								<?php echo $orditmr['gender']; ?> 
						</td>
						<td>
							$ <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>.00/-
						</td>
					</tr> -->
				<!-- <?php } ?> -->

				<!-- 	<tr><td colspan="4"></td></tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Adoption cost
						</td>
						<td>
							$ <del><?php echo $ordr['totalprice']; ?>.00/-  </del> (Adoption is free)
						</td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Application Status
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Application Placed On
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
					</tr>
				</tbody>
			</table>		

			<br>
			<br>
			<br>
 -->
		<!-- 	<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default.</p>

			<div class="row">
				<div class="col-md-6">
								<h4>My Address <a href="edit-address.php">Edit</a></h4>
					<?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
							echo "<p>".$cr['address1'] ."</p>";
							echo "<p>".$cr['address2'] ."</p>";
							echo "<p>".$cr['city'] ."</p>";
							echo "<p>".$cr['state'] ."</p>";
							echo "<p>".$cr['country'] ."</p>";
							echo "<p>".$cr['company'] ."</p>";
							echo "<p>".$cr['zip'] ."</p>";
							echo "<p>".$cr['mobile'] ."</p>";
							echo "<p>".$cr['email'] ."</p>";
						}
					?>
				</div>

				<div class="col-md-6">

				</div>
			</div>



			</div> 

					</div>
				</div>
			</div>
		</div>
	</section>  -->
	
<?php 
/*include 'inc/footer.php' */
?>

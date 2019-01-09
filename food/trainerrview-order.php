<?php 
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}

/*include 'inc/header.php'; 
include 'inc/trainernav.php'; */
$uid = $_SESSION['customerid'];
/*$cart = $_SESSION['cart'];*/
?>
	


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
                            <p data-toggle="tooltip" title=" DOWNLOAD your Invoice Save As PDF "><button onclick="myFunction()"> Invoice</button>

<script>
function myFunction() {
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
                            

                            <?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p class='mb-1'>  <span> Name: </span>".$cr['firstname'] ."  " . $cr['lastname'] ."</p>";
							echo "<p class='mb-1'>  <span> Address: </span>".$cr['address1'] ." ". $cr['address2'] ." ".$cr['city'] ."</p>";
							echo "<p>".$cr['zip'] ."</p>";
							echo "<p>  <span> Phone:: </span>".$cr['mobile'] ."</p>";
							echo "<p>  <span> Email: </span>".$cr['email'] ."</p>";
						}
					?>

                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Payment Details</p>

                            <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                            <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
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
                            <p class="mb-1"><span class="text-muted">Payment Type: </span><?php echo $ordr['paymentmode']; ?> </p>
                            <!-- <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p> -->
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Trainer Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Expert In</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Trainer Location</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Trainer Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Number of days</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Start Date</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  

				<?php

					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: trainerapplication.php');
					}
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$orditmsql = "SELECT * FROM orderitems o JOIN trainer p WHERE o.orderid='$oid' AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?>
					<tr>
						<td>#</td>
					<td>
							<!-- <a href="single.php?id=<?php echo $orditmr['pid']; ?>"> --><?php echo substr($orditmr['tname'], 0, 25); ?></a>
						</td>
						<td>
							<?php echo $orditmr['ttype']; ?> 
						</td> 
						 <td>
							  <?php echo $orditmr['tlocation']; ?> 
						</td>
						<td>
							 <?php echo $orditmr['productprice']; ?>/-
						</td>
						<td>
							<?php echo $orditmr['pquantity']; ?> 
						</td>
						<td>
							  <?php echo $orditmr['tri']; ?> 
						</td> 
						<td>
							 <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>/-
						</td>
					</tr>
				<?php } ?>

					<tr><td colspan="8"></td></tr>
				
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2"> Placed On</div>
                            <div class="h3 font-weight-light"><?php echo $ordr['timestamp']; ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2"> Status</div>
                            <div class="h3 font-weight-light"><?php echo $ordr['orderstatus']; ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Total cost</div>
                            <div class="h3 font-weight-light"><?php echo $ordr['totalprice']; ?>.00/- </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">upet © 2018 Copyright:
    Design by : <a class="text-light" href="https://about.me/jahid-al-mishuk" target="_blank" >Jahidul alam</a></div>

</div>




	<!-- SHOP CONTENT -->
<!-- 	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h3>Application Information</h3>
					</div>
					<div class="col-md-12">

			<h3>Recent Booking</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Trainer Name</th>
						<th>Expert In</th>
						<th> Location</th>
						<th>Trainer Cost</th>
						<th>Total Cost</th>
						
					</tr>
				</thead>
				<tbody>

				<?php

					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: trainerapplication.php');
					}
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$orditmsql = "SELECT * FROM orderitems o JOIN trainer p WHERE o.orderid='$oid' AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?>
					<tr>
						<td>
							<a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['tname'], 0, 25); ?></a>
						</td>
						<td>
							<?php echo $orditmr['ttype']; ?> 
						</td> 
						 <td>
							  <?php echo $orditmr['tlocation']; ?> 
						</td>
						<td>
							 <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>.00/-
						</td> 
						
						<td>
							 <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>.00/-
						</td>
					</tr>
				<?php } ?>

					<tr><td colspan="5"></td></tr>
					

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Shelter Booking Status
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
							Booking Placed On
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


					</div>
				</div>
			</div>
		</div>
	</section> -->
	
<?php 
/*include 'inc/footer.php' */
?>

<?php 
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}

/*include 'inc/header.php'; 
include 'inc/nav2.php'; */
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
                            <p><button onclick="myFunction()">Invoice</button>

<script>
function myFunction() {
    window.print();
}
</script> </p> <!-- <a href="/pdfcrowd.com/view-order.php/">Save to PDF</a> -->
                            
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
                            	<!-- <p><a href="edit-address.php">Client Address</a></p> -->

                            <?php
						$csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
						$cres = mysqli_query($connection, $csql);
						if(mysqli_num_rows($cres) == 1){
							$cr = mysqli_fetch_assoc($cres);
							echo "<p class='mb-1'>Name: ".$cr['firstname'] ."  " . $cr['lastname'] ."</p>";
							echo "<p class='mb-1'>Address: ".$cr['address1'] ." ". $cr['address2'] ." ".$cr['city'] ."</p>";
							echo "<p>".$cr['zip'] ."</p>";
							echo "<p> Phone: ".$cr['mobile'] ."</p>";
							echo "<p> Email: ".$cr['email'] ."</p>";
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
                             <p class="mb-1"><span class="text-muted"> Status: </span><?php echo $ordr['orderstatus']; ?> </p>
                            <!-- <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p> -->
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Product Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Price</th>
                                       <!--  <th class="border-0 text-uppercase small font-weight-bold">Shelter Cost</th> -->
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Price</th>
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

					$orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid='$oid' AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?>
					<tr>
						<td>#</td>
					<td>
							<!-- <a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['name'], 0, 25); ?></a> -->
							<?php echo substr($orditmr['name'], 0, 25); ?>
						</td>
						<td>
							<?php echo $orditmr['pquantity']; ?>
						</td>
						<td>
							BDT <?php echo $orditmr['productprice']; ?>/-
						</td>
						
						<td>
							BDT <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>/-
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
                            <div class="mb-2">Order Placed On</div>
                            <div class="h3 font-weight-light"><?php echo $ordr['timestamp']; ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Order Status</div>
                            <div class="h3 font-weight-light"><?php echo $ordr['orderstatus']; ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Total cost</div>
                            <div class="h3 font-weight-light"> <?php echo $ordr['totalprice']; ?>.00/- BDT</div>
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
						<h2>My Account</h2>
					</div>
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th></th>
						<th>Total Price</th>
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

					$orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid='$oid' AND o.pid=p.id";
					$orditmres = mysqli_query($connection, $orditmsql);
					while($orditmr = mysqli_fetch_assoc($orditmres)){
				?>
					<tr>
						<td>
							<a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['name'], 0, 25); ?></a>
						</td>
						<td>
							<?php echo $orditmr['pquantity']; ?>
						</td>
						<td>
							$ <?php echo $orditmr['productprice']; ?>/-
						</td>
						<td>
							
						</td>
						<td>
							$ <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>/-
						</td>
					</tr>
				<?php } ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Order Total
						</td>
						<td>
							$ <?php echo $ordr['totalprice']; ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Order Status
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
							Order Placed On
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
					</tr>
				</tbody>
			</table>		

			<br>
			<br>
			<br> -->
<!-- 
			<div class="ma-address">
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
	</section> -->
	
<?php 

/*include 'inc/footer.php' */

?>

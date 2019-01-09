<?php 
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: loginreportpet.php');
	}

include 'inc/header.php'; 
include 'inc/myorder.php'; 
$uid = $_SESSION['customerid'];
$email = $_SESSION['customer'];
/*$cart = $_SESSION['cart'];*/

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );


</script>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2></h2>
					</div>
					<div class="col-md-12">

			<h3>Adoption Application</h3>
			<br>
			<table class="cart-table account-table table table-bordered display" id="example">
				<thead>
					<tr>
						<th>Adoption No</th>
						<th>Application Id</th>
						<th>Date & Time</th>
						<th>Application Status</th>
						<th>Payment</th>
						<!-- <th>cost</th> -->
						<th>View</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND paymentmode='Free Adoption' ORDER BY id desc ";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
							<?php echo $ordr['ivid']; ?>
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<!-- <td>
							$ <?php echo $ordr['totalprice']; ?>.00/-
						</td> -->
						<td>
							<a href="petview-order.php?id=<?php echo $ordr['id']; ?>">Invoice</a>
							<?php if($ordr['orderstatus'] != 'Cancelled'){?>
							| <a href="petcancel-order.php?id=<?php echo $ordr['id']; ?>" onclick="return confirm('Are You Sure You Want to Cancel The Adoption Application?');">Cancel</a>
							<?php } ?>
						</td>
					</tr>
					
				<?php } ?>
				<?php  
						$ordsql = "SELECT sum(totalprice) as 't' FROM orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				 ?>
				 <tr><td colspan="7"></td></tr>
				<!--  <tr><td  colspan="7"> Grand Total:  <?php echo $ordr['t']; ?> $</td></tr><?php } ?> -->


				</tbody>
			</table>

			<div class="row">
					<div class="page_header text-center">
						<h2></h2>
					</div>
					<div class="col-md-12">

			<h3>Shelter Application</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Booking No</th>
						<!-- <th>Booking Id</th> -->
						<th>Booking Date</th>
						<th>Booking Status</th>
						<th>Payment option</th>
						<!-- <th>cost</th> -->
						<th>View</th>
						<th>payment</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND ivid LIKE 'Shel%' ORDER BY id desc ";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
										<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<!-- <td>
							<?php echo $ordr['ivid']; ?>
						</td> -->
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<!-- <td>
							$ <?php echo $ordr['totalprice']; ?>.00/-
						</td> -->
						<td>
							<a href="shelterview-order.php?id=<?php echo $ordr['id']; ?>" target="_blank">Invoice</a>
							<?php if($ordr['orderstatus'] != 'Cancelled'){?>
							| <a href="shelter-cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a>
							<?php } ?>
						</td>
						<td>
							<?php if($ordr['paymentid'] != 'Not Paid'){?> <a href="pconfirmmassage.php" target="_blank">Payment Confirm</a>
							
							<?php }elseif ($ordr['orderstatus'] != 'Cancelled') {?> 
							<a href="bkash.php" >Bkash</a>||<a href="https://www.paypal.com/signin?country.x=US&locale.x=en_US" target="_blank">payple.com</a>
							<?php }else{?> cancelled <?php } ?>
						</td>
					</tr>
					
				<?php } ?>
				<?php  
						$ordsql = "SELECT sum(totalprice) as 't' FROM orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				 ?>
				 <tr><td colspan="7"></td></tr>
				<!--  <tr><td  colspan="7"> Grand Total:  <?php echo $ordr['t']; ?> $</td></tr><?php } ?> -->


				</tbody>
			</table>


			<div class="row">
					<!-- <div class="page_header text-center">
						<h2>My Account</h2>
					</div> -->
					<div class="col-md-12">

			<h3>PURCHASE FOOD</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order Id </th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
						<th>View</th>
						<th>Payment Option</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND ivid LIKE 'ivid%' ORDER BY id desc ";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<td>
							 <?php echo $ordr['totalprice']; ?>/-
						</td>
						<td>
							<a href="view-order.php?id=<?php echo $ordr['id']; ?>" target="_blank">Invoice</a>
							<?php if($ordr['orderstatus'] != 'Cancelled'){?>
							| <a href="cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a>
							<?php } ?>
						</td>
						<td>
							<?php if($ordr['paymentid'] != 'Not Paid'){?> <a href="pconfirmmassage.php" target="_blank">Payment Confirm</a>
							
							<?php }elseif ($ordr['orderstatus'] != 'Cancelled') {?> 
							<a href="bkash.php" >Bkash</a>||<a href="https://www.paypal.com/signin?country.x=US&locale.x=en_US" target="_blank">payple.com</a>
							<?php }else{?> cancelled <?php } ?>
						</td>
					</tr>
					
				<?php } ?>

				
				</tbody>
			</table>

			<div class="row">
					<div class="page_header text-center">
						<h2></h2>
					</div>
					<div class="col-md-12">

			<h3>Trainer</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Booking No</th>
						<!-- <th>Booking Id</th> -->
						<th>Date &amp; Time</th>
						<th>Booking Status</th>
						<th>Payment option</th>
						<th>cost</th> 
						<th>View</th>
						<th>Payment Option</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM orders WHERE uid='$uid' AND ivid LIKE 'trai%' ORDER BY id desc ";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<!-- <td>
							<?php echo $ordr['ivid']; ?>
						</td> -->
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						 <td>
							 <?php echo $ordr['totalprice']; ?>.00/-
						</td> 
						<td>
							<a href="trainerrview-order.php?id=<?php echo $ordr['id']; ?>" target="_blank">Invoice</a>
							<?php if($ordr['orderstatus'] != 'Cancelled'){?>
							| <a href="trainer-cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a>
							<?php } ?>
						</td>
						<td>
							<?php if($ordr['paymentid'] != 'Not Paid'){?> <a href="pconfirmmassage.php" target="_blank">Payment Confirm</a>
							
							<?php }elseif ($ordr['orderstatus'] != 'Cancelled') {?> 
							<a href="bkash.php" >Bkash</a>||<a href="https://www.paypal.com/signin?country.x=US&locale.x=en_US" target="_blank">payple.com</a>
							<?php }else{?> cancelled <?php } ?>
						</td>
					</tr>
					
				<?php } ?>
				<?php  
						$ordsql = "SELECT sum(totalprice) as 't' FROM orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				 ?>
				 <tr><td colspan="7"></td></tr>
				<!--  <tr><td  colspan="7"> Grand Total:  <?php echo $ordr['t']; ?> $</td></tr><?php } ?> -->

				<?php  
						$ordsql = "SELECT sum(totalprice) as 't' FROM orders WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				 ?>
				 <tr><td colspan="7"></td></tr>
				 <tr><td  colspan="7"> Total amount :  <?php echo $ordr['t']; ?> .00/- </td></tr><?php } ?>




				</tbody>
			</table>




					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>
						



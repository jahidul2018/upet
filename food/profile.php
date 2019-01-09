<html>
	<head>
		<title>profile</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style2.css">
	</head>
<body>

	<?php
		$url1=$_SERVER['REQUEST_URI'];
		header("Refresh: 5; URL=$url1");
	?>
	
	<?php include 'connect.php'; ?>

	<?php include 'function.php'; ?>
	  
	<!--<center><?php include 'title_bar.php'; ?> </center>-->

	<?php
	if($_SESSION['user_id']!=true)
	{
		echo"<p>Invalid loging !<br/></p>";
		echo "<a href='login.html' > Try again</a>";
			header('location: index.html');
		}
	?>		
<div class="main">	
<fieldset>	
<a href="index.html" class="button">Home page</a>
<a href="venue.php" class="button">move to venue</a>
<a href="profile.php" class="button">clear your Booking</a>
<a href="confirmyourbooking.php" class="button">confirm your Booking</a>
<a href="logout.php" class="button">Log Out</a>
		
	<h3 class="type3" >profile system</h3>


	<p class="type3">you are logged in as <b><?php echo $username; ?></b> and you are a [<?php echo $level_name; ?>]</p>

	<p>
	<?php
	if($user_level==1){
	echo " <center><P>#######################</P><h1><a href='admin.php'>ADMIN PANNEL</a></h1></center>";	

		}
	?>
	</p>
	

	
	
	
<?php 
	
		
		$query="select* from order_product where id='$my_id' and confirm_by_admin='2'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divbuttom><p class=order>Order Id :".$row['order_product_id']."</p></div>";
					echo"<div class=divbuttom><p class=user>User ID: ".$row['id']."</p></div>";
					echo"<div class=divbuttom><p class=center>Center NO: ".$row['p_id']."</p></div>";
					echo"<div class=divbuttom><p class=order_by>Order by: ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>Center Name - ".$row['center_name']."</p></div>";
					echo"<div class=divbuttom><p class=delete><a href='profile.php?operation=delete&order_product_id=".$row['order_product_id']."'>DELETE</a></p></div>";
					
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				//delete from database;
				if(isset($_GET['operation'])){
					if($_GET['operation']=="delete"){
						$query="delete from order_product where order_product_id=".$_GET['order_product_id'];
							if(mysql_query($query)){
								echo"<center>Recored Deleted!</center>";
		}
			}
				
	}
		
			
		
		
	?>
	
	<?php 
	
		
		$query="select* from order_productdate where id='$my_id' and confirm_by_admin='2'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divtop>";
					echo"<div class=divbuttom><p class=order >  odrer id ".$row['order_product_id']."</p> </div>";
					echo"<div class=divbuttom><p class=user_name>  User name - ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=date>".$row['day']."-".$row['month']."-".$row['year']."</p></div>";
				
					echo"<div class=divbuttom><p class=order>TK/ ".$row['t_cost']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>  Center Name - ".$row['center_name']."</p></div>";
					
					
					echo"<div class=divbuttom><p class=order><a href='profile.php?operation=delete&order_product_id=".$row['order_product_id']."'>DELETE</a></p></div>";
					echo"</div>";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				//delete from database;
				if(isset($_GET['operation'])){
					if($_GET['operation']=="delete"){
						$query="delete from order_productdate where order_product_id=".$_GET['order_product_id'];
							if(mysql_query($query)){
								echo"<center> </center>";
		}
			}
				
	}
		
			
		
		
	?>

	
	
</fieldset>
</div>
	</body>
	</html>
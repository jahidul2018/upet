<?php


	require_once '../config/connect.php';
	/*if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}*/
?>

<?php 

	if(isset($_GET['u_id']) & !empty($_GET['u_id'])){
		$u_id =$_GET['u_id'];
	}
	if(isset($_GET['type']) & !empty($_GET['type'])){
		$type =$_GET['type'];
	}
	
	if($type ==1 ){
		mysql_query("update users set Active=0 where id='$u_id'");
		header('location: login.php');
	}else if($type ==0){
		mysql_query("update users set Active=1 where id='$u_id'");
		header('location: login.php');
	}
?> 
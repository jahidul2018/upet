<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET['id']) & !empty($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT thumb FROM trainer WHERE id=$id";
		$res = mysqli_query($connection, $sql);
		$r = mysqli_fetch_assoc($res);
		if(!empty($r['thumb'])){
			if(unlink($r['thumb'])){
				$delsql = "UPDATE trainer SET thumb='' WHERE id=$id";
				if(mysqli_query($connection, $delsql)){
					header("location:edittrainer.php?id={$id}");
				}
			}else{
				$delsql = "UPDATE trainer SET thumb='' WHERE id=$id";
				if(mysqli_query($connection, $delsql)){
					header("location:edittrainer.php?id={$id}");
				}
			}

	}else{
		$delsql = "UPDATE trainer SET thumb='' WHERE id=$id";
		if(mysqli_query($connection, $delsql)){
			header("location:edittrainer.php?id={$id}");
		}
	}
}else{
	header("location:edittrainer.php?id={$id}");
}
<?php
	session_start();
	unset($_SESSION['cart']);
	unset($_SESSION['customer']);
	header('location: ../index.html');
?>
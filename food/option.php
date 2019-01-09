


<?php 
include 'connect.php';
include 'function.php';

$u_id =$_GET['u_id'];
$type =$_GET['type'];

if($type =='a' ){
	mysql_query("update users set type='d' where id='$u_id'");
	header('location: admin.php?type=user');
	}else if($type =='d'){
		mysql_query("update users set type='a' where id='$u_id'");
	header('location: admin.php?type=user');
		}

		//level 

$u_id =$_GET['u_id'];
$u_level =$_GET['user_level'];

if($u_level ==1 ){
	mysql_query("update users set user_level=2 where id='$u_id'");
	header('location: userlevel.php?type=user');
	}else if($u_level ==2){
		mysql_query("update users set user_level=1 where id='$u_id'");
	header('location: userlevel.php?type=user');
		}		
		
?>






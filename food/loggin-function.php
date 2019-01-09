<?php 
session_start();

function loggedin(){
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
		}
	else{
		return false;
		}	
	} 


if(loggedin()){
$my_id=$_SESSION['user_id'];	
$user_query= mysql_query("select username,user_level from users where id='$my_id'");	
$run_user= mysql_fetch_array($user_query);
$username =$run_user['username'];


//user level test
$user_level=$run_user['user_level'];
$query_level =mysql_query("select name from user_level where id='$user_level'");
$run_level=mysql_fetch_array($query_level);
$level_name=$run_level['name'];	
	}	
	

?>
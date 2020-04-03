<?php 
	session_start();
	$_SESSION["userloggedin"]=0;
	header("location:user_panel.php");
?>
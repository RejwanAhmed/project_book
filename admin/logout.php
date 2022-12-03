<?php 
	session_start();
	$_SESSION["loggedin"]=0;
	?>
		<script>
			window.location = "login.php";
		</script>
	<?php 
	exit();
?>
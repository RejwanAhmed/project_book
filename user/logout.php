<?php 
	session_start();
	$_SESSION["userloggedin"]=0;
	?>
		<script>
			window.location = "user_panel.php";
		</script>
	<?php 
	exit();
?>
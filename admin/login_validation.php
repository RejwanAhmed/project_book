<?php

	session_start();
	if($_SESSION["loggedin"]==1)
	{
		?>
			<script>
				window.location = "view_teacher.php";
			</script>
		<?php 
		exit();
	}

	include('db_connection.php');
	
	$name = $_POST['username'];
	$pass = $_POST['password'];
	$pass = base64_encode($pass);
	$qry = "select * from `admin_log_in` where `username` = '$name' && `password` = '$pass'";
	
	$res = mysqli_query($conn, $qry);
	
	$row = mysqli_num_rows($res);
	
	
	$answer = $_SESSION["answer"];
	
	$user_answer = $_POST["answer"];
	
	if($row==1 && $answer ==  $user_answer)
	{
		$_SESSION["loggedin"] = 1;
		?>
			<script>
				window.location = "view_teacher.php";
			</script>
		<?php 
		exit();
	}
	else
	{	
		if($row!=1)
		{
			?> 
		<script>
			var res = alert("Invalid Username or Password");
			window.location = "login.php";
		</script>
		<?php	
		}
		else
		{
			?> 
		<script>
			var res = alert("Invalid Captcha");
			window.location = "login.php";
		</script>
		<?php	
		}			
			
	}
	
?>
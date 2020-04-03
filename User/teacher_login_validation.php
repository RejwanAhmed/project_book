<?php
	session_start();
	if($_SESSION['userloggedin']==1)
	{
		header("location:my_profile.php");
	}
	 
	$conn = mysqli_connect("localhost","root","","project");
	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$pass = base64_encode($pass);
	$qry = "select * from `add_teacher` where `email` = '$email' && `password` = '$pass'";
	
	$res = mysqli_query($conn, $qry);
	
	//$row = mysqli_num_rows($res);
	$login=0;
	$answer = $_SESSION["answer"];
	$name="";
	$id = "";
	$user_answer = $_POST["answer"];
	
	while($row = mysqli_fetch_assoc($res))
	{
		if($row['email'] == $email && $row['password'] == $pass)
		{
			$login=1;
			$name = $row['name'];
			$id= $row['id'];
			break;
		}
	}
	
	if($login==1 && $answer ==  $user_answer)
	{
		$_SESSION['name'] = $name;
		$_SESSION['id'] = $id;
		$_SESSION['userloggedin'] = 1;
		header("Location:my_profile.php");
		
	}
	else
	{
		if($login!=1 )
		{
			?> 
		<script>
			var res = alert("Invalid Email or Password");
			window.location = "teacher_login.php";
		</script>
		<?php	
		}
		else
		{
			?> 
		<script>
			var res = alert("Invalid Captcha");
			window.location = "teacher_login.php";
		</script>
		<?php	
		}			
	}
	/*if($row==1 && $answer ==  $user_answer)
	{
		$res = $row['name'];
		$_SESSION['email'] = $res;
		header("Location:teacher_profile.php");
	}
	else
	{	
		if($row!=1)
		{
			?> 
		<script>
			var res = alert("Invalid Email or Password");
			window.location = "teacher_login.php";
		</script>
		<?php	
		}
		else
		{
			?> 
		<script>
			var res = alert("Invalid Captcha");
			window.location = "teacher_login.php";
		</script>
		<?php	
		}			
			
	} */

	
?>
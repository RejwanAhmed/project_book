<?php
	session_start();
	//if i put $_SESSION['loggedin'] = 0; then admin will be logged out when tab will be closed
	$_SESSION["loggedin"] = "";
	if($_SESSION["loggedin"]==1)
	{
		?>
			<script>
				window.location = "view_teacher.php";
			</script>
		<?php 
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/owncssadmin.css">


	<title>Login</title>

</head>
<body >
		<!-- Header -->

		<div class = "header">
			<h3><b>Welcome to Admin Panel</b></h3>
		</div>

		<!-- End of Header -->

		<!-- Image -->

		<div align = "center">
		    <br />
			<img src="images/login.jpg" alt="Avatar" style = "max-width: 20%; height: 20%; border-radius: 50%; margin-bottom:10px;">
		</div>

		<!-- End of Image -->


		<!-- login text -->

		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Admin Login Form</b></h2>
			<b><hr class = "hrline"/></b>
		</div>

		<!-- End of login text -->


		<!-- Form -->

		<div class = "container-fluid">

			<div class = "row justify-content-center">

				<div class = "col-lg-3 col-sm-6 col-md-4 col-8">

					<form  action="login_validation.php" method = "POST" class = "form-container">

						<div class="form-group">
							<label for=""><b>Username:</b></label>
							<input class="form-control" type="text" name="username"  placeholder = "Username" value ="" required=""/>
						</div>


						<div class="form-group">
							<label for=""><b>Password:</b></label>
							<input  class="form-control" type="password" name="password" placeholder = "Password" value = "" required=""/>
						</div>


						<!-- Captcha Code -->

						<div class="form-group">
							<label for=""><b >Captcha Code:</b> </label>
								<?php
									$first_num = rand(1,10);
									$second_num = rand(1,10);

									$operators = array("+","-","*");

									$operator = rand(0,count($operators)-1);
									$operator = $operators[$operator];

									$answer = 0;

									switch($operator)
									{
										case "+":
											$answer = $first_num + $second_num;
											break;
										case "-":
											$answer = $first_num - $second_num;
											break;
										case "*":
											$answer = $first_num * $second_num;
											break;
									}

									$_SESSION["answer"] = $answer;
								?>
								<img src="images/refresh.png" alt="asd" />
								<label for="" class = "captcha form-control"><?php echo "<h4><b> <i>$first_num $operator  $second_num</i></b> 	</h4> " ?></label>

							<input class="form-control" Placeholder = "Enter the result" name = "answer" required=""/>
						</div>

						<!-- End of Captcha Code -->

						<!-- Submit Button -->

						<div style = "text-align:center;">

							<input class="btn btn-primary submit" type="submit" name="submit1" value="Submit" style = "width: 250px; max-width:80%">

						</div>

						<!-- End of Submit Button -->

					</form>
				</div>
				

			</div>

		</div>

		<!--End of Form -->

</body>
</html>

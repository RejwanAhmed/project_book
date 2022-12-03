<?php
	session_start();
	if($_SESSION["loggedin"]!=1)
	{
		?>
			<script>
				window.location = "login.php";
			</script>
		<?php 
		exit();
	}
	include('db_connection.php');
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
	<link rel="stylesheet" href="css/owncssadmin.css" />


	<title>Add Teacher</title>

	<script type="text/javascript">
	function changeinput(ip)
	{
		document.getElementById("inp").value = ip;
	}
	</script>

</head>
<body >
		<!-- Navbar -->

		<div id = "mynavbar"  role = "navigation" >
			<nav class="navbar navbar-expand-lg  navbar-dark ">
				<h3 style = "color:#F0F8FF;"><b> Welcome Admin</b></h3>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="view_teacher.php">TEACHER INFORMATION<span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="add_teacher.php">ADD TEACHER</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								EXAM COMMITTEE CHAIRMAN
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown" style = "background-color:black;">
								<a class="dropdown-item" href="exam_committee_registration.php" style = "font-weight: bold; font-size:13px;">REGISTRATION FORM</a>
								<a class="dropdown-item" href="chairman_list.php" style = "font-weight: bold; font-size:13px;">CHAIRMAN LIST</a>

							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="project_list.php">PROJECT LIST</a>
						</li>

					</ul>

					<ul class = "nav navbar-nav navbar-right">

						<li class="nav-item" style = "font-size: 15px;  margin-top: -3px;"><a  class="nav-link" href="change_email_pass.php">Change Email and Password </a></li>

					</ul>

					<ul class = "nav navbar-nav navbar-right ">

						<li class="nav-item" style = " font-size: 15px;"><a  class="nav-link" href="logout.php">Logout <img src="images/logout.png" alt="" /></a></li>

					</ul>

			  </div>

			</nav>
		</div>

		<br>

		<!-- End of Navbar -->

		<!-- Image -->

		<div  align = "center">

			<img src="images/add teacher.jpg" alt="Avatar" style = "max-width: 20%; height: 20%; border-radius: 50%; margin-bottom: 10px;">
		</div>

		<!-- End of Image -->

		<!-- Header -->

		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Add Teacher</b></h2>
			<b><hr class = "hrline"/></b>
		</div>

		<!-- End of Header -->

		<!-- Form -->

		<div class ="container-fluid">

			<div class = "row justify-content-center">

				<div class = "col-lg-3 col-sm-6 col-md-4 col-8 " >

					<form method = "POST" class = "form-container">

						<div class="form-group" >
							<label for=""><b>Name:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Name" required
							value = "<?php
										if(isset($_POST['name']))
										{
											echo $_POST['name'];
										}

										?>" name="name" />
						</div>

						<!-- Designation (drop down with input field) -->

						<div class=" form-group">
							<label for=""><b>Designation:</b></label>

							<div class = "input-group">
								<input type="text" name = "designation" class="form-control" id="inp"
								placeholder = "Enter Designation" required="" value = "<?php
										if(isset($_POST['designation']))
										{
											echo $_POST['designation'];
										}

										?>"/>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle=	"dropdown" >
									</button>
									<div class="dropdown-menu">

										<?php

												echo "<button type = \"button\"  onclick = \"changeinput('Professor')\" class= \"dropdown-item\" > Professor </button>";
												echo "<button type = \"button\"  onclick = \"changeinput('Associate Professor')\" class= \"dropdown-item\" > Associate Professor </button>";
												echo "<button type = \"button\"  onclick = \"changeinput('Assistant Professor')\" class= \"dropdown-item\" > Assistant Professor </button>";
												echo "<button type = \"button\"  onclick = \"changeinput('Lecturer')\" class= \"dropdown-item\" > Lecturer </button>";

										?>
									</div>
								</div>
							</div>
						</div>

						<!-- End of Designation (drop down with input field) -->

						<div class="form-group">
							<label for=""><b>Email:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Email" name="email" required=""
								value = "<?php
										if(isset($_POST['email']))
										{
											echo $_POST['email'];
										}

										?>"
							>
						</div>

						<div class="form-group">
							<label for=""><b>Password:</b></label>
							<input type="password" class="form-control"  placeholder="Enter Password" name="password" required="" value = "<?php
										if(isset($_POST['password']))
										{
											echo $_POST['password'];
										}

										?>" >
						</div>

						<div class="form-group">
							<label for=""><b>Re-type Password:</b></label>
							<input type="password" class="form-control"  placeholder="Repeat Password" name="repeat_password" required="" value = "<?php
										if(isset($_POST['repeat_password']))
										{
											echo $_POST['repeat_password'];
										}

										?>" >
						</div>

						<div style = "text-align:center;">

							<input class="btn btn-primary submit" type="submit" name="submit1" value="Submit" style = "width: 250px; max-width:80%">

						</div>
					  </form>
				</div>
			</div>
		</div>

		<!-- End of Form -->

		<!-- PHP code for submitting the form -->

		<?php
			if(isset($_POST['submit1']))
			{
				

				$name = $_POST['name'];
				$desig = $_POST['designation'];
				$email = $_POST['email'];
				$pass = $_POST['password'];
				$repeat_pass = $_POST['repeat_password'];
				$repeat_pass = base64_encode($repeat_pass);
				$pass = base64_encode($pass);

				$exist_email = 0;

				if (!preg_match("/^[a-zA-Z ]*$/",$name))
				{
					?>
						<script type="text/javascript">
						window.alert("Invalid Teacher Name");

						</script>
					<?php
				}
				else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
				{
					?>
						<script type="text/javascript">
						window.alert("Invalid Email Address");

						</script>
					<?php
				}
				else
				{
					$qry2 = "select * from `add_teacher`";
					$res2 = mysqli_query($conn,$qry2);
					while($row2 = mysqli_fetch_assoc($res2))
					{
						if($row2['email'] == $email)
						{
							$exist_email = 1;
							break;
						}
					}
					if($exist_email==1)
					{
						?>
							<script type="text/javascript">
								window.alert("Email Address already exist");

							</script>
						<?php
					}
					else if($pass!=$repeat_pass)
					{
						?>
							<script type="text/javascript">
								window.alert("Password not Matched");

							</script>
						<?php
					}
					else
					{
						$qry = "INSERT INTO `add_teacher`(`name`, `designation`, `email`,`password`,`repeat_password`) VALUES ('$name','$desig','$email','$pass','$repeat_pass')";
						$res = mysqli_query($conn,$qry);
						?>
						<script type="text/javascript">
							window.alert("Teacher Added Successfully");
							window.location = "view_teacher.php";
						</script>
						<?php
					}

				}
			}
		?>

		<!-- End of PHP code for submitting the form -->
</body>
</html>

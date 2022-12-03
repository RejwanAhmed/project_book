<?php
	session_start();
	if($_SESSION["userloggedin"]!=1)
	{
		?>
			<script>
				window.location = "user_panel.php";
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
	<link rel="stylesheet" href="css/owncssuser.css" />


	<title>Teacher Profile</title>

</head>
<body >
		<!-- Navbar -->

		<div id = "mynavbar"  role = "navigation" >
			<nav class="navbar navbar-expand-lg  navbar-dark ">
				<h3 style = "color:#F0F8FF;"><b> Welcome 
				<?php 
						
						$name = $_SESSION['name'];
						$i=0;
						$len = strlen($name);
						while($i<$len)
						{
							if($name[$i]== ' ')
							{
								break;
							}
							else
							{
								echo $name[$i];
								$i++;
							}
							
						}				
					
					?></b></h3>
				
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
			  
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav mr-auto list-group">
						<li class="nav-item">
							<a class="nav-link " href="my_profile.php">MY PROFILE<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="former_chairman_list.php">FORMER CHAIRMAN</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="project_list.php">PROJECT LIST</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="my_projects.php">MY PROJECTS</a>
						</li>
					</ul>
					<ul class = "nav navbar-nav navbar-right">
						
						<li class="nav-item active" style = "font-size: 15px;  margin-top: -3px;"><a  class="nav-link" href="change_email_pass.php ">Change Email and Password </a></li>
						
					</ul>
					<ul class = "nav navbar-nav navbar-right ">
						
						<li class="nav-item" style = " font-size: 15px;"><a  class="nav-link" href="logout.php">Logout <img src="images/logout.png" alt="" /></a></li>
						
					</ul>
					
					
			  </div>  
			  
			</nav>
		</div>
		
		<br>
		<!-- End of Navbar -->
	

		<!-- Header -->
		
		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Change Email and Password</b></h2>
			<b><hr class = "hrline" style = "width: 400px;"/></b>
		</div>
		
		<!-- End of Header -->
		
		<!-- Form For Changing Email and Password -->
		
		<div class ="container-fluid">
		
			<div class = "row justify-content-center">
				
				<div class = "col-lg-3 col-sm-6 col-md-4 col-8 " >
					
					<form method = "POST" class = "form-container">
						<div class="form-group" >
							<label for=""><b>Email:</b></label>
							<input type="text" class="form-control"  name = "email"id = "email"  placeholder="Enter Email" 
							value = "<?php
								$id = $_SESSION['id'];
								$qry1 = "select * from `add_teacher` where `id` = '$id'";
								$res1 = mysqli_query($conn, $qry1);
								$row1 = mysqli_fetch_assoc($res1);
								
								echo "$row1[email]";
								
							?>"  required="">

						</div>
														
						<div class="form-group">
							<label for=""><b>Password:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Password" name="password" value="<?php
								echo base64_decode($row1['password']);
							?>" required="">
						</div>
				
						<div style = "text-align:center;">			
							<input class="btn btn-primary submit" type="submit" name="submit1" value="Update" style = "width: 250px; max-width:80%">					
						</div>
					</form>
				</div>
				
			</div>
			
		</div>
		
		<!-- End of Form For Changing Email and Password -->
		
		<!-- PHP code for submitting the form -->
		<?php 
			if(isset($_POST['submit1']))
			{
				$email = $_POST['email'];
				$pass  = $_POST['password'];
				$pass = base64_encode($pass);
				
				$qry2 = "update `add_teacher` set `email` ='$email', `password` = '$pass' where `id` ='$id'";
				$res2 = mysqli_query($conn, $qry2);
				?>
					<script type="text/javascript">
						window.alert("Successfully Changed Information");
						window.location = "my_profile.php";
					</script>
				<?php
			}
			
		?>
		<!-- End of PHP code for submitting the form -->
		
</body>
</html>
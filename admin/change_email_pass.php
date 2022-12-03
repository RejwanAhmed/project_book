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


	<title>Change Email and Password</title>

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
					<li class="nav-item ">
						<a class="nav-link" href="view_teacher.php">TEACHER INFORMATION<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
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
					
					<li class="nav-item active" style = "font-size: 15px;  margin-top: -3px;"><a  class="nav-link" href="change_email_pass.php">Change Email and Password </a></li>
					
				</ul>

					
				</ul>
				<ul class = "nav navbar-nav navbar-right ">
					
					<li class="nav-item" style = " font-size: 15px;"><a  class="nav-link" href="logout.php">Logout <img src="images/logout.png" alt="" /></a></li>
					
				</ul>
				
		  </div>  
		  
		</nav>
	</div>
	
	
	
	
	
		<br>
	<!-- End of Navbar -->
	

		
		
		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Change Email and Password</b></h2>
			<b><hr class = "hrline" style = "width: 400px;"/></b>
		</div>
		
		<div class ="container-fluid">
		
			<div class = "row justify-content-center">
				
				<div class = "col-lg-3 col-sm-6 col-md-4 col-8 " >
					
					<form name = "" action="" method = "POST" class = "form-container">
						<div class="form-group" >
							<label for=""><b>Username:</b></label>
							<input type="text" class="form-control"  name = "username"id = "email"  placeholder="Enter Email" 
							value = "<?php
								
								$qry1 = "select * from `admin_log_in`";
								$res1 = mysqli_query($conn, $qry1);
								$row1 = mysqli_fetch_assoc($res1);	
								echo "$row1[username]";
								
								
							?>" required="">

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
		<?php 
			if(isset($_POST['submit1']))
			{
				$username = $_POST['username'];
				$pass  = $_POST['password'];
				$pass = base64_encode($pass);
				
				$qry2 = "update `admin_log_in` set `username` ='$username', `password` = '$pass'";
				$res2 = mysqli_query($conn, $qry2);
				?>
					<script type="text/javascript">
						window.alert("Successfully Changed Information");
						window.location = "view_teacher.php";
					</script>
				<?php
			}
			
		?>
		
</body>
</html>
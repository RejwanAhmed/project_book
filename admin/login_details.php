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
	 
	
	<title>Login Details</title>
	
	

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
						
						<li class="nav-item ">
							<a class="nav-link" href="add_teacher.php">ADD TEACHER</a>
						</li>
						
						<li class="nav-item dropdown active">
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
		
		<!-- Header -->
		
		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Login Details</b></h2>
			<b><hr class = "loginline"/></b>
		</div>
		
		<!-- End of Header -->
		
		
		<!-- Login Details -->
		
		<div class = "container-fluid">
		
			<div class = "row justify-content-center">
				
				<div class = "col-lg-4 col-sm-6 col-md-6 col-12">
					<form name = "" action="" method = "POST" class = "form-container">
						<div class="form-group"> 
							<label for=""><b>Name:</b></label>
							<?php 
								$id = $_GET['id'];
								$id2;
								$qry = "select * from `exam_committee` where `id` = '$id'";
								$res = mysqli_query($conn, $qry);
								$row = mysqli_fetch_assoc($res);
								
								$qry2 = "select * from `add_teacher`";
								$res2 = mysqli_query($conn, $qry2);
								while($row2 = mysqli_fetch_assoc($res2))
								{
									if($row2['id'] == $row['teacher_name'])
									{
										break;
									}
								}
							?>
							<input style = "font-size:20px; text-align:center;" type="text" class="form-control"  
								value = "<?php
											echo $row2['name'] ;
										?>" disabled />
						</div>
						
						
						<div class="form-group"> 
							<label for=""><b>Email:</b></label>
							<input style = "font-size:20px; text-align:center; " type="text" class="form-control"    
								value = "<?php
											echo $row2['email'] ;
										?>" disabled />						
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Designation:</b></label>
								<input style = "font-size:20px; text-align:center; " type="text" class="form-control"  
									value = "<?php
												echo $row2['designation'] ;
											?>" disabled />					
										
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Password:</b></label>
					
							<input style = "font-size:20px; text-align:center;" type="text" class="form-control" 
								value = "<?php
											echo base64_decode($row2['password']) ;
										?>"disabled />
						</div>		
					</form>		
				</div>
			</div>					
					
		</div>
		
		<!-- End of Login Details -->
		
</body>
</html>
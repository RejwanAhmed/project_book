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
	
	$id = $_GET['id'];
	$qry = "select * from `project_information` where `id` = '$id'";
	$res = mysqli_query($conn, $qry);
	$row = mysqli_fetch_assoc($res);
	
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


	<title>View Project Details</title>

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
				
					<ul class="navbar-nav mr-auto list-group">
					
						<li class="nav-item ">
							<a class="nav-link " href="view_teacher.php">TEACHER INFORMATION<span class="sr-only">(current)</span></a>
						</li>
						
						<li class="nav-item ">
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
						
						<li class="nav-item active">
							<a class="nav-link" href="project_list.php">PROJECT LIST</a>
						</li>
						
					</ul>
					
					<ul class = "nav navbar-nav navbar-right">
						
						<li class="nav-item" style = "font-size: 15px;  margin-top: -3px;"><a  class="nav-link" href="change_email_pass.php">Change Email and Password </a></li>
						
					</ul>
					
					<ul class = "nav navbar-nav navbar-right ">
						
						<li class="nav-item" style = " font-size: 15px;"><a  class="nav-link" href="logout.php">Logout <img src="images/logout.png" alt="avatar" /></a></li>
						
					</ul>
					
			  </div>  
			  
			</nav>
		</div>
	
		<br>
		<!-- End of Navbar -->
	

		
		<!-- Header -->
		
		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Project Details</b></h2>
			<b><hr class = "pr_detailsline"/></b>
		</div>
		
		<!-- End of Header -->
		<br />
		<!-- Project Details -->
		
		<div class = "container-fluid">
		
			<div class = "row justify-content-center">
				
				<div class = "col-md-5" style = "text-align:center; margin-bottom: 50px;">
					
					<table class = "table table-dark project_details_table" style = "width: 300px; margin-bottom: 3px;">
						<tr>
							<th>Image:</th>						
						</tr>
					</table>					
					
					<?php 
						
						echo "<th>"; 
						echo "<img src='../user/project_image/$row[project_image]' onerror=this.onerror=null;this.src='../user/project_image/no_image.JPG'>"; 
								
					?>
												
				</div>

				<div class = "col-md-7 justify-content-center" style = "text-align:center; margin-bottom: 50px;">
					
					<table class = "table table-bordered table-dark project_details_table">
						<tr>
							<th>Project Name:</th>
						</tr>
						
						<tr>
							<td><?php echo $row['project_name'] ?></td>
						</tr>					
					</table>				
					<br />
					<table class = "table table-bordered table-dark project_details_table">
						<tr>
							<th>Supervisor:</th>
							<th>Co-Supervisor:</th>
						</tr>
						
						<tr>
							<td><?php echo $row['supervisor'] ?></td>
							<td><?php echo $row['co_supervisor'] ?></td>
						</tr>					
					</table>
					<br />
					<table class = "table table-bordered table-dark project_details_table">
						<tr>
							<th>Member1:</th>
							<th>Member2:</th>
							<th>Member3:</th>
							
						</tr>
							
						<tr>
							<td><?php echo $row['member1']; ?></td>
							<td><?php echo $row['member2']; ?></td>
							<td><?php echo $row['member3']; ?></td>
						</tr>					
					</table>
					<br />
					<table class = "table table-bordered table-dark project_details_table">
						<tr>
							<th>Session:</th>
							<th>Year:</th>
							<th>Semester:</th>
							
						</tr>
							
						<tr>
							<td><?php echo $row['session']; ?></td>
							<td><?php echo $row['year']; ?></td>
							<td><?php echo $row['semester']; ?></td>
						</tr>					
					</table>
					
				</div>
				
			</div>
			
			<div class = "row justify-content-center">
				
				<div class = "col-lg-8 col-sm-10">
					<table class = "table table-bordered table-dark project_details_table">
						<tr>
							<th>Project Description:</th>
						</tr>
						
						<tr>
							<td><?php echo $row['project_des'] ?></td>
						</tr>					
					</table>
				</div>
				
			</div>
			
			<br />
			<div class = "row justify-content-center">
				<div>
					<a class = "btn btn-danger" href="download_pdf.php?id=<?= $row['id']; ?> "> <b>Download Project Report</b></a>
				</div>
			</div>
		</div>
		
		<!-- End of Project Details -->
		
</body>
</html>
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
	// PHP  code for selecting all information from project_information
	include('db_connection.php');
	$id = $_GET['id'];
	$qry = "select * from `project_information` where `id` = '$id'";
	$res = mysqli_query($conn,$qry);
	$row = mysqli_fetch_assoc($res);
	// End of PHP  code for selecting all information from project_information
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
	
	<title>Modify Project Details</title>
	
	<script type="text/javascript">
	function changeinput(ip)
	{
		document.getElementById("inp").value = ip; 
	}	
	function changecospervisor(co_sup)
	{
		document.getElementById("co_sup").value = co_sup; 
	}
	
	function changesession(sns)
	{
		document.getElementById("ses").value = sns;
	}
	function changeyear(select_year)
	{
		document.getElementById("select_year").value = select_year; 
	}
	</script>
	
</head>
<body >
		<!-- Navbar -->
		<div id = "mynavbar" class = "" role = "navigation" >
			<nav class="navbar navbar-expand-lg  navbar-dark">
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
								<a class="dropdown-item" href="exam_committee_registration.php" style = "font-weight: bold; font-size:13px;">FORM</a>
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
					
					<ul class = "nav navbar-nav navbar-right">
						
						<li class="nav-item" style = "font-size: 15px;"><a  class="nav-link" href="logout.php">Logout <img src="images/logout.png" alt="" /></a></li>
						
					</ul>
					
			  </div>  
			  
			</nav>
		</div>
		
		<br>
		
		<!-- End of Navbar -->
		
		
		<!-- Header -->
		
		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Edit Project Details</b></h2>
			<b><hr class = "edit_pro_details"/></b>
		</div>
		
		<!-- End of Header -->
		
		<!-- Form -->
		
		<div class = "container-fluid">
		
			<div class = "row justify-content-center">
				
				<div class = "col-lg-3 col-sm-6 col-md-4 col-8">
					<form name = "" action="" method = "POST" class = "form-container" enctype="multipart/form-data">
						
						<div class="form-group"> 
							<label for=""><b>Project Name:</b></label>
							
							<input class="form-control" type="text" name="project_name"  placeholder = "Enter Project Name" value ="<?php 
										if(isset($_POST['project_name']))
										{
											echo $_POST['project_name'];
										}
										else
										{
											echo $row['project_name'];
										}
									?>" required=""/>
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Session:</b></label>
							
							<!-- Session Field (input with drop down) -->
							
							<div class="input-group">
								<input type="text" name = "session" class="form-control" id="ses" placeholder = "Enter Session" required= "" value ="<?php 
																if(isset($_POST['session']))
																{
																	echo $_POST['session'];
																}
																else
																{
																	echo $row['session'];
																}
															?>"/>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">
									</button>
									<div class="dropdown-menu">	
										<?php
											 $c = 2006;
	 
											$today = date("Y"); 

											 for($i=$c; $i<$today; $i++)
											 {
												 $r = $i + 1;
												 echo "<button type = 'button' onclick = changesession('$i-$r') class= 'dropdown-item'> $i-$r </button>";
											 }		
										?>
									</div>
								</div>
							</div>
							
							<!-- End of Session Field (input with drop down) -->
							
						</div>
						
						<div class=" form-group">
							<label for=""><b>Year:</b></label>
							
							<!-- Year field (Drop Down with input field) -->
							
							<div class = "input-group">
								<input type="text" name = "year" class="form-control" id="select_year"
								placeholder = "Enter Year" required = ""
										value = "<?php
													if(isset($_POST['year']))
													{
														echo $_POST['year'];
													}
													else
													{
														echo $row['year'];
													}
												?>"
								/>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 1st')\" class= \"dropdown-item\" > B.Sc. 1st </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 2nd')\" class= \"dropdown-item\" > B.Sc. 2nd </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 3rd')\" class= \"dropdown-item\" > B.Sc. 3rd </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 4th')\" class= \"dropdown-item\" > B.Sc. 4th </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('M.Sc. 1st')\" class= \"dropdown-item\" > M.Sc. 1st </button>";
											
										?>
									</div>
								</div>
							</div>
							
							<!-- Year field (Drop Down with input field) -->
						</div>
						
						<div class=" form-group">
							<label for=""><b>Semester:</b></label>
							<div class = "input-group">
								<input type="text" name = "semester" class="form-control" id="select_year"
								placeholder = "Enter Semester" required="" 
									value ="<?php 
										if(isset($_POST['semester']))
										{
											echo $_POST['semester'];
										}
										else
										{
											echo $row['semester'];
										}
									?>"/>
									
								<!-- Semester field (input with drop down) -->	
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc 2nd Semester')\" class= \"dropdown-item\" >B.Sc 2nd Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc 4th Semester')\" class= \"dropdown-item\" >B.Sc 4th Semester</button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc 6th Semester')\" class= \"dropdown-item\" >B.Sc 6th Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc 7th Semester')\" class= \"dropdown-item\" >B.Sc 7th Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc 8th Semester')\" class= \"dropdown-item\" >B.Sc 8th Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('M.Sc Final semester')\" class= \"dropdown-item\" > M.Sc Final semester</button>";
											
										?>
									</div>
								</div>
								<!-- End of Semester field (input with drop down) -->	
							</div>
						</div>
					
						<div class="form-group"> 
							<label for=""><b>Supervisor:</b></label>
							
							<div class="input-group">
								<input type="text" name = "supervisor" class="form-control" id="inp" placeholder = "Enter Supervisor Name" required="" 
									value ="<?php 
										if(isset($_POST['supervisor']))
										{
											echo $_POST['supervisor'];
										}
										else
										{
											echo $row['supervisor'];
										}
									?>" />
								
								<!-- Supervisor field (input with drop down) -->									
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											$qry1 = "select `name` from `add_teacher`";
											$res1 = mysqli_query($conn,$qry1);
											while($row1 = mysqli_fetch_assoc($res1))
											{
												echo "<button type = \"button\"  onclick = \"changeinput('$row1[name]')\" class= \"dropdown-item\" > $row1[name] </button>";
											}
										?>
									</div>
								</div>
								<!-- End of Supervisor field (input with drop down) -->	
							</div>
							
						</div>
						
						
						<div class="form-group"> 
							<label for=""><b>Co-Supervisor:</b></label>							
							
							<div class="input-group">
								<input type="text" name = "co_supervisor" class="form-control" id="co_sup" placeholder = "Enter Supervisor Name"  
									value ="<?php 
										if(isset($_POST['co_supervisor']))
										{
											echo $_POST['co_supervisor'];
										}
										else
										{
											echo $row['co_supervisor'];
										}
									?>" />
									
								<!-- Co-Supervisor field (input with drop down) -->		
								
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											$qry2 = "select `name` from `add_teacher`";
											$res2 = mysqli_query($conn,$qry2);
											while($row2 = mysqli_fetch_assoc($res2))
											{
												echo "<button type = \"button\"  onclick = \"changecospervisor('$row2[name]')\" class= \"dropdown-item\" > $row2[name] </button>";
											}
										?>
									</div>
								</div>
								<!-- End of Co-Supervisor field (input with drop down) -->	
								
							</div>
							
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Member1:</b></label>
							
							<input class="form-control" type="text" name="member1"  placeholder = "Enter Member Name"  required="" value ="<?php 
												if(isset($_POST['member1']))
												{
													echo $_POST['member1'];
												}
												else
												{
													echo $row['member1'];
												}
											?>"/>
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Member2:</b></label>
							
							<input class="form-control" type="text" name="member2"  placeholder = "Enter Member Name" 
								value ="<?php 
										if(isset($_POST['member2']))
										{
											echo $_POST['member2'];
										}
										else
										{
											echo $row['member2'];
										}
									?>"/>
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Member3:</b></label>
							
							<input class="form-control" type="text" name="member3"  placeholder = "Enter Member Name" 
							value ="<?php 
										if(isset($_POST['member3']))
										{
											echo $_POST['member3'];
										}
										else
										{
											echo $row['member3'];
										}
									?>"/>
						</div>
						
						
						<div class="form-group"> 
							<label for=""><b>Project Description:</b></label>
							
							<textarea name="description" id="" cols="30" rows="10" placeholder = "Enter Project Description" class="form-control" required="" 
									value =""
							><?php 
								echo $row['project_des'];
									?></textarea>
														
						</div>
						
			
						<div style = "text-align:center;">
						
							<input class="btn btn-primary submit" type="submit" name="submit1" value="Submit" style = "width: 250px; max-width:80%">
						
						</div>
					</form>
				</div>
				
			</div>
			
		</div>
		
		<!-- End of Form -->
		
		<!-- PHP code for Updating the project -->
		
		<?php 
			
			if(isset($_POST['submit1']))
			{
				$project_name = $_POST['project_name'];
				$session = $_POST['session'];
				$semester = $_POST['semester'];
				$supervisor = $_POST['supervisor'];
				$co_supervisor = $_POST['co_supervisor'];
				$member1 = $_POST['member1'];
				$member2 = $_POST['member2'];
				$member3 = $_POST['member3'];
				$project_description = $_POST['description'];
				
			
				$qry4 = "UPDATE `project_information` SET `project_name`='$project_name',`session`='$session',`semester`='$semester',`supervisor`='$supervisor',`co_supervisor`='$co_supervisor',`member1`='$member1',`member2`='$member2',`member3`='$member3',`project_des`='$project_description' WHERE `id` = '$id'";
							
				$res4 = mysqli_query($conn, $qry4);
					
					?>
						<script type="text/javascript">
							alert("Project Updated Successfully");
							window.location = "project_list.php";
						</script>
					<?php
			}
		?>
		
		<!-- End of PHP code for Updating the project -->
</body>
</html>
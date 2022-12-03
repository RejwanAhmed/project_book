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
	
	
	<title>Exam Committee Chairman Form</title>
	
	<script>
	function changeinput(ip,t_id)
	{
		document.getElementById("inp").value = ip;
		document.getElementById("inp_tid").value = t_id; 		
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
		
		<div id = "mynavbar"  role = "navigation">
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
						
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
		<br />
		<!-- End of Navbar -->
		
		<!-- Header -->
		
		<div class = "logintext">
			<h2 style = "color:#3871F6; width: auto;"><b>Exam Committee Chairman Registration Form</b></h2>
			<b><hr class = "hrlineofchairman"/></b>
		</div>
		
		<!-- End of Header -->
		
		
		<!-- Form -->
		
		<div class = "container-fluid">
		
			<div class = "row justify-content-center">
				
				<div class = "col-lg-3 col-sm-6 col-md-4 col-8">
					<form name = "" action="" method = "POST" class = "form-container">
						<div class="form-group"> 
							<label for=""><b>Name:</b></label>
							
							<!-- Name field (Drop Down with input field) -->
							
							<div class="input-group">
								<input type="text" name = "name" class="form-control" id="inp" placeholder = "Enter Teacher Name" required = "" 
								value = "<?php  
											if(isset($_POST['name']))
											{
												echo $_POST['name'];
											}
										?>"/>
								<input type="hidden" name = "tid" id="inp_tid" />
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											$qry = "select * from `add_teacher`";
											$res = mysqli_query($conn,$qry);
											 
											while($row = mysqli_fetch_assoc($res))
											{
												echo "<button type = \"button\"  onclick = \"changeinput('$row[name]','$row[id]')\" class= \"dropdown-item\" > $row[name] </button>";
											}
										?>
									</div>
								</div>
							</div>
							
							<!-- End of Name field (Drop Down with input field) -->
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Session:</b></label>
							
							<!-- Session field (Drop Down with input field) -->
							
							<div class="input-group">
								<input type="text" name="session" class="form-control" id="ses" placeholder = "Enter Session" 	required= ""
									value = "<?php
												if(isset($_POST['session']))
												{
													echo $_POST['session'];
												}
											?>"
								/>
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
							
							<!-- Session field (Drop Down with input field) -->
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
				$teacher_name = $_POST['tid'];
				$session = $_POST['session'];
				$year = $_POST['year'];
				
				
				$qry1 = "select * from `exam_committee`";
				$res = mysqli_query($conn, $qry1);
				$approve=0;
				
				while($row = mysqli_fetch_assoc($res))
				{
					if($row['session']== $session && $row['year']== $year && $row['status'] == "1")
					{
						$approve = 1;
						break;
					}
					else if($row['session']== $session && $row['year']== $year && $row['teacher_name'] == $teacher_name && $row['status'] == "0")
					{
						$approve = 1;
						break;
					}
				}
				if($approve==0)
				{
					$qry3= "select * from `add_teacher`";
					$qry2= "INSERT INTO `exam_committee`(`teacher_name`, `session`, `year`,`status`) VALUES ('$teacher_name','$session','$year','1')";
					$res2= mysqli_query($conn, $qry2);
					
					?>
					<script type="text/javascript">
						window.alert("Teacher Added to the Exam Committee Successfully");
						window.location = "chairman_list.php";
					</script>
					<?php
				}
				else
				{
					?>
					<script type="text/javascript">
						window.alert("Already teacher exists for this session and year");
						//window.location = "exam_committee_registration.php";
					</script>
				<?php
					
				}		
			}
		?>
		
		<!-- End of PHP code for submitting the form -->
		
		

</body>
</html>
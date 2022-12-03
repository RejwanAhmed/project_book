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
	
	<title>Edit Exam Committee Chairman Information</title>
	
	<script type="text/javascript">
	function changeinput(ip)
	{
		document.getElementById("inp").value = ip; 
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
			<h2 style = "color:#3871F6; width: auto;"><b>Edit Exam Committee Chairman Information</b></h2>
			<b><hr class = "modfiy_exam_committee_hrline"/></b>
		</div>
		
		<!-- End of Header -->
		
		<!-- Form -->
		
		<div class ="container-fluid">
		
			<div class = "row justify-content-center">
				
				<div class = "col-lg-3 col-sm-6 col-md-4 col-8 " >
					
					<form name = "" action="" method = "POST" class = "form-container">
					
						<div class="form-group" >
						
							<label for=""><b>Name:</b></label>
							<input type="text" class="form-control" id = "teachername"  placeholder="Enter Name" 
								value = "<?php
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

								if(isset($_POST['name']))
								{
									echo $_POST['name'];
								}
								else
								{
									echo $row2['name'];
								}
								
								?>" name="name" required="">

						</div>
						
						<!-- Designation (drop down with input field) -->
						
						<div class=" form-group">
						
							<label for=""><b>Designation:</b></label>
							
							<div class = "input-group">
							
								<input type="text" name = "designation" class="form-control" id="inp" value="<?php
									
									if(isset($_POST['designation']))
									{
										echo $_POST['designation'];
									}
									else
									{
										echo $row2['designation'];
									}
									
									?>" placeholder = "Enter Designation" required=""/>
								<div class="input-group-append">
								
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											
												echo "<button type = \"button\"  onclick = \"changeinput('Professor')\" class= \"dropdown-item\" > Professor </button>";
												echo "<button type = \"button\"  onclick = \"changeinput('Associate Profrssor')\" class= \"dropdown-item\" > Associate Professor </button>";
												echo "<button type = \"button\"  onclick = \"changeinput('Assistant Profrssor')\" class= \"dropdown-item\" > Assistant Professor </button>";
												echo "<button type = \"button\"  onclick = \"changeinput('Lecturer')\" class= \"dropdown-item\" > Lecturer </button>";
											
										?>
									</div>
								</div>
							</div>
						</div>
						
						<!-- End of Designation (drop down with input field) -->
						
						<div class="form-group">
						
							<label for=""><b>Email:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Email" name="email" value="<?php
									if(isset($_POST['email']))
									{
										echo $_POST['email'];
									}
									else
									{
										echo $row2['email'];
									}
									
								
								?>" required="">
								
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
												else
												{
													echo $row['session'];
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
							
							<div class = "input-group" >
								<input type="text" name = "year" class="form-control" id="select_year"
									placeholder = "Enter Year" 
									value = "<?php 
												if(isset($_POST['year']))
												{
													echo $_POST['year'];
												}
												else
												{
													echo $row['year'];
												}
												
										?>"/>
								
								<!-- Name field (drop down with input field) -->
								
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 1st')\" class= \"dropdown-item\" > B.Sc. 1st </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 2nd')\" class= \"dropdown-item\" > B.Sc. 2nd </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 3rd')\" class= \"dropdown-item\" > B.Sc. 3rd </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 4th')\" class= \"dropdown-item\" > B.Sc 4th </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('M.Sc. 1st')\" class= \"dropdown-item\" > M.Sc. 1st </button>";
											
										?>
									</div>
								</div>
								
								<!-- End of Name field (drop down with input field) -->
							</div>
						</div>
						
						<div class="form-group">
						
							<label for=""><b>Password:</b></label>
							<input type="text" class="form-control"  placeholder="Enter Password" name="password" value="<?php
									if(isset($_POST['password']))
									{
										echo $_POST['password'];
									}
									else
									{
										echo base64_decode($row2['password']);
									}
								?>" required="">
								
						</div>
						
						<div class="form-group">
							<label for=""><b>Repeat Password:</b></label>
							<input type="text" class="form-control"  placeholder="Repeat Password" name="repeat_password"  		value = "<?php 
									if(isset($_POST['repeat_password']))
									{
										echo $_POST['repeat_password'];
									}
									else
									{
										echo base64_decode($row2['repeat_password']);
									}			
									
								
								?>" required="">
							
						</div>
						
						<div style = "text-align:center;">
						
							<input class="btn btn-primary submit" type="submit" name="submit1" value="Update" style = "width: 250px; max-width:80%">
						
						</div>
					</form>
				</div>
				
			</div>
			
		</div>
		
		<!-- End of Form -->
		
		
		<!-- PHP code for submitting the edited information -->
		<?php
	
			if(isset($_POST['submit1']))
			{
				$id = $_GET['id'];
				$name = $_POST['name'];
				$designation = $_POST['designation'];
				$email = $_POST['email'];
				$session = $_POST['session'];
				$year = $_POST['year'];
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
						//window.location = "view_teacher.php";
						</script>
					<?php
				}
				else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
				{
					?>
						<script type="text/javascript">
						window.alert("Invalid Email Address");
						//window.location = "view_teacher.php";
						</script>
					<?php
				}
				else
				{	
					$qry3 = "select * from `add_teacher`";
					$res3 = mysqli_query($conn,$qry3);
					while($row3 = mysqli_fetch_assoc($res3))
					{
						if($row3['email'] == $email && $row['teacher_name']!=$row3['id'])
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
						$qry4 = "UPDATE `add_teacher` SET `name`='$name',`designation`='$designation',`email`='$email', `password` = '$pass', `repeat_password` = '$repeat_pass' WHERE `id` ='$row[teacher_name]'";

						$res4 = mysqli_query($conn,$qry4);
						
						$qry5 = "UPDATE `exam_committee` SET `session` = '$session', `year` = '$year' where `id` = '$id'";
						$res5 = mysqli_query($conn,$qry5);
						
						?>
							<script type="text/javascript">
								window.alert("Teacher information is updated successfully");
								window.location = "Chairman_list.php";
							</script>
						<?php
				
					}
					
				}

			}		
		?>
		<!-- End of PHP cod for submitting the edited information -->	
</body>
</html>
<?php
// Code for solving the problem of documentation expired 
	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	
	// End of Code for solving the problem of documentation expired
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
	// if(!isset($_GET['name']))
	// {
	// 	$_GET['name'] = '';
	// }
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


	<title>Teachers Projects</title>
	
	<script type="text/javascript">
	
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

		<div id = "mynavbar"  role = "navigation" >

			<nav class="navbar navbar-expand-lg  navbar-dark ">

				<h3 style = "color:#F0F8FF;"><b> Welcome Admin</b></h3>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="collapsibleNavbar">

					<ul class="navbar-nav mr-auto list-group">

						<li class="nav-item active">
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

						<li class="nav-item">
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
			<h2 style = "color:#3871F6; width: auto;"><b>Teachers Projects</b></h2>
			<b><hr class = "hrline"/></b>
		</div>

		<!-- End of Header -->



		<!-- Session, Year, Two Search buttons, Show Button-->
		
		<div class = "container-fluid">  
			<form action="" method = "post">
				<div class="row " >	
					<div class="col-lg-6 col-12 col-md-6" >
						<div class = "form-group"> 				
							<label style = "font-size:20px; "><b>Search Project:</b></label>		
							<div class = "flexContainer">
								<input type="text" placeholder="Enter Name of a Project to Search....." name="search_namewise" class = "form-control"  
									value = "<?php
												if(isset($_POST['showall']))
												{
													echo "";
												}
												else if(isset($_POST['search_namewise']))
												{
													echo $_POST['search_namewise'];
												}
												
											?>" />
								
							</div>
						</div>
					</div>	
						
				</div>	
			
				<div class="row">
				
					<div class=" col-lg-3 col-sm-3">
					
						<div class="form-group"> 
						
							<label style = "font-size:20px; max-width:60%;"><b>Session:</b></label>
							
							<!-- Session filed (Drop down with input field) -->
							
							<div class="input-group" >
							
								<input type="text" name = "session" class="form-control" id="ses" placeholder = "Enter Session" value = "<?php
												if(isset($_POST['showall']))
												{
													echo "";
												}
												else if(isset($_POST['session']))
												{
													echo $_POST['session'];
												}
											?>" />
								
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
							
							<!-- End of Session filed (Drop down with input field) -->
							
						</div>
					</div>
					
					<div class="col-lg-3 col-sm-3">
					
						<div class=" form-group">
				
							<label style = "font-size:20px;"><b>Semester:</b></label>
							
							<div class = "input-group" >
								<input type="text" name = "semester" class="form-control" id="select_year"
									placeholder = "Enter Semester" 
									value = "<?php
												if(isset($_POST['showall']))
												{
													echo "";
												}
												else if(isset($_POST['semester']))
												{
													echo $_POST['semester'];
												}
											?>" />
								
								<!-- Semester field (Drop down with input) -->
								
								<div class="input-group-append">
									<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
									<div class="dropdown-menu">
										
										<?php
											
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 2nd Semester')\" class= \"dropdown-item\" >B.Sc. 2nd Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 4th Semester')\" class= \"dropdown-item\" >B.Sc. 4th Semester</button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 6th Semester')\" class= \"dropdown-item\" >B.Sc. 6th Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 7th Semester')\" class= \"dropdown-item\" >B.Sc. 7th Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('B.Sc. 8th Semester')\" class= \"dropdown-item\" >B.Sc. 8th Semester </button>";
												echo "<button type = \"button\"  onclick = \"changeyear('M.Sc. Final semester')\" class= \"dropdown-item\" > M.Sc. Final semester</button>";
											
										?>
									</div>
								</div>
								
								<!-- End of Semester field (Drop down with input) -->
							</div>
						</div>
					</div>
			
					<div class=" col-lg-3 col-sm-3" >
					
						<br />
						<div style = "text-align:center; margin-top:10px;" >
								
							<input class="btn btn-primary submit form-control" type="submit" name="search" value="Search" style = "width:100%; ">
								
						</div>
					</div>
					
					<div class=" col-lg-3 col-sm-3" >
						
						<br />
						<div style = "text-align:center; margin-top:10px;" >
								
							<input class="btn btn-success submit form-control" type="submit" name="showall" value="Show All " style = "width:100%; ">
								
						</div>
					</div>
			
			
				</div>
			</form>
		
			<br />
		</div>
		
		<!-- End of Session, Year, Two Search buttons, Show Button-->
		
		
		
		<!-- Table -->
		
		<div class ="container-fluid table-responsive">
		
			<div class = "row justify-content-center">
				
				<div class = "col " style = "text-align:center" >
					
					<?php			
						
						if(isset($_POST['search']))
						{							
							$session = $_POST['session'];
							$semester = $_POST['semester'];
							$search_name_wise = $_POST['search_namewise'];
							if($session == "" && $semester == "" && $search_name_wise == "")
							{
								?>
								<script type="text/javascript">
									window.alert("Fill at least 1 field to search");
									
								</script>
								<?php
								$true = 1;
								if($true==1)
								{
									goto end;
								}
							}
							else if($session == "" && $search_name_wise == "")
							{
								$qry = "SELECT * FROM `project_information` where `semester` = '$semester' AND `supervisor` ='$_GET[name]'";
							}
							else if($semester == "" && $search_name_wise == "")
							{
								$qry = "SELECT * FROM `project_information` where `session` = '$session' AND `supervisor` ='$_GET[name]'";
							}	
							else if ($session == "" && $semester == "")
							{
								$qry = "select * from `project_information` where `project_name` like '%$_POST[search_namewise]%' AND `supervisor` ='$_GET[name]'";
							}
							else if($search_name_wise == "")
							{
								$qry = "SELECT * FROM `project_information` where `session` = '$session' AND `semester` = '$semester' AND `supervisor` ='$_GET[name]'";
							}
							else if($session =="")
							{
								$qry = "select * from `project_information` where `project_name` like '%$_POST[search_namewise]%' AND `semester` = '$semester' AND `supervisor` ='$_GET[name]'";
							}
							else if($semester == "")
							{
								$qry = "select * from `project_information` where `project_name` like '%$_POST[search_namewise]%' AND `session` = '$session' AND `supervisor` ='$_GET[name]'";
							}
							else
							{
								$qry = "select * from `project_information` where `project_name` like '%$_POST[search_namewise]%' AND `session` = '$session' AND `semester` = '$semester' AND `supervisor` ='$_GET[name]'";
							}
							
							$res = mysqli_query($conn, $qry);						
							
							echo "<table class='table table-bordered table-dark'>";	
								
									echo "<tr>";
										echo "<th>Project Name</th>";
										echo "<th>Session</th>";
										echo "<th>Year</th>";
										echo "<th>Semester</th>";
										echo "<th>Supervisor</th>";
										echo "<th>Co-Supervisor</th>";
										echo "<th>Member</th>";
										echo "<th>View Details</th>";
									echo "</tr>";
									
									while($row = mysqli_fetch_assoc($res))
									{
										
										echo "<tr>";
											echo "<td>$row[project_name]</td>";
											echo "<td>$row[session]</td>";
											echo "<td>$row[year]</td>";
											echo "<td>$row[semester]</td>";
											echo "<td>$row[supervisor]</td>";
											echo "<td>$row[co_supervisor]</td>";
											echo "<td style = 'text-align:left'>1. $row[member1] <br />
													  2. $row[member2] <br />
													  3. $row[member3]
												</td>";
												
											echo "<td>";
											?>
											 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="view_project_details.php?id=<?php echo $row['id']; ?>">View Details</a> 
											<?php	
											echo "</td>";													
										echo "</tr>";
									}
									
							echo "</table>";
																			
						}
						else
						{
							
							end:
							// Logic for Pagination 
							
							if(isset($_POST['showall']))
							{
								?>
									<script type="text/javascript">
										window.location = "teachers_projects.php?name=<?php echo $_GET['name']?>";
									</script>
								<?php
							}
							$limit = 10;
							if(isset($_GET['page']))
							{
								$page = $_GET['page'];
							}
							else
							{
								$page = 1;
							}
							$start = ($page-1) * $limit; 
							$qry = "select * from `project_information` where `supervisor` ='$_GET[name]' LIMIT $start, $limit ";
							$res = mysqli_query($conn, $qry);
							
							$countqry = "select count(id) as id from `project_information` where `supervisor` ='$_GET[name]'";
							$countres = mysqli_query($conn, $countqry); 
							$countrow = mysqli_fetch_assoc($countres);
							$total = $countrow["id"];
							$pages = ceil($total/$limit);
							$previous = $page-1;
							$next = $page+1;
							
							// End of Logic for Pagination 
							
							echo "<table class='table table-bordered table-dark'>";	
								
									echo "<tr>";
										echo "<th>Project Name</th>";
										echo "<th>Session</th>";
										echo "<th>Year</th>";
										echo "<th>Semester</th>";
										echo "<th>Supervisor</th>";
										echo "<th>Co-Supervisor</th>";
										echo "<th>Member</th>";
										echo "<th>View Details</th>";
									echo "</tr>";
									
									while($row = mysqli_fetch_assoc($res))
									{
										
										echo "<tr>";
											echo "<td>$row[project_name]</td>";
											echo "<td>$row[session]</td>";
											echo "<td>$row[year]</td>";
											echo "<td>$row[semester]</td>";
											echo "<td>$row[supervisor]</td>";
											echo "<td>$row[co_supervisor]</td>";
											echo "<td style = 'text-align:left'>1. $row[member1] <br />
													  2. $row[member2] <br />
													  3. $row[member3]
												</td>";
												
											echo "<td>";
											?>
											 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="view_project_details.php?id=<?php echo $row['id']; ?>">View Details</a>	
											<?php	
											echo "</td>";
										echo "</tr>";
									}
									
							echo "</table>";
						
							?>
							<!-- Pagination Logic Code -->

							<div class="container-fluid"> 
								<div class="row">
									<div class="col-12">
										<ul class="pagination pagination-lg">
											<li class="page-item">
												<?php
													if($page>1)
													{
														echo "<a class='inactive_page page-link' href='teachers_projects.php?page=".$previous."&name=$_GET[name]'> Previous</a> ";
													}
													else
													{
														echo "<a class=page-link disbled> Previous</a> ";
													}
												?>
											</li>
										
											<?php 
												for ($i=1; $i<=$pages; $i++) { 
												if($page==$i)
												{
													echo "<a class='active_page page-link'  href='teachers_projects.php?page=".$i."&name=$_GET[name]'>".$i."</a> ";
												}
												else
												{
													echo "<a class=' inactive_page page-link'  href='teachers_projects.php?page=".$i."&name=$_GET[name]'>".$i."</a> ";
												}						
												}; 
											?>

											<li class="page-item">
												<?php 
													if($pages>=$next)
													{
														echo "<a class='inactive_page page-link' href='teachers_projects.php?page=".$next."&name=$_GET[name]'> Next</a> ";	
													}
													else
													{
														echo "<a class= ' page-link disbled'> Next</a> ";
													}
												?>
											</li>
										</ul>
									</div>
								</div>		
								
							</div>

							<!-- End of Pagination Logic Code -->
							
							<?php
							
						}						
					?>
					
				</div>
				
			</div>
			
		</div>
		
		
		
		<!-- End of Table -->

</body>
</html>

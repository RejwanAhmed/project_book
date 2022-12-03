<?php
	// Code for solving the problem of documentation expired 
	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	
	// End of Code for solving the problem of documentation expired 
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


	<title>Former Chairman Project List</title>
	<style>
		.flexContainer {
			display: flex;
		}

		.inputField {
			flex: 1;
		}
	</style>
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
						<li class="nav-item ">
							<a class="nav-link " href="my_profile.php">MY PROFILE<span class="sr-only">(current)</span></a>
						</li>
						
						<li class="nav-item active">
							<a class="nav-link" href="former_chairman_list.php">FORMER CHAIRMAN</a>
						</li>
						
						<li class="nav-item ">
							<a class="nav-link" href="project_list.php">PROJECT LIST</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="my_projects.php">MY PROJECTS</a>
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
			<h2 style = "color:#3871F6; width: auto;"><b>Previous Chairman List</b></h2>
			<b><hr class = "previous_chair_hrline" style = ""/></b>
		</div>
		
		<!-- End of Header -->
		
		<!-- Form for displaying details of chairman -->
		
		<div class = "container-fluid">		
			<div class = "row justify-content-center">				
				<div class = " col-12">
					<form method = "POST" class = "form-container">													
						<div style = "text-align:center	"> 
						<?php 
						
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
							
							
							// End of Logic for Pagination 
							
						
						
							$id = $_SESSION['id'];
							$qry = "select * from  `exam_committee` where `teacher_name` = '$id' and `status` = '0' LIMIT $start, $limit";
							$res = mysqli_query($conn,$qry);
							
							$countqry = "select count(id) as id from `exam_committee` where `teacher_name` = '$id' and `status` = 'not active'";
							$countres = mysqli_query($conn, $countqry); 
							$countrow = mysqli_fetch_assoc($countres);
							$total = $countrow["id"];
							$pages = ceil($total/$limit);
							$previous = $page-1;
							$next = $page+1;
															
							echo "<table class='table table-bordered table-dark'>";						
								echo "<tr>";
									echo "<th>Session</th>";
									echo "<th>Year</th>";
									echo "<th>View Projects</th>";
									echo "<th>Add Project</th>";
								echo "</tr>";
																		
								while($row = mysqli_fetch_assoc($res))
								{
									echo "<tr>";								
										echo "<td>$row[session]</td>";
										echo "<td>$row[year]</td>";										
										echo "<td>";
										?>
										 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="view_all_projects_of_session_year.php?id=<?php echo $row['id']; ?>">View 	Projects</a>
										<?php	
										echo "</td>";
										
										echo "<td>";
										?>
										 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="add_project_of_session_year.php?id=<?php echo $row['id']; ?>">Add Project</a> 
										<?php	
										echo "</td>";
									echo "</tr>";
								}																						
							echo "</table>";

							if($total>=10)
							{
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
														echo "<a class='inactive_page page-link' href='former_chairman_list.php?page=".$previous."'> Previous</a> ";
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
													echo "<a class='active_page page-link'  href='former_chairman_list.php?page=".$i."'>".$i."</a> ";
												}
												else
												{
													echo "<a class=' inactive_page page-link'  href='former_chairman_list.php?page=".$i."'>".$i."</a> ";
												}						
												}; 
											?>

											<li class="page-item">
												<?php 
													if($pages>=$next)
													{
														echo "<a class='inactive_page page-link' href='former_chairman_list.php?page=".$next."'> Next</a> ";	
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
						
					</form>
				</div>
				
			</div>
			
		</div>
		
		<!-- End of Form for displaying details of chairman -->
		
</body>
</html>
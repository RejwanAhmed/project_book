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
	$id = $_SESSION['project_id'];
	
	$qry1 = "select * from `exam_committee` where `id` = '$id'"; 
	$res1 = mysqli_query($conn,$qry1);
	$row1 = mysqli_fetch_assoc($res1);
	
	$qry2 = "select * from `project_information` where `session` = '$row1[session]' and `year` = '$row1[year]'";
	$res2 = mysqli_query($conn,$qry2);
	$row2 = mysqli_fetch_assoc($res2);
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


	<title>Project List</title>
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
						
						<li class="nav-item ">
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
			<h2 style = "color:#3871F6; width: auto;"><b> Project List</b></h2>
			<b><hr class = "hrline" style = "width: 160px;"/></b>
		</div>
		
		<!-- End of Header -->
		
		<!-- Session, Year, Search button, Show Button-->
		
		<div class = "container-fluid">  
			<form method = "post">
				<div class="row " >		
					<div class="col-lg-2 col-sm-6">
						<div class="form-group"> 
							<label style = "font-size:20px; max-width:60%;" ><b>Session:</b></label>
							<input class = "form-control" type="text" disabled placeholder = "No Project"  
							value = "<?php echo $row2['session']; ?>"/>
							
						</div>
					</div>
					
					<div class="col-lg-2 col-sm-6">				
						<div class=" form-group">			
							<label style = "font-size:20px;"><b>Year:</b></label>				
							<div class = "input-group" >
								<input type="text" name = "semester" class="form-control"
									placeholder = "No project" 
									value = "<?php
												echo $row2['year'];
											?>" disabled />
								
							</div>
						</div>
					</div>
				
					<div class="col-lg-3 col-sm-6" >					
						<div class = "form-group"> 				
							<label style = "font-size:20px; "><b>Search Project:</b></label>
						
							<div class = "flexContainer " >
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
								<button type="submit" name = "search_name_wise_btn" class = "btn btn-primary" ><img src="images/search.png" alt="" /></button>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3 col-sm-6" >					
						<br />
						<div style = "text-align:center; margin-top:10px;" >		
							<input class="btn btn-success submit form-control" type="submit" name="showall" value="Show All " style = "width:100%; ">							
						</div>
					</div>					
				</div>				
			</form>
			<br />
		</div>
		
		<!-- End of Session, Year, Search button, Show Button-->
		
		
		<!-- Table -->
		
		<div class ="container-fluid table-responsive">
		
			<div class = "row justify-content-center">
				
				<div class = "col " style = "text-align:center" >
					
					<?php

						if(isset($_POST['search_name_wise_btn']))
						{	
							$exist = 0;
							$search_name_wise = $_POST['search_namewise'];
							$qry3 = "select * from `project_information` where `project_name` like '%$search_name_wise%' && `session` = '$row1[session]' && `year` = '$row1[year]'";
							$res3= mysqli_query($conn, $qry3);	
							echo "<table class='table table-bordered  table-dark'>";	
												
								echo "<tr>";
									echo "<th>Project Name</th>";
									echo "<th>Semester</th>";
									echo "<th>Supervisor</th>";
									echo "<th>Co-Supervisor</th>";
									echo "<th>Member</th>";
									echo "<th>View Details</th>";
									echo "<th>Modify</th>";
									echo "<th>Remove</th>";
								echo "</tr>";
							while ($row3 = mysqli_fetch_assoc($res3))
							{
																								
								echo "<tr>";
									echo "<td>$row3[project_name]</td>";
									echo "<td>$row3[semester]</td>";
									echo "<td>$row3[supervisor]</td>";
									echo "<td>$row3[co_supervisor]</td>";
									echo "<td style = 'text-align:left'>1.$row3[member1] <br />
											  2.$row3[member2] <br />
											  3.$row3[member3]
										</td>";
										
									echo "<td>";
									?>
									 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="view_project_details_of_session_year.php?id=<?php echo $row3['id']; ?>">View Details</a> 
									<?php	
									echo "</td>";
									
									echo "<td>";
									?>
									 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="modify_project_of_session_year.php?id=<?php echo $row3['id']; ?>">Modify Project</a> 
									<?php
									echo "</td>";
									
									echo "<td>"
									?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal<?php echo $row3['id']?>"> Remove Project
										
									</button>
									
									<!-- Alert box (sure to delete?) -->
									
									<div class="modal" id="modal<?php echo $row3['id']?>">
									
										<div class="modal-dialog">
										
											<div class="modal-content">

													<!-- Modal Header -->
												  
													<div class="modal-header">
														
													</div>

													<!-- Modal body -->
												  
													<div class="modal-body" style = "color:black;">
														Are You Sure to delete?
													</div>

													<!-- Modal footer -->
													
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" ><a style = "text-decoration:none; color: white;" href="remove_projects_of_session_year.php?id=<?= $row3['id']?>">Ok</a></button>
														<button type="button" class="btn btn-danger" data-dismiss="modal"><a style = "text-decoration:none; color: white;" href="remove_projects_of_session_year.php?id=<?= $row3['id']?>">Close</a></button>
													</div>

											</div>
										</div>
									</div>
									
									<!-- End of Alert box (sure to delete?) -->
									
									<?php
									echo "</td>";
								
								echo "</tr>";		
																						
							}
							echo "</table>";
						}
						else
						{
							$qry4 = "select * from `project_information` where `session` = '$row2[session]' and `year` = '$row2[year]'";
							$res4 = mysqli_query($conn, $qry4);
							
							echo "<table class='table table-bordered table-dark'>";	
								
									echo "<tr>";
										echo "<th>Project Name</th>";
										echo "<th>Semester</th>";
										echo "<th>Supervisor</th>";
										echo "<th>Co-Supervisor</th>";
										echo "<th>Member</th>";
										echo "<th>View Details</th>";
										echo "<th>Modify</th>";
										echo "<th>Remove</th>";

									echo "</tr>";
									
									while($row4 = mysqli_fetch_assoc($res4))
									{
										
										echo "<tr>";
											echo "<td>$row4[project_name]</td>";
											echo "<td>$row4[semester]</td>";
											echo "<td>$row4[supervisor]</td>";
											echo "<td>$row4[co_supervisor]</td>";
											echo "<td style = 'text-align:left'>1.$row4[member1] <br />
													  2.$row4[member2] <br />
													  3.$row4[member3]
												</td>";
												
											echo "<td>";
											?>
											 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="view_project_details_of_session_year.php?id=<?php echo $row4['id']; ?>">View Details</a> 
											<?php	
											echo "</td>";
											
											echo "<td>";
											?>
											 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="modify_project_of_session_year.php?id=<?php echo $row4['id']; ?>">Modify Project</a> 
											<?php
											echo "</td>";
											
											echo "<td>"
											?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal<?php echo $row4['id']?>"> Remove Project
												
											</button>
											
											<!-- Alert box (sure to delete?) -->
											
											<div class="modal" id="modal<?php echo $row4['id']?>">
											
												<div class="modal-dialog">
												
													<div class="modal-content">

															<!-- Modal Header -->
														  
															<div class="modal-header">
																
															</div>

															<!-- Modal body -->
														  
															<div class="modal-body" style = "color:black;">
																Are You Sure to delete?
															</div>

															<!-- Modal footer -->
															
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" ><a style = "text-decoration:none; color: white;" href="remove_projects_of_session_year.php?id=<?= $row4['id']?>">Ok</a></button>
																<button type="button" class="btn btn-danger" data-dismiss="modal"><a style = "text-decoration:none; color: white;" href="remove_projects_of_session_year.php?id=<?= $row4['id']?>">Close</a></button>
															</div>

													</div>
												</div>
											</div>
											
											<!-- End of Alert box (sure to delete?) -->
										
										<?php
										echo "</td>";
											
										echo "</tr>";
									}
									
							echo "</table>";	
						}					
					?>				
				</div>	
			</div>	
		</div>
		
		<!-- End of Table -->
		
</body>
</html>
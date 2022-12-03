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
	
	<style>
		.flexContainer {
			display: flex;
		}

		.inputField {
			flex: 1;
		}
	</style>

	<title>Chairman List</title>

</head>
<body >
		<!-- Navbar -->

		<div id = "mynavbar" class = "" role = "navigation" >
			<nav class="navbar navbar-expand-lg  navbar-dark ">
				<h3 style = "color:#F0F8FF;"><b> Welcome Admin</b></h3>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav mr-auto">

						<li class="nav-item ">
							<a class="nav-link " href="view_teacher.php">TEACHER INFORMATION<span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item ">
							<a class="nav-link" href="add_teacher.php">ADD TEACHER</a>
						</li>

						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								EXAM COMMITTEE CHAIRMAN
							</a>
							<div class="dropdown-menu " aria-labelledby="navbarDropdown" style = "background-color:black;">
								<a class="dropdown-item" href="exam_committee_registration.php" style = "font-weight: bold; font-size:13px;">REGISTRATION FORM</a>
								<a class="dropdown-item "  href="chairman_list.php" style = "font-weight: bold; font-size:13px;">CHAIRMAN LIST</a>

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
			<h2 style = "color:#3871F6; width: auto;"><b>Chairman List</b></h2>
			<b><hr class = "chairman_list_hrline"/></b>
		</div>

		<!-- End of Header -->


		<!-- Session, Year, Search button, Show Button-->

		<div class = "container-fluid">
			<form action="" method = "post">
				<div class="row " >	
					<div class="col-lg-6 col-12 col-md-6" >
						<div class = "form-group"> 				
							<label style = "font-size:20px; "><b>Search Teacher:</b></label>		
							<div class = "flexContainer">
								<input type="text" placeholder="Enter Name of a Teacher to Search....." name="search_namewise" class = "form-control"  
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
						
				</div>	
				
				<div class="row  justify-content-center" >
					<div class="col-lg-3 col-sm-3" >
						<div class="form-group">
							<label for="" style = "font-size:20px; max-width:60%;"><b>Session:</b></label>

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
												 ?>"/>

								<!-- Session field (drop down with input field) -->

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

								<!-- Session field (drop down with input field) -->

							</div>
						</div>
					</div>

					<div class=" col-lg-3 col-sm-3">
						<div class=" form-group">
							<label for="" style = "font-size:20px;"><b>Year:</b></label>

							<div class = "input-group" >
								<input type="text" name = "year" class="form-control" id="select_year"
									placeholder = "Enter Year"
									value = "<?php
										if(isset($_POST['showall']))
										{
											echo "";
										}
										else if(isset($_POST['year']))
										{
											echo $_POST['year'];
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
					</div>

					<!-- Search Bar -->
					<div class=" col-lg-3 col-sm-3" >

						<br />
						<div style = "text-align:center; margin-top:10px;" >

							<input class="btn btn-primary submit form-control" type="submit" name="search" value="Search" style = "width:100%; ">

						</div>
					</div>

					<div class=" col-lg-3 col-sm-3" >

						<br />
						<div style = "text-align:center; margin-top:10px;" >

							<input class="btn btn-success submit form-control" type="submit" name="showall" value="Show All" style = "width:100%; ">

						</div>
					</div>

					<!-- End of Search Bar -->

				</div>

				<br />
			</form>
		</div>

		<!-- End of Session, Year, Search button, Show Button-->

		<!-- Table -->

		<div class ="container-fluid table-responsive">

			<div class = "row justify-content-center">

				<div class = "col " style = "text-align:center" >

					<?php
						if(isset($_POST['search_name_wise_btn']))
						{
							
							$qry = "select * from `add_teacher` where `name` like '%$_POST[search_namewise]%'";
							$res= mysqli_query($conn, $qry);
							
							echo "<table class='table table-bordered  table-dark'>";	
												
								echo "<tr>";
									echo "<th>Name</th>";
									echo "<th>Session</th>";
									echo "<th>Year</th>";
									echo "<th>Status</th>";
									echo "<th>Action</th>";
									echo "<th>Modify</th>";
									echo "<th>Remove</th>";
									echo "<th>View Login Details</th>";
								echo "</tr>";
								
								while($row = mysqli_fetch_assoc($res))
								{
									$qry2 = "select * from `exam_committee` where `teacher_name`  = '$row[id]' ";
									$res2 = mysqli_query($conn, $qry2);
									while($row2 = mysqli_fetch_assoc($res2))
									{
										echo "<tr>";
										echo "<td>$row[name]</td>";
										echo "<td>$row2[session]</td>";
										echo "<td>$row2[year]</td>";
										if($row2['status']==1)
										{
											 echo "<td>Active </td>";
										}
										else
										{
											echo "<td>Inactive </td>";
										}

										echo "<td>"
										?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal<?php echo $row2['id'];?>"> <?php
										if($row2['status']=='1')
										{
											echo 'Inactive';
										}
										else
										{
											echo 'Active';
										}
										?></button>

										<!-- Alert Box (Sure to Active or Inactive?) -->

										<div class="modal" id="modal<?php echo $row2['id'];
										?>">

											<div class="modal-dialog">

												<div class="modal-content">

														<!-- Modal Header -->

														<div class="modal-header">

														</div>

														<!-- Modal body -->

														<div class="modal-body" style = "color:black;">
															Continue?
														</div>

														<!-- Modal footer -->

														<div class="modal-footer">
															<a class="btn btn-danger" style = "text-decoration:none; color: white;" href="active.php?id=<?php echo $row2['id'];?>&status=<?php
															echo $row2['status']; ?>">Ok</a>

															<a data-dismiss="modal" class="btn btn-danger" style = "text-decoration:none; color: white;" href="active.php?id=<?php echo $row2['id'];?>&status=<?php
															echo $row2['status']; ?>">Close</a>
														</div>

												</div>
											</div>
										</div>

										<!-- Alert Box (Sure to Active or Inactive?) -->
										<?php
										echo "</td>";


										echo "<td>"
										?>  <a class = "btn btn-danger" style = "text-decoration: none; color: white;" href="modify_exam_comiittee.php?id=<?php echo $row2['id']; ?>">Modify</a>
										<?php
										echo "</td>";

										echo "<td>"
										?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal1<?php echo $row2['id']?>"> Remove</button>

										<!-- Alert Box (Sure to Delete?) -->

										<div class="modal" id="modal1<?php echo $row2['id']?>">

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
															<a class="btn btn-danger" style = "text-decoration:none; color: white;" href="remove_from_exam_committee.php?id=<?= $row2['id']?>">Ok</a>
															<a data-dismiss="modal" class="btn btn-danger" style = "text-decoration:none; color: white;" href="remove_from_exam_committee.php?id=<?= $row2['id']?>">Close</a>
														</div>

												</div>
											</div>
										</div>

										<!-- Alert Box (Sure to Delete?) -->
										<?php
										echo "</td>";

										echo "<td>"
										?>  <a class = "btn btn-danger" style = "text-decoration: none; color: white;" href="login_details.php?id=<?php echo $row2['id']; ?>">Log in Details</a>
										<?php
										echo "</td>";
									echo "</tr>";
									}
								}
								
						echo "</table>";
						}
						
						else if(isset($_POST['search']))
						{
							$session = $_POST['session'];
							$year = $_POST['year'];
							if($session == "" && $year == "")
							{
								?>
								 <script type="text/javascript">
									 var res = alert("Please fill at least 1 input field to search");
										window.location("chairman_list.php");
									
								 </script>
								<?php
								$true = 1;
								if($true == 1)
								{
									goto end;
								}
								 $qry = "";
							}
							else if($session == "" )
							{
								$qry = "SELECT * FROM `exam_committee` where `year` = '$year'" ;
							}
							else if($year == "")
							{
								$qry = "SELECT * FROM `exam_committee` where `session` = '$session'" ;
							}
							else
							{
								$qry = "SELECT * FROM `exam_committee` where `session` = '$session' AND `year` = '$year'" ;
							}
							$res = mysqli_query($conn, $qry);

							echo "<table class='table table-bordered table-dark '>";

								echo "<tr>";
									echo "<th>Name</th>";
									echo "<th>Session</th>";
									echo "<th>Year</th>";
									echo "<th>Status</th>";
									echo "<th>Action</th>";
									echo "<th>Modify</th>";
									echo "<th>Remove</th>";
									echo "<th>View Login Details</th>";
								echo "</tr>";

								while($row = mysqli_fetch_assoc($res))
								{
									$qry2 = "select * from `add_teacher` where `id`   = '$row[teacher_name]' ";
									$res2 = mysqli_query($conn, $qry2);

									while($row2 = mysqli_fetch_assoc($res2))
									{
										echo "<tr>";
										echo "<td>$row2[name]</td>";
										echo "<td>$row[session]</td>";
										echo "<td>$row[year]</td>";
										if($row['status']==1)
										{
											 echo "<td>Active </td>";
										}
										else
										{
											echo "<td>Inactive </td>";
										}

										echo "<td>"
										?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal<?php echo $row['id'];?>"> <?php
										if($row['status']=='1')
										{
											echo 'Inactive';
										}
										else
										{
											echo 'Active';
										}
										?></button>

										<!-- Alert Box (Sure to Active or Inactive?) -->

										<div class="modal" id="modal<?php echo $row['id'];
										?>">

											<div class="modal-dialog">

												<div class="modal-content">

														<!-- Modal Header -->

														<div class="modal-header">

														</div>

														<!-- Modal body -->

														<div class="modal-body" style = "color:black;">
															Continue?
														</div>

														<!-- Modal footer -->

														<div class="modal-footer">
															<a class="btn btn-danger" style = "text-decoration:none; color: white;" href="active.php?id=<?php echo $row['id'];?>&status=<?php
															echo $row['status']; ?>">Ok</a>

															<a data-dismiss="modal" class="btn btn-danger" style = "text-decoration:none; color: white;" href="active.php?id=<?php echo $row['id'];?>&status=<?php
															echo $row['status']; ?>">Close</a>
														</div>

												</div>
											</div>
										</div>

										<!-- Alert Box (Sure to Active or Inactive?) -->
										<?php
										echo "</td>";


										echo "<td>"
										?>  <a class = "btn btn-danger" style = "text-decoration: none; color: white;" href="modify_exam_comiittee.php?id=<?php echo $row['id']; ?>">Modify</a>
										<?php
										echo "</td>";

										echo "<td>"
										?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal1<?php echo $row['id']?>"> Remove</button>

										<!-- Alert Box (Sure to Delete?) -->

										<div class="modal" id="modal1<?php echo $row['id']?>">

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
															<a class="btn btn-danger" style = "text-decoration:none; color: white;" href="remove_from_exam_committee.php?id=<?= $row['id']?>">Ok</a>
															<a data-dismiss="modal" class="btn btn-danger" style = "text-decoration:none; color: white;" href="remove_from_exam_committee.php?id=<?= $row['id']?>">Close</a>
														</div>

												</div>
											</div>
										</div>

										<!-- Alert Box (Sure to Delete?) -->
										<?php
										echo "</td>";

										echo "<td>"
										?>  <a class = "btn btn-danger" style = "text-decoration: none; color: white;" href="login_details.php?id=<?php echo $row['id']; ?>">Log in Details</a>
										<?php
										echo "</td>";
									echo "</tr>";
									}


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
										window.location = "chairman_list.php";
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
							$qry = "select * from `exam_committee` LIMIT $start, $limit";
							$res = mysqli_query($conn, $qry);

							$countqry = "select count(id) as id from `exam_committee`";
							$countres = mysqli_query($conn, $countqry);
							$countrow = mysqli_fetch_assoc($countres);
							$total = $countrow["id"];
							$pages = ceil($total/$limit);
							$previous = $page-1;
							$next = $page+1;

							// End of Logic for Pagination

							echo "<table class='table table-bordered table-dark'>";

								echo "<tr>";
									echo "<th>Name</th>";
									echo "<th>Session</th>";
									echo "<th>Year</th>";
									echo "<th>Status</th>";
									echo "<th>Action</th>";
									echo "<th>Modify</th>";
									echo "<th>Remove</th>";
									echo "<th>View Login Details</th>";
								echo "</tr>";

								while($row = mysqli_fetch_assoc($res))
								{
									$qry2 = "select * from `add_teacher` where `id`  = '$row[teacher_name]'";
									$res2 = mysqli_query($conn, $qry2);

									while($row2 = mysqli_fetch_assoc($res2))
									{
										echo "<tr>";
										echo "<td>$row2[name]</td>";
										echo "<td>$row[session]</td>";
										echo "<td>$row[year]</td>";
										
										if($row['status']=='1')
										{
											 echo "<td>Active </td>";
										}
										else
										{
											echo "<td>Inactive </td>";
										}
										

										echo "<td>"
										?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal<?php echo $row['id'];?>"> <?php
										if($row['status']=='1')
										{
											echo 'Inactive';
										}
										else
										{
											echo 'Active';
										}
										?></button>

										<!-- Alert Box (Sure to Active or Inactive?) -->

										<div class="modal" id="modal<?php echo $row['id'];
										?>">

											<div class="modal-dialog">

												<div class="modal-content">

														<!-- Modal Header -->

														<div class="modal-header">

														</div>

														<!-- Modal body -->

														<div class="modal-body" style = "color:black;">
															Continue?
														</div>

														<!-- Modal footer -->

														<div class="modal-footer">
															<a class="btn btn-danger" style = "text-decoration:none; color: white;" href="active.php?id=<?php echo $row['id'];?>&status=<?php
															echo $row['status'];?>&page=<?php echo $page;?>">Ok</a>
															
															<a data-dismiss="modal" class="btn btn-danger" style = "text-decoration:none; color: white;" href="active.php?id=<?php echo $row['id'];?>&status=<?php
															echo $row['status']; ?>">Close</a>
														</div>
														

												</div>
											</div>
										</div>

										<!-- Alert Box (Sure to Active or Inactive?) -->
										<?php
										echo "</td>";


										echo "<td>"
										?>  <a class = "btn btn-danger" style = "text-decoration: none; color: white;" href="modify_exam_comiittee.php?id=<?php echo $row['id']; ?>">Modify</a>
										<?php
										echo "</td>";

										echo "<td>"
										?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal1<?php echo $row['id']?>"> Remove</button>

										<!-- Alert Box (Sure to Delete?) -->

										<div class="modal" id="modal1<?php echo $row['id']?>">

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
															<a class="btn btn-danger" style = "text-decoration:none; color: white;" href="remove_from_exam_committee.php?id=<?= $row['id']?>">Ok</a>
															<a data-dismiss="modal" class="btn btn-danger" style = "text-decoration:none; color: white;" href="remove_from_exam_committee.php?id=<?= $row['id']?>">Close</a>
														</div>

												</div>
											</div>
										</div>

										<!-- Alert Box (Sure to Delete?) -->
										<?php
										echo "</td>";

										echo "<td>"
										?>  <a class = "btn btn-danger" style = "text-decoration: none; color: white;" href="login_details.php?id=<?php echo $row['id']; ?>">Log in Details</a>
										<?php
										echo "</td>";

									echo "</tr>";
									}
										

								}
							echo "</table>";

							if($total>10)
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
														echo "<a class='inactive_page page-link' href='chairman_list.php?page=".$previous."'> Previous</a> ";
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
													echo "<a class='active_page page-link'  href='chairman_list.php?page=".$i."'>".$i."</a> ";
												}
												else
												{
													echo "<a class=' inactive_page page-link'  href='chairman_list.php?page=".$i."'>".$i."</a> ";
												}
												};
											?>

											<li class="page-item">
												<?php
													if($pages>=$next)
													{
														echo "<a class='inactive_page page-link' href='chairman_list.php?page=".$next."'> Next</a> ";
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

						}

					?>

				</div>

			</div>

		</div>

		<!-- End of Table -->

</body>
</html>

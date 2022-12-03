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


	<title>View Teacher</title>

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
			<h2 style = "color:#3871F6; width: auto;"><b>Teacher Information</b></h2>
			<b><hr class = "hrline"/></b>
		</div>

		<!-- End of Header -->



		<!-- Table -->

		<div class ="container-fluid table-responsive">

			<div class = "row justify-content-center">

				<div class = "col " style = "text-align:center" >

					<?php

						// Logic for Pagination
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
						$qry = "select * from `add_teacher` LIMIT $start, $limit";
						$res = mysqli_query($conn, $qry);

						$countqry = "select count(id) as id from `add_teacher`";
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
									echo "<th>Designation</th>";
									echo "<th>Email</th>";
									echo "<th>Password</th>";
									echo "<th>Modify</th>";
									echo "<th>Remove</th>";
									echo "<th>Teacher's Projects</th>";
								echo "</tr>";

								while($row = mysqli_fetch_assoc($res))
								{
									$pass = base64_decode($row['password']);
									echo "<tr>";
										echo "<td>$row[name]</td>";
										echo "<td>$row[designation]</td>";
										echo "<td>$row[email]</td>";
										echo "<td>$pass</td>";
										echo "<td>";
										?>
										 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="modify.php?id=<?php echo $row['id']; ?>">Modify</a>
										<?php
										echo "</td>";
										
										
										echo "<td>"
										?> <button class = "btn btn-danger"  data-toggle="modal" data-target="#modal<?php echo $row['id']?>"> Remove

										</button>

										<!-- Alert box (sure to delete?) -->

										<div class="modal" id="modal<?php echo $row['id']?>">

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
															<button type="button" class="btn btn-danger" ><a style = "text-decoration:none; color: white;" href="delete_teacher.php?id=<?= $row['id']?>">Ok</a></button>
															<button type="button" class="btn btn-danger" data-dismiss="modal"><a style = "text-decoration:none; color: white;" href="delete_teacher.php?id=<?= $row['id']?>">Close</a></button>
														</div>

												</div>
											</div>
										</div>

										<!-- End of Alert box (sure to delete?) -->

										<?php
										echo "</td>";
										
											echo "<td>";
										?>
										 <a class = "btn btn-danger" style = "text-decoration:none; color: white;" href="teachers_projects.php?name=<?php echo $row['name']; ?>">Show Projects</a>
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
														echo "<a class='inactive_page page-link' href='view_teacher.php?page=".$previous."'> Previous</a> ";
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
													echo "<a class='active_page page-link'  href='view_teacher.php?page=".$i."'>".$i."</a> ";
												}
												else
												{
													echo "<a class=' inactive_page page-link'  href='view_teacher.php?page=".$i."'>".$i."</a> ";
												}
												};
											?>

											<li class="page-item">
												<?php
													if($pages>=$next)
													{
														echo "<a class='inactive_page page-link' href='view_teacher.php?page=".$next."'> Next</a> ";
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

					?>

				</div>

			</div>

		</div>

		<!-- End of Table -->

</body>
</html>

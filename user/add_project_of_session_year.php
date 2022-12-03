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

	$id = $_GET['id'];	
	$_SESSION['project_id'] = $id;
	$qry = "select * from `exam_committee` where `id` = '$id'";
	$res = mysqli_query($conn,$qry);
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
	<link rel="stylesheet" href="css/owncssuser.css" />	


	<title>Add Project</title>
	
	<script>
	function changeinput(ip)
	{
		document.getElementById("inp").value = ip; 
	}	
	function changecospervisor(co_sup)
	{
		document.getElementById("co_sup").value = co_sup; 
	}
	function changesemster(select_semester)
	{
		document.getElementById("select_semester").value = select_semester; 
	}
	</script>

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
						<li class="nav-item active">
							<a class="nav-link " href="my_profile.php">MY PROFILE<span class="sr-only">(current)</span></a>
						</li>
						
						<li class="nav-item ">
							<a class="nav-link" href="former_chairman_list.php">FORMER CHAIRMAN</a>
						</li>
						
						<li class="nav-item">
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
			<h2 style = "color:#3871F6; width: auto;"><b> Fill The Form To Add Project</b></h2>
			<b><hr class = "hrline" style = "width: 420px;"/></b>
		</div>
		
		<!-- End of Header -->
		
		<!-- Form To Add The Project -->
		
		<div class = "container-fluid">	
			<div class = "row justify-content-center">			
				<div class = "col-lg-3 col-sm-6 col-md-4 col-8">
					<form method = "POST" class = "form-container" enctype="multipart/form-data">
						
						<div class="form-group"> 
							<label><b>Project Name:</b></label>
							
							<input class="form-control" type="text" name="project_name"  placeholder = "Enter Project Name" required=""/>
						</div>
						
						<div class="form-group"> 
							<label><b>Session:</b></label>
							
							<input class = "form-control"type="text" name = "session" value= "<?php 
									echo $row['session'];
								?>" readonly />
						</div>
						
						<div class="form-group"> 
							<label><b>Year:</b></label>
							
							<input class = "form-control"type="text" name = "year" value= "<?php 
									echo $row['year'];
								?>" readonly					
							/>	
							
						</div>
						
						<div class=" form-group">
							<label><b>Semester:</b></label>
							<div class = "input-group">
								<input type="text" name = "semester" class="form-control"  id="select_semester" placeholder = "Enter Semester" required="" readonly value="<?php
										
										if($row['year'] == "B.Sc. 1st")
										{
											echo "B.Sc. 2nd Semester";	
										}
										else if($row['year'] == "B.Sc. 2nd")
										{
											echo "B.Sc. 4th Semester";										
										}
										else if($row['year'] == "B.Sc. 3rd")
										{
											echo "B.Sc. 6th Semester";
																						
										}
										else if($row['year'] == "B.Sc. 4th")
										{		
											echo "B.Sc. 7th Semester";
										}
										else if($row['year'] == "M.Sc. 1st")
										{
											echo "M.Sc. Final semester";
											
										}
										?>"/>
										
										<div class="input-group-append" id = "button_to_hide" style = "display:<?php 
										 if($row['year'] == "B.Sc. 3rd" || $row['year'] == "B.Sc. 1st" || $row['year'] == "B.Sc. 2nd" || $row['year'] == "M.Sc. 1st")
												{
											echo "none";
																					
											}?>;">
											<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" ></button>
											<div class="dropdown-menu">
												
												<?php
																		
													echo "<button type = \"button\"  onclick = \"changesemster('B.Sc. 7th Semester')\" class= \"dropdown-item\" >B.Sc. 7th Semester </button>";
													echo "<button type = \"button\"  onclick = \"changesemster('B.Sc. 8th Semester')\" class= \"dropdown-item\" >B.Sc. 8th Semester </button>";
																	
												?>
											</div>
										</div>						
							</div>
						</div>
					
						<div class="form-group"> 
							<label><b>Supervisor:</b></label>					
							<div class="input-group">
								<input type="text" name = "supervisor" class="form-control" id="inp" placeholder = "Enter Supervisor Name" required=""/>
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
							</div>
							
						</div>
						
						
						<div class="form-group"> 
							<label><b>Co-Supervisor:</b></label>
							
							<div class="input-group">
								<input type="text" name = "co_supervisor" class="form-control" id="co_sup" placeholder = "Enter Supervisor Name" />
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
							</div>
							
						</div>
						
						<div class="form-group"> 
							<label><b>Member1:</b></label>
							
							<input class="form-control" type="text" name="member1"  placeholder = "Enter Member Name/Roll"  required=""/>
						</div>
						
						<div class="form-group"> 
							<label ><b>Member2:</b></label>
							
							<input class="form-control" type="text" name="member2"  placeholder = "Enter Member Name/Roll" />
						</div>
						
						<div class="form-group"> 
							<label><b>Member3:</b></label>
							
							<input class="form-control" type="text" name="member3"  placeholder = "Enter Member Name/Roll" />
						</div>
						
						
						<div class="form-group"> 
							<label><b>Project Description:</b></label>
							
							<textarea name="description" id="" cols="30" rows="3" placeholder = "Enter Project Description" class="form-control" required="" ></textarea>
														
						</div>
						
						<div class = "form-group">
							<label for=""><b>Upload Project Report (PDF)</b></label>
							<div class = "form-control">
								<input type="file" name = "file" />
							</div>
						</div>
						
						<div class="form-group"> 
							<label for=""><b>Upload an image:</b></label>
							
							<div class = "form-control">
								<input type="file" name="upload_image"  />
							</div>
							
						</div>
			
						<div style = "text-align:center;">
						
							<input class="btn btn-primary submit" type="submit" name="submit1" value="Submit" style = "width: 250px; max-width:80%">
						
						</div>
					</form>
				</div>
				
			</div>
			
		</div>
		
		<!-- End of Form To Add The Project -->
		
		<!-- PHP code for uploading the project -->
		
		<?php 
			
			
			if(isset($_POST['submit1']))
			{
				
				$project_name = $_POST['project_name'];
				$session = $_POST['session'];
				$year = $_POST['year'];
				$semester = $_POST['semester'];
				$supervisor = $_POST['supervisor'];
				$co_supervisor = $_POST['co_supervisor'];
				$member1 = $_POST['member1'];
				$member2 = $_POST['member2'];
				$member3 = $_POST['member3'];
				$project_description = $_POST['description'];
						
				$allow = array('pdf');
				$temp = explode('.',$_FILES['file']['name']);
				$extension = end($temp);
				$upload_file = $_FILES['file']['name'];
				$file_type=$_FILES['file']['type'];
				
				
				if(empty($_FILES['upload_image']['name']) && empty($_FILES['file']['name']))
				{
					$qry3 = "INSERT INTO `project_information`( `project_name`, `session`, `year`, `semester`, `supervisor`, `co_supervisor`, `member1`, `member2`, `member3`, `project_des`,`pdf`, `project_image`) VALUES ('$project_name','$session','$year','$semester','$supervisor','$co_supervisor','$member1', '$member2','$member3','$project_description',' ',' ')";
					$res3 = mysqli_query($conn, $qry3);	
				}
				else if(empty($_FILES['upload_image']['name']) && !empty($_FILES['file']['name']))
				{
					if($file_type=="application/pdf")
					{
						move_uploaded_file($_FILES['file']['tmp_name'],'pdf/'.$_FILES['file']['name']);
						$qry3 = "INSERT INTO `project_information`( `project_name`, `session`, `year`, `semester`, `supervisor`, `co_supervisor`, `member1`, `member2`, `member3`, `project_des`,`pdf`, `project_image`) VALUES ('$project_name','$session','$year','$semester','$supervisor','$co_supervisor','$member1', '$member2','$member3','$project_description','$upload_file',' ')";
						$res3 = mysqli_query($conn, $qry3);	
					}
					else
					{
						?> 
						<script>
							var res = alert("Only PDF File is allowed");
							window.location = "add_project_of_session_year.php?id=<?php echo $id;?>";
						</script>
						<?php	
					}
				}
				else if(!empty($_FILES['upload_image']['name']) && empty($_FILES['file']['name']))
				{
					/// Code for image resizing
					function resizeImage($resourceType,$image_width,$image_height) 
					{
						$resizeWidth = 300;
						$resizeHeight = 300;
						$imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
						imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
						return $imageLayer;
					}
			
					$imageProcess = 0;
					if(is_array($_FILES)) 
					{
						$fileName = $_FILES['upload_image']['tmp_name']; 
						$sourceProperties = getimagesize($fileName);
						$resizeFileName = time();
						$uploadPath = "./project_image/";
						$fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
						$uploadImageType = $sourceProperties[2];
						$sourceImageWidth = $sourceProperties[0];
						$sourceImageHeight = $sourceProperties[1];
						switch ($uploadImageType) 
						{
							case IMAGETYPE_JPEG:
								$resourceType = imagecreatefromjpeg($fileName); 
								$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
								imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
								break;
				 
							case IMAGETYPE_GIF:
								$resourceType = imagecreatefromgif($fileName); 
								$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
								imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
								break;
				 
							case IMAGETYPE_PNG:
								$resourceType = imagecreatefrompng($fileName); 
								$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
								imagepng($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
								break;
				 
							default:
								$imageProcess = 0;
								break;
						}
						move_uploaded_file($resizeFileName,$uploadPath.  ".". $fileExt);
						$imageProcess = 1;
					}
					
					/// End of Code for image resizing
					
					$qry3 = "INSERT INTO `project_information`( `project_name`, `session`, `year`, `semester`, `supervisor`, `co_supervisor`, `member1`, `member2`, `member3`, `project_des`,`pdf`, `project_image`) VALUES ('$project_name','$session','$year','$semester','$supervisor','$co_supervisor','$member1', '$member2','$member3','$project_description',' ','$resizeFileName.$fileExt')";
					$res3 = mysqli_query($conn, $qry3);	
				}
				else
				{	
					/// Code for image resizing
					function resizeImage($resourceType,$image_width,$image_height) 
					{
						$resizeWidth = 300;
						$resizeHeight = 300;
						$imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
						imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
						return $imageLayer;
					}
			
					$imageProcess = 0;
					if(is_array($_FILES)) 
					{
						$fileName = $_FILES['upload_image']['tmp_name']; 
						$sourceProperties = getimagesize($fileName);
						$resizeFileName = time();
						$uploadPath = "./project_image/";
						$fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
						$uploadImageType = $sourceProperties[2];
						$sourceImageWidth = $sourceProperties[0];
						$sourceImageHeight = $sourceProperties[1];
						switch ($uploadImageType) 
						{
							case IMAGETYPE_JPEG:
								$resourceType = imagecreatefromjpeg($fileName); 
								$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
								imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
								break;
				 
							case IMAGETYPE_GIF:
								$resourceType = imagecreatefromgif($fileName); 
								$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
								imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
								break;
				 
							case IMAGETYPE_PNG:
								$resourceType = imagecreatefrompng($fileName); 
								$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
								imagepng($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
								break;
				 
							default:
								$imageProcess = 0;
								break;
						}
						move_uploaded_file($resizeFileName,$uploadPath.  ".". $fileExt);
						$imageProcess = 1;
					}
					
					/// End of Code for image resizing
					
					if ($file_type=="application/pdf")
					{
						move_uploaded_file($_FILES['file']['tmp_name'],'pdf/'.$_FILES['file']['name']);
						$qry3 = "INSERT INTO `project_information`( `project_name`, `session`, `year`, `semester`, `supervisor`, `co_supervisor`, `member1`, `member2`, `member3`, `project_des`,`pdf`, `project_image`) VALUES ('$project_name','$session','$year','$semester','$supervisor','$co_supervisor','$member1', '$member2','$member3','$project_description','$upload_file','$resizeFileName.$fileExt')";
						$res3 = mysqli_query($conn, $qry3);					
					}
					else
					{
						?> 
						<script>
							var res = alert("Only PDF File is allowed");
							window.location = "add_project_of_session_year.php?id=<?php echo $id;?>";
						</script>
						<?php	
					}
					
				}			
					
				?>
					<script type="text/javascript">
						alert("Project Added Successfully");
						window.location = "view_projects_using_id.php";
					</script>
				<?php
			}
		?>
		
		<!-- End of PHP code for uploading the project -->
		
</body>
</html>
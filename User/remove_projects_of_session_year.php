<?php
	session_start();
	if($_SESSION["userloggedin"]!=1)
	{
		header("location:user_panel.php");
	}
	$conn = mysqli_connect("localhost","root","","project");
	
	$id = $_GET['id'];
	$qry = "delete from project_information where id = '$id'";
	
	$res = mysqli_query($conn, $qry);

?>
<script type="text/javascript">
	window.alert("Project Deleted Successfully");
	window.location = "view_projects_using_id.php";
</script>
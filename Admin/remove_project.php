<?php
	session_start();
	if($_SESSION["loggedin"]!=1)
	{
		header("location:login.php");
	}
	$conn = mysqli_connect("localhost","root","","project");
	
	$id = $_GET['id'];
	$qry = "delete from project_information where id = '$id'";
	$res = mysqli_query($conn, $qry);

?>
<script type="text/javascript">
	window.alert("Project Deleted Successfully");
	window.location = "project_list.php";
</script>
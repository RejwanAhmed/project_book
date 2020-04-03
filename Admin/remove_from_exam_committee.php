<?php
	session_start();
	if($_SESSION["loggedin"]!=1)
	{
		header("location:login.php");
	}
	$conn = mysqli_connect("localhost","root","","project");
	
	$id = $_GET['id'];
	$qry = "delete from `exam_committee` where id = '$id'";
	$res = mysqli_query($conn, $qry);

?>
<script type="text/javascript">
	window.alert("Teacher Deleted Successfully");
	window.location = "chairman_list.php";
</script>
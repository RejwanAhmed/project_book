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
	
	$id = $_GET['id'];
	$qry = "delete from project_information where id = '$id'";
	$res = mysqli_query($conn, $qry);

?>
<script type="text/javascript">
	window.alert("Project Deleted Successfully");
	window.location = "project_list.php";
</script>